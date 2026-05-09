<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
        check_admin();
    }

    public function index()
	{
		$this->load->view('layouts/header_admin');
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/footer');
	}
}