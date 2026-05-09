<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->database();
	$this->load->library('session');
}

	public function index()
	{
		$data = array(
			'page_title' => 'Video Access',
		);

		$this->load->view('auth', $data);
	}
	public function login()
	{
		$sukses="T";
		$pesan="";
		$role="";
		$user= $this->input->post("user");
		$pass= $this->input->post("pass");
		$passhash=md5($pass);
		$data=$this->db->query("select * from users where username='$user' and password='$passhash'")->row_array();
		if($data){
			$sukses="Y";
			$pesan="berhasil login";
			$session = [
            'id_user' => $data['id'],
            'username' => $data['username'],
            'name' => $data['name'],
			'role' => $data['role'],
            'login' => true
        ];
		$role=$data['role'];
        $this->session->set_userdata($session);
		}else{
			$sukses="T";
			$pesan="Username dan password ada yang salah";
		}
		$result=array("sukses"=>$sukses,"pesan"=>$pesan,"role"=>$role);
		echo json_encode($result);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
