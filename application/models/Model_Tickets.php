<?php

class Model_tickets extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getTicketsData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {
			
			$this->db->SELECT('t.ticket_id, t.folio, u.unidad_id, u.unidad_numero, u.unidad_placas, t.fecha, t.peso, d.destinofinal_id, d.destinofinal_nombre, t.estatus');
			$this->db->from('tickets t');
			$this->db->join('unidades u', 'unidad_id');
			$this->db->join('destinofinal d', 'destinofinal_id');
			$this->db->where_in('t.estatus', array(0, 1));
	
			if ($id) {
				$this->db->where('t.ticket_id', $id);
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->row_array() : array();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : array();
			}
	
			return $result;
			
			
		}else{

			$this->db->SELECT('t.ticket_id, t.folio, u.unidad_id, u.unidad_numero, u.unidad_placas, t.fecha, t.peso, d.destinofinal_id, d.destinofinal_nombre, t.estatus');
			$this->db->from('tickets t');
			$this->db->join('unidades u', 'unidad_id');
			$this->db->join('destinofinal d', 'destinofinal_id');
			$this->db->where('t.sucursal_id', $sucursal_id);
			$this->db->where_in('t.estatus', array(0, 1));
	
			if ($id) {
				$this->db->where('t.ticket_id', $id);
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
			$insert = $this->db->insert('tickets', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('ticket_id', $id);
			$update = $this->db->update('tickets', $data);
			return ($update == true) ? true : false;
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
				$response[] = array("value" => $row->unidad_id, "label" => $row->unidad_numero, "label2" => $row->unidad_placas);
			}
		}

		return $response;
	}

	function searchDestino($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("destinofinal_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('destinofinal')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->destinofinal_id, "label" => $row->destinofinal_nombre);
			}
		}

		return $response;
	}
}
