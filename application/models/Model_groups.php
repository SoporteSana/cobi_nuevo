<?php

class Model_groups extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getGroupData($groupId = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($groupId) {
			$sql = "SELECT * FROM `grupos` WHERE grupo_id = ?";
			$query = $this->db->query($sql, array($groupId));
			return $query->row_array();
		}

		if ($username == 'admin') {

			$sql = "SELECT * FROM `grupos` WHERE grupo_id != ? and estatus = 0";
			$query = $this->db->query($sql, array(1));
			return $query->result_array();
		} else {

			$sql = "SELECT * FROM `grupos` WHERE grupo_id != ? and estatus = 0 and sucursal_id = $sucursal_id ";
			$query = $this->db->query($sql, array(1));
			return $query->result_array();
		}
	}

	public function create($data = '')
	{
		$create = $this->db->insert('grupos', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('grupo_id', $id);
		$update = $this->db->update('grupos', $data);
		return ($update == true) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('grupo_id', $id);
		$delete = $this->db->delete('grupos');
		return ($delete == true) ? true : false;
	}

	public function existInUserGroup($id)
	{
		$sql = "SELECT * FROM `usuarios_grupos` WHERE grupo_id = ?";
		$query = $this->db->query($sql, array($id));
		return ($query->num_rows() == 1) ? true : false;
	}

	public function getUserGroupByUserId($user_id)
	{
		$sql = "SELECT * FROM `usuarios_grupos` 
		INNER JOIN `grupos` ON grupos.grupo_id = usuarios_grupos.grupo_id 
		WHERE usuarios_grupos.usuario_id = ?";
		$query = $this->db->query($sql, array($user_id));
		$result = $query->row_array();

		return $result;
	}

	public function getSucursalById($user_id)
	{
		$this->db->select('s.sucursal_id, s.sucursal_nombre, e.empresa_id, e.empresa_nombre');
		$this->db->from('sucursales s');
		$this->db->join('empresas e', 'empresa_id');
		$this->db->join('usuarios u', 'sucursal_id');
		$this->db->where('u.usuario_id', $user_id);
		$query = $this->db->get();
		return $query->row_array();
	}
}
