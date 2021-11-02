<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('Kelasmodel');
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->Kelasmodel->get();
        $this->templates->load('template', 'Kelas/Kelas_data', $data);
    }

    public function add()
    {
        $Kelas = new stdClass();
        $Kelas->id_pemesanan = null;
        $Kelas->id_pelanggan = null;
        $Kelas->id_kelas_kamar = null;
        $Kelas->tanggal_checkin = null;
        $Kelas->tanggal_checkout = null;
        $Kelas->total_invoice = null;
        $data = [
            'page' => 'add',
            'row' => $Kelas
        ];

        $this->templates->load('template', 'Kelas/Kelas_form', $data);
    }

    public function edit($id)
    {
        $query = $this->Kelasmodel->get($id);
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
            $this->Kelasmodel->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->Kelasmodel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil disimpan')</script>";
        }
        echo "<script>window.location='" . site_url('Kelas') . "'</script>";
    }


    public function del($id)
    {
        $this->Kelasmodel->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil dihapus')</script>";
        }
        echo "<script>window.location='" . site_url('Kelas') . "'</script>";
    }
}