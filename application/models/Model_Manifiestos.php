<?php

class Model_Manifiestos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getManifiestosData($manifiesto_id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
	
		$this->db->select('manifiestos.manifiesto_id, manifiestos.nummanifiesto, unidades.unidad_id, unidades.unidad_numero, unidades.unidad_placas, destinofinal.destinofinal_id, destinofinal.destinofinal_nombre, manifiestos.fecha, manifiestos.peso_total,
		GROUP_CONCAT(DISTINCT folios.folio_id) as folio_ids, GROUP_CONCAT(DISTINCT folios.folio) as folios,
		GROUP_CONCAT(DISTINCT folios.descripcion) as descripciones, GROUP_CONCAT(DISTINCT folios.peso_folio) as pesos_folios');
	
		$this->db->from('manifiestos');
		$this->db->join('manifiestos_folios', 'manifiestos.manifiesto_id = manifiestos_folios.manifiesto_id', 'inner');
		$this->db->join('destinofinal', 'manifiestos.destinofinal_id = destinofinal.destinofinal_id', 'inner');
		$this->db->join('unidades', 'manifiestos.unidad_id = unidades.unidad_id', 'inner');
		$this->db->join('folios', 'manifiestos_folios.folio_id = folios.folio_id', 'inner');
		$this->db->where('manifiestos.sucursal_id', $sucursal_id);
		
		// Si se proporcionó un ID de manifiesto, añade una cláusula WHERE adicional
		if ($manifiesto_id != null) {
			$this->db->where('manifiestos.manifiesto_id', $manifiesto_id);
		}
	
		$this->db->group_by('manifiestos.manifiesto_id');
	
		$query = $this->db->get();
	
		return $query->result();
		
	}
	

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('manifiestos', $data);
			return ($insert == true) ? $this->db->insert_id() : false;
		}
	}

	public function insertarFolios($folios)
	{
		$inserted_ids = array();
		foreach ($folios as $folio) {
			$this->db->insert('folios', $folio);
			$inserted_ids[] = $this->db->insert_id();
		}
		return $inserted_ids;
	}

	public function insertarFolioManifiesto($manifiestofolio = array())
	{
		if (!empty($manifiestofolio)) {
			$insert = $this->db->insert_batch('manifiestos_folios', $manifiestofolio);
			return ($insert == true) ? $this->db->insert_id() : false;
		}
		return false;
	}

	public function update($data, $id)
	{
		if ($data && $id) {
			$this->db->where('manifiesto_id', $id);
			$update = $this->db->update('manifiestos', $data);
			return ($update == true) ? true : false;
		}
	}

	public function updateFolios($folios)
{
    foreach ($folios as $folio) {
        if(isset($folio['folio_id']) && $folio['folio_id'] != null){
            $this->db->where('folio_id', $folio['folio_id']);
            $this->db->update('folios', $folio);
        }
    }
}

public function updateFolioManifiesto($manifiestofolio = array())
{
    if (!empty($manifiestofolio)) {
        foreach ($manifiestofolio as $mf) {
            if(isset($mf['manifiesto_id']) && $mf['manifiesto_id'] != null){
                $this->db->where('manifiesto_id', $mf['manifiesto_id']);
                $this->db->update('manifiestos_folios', $mf);
            }
        }
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
