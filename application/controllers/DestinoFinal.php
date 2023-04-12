<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Destinofinal extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Destino Final';

		$this->load->model('model_destinofinal');
	}

	public function index()
	{

		if (!in_array('viewDestinoFinal', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('destinofinal/index', $this->data);
	}

	public function fetchDestinofinalDataById($id)
	{
		if ($id) {
			$data = $this->model_destinofinal->getDestinofinalData($id);
			echo json_encode($data);
		}

		return false;
	}

	public function fetchDestinofinalData()
	{
		$result = array('data' => array());

		$data = $this->model_destinofinal->getDestinofinalData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateDestinoFinal', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="updateDestinofinal(' . $value['destinofinal_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if (in_array('deleteDestinoFinal', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="deleteDestinofinal(' . $value['destinofinal_id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}


			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['destinofinal_nombre'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		if (!in_array('createDestinoFinal', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_nombre', 'Destino final', 'trim|required');
		$this->form_validation->set_rules('create_active', 'Activo', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
				'destinofinal_nombre' => $this->input->post('create_nombre'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_destinofinal->create($data);
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

		if (!in_array('updateDestinoFinal', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('edit_nombre', 'Destino final', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Activo', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'destinofinal_nombre' => $this->input->post('edit_nombre'),
					'estatus' => $this->input->post('edit_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_destinofinal->update($data, $id);
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
			$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	public function remove()
	{
		if (!in_array('deleteDestinoFinal', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$destinofinal_id = $this->input->post('destinofinal_id');

		$response = array();
		if ($destinofinal_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_destinofinal->update($data, $destinofinal_id);
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
}
