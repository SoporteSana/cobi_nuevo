<?php 

class Groups extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Groups';
		

		$this->load->model('model_groups');
	}

	/* 
	* It redirects to the manage group page
	* As well as the group data is also been passed to display on the view page
	*/
	public function index()
	{

		if(!in_array('viewGroup', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$groups_data = $this->model_groups->getGroupData();
		$this->data['groups_data'] = $groups_data;

		$this->render_template('groups/index', $this->data);
	}	

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation is for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{

		if(!in_array('createGroup', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('group_name', 'Group name', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $permission = serialize($this->input->post('permission'));
            
        	$data = array(
				'sucursal_id' => $this->session->userdata('sucursal_id'),
        		'grupo_nombre' => $this->input->post('group_name'),
        		'permisos' => $permission,
				'created_at' => date('Y-m-d h:i:s'),
        	);

        	$create = $this->model_groups->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Creado con éxito');
        		redirect('groups/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Ocurrio un error');
        		redirect('groups/create', 'refresh');
        	}
        }
        else {
            // false case
            $this->render_template('groups/create', $this->data);
        }	
	}

	public function edit($id = null)
	{

		if(!in_array('updateGroup', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {

			$this->form_validation->set_rules('group_name', 'Group name', 'required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	            
	        	$data = array(
	        		'grupo_nombre' => $this->input->post('group_name'),
	        		'permisos' => $permission,
					'updated_at' => date('Y-m-d h:i:s'),
	        	);

	        	$update = $this->model_groups->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Actualizado con éxito');
	        		redirect('groups/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Ocurrio un error');
	        		redirect('groups/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $group_data = $this->model_groups->getGroupData($id);
				$this->data['group_data'] = $group_data;
				$this->render_template('groups/edit', $this->data);	
	        }	
		}
	}

	/*
	* It removes the removes information from the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function delete($group_id)
	{
		if (!in_array('deleteGroup', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();
		if ($group_id) {
			$data = array(
				'estatus' => 3,
			);

			$update = $this->model_groups->edit($data, $group_id);
			if ($update == true) {
				$this->session->set_flashdata('success', 'Eliminado con éxito');
				redirect('groups/', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Ocurrio un error');
				redirect('groups/', 'refresh');
			}
		} else {
			$this->session->set_flashdata('errors', 'Ocurrio un error');
			redirect('groups/', 'refresh');
		}

		echo json_encode($response);
	}


}