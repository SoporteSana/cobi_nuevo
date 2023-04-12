<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($userId = null) 
	{
		if($userId) {
			$this->db->select('u.sucursal_id, u.usuario_id, u.username, e.empresa_id, e.empresa_nombre, s.sucursal_nombre, u.email, u.nombres, u.apellidos, u.telefono, u.genero');
			$this->db->from('usuarios u');
			$this->db->join('usuarios_grupos ug', 'u.usuario_id = ug.usuario_id');
			$this->db->join('grupos g', 'ug.grupo_id = g.grupo_id');
			$this->db->join('sucursales s', 's.sucursal_id = u.sucursal_id');
			$this->db->join('empresas e', 'e.empresa_id = s.empresa_id');
			$this->db->where('u.usuario_id', $userId);
			$query  = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->row_array() : array();

			return !empty($result) ? $result : false;
		}

		$this->db->SELECT("u.sucursal_id, u.usuario_id, u.username,e.empresa_nombre, s.sucursal_nombre, u.email, CONCAT(u.nombres,' ',u.apellidos) AS nombrecompleto, u.telefono");
		$this->db->from('usuarios u');
		$this->db->join('sucursales s', 'sucursal_id');
		$this->db->join('empresas e', 'e.empresa_id = s.empresa_id');
		$this->db->where('u.usuario_id !=', 1);
		$this->db->where('u.estatus =', 0);
		$query  = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result_array() : array();

		return !empty($result) ? $result : false;
	}

	public function getUserGroup($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM `usuarios_grupos` WHERE usuario_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$group_id = $result['grupo_id'];
			$g_sql = "SELECT * FROM `grupos` WHERE grupo_id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}

	public function create($data = '', $group_id = null)
	{

		if($data && $group_id) {
			$create = $this->db->insert('usuarios', $data);

			$user_id = $this->db->insert_id();

			$group_data = array(
				'usuario_id' => $user_id,
				'grupo_id' => $group_id
			);

			$group_data = $this->db->insert('usuarios_grupos', $group_data);

			return ($create == true && $group_data) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $group_id = null)
	{
		$this->db->where('usuario_id', $id);
		$update = $this->db->update('usuarios', $data);

		if($group_id) {
			// user group
			$update_user_group = array('grupo_id' => $group_id);
			$this->db->where('usuario_id', $id);
			$user_group = $this->db->update('usuarios_grupos', $update_user_group);
			return ($update == true && $user_group == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('usuario_id', $id);
		$delete = $this->db->delete('usuarios');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM `usuarios`";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function getEmpresasData() 
	{

		$this->db->SELECT('empresa_id, empresa_nombre, estatus');
        $this->db->from('empresas');
		$this->db->where('estatus = 0');
        $query  = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : array();

        return !empty($result) ? $result : false;
	}

	public function getSucursalesData($empresa_id) 
	{
		$this->db->SELECT('sucursal_id, sucursal_nombre, empresa_id, estatus');
		$this->db->from('sucursales');
		$this->db->where('empresa_id', $empresa_id);
		$this->db->where('estatus = 0');
		$query  = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result_array() : array();

		return !empty($result) ? $result : false;
	}
	
}