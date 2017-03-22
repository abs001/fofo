<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if(isset($_SESSION['admin_id'])){
			$this->load->view('pages/layout/Director');	
		}else{
			$this->session->set_flashdata('msg','Signin to access account');
			redirect(base_url().'AdminLogin');
		}
	}
}
