<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('Customers_model');
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->Customers_model->get();
        $this->load->view('ViewCustomer', $data);
    }

    public function add()
    {
        $customers = new stdClass();
        $customers->id_pelanggan = null;
        $customers->nama_pelanggan = null;
        $customers->tanggal_lahir = null;
        $customers->no_handphone = null;
        $customers->email = null;
        $data = [
            'page' => 'add',
            'row' => $customers
        ];

        $this->load->view('ViewCustomer', $data);
    }

    public function edit($id)
    {
        $query = $this->Customers_model->get($id);
        if ($query->num_rows() > 0) {
            $customers = $query->row();

            $data = [
                'page' => 'edit',
                'row' => $customers
            ];

            $this->load->view('ViewCustomer', $data);
        } else {
            echo "<script>alert('data tidak ditemukan')</script>";
            echo "<script>window.location='" . site_url('customers') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->Customers_model->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->Customers_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil disimpan')</script>";
        }
        echo "<script>window.location='" . site_url('customers') . "'</script>";
    }


    public function del($id)
    {
        $this->Customers_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil dihapus')</script>";
        }
        echo "<script>window.location='" . site_url('customers') . "'</script>";
    }
}