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
}