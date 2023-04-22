<?php

class Model_Supervisores extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSupervisorData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select("u.usuario_id, CONCAT(u.nombres, ' ', u.apellidos) AS nombre_completo, s.sucursal_nombre, u.estatus");
			$this->db->from("usuarios u");
			$this->db->join("usuarios_grupos ug", "u.usuario_id = ug.usuario_id");
			$this->db->join("grupos g", "ug.grupo_id = g.grupo_id");
			$this->db->join("sucursales s", "u.sucursal_id = s.sucursal_id");
			$this->db->where("g.grupo_nombre", "supervisor");

			if ($id) {
				$this->db->where('u.usuario_id', $id);
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->row_array() : array();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : array();
			}

			return $result;
		} else {

			$this->db->select("u.usuario_id, CONCAT(u.nombres, ' ', u.apellidos) AS nombre_completo, s.sucursal_nombre, u.estatus");
			$this->db->from("usuarios u");
			$this->db->join("usuarios_grupos ug", "u.usuario_id = ug.usuario_id");
			$this->db->join("grupos g", "ug.grupo_id = g.grupo_id");
			$this->db->join("sucursales s", "u.sucursal_id = s.sucursal_id");
			$this->db->where("g.grupo_nombre", "supervisor");
			$this->db->where('u.sucursal_id', $sucursal_id);

			if ($id) {
				$this->db->where('u.usuario_id', $id);
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
			$insert = $this->db->insert('supervisores', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('usuario_id', $id);
			$update = $this->db->update('usuarios', $data);
			return ($update == true) ? true : false;
		}
	}

	public function countTotalSupervisores()
	{
		$this->db->select('COUNT(*) as total_supervisores');
		$this->db->from('usuarios u');
		$this->db->join('usuarios_grupos ug', 'u.usuario_id = ug.usuario_id');
		$this->db->join('grupos g', 'ug.grupo_id = g.grupo_id');
		$this->db->where('g.grupo_nombre', 'supervisor');
		$query = $this->db->get();
		$resultado = $query->result();
		return $resultado[0]->total_supervisores;
	}
}
