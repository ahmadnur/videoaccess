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
	 public function customers()
    {
        $data['customers']= $this->db->query("select a.*,b.phone, b.address from users a left join customers b on a.id=b.user_id where a.role='customer' and isdeleted='0'")->result();
        $this->load->view('layouts/header_customer');
        $this->load->view('admin/customer_list',$data);
        $this->load->view('layouts/footer');
    }
	public function add_customer()
    {
        $this->load->view('layouts/header_customer');
        $this->load->view('admin/customer_add');
        $this->load->view('layouts/footer');
    }
	public function store_customer()
	{
		$user = [
			'name'     => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'role'     => 'customer',
			'isdeleted'=> 0
		];

		$this->db->insert('users', $user);

		$user_id = $this->db->insert_id();

		$customer = [
			'user_id' => $user_id,
			'phone'   => $this->input->post('phone'),
			'address' => $this->input->post('address')
		];

		$this->db->insert('customers', $customer);

		redirect('admin/customers');
	}
	public function delete_customer($id)
	{
		$customer = $this->db->get_where('users', ['id' => $id,'role'=>'customer'])->row();

		if ($customer) {
			$this->db->where('id', $customer->id);
			$this->db->update('users', ['isdeleted' => 1]);
		}

		redirect('admin/customers');
	}
}