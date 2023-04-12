<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_supervisores');
		$this->load->model('model_vigilancia');
		$this->load->model('model_users');
		$this->load->model('model_operadores');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		$this->data['total_users'] = $this->model_users->countTotalUsers();
		$this->data['total_supervisores'] = $this->model_supervisores->countTotalSupervisores();
		$this->data['total_registros'] = $this->model_vigilancia->countTotalRegistros();
		$this->data['total_operadores'] = $this->model_operadores->countOperadores();

		$this->render_template('dashboard', $this->data);
	}
}