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
			$nummanifiesto = explode(',', trim($value['nummanifiesto']));
			$recolectores_nombre = explode(',', trim($value['recolectores_nombre']));
			$folio_ids = explode(',', trim($value['folio_ids']));
			$categoriaProducto_nombre = explode(',', trim($value['categoriaProducto_nombre']));
			$cantidades = explode(',', trim($value['cantidades']));
			$medida_nombre = explode(',', trim($value['medida_nombre']));
			$pesos_totales = explode(',', trim($value['pesos_totales']));
			$descripciones = explode(',', trim($value['descripciones']));

			$nummanifiestos = count($nummanifiesto);
			$numfolios = count($folio_ids);
			$numrecolectores = 5;

			$rowData = array(
				'Registro ID' => $value['registro_id'],
				'Unidad Número' => $value['unidad_numero'],
				'Asignación Nombre' => $value['asignacion_nombre'],
				'Semana' => $value['semana'],
				'Nombres' => $value['nombres'],
				'Día' => $value['dia'],
				'Fecha Salida' => $value['fecha_salida'],
				'Turno Nombre' => $value['turno_nombre'],
				'Ruta Nombre' => $value['ruta_nombre'],
				'Alias Nombre' => $value['alias_nombre'],
				'Operador Nombre' => $value['operador_nombre'],
				'Num Recolectores' => $value['numrecolectores'],
				'Km Salida' => $value['km_salida'],
				'Km Entrada' => $value['km_entrada'],
				'Recorrido' => $value['recorrido'],
				'Litros Cargados' => $value['litroscargados'],
				'Rendimiento' => $value['rendimiento'],
				'Hora Salida' => $value['hora_salida'],
				'Hora Entrada' => $value['hora_entrada'],
				'Hora Tablero' => $value['hora_tablero'],
				'Tiempo Ruta' => $value['tiempo_ruta']
			);

			for ($i = 0; $i < $numrecolectores; $i++) {
				$recolectorColumnName = "Recolector " . ($i + 1);
				$rowData[$recolectorColumnName] = isset($recolectores_nombre[$i]) ? $recolectores_nombre[$i] : 'sin recolector';
			}

			for ($i = 0; $i < max($nummanifiestos, $numfolios); $i++) {
				$nummanifiestoColumnName = "Num Manifiesto " . ($i + 1);
				$numfolioColumnName = "Num Folio " . ($i + 1);
				$categoriaProductoColumnName = "Categoría Producto " . ($i + 1);
				$cantidadColumnName = "Cantidad " . ($i + 1);
				$medidaColumnName = "Medida " . ($i + 1);
				$pesosTotalesColumnName = "Pesos Totales " . ($i + 1);
				$descripcionColumnName = "Descripción " . ($i + 1);

				$rowData[$nummanifiestoColumnName] = isset($nummanifiesto[$i]) ? $nummanifiesto[$i] : '';
				$rowData[$numfolioColumnName] = isset($folio_ids[$i]) ? $folio_ids[$i] : '';
				$rowData[$categoriaProductoColumnName] = isset($categoriaProducto_nombre[$i]) ? $categoriaProducto_nombre[$i] : '';
				$rowData[$cantidadColumnName] = isset($cantidades[$i]) ? $cantidades[$i] : '';
				$rowData[$medidaColumnName] = isset($medida_nombre[$i]) ? $medida_nombre[$i] : '';
				$rowData[$pesosTotalesColumnName] = isset($pesos_totales[$i]) ? $pesos_totales[$i] : '';
				$rowData[$descripcionColumnName] = isset($descripciones[$i]) ? $descripciones[$i] : '';
			}

			$result['data'][$key] = $rowData;
		}

		$columnNames = array(
			'Registro ID',
			'Unidad Número',
			'Asignación Nombre',
			'Semana',
			'Nombres',
			'Día',
			'Fecha Salida',
			'Turno Nombre',
			'Ruta Nombre',
			'Alias Nombre',
			'Operador Nombre',
			'Num Recolectores',
			'Km Salida',
			'Km Entrada',
			'Recorrido',
			'Litros Cargados',
			'Rendimiento',
			'Hora Salida',
			'Hora Entrada',
			'Hora Tablero',
			'Tiempo Ruta'
		);

		// Agrega aquí los nombres de las columnas generadas dinámicamente
		for ($i = 1; $i <= $numrecolectores; $i++) {
			$columnNames[] = "Recolector " . $i;
		}

		for ($i = 1; $i <= max($nummanifiestos, $numfolios); $i++) {
			$columnNames[] = "Num Manifiesto " . $i;
			$columnNames[] = "Num Folio " . $i;
			$columnNames[] = "Categoría Producto " . $i;
			$columnNames[] = "Cantidad " . $i;
			$columnNames[] = "Medida " . $i;
			$columnNames[] = "Pesos Totales " . $i;
			$columnNames[] = "Descripción " . $i;
		}

		$finalResult = array(
			'columnNames' => $columnNames,
			'data' => $result['data'],
		);

		$jsonData = json_encode($finalResult);
		$this->data['jsonData'] = $jsonData;
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
			$nummanifiesto = explode(',', trim($value['nummanifiesto']));
			$recolectores_nombre = explode(',', trim($value['recolectores_nombre']));
			$folio_ids = explode(',', trim($value['folio_ids']));
			$categoriaProducto_nombre = explode(',', trim($value['categoriaProducto_nombre']));
			$cantidades = explode(',', trim($value['cantidades']));
			$medida_nombre = explode(',', trim($value['medida_nombre']));
			$pesos_totales = explode(',', trim($value['pesos_totales']));
			$descripciones = explode(',', trim($value['descripciones']));

			// Obtener el número de elementos en los arrays divididos
			$nummanifiestos = count($nummanifiesto);
			$numfolios = count($folio_ids); // Usamos $folio_ids en lugar de $value['numfolios']
			$numrecolectores = 5;

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
				$value['km_salida'],
				$value['km_entrada'],
				$value['recorrido'],
				$value['litroscargados'],
				$value['rendimiento'],
				$value['hora_salida'],
				$value['hora_entrada'],
				$value['hora_tablero'],
				$value['tiempo_ruta'],
			);

			// Utilizar el número de elementos para iterar solo por las filas necesarias
			for ($i = 0; $i < $numrecolectores; $i++) {
				$rowData[] = isset($recolectores_nombre[$i]) ? $recolectores_nombre[$i] : 'sin recolector';
			}

			// Combinar elementos de nummanifiesto y numfolio
			for ($i = 0; $i < max($nummanifiestos, $numfolios); $i++) {
				if ($i < $nummanifiestos) {
					$rowData[] = isset($nummanifiesto[$i]) ? $nummanifiesto[$i] : '';
				} else {
					$rowData[] = ''; // Rellenar con espacio en blanco si no hay más elementos en nummanifiesto
				}

				if ($i < $numfolios) {
					$rowData[] = isset($numfolios[$i]) ? $numfolios[$i] : '';
					$rowData[] = isset($folio_ids[$i]) ? $folio_ids[$i] : '';
					$rowData[] = isset($categoriaProducto_nombre[$i]) ? $categoriaProducto_nombre[$i] : '';
					$rowData[] = isset($cantidades[$i]) ? $cantidades[$i] : '';
					$rowData[] = isset($medida_nombre[$i]) ? $medida_nombre[$i] : '';
					$rowData[] = isset($pesos_totales[$i]) ? $pesos_totales[$i] : '';
					$rowData[] = isset($descripciones[$i]) ? $descripciones[$i] : '';
				} else {
					// Rellenar con espacio en blanco si no hay más elementos en numfolio
					$rowData[] = '';
					$rowData[] = '';
					$rowData[] = '';
					$rowData[] = '';
					$rowData[] = '';
					$rowData[] = '';
					$rowData[] = '';
				}
			}

			$result['data'][$key] = $rowData;
		}

		echo json_encode($result);
	}


	public function showProducts($manifiesto_id)
	{

		$result = $this->model_manifiestos->getProducts($manifiesto_id);


		echo json_encode($result);
	}

	public function showProductopesos($manifiesto_id)
	{

		$result = $this->model_manifiestos->getpesostotales($manifiesto_id);


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
