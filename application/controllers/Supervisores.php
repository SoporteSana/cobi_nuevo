<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supervisores extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Supervisores';

		$this->load->model('model_supervisores');
	}

	public function index()
	{

		if (!in_array('viewSupervisor', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('supervisores/index', $this->data);
	}

	public function fetchSupervisorDataById($id)
	{
		if ($id) {
			$data = $this->model_supervisores->getSupervisorData($id);
			echo json_encode($data);
		}

		return false;
	}

	public function fetchSupervisorData()
	{
		$result = array('data' => array());

		$data = $this->model_supervisores->getSupervisorData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateSupervisor', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="updateSupervisor(' . $value['usuario_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['nombre_completo'],
				$value['sucursal_nombre'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		if (!in_array('createSupervisor', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('create_active', 'Activo', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
				'supervisor_nombre' => $this->input->post('create_nombre'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_supervisores->create($data);
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

		if (!in_array('updateSupervisor', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('edit_active', 'Activo', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'estatus' => $this->input->post('edit_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_supervisores->update($data, $id);
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
		if (!in_array('deleteSupervisor', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$supervisor_id = $this->input->post('supervisor_id');

		$response = array();
		if ($supervisor_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_supervisores->update($data, $supervisor_id);
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
