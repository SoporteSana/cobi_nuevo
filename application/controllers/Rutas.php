<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rutas extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Rutas';

		$this->load->model('model_rutas');
	}

	public function index()
	{
		if (!in_array('viewRuta', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('rutas/index', $this->data);
	}

	public function fetchRutasDataById($id)
	{
		if ($id) {
			$data = $this->model_rutas->getRutasData($id);
			echo json_encode($data);
		}
	}

	public function fetchRutasData()
	{
		$result = array('data' => array());

		$data = $this->model_rutas->getRutasData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateRuta', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-default" onclick="updateRuta(' . $value['ruta_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if (in_array('deleteRuta', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeRuta(' . $value['ruta_id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['ruta_nombre'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		if (!in_array('createRuta', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_name', 'nombre', 'trim|required');
		$this->form_validation->set_rules('create_active', 'Activo', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
				'ruta_nombre' => $this->input->post('create_name'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_rutas->create($data);
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
		if (!in_array('updateRuta', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('edit_name', 'nombre', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Activo', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'ruta_nombre' => $this->input->post('edit_name'),
					'estatus' => $this->input->post('edit_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_rutas->update($data, $id);
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
		if (!in_array('deleteRuta', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$ruta_id = $this->input->post('ruta_id');

		$response = array();
		if ($ruta_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_rutas->update($data, $ruta_id);
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
