<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Unidades extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Unidades';

		$this->load->model('model_unidades');
	}

	public function index()
	{

		if (!in_array('viewUnidad', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('unidades/index', $this->data);
	}

	public function fetchUnidadesDataById($id)
	{
		if ($id) {
			$data = $this->model_unidades->getUnidadData($id);
			echo json_encode($data);
		}

		return false;
	}

	public function fetchUnidadData()
	{
		$result = array('data' => array());

		$data = $this->model_unidades->getUnidadData();

		foreach ($data as $key => $value) {

			$buttons = '';

			if (in_array('updateUnidad', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="updateUnidad(' . $value['unidad_id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if (in_array('deleteUnidad', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="deleteUnidad(' . $value['unidad_id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}


			$status = ($value['estatus'] == 0) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['unidad_numero'],
				$value['unidad_placas'],
				$status,
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function create()
	{
		if (!in_array('createUnidad', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('create_numero', 'Numero', 'trim|required');
		$this->form_validation->set_rules('create_placas', 'Placas', 'trim|required');
		$this->form_validation->set_rules('create_active', 'Activo', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
				'unidad_numero' => $this->input->post('create_numero'),
				'unidad_placas' => $this->input->post('create_placas'),
				'estatus' => $this->input->post('create_active'),
				'created_at' => date('Y-m-d h:i:s'),
			);

			$create = $this->model_unidades->create($data);
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

		if (!in_array('updateUnidad', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if ($id) {
			$this->form_validation->set_rules('edit_numero', 'Numero', 'trim|required');
			$this->form_validation->set_rules('edit_placas', 'Placas', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Activo', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'unidad_numero' => $this->input->post('edit_numero'),
					'unidad_placas' => $this->input->post('edit_placas'),
					'estatus' => $this->input->post('edit_active'),
					'updated_at' => date('Y-m-d h:i:s'),
				);

				$update = $this->model_unidades->update($data, $id);
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
		if (!in_array('deleteUnidad', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$unidad_id = $this->input->post('unidad_id');

		$response = array();
		if ($unidad_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_unidades->update($data, $unidad_id);
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
