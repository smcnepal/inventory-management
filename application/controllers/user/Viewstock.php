<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Viewstock extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('DbOperation');
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
		if ($this->session->userdata('role') === 'viewstock') {
			$this->load->view('user-layouts/header');
			$this->load->view('view-stock/view-stock-dashboard');
			$this->load->view('user-layouts/footer');
		} else {
			echo "Access Denied !";
		}
	}

	// public function createstoke()
	// {
	// 	$this->load->view('user/layouts/header');
	// 	$this->load->view('user/createstoke');
	// 	$this->load->view('user/layouts/footer');
	// }
	public function viewstoke()
	{
		$stock['data'] = $this->DbOperation->getstoke();
		$this->load->view('user-layouts/header');
		$this->load->view('view-stock/viewstoke', $stock);
		$this->load->view('user-layouts/footer');
	}
	// function submitstoke()
	// {
	// 	$this->dboperation->savestoke();
	// 	$this->session->set_flashdata('success', 'Stock updated successfully .');
	// 	redirect('user/view-stoke');
	// }
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
