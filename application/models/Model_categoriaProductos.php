<?php

class model_categoriaProductos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCategoriaProductosData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($id) {
			$sql = "SELECT * FROM `categorias_producto` WHERE categoriaProducto_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		if ($username == 'admin') {
			$sql = "SELECT * FROM `categorias_producto` WHERE estatus BETWEEN 0 AND 1";
			$query = $this->db->query($sql);
			return $query->result_array();
		} else {
			$sql = "SELECT * FROM `categorias_producto` WHERE estatus BETWEEN 0 AND 1 AND sucursal_id = $sucursal_id";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}


	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('categorias_producto', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('categoriaProducto_id', $id);
			$update = $this->db->update('categorias_producto', $data);
			return ($update == true) ? true : false;
		}
	}
}
