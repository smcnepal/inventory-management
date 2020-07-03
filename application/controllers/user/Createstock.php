<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Createstock extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('DbOperation');
		$this->load->library('form_validation');
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
			$this->load->view('create-stock/layouts/header-createstock');
			$this->load->view('create-stock/create-stock-dashboard');
			$this->load->view('create-stock/layouts/footer');
		} else {
			  echo "Access Denied !";
			// redirect('login');
		}
	}

	public function createstoke(){
		$this->load->view('create-stock/layouts/header-createstock');
		$this->load->view('create-stock/createstoke');
		$this->load->view('create-stock/layouts/footer');

	}
	public function viewstoke()
	{
		$stock['data'] = $this->DbOperation->getstoke();
		$this->load->view('create-stock/layouts/header-createstock');
		$this->load->view('create-stock/viewstoke',$stock);
		$this->load->view('create-stock/layouts/footer');
	}
	public function viewstoke_index()
	{
		
		$this->load->view('create-stock/layouts/header-viewstock');
		$this->load->view('create-stock/stock_out_dashboard');
		$this->load->view('create-stock/layouts/footer');
	}
	public function viewstoke_out()
	{
		$stock['data'] = $this->DbOperation->getstoke();
		$this->load->view('create-stock/layouts/header-viewstock');
		$this->load->view('create-stock/stock_out',$stock);
		$this->load->view('create-stock/layouts/footer');
	}
	public function editstock($id)
	{
		$stock['data'] = $this->DbOperation->getById($id);
		$this->load->view('create-stock/layouts/header-createstock');
		$this->load->view('create-stock/edit-stock', $stock);
		$this->load->view('create-stock/layouts/footer');
	}
	public function editstock_out($id)
	{
		$stock['data'] = $this->DbOperation->getById($id);
		$this->load->view('create-stock/layouts/header-viewstock');
		$this->load->view('create-stock/update_stock_out', $stock);
		$this->load->view('create-stock/layouts/footer');
	}


	public function updatestock($id)
	{

			$stock_out_input = $this->input->post('quantity_out');
			$result = $this->DbOperation->get_quantity($id);

			if ($result->num_rows() > 0) {
				$data = $result->row_array();
				$get_data = $data['quantity'];
				$stock_capacity = $data['stock_capacity'];
				if ($stock_out_input > $get_data) {
					$this->session->set_flashdata('error', "sorry! You don't have sufficient stock.");
					redirect('user/view-stoke');
				} else {
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
					$this->session->set_flashdata('success', 'Item updated succesfully');
					redirect('user/view-stoke');
				}else{
					$stock['data'] = $this->DbOperation->updatestock_noId($id, $total_quantity, $percent);
					$this->session->set_flashdata('success', 'Item updated succesfully');
					redirect('user/view-stoke');
				}
				}
			} else {
				$this->session->set_flashdata('success', 'No  updated');
				redirect('user/view-stock');
				// echo "error";
			}



	}
	public function updatestock_out($id)
	{
		// echo "hello";
		$stock_out_input = $this->input->post('quantity_out');
		$result = $this->DbOperation->get_quantity($id);

		if ($result->num_rows() > 0) {
			$data = $result->row_array();
			$get_data = $data['quantity'];
			$stock_capacity = $data['stock_capacity'];
			if ($stock_out_input > $get_data) {
				$this->session->set_flashdata('error', "sorry! You don't have sufficient stock.");
				redirect('user/view-stoke/out');
			} else {
				$stock_entry['data'] = $this->DbOperation->update_stock_entry($id);
				$result = $this->DbOperation->total_stock_in($id);

				if ($result->num_rows() > 0) {
					$data = $result->row_array();
					$total_stock_in = $data['total_stock_in'];
					$total_stock_out = $data['total_stock_out'];
					$total_quantity = $total_stock_in - $total_stock_out;
					$percent = (($total_quantity / $stock_capacity) * 100);
				}
				$stock['data'] = $this->DbOperation->updatestock_out($id, $total_quantity, $percent);
				$this->session->set_flashdata('success', 'Stock updated succesfully');
				redirect('user/view-stoke/out');
			}
		} else {
			$this->session->set_flashdata('success', 'No  updated');
			redirect('user/view-stoke/out');
			// echo "error";
		}
	}
	function submitstoke()
	{
		$this->form_validation->set_rules('serial_no', 'Serial No.', 'required|is_unique[lex-stoke.serial_no]');
		$this->form_validation->set_rules('item', 'Item Name', 'required', array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('max_stock_value', 'Stock capacity', 'required', array('required' => 'You must provide  %s.'));
		// $this->form_validation->set_rules('userfile', 'Photo', 'required');

		if ($this->form_validation->run() == TRUE) {
			$this->DbOperation->savestoke();
			$this->DbOperation->savestokeId();
			$this->session->set_flashdata('success', 'Item added successfully .');
			redirect('user/view-stoke');
		} else {
			$this->load->view('create-stock/layouts/header-createstock');
			$this->load->view('create-stock/createstoke');
			$this->load->view('create-stock/layouts/footer');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
