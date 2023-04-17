<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		$this->load->view('dashboard', $this->page_data);
	}
	public function add()
	{
		
		$this->load->view('users/add', $this->page_data);
	}

	public function save()
	{
		
		postAllowed();

		$id = $this->users_model->create([
			'is_AgreedToTerms' => post('role'),
			
		]);



		$this->activity_model->add('New User $'.$id.' Created by User:'.logged('name'), logged('id'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New User Created Successfully');
		
		redirect('users');

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */