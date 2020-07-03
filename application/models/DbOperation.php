<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DbOperation extends CI_Model
{



	function countAll()
	{
		$keyword = $this->input->get('keyword');
		if ($keyword) {
			$this->db->like(array('title' => $keyword));
			$this->db->or_like(array('author' => $keyword));
		}
		return $this->db->get('user_accounts')->num_rows();
	}
	function get_item_id_date(){

		// $date = new DateTime("now");
		// $curr_date = $date->format('Y-m-d ');
		$this->db->select('serial_no');
		$this->db->from('lex-stoke');
		// $array = array('created_date' => $curr_date);
		// $this->db->where($array);
		$query = $this->db->get();
		return $query;
	}
	function generate_report( $serial_no){
				$date = new DateTime("now");
				$curr_date = $date->format('Y-m-d ');

				$this->db->select('product_id,sum(stock_in) as total_in,sum(stock_out) as total_out,lex-stoke.item,lex-stoke.quantity');
				$this->db->from('stock_entry');
				$this->db->join('lex-stoke', 'stock_entry.product_id = lex-stoke.serial_no');
				$array = array('product_id' => $serial_no,'stock_entry.created_date' => $curr_date);
				$this->db->where($array);
				$query = $this->db->get()->result();
				return $query;
	}
	public function save_user()
	{
		$post_content['first_name'] = $this->input->post('firstName');
		$post_content['last_name'] = $this->input->post('lastName');
		$post_content['email_id'] = $this->input->post('emailId');
		$post_content['contact_number'] = $this->input->post('contactDetails');
		$post_content['role'] = $this->input->post('role');
		$post_content['password'] = md5($this->input->post('password'));

		$this->db->insert('user_accounts', $post_content);
	}

	public function getuserlist()
	{

		$this->db->order_by('_id DESC');
		$this->db->select('_id, first_name, email_id,contact_number,created_date');
		return $this->db->get('user_accounts')->result();
	}
	public function getstoke()
	{
		$keyword = $this->input->get('keyword');
			if($keyword){
				$this->db->like(array('item' => $keyword));
				$this->db->or_like(array('description' => $keyword));
				$this->db->or_like(array('serial_no' => $keyword));
			}
		$this->db->order_by('_id DESC');
		return $this->db->get('lex-stoke')->result();
	}
	public function getById($id)
	{
		return $this->db->get_where('lex-stoke', array('serial_no' => $id))->row();
	}

	public function getUserById($id)
	{
		return $this->db->get_where('user_accounts', array('_id' => $id))->row();
	}

	function is_existing_user($email)
	{
		$this->db->where('email_id', $email);
		$query = $this->db->get('user_accounts');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function save_stock_entry(){
		$post_content['stock_in'] = $this->input->post('quantity_in');
		$post_content['stock_out'] = $this->input->post('quantity_out');
		$this->db->insert('stock_entry',$post_content);
	}
	function update_stock_entry($id)
	{
		$post_content['stock_in'] = $this->input->post('quantity_in');
		$post_content['stock_out'] = $this->input->post('quantity_out');
		$post_content['product_id'] = $id;
		$this->db->insert('stock_entry', $post_content);
	}
	function savestokeId(){
		$post_content['product_id'] = $this->input->post('serial_no');
		$this->db->insert('stock_entry',$post_content);

	}
	function savestoke()
	{
			$post_content['serial_no'] = $this->input->post('serial_no');
			$post_content['item'] = $this->input->post('item');
			$post_content['description'] = $this->input->post('description');
			$post_content['stock_capacity'] = $this->input->post('max_stock_value');

			if (isset($_FILES['userfile']['name'])) {

				$this->load->library('upload');
				$config['upload_path'] = APPPATH . '../assets/uploads/';
				$config['allowed_types'] = 'gif|jpg|png|xls|doc|docx|xlsx|rar|zip|pdf';
				$config['remove_spaces'] = TRUE;  //it will remove all spaces
				// $config['file_name'] = date('YmdHms') . 'lexffect' . rand(1, 1147);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('userfile')) {
					$uploaded = $this->upload->data();
					$post_content['files'] = $uploaded['file_name'];
				}
			}

			$this->db->insert('lex-stoke', $post_content);
	}

	function updatestock($id, $quantity, $percent)
	{
			$post_content['serial_no'] = $this->input->post('serial_no');
			$post_content['item'] = $this->input->post('item');
			$post_content['description'] = $this->input->post('description');
			$post_content['stock_capacity'] = $this->input->post('max_stock_value');
			$post_content['quantity'] = $quantity;
			$post_content['percentage'] = $percent;
			// $post_content['created_date'] = "date('d-m-Y')";

			if (isset($_FILES['userfile']['name'])) {

				$this->load->library('upload');
				$config['upload_path'] = APPPATH . '../assets/uploads/';
				$config['allowed_types'] = 'gif|jpg|png|xls|doc|docx|xlsx|rar|zip|pdf';
				$config['remove_spaces'] = TRUE;  //it will remove all spaces
				$this->upload->initialize($config);

				if ($this->upload->do_upload('userfile')) {
					$uploaded = $this->upload->data();
					$post_content['files'] = $uploaded['file_name'];
				}
			}
			$this->db->where(array('serial_no' => $id));
			$this->db->update('lex-stoke', $post_content);
		}

		function updatestock_noId($id, $quantity, $percent)
		{
				
				// $post_content['serial_no'] = $this->input->post('serial_no');
				$post_content['item'] = $this->input->post('item');
				$post_content['description'] = $this->input->post('description');
				$post_content['stock_capacity'] = $this->input->post('max_stock_value');
				$post_content['quantity'] = $quantity;
				$post_content['percentage'] = $percent;
				// $post_content['created_date'] = "date('d-m-Y')";

				if (isset($_FILES['userfile']['name'])) {

					$this->load->library('upload');
					$config['upload_path'] = APPPATH . '../assets/uploads/';
					$config['allowed_types'] = 'gif|jpg|png|xls|doc|docx|xlsx|rar|zip|pdf';
					$config['remove_spaces'] = TRUE;  //it will remove all spaces
					$this->upload->initialize($config);

					if ($this->upload->do_upload('userfile')) {
						$uploaded = $this->upload->data();
						$post_content['files'] = $uploaded['file_name'];
					}
				}
				$this->db->where(array('serial_no' => $id));
				$this->db->update('lex-stoke', $post_content);
			}
	function updatestock_out($id, $quantity, $percent)
	{
		$post_content['serial_no'] = $id;
		// $post_content['item'] = $this->input->post('item');
		// $post_content['description'] = $this->input->post('description');
		// $post_content['stock_capacity'] = $this->input->post('max_stock_value');
		$post_content['quantity'] = $quantity;
		$post_content['percentage'] = $percent;

		if (isset($_FILES['userfile']['name'])) {

			$this->load->library('upload');
			$config['upload_path'] = APPPATH . '../assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png|xls|doc|docx|xlsx|rar|zip|pdf';
			$config['remove_spaces'] = TRUE;  //it will remove all spaces
			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile')) {
				$uploaded = $this->upload->data();
				$post_content['files'] = $uploaded['file_name'];
			}
		}
		$this->db->where(array('serial_no' => $id));
		$this->db->update('lex-stoke', $post_content);
	}

	function updateuser($id){
		$post_content['first_name'] = $this->input->post('firstName');
		$post_content['last_name'] = $this->input->post('lastName');
		$post_content['email_id'] = $this->input->post('emailId');
		$post_content['contact_number'] = $this->input->post('contactDetails');
		$post_content['role'] = $this->input->post('role');
		$post_content['password'] = md5($this->input->post('password'));
		$this->db->where(array('_id' => $id));
		$this->db->update('user_accounts', $post_content);

	}
	function get_quantity($id){
		$this->db->select("quantity,stock_capacity");
		$this->db->from('lex-stoke');
		$this->db->where('serial_no', $id);
		$query = $this->db->get();
		return $query;
	}
	function total_stock_in($id)
	{
		// $this->db->trans_start();
		$this->db->select("sum(stock_in) as total_stock_in, sum(stock_out) as total_stock_out");
		$this->db->from('stock_entry');
		$this->db->where('product_id', $id);
		$query = $this->db->get();
		return $query;
		// $this->db->trans_complete();
	}

	public function deleteById($id)
	{
		$this->db->where(array('serial_no' => $id));
		$this->db->delete('lex-stoke');
	}
	function deleteById_stock_entry($id){
		$this->db->where(array('product_id' => $id));
		$this->db->delete('	stock_entry');
	}
	public function deleteUserById($id)
	{
		$this->db->where(array('_id' => $id));
		$this->db->delete('user_accounts');
	}

}
