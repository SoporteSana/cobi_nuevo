<?php

class Model_Turnos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getTurnoData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {


			$sql = "SELECT * FROM `turnos` WHERE estatus BETWEEN 0 AND 1";
			$query = $this->db->query($sql);
			return $query->result_array();
		} else {


			$sql = "SELECT * FROM `turnos` WHERE estatus BETWEEN 0 AND 1 AND sucursal_id = $sucursal_id";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		if ($id) {
			$sql = "SELECT * FROM `turnos` WHERE turno_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('turnos', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('turno_id', $id);
			$update = $this->db->update('turnos', $data);
			return ($update == true) ? true : false;
		}
	}
}
