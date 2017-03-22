<?php
	/**
	* Admin model
	*/
	class Admin extends CI_Model
	{
		function CheckLogin($data)
		{
			$success=$this->db->get_where('admin',$data)->result_array();
			if(count($success) > 0)
			{	
				$username = $data['username'];
				$query = "select admin_id from admin where username='$username'";
				$result = $this->db->query($query)->result_array();
				foreach ($result as $value) {
					$_SESSION['admin_id'] = $value['admin_id'];
					$_SESSION['admin_name'] = $username;
				}
				redirect(base_url().'index.php/Dashboard');
			}else{
				$this->session->set_flashdata('msg','Invalid credential !!!');
				redirect(base_url().'index.php/AdminLogin');
			}
		}
	}
?>