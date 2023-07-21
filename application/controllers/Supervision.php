<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supervision extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Supervicion';

        $this->load->model('model_supervicion');
    }

    public function index()
    {
        if (!in_array('viewSupervision', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('supervision/index', $this->data);
    }

    public function fetchSupervicionData()
    {
        $sucursal_id = $this->session->userdata('sucursal_id');
        
        $result = array('data' => array());

        $data = $this->model_supervicion->getSupervicionData($sucursal_id, 1);

        foreach ($data as $key => $value) {

            $button = '';

            if (in_array('updateSupervision', $this->permission)) {
                $button .= '<a href="' . base_url('supervision/update/' . $value['registro_id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            $result['data'][$key] = array(

                $value['registro_id'],
                $value['unidad_numero'],
                $value['hora_salida'],
                $value['hora_entrada'],
                $value['turno_nombre'],
                $value['ruta_nombre'],
                $value['alias_nombre'],
                $value['operador_nombre'],
                $value['numrecolector'],
                $value['Recolector1'],
                $value['Recolector2'],
                $value['Recolector3'],
                $value['Recolector4'],
                $value['Recolector5'],
                $value['estatus'],
                $button

            );
        }

        echo json_encode($result);
    }

    public function update($registro_id)
    {
        $sucursal_id = $this->session->userdata('sucursal_id');

        if (!in_array('updateSupervision', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if (!$registro_id) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('Litroscargados', 'Litroscargados', 'trim|required');
        $this->form_validation->set_rules('observaciones', 'observaciones', 'trim|required');

        if ($this->input->post('select') == 1) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
        } else if ($this->input->post('select') == 2) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
        } else if ($this->input->post('select') == 3) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
        } else if ($this->input->post('select') == 4) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
            $this->form_validation->set_rules('Tiro4_id', 'Tiro 4', 'trim|required');
        } else if ($this->input->post('select') == 5) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
            $this->form_validation->set_rules('Tiro4_id', 'Tiro 4', 'trim|required');
            $this->form_validation->set_rules('Tiro5_id', 'Tiro 5', 'trim|required');
        } else if ($this->input->post('select') == 6) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
            $this->form_validation->set_rules('Tiro4_id', 'Tiro 4', 'trim|required');
            $this->form_validation->set_rules('Tiro5_id', 'Tiro 5', 'trim|required');
            $this->form_validation->set_rules('Tiro6_id', 'Tiro 6', 'trim|required');
        } else if ($this->input->post('select') == 7) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
            $this->form_validation->set_rules('Tiro4_id', 'Tiro 4', 'trim|required');
            $this->form_validation->set_rules('Tiro5_id', 'Tiro 5', 'trim|required');
            $this->form_validation->set_rules('Tiro6_id', 'Tiro 6', 'trim|required');
            $this->form_validation->set_rules('Tiro7_id', 'Tiro 7', 'trim|required');
        } else if ($this->input->post('select') == 8) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
            $this->form_validation->set_rules('Tiro4_id', 'Tiro 4', 'trim|required');
            $this->form_validation->set_rules('Tiro5_id', 'Tiro 5', 'trim|required');
            $this->form_validation->set_rules('Tiro6_id', 'Tiro 6', 'trim|required');
            $this->form_validation->set_rules('Tiro7_id', 'Tiro 7', 'trim|required');
            $this->form_validation->set_rules('Tiro8_id', 'Tiro 8', 'trim|required');
        } else if ($this->input->post('select') == 9) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
            $this->form_validation->set_rules('Tiro4_id', 'Tiro 4', 'trim|required');
            $this->form_validation->set_rules('Tiro5_id', 'Tiro 5', 'trim|required');
            $this->form_validation->set_rules('Tiro6_id', 'Tiro 6', 'trim|required');
            $this->form_validation->set_rules('Tiro7_id', 'Tiro 7', 'trim|required');
            $this->form_validation->set_rules('Tiro8_id', 'Tiro 8', 'trim|required');
            $this->form_validation->set_rules('Tiro9_id', 'Tiro 9', 'trim|required');
        } else if ($this->input->post('select') == 10) {
            $this->form_validation->set_rules('Tiro1_id', 'Tiro 1', 'trim|required');
            $this->form_validation->set_rules('Tiro2_id', 'Tiro 2', 'trim|required');
            $this->form_validation->set_rules('Tiro3_id', 'Tiro 3', 'trim|required');
            $this->form_validation->set_rules('Tiro4_id', 'Tiro 4', 'trim|required');
            $this->form_validation->set_rules('Tiro5_id', 'Tiro 5', 'trim|required');
            $this->form_validation->set_rules('Tiro6_id', 'Tiro 6', 'trim|required');
            $this->form_validation->set_rules('Tiro7_id', 'Tiro 7', 'trim|required');
            $this->form_validation->set_rules('Tiro8_id', 'Tiro 8', 'trim|required');
            $this->form_validation->set_rules('Tiro9_id', 'Tiro 9', 'trim|required');
            $this->form_validation->set_rules('Tiro10_id', 'Tiro 10', 'trim|required');
        }

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'asignacion_id' => $this->input->post('asignacion'),
                'usuario_id' => $this->input->post('supervisor_id'),
                'tiempo_ruta' => $this->input->post('tiemporuta'),
                'recorrido' => $this->input->post('Recorrido'),
                'litroscargados' => $this->input->post('Litroscargados'),
                'rendimiento' => $this->input->post('Rendimiento'),
                'totalpeso' => $this->input->post('totalpeso'),
                'observaciones' => $this->input->post('observaciones'),
                'estatus' => 2,
                'updated_at' => date('Y-m-d h:i:s')
            );

            $tirosid = array(
                $this->input->post('Tiro1_id'),
                $this->input->post('Tiro2_id'),
                $this->input->post('Tiro3_id'),
                $this->input->post('Tiro4_id'),
                $this->input->post('Tiro5_id'),
                $this->input->post('Tiro6_id'),
                $this->input->post('Tiro7_id'),
                $this->input->post('Tiro8_id'),
                $this->input->post('Tiro9_id'),
                $this->input->post('Tiro10_id')
            );

            $tiros = array_filter($tirosid, function ($value) {
                return !empty($value);
            });

            $count = array_count_values($tiros);
            $duplicates = array();
            foreach ($count as $key => $value) {
                if ($value > 1) {
                    $duplicates[] = $key;
                }
            }

            if (empty($duplicates)) {
                $update = $this->model_supervicion->update($data, $registro_id);
                $this->tiros($registro_id, $tirosid);
                $this->session->set_flashdata('success', 'Actualizado con éxito');
                redirect('supervision/', 'refresh');
            } else if (!empty($duplicates)) {

                $this->session->set_flashdata('error', 'Tickets duplicados');
                redirect('supervision/update/' . $registro_id, 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Ocurrio un error');
                redirect('supervision/update/' . $registro_id, 'refresh');
            }
        } else {
            $user_id = $this->session->userdata('usuario_id');
            $asignaciones = $this->model_supervicion->getAsignacionData();
            $registro_data = $this->model_supervicion->getSupervicionData($sucursal_id, 1, $registro_id);
            $hora_salida = new DateTime($registro_data['hora_salida']);
            $hora_entrada = new DateTime($registro_data['hora_entrada']);
            $duracion_ruta = $hora_salida->diff($hora_entrada)->format('%H:%I:%S');
            $this->data['duracion_ruta'] = $duracion_ruta;
            $this->data['registro_data'] = $registro_data;
            $this->data['asignaciones'] = $asignaciones;
            $this->data['usuario_id'] = $user_id;
            $this->render_template('supervision/edit', $this->data);
        }
    }

    public function tiros($create, $tirosid)
    {
        $tirosData = array();
    
        for ($i = 0; $i < count($tirosid); $i++) {
            $tirosData[] = array(
                'registro_id' => $create,
                'numtiro' => $i + 1,
                'ticket_id' => $tirosid[$i]
            );
        }
    
        $this->model_supervicion->insertarTiros($tirosData);
    }

    public function ticketslist($unidad_id)
    {

        $postData = $this->input->get('term');

        $result = $this->model_supervicion->searchtickets($postData, $unidad_id);

        $data = array();
        foreach ($result as $row) {
            $data[] = array(
                'label' => 'Folio: ' . $row->folio . ' | Peso: ' . $row->peso,
                'value' => $row->ticket_id,
                'peso' => $row->peso,
                'destino' => $row->destinofinal_nombre

            );
        }
        echo json_encode($data);
    }

}
