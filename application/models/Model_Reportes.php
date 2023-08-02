<?php

class Model_reportes extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getReporteCompletoData()
	{
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

		$query = $this->db->get();

		$result = ($query->num_rows() > 0) ? $query->result_array() : false;

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

	public function getrendimientoData($rendimiento)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, re.rendimiento, re.hora_salida, re.hora_entrada, re.tiempo_ruta, re.totalpeso, re.estatus');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->where('re.estatus', 2);
			if ($rendimiento['fecha1rendimiento'] & $rendimiento['fecha2rendimiento']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $rendimiento['fecha1rendimiento'] . "' AND '" . $rendimiento['fecha2rendimiento'] . "' OR '" . $rendimiento['fecha1rendimiento'] . "' IS NULL OR '" . $rendimiento['fecha2rendimiento'] . "' IS NULL)");
			}
			if ($rendimiento['rendimientounidad_id']) {
				$this->db->where("(u.unidad_id = '" . $rendimiento['rendimientounidad_id'] . "' OR '" . $rendimiento['rendimientounidad_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, re.rendimiento, re.hora_salida, re.hora_entrada, re.tiempo_ruta, re.totalpeso, re.estatus');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->where('re.sucursal_id', $sucursal_id);
			$this->db->where('re.estatus', 2);
			if ($rendimiento['fecha1rendimiento'] & $rendimiento['fecha2rendimiento']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $rendimiento['fecha1rendimiento'] . "' AND '" . $rendimiento['fecha2rendimiento'] . "' OR '" . $rendimiento['fecha1rendimiento'] . "' IS NULL OR '" . $rendimiento['fecha2rendimiento'] . "' IS NULL)");
			}
			if ($rendimiento['rendimientounidad_id']) {
				$this->db->where("(u.unidad_id = '" . $rendimiento['rendimientounidad_id'] . "' OR '" . $rendimiento['rendimientounidad_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
	}

	public function get2kmData($litros)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, re.rendimiento, re.hora_salida, re.hora_entrada, re.estatus');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->where('re.estatus', 2);
			if ($litros['2kmfecha1'] & $litros['2kmfecha2']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $litros['2kmfecha1'] . "' AND '" . $litros['2kmfecha2'] . "' OR '" . $litros['2kmfecha1'] . "' IS NULL OR '" . $litros['2kmfecha2'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, re.rendimiento, re.hora_salida, re.hora_entrada, re.estatus');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->where('re.sucursal_id', $sucursal_id);
			$this->db->where('re.estatus', 2);
			if ($litros['2kmfecha1'] & $litros['2kmfecha2']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $litros['2kmfecha1'] . "' AND '" . $litros['2kmfecha2'] . "' OR '" . $litros['2kmfecha1'] . "' IS NULL OR '" . $litros['2kmfecha2'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
	}

	public function gettonelajeData($tonelages)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, re.totalpeso, a.asignacion_nombre, re.fecha_salida ');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('asignaciones a', 'a.asignacion_id = re.asignacion_id');
			$this->db->where('re.estatus', 2);
			if ($tonelages['fecha1tonelage'] & $tonelages['fecha2tonelage']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $tonelages['fecha1tonelage'] . "' AND '" . $tonelages['fecha2tonelage'] . "' OR '" . $tonelages['fecha1tonelage'] . "' IS NULL OR '" . $tonelages['fecha2tonelage'] . "' IS NULL)");
			}
			if ($tonelages['tonelageasignacion_id']) {
				$this->db->where("(a.asignacion_id = '" . $tonelages['tonelageasignacion_id'] . "' OR '" . $tonelages['tonelageasignacion_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, re.totalpeso, a.asignacion_nombre, re.fecha_salida ');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('asignaciones a', 'a.asignacion_id = re.asignacion_id');
			$this->db->where('re.sucursal_id', $sucursal_id);
			$this->db->where('re.estatus', 2);
			if ($tonelages['fecha1tonelage'] & $tonelages['fecha2tonelage']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $tonelages['fecha1tonelage'] . "' AND '" . $tonelages['fecha2tonelage'] . "' OR '" . $tonelages['fecha1tonelage'] . "' IS NULL OR '" . $tonelages['fecha2tonelage'] . "' IS NULL)");
			}
			if ($tonelages['tonelageasignacion_id']) {
				$this->db->where("(a.asignacion_id = '" . $tonelages['tonelageasignacion_id'] . "' OR '" . $tonelages['tonelageasignacion_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
	}

	public function gettiemporutaData($horarutas)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, re.hora_salida, re.hora_entrada, re.tiempo_ruta, re.totalpeso');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->where('re.estatus', 2);
			if ($horarutas['fecha1horaruta'] & $horarutas['fecha2horaruta']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $horarutas['fecha1horaruta'] . "' AND '" . $horarutas['fecha2horaruta'] . "' OR '" . $horarutas['fecha1horaruta'] . "' IS NULL OR '" . $horarutas['fecha2horaruta'] . "' IS NULL)");
			}
			if ($horarutas['horarutaunidad_id']) {
				$this->db->where("(u.unidad_id = '" . $horarutas['horarutaunidad_id'] . "' OR '" . $horarutas['horarutaunidad_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, re.hora_salida, re.hora_entrada, re.tiempo_ruta, re.totalpeso');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->where('re.sucursal_id', $sucursal_id);
			$this->db->where('re.estatus', 2);
			if ($horarutas['fecha1horaruta'] & $horarutas['fecha2horaruta']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $horarutas['fecha1horaruta'] . "' AND '" . $horarutas['fecha2horaruta'] . "' OR '" . $horarutas['fecha1horaruta'] . "' IS NULL OR '" . $horarutas['fecha2horaruta'] . "' IS NULL)");
			}
			if ($horarutas['horarutaunidad_id']) {
				$this->db->where("(u.unidad_id = '" . $horarutas['horarutaunidad_id'] . "' OR '" . $horarutas['horarutaunidad_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
	}

	public function gettiemporutaTotalData($horarutatotal)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.hora_salida, re.hora_entrada, re.tiempo_ruta');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->where_in('re.estatus', array(1, 2));
			if ($horarutatotal['fecha1horarutaTotal'] & $horarutatotal['fecha2horarutaTotal']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $horarutatotal['fecha1horarutaTotal'] . "' AND '" . $horarutatotal['fecha2horarutaTotal'] . "' OR '" . $horarutatotal['fecha1horarutaTotal'] . "' IS NULL OR '" . $horarutatotal['fecha2horarutaTotal'] . "' IS NULL)");
			}
			if ($horarutatotal['horarutaTotalunidad_id']) {
				$this->db->where("(u.unidad_id = '" . $horarutatotal['horarutaTotalunidad_id'] . "' OR '" . $horarutatotal['horarutaTotalunidad_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.hora_salida, re.hora_entrada, TIME_FORMAT(TIMEDIFF(re.hora_entrada, re.hora_salida), "%H:%i:%s") AS tiempo_ruta');
			$this->db->from('registros re');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->where_in('re.estatus', array(1, 2));
			if ($horarutatotal['fecha1horarutaTotal'] & $horarutatotal['fecha2horarutaTotal']) {
				$this->db->where("(DATE(re.hora_salida) BETWEEN '" . $horarutatotal['fecha1horarutaTotal'] . "' AND '" . $horarutatotal['fecha2horarutaTotal'] . "' OR '" . $horarutatotal['fecha1horarutaTotal'] . "' IS NULL OR '" . $horarutatotal['fecha2horarutaTotal'] . "' IS NULL)");
			}
			if ($horarutatotal['horarutaTotalunidad_id']) {
				$this->db->where("(u.unidad_id = '" . $horarutatotal['horarutaTotalunidad_id'] . "' OR '" . $horarutatotal['horarutaTotalunidad_id'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
	}

	function searchUnidad($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {


			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("unidad_numero like '%" . $postData['search'] . "%' and estatus = 0");

				$records = $this->db->get('unidades')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->unidad_id, "label" => $row->unidad_numero);
				}
			}

			return $response;
		} else {

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
	}

	function searchasignacion($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("asignacion_nombre like '%" . $postData['search'] . "%' and estatus = 0");

				$records = $this->db->get('asignaciones')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->asignacion_id, "label" => $row->asignacion_nombre);
				}
			}

			return $response;
		} else {

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
	}

	function searchsupervisor($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {


			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("supervisor_nombre like '%" . $postData['search'] . "%' and estatus = 0");

				$records = $this->db->get('supervisores')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->supervisor_id, "label" => $row->supervisor_nombre);
				}
			}

			return $response;
		} else {

			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("supervisor_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

				$records = $this->db->get('supervisores')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->supervisor_id, "label" => $row->supervisor_nombre);
				}
			}

			return $response;
		}
	}

	function searchalias($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {


			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("alias_nombre like '%" . $postData['search'] . "%' and estatus = 0");

				$records = $this->db->get('alias')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->alias_id, "label" => $row->alias_nombre);
				}
			}

			return $response;
		} else {

			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("alias_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

				$records = $this->db->get('alias')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->alias_id, "label" => $row->alias_nombre);
				}
			}

			return $response;
		}
	}

	function searchTurno($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("turno_nombre like '%" . $postData['search'] . "%' and estatus = 0");

				$records = $this->db->get('turnos')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->turno_id, "label" => $row->turno_nombre);
				}
			}

			return $response;
		} else {

			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("turno_nombre like '%" . $postData['search'] . "%' and estatus = 0 AND sucursal_id = $sucursal_id");

				$records = $this->db->get('turnos')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->turno_id, "label" => $row->turno_nombre);
				}
			}

			return $response;
		}
	}

	function searchoperador($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("operador_nombre like '%" . $postData['search'] . "%' and estatus = 0");

				$records = $this->db->get('operadores')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->operador_id, "label" => $row->operador_nombre);
				}
			}

			return $response;
		} else {

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
	}

	function searchdestinofinal($postData)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {


			$response = array();

			$this->db->select('*');

			if ($postData['search']) {

				$this->db->where("destinofinal_nombre like '%" . $postData['search'] . "%' and estatus = 0");

				$records = $this->db->get('destinofinal')->result();

				foreach ($records as $row) {
					$response[] = array("value" => $row->destinofinal_id, "label" => $row->destinofinal_nombre);
				}
			}

			return $response;
		} else {

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
}
