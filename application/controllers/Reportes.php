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

		$result = array('data' => array());
		$data = $this->model_reportes->getFiltrosData($filtros);

		foreach ($data as $key => $value) {
			// Dividir las columnas concatenadas
			$recolectores = explode(',', trim($value['recolectores']));
			$folios = explode(',', trim($value['folios']));
			$descripciones = explode(',', trim($value['descripciones']));
			$pesos_folios = explode(',', trim($value['pesos_folios']));

			// Crear un array para almacenar los datos de esta fila
			$rowData = array(
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
			);

			// Añadir 10 recolectores
			for ($i = 0; $i < 5; $i++) {
				$rowData[] = isset($recolectores[$i]) ? $recolectores[$i] : '';
			}

			// Continuar agregando el resto de los datos
			$rowData = array_merge($rowData, array(
				$value['km_salida'],
				$value['km_entrada'],
				$value['recorrido'],
				$value['litroscargados'],
				$value['rendimiento'],
				$value['hora_salida'],
				$value['hora_entrada'],
				$value['hora_tablero'],
				$value['tiempo_ruta'],
				$value['peso_total'],
				$value['destinofinal_nombre'],
				$value['numfolios']
			));

			// Añadir 10 sets de columnas de folio (folio_id, folio, descripción, peso)
			for ($i = 0; $i < 10; $i++) {
				$rowData[] = isset($folios[$i]) ? $folios[$i] : '';
				$rowData[] = isset($descripciones[$i]) ? $descripciones[$i] : '';
				$rowData[] = isset($pesos_folios[$i]) ? $pesos_folios[$i] : '';
			}

			// Agregar las observaciones y el estatus al final
			$rowData[] = $value['observaciones'];
			$rowData[] = $value['estatus'];

			$result['data'][$key] = $rowData;
		}

		$this->data['filtros'] = $result;
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

	public function horarutaTotal()
	{

		if (!in_array('viewReporte', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$horarutas = array(
			'fecha1horarutaTotal' => $this->input->post('fecha1horarutaTotal'),
			'fecha2horarutaTotal' => $this->input->post('fecha2horarutaTotal'),
			'horarutaTotalunidad_id' => $this->input->post('horarutaTotalunidad_id'),
		);

		$horarutas = $this->model_reportes->gettiemporutaTotalData($horarutas);
		$this->data['horarutas'] = $horarutas;

		$this->render_template('reportes/horarutaTotal', $this->data);
	}

	public function fetchReporteCompletoData()
	{
		$result = array('data' => array());
		$data = $this->model_reportes->getReporteCompletoData();

		foreach ($data as $key => $value) {
			// Dividir las columnas concatenadas
			$folio_ids = explode(',', trim($value['folio_ids']));
			$productos = explode(',', trim($value['productos']));
			$categoria_nombre = explode(',', trim($value['categoria_nombre']));
			$descripciones = explode(',', trim($value['descripciones']));
			$cantidad = explode(',', trim($value['cantidad']));
			$medidas_nombres = explode(',', trim($value['medidas_nombres']));

			// Obtener el número de elementos en los arrays divididos
			$numElementos = count($productos);

			// Crear un array para almacenar los datos de esta fila
			$rowData = array(
				$value['manifiesto_id'],
				$value['nummanifiesto'],
				$value['fecha'],
				$value['unidad_numero'],
				$value['destinofinal_nombre'],
				$value['total_cantidad_concatenadas'],
			);

			// Utilizar el número de elementos para iterar solo por las filas necesarias
			for ($i = 0; $i < $numElementos; $i++) {
				$rowData[] = isset($folio_ids[$i]) ? $folio_ids[$i] : '';
				$rowData[] = isset($productos[$i]) ? $productos[$i] : '';
				$rowData[] = isset($categoria_nombre[$i]) ? $categoria_nombre[$i] : '';
				$rowData[] = isset($descripciones[$i]) ? $descripciones[$i] : '';
				$rowData[] = isset($cantidad[$i]) ? $cantidad[$i] : '';
				$rowData[] = isset($medidas_nombres[$i]) ? $medidas_nombres[$i] : '';
			}

			$result['data'][$key] = $rowData;
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
