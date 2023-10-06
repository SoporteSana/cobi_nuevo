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

    public function fetchManifiestosData($manifiesto = null)
    {
        $sucursal_id = $this->session->userdata('sucursal_id');
        $result = array('data' => array());
        $manifiestos = $this->model_manifiestos->getManifiestosData($sucursal_id, $manifiesto);

        foreach ($manifiestos as $manifiesto) {
            $folio_ids = explode(',', $manifiesto['folio_ids']);
            $productos = explode(',', $manifiesto['productos'] ?? '');
            $descripciones = explode(',', $manifiesto['descripciones'] ?? '');
            $medidas_ids = explode(',', $manifiesto['medidas_ids'] ?? '');
            $medidas_nombres = explode(',', $manifiesto['medidas_nombres'] ?? '');
            $total_cantidad_concatenadas = explode(',', $manifiesto['total_cantidad_concatenadas'] ?? '');

            $objData = array(
                'manifiesto_id' => $manifiesto['manifiesto_id'],
                'nummanifiesto' => $manifiesto['nummanifiesto'],
                'fecha' => $manifiesto['fecha'],
                'unidad_numero' => $manifiesto['unidad_numero'],
                'destinofinal_nombre' => $manifiesto['destinofinal_nombre'],
                'productos' => array()
            );

            foreach ($folio_ids as $i => $folio_id) {
                $producto = array(
                    'folio_id' => $folio_id,
                    'producto' => $productos[$i] ?? '',
                    'descripcion' => $descripciones[$i] ?? '',
                    'medida_id' => $medidas_ids[$i] ?? '',
                    'medida_nombre' => $medidas_nombres[$i] ?? '',
                    'total_cantidad_concatenada' => $total_cantidad_concatenadas[$i] ?? ''
                );
                $objData['productos'][] = $producto;
            }

            if (in_array('updateVigilancia', $this->permission)) {
                $objData['button'] = '<a href="' . base_url('manifiestos/update/' . $manifiesto['manifiesto_id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            $result['data'][] = $objData;
        }

        echo json_encode($result);
    }

    public function fetchManifiestosDataedit($manifiesto = null)
    {
        $sucursal_id = $this->session->userdata('sucursal_id');
        $result = array('data' => array());
        $manifiestos = $this->model_manifiestos->getManifiestosDataEdit($sucursal_id, $manifiesto);

        foreach ($manifiestos as $manifiesto) {
            $folio_ids = explode(',', $manifiesto->folio_ids);
            $categoria_nombre = explode(',', $manifiesto->categoria_nombre ?? '');
            $productos = explode(',', $manifiesto->productos ?? '');
            $descripciones = explode(',', $manifiesto->descripciones ?? '');
            $cantidad = explode(',', $manifiesto->cantidad ?? '');
            $medidas_nombres = explode(',', $manifiesto->medidas_nombres ?? '');
            $total_cantidad_concatenadas = explode(',', $manifiesto->total_cantidad_concatenadas ?? '');

            $objData = array(
                'manifiesto_id' => $manifiesto->manifiesto_id,
                'nummanifiesto' => $manifiesto->nummanifiesto,
                'fecha' => $manifiesto->fecha,
                'unidad_id' => $manifiesto->unidad_id,
                'unidad_numero' => $manifiesto->unidad_numero,
                'destinofinal_id' => $manifiesto->destinofinal_id,
                'destinofinal_nombre' => $manifiesto->destinofinal_nombre,
                
            );

            $result['data'][] = $objData;
        }
        return $result;
    }

    public function eliminar()
	{
		if (!in_array('deleteTicket', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$ticket_id = $this->input->post('ticket_id');

		$response = array();
		if ($ticket_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_tickets->deletemanifiesto($data, $ticket_id);
			if ($update == true) {
				$response['success'] = true;
				$response['messages'] = "Eliminado con éxito";
			} else {
				$response['success'] = false;
				$response['messages'] = "Ocurrio un error";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Ocurrio un error";
		}

		echo json_encode($response);
	}


    public function showProducts($manifiesto_id)
    {

        $result = $this->model_manifiestos->getProducts($manifiesto_id);


        echo json_encode($result);
    }

    public function showProductopesos($manifiesto_id)
    {

        $result = $this->model_manifiestos->getpesostotales($manifiesto_id);


        echo json_encode($result);
    }


    public function create()
    {

        if (!in_array('createVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('numeroeconomico_id', 'numero de unidad', 'trim|required');
        $this->form_validation->set_rules('nummanifiesto', 'numero manifiesto', 'trim|required');
        $this->form_validation->set_rules('destino', 'destino', 'trim|required');

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
        $sucursal_id = $this->session->userdata('sucursal_id');

        if (!in_array('updateVigilancia', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if (!$manifiesto_id) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('nummanifiesto', 'numero manifiesto', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'nummanifiesto' => $this->input->post('nummanifiesto'),
                'fecha' => $this->input->post('fecha'),
                'unidad_id' => $this->input->post('unidad_id'),
                'destinofinal_id' => $this->input->post('destino_id')
            );

            // Actualizar el manifiesto principal
            $this->model_manifiestos->update($data, $manifiesto_id);

            $this->session->set_flashdata('success', 'Actualizado con éxito');
            redirect('manifiestos/', 'refresh');
        } else {
            $registros =  $this->fetchManifiestosDataedit($manifiesto_id);
            $this->data['registros'] = $registros;
            $productos = $this->model_manifiestos->getproductosedit($manifiesto_id, 0);
            $this->data['productos'] = $productos;
            $medidas = $this->model_manifiestos->getMedidasData();
            $this->data['medidas'] = $medidas;
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

    public function eliminarProducto()
    {
        $productoId = $this->input->post('producto_id');
        $this->model_manifiestos->delete($productoId);
    }

    public function eliminarManifiesto($data)
    {
        $this->model_manifiestos->deletemanifiesto($data);
    }

    public function addfolio($manifiesto_id)
    {

        $data = array(
            'tipoProducto_id' => $this->input->post('producto_id'),
            'descripcion' => $this->input->post('descripcion'),
            'cantidad' => $this->input->post('cantidad'),
            'medidas_id' => $this->input->post('medida')
        );

        $folio_id = $this->model_manifiestos->agregarfolios($data);

        if ($folio_id) {

            $foliosData = array(
                'manifiesto_id' => $manifiesto_id,
                'folio_id' => $folio_id
            );

            $this->model_manifiestos->agregarmanifiestosfolios($foliosData);
        }

        $registros =  $this->fetchManifiestosDataedit($manifiesto_id);
        $this->data['registros'] = $registros;
        $medidas = $this->model_manifiestos->getMedidasData();
        $this->data['medidas'] = $medidas;
        $this->render_template('manifiestos/update', $this->data);
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
                'value' => $row->tipoProducto_id,
                'value2' => $row->categoriaProducto_id

            );
        }
        echo json_encode($data);
    }
}
