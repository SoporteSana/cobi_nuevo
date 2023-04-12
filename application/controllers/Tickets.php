<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tickets extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Tickets';

		$this->load->model('model_tickets');
	}

	public function index()
	{

		if (!in_array('viewTicket', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('tickets/index', $this->data);
	}

	public function fetchTicketsDataById($id)
	{
		if ($id) {
			$data = $this->model_tickets->getTicketsData($id);
			echo json_encode($data);
		}

		return false;
	}

	public function fetchTicketsData()
	{
		$result = array('data' => array());

		$data = $this->model_tickets->getTicketsData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateTicket', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-default" onclick="updateTicket(' . $value['ticket_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if (in_array('deleteTicket', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeTicket(' . $value['ticket_id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['folio'],
				$value['unidad_numero'],
				$value['unidad_placas'],
				$value['fecha'],
				$value['peso'],
				$value['destinofinal_nombre'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		if (!in_array('createTicket', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_folio', 'folio', 'trim|required');
		$this->form_validation->set_rules('create_unidad', 'unidad', 'trim|required');
		$this->form_validation->set_rules('create_placas', 'placas', 'trim|required');
		$this->form_validation->set_rules('create_fecha', 'fecha', 'trim|required');
		$this->form_validation->set_rules('create_peso', 'peso', 'trim|required');
		$this->form_validation->set_rules('create_destino', 'destino', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
				'folio' => $this->input->post('create_folio'),
				'unidad_id' => $this->input->post('create_unidad_id'),
				'fecha' => $this->input->post('create_fecha'),
				'peso' => $this->input->post('create_peso'),
				'destinofinal_id' => $this->input->post('create_destino_id'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_tickets->create($data);
			if ($create == true) {
				$response['success'] = true;
				$response['messages'] = 'Creado con éxito';
			} else {
				$response['success'] = false;
				$response['messages'] = 'Ocurrio un error';
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($response);
	}

	public function update($id)
	{

		if (!in_array('updateTicket', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('update_folio', 'folio', 'trim|required');
			$this->form_validation->set_rules('update_unidad', 'unidad', 'trim|required');
			$this->form_validation->set_rules('update_placas', 'placas', 'trim|required');
			$this->form_validation->set_rules('update_fecha', 'fecha', 'trim|required');
			$this->form_validation->set_rules('update_peso', 'peso', 'trim|required');
			$this->form_validation->set_rules('update_destino', 'destino', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'folio' => $this->input->post('update_folio'),
					'unidad_id' => $this->input->post('update_unidad_id'),
					'fecha' => $this->input->post('update_fecha'),
					'peso' => $this->input->post('update_peso'),
					'destinofinal_id' => $this->input->post('update_destino_id'),
					'estatus' => $this->input->post('update_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_tickets->update($data, $id);
				if ($update == true) {
					$response['success'] = true;
					$response['messages'] = 'Actualizado con éxito';
				} else {
					$response['success'] = false;
					$response['messages'] = 'Ocurrio un error';
				}
			} else {
				$response['success'] = false;
				foreach ($_POST as $key => $value) {
					$response['messages'][$key] = form_error($key);
				}
			}
		} else {
			$response['success'] = false;
			$response['messages'] = 'Ocurrio un error';
		}

		echo json_encode($response);
	}

	public function remove()
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

			$update = $this->model_tickets->update($data, $ticket_id);
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

	public function unidadlist()
	{

		$postData = $this->input->post();

		$data = $this->model_tickets->searchUnidad($postData);

		echo json_encode($data);
	}

	public function destinolist()
	{

		$postData = $this->input->post();

		$data = $this->model_tickets->searchDestino($postData);

		echo json_encode($data);
	}
}
