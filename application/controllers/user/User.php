<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('dboperation');
		$this->is_login();
	}
	private function is_login()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
	}
	public function index()
	{
		if ($this->session->userdata('role') === 'addstock') {
			$this->load->view('create-stock/layouts/header');
			$this->load->view('create-stock/create-stock-dashboard');
			$this->load->view('create-stock/layouts/footer');
		} else {
			  echo "Access Denied !";
			// redirect('login');
		}
	}
	
	public function createstoke(){
		$this->load->view('create-stock/layouts/header');
		$this->load->view('create-stock/createstoke');
		$this->load->view('create-stock/layouts/footer');

	}
	public function viewstoke()
	{
		$stock['data'] = $this->dboperation->getstoke();
		$this->load->view('create-stock/layouts/header');
		$this->load->view('create-stock/viewstoke',$stock);
		$this->load->view('create-stock/layouts/footer');
	}
	function submitstoke()
	{
		$this->dboperation->savestoke();
		$this->session->set_flashdata('success', 'Stock updated successfully .');
		redirect('create-stock/view-stoke');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
