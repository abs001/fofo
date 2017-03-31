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
	public function Notification(){
		$this->load->view('pages/notification/notification');
	}
	public function Prizes(){
		$this->db->order_by('date_added','DESC');
		$result['prizes'] = $this->db->get('prize')->result_array();
		$this->load->view('pages/prizes/prizesview',$result);
	}
	public function addPrize(){
		$week = date('W_Y');
		$result = $this->db->get_where('prize',array('week'=>$week));
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('msg',"You already added Prize for this week");
			redirect(base_url().'index.php/Dashboard/Prizes');
		}else{
			$title = $_POST['title'];	
			$prize_name = $_FILES['prize']['name'];
			
			$prize_type = explode('.', $prize_name);
			$prize_type = strtolower(end($prize_type));
			$prize_tmpname = $_FILES['prize']['tmp_name'];
			$prize_path = 'uploads/prize/'.$week.'.'.$prize_type;
			
			$finalPath =  $prize_path;
			$data['title'] = $title;
			$data['image'] = $prize_path;
			$data['week'] = $week;
			date_default_timezone_get("Asia/Kolkata");
			$data['date_added'] = date('Y-m-d');
			$result = $this->db->insert('prize',$data);
			if($result){
				if(move_uploaded_file($prize_tmpname, $finalPath)){
					$this->session->set_flashdata('msg',"Prize added for current week");
					redirect(base_url().'index.php/Dashboard/Prizes');
				}else{
					$this->db->delete('prize',array('week'=>$week));
					$this->session->set_flashdata('msg',"Failed to add prize.");
					redirect(base_url().'index.php/Dashboard/Prizes');
				}
			}else{
				echo "upload problem or query died";
			}
		}
		
	}
	public function deletePrize($id){
		$prize = $this->db->get('prize',array('prize_id'=>$id))->result_array();
			foreach ($prize as $value) {
				$path = $value['image'];
			}
			
		if($this->db->delete('prize',array('prize_id'=>$id))){
			unlink($path);
			$this->session->set_flashdata('msg',"Prize deleted...");
			redirect(base_url().'index.php/Dashboard/Prizes');
		}else{
			$this->session->set_flashdata('msg',"Problem while deleting prize...");
			redirect(base_url().'index.php/Dashboard/Prizes');
		}

	}
}
