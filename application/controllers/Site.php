<?php
date_default_timezone_set('America/Chicago');
// date_default_timezone_set('Asia/Calcutta');
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
 {
 	function __construct()
	{
		parent:: __construct();
		$this->load->library('session');	
		$this->load->library('upload');
		$this->load->library('form_validation', 'image_lib');
		$this->load->model('site_model');
		$this->load->helper('url');
		$this->controller = "Site/";
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS")
		{
			
		}
	}

	public function login()
	{
	 	$this->load->view('login');
	}
	
	function login_admin_submit()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->db->where('usrpin', $username);
        $this->db->where('usepasword', $password);
        $query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			$res = $query->row_array();
			$_SESSION['username']=$username;
			$_SESSION['firstnm']=$res['usrfrstnm'];
			$_SESSION['lastnm']=$res['usrlastnm'];
			$_SESSION['userid']=$res['sno'];
			redirect($this->controller.'index');
		}
		else
		{
			echo "<script>alert('Username and Pasword Does Not Match'); window.location.href='login'</script>";
		}
	}
	public function logout()
	{
		session_destroy();
		redirect($this->controller.'login');
	}
	public function index()
	{
		$location = $this->db->get('location')->result();
		$res['location'] = count($location);
		$master = $this->db->get('master')->result();
		$res['master'] = count($master);
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('index',$res);
		$this->load->view('include/footer');
	}
	public function location_master()
	{
		$qu = $this->db->get('location');
	    $res['locton'] = $qu->result();
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('location_mast',$res);
		$this->load->view('include/footer');
	}
	public function location_mast_submit()
	{
		$location_nm = $this->input->post('location_nm');
		$data = array(
						'location_nm' =>$location_nm,
						'usrnm' =>$_SESSION['userid'],
						'entry_dt' =>date('d/m/Y')
					 );
		$this->db->insert('location',$data);
	    $this->session->set_flashdata('location', 'Inserted Successfully . . . !');
	    redirect($this->controller.'location_master');
	}
	public function update_location_mast()
	{
		$sno = $this->input->post('sno');
		$this->db->where('sno',$sno);
		$q = $this->db->get('location');
		$res = $q->row_array();
		echo json_encode($res);
	}
	public function location_update_submit()
	{
		$sno = $this->input->post('sno');
		$location_nm = $this->input->post('location_nm');
		$data = array(
						'location_nm' =>$location_nm,
						'update_dt' =>date('d/m/Y')
					 );
		$this->db->where('sno',$sno);
		$this->db->update('location',$data);
	    $this->session->set_flashdata('location', 'Updated Successfully . . . !');
	    redirect($this->controller.'location_master');
	}
	public function delete_city_mast()
	{
		$sno = $this->input->get('sno');
		$this->db->where('sno',$sno);
		$this->db->delete('location');
		 redirect($this->controller.'location_master');
	} 
	public function master()
	{
		$qu = $this->db->get('location');
	    $res['locton'] = $qu->result();
	    $que = $this->db->get('master');
	    $res['master'] = $que->result();
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('master',$res);
		$this->load->view('include/footer');	
	}
	public function master_submit()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$location = $this->input->post('location');
		$data = array(
						'first_name' =>$first_name,
						'last_name' =>$last_name,
						'location' =>$location,
						'usrnm' =>$_SESSION['userid'],
						'entry_date' =>date('d/m/Y')
					 );
		$this->db->insert('master',$data);
	    $this->session->set_flashdata('location', 'Inserted Successfully . . . !');
	    redirect($this->controller.'master');
	}
	public function update_master()
	{
		$sno = $this->input->post('sno');
		$this->db->where('sno',$sno);
		$q = $this->db->get('master');
		$res = $q->row_array();
		echo json_encode($res);
	}
	public function master_update_submit()
	{
		$sno = $this->input->post('sno');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$location = $this->input->post('location');
		$data = array(
						'first_name' =>$first_name,
						'last_name' =>$last_name,
						'location' =>$location,
						'updatedt' =>date('d/m/Y')
					 );
		$this->db->where('sno',$sno);
		$this->db->update('master',$data);
	    $this->session->set_flashdata('location', 'Updated Successfully . . . !');
	    redirect($this->controller.'master');
	}
	public function delete_master()
	{
		$sno = $this->input->get('sno');
		$this->db->where('sno',$sno);
		$this->db->delete('master');
		 redirect($this->controller.'master');
	} 
}


	
