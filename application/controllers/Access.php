<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
        // check_customer();
    }
    public function index()
	{
        $data['requests']=$this->db->query("select a.*,c.name,d.title from video_access_requests a left join customers b on a.customer_id=b.id
        left join users c on b.user_id = c.id
        left join videos d on a.video_id=d.id ")->result();
		$this->load->view('layouts/header_admin');
		$this->load->view('access/dashboard',$data);
		$this->load->view('layouts/footer');
	}
    public function request($video_id)
    {
        $user_id = $this->session->userdata('id_user');
        $customer = $this->db->get_where('customers', ['user_id' => $user_id])->row();
        $data = [
            'customer_id' => $customer->id,
            'video_id' => $video_id,
            'status' => 'pending'
        ];
        $this->db->insert('video_access_requests', $data);
        redirect('customer/videos');
    }
    public function approve($id)
    {
        $data['request']=$this->db->query("select a.*,c.name,d.title from video_access_requests a left join customers b on a.customer_id=b.id
        left join users c on b.user_id = c.id
        left join videos d on a.video_id=d.id where a.id='$id'")->row();
        $this->load->view('layouts/header_admin');
        $this->load->view('access/approve', $data);
        $this->load->view('layouts/footer');
    }
    public function update_approve($id)
    {
        $data = [
            'status' => 'approved',
            'start_at' => $this->input->post('start_at'),
            'end_at' => $this->input->post('end_at'),
            'approved_by' => $this->session->userdata('id_user')
        ];
        $this->db->where('id', $id);
        $this->db->update('video_access_requests', $data);
        redirect('access');
    }
    public function reject($id)
    {
        $data = [
            'status' => 'rejected',
            'approved_by' => $this->session->userdata('id_user')
        ];

        $this->db->where('id', $id);
        $this->db->update('video_access_requests', $data);

        redirect('access');
    }

}