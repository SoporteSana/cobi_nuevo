<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alias extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Alias';

		$this->load->model('model_alias');
	}

	public function index()
	{
		if (!in_array('viewAlias', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('alias/index', $this->data);
	}

	public function fetchAliasDataById($id)
	{
		if ($id) {
			$data = $this->model_alias->getAliasData($id);
			echo json_encode($data);
		}
	}

	public function fetchAliasData()
	{
		$result = array('data' => array());

		$data = $this->model_alias->getAliasData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateAlias', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-default" onclick="updateAlias(' . $value['alias_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if (in_array('deleteAlias', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeAlias(' . $value['alias_id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['alias_nombre'],
				$value['turno_nombre'],
				$value['ruta_nombre'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{

		if (!in_array('createAlias', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_name', 'nombre', 'trim|required');
		$this->form_validation->set_rules('create_turno', 'turno', 'trim|required');
		$this->form_validation->set_rules('create_ruta', 'ruta', 'trim|required');
		$this->form_validation->set_rules('create_active', 'Activo', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
				'alias_nombre' => $this->input->post('create_name'),
				'turno_id' => $this->input->post('create_turnoid'),
				'ruta_id' => $this->input->post('create_rutaid'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_alias->create($data);
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
		if (!in_array('updateAlias', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('edit_name', 'nombre', 'trim|required');
			$this->form_validation->set_rules('edit_turno', 'turno', 'trim|required');
			$this->form_validation->set_rules('edit_ruta', 'ruta', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Activo', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'alias_nombre' => $this->input->post('edit_name'),
					'turno_id' => $this->input->post('edit_turnoid'),
					'ruta_id' => $this->input->post('edit_rutaid'),
					'estatus' => $this->input->post('edit_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_alias->update($data, $id);
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
		if (!in_array('deleteAlias', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$alias_id = $this->input->post('alias_id');

		$response = array();
		if ($alias_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_alias->update($data, $alias_id);
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

	public function turnolist()
	{

		$postData = $this->input->post();

		$data = $this->model_alias->searchTurno($postData);

		echo json_encode($data);
	}

	public function rutalist()
	{

		$postData = $this->input->post();

		$data = $this->model_alias->searchRuta($postData);

		echo json_encode($data);
	}
}
