<?php

class Model_supervicion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getSupervicionData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_id, u.unidad_numero, re.semana, re.dia, re.hora_salida, re.hora_tablero, re.km_salida, re.km_entrada, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.estatus');
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
			$this->db->where('re.estatus', 1);

			if ($id) {
				$this->db->where('re.registro_id', $id);
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->row_array() : array();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : array();
			}

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_id, u.unidad_numero, re.semana, re.dia, re.hora_salida, re.hora_tablero, re.km_salida, re.km_entrada, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.estatus');
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
			$this->db->where('re.estatus', 1);

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
			//return ($insert == true) ? true : false;
			return $insert ? $this->db->insert_id() : false;
		}
	}

	public function insertarTiros($tirosArray = array())
	{
		if (!empty($tirosArray)) {
			$insert = $this->db->insert('tiros', $tirosArray);
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

	function searchtickets($postData, $unidad_id)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			// Select record
			$this->db->where("folio like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id and unidad_id = $unidad_id or sucursal_id = 0 ");

			$records = $this->db->get('tickets')->result();

			foreach ($records as $row) {
				$label = "Folio: " . $row->folio . " | Peso: " . $row->peso;
				$response[] = array("value" => $row->ticket_id, "value2" => $row->peso, "label" => $label);
			}
		}

		return $response;
	}

	public function getAsignacionData()
	{
		$sucursal_id = $this->session->userdata('sucursal_id');

		$this->db->SELECT('*');
		$this->db->from('asignaciones');
		$this->db->where('sucursal_id', $sucursal_id);
		$this->db->where('estatus = 0');
		$query  = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result_array() : array();

		return $result;
	}
}
