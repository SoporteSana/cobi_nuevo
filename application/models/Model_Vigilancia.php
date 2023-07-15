<?php

class Model_vigilancia extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getVigilanciaData($param1 = null, $param2 = null, $registro_id = null)
	{
		$result = $this->db->query('CALL get_vigilancia(?, ?, @result)', array($param1, $param2));
	
		$result_array = $result->result_array();
	
		$this->db->close();
	
		return $result_array;
	}
	
	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('registros', $data);

			return $insert ? $this->db->insert_id() : false;
		}
	}
	public function insertarTripulacion($tripulacionArray = array())
	{
		if (!empty($tripulacionArray)) {
			$this->db->insert_batch('tripulacion', $tripulacionArray);
			return true;
		}
		return false;
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('registro_id', $id);
			$update = $this->db->update('registros', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('products');
			return ($delete == true) ? true : false;
		}
	}

	function searchUnidad($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("unidad_numero like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('unidades')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->unidad_id, "label" => $row->unidad_numero);
			}
		}

		return $response;
	}

	function searchalias($term)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$this->db->select('a.alias_id, a.alias_nombre, t.turno_nombre, r.ruta_nombre, a.estatus');
		$this->db->from('alias a');
		$this->db->join('turnos t', 'turno_id', 'inner');
		$this->db->join('rutas r', 'ruta_id', 'inner');
		$this->db->like('a.alias_nombre', $term);
		$this->db->where('a.sucursal_id', $sucursal_id);
		$this->db->where("a.estatus = 0");
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	function searchoperador($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("operador_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('operadores')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->operador_id, "label" => $row->operador_nombre);
			}
		}

		return $response;
	}

	function searchrecolectores($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("recolector_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id or sucursal_id = 0 ");

			$records = $this->db->get('recolectores')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->recolector_id, "label" => $row->recolector_nombre);
			}
		}

		return $response;
	}

	public function countTotalRegistros()
	{
		$sql = "SELECT * FROM `registros`";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
