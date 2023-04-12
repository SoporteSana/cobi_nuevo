<?php

class Model_alias extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getActiveAlias()
	{
		$sql = "SELECT * FROM `alias` WHERE activo = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getAliasData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($id) {

			$this->db->SELECT('a.alias_id, a.alias_nombre, a.turno_id, t.turno_nombre, a.ruta_id, r.ruta_nombre, a.estatus');
			$this->db->from('alias a');
			$this->db->join('turnos t', 'turno_id');
			$this->db->join('rutas r', 'ruta_id');
			$this->db->where('alias_id', $id);
			$this->db->where('a.estatus >= 0 AND a.estatus <= 1');
			$query  = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->row_array() : array();

			return !empty($result) ? $result : false;
		}

		if ($username == 'admin') {
			$this->db->SELECT('a.alias_id, a.alias_nombre, t.turno_nombre, r.ruta_nombre, a.estatus');
			$this->db->from('alias a');
			$this->db->join('turnos t', 'turno_id');
			$this->db->join('rutas r', 'ruta_id');
			$this->db->where('a.estatus >= 0 AND a.estatus <= 1');

			$query  = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;

		} else {
			$this->db->SELECT('a.alias_id, a.alias_nombre, t.turno_nombre, r.ruta_nombre, a.estatus');
			$this->db->from('alias a');
			$this->db->join('turnos t', 'turno_id');
			$this->db->join('rutas r', 'ruta_id');
			$this->db->where('a.sucursal_id', $sucursal_id);
			$this->db->where('a.estatus >= 0 AND a.estatus <= 1');

			$query  = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
	}

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('alias', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('alias_id', $id);
			$update = $this->db->update('alias', $data);
			return ($update == true) ? true : false;
		}
	}

	function searchTurno($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("turno_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('turnos')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->turno_id, "label" => $row->turno_nombre);
			}
		}

		return $response;
	}

	function searchRuta($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("ruta_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('rutas')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->ruta_id, "label" => $row->ruta_nombre);
			}
		}

		return $response;
	}
}
