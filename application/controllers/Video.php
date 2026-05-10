<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
        
    }

    public function index()
	{
		check_admin();
		$data['videos']=$this->db->query("select * from videos where isdeleted=0")->result();
		$this->load->view('layouts/header_admin');
		$this->load->view('admin/videos',$data);
		$this->load->view('layouts/footer');
	}
    public function add()
	{
		check_admin();
		$this->load->view('layouts/header_admin');
		$this->load->view('admin/add_video');
		$this->load->view('layouts/footer');
	}
    public function store()
	{
		check_admin();
		$config['upload_path'] = './uploads/videos/';
		$config['allowed_types'] = 'mp4|mov|avi';
		$config['max_size'] = 50000;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('video')) {
			$upload = $this->upload->data();
			$data = [
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'file_name' => $upload['file_name'],
				'created_by' => $this->session->userdata('id_user'),
				'isdeleted' => 0
			];
			$this->db->insert('videos', $data);
			redirect('video');
		} else {

			echo $this->upload->display_errors();
		}
	}
	public function delete($id)
	{
		check_admin();
		$video = $this->db->get_where('videos', ['id' => $id])->row();
		if ($video) {
			$this->db->where('id', $id);
			$this->db->update('videos', ['isdeleted' => 1]);
		}
		redirect('video');
	}
	public function watch($id)
	{
		$id_user = $this->session->userdata('id_user');

		$customer = $this->db->query("
			select *
			from customers
			where user_id = '$id_user'
		")->row();

		$cek = $this->db->query("
			select *
			from video_access_requests
			where customer_id = '$customer->id'
			and video_id = '$id'
			and status = 'approved'
			order by id desc
		")->row();

		if(empty($cek)){
			echo "Akses tidak ditemukan";
			return;
		}

		$now = date('Y-m-d H:i:s');

		if($now < $cek->start_at){
			echo "Akses belum dimulai";
			return;
		}

		if($now > $cek->end_at){
			echo "Akses sudah habis";
			return;
		}

		$data['video'] = $this->db->query("
			select *
			from videos
			where id = '$id'
		")->row();

		$this->load->view('layouts/header_customer');
		$this->load->view('customer/watch', $data);
		$this->load->view('layouts/footer');
	}
	
}