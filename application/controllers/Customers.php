<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('CustomerModel');
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->CustomerModel->get();
        $this->templates->load('template', 'customers/customers_data', $data);
    }

    public function add()
    {
        $customers = new stdClass();
        $customers->customer_id = null;
        $customers->name = null;
        $customers->gender = null;
        $customers->phone = null;
        $customers->address = null;
        $data = [
            'page' => 'add',
            'row' => $customers
        ];

        $this->templates->load('template', 'customers/customers_form', $data);
    }

    public function edit($id)
    {
        $query = $this->CustomerModel->get($id);
        if ($query->num_rows() > 0) {
            $customers = $query->row();

            $data = [
                'page' => 'edit',
                'row' => $customers
            ];

            $this->templates->load('template', 'customers/customers_form', $data);
        } else {
            echo "<script>alert('data tidak ditemukan')</script>";
            echo "<script>window.location='" . site_url('customers') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->CustomerModel->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->CustomerModel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil disimpan')</script>";
        }
        echo "<script>window.location='" . site_url('customers') . "'</script>";
    }


    public function del($id)
    {
        $this->CustomerModel->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil dihapus')</script>";
        }
        echo "<script>window.location='" . site_url('customers') . "'</script>";
    }
}