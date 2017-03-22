<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	public function index(){
		$this->load->view('pages/login/AdminLogin');
	}
	public function LoginCheck(){
			$data['username'] = $_POST['username'];
			$data['password'] = sha1($_POST['password']);
			$this->load->model('Admin');
			$this->Admin->CheckLogin($data);
	}
	public function Logout(){
		unset($_SESSION['admin_id']);
		$this->session->set_flashdata('msg','Successfully logout.');
		redirect(base_url().'AdminLogin');
	}
}
