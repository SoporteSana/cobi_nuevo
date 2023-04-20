<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Reportes';

		$this->load->model('model_reportes');

		$this->load->driver('cache', array('adapter' => 'file'));
	}

	public function index()
	{
		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('reportes/busqueda', $this->data);
	}

	public function completo()
	{
		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('reportes/completo', $this->data);
	}

	public function filtro()
	{

		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$filtros = array(
			'fecha1filtro' => $this->input->post('fecha1filtro'),
			'fecha2filtro' => $this->input->post('fecha2filtro'),
			'filtrounidad_id' => $this->input->post('filtrounidad_id'),
			'filtroasignacion_id' => $this->input->post('filtroasignacion_id'),
			'supervisor_id' => $this->input->post('supervisor_id'),
			'alias_id' => $this->input->post('alias_id'),
			'turno_id' => $this->input->post('turno_id'),
			'operador_id' => $this->input->post('operador_id'),
			'destinofinal_nombre' => $this->input->post('destinofinal')
		);

		$filtros = $this->model_reportes->getFiltrosData($filtros);
		$this->data['filtros'] = $filtros;

		$this->render_template('reportes/filtros', $this->data);
	}

	public function rendimiento()
	{

		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$rendimientos = array(
			'fecha1rendimiento' => $this->input->post('fecha1rendimiento'),
			'fecha2rendimiento' => $this->input->post('fecha2rendimiento'),
			'rendimientounidad_id' => $this->input->post('rendimientounidad_id')
		);

		$rendimientos = $this->model_reportes->getrendimientoData($rendimientos);
		$this->data['rendimientos'] = $rendimientos;

		$this->render_template('reportes/rendimientos', $this->data);
	}

	public function litros()
	{

		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$litros = array(
			'2kmfecha1' => $this->input->post('2kmfecha1'),
			'2kmfecha2' => $this->input->post('2kmfecha2'),
		);

		$litros = $this->model_reportes->get2kmData($litros);
		$this->data['litros'] = $litros;

		$this->render_template('reportes/2km', $this->data);
	}

	public function tonelage()
	{

		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$tonelages = array(
			'fecha1tonelage' => $this->input->post('fecha1tonelage'),
			'fecha2tonelage' => $this->input->post('fecha2tonelage'),
			'tonelageasignacion_id' => $this->input->post('tonelageasignacion_id'),
		);

		$tonelages = $this->model_reportes->gettonelajeData($tonelages);
		$this->data['tonelages'] = $tonelages;

		$this->render_template('reportes/tonelage', $this->data);
	}

	public function horaruta()
	{

		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$horarutas = array(
			'fecha1horaruta' => $this->input->post('fecha1horaruta'),
			'fecha2horaruta' => $this->input->post('fecha2horaruta'),
			'horarutaunidad_id' => $this->input->post('horarutaunidad_id'),
		);

		$horarutas = $this->model_reportes->gettiemporutaData($horarutas);
		$this->data['horarutas'] = $horarutas;

		$this->render_template('reportes/horaruta', $this->data);
	}

	public function fetchReporteCompletoData()
	{
		$result = array('data' => array());

		$data = $this->model_reportes->getReporteCompletoData();

		foreach ($data as $key => $value) {

			$result['data'][$key] = array(
				$value['registro_id'],
				$value['unidad_numero'],
				$value['asignacion_nombre'],
				$value['semana'],
				$value['nombres'],
				$value['dia'],
				$value['fecha_salida'],
				$value['turno_nombre'],
				$value['ruta_nombre'],
				$value['alias_nombre'],
				$value['operador_nombre'],
				$value['numrecolectores'],
				$value['recolector1'],
				$value['recolector2'],
				$value['recolector3'],
				$value['recolector4'],
				$value['recolector5'],
				$value['km_salida'],
				$value['km_entrada'],
				$value['recorrido'],
				$value['litroscargados'],
				$value['rendimiento'],
				$value['hora_salida'],
				$value['hora_entrada'],
				$value['hora_tablero'],
				$value['tiempo_ruta'],
				$value['totalpeso'],
				$value['numtiros'],
				$value['tiro1'],
				$value['destinofinal1'],
				$value['tiro2'],
				$value['destinofinal2'],
				$value['tiro3'],
				$value['destinofinal3'],
				$value['tiro4'],
				$value['destinofinal4'],
				$value['tiro5'],
				$value['destinofinal5'],
				$value['tiro6'],
				$value['destinofinal6'],
				$value['tiro7'],
				$value['destinofinal7'],
				$value['tiro8'],
				$value['destinofinal8'],
				$value['tiro9'],
				$value['destinofinal9'],
				$value['tiro10'],
				$value['destinofinal10'],
				$value['observaciones'],
				$value['estatus'],

			);
		}

		echo json_encode($result);
	}

	public function unidadlist()
	{

		$postData = $this->input->post();

		$data = $this->model_reportes->searchUnidad($postData);

		echo json_encode($data);
	}

	public function asignacionlist()
	{

		$postData = $this->input->post();

		$data = $this->model_reportes->searchasignacion($postData);

		echo json_encode($data);
	}

	public function supervisorlist()
	{

		$postData = $this->input->post();

		$data = $this->model_reportes->searchsupervisor($postData);

		echo json_encode($data);
	}

	public function aliaslist()
	{

		$postData = $this->input->post();

		$data = $this->model_reportes->searchalias($postData);

		echo json_encode($data);
	}

	public function turnolist()
	{

		$postData = $this->input->post();

		$data = $this->model_reportes->searchTurno($postData);

		echo json_encode($data);
	}

	public function operadorlist()
	{

		$postData = $this->input->post();

		$data = $this->model_reportes->searchoperador($postData);

		echo json_encode($data);
	}

	public function destinofinallist()
	{

		$postData = $this->input->post();

		$data = $this->model_reportes->searchdestinofinal($postData);

		echo json_encode($data);
	}
}
