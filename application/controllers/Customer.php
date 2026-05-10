<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
        check_customer();
    }

    public function index()
    {
        $this->load->view('layouts/header_customer');
        $this->load->view('customer/dashboard');
        $this->load->view('layouts/footer');
    }
    public function videos()
    {
        $data['videos']=$this->db->query("select * from videos where isdeleted=0")->result();
        $this->load->view('layouts/header_customer');
        $this->load->view('customer/videos',$data);
        $this->load->view('layouts/footer');
    }
    public function requests()
    {
        $user_id = $this->session->userdata('id_user');
        $customer = $this->db->get_where('customers', ['user_id' => $user_id])->row();
        $data['requests'] = $this->db->query("select a.*, b.title, b.description from video_access_requests a
            left join videos b on a.video_id = b.id
            where a.customer_id = '$customer->id'
            order by a.id desc
        ")->result();
        $this->load->view('layouts/header_customer');
        $this->load->view('customer/requests', $data);
        $this->load->view('layouts/footer');
    }
 

}