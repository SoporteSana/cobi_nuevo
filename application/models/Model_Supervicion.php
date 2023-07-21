<?php

class Model_supervicion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSupervicionData($param1, $param2, $registro_id = null)
	{
	
		$result = $this->db->query('CALL vigilancia_supervision_index(?, ?, ?, @result)', array($param1, $param2, $registro_id));
	
		if ($registro_id !== null) {
			$row_array = $result->row_array();
			$this->db->close();
			return $row_array;
		} else {
			$result_array = $result->result_array();
			$this->db->close();
			return $result_array;
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
			$this->db->insert_batch('tiros', $tirosArray);
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

	function searchtickets($term, $unidad_id)
	{
	
		$sucursal_id = $this->session->userdata('sucursal_id');
	
		$this->db->select('t.ticket_id, t.folio, t.peso, d.destinofinal_nombre');
		$this->db->from('tickets t');
		$this->db->join('destinofinal d', 'd.destinofinal_id = t.destinofinal_id');
		$this->db->like('t.folio', $term);
		$this->db->group_start();
		$this->db->where('t.sucursal_id', $sucursal_id);
		$this->db->or_where('t.sucursal_id', 0);
		$this->db->group_end();
		$this->db->where('t.estatus', 0);
		
		if ($unidad_id == 0) {
			$this->db->where('t.unidad_id', $unidad_id);
		} else {
			$this->db->where_in('t.unidad_id', array($unidad_id, 0));
		}
		
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
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
