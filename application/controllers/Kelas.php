<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('KelasModel');
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->KelasModel->get();
        $this->templates->load('template', 'Kelas/Kelas_data', $data);
    }

    public function add()
    {
        $Kelas = new stdClass();
        $Kelas->id_kelas_kamar = null;
        $Kelas->nama_kelas_kamar = null;
        $Kelas->harga_perhari = null;
        $data = [
            'page' => 'add',
            'row' => $Kelas
        ];

        $this->templates->load('template', 'Kelas/Kelas_form', $data);
    }

    public function edit($id)
    {
        $query = $this->KelasModel->get($id);
        if ($query->num_rows() > 0) {
            $Kelas = $query->row();

            $data = [
                'page' => 'edit',
                'row' => $Kelas
            ];

            $this->templates->load('template', 'Kelas/Kelas_form', $data);
        } else {
            echo "<script>alert('data tidak ditemukan')</script>";
            echo "<script>window.location='" . site_url('Kelas') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->KelasModel->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->KelasModel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil disimpan')</script>";
        }
        echo "<script>window.location='" . site_url('Kelas') . "'</script>";
    }


    public function del($id)
    {
        $this->KelasModel->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil dihapus')</script>";
        }
        echo "<script>window.location='" . site_url('Kelas') . "'</script>";
    }
}