<?php

class Model_sucursales extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSucursalData($id = null)
	{
		if ($id) {

			$this->db->SELECT('s.sucursal_id, e.empresa_nombre, s.sucursal_nombre, s.estatus ');
			$this->db->from('sucursales s');
			$this->db->join('empresas e', 'e.empresa_id = s.empresa_id');
			$this->db->where('s.sucursal_id', $id);
			$this->db->where_in('s.estatus', array(0, 1));
			$query  = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->row_array() : array();

			return !empty($result) ? $result : false;
		}

		$this->db->SELECT('s.sucursal_id, e.empresa_nombre, s.sucursal_nombre, s.estatus ');
		$this->db->from('sucursales s');
		$this->db->join('empresas e', 'e.empresa_id = s.empresa_id');
		$this->db->where_in('s.estatus', array(0, 1));
		$query  = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result_array() : array();

		return $result;
	}

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('sucursales', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('sucursal_id', $id);
			$update = $this->db->update('sucursales', $data);
			return ($update == true) ? true : false;
		}
	}

	function searchEmpresa($postData)
	{

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("empresa_nombre like '%" . $postData['search'] . "%'  and estatus = 0");

			$records = $this->db->get('empresas')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->empresa_id, "label" => $row->empresa_nombre);
			}
		}

		return $response;
	}
}
