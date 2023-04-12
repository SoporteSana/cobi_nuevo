<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vigilancia extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Vigilancia';

        $this->load->model('model_vigilancia');
    }

    public function index()
    {
        if (!in_array('viewVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('vigilancia/index', $this->data);
    }

    public function fetchVigilanciaData()
    {
        $result = array('data' => array());

        $data = $this->model_vigilancia->getVigilanciaData();

        foreach ($data as $key => $value) {

            $button = '';

            if (in_array('updateVigilancia', $this->permission)) {
                $button .= '<a href="' . base_url('vigilancia/update/' . $value['registro_id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            $result['data'][$key] = array(

                $value['registro_id'],
                $value['unidad_numero'],
                $value['hora_salida'],
                $value['turno_nombre'],
                $value['ruta_nombre'],
                $value['alias_nombre'],
                $value['operador_nombre'],
                $value['numrecolectores'],
                $value['recolector1'],
                $value['recolector2'],
                $value['recolector3'],
                $value['recolector4'],
                $value['recolector5'],
                $value['estatus'],
                $button

            );
        }

        echo json_encode($result);
    }

    public function create()
    {

        if (!in_array('createVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('numeroeconomico', 'numero de unidad name', 'trim|required');
        $this->form_validation->set_rules('horatablero', 'hora tablero', 'trim|required');
        $this->form_validation->set_rules('alias', 'alias', 'trim|required');
        $this->form_validation->set_rules('operador', 'operador', 'trim|required');
        $this->form_validation->set_rules('kmsalida', 'kmsalida', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'sucursal_id' => $this->session->userdata('sucursal_id'),
                'unidad_id' => $this->input->post('numeroeconomico_id'),
                'semana' => $this->input->post('semana'),
                'dia' => $this->input->post('dia'),
                'fecha_salida' => date('Y-m-d'),
                'hora_salida' => $this->input->post('horasalida'),
                'hora_tablero' => $this->input->post('horatablero'),
                'alias_id' => $this->input->post('alias_id'),
                'operador_id' => $this->input->post('operador_id'),
                'km_salida' => $this->input->post('kmsalida'),
                'estatus' => 0,
                'created_at' => date('Y-m-d h:i:s')
            );

            $recolectores_id = array(
                $this->input->post('Recolector1_id'),
                $this->input->post('Recolector2_id'),
                $this->input->post('Recolector3_id'),
                $this->input->post('Recolector4_id'),
                $this->input->post('Recolector5_id'),
            );

            $recolectores_id = array_filter($recolectores_id, function ($value) {
                return !empty($value);
            });

            $count = array_count_values($recolectores_id);
            $duplicates = array();
            foreach ($count as $key => $value) {
                if ($value > 1) {
                    $duplicates[] = $key;
                }
            }

            if (empty($duplicates)) {
                $create = $this->model_vigilancia->create($data);
                $this->tripulacion($create, $recolectores_id);
                $this->session->set_flashdata('success', 'Creado con éxito');
                redirect('vigilancia/', 'refresh');
            } else if (!empty($duplicates)) {

                $this->session->set_flashdata('error', 'Recolectores duplicados');
                redirect('vigilancia/create', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Ocurrio un error');
                redirect('vigilancia/create', 'refresh');
            }
        } else {

            $diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");

            $data2 = array(
                'semana_actual' => date("W"),
                'hora_salida' => date("Y-m-d H:i:s"),
                'dia' => $diassemana[date('w')]
            );

            $this->render_template('vigilancia/create', $this->data, $data2);
        }
    }

    public function tripulacion($create, $recolector_id_array)
    {
        $tripulacionData = array(
            'registro_id' => $create,
            'recolector1' => isset($recolector_id_array[0]) ? $recolector_id_array[0] : 0,
            'recolector2' => isset($recolector_id_array[1]) ? $recolector_id_array[1] : 0,
            'recolector3' => isset($recolector_id_array[2]) ? $recolector_id_array[2] : 0,
            'recolector4' => isset($recolector_id_array[3]) ? $recolector_id_array[3] : 0,
            'recolector5' => isset($recolector_id_array[4]) ? $recolector_id_array[4] : 0,
            'numrecolectores' => $this->input->post('select'),
        );

        $this->model_vigilancia->insertarTripulacion($tripulacionData);
    }

    public function update($registro_id)
    {
        if (!in_array('updateVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if (!$registro_id) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('kmentrada', 'km de entrada', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'fecha_entrada' => date('Y-m-d'),
                'hora_entrada' => $this->input->post('horaentrada'),
                'km_entrada' => $this->input->post('kmentrada'),
                'estatus' => 1,
                'updated_at' => date('Y-m-d h:i:s')
            );

            $update = $this->model_vigilancia->update($data, $registro_id);
            if ($update == true) {
                $this->session->set_flashdata('success', 'Actualizado con éxito');
                redirect('vigilancia/', 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Ocurrio un error');
                redirect('vigilancia/update/' . $registro_id, 'refresh');
            }
        } else {
            $registro_data = $this->model_vigilancia->getVigilanciaData($registro_id);
            $this->data['registro_data'] = $registro_data;
            $this->data['horaentrada'] = array('hora_entrada' => date("Y-m-d H:i:s"));
            $this->render_template('vigilancia/edit', $this->data);
        }
    }

    public function unidadlist()
    {

        $postData = $this->input->post();

        $data = $this->model_vigilancia->searchUnidad($postData);

        echo json_encode($data);
    }

    public function aliaslist()
    {

        $postData = $this->input->get('term');

        $result = $this->model_vigilancia->searchalias($postData);

        $data = array();
        foreach ($result as $row) {
            $data[] = array(
                'label' => $row->alias_nombre,
                'value' => $row->alias_id,
                'turno' => $row->turno_nombre,
                'ruta' => $row->ruta_nombre

            );
        }
        echo json_encode($data);
    }

    public function operadorlist()
    {

        $postData = $this->input->post();

        $data = $this->model_vigilancia->searchoperador($postData);

        echo json_encode($data);
    }

    public function recolectoreslist()
    {

        $postData = $this->input->post();

        $data = $this->model_vigilancia->searchrecolectores($postData);

        echo json_encode($data);
    }
}
