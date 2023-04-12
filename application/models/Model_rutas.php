<?php

class Model_rutas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getRutasData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$sql = "SELECT * FROM `rutas` WHERE estatus BETWEEN 0 AND 1";
			$query = $this->db->query($sql);
			return $query->result_array();
		} else {

			$sql = "SELECT * FROM `rutas` WHERE estatus BETWEEN 0 AND 1 AND sucursal_id = $sucursal_id";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		if ($id) {
			$sql = "SELECT * FROM `rutas` where ruta_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('rutas', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('ruta_id', $id);
			$update = $this->db->update('rutas', $data);
			return ($update == true) ? true : false;
		}
	}
}
