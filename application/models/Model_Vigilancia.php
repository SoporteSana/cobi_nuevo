<?php

class Model_vigilancia extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getVigilanciaData($id = null)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, re.semana, re.dia, re.hora_tablero, re.km_salida, re.hora_salida, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.estatus');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('alias a', 'a.alias_id = re.alias_id');
			$this->db->join('turnos t', 't.turno_id = a.turno_id');
			$this->db->join('rutas r', 'r.ruta_id = a.ruta_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->where('re.estatus', 0);

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, re.semana, re.dia, re.hora_tablero, re.km_salida, re.hora_salida, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.estatus');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('alias a', 'a.alias_id = re.alias_id');
			$this->db->join('turnos t', 't.turno_id = a.turno_id');
			$this->db->join('rutas r', 'r.ruta_id = a.ruta_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->where('a.sucursal_id', $sucursal_id);
			$this->db->where('re.estatus', 0);

			if ($id) {
				$this->db->where('re.registro_id', $id);
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->row_array() : array();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : array();
			}

			return $result;
		}
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
			$insert = $this->db->insert('tripulacion', $tripulacionArray);
			return $insert ? true : false;
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
