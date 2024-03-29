<?php

class Model_correcciones extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCorreccionData($id = null)
	{
		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_id, u.unidad_numero, asig.asignacion_id, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_id, a.alias_nombre, o.operador_id, o.operador_nombre, tr.numrecolectores, rec1.recolector_id as recolectorid1, rec1.recolector_nombre AS recolector1, rec2.recolector_id as recolectorid2, rec2.recolector_nombre AS recolector2, rec3.recolector_id as recolectorid3, rec3.recolector_nombre AS recolector3, rec4.recolector_id as recolectorid4, rec4.recolector_nombre AS recolector4, rec5.recolector_id as recolectorid5, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.ticket_id as ticket_id1, tick1.folio as folio1, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1,  tick2.ticket_id as ticket_id2, tick2.folio as folio2, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2,  tick3.ticket_id as ticket_id3, tick3.folio as folio3, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3,  tick4.ticket_id as ticket_id4, tick4.folio as folio4, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4,  tick5.ticket_id as ticket_id5, tick5.folio as folio5, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5,  tick6.ticket_id as ticket_id6, tick6.folio as folio6, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6,  tick7.ticket_id as ticket_id7, tick7.folio as folio7, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7,  tick8.ticket_id as ticket_id8, tick8.folio as folio8, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8,  tick9.ticket_id as ticket_id9, tick9.folio as folio9, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9,  tick10.ticket_id as ticket_id10, tick10.folio as folio10, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.totalpeso, re.observaciones, re.estatus');
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

			if ($id) {
				$this->db->where('re.registro_id', $id);
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->row_array() : array();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : array();
			}

			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_id, u.unidad_numero, asig.asignacion_id, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, fecha_entrada, fecha_salida, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_id, a.alias_nombre, o.operador_id, o.operador_nombre, tr.numrecolectores, rec1.recolector_id as recolectorid1, rec1.recolector_nombre AS recolector1, rec2.recolector_id as recolectorid2, rec2.recolector_nombre AS recolector2, rec3.recolector_id as recolectorid3, rec3.recolector_nombre AS recolector3, rec4.recolector_id as recolectorid4, rec4.recolector_nombre AS recolector4, rec5.recolector_id as recolectorid5, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.ticket_id as ticket_id1, tick1.folio as folio1, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1,  tick2.ticket_id as ticket_id2, tick2.folio as folio2, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2,  tick3.ticket_id as ticket_id3, tick3.folio as folio3, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3,  tick4.ticket_id as ticket_id4, tick4.folio as folio4, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4,  tick5.ticket_id as ticket_id5, tick5.folio as folio5, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5,  tick6.ticket_id as ticket_id6, tick6.folio as folio6, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6,  tick7.ticket_id as ticket_id7, tick7.folio as folio7, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7,  tick8.ticket_id as ticket_id8, tick8.folio as folio8, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8,  tick9.ticket_id as ticket_id9, tick9.folio as folio9, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9,  tick10.ticket_id as ticket_id10, tick10.folio as folio10, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.totalpeso, re.observaciones, re.estatus');
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

			if ($id) {
				$this->db->where('re.registro_id', $id);
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->row_array() : array();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : array();
			}

			return $result;
		}
	}

	public function getFiltrosData($filtros)
	{

		$sucursal_id = $this->session->userdata('sucursal_id');
		$username = $this->session->userdata('username');

		if ($username == 'admin') {

			$this->db->select('re.registro_id, u.unidad_id, u.unidad_numero, asig.asignacion_id, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_id, a.alias_nombre, o.operador_id, o.operador_nombre, tr.numrecolectores, rec1.recolector_id as recolectorid1, rec1.recolector_nombre AS recolector1, rec2.recolector_id as recolectorid2, rec2.recolector_nombre AS recolector2, rec3.recolector_id as recolectorid3, rec3.recolector_nombre AS recolector3, rec4.recolector_id as recolectorid4, rec4.recolector_nombre AS recolector4, rec5.recolector_id as recolectorid5, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.ticket_id as ticket_id1, tick1.folio as folio1, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1,  tick2.ticket_id as ticket_id2, tick2.folio as folio2, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2,  tick3.ticket_id as ticket_id3, tick3.folio as folio3, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3,  tick4.ticket_id as ticket_id4, tick4.folio as folio4, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4,  tick5.ticket_id as ticket_id5, tick5.folio as folio5, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5,  tick6.ticket_id as ticket_id6, tick6.folio as folio6, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6,  tick7.ticket_id as ticket_id7, tick7.folio as folio7, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7,  tick8.ticket_id as ticket_id8, tick8.folio as folio8, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8,  tick9.ticket_id as ticket_id9, tick9.folio as folio9, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9,  tick10.ticket_id as ticket_id10, tick10.folio as folio10, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.totalpeso, re.observaciones, re.estatus');
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
			if ($filtros['filtroid']) {
				$this->db->where("(re.registro_id = '" . $filtros['filtroid'] . "' OR '" . $filtros['filtroid'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();


			return $result;
		} else {

			$this->db->select('re.registro_id, u.unidad_id, u.unidad_numero, asig.asignacion_id, asig.asignacion_nombre, re.semana, us.nombres, re.dia, re.hora_tablero, re.km_salida, re.km_entrada, re.recorrido, re.litroscargados, re.rendimiento, re.tiempo_ruta, fecha_entrada, fecha_salida, re.hora_salida, re.hora_entrada, t.turno_nombre, r.ruta_nombre, a.alias_id, a.alias_nombre, o.operador_id, o.operador_nombre, tr.numrecolectores, rec1.recolector_id as recolectorid1, rec1.recolector_nombre AS recolector1, rec2.recolector_id as recolectorid2, rec2.recolector_nombre AS recolector2, rec3.recolector_id as recolectorid3, rec3.recolector_nombre AS recolector3, rec4.recolector_id as recolectorid4, rec4.recolector_nombre AS recolector4, rec5.recolector_id as recolectorid5, rec5.recolector_nombre AS recolector5, re.totalpeso, ti.numtiros, tick1.ticket_id as ticket_id1, tick1.folio as folio1, tick1.peso AS tiro1, des1.destinofinal_nombre AS destinofinal1,  tick2.ticket_id as ticket_id2, tick2.folio as folio2, tick2.peso AS tiro2, des2.destinofinal_nombre AS destinofinal2,  tick3.ticket_id as ticket_id3, tick3.folio as folio3, tick3.peso AS tiro3, des3.destinofinal_nombre AS destinofinal3,  tick4.ticket_id as ticket_id4, tick4.folio as folio4, tick4.peso AS tiro4, des4.destinofinal_nombre AS destinofinal4,  tick5.ticket_id as ticket_id5, tick5.folio as folio5, tick5.peso AS tiro5, des5.destinofinal_nombre AS destinofinal5,  tick6.ticket_id as ticket_id6, tick6.folio as folio6, tick6.peso AS tiro6, des6.destinofinal_nombre AS destinofinal6,  tick7.ticket_id as ticket_id7, tick7.folio as folio7, tick7.peso AS tiro7, des7.destinofinal_nombre AS destinofinal7,  tick8.ticket_id as ticket_id8, tick8.folio as folio8, tick8.peso AS tiro8, des8.destinofinal_nombre AS destinofinal8,  tick9.ticket_id as ticket_id9, tick9.folio as folio9, tick9.peso AS tiro9, des9.destinofinal_nombre AS destinofinal9,  tick10.ticket_id as ticket_id10, tick10.folio as folio10, tick10.peso AS tiro10, des10.destinofinal_nombre AS destinofinal10, re.totalpeso, re.observaciones, re.estatus');
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
			if ($filtros['filtroid']) {
				$this->db->where("(re.registro_id = '" . $filtros['filtroid'] . "' OR '" . $filtros['filtroid'] . "' IS NULL)");
			}

			$query = $this->db->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : array();


			return $result;
		}
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
}
