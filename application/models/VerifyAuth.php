<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerifyAuth extends CI_Model
{
	public function verify_admin()
	{
		$arr['username'] = $this->input->post('username');
		$arr['password'] = $this->input->post('password');
		// $arr['password'] = md5($this->input->post('password'));

		return $this->db->get_where('admin-login', $arr)->row();
	}
	public function verify_user($username,$password)
	{
		// $arr['email_id'] = $this->input->post('username');
		// $arr['password'] = md5($this->input->post('password'));
		// // $arr['role'] = $this->input->post('account');
		// return $this->db->get_where('user_accounts', $arr)->row();

		$this->db->select("*");
		$this->db->from('user_accounts');
		$this->db->where('email_id',$username);
		$this->db->where('password', md5($password));
		$query = $this->db->get();
		return $query;
	}
	public function verify_login($username, $password,$role){
		
		$arr['email_id'] = $username;
		$arr['password'] = md5($password);
		$arr['role'] = $role;
		$query = $this->db->get('user_accounts',$arr);

		if($query->num_rows()==1){
			return $query->row();
		}else{
			return false;
		}
	}
}
