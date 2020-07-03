<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontrol extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('DbOperation');
		$this->is_login();
		$this->load->helper(array('form', 'url'));
		// $this->load->library('form_validation');
		// if (!$this->session->userdata('v3ipGEFMCk-xlnts')) {
		// 	redirect('login');
		// }
	}
	private function is_login(){
	if ($this->session->userdata('logged_in')!== TRUE) {
			redirect('login');
		}
	}
	public function index()
	{
		if($this->session->userdata('role')==='admin'){
		$this->load->view('layouts/header');
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/footer');
		}else{
			echo "Access Denied !";
		}

	}
	public function generate_report()
	{
		if ($this->session->userdata('role') === 'admin') {
			$result = $this->DbOperation->get_item_id_date();

			if ($result->num_rows() > 0) {
				$this->load->view('layouts/header');
				$data = $result->result_array();
				foreach($data as $value){
					$serial_no = $value['serial_no'];
					$data1['data'] = $this->DbOperation->generate_report($serial_no);
					// $this->load->view('layouts/header');
					$this->load->view('admin/generate-report', $data1);
					// $this->load->view('layouts/footer');
				}
				$this->load->view('layouts/footer');

			}else{
				echo "No records found!!!";
			}

		} else {
			echo "Access Denied !";
		}
	}

	public function createuser()
	{
		if ($this->session->userdata('role') === 'admin') {
		$this->load->view('layouts/header');
		$this->load->view('admin/createuser');
		$this->load->view('layouts/footer');
		} else {
			echo "Access Denied !";
		}
	}
	public function edituser($id)
	{
		if ($this->session->userdata('role') === 'admin') {
			$user['data'] = $this->DbOperation->getUserById($id);
			$this->load->view('layouts/header');
			$this->load->view('admin/updateuser',$user);
			$this->load->view('layouts/footer');
		} else {
			echo "Access Denied !";
		}
	}
	public function updateuser($id)
	{
		if ($this->session->userdata('role') === 'admin') {
			$user['data'] = $this->DbOperation->updateuser($id);
			$this->session->set_flashdata('success', 'User account updated succesfully');
			redirect('admin/userlist');
		} else {
			echo "Access Denied !";
		}
	}

	public function userlist()
	{
		if ($this->session->userdata('role') === 'admin') {
		$data1['data'] = $this->DbOperation->getuserlist();
		$this->load->view('layouts/header');
		$this->load->view('admin/userlist', $data1);
		$this->load->view('layouts/footer');
		} else {
			echo "Access Denied !";
		}
	}

	function save_user()
	{
		// $data = $formData = array();
		// $formData = $this->input->post();
		if (!$this->DbOperation->is_existing_user($_POST['emailId'])) {
			$this->DbOperation->save_user();
			$mailData = array(
				'name' => $this->input->post('firstName'),
				'email' =>  $this->input->post('emaiId'),
				'username' =>  $this->input->post('emailId'),
				'password' =>  $this->input->post('password')
			);

			// Send an email to the site admin
			$send = $this->sendEmail($mailData);
			// Check email sending status
			if ($send) {
				$this->session->set_flashdata('success', 'User account created & email sent successfully.');
				redirect('createuser');
			} else {
				$this->session->set_flashdata('error', 'Sorry email didnt send ');
				redirect('createuser');
			}
			$this->session->set_flashdata('success', 'User account created successfully.');
			redirect('createuser');
		} else {
			$this->session->set_flashdata('error', 'Email already exist.');
			redirect('createuser');
		}
	}
	private function sendEmail($mailData)
	{
		// Load the email library
		//$this->load->library('email');

		// Mail config
		$to = $mailData['email'];
		$from = 'support@wittyscript.com';
		$fromName = "Lex-ffect Digital Display LLP.";
		$mailSubject = 'Dear' . $mailData['name'];

		// Mail content
		$mailContent = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>' . $mailData['name'] . '</p>
            <p><b>Email: </b>' . $mailData['email'] . '</p>
            <p><b>Username: </b>' . $mailData['emailId'] . '</p>
            <p><b>Password: </b>' . $mailData['password'] . '</p>';

		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->to($to);
		$this->email->from($from, $fromName);
		$this->email->subject($mailSubject);
		$this->email->message($mailContent);

		// Send email & return status
		return $this->email->send() ? true : false;
	}


	public function createstock()
	{
		$this->load->view('layouts/header');
		$this->load->view('admin/addstock');
		$this->load->view('layouts/footer');
	}
	public function viewstoke()
	{
		$stock['data'] = $this->DbOperation->getstoke();
		$this->load->view('layouts/header');
		$this->load->view('admin/viewstock', $stock);
		$this->load->view('layouts/footer');
	}
	public function editstock($id)
	{
		$stock['data'] = $this->DbOperation->getById($id);
		$this->load->view('layouts/header');
		$this->load->view('admin/updatestock', $stock);
		$this->load->view('layouts/footer');
	}

	public function updatestock($id)
	{
		$stock_out_input=$this->input->post('quantity_out');
		$result = $this->DbOperation->get_quantity($id);

				 	if ($result->num_rows() > 0) {
				 		$data = $result->row_array();
				 		$get_data = $data['quantity'];
						$stock_capacity = $data['stock_capacity'];
						if($stock_out_input >$get_data){
							$this->session->set_flashdata('error', "sorry! You don't have sufficient item in stock.");
				 			redirect('admin/view-stock');
						}else{
							$stock_entry['data'] = $this->DbOperation->update_stock_entry($id);
							$result = $this->DbOperation->total_stock_in($id);

							if ($result->num_rows() > 0) {
								$data = $result->row_array();
								$total_stock_in = $data['total_stock_in'];
								$total_stock_out = $data['total_stock_out'];
								$total_quantity = $total_stock_in - $total_stock_out;
								$percent = (($total_quantity / $stock_capacity) * 100);
							}


							$this->form_validation->set_rules('serial_no', 'Serial No.', 'required|is_unique[lex-stoke.serial_no]');
							if ($this->form_validation->run() == TRUE) {

								$stock['data'] = $this->DbOperation->updatestock($id, $total_quantity, $percent);
								$this->session->set_flashdata('success', 'Stock updated succesfully');
								redirect('admin/view-stock');
							}else{
								$stock['data'] = $this->DbOperation->updatestock_noId($id, $total_quantity, $percent);
								$this->session->set_flashdata('success', 'Item updated succesfully');
								redirect('admin/view-stock');
							}
						}
					}else{
						$this->session->set_flashdata('success', 'Item not found');
						redirect('admin/view-stock');
					}


	}

	function submitstoke()
	{

		$this->form_validation->set_rules('serial_no', 'Serial No.', 'required|is_unique[lex-stoke.serial_no]');
		$this->form_validation->set_rules('item', 'Item Name', 'required', array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('max_stock_value', 'Max Stock value', 'required');
		// $this->form_validation->set_rules('userfile', 'Photo', 'required');

		if ($this->form_validation->run() == TRUE) {
			$this->DbOperation->savestoke();
			$this->DbOperation->savestokeId();
			$this->session->set_flashdata('success', 'Item created successfully .');
			redirect('admin/view-stock');
		} else {
			// redirect('admin/add-stock');
			$this->load->view('layouts/header');
			$this->load->view('admin/addstock');
			$this->load->view('layouts/footer');
		}

	}
	public function delete_stock($id)
	{
		$data1['data'] = $this->DbOperation->deleteById($id);
		$data1['data'] = $this->DbOperation->deleteById_stock_entry($id);
		$this->session->set_flashdata('success', 'Stock item deleted succesfully');
		redirect('admin/view-stock');
	}
	public function delete_user($id)
	{
		$data1['data'] = $this->DbOperation->deleteUserById($id);
		$this->session->set_flashdata('success', 'User account deleted succesfully');
		redirect('admin/userlist');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
