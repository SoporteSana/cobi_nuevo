<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sucursales extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Sucursales';

		$this->load->model('model_sucursales');
	}

	public function index()
	{
		if (!in_array('viewSucursales', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('sucursales/index', $this->data);
	}

	public function fetchSucursalesDataById($id)
	{
		if ($id) {
			$data = $this->model_sucursales->getSucursalData($id);
			echo json_encode($data);
		}
	}

	public function fetchSucursalesData()
	{
		$result = array('data' => array());

		$data = $this->model_sucursales->getSucursalData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateSucursales', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-default" onclick="updateSucursales(' . $value['sucursal_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if (in_array('deleteSucursales', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeSucursales(' . $value['sucursal_id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['empresa_nombre'],
				$value['sucursal_nombre'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		if (!in_array('createSucursales', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_name', 'nombre', 'trim|required');
		$this->form_validation->set_rules('create_empresa', 'turno', 'trim|required');
		$this->form_validation->set_rules('create_active', 'Activo', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_nombre' => $this->input->post('create_name'),
				'empresa_id' => $this->input->post('create_empresaid'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_sucursales->create($data);
			if ($create == true) {
				$response['success'] = true;
				$response['messages'] = 'Creado con éxito';
			} else {
				$response['success'] = false;
				$response['messages'] = '	Ocurrio un error';
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
		if (!in_array('updateSucursales', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('edit_name', 'nombre', 'trim|required');
			$this->form_validation->set_rules('edit_empresa', 'turno', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Activo', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'sucursal_nombre' => $this->input->post('edit_name'),
					'empresa_id' => $this->input->post('edit_empresaid'),
					'estatus' => $this->input->post('edit_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_sucursales->update($data, $id);
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
		if (!in_array('deleteSucursales', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$sucursal_id = $this->input->post('sucursal_id');

		$response = array();
		if ($sucursal_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_sucursales->update($data, $sucursal_id);
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

	public function empresaslist()
	{

		$postData = $this->input->post();

		$data = $this->model_sucursales->searchEmpresa($postData);

		echo json_encode($data);
	}
}
