<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manifiestos extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Manifiestos';

        $this->load->model('model_manifiestos');

        $this->load->library('session');
    }

    public function index()
    {
        if (!in_array('viewVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('manifiestos/index', $this->data);
    }

    public function fetchManifiestosData()
    {
        $sucursal_id = $this->session->userdata('sucursal_id');
        $result = array('data' => array());
        $manifiestos = $this->model_manifiestos->getManifiestosData($sucursal_id);

        foreach ($manifiestos as $manifiesto) {
            $folio_ids = explode(',', $manifiesto['folio_ids']);
            $productos = explode(',', $manifiesto['productos'] ?? '');
            $descripciones = explode(',', $manifiesto['descripciones'] ?? '');
            $medidas_ids = explode(',', $manifiesto['medidas_ids'] ?? '');
            $medidas_nombres = explode(',', $manifiesto['medidas_nombres'] ?? '');
            $total_cantidad_concatenadas = explode(',', $manifiesto['total_cantidad_concatenadas'] ?? '');

            $rowData = array(
                $manifiesto['manifiesto_id'],
                $manifiesto['nummanifiesto'],
                $manifiesto['fecha'],
                $manifiesto['unidad_id'],
                $manifiesto['unidad_numero'],
                $manifiesto['destinofinal_id'],
                $manifiesto['destinofinal_nombre']
            );

            foreach ($folio_ids as $i => $folio_id) {
                $rowData[] = $folio_id;
                $rowData[] = $productos[$i] ?? '';
                $rowData[] = $descripciones[$i] ?? '';
                $rowData[] = $medidas_ids[$i] ?? '';
                $rowData[] = $medidas_nombres[$i] ?? '';
                $rowData[] = $total_cantidad_concatenadas[$i] ?? '';
            }

            $button = '';
            if (in_array('updateVigilancia', $this->permission)) {
                $button .= '<a href="' . base_url('manifiestos/update/' . $manifiesto['manifiesto_id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }
            $rowData[] = $button;  // Agrega el botón a la última columna

            $result['data'][] = $rowData;
        }

        echo json_encode($result);
    }

    public function create()
    {

        if (!in_array('createVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('numeroeconomico', 'numero de unidad', 'trim|required');
        $this->form_validation->set_rules('numeroeconomico_id', 'numero de unidad', 'trim|required');
        $this->form_validation->set_rules('nummanifiesto', 'numero manifiesto', 'trim|required');
        $this->form_validation->set_rules('fecha', 'numero fecha', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'sucursal_id' => $this->session->userdata('sucursal_id'),
                'nummanifiesto' => $this->input->post('nummanifiesto'),
                'unidad_id' => $this->input->post('numeroeconomico_id'),
                'fecha' => $this->input->post('fecha'),
                'destinofinal_id' => $this->input->post('destino_id'),
                'created_at' => date('Y-m-d h:i:s')
            );

            $productos_ids = $this->input->post('producto_id');
            $descripciones = $this->input->post('descripcion');
            $cantidades = $this->input->post('cantidad');
            $medida_id = $this->input->post('medida');

            $folios_manifiestos = array();
            for ($i = 0; $i < count($productos_ids); $i++) {
                $folios_manifiestos[] = array(
                    'tipoProducto_id' => $productos_ids[$i],
                    'descripcion' => $descripciones[$i],
                    'cantidad' => $cantidades[$i],
                    'medidas_id' => $medida_id[$i]
                );
            }

            if (count($folios_manifiestos) > 0) {
                $create = $this->model_manifiestos->create($data);
                $this->folios($create, $folios_manifiestos); // Asegúrate de que la función folios() pueda manejar un array de arrays
                $this->session->set_flashdata('success', 'Creado con éxito');
                redirect('manifiestos/', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Ocurrio un error');
                redirect('manifiestos/create', 'refresh');
            }
        } else {
            $diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
            $data2 = array(
                'semana_actual' => date("W"),
                'hora_salida' => date('Y-m-d H:i:s', strtotime('-1 hour')),
                'dia' => $diassemana[date('w')]
            );

            $medidas = $this->model_manifiestos->getMedidasData();
            $this->data['medidas'] = $medidas;
            $this->render_template('manifiestos/create', $this->data, $data2);
        }
    }

    public function folios($create, $folios_manifiestos)
    {
        $folios_ids = $this->model_manifiestos->insertarFolios($folios_manifiestos);

        if ($folios_ids) {
            $manifiestofolio = array();

            foreach ($folios_ids as $folio_id) {
                $manifiestofolio[] = array(
                    'manifiesto_id' => $create,
                    'folio_id' => $folio_id
                );
            }

            $this->model_manifiestos->insertarFolioManifiesto($manifiestofolio);
        }
    }

    public function update($manifiesto_id)
    {

        if (!in_array('updateVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if (!$manifiesto_id) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('nummanifiesto', 'numero manifiesto', 'trim|required');
        $this->form_validation->set_rules('numeroeconomico_id', 'numero unidad', 'trim|required');
        $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
        $this->form_validation->set_rules('destino_id', 'destino', 'trim|required');
        $this->form_validation->set_rules('pesototal', 'peso total', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'nummanifiesto' => $this->input->post('nummanifiesto'),
                'unidad_id' => $this->input->post('numeroeconomico_id'),
                'fecha' => $this->input->post('fecha'),
                'destinofinal_id' => $this->input->post('destino_id'),
                'peso_total' => $this->input->post('pesototal'),
                'updated_at' => date('Y-m-d h:i:s')
            );

            $folios_manifiestos = array(
                $this->input->post('FolioId_1'),
                $this->input->post('Folio_1'),
                $this->input->post('Descripcion_1'),
                $this->input->post('Peso_1'),
                $this->input->post('FolioId_2'),
                $this->input->post('Folio_2'),
                $this->input->post('Descripcion_2'),
                $this->input->post('Peso_2'),
                $this->input->post('FolioId_3'),
                $this->input->post('Folio_3'),
                $this->input->post('Descripcion_3'),
                $this->input->post('Peso_3'),
                $this->input->post('FolioId_4'),
                $this->input->post('Folio_4'),
                $this->input->post('Descripcion_4'),
                $this->input->post('Peso_4'),
                $this->input->post('FolioId_5'),
                $this->input->post('Folio_5'),
                $this->input->post('Descripcion_5'),
                $this->input->post('Peso_5'),
                $this->input->post('FolioId_6'),
                $this->input->post('Folio_6'),
                $this->input->post('Descripcion_6'),
                $this->input->post('Peso_6'),
                $this->input->post('FolioId_7'),
                $this->input->post('Folio_7'),
                $this->input->post('Descripcion_7'),
                $this->input->post('Peso_7'),
                $this->input->post('FolioId_8'),
                $this->input->post('Folio_8'),
                $this->input->post('Descripcion_8'),
                $this->input->post('Peso_8'),
                $this->input->post('FolioId_9'),
                $this->input->post('Folio_9'),
                $this->input->post('Descripcion_9'),
                $this->input->post('Peso_9'),
                $this->input->post('FolioId_10'),
                $this->input->post('Folio_10'),
                $this->input->post('Descripcion_10'),
                $this->input->post('Peso_10'),

            );

            $folios_manifiestos = array_filter($folios_manifiestos);

            if (count($folios_manifiestos) > 0) {
                $this->model_manifiestos->update($data, $manifiesto_id);
                $this->actualizarfolios($manifiesto_id, $folios_manifiestos);
                $this->session->set_flashdata('success', 'Creado con éxito');
                redirect('manifiestos/', 'refresh');
            } else if (!empty($duplicates)) {

                $this->session->set_flashdata('error', 'Recolectores duplicados');
                redirect('manifiestos/create', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Ocurrio un error');
                redirect('manifiestos/create', 'refresh');
            }
        } else {

            $registro_data = $this->model_manifiestos->getManifiestosData($manifiesto_id);
            $this->data['registro_data'] = $registro_data;
            $registro_obj = $registro_data[0];
            $folios_ids = $registro_obj->folio_ids ? explode(',', $registro_obj->folio_ids) : [];
            $folios = $registro_obj->folios ? explode(',', $registro_obj->folios) : [];
            $descripciones = $registro_obj->descripciones ? explode(',', $registro_obj->descripciones) : [];
            $pesos_folios = $registro_obj->pesos_folios ? explode(',', $registro_obj->pesos_folios) : [];
            $this->data['folios_ids'] = $folios_ids;
            $this->data['folios'] = $folios;
            $this->data['descripciones'] = $descripciones;
            $this->data['pesos_folios'] = $pesos_folios;
            $this->render_template('manifiestos/update', $this->data);
        }
    }

    public function actualizarfolios($manifiesto_id, $folios_manifiestos)
    {
        $foliosarray = array();
        $newFolios = array();
        $manifiestofolio = array(); // Array para almacenar la relación manifiesto-folio

        for ($i = 0; $i < count($folios_manifiestos); $i += 4) {
            $folioData = array(
                'folio' => $folios_manifiestos[$i + 1],
                'descripcion' => $folios_manifiestos[$i + 2],
                'peso_folio' => $folios_manifiestos[$i + 3]
            );

            if (isset($folios_manifiestos[$i]) && $folios_manifiestos[$i] != null) {
                $folioData['folio_id'] = $folios_manifiestos[$i];
                $foliosarray[] = $folioData;
            } else {
                $newFolios[] = $folioData;
            }
        }

        // Actualizar los folios existentes
        $folios_ids = $this->model_manifiestos->updateFolios($foliosarray);

        // Insertar nuevos folios y obtener sus IDs
        foreach ($newFolios as $newFolio) {
            $folio_id = $this->model_manifiestos->insertarFolios($newFolio);
            if ($folio_id) {
                $folios_ids[] = $folio_id;
            }
        }

        // Asociar los folios (tanto nuevos como existentes) al manifiesto
        if ($folios_ids) {
            foreach ($folios_ids as $folio_id) {
                $manifiestofolio[] = array(
                    'manifiesto_id' => $manifiesto_id,
                    'folio_id' => $folio_id // Asegúrate de que $folio_id es un valor escalar aquí
                );
            }

            $this->model_manifiestos->updateFolioManifiesto($manifiesto_id, $manifiestofolio);
        }
    }

    public function unidadlist()
    {

        $postData = $this->input->post();

        $data = $this->model_manifiestos->searchUnidad($postData);

        echo json_encode($data);
    }

    public function operadorlist()
    {

        $postData = $this->input->post();

        $data = $this->model_manifiestos->searchoperador($postData);

        echo json_encode($data);
    }

    public function destinolist()
    {

        $postData = $this->input->post();

        $data = $this->model_manifiestos->searchDestino($postData);

        echo json_encode($data);
    }

    public function residuoslist()
    {

        $postData = $this->input->get('term');

        $result = $this->model_manifiestos->searchresiduos($postData);

        $data = array();
        foreach ($result as $row) {
            $data[] = array(
                'label' => $row->tipoProducto_nombre,
                'label2' => $row->categoriaProducto_nombre,
                'value' => $row->tipoProducto_id

            );
        }
        echo json_encode($data);
    }
}
