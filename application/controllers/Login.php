<?php
defined('BASEPATH') or exit('No direct script access allowed');
// admin login controller
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('VerifyAuth');
		$this->is_login();
	}
	private function is_login(){
	if ($this->session->userdata('logged_in')) {
			redirect('logout');
		}
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function verify()
	{
		$username=$this->input->post('username',TRUE);
		$password = $this->input->post('password', TRUE);
		$result= $this->VerifyAuth->verify_user($username,$password);
		if($result->num_rows()>0){
			$data=$result->row_array();
			$name= $data['first_name'];
			$email_id = $data['email_id'];
			$role = $data['role'];
			$setdata=array(
				'username'=>$name,
				'email_id'=>$email_id,
				'role'=>$role,
				'logged_in'=>TRUE
			);
			$this->session->set_userdata($setdata);
			switch($role){

				case 'admin' :
					redirect('admin/dashboard');
					break;
				case 'addstock':
					redirect('user/create-stock/dashboard');
					break;
				case 'viewstock':
					redirect('user/view-stock/dashboard');
					break;
				default :
					redirect('login');
					$this->session->set_flashdata('message', 'Invalid login,please try again !');
					break;
			}
		}else{
			$this->session->set_flashdata('message', 'Invalid login,please try again !');
			redirect('login');
		}
	 }
}
