<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Operadores extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Operadores';

		$this->load->model('model_operadores');
	}

	public function index()
	{
		if (!in_array('viewOperador', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('operadores/index', $this->data);
	}

	public function fetchOperadoresDataById($id)
	{
		if ($id) {
			$data = $this->model_operadores->getOperadoresData($id);
			echo json_encode($data);
		}
	}

	public function fetchOperadoresData()
	{
		$result = array('data' => array());

		$data = $this->model_operadores->getOperadoresData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateOperador', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-default" onclick="updateOperador(' . $value['operador_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if (in_array('deleteOperador', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeOperador(' . $value['operador_id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['operador_nombre'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		if (!in_array('createOperador', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_name', 'nombre', 'trim|required');
		$this->form_validation->set_rules('create_active', 'Activo', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
				'operador_nombre' => $this->input->post('create_name'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_operadores->create($data);
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
		if (!in_array('updateOperador', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('edit_name', 'nombre', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Activo', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'operador_nombre' => $this->input->post('edit_name'),
					'estatus' => $this->input->post('edit_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_operadores->update($data, $id);
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
		if (!in_array('deleteOperador', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$operador_id = $this->input->post('operador_id');

		$response = array();
		if ($operador_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_operadores->update($data, $operador_id);
			if ($update == true) {
				$response['success'] = true;
				$response['messages'] = "	Eliminado con éxito";
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
