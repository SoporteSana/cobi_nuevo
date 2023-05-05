<?php

class Model_Unidades extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getActiveUnidad()
	{
		$sql = "SELECT * FROM `unidades` WHERE estatus = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getUnidadData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');
		$respuesta = array();

		if ($id) {
			$sql = "SELECT * FROM `unidades` WHERE unidad_id = ?";
			$query = $this->db->query($sql, array($id));
			$respuesta = $query->row_array();
		} else {
			if ($username == 'admin') {
				$sql = "SELECT * FROM `unidades` WHERE estatus BETWEEN 0 AND 1";
				$query = $this->db->query($sql);
				$respuesta = $query->result_array();
			} else {
				$sql = "SELECT * FROM `unidades` WHERE estatus BETWEEN 0 AND 1 AND sucursal_id = $sucursal_id";
				$query = $this->db->query($sql);
				$respuesta = $query->result_array();
			}
		}
		return $respuesta;
	}


	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('unidades', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('unidad_id', $id);
			$update = $this->db->update('unidades', $data);
			return ($update == true) ? true : false;
		}
	}
}
