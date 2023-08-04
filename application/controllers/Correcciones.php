<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Correcciones extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Correciones';

        $this->load->model('model_correcciones');
    }

    public function index()
    {
        if (!in_array('viewEditarRegistro', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('correcciones/busqueda', $this->data);
    }

    public function completo()
    {
        if (!in_array('viewEditarRegistro', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('correcciones/index', $this->data);
    }

    public function filtro()
    {
        if (!in_array('viewEditarRegistro', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $result = array('data' => array());

        $filtros = array(
            'filtroid' => $this->input->post('filtroid'),
            'fecha1filtro' => $this->input->post('fecha1filtro'),
            'fecha2filtro' => $this->input->post('fecha2filtro'),
            'filtrounidad_id' => $this->input->post('filtrounidad_id')
        );

        $data = $this->model_correcciones->getFiltrosData($filtros);

        foreach ($data as $key => $value) {

            $button = '';

            if (in_array('updateEditarRegistro', $this->permission)) {
                $button .= '<a href="' . base_url('correcciones/update/' . $value['registro_id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            $result['data'][$key] = array(

                $value['registro_id'],
                $value['unidad_numero'],
                $value['asignacion_nombre'],
                $value['semana'],
                $value['nombres'],
                $value['turno_nombre'],
                $value['ruta_nombre'],
                $value['alias_nombre'],
                $value['operador_nombre'],
                $value['hora_salida'],
                $value['hora_entrada'],
                $value['numrecolectores'],
                $value['recolector1'],
                $value['recolector2'],
                $value['recolector3'],
                $value['recolector4'],
                $value['recolector5'],
                $value['km_salida'],
                $value['km_entrada'],
                $value['recorrido'],
                $value['litroscargados'],
                $value['rendimiento'],
                $value['hora_tablero'],
                $value['tiempo_ruta'],
                $value['numtiros'],
                $value['tiro1'],
                $value['destinofinal1'],
                $value['tiro2'],
                $value['destinofinal2'],
                $value['tiro3'],
                $value['destinofinal3'],
                $value['tiro4'],
                $value['destinofinal4'],
                $value['tiro5'],
                $value['destinofinal5'],
                $value['tiro6'],
                $value['destinofinal6'],
                $value['tiro7'],
                $value['destinofinal7'],
                $value['tiro8'],
                $value['destinofinal8'],
                $value['tiro9'],
                $value['destinofinal9'],
                $value['tiro10'],
                $value['destinofinal10'],
                $value['totalpeso'],
                $value['observaciones'],
                $value['estatus'],
                $button

            );
        }

        $this->render_template('correcciones/filtros', $this->data, $result);
    }


    public function getCorreccionData()
    {
        $result = array('data' => array());
        $data = $this->model_correcciones->getCorreccionData();

        foreach ($data as $key => $value) {

            $button = '';

            if (in_array('updateEditarRegistro', $this->permission)) {
                $button .= '<a href="' . base_url('correcciones/update/' . $value['registro_id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            // Dividir las columnas concatenadas
            $recolectores = explode(',', trim($value['recolectores']));
            $folios = explode(',', trim($value['folios']));
            $descripciones = explode(',', trim($value['descripciones']));
            $pesos_folios = explode(',', trim($value['pesos_folios']));

            // Crear un array para almacenar los datos de esta fila
            $rowData = array(
                $value['registro_id'],
                $value['unidad_numero'],
                $value['asignacion_nombre'],
                $value['semana'],
                $value['nombres'],
                $value['dia'],
                $value['fecha_salida'],
                $value['turno_nombre'],
                $value['ruta_nombre'],
                $value['alias_nombre'],
                $value['operador_nombre'],
                $value['numrecolectores'],
            );

            // Añadir 10 recolectores
            for ($i = 0; $i < 5; $i++) {
                $rowData[] = isset($recolectores[$i]) ? $recolectores[$i] : '';
            }

            // Continuar agregando el resto de los datos
            $rowData = array_merge($rowData, array(
                $value['km_salida'],
                $value['km_entrada'],
                $value['recorrido'],
                $value['litroscargados'],
                $value['rendimiento'],
                $value['hora_salida'],
                $value['hora_entrada'],
                $value['hora_tablero'],
                $value['tiempo_ruta'],
                $value['peso_total'],
                $value['destinofinal_nombre'],
                $value['numfolios']
            ));

            // Añadir 10 sets de columnas de folio (folio_id, folio, descripción, peso)
            for ($i = 0; $i < 10; $i++) {
                $rowData[] = isset($folios[$i]) ? $folios[$i] : '';
                $rowData[] = isset($descripciones[$i]) ? $descripciones[$i] : '';
                $rowData[] = isset($pesos_folios[$i]) ? $pesos_folios[$i] : '';
            }

            // Agregar las observaciones y el estatus al final
            $rowData[] = $value['observaciones'];
            $rowData[] = $value['estatus'];

            $rowData[] = $button;

            $result['data'][$key] = $rowData;
        }

        echo json_encode($result);
    }

    public function update($registro_id)
    {
        if (!in_array('updateEditarRegistro', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if (!$registro_id) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('asignacion_id', 'asignacion', 'trim|required');
        $this->form_validation->set_rules('unidad_id', 'unidad', 'trim|required');
        $this->form_validation->set_rules('semana', 'semana', 'trim|required');
        $this->form_validation->set_rules('dia', 'dia', 'trim|required');
        $this->form_validation->set_rules('horasalida', 'hora salida', 'trim|required');
        $this->form_validation->set_rules('horaentrada', 'hora entrada', 'trim|required');
        $this->form_validation->set_rules('horatablero', 'hora tablero', 'trim|required');
        $this->form_validation->set_rules('tiemporuta', 'tiempo ruta', 'trim|required');
        $this->form_validation->set_rules('alias_id', 'alias', 'trim|required');
        $this->form_validation->set_rules('operador_id', 'operador', 'trim|required');
        $this->form_validation->set_rules('norecolectores', '# recolectores', 'trim|required');
        $this->form_validation->set_rules('kmsalida', 'km salida', 'trim|required');
        $this->form_validation->set_rules('kmentrada', 'km entrada', 'trim|required');
        $this->form_validation->set_rules('Recorrido', 'Recorrido', 'trim|required');
        $this->form_validation->set_rules('Litroscargados', 'Litros cargados', 'trim|required');
        $this->form_validation->set_rules('Rendimiento', 'Rendimiento', 'trim|required');
        $this->form_validation->set_rules('ntiros', '# tiros', 'trim|required');
        $this->form_validation->set_rules('totalpeso', 'totalpeso', 'trim|required');
        $this->form_validation->set_rules('observaciones', 'observaciones', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'asignacion_id' => $this->input->post('asignacion_id'),
                'unidad_id' => $this->input->post('unidad_id'),
                'semana' => $this->input->post('semana'),
                'dia' => $this->input->post('dia'),
                'hora_salida' => $this->input->post('horasalida'),
                'fecha_salida' => $this->input->post('fechasalida'),
                'hora_entrada' => $this->input->post('horaentrada'),
                'fecha_entrada' => $this->input->post('fechaentrada'),
                'hora_tablero' => $this->input->post('horatablero'),
                'tiempo_ruta' => $this->input->post('tiemporuta'),
                'alias_id' => $this->input->post('alias_id'),
                'operador_id' => $this->input->post('operador_id'),
                'km_salida' => $this->input->post('kmsalida'),
                'km_entrada' => $this->input->post('kmentrada'),
                'recorrido' => $this->input->post('Recorrido'),
                'litroscargados' => $this->input->post('Litroscargados'),
                'Rendimiento' => $this->input->post('Rendimiento'),
                'totalpeso' => $this->input->post('totalpeso'),
                'observaciones' => $this->input->post('observaciones'),
                'updated_at' => date('Y-m-d h:i:s')
            );

            $recolectoresid = array(
                $this->input->post('recolector_id1'),
                $this->input->post('recolector_id2'),
                $this->input->post('recolector_id3'),
                $this->input->post('recolector_id4'),
                $this->input->post('recolector_id5')
            );

            $recolectores = array_filter($recolectoresid, function ($value) {
                return !empty($value);
            });

            $count = array_count_values($recolectores);
            $duplicates = array();
            foreach ($count as $key => $value) {
                if ($value > 1) {
                    $duplicates[] = $key;
                }
            }

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
                $update = $this->model_correcciones->update($data, $registro_id);
                $this->tripulacion($registro_id, $recolectoresid);
                $this->tiros($registro_id, $tirosid);
                $this->session->set_flashdata('success', 'Actualizado con éxito');
                redirect('correcciones/', 'refresh');
            } else if (!empty($duplicates)) {

                $this->session->set_flashdata('error', 'Tickets duplicados');
                redirect('correcciones/update/' . $registro_id, 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Ocurrio un error');
                redirect('correcciones/update/' . $registro_id, 'refresh');
            }
        } else {

            $data = $this->model_correcciones->getCorreccionData($registro_id);
            $this->data['registro_data'] = $data;
            $registro_obj = $data[0];
            $recolector_ids = $registro_obj->recolector_id ? explode(',', $registro_obj->recolector_id) : [];
            $recolectores = $registro_obj->recolectores ? explode(',', $registro_obj->recolectores) : [];
            $folios = $registro_obj->folios ? explode(',', $registro_obj->folios) : [];
            $descripciones = $registro_obj->descripciones ? explode(',', $registro_obj->descripciones) : [];
            $pesos_folios = $registro_obj->pesos_folios ? explode(',', $registro_obj->pesos_folios) : [];
            $this->data['recolector_ids'] = $recolector_ids;
            $this->data['recolectores'] = $recolectores;
            $this->data['folios'] = $folios;
            $this->data['descripciones'] = $descripciones;
            $this->data['pesos_folios'] = $pesos_folios;
            $this->render_template('correcciones/edit', $this->data);
        }
    }

    public function tripulacion($update, $recolector_id_array)
    {
        $tripulacionData = array(
            'registro_id' => $update,
            'recolector1' => isset($recolector_id_array[0]) ? $recolector_id_array[0] : 0,
            'recolector2' => isset($recolector_id_array[1]) ? $recolector_id_array[1] : 0,
            'recolector3' => isset($recolector_id_array[2]) ? $recolector_id_array[2] : 0,
            'recolector4' => isset($recolector_id_array[3]) ? $recolector_id_array[3] : 0,
            'recolector5' => isset($recolector_id_array[4]) ? $recolector_id_array[4] : 0,
            'numrecolectores' => $this->input->post('norecolectores'),
        );

        $this->model_correcciones->actualizarTripulacion($update, $tripulacionData);
    }

    public function tiros($update, $tirosid)
    {
        $tirosArray = array(
            'registro_id' => $update,
            'tiro1' => isset($tirosid[0]) ? $tirosid[0] : 0,
            'tiro2' => isset($tirosid[1]) ? $tirosid[1] : 0,
            'tiro3' => isset($tirosid[2]) ? $tirosid[2] : 0,
            'tiro4' => isset($tirosid[3]) ? $tirosid[3] : 0,
            'tiro5' => isset($tirosid[4]) ? $tirosid[4] : 0,
            'tiro6' => isset($tirosid[5]) ? $tirosid[5] : 0,
            'tiro7' => isset($tirosid[6]) ? $tirosid[6] : 0,
            'tiro8' => isset($tirosid[7]) ? $tirosid[7] : 0,
            'tiro9' => isset($tirosid[8]) ? $tirosid[8] : 0,
            'tiro10' => isset($tirosid[9]) ? $tirosid[9] : 0,
            'numtiros' => $this->input->post('ntiros'),
        );

        $this->model_correcciones->actualizarTiros($update, $tirosArray);
    }

    public function asignacionlist()
    {

        $postData = $this->input->post();

        $data = $this->model_correcciones->searchasignacion($postData);

        echo json_encode($data);
    }

    public function unidadlist()
    {

        $postData = $this->input->post();

        $data = $this->model_correcciones->searchUnidad($postData);

        echo json_encode($data);
    }

    public function aliaslist()
    {

        $postData = $this->input->get('term');

        $result = $this->model_correcciones->searchalias($postData);

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

    public function operadoreslist()
    {

        $postData = $this->input->post();


        $data = $this->model_correcciones->searchoperador($postData);

        echo json_encode($data);
    }

    public function recolectoreslist()
    {

        $postData = $this->input->post();


        $data = $this->model_correcciones->searchrecolectores($postData);

        echo json_encode($data);
    }

    public function manifiestoslist($unidad_id)
    {

        $postData = $this->input->get('term');

        $result = $this->model_correcciones->searchmanifiestos($postData, $unidad_id);

        $data = array();
        foreach ($result as $row) {
            $data[] = array(
                'label' => 'Folio: ' . $row->nummanifiesto . ' | Peso: ' . $row->peso_total,
                'value' => $row->manifiesto_id,
                'peso' => $row->peso_total,
                'destino' => $row->destinofinal_nombre

            );
        }
        echo json_encode($data);
    }
}
