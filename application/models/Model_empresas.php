<?php

class Model_empresas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getEmpresasData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM `empresas` where empresa_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM `empresas` WHERE estatus IN (0, 1)";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('empresas', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('empresa_id', $id);
			$update = $this->db->update('empresas', $data);
			return ($update == true) ? true : false;
		}
	}
}
