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

        $selectValue = $this->input->post('select');
        for ($i = 1; $i <= $selectValue; $i++) {
            $this->form_validation->set_rules("Tiro{$i}_id", "Tiro {$i}", 'trim|required');
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

            $tirosid = array();
            for ($i = 1; $i <= 10; $i++) {
                $tirosid[] = $this->input->post("Tiro{$i}_id");
            }

            $tirosid = array_filter($tirosid, function($value) { return !is_null($value) && $value !== ''; });

            $duplicates = array_diff_assoc($tirosid, array_unique($tirosid));
            if (count($duplicates) > 0) {
                $this->session->set_flashdata('error', 'Tickets duplicados detectados');
                redirect('supervision/update/' . $registro_id, 'refresh');
            } else {
                $this->model_supervicion->update($data, $registro_id);
                $this->tiros($registro_id, $tirosid);
                $this->session->set_flashdata('success', 'Actualizado con éxito');
                redirect('supervision/', 'refresh');
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
                'manifiesto_id' => $tirosid[$i]
            );
        }

        $this->model_supervicion->insertarTiros($tirosData);
    }

    public function manifiestoslist($unidad_id)
    {

        $postData = $this->input->get('term');

        $result = $this->model_supervicion->searchmanifiestos($postData, $unidad_id);

        $data = array();
        foreach ($result as $row) {
            $data[] = array(
                'label' => 'Folio: ' . $row->nummanifiesto,
                'value' => $row->manifiesto_id,
                'destino' => $row->destinofinal_nombre

            );
        }
        echo json_encode($data);
    }
}
