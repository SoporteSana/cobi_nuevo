<?php

class Model_TipoProductos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function gettipoporductoData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');

		$this->db->select('tipo_producto.tipoProducto_id, categorias_producto.categoriaProducto_id, categorias_producto.categoriaProducto_nombre, tipo_producto.tipoProducto_nombre, tipo_producto.estatus');
		$this->db->from('tipo_producto');
		$this->db->join('categorias_producto', 'tipo_producto.categoriaProducto_id = categorias_producto.categoriaProducto_id');
		$this->db->join('sucursales', 'sucursales.sucursal_id = categorias_producto.sucursal_id');
		$this->db->join('empresas', 'empresas.empresa_id = sucursales.empresa_id');
		$this->db->where_in('tipo_producto.estatus', array(0, 1));
		$this->db->where('categorias_producto.sucursal_id', $sucursal_id);

		// Si el tipoProducto_id se proporciona, añade la condición adicional
		if (!is_null($id)) {
			$this->db->where('tipo_producto.tipoProducto_id', $id);
			$query = $this->db->get();
			return $query->row_array();
		} else {
			$query = $this->db->get();
			return $query->result_array();
		}
	}


	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('tipo_producto', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('tipoProducto_id', $id);
			$update = $this->db->update('tipo_producto', $data);
			return ($update == true) ? true : false;
		}
	}

	function searchTurno($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("categoriaProducto_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('categorias_producto')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->categoriaProducto_id, "label" => $row->categoriaProducto_nombre);
			}
		}

		return $response;
	}
}
