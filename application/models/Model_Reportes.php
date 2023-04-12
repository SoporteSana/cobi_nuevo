<?php

class Model_reportes extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getReporteCompletoData()
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.observaciones, re.estatus');
			$this->db->from('registros re');
			$this->db->join('asignaciones asig', 'asig.asignacion_id = re.asignacion_id');
			$this->db->join('usuarios us', 'us.usuario_id = re.usuario_id');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('alias a', 'a.alias_id = re.alias_id');
			$this->db->join('turnos t', 't.turno_id = a.turno_id');
			$this->db->join('rutas r', 'r.ruta_id = a.ruta_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->join('tiros ti', 'ti.registro_id = re.registro_id', 'left');
			$this->db->join('tickets tick1', 'tick1.ticket_id = ti.tiro1', 'left');
			$this->db->join('destinofinal des1', 'des1.destinofinal_id = tick1.destinofinal_id', 'left');
			$this->db->join('tickets tick2', 'tick2.ticket_id = ti.tiro2', 'left');
			$this->db->join('destinofinal des2', 'des2.destinofinal_id = tick2.destinofinal_id', 'left');
			$this->db->join('tickets tick3', 'tick3.ticket_id = ti.tiro3', 'left');
			$this->db->join('destinofinal des3', 'des3.destinofinal_id = tick3.destinofinal_id', 'left');
			$this->db->join('tickets tick4', 'tick4.ticket_id = ti.tiro4', 'left');
			$this->db->join('destinofinal des4', 'des4.destinofinal_id = tick4.destinofinal_id', 'left');
			$this->db->join('tickets tick5', 'tick5.ticket_id = ti.tiro5', 'left');
			$this->db->join('destinofinal des5', 'des5.destinofinal_id = tick5.destinofinal_id', 'left');
			$this->db->join('tickets tick6', 'tick6.ticket_id = ti.tiro6', 'left');
			$this->db->join('destinofinal des6', 'des6.destinofinal_id = tick6.destinofinal_id', 'left');
			$this->db->join('tickets tick7', 'tick7.ticket_id = ti.tiro7', 'left');
			$this->db->join('destinofinal des7', 'des7.destinofinal_id = tick7.destinofinal_id', 'left');
			$this->db->join('tickets tick8', 'tick8.ticket_id = ti.tiro8', 'left');
			$this->db->join('destinofinal des8', 'des8.destinofinal_id = tick8.destinofinal_id', 'left');
			$this->db->join('tickets tick9', 'tick9.ticket_id = ti.tiro9', 'left');
			$this->db->join('destinofinal des9', 'des9.destinofinal_id = tick9.destinofinal_id', 'left');
			$this->db->join('tickets tick10', 'tick10.ticket_id = ti.tiro10', 'left');
			$this->db->join('destinofinal des10', 'des10.destinofinal_id = tick10.destinofinal_id', 'left');
			$this->db->where('re.estatus', 2);

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.observaciones, re.estatus');
			$this->db->from('registros re');
			$this->db->join('asignaciones asig', 'asig.asignacion_id = re.asignacion_id');
			$this->db->join('usuarios us', 'us.usuario_id = re.usuario_id');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('alias a', 'a.alias_id = re.alias_id');
			$this->db->join('turnos t', 't.turno_id = a.turno_id');
			$this->db->join('rutas r', 'r.ruta_id = a.ruta_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->join('tiros ti', 'ti.registro_id = re.registro_id', 'left');
			$this->db->join('tickets tick1', 'tick1.ticket_id = ti.tiro1', 'left');
			$this->db->join('destinofinal des1', 'des1.destinofinal_id = tick1.destinofinal_id', 'left');
			$this->db->join('tickets tick2', 'tick2.ticket_id = ti.tiro2', 'left');
			$this->db->join('destinofinal des2', 'des2.destinofinal_id = tick2.destinofinal_id', 'left');
			$this->db->join('tickets tick3', 'tick3.ticket_id = ti.tiro3', 'left');
			$this->db->join('destinofinal des3', 'des3.destinofinal_id = tick3.destinofinal_id', 'left');
			$this->db->join('tickets tick4', 'tick4.ticket_id = ti.tiro4', 'left');
			$this->db->join('destinofinal des4', 'des4.destinofinal_id = tick4.destinofinal_id', 'left');
			$this->db->join('tickets tick5', 'tick5.ticket_id = ti.tiro5', 'left');
			$this->db->join('destinofinal des5', 'des5.destinofinal_id = tick5.destinofinal_id', 'left');
			$this->db->join('tickets tick6', 'tick6.ticket_id = ti.tiro6', 'left');
			$this->db->join('destinofinal des6', 'des6.destinofinal_id = tick6.destinofinal_id', 'left');
			$this->db->join('tickets tick7', 'tick7.ticket_id = ti.tiro7', 'left');
			$this->db->join('destinofinal des7', 'des7.destinofinal_id = tick7.destinofinal_id', 'left');
			$this->db->join('tickets tick8', 'tick8.ticket_id = ti.tiro8', 'left');
			$this->db->join('destinofinal des8', 'des8.destinofinal_id = tick8.destinofinal_id', 'left');
			$this->db->join('tickets tick9', 'tick9.ticket_id = ti.tiro9', 'left');
			$this->db->join('destinofinal des9', 'des9.destinofinal_id = tick9.destinofinal_id', 'left');
			$this->db->join('tickets tick10', 'tick10.ticket_id = ti.tiro10', 'left');
			$this->db->join('destinofinal des10', 'des10.destinofinal_id = tick10.destinofinal_id', 'left');
			$this->db->where('a.sucursal_id', $sucursal_id);
			$this->db->where('re.estatus', 2);

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
	}

	public function getFiltrosData($filtros)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_numero, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.observaciones, re.estatus');
			$this->db->from('registros re');
			$this->db->join('asignaciones asig', 'asig.asignacion_id = re.asignacion_id');
			$this->db->join('usuarios us', 'us.usuario_id = re.usuario_id');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('alias a', 'a.alias_id = re.alias_id');
			$this->db->join('turnos t', 't.turno_id = a.turno_id');
			$this->db->join('rutas r', 'r.ruta_id = a.ruta_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->join('tiros ti', 'ti.registro_id = re.registro_id', 'left');
			$this->db->join('tickets tick1', 'tick1.ticket_id = ti.tiro1', 'left');
			$this->db->join('destinofinal des1', 'des1.destinofinal_id = tick1.destinofinal_id', 'left');
			$this->db->join('tickets tick2', 'tick2.ticket_id = ti.tiro2', 'left');
			$this->db->join('destinofinal des2', 'des2.destinofinal_id = tick2.destinofinal_id', 'left');
			$this->db->join('tickets tick3', 'tick3.ticket_id = ti.tiro3', 'left');
			$this->db->join('destinofinal des3', 'des3.destinofinal_id = tick3.destinofinal_id', 'left');
			$this->db->join('tickets tick4', 'tick4.ticket_id = ti.tiro4', 'left');
			$this->db->join('destinofinal des4', 'des4.destinofinal_id = tick4.destinofinal_id', 'left');
			$this->db->join('tickets tick5', 'tick5.ticket_id = ti.tiro5', 'left');
			$this->db->join('destinofinal des5', 'des5.destinofinal_id = tick5.destinofinal_id', 'left');
			$this->db->join('tickets tick6', 'tick6.ticket_id = ti.tiro6', 'left');
			$this->db->join('destinofinal des6', 'des6.destinofinal_id = tick6.destinofinal_id', 'left');
			$this->db->join('tickets tick7', 'tick7.ticket_id = ti.tiro7', 'left');
			$this->db->join('destinofinal des7', 'des7.destinofinal_id = tick7.destinofinal_id', 'left');
			$this->db->join('tickets tick8', 'tick8.ticket_id = ti.tiro8', 'left');
			$this->db->join('destinofinal des8', 'des8.destinofinal_id = tick8.destinofinal_id', 'left');
			$this->db->join('tickets tick9', 'tick9.ticket_id = ti.tiro9', 'left');
			$this->db->join('destinofinal des9', 'des9.destinofinal_id = tick9.destinofinal_id', 'left');
			$this->db->join('tickets tick10', 'tick10.ticket_id = ti.tiro10', 'left');
			$this->db->join('destinofinal des10', 'des10.destinofinal_id = tick10.destinofinal_id', 'left');
			$this->db->where('re.estatus', 2);
			if ($filtros['fecha1filtro'] & $filtros['fecha2filtro']) {
				$this->db->where("(re.fecha_salida BETWEEN '" . $filtros['fecha1filtro'] . "' AND '" . $filtros['fecha2filtro'] . "' OR '" . $filtros['fecha1filtro'] . "' IS NULL OR '" . $filtros['fecha2filtro'] . "' IS NULL)");
			}
			if ($filtros['filtrounidad_id']) {
				$this->db->where("(u.unidad_id = '" . $filtros['filtrounidad_id'] . "' OR '" . $filtros['filtrounidad_id'] . "' IS NULL)");
			}
			if ($filtros['filtroasignacion_id']) {
				$this->db->where("(asig.asignacion_id = '" . $filtros['filtroasignacion_id'] . "' OR '" . $filtros['filtroasignacion_id'] . "' IS NULL)");
			}
			if ($filtros['supervisor_id']) {
				$this->db->where("(us.usuario_id = '" . $filtros['supervisor_id'] . "' OR '" . $filtros['supervisor_id'] . "' IS NULL)");
			}
			if ($filtros['alias_id']) {
				$this->db->where("(a.alias_id = '" . $filtros['alias_id'] . "' OR '" . $filtros['alias_id'] . "' IS NULL)");
			}
			if ($filtros['turno_id']) {
				$this->db->where("(t.turno_id = '" . $filtros['turno_id'] . "' OR '" . $filtros['turno_id'] . "' IS NULL)");
			}
			if ($filtros['operador_id']) {
				$this->db->where("(o.operador_id = '" . $filtros['operador_id'] . "' OR '" . $filtros['operador_id'] . "' IS NULL)");
			}
			if ($filtros['destinofinal_nombre']) {
				$this->db->group_start();
				$this->db->or_where("des1.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des2.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des3.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des4.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des5.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des6.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des7.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des8.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des9.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des10.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->group_end();
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_numero, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_nombre, o.operador_nombre, tr.numrecolectores, rec1.recolector_nombre AS recolector1, rec2.recolector_nombre AS recolector2, rec3.recolector_nombre AS recolector3, rec4.recolector_nombre AS recolector4, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.observaciones, re.estatus');
			$this->db->from('registros re');
			$this->db->join('asignaciones asig', 'asig.asignacion_id = re.asignacion_id');
			$this->db->join('usuarios us', 'us.usuario_id = re.usuario_id');
			$this->db->join('unidades u', 'u.unidad_id = re.unidad_id');
			$this->db->join('alias a', 'a.alias_id = re.alias_id');
			$this->db->join('turnos t', 't.turno_id = a.turno_id');
			$this->db->join('rutas r', 'r.ruta_id = a.ruta_id');
			$this->db->join('operadores o', 'o.operador_id = re.operador_id');
			$this->db->join('tripulacion tr', 'tr.registro_id = re.registro_id', 'left');
			$this->db->join('recolectores rec1', 'rec1.recolector_id = tr.recolector1', 'left');
			$this->db->join('recolectores rec2', 'rec2.recolector_id = tr.recolector2', 'left');
			$this->db->join('recolectores rec3', 'rec3.recolector_id = tr.recolector3', 'left');
			$this->db->join('recolectores rec4', 'rec4.recolector_id = tr.recolector4', 'left');
			$this->db->join('recolectores rec5', 'rec5.recolector_id = tr.recolector5', 'left');
			$this->db->join('tiros ti', 'ti.registro_id = re.registro_id', 'left');
			$this->db->join('tickets tick1', 'tick1.ticket_id = ti.tiro1', 'left');
			$this->db->join('destinofinal des1', 'des1.destinofinal_id = tick1.destinofinal_id', 'left');
			$this->db->join('tickets tick2', 'tick2.ticket_id = ti.tiro2', 'left');
			$this->db->join('destinofinal des2', 'des2.destinofinal_id = tick2.destinofinal_id', 'left');
			$this->db->join('tickets tick3', 'tick3.ticket_id = ti.tiro3', 'left');
			$this->db->join('destinofinal des3', 'des3.destinofinal_id = tick3.destinofinal_id', 'left');
			$this->db->join('tickets tick4', 'tick4.ticket_id = ti.tiro4', 'left');
			$this->db->join('destinofinal des4', 'des4.destinofinal_id = tick4.destinofinal_id', 'left');
			$this->db->join('tickets tick5', 'tick5.ticket_id = ti.tiro5', 'left');
			$this->db->join('destinofinal des5', 'des5.destinofinal_id = tick5.destinofinal_id', 'left');
			$this->db->join('tickets tick6', 'tick6.ticket_id = ti.tiro6', 'left');
			$this->db->join('destinofinal des6', 'des6.destinofinal_id = tick6.destinofinal_id', 'left');
			$this->db->join('tickets tick7', 'tick7.ticket_id = ti.tiro7', 'left');
			$this->db->join('destinofinal des7', 'des7.destinofinal_id = tick7.destinofinal_id', 'left');
			$this->db->join('tickets tick8', 'tick8.ticket_id = ti.tiro8', 'left');
			$this->db->join('destinofinal des8', 'des8.destinofinal_id = tick8.destinofinal_id', 'left');
			$this->db->join('tickets tick9', 'tick9.ticket_id = ti.tiro9', 'left');
			$this->db->join('destinofinal des9', 'des9.destinofinal_id = tick9.destinofinal_id', 'left');
			$this->db->join('tickets tick10', 'tick10.ticket_id = ti.tiro10', 'left');
			$this->db->join('destinofinal des10', 'des10.destinofinal_id = tick10.destinofinal_id', 'left');
			$this->db->where('a.sucursal_id', $sucursal_id);
			$this->db->where('re.estatus', 2);
			if ($filtros['fecha1filtro'] & $filtros['fecha2filtro']) {
				$this->db->where("(re.fecha_salida BETWEEN '" . $filtros['fecha1filtro'] . "' AND '" . $filtros['fecha2filtro'] . "' OR '" . $filtros['fecha1filtro'] . "' IS NULL OR '" . $filtros['fecha2filtro'] . "' IS NULL)");
			}
			if ($filtros['filtrounidad_id']) {
				$this->db->where("(u.unidad_id = '" . $filtros['filtrounidad_id'] . "' OR '" . $filtros['filtrounidad_id'] . "' IS NULL)");
			}
			if ($filtros['filtroasignacion_id']) {
				$this->db->where("(asig.asignacion_id = '" . $filtros['filtroasignacion_id'] . "' OR '" . $filtros['filtroasignacion_id'] . "' IS NULL)");
			}
			if ($filtros['supervisor_id']) {
				$this->db->where("(us.usuario_id = '" . $filtros['supervisor_id'] . "' OR '" . $filtros['supervisor_id'] . "' IS NULL)");
			}
			if ($filtros['alias_id']) {
				$this->db->where("(a.alias_id = '" . $filtros['alias_id'] . "' OR '" . $filtros['alias_id'] . "' IS NULL)");
			}
			if ($filtros['turno_id']) {
				$this->db->where("(t.turno_id = '" . $filtros['turno_id'] . "' OR '" . $filtros['turno_id'] . "' IS NULL)");
			}
			if ($filtros['operador_id']) {
				$this->db->where("(o.operador_id = '" . $filtros['operador_id'] . "' OR '" . $filtros['operador_id'] . "' IS NULL)");
			}
			if ($filtros['destinofinal_nombre']) {
				$this->db->group_start();
				$this->db->or_where("des1.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des2.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des3.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des4.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des5.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des6.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des7.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des8.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des9.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->or_where("des10.destinofinal_nombre", $filtros['destinofinal_nombre']);
				$this->db->group_end();
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();

			return $result;
		}
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $rendimiento['fecha1rendimiento'] . "' AND '" . $rendimiento['fecha2rendimiento'] . "' OR '" . $rendimiento['fecha1rendimiento'] . "' IS NULL OR '" . $rendimiento['fecha2rendimiento'] . "' IS NULL)");
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $rendimiento['fecha1rendimiento'] . "' AND '" . $rendimiento['fecha2rendimiento'] . "' OR '" . $rendimiento['fecha1rendimiento'] . "' IS NULL OR '" . $rendimiento['fecha2rendimiento'] . "' IS NULL)");
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $litros['2kmfecha1'] . "' AND '" . $litros['2kmfecha2'] . "' OR '" . $litros['2kmfecha1'] . "' IS NULL OR '" . $litros['2kmfecha2'] . "' IS NULL)");
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $litros['2kmfecha1'] . "' AND '" . $litros['2kmfecha2'] . "' OR '" . $litros['2kmfecha1'] . "' IS NULL OR '" . $litros['2kmfecha2'] . "' IS NULL)");
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $tonelages['fecha1tonelage'] . "' AND '" . $tonelages['fecha2tonelage'] . "' OR '" . $tonelages['fecha1tonelage'] . "' IS NULL OR '" . $tonelages['fecha2tonelage'] . "' IS NULL)");
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $tonelages['fecha1tonelage'] . "' AND '" . $tonelages['fecha2tonelage'] . "' OR '" . $tonelages['fecha1tonelage'] . "' IS NULL OR '" . $tonelages['fecha2tonelage'] . "' IS NULL)");
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $horarutas['fecha1horaruta'] . "' AND '" . $horarutas['fecha2horaruta'] . "' OR '" . $horarutas['fecha1horaruta'] . "' IS NULL OR '" . $horarutas['fecha2horaruta'] . "' IS NULL)");
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
				$this->db->where("(re.fecha_salida BETWEEN '" . $horarutas['fecha1horaruta'] . "' AND '" . $horarutas['fecha2horaruta'] . "' OR '" . $horarutas['fecha1horaruta'] . "' IS NULL OR '" . $horarutas['fecha2horaruta'] . "' IS NULL)");
			}
			if ($horarutas['horarutaunidad_id']) {
				$this->db->where("(u.unidad_id = '" . $horarutas['horarutaunidad_id'] . "' OR '" . $horarutas['horarutaunidad_id'] . "' IS NULL)");
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
