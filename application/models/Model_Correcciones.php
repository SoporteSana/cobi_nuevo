<?php

class Model_correcciones extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCorreccionData($id = null)
	{
		$this->db->select('registros.registro_id, unidades.unidad_id, unidades.unidad_numero, asignaciones.asignacion_id, asignaciones.asignacion_nombre, registros.semana, usuarios.nombres, registros.dia, registros.fecha_salida, registros.fecha_entrada, turnos.turno_nombre, rutas.ruta_nombre, alias.alias_id, alias.alias_nombre, operadores.operador_id, operadores.operador_nombre, num_tripulacion.recolector_id, num_tripulacion.numrecolectores, num_tripulacion.recolectores, registros.km_salida, registros.km_entrada, registros.recorrido, registros.litroscargados, registros.rendimiento, registros.hora_salida, registros.hora_entrada, registros.hora_tablero, registros.tiempo_ruta, manifiestos.peso_total, destinofinal.destinofinal_nombre, folios_agregados.manifiesto_id, folios_agregados.numfolios, folios_agregados.folio_ids, folios_agregados.folios, folios_agregados.descripciones, folios_agregados.pesos_folios, registros.observaciones, registros.estatus');
		$this->db->distinct();
		$this->db->from('registros');
		$this->db->join('unidades', 'unidades.unidad_id = registros.unidad_id');
		$this->db->join('operadores', 'operadores.operador_id = registros.operador_id');
		$this->db->join('alias', 'alias.alias_id = registros.alias_id');
		$this->db->join('asignaciones', 'asignaciones.asignacion_id = registros.asignacion_id');
		$this->db->join('usuarios', 'usuarios.usuario_id = registros.usuario_id');
		$this->db->join('rutas', 'rutas.ruta_id = alias.ruta_id');
		$this->db->join('turnos', 'turnos.turno_id = alias.turno_id');
		$this->db->join('tiros', 'registros.registro_id = tiros.registro_id');
		$this->db->join('manifiestos_folios', 'tiros.manifiesto_id = manifiestos_folios.manifiesto_id');
		$this->db->join('manifiestos', 'manifiestos.manifiesto_id = manifiestos_folios.manifiesto_id');
		$this->db->join('destinofinal', 'manifiestos.destinofinal_id = destinofinal.destinofinal_id');
		$this->db->join('folios_agregados', 'manifiestos_folios.manifiesto_id = folios_agregados.manifiesto_id', 'left');
		$this->db->join('num_tripulacion', 'registros.registro_id = num_tripulacion.registro_id', 'left');
		$this->db->where('registros.estatus', 2);

		if ($id) {
			$this->db->where('registros.registro_id', $id);
			$query = $this->db->get();
			$result = $query->result();
		} else {
			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();
		}

		return $result;
	}

	public function getFiltrosData($filtros)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');

		$this->db->select('registros.registro_id, unidades.unidad_numero, asignaciones.asignacion_nombre, registros.semana, usuarios.nombres, registros.dia, registros.fecha_salida, turnos.turno_nombre, rutas.ruta_nombre, alias.alias_nombre, operadores.operador_nombre, num_tripulacion.numrecolectores, num_tripulacion.recolectores, registros.km_salida, registros.km_entrada, registros.recorrido, registros.litroscargados, registros.rendimiento, registros.hora_salida, registros.hora_entrada, registros.hora_tablero, registros.tiempo_ruta, manifiestos.peso_total, destinofinal.destinofinal_nombre, folios_agregados.numfolios, folios_agregados.folio_ids, folios_agregados.folios, folios_agregados.descripciones, folios_agregados.pesos_folios, registros.observaciones, registros.estatus');
		$this->db->distinct();
		$this->db->from('registros');
		$this->db->join('unidades', 'unidades.unidad_id = registros.unidad_id');
		$this->db->join('operadores', 'operadores.operador_id = registros.operador_id');
		$this->db->join('alias', 'alias.alias_id = registros.alias_id');
		$this->db->join('asignaciones', 'asignaciones.asignacion_id = registros.asignacion_id');
		$this->db->join('usuarios', 'usuarios.usuario_id = registros.usuario_id');
		$this->db->join('rutas', 'rutas.ruta_id = alias.ruta_id');
		$this->db->join('turnos', 'turnos.turno_id = alias.turno_id');
		$this->db->join('tiros', 'registros.registro_id = tiros.registro_id');
		$this->db->join('manifiestos_folios', 'tiros.manifiesto_id = manifiestos_folios.manifiesto_id');
		$this->db->join('manifiestos', 'manifiestos.manifiesto_id = manifiestos_folios.manifiesto_id');
		$this->db->join('destinofinal', 'manifiestos.destinofinal_id = destinofinal.destinofinal_id');
		$this->db->join('folios_agregados', 'manifiestos_folios.manifiesto_id = folios_agregados.manifiesto_id', 'left');
		$this->db->join('num_tripulacion', 'registros.registro_id = num_tripulacion.registro_id', 'left');
		$this->db->where('registros.sucursal_id', $sucursal_id);
		$this->db->where('registros.estatus', 2);
		if ($filtros['fecha1filtro'] & $filtros['fecha2filtro']) {
			$this->db->where("(registros.fecha_salida BETWEEN '" . $filtros['fecha1filtro'] . "' AND '" . $filtros['fecha2filtro'] . "' OR '" . $filtros['fecha1filtro'] . "' IS NULL OR '" . $filtros['fecha2filtro'] . "' IS NULL)");
		}
		if ($filtros['filtrounidad_id']) {
			$this->db->where("(unidades.unidad_id = '" . $filtros['filtrounidad_id'] . "' OR '" . $filtros['filtrounidad_id'] . "' IS NULL)");
		}
		if ($filtros['filtroasignacion_id']) {
			$this->db->where("(asignaciones.asignacion_id = '" . $filtros['filtroasignacion_id'] . "' OR '" . $filtros['filtroasignacion_id'] . "' IS NULL)");
		}
		if ($filtros['supervisor_id']) {
			$this->db->where("(usuarios.usuario_id = '" . $filtros['supervisor_id'] . "' OR '" . $filtros['supervisor_id'] . "' IS NULL)");
		}
		if ($filtros['alias_id']) {
			$this->db->where("(alias.alias_id = '" . $filtros['alias_id'] . "' OR '" . $filtros['alias_id'] . "' IS NULL)");
		}
		if ($filtros['turno_id']) {
			$this->db->where("(turnos.turno_id = '" . $filtros['turno_id'] . "' OR '" . $filtros['turno_id'] . "' IS NULL)");
		}
		if ($filtros['operador_id']) {
			$this->db->where("(operadores.operador_id = '" . $filtros['operador_id'] . "' OR '" . $filtros['operador_id'] . "' IS NULL)");
		}
		if ($filtros['destinofinal_nombre']) {
			$this->db->or_where("destinofinal.destinofinal_nombre", $filtros['destinofinal_nombre']);
		}

		$query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result_array() : array();

		return $result;
	}

	public function create($data)
	{
		if ($data) {
			$insert = $this->db->insert('registros', $data);
			return $insert ? $this->db->insert_id() : false;
		}
	}

	public function actualizarTripulacion($update, $tripulacionArray = array())
	{
		if (!empty($tripulacionArray)) {
			$this->db->where('registro_id', $update);
			$update = $this->db->update('tripulacion', $tripulacionArray);
			return $update ? true : false;
		}
		return false;
	}

	public function actualizarTiros($update, $tirosArray = array())
	{
		if (!empty($tirosArray)) {
			$this->db->where('registro_id', $update);
			$update = $this->db->update('tiros', $tirosArray);
			return $update ? true : false;
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

	function searchasignacion($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$response = array();

		$this->db->select('*');

		if ($postData['search']) {

			$this->db->where("asignacion_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('asignaciones')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->asignacion_id, "label" => $row->asignacion_nombre);
			}
		}

		return $response;
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

			$this->db->where("recolector_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

			$records = $this->db->get('recolectores')->result();

			foreach ($records as $row) {
				$response[] = array("value" => $row->recolector_id, "label" => $row->recolector_nombre);
			}
		}

		return $response;
	}

	function searchmanifiestos($term, $unidad_id)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');

		$this->db->select('m.manifiesto_id, m.nummanifiesto, m.peso_total, d.destinofinal_nombre');
		$this->db->from('manifiestos m');
		$this->db->join('destinofinal d', 'd.destinofinal_id = m.destinofinal_id');
		$this->db->like('m.nummanifiesto', $term);
		$this->db->group_start();
		$this->db->where('m.sucursal_id', $sucursal_id);
		$this->db->or_where('m.sucursal_id', 0);
		$this->db->group_end();
		$this->db->where('m.estatus', 0);

		if ($unidad_id == 0) {
			$this->db->where('m.unidad_id', $unidad_id);
		} else {
			$this->db->where_in('m.unidad_id', array($unidad_id, 0));
		}

		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}
}
