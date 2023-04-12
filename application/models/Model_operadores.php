<?php

class Model_operadores extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getOperadoresData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($id) {
			$sql = "SELECT * FROM `operadores` where operador_id = ? AND estatus BETWEEN 0 AND 1";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		if ($username == 'admin') {

			$sql = "SELECT * FROM `operadores` where estatus BETWEEN 0 AND 1";
			$query = $this->db->query($sql);
			return $query->result_array();
		} else {

			$sql = "SELECT * FROM `operadores` where estatus BETWEEN 0 AND 1 AND sucursal_id = $sucursal_id";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('operadores', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('operador_id', $id);
			$update = $this->db->update('operadores', $data);
			return ($update == true) ? true : false;
		}
	}

	public function countOperadores()
	{
		$sql = "SELECT * FROM `operadores`";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
