<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trxkamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('Trxkamarmodel');
    }

    public function index()
    {
        // $this->load->view('dashboard');

        $data['row'] = $this->Trxkamarmodel->get();
        $this->load->view('ViewTrxKamar', $data);
    }

    public function add()
    {
        $TrxKamar = new stdClass();
        $TrxKamar->id_pemesanan = null;
        $TrxKamar->id_pelanggan = null;
        $TrxKamar->id_kelas_kamar = null;
        $TrxKamar->tanggal_checkin = null;
        $TrxKamar->tanggal_checkout = null;
        $TrxKamar->total_invoice = null;
        $data = [
            'page' => 'add',
            'row' => $Trxkamar
        ];

        $this->load->view('ViewTrxKamar', $data);
    }

    public function edit($id)
    {
        $query = $this->Trxkamarmodel->get($id);
        if ($query->num_rows() > 0) {
            $Trxkamar = $query->row();

            $data = [
                'page' => 'edit',
                'row' => $Trxkamar
            ];

            $this->templates->load('template', 'Trxkamar/Trxkamar_form', $data);
        } else {
            echo "<script>alert('data tidak ditemukan')</script>";
            echo "<script>window.location='" . site_url('Trxkamar') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->Trxkamarmodel->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->Trxkamarmodel->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil disimpan')</script>";
        }
        echo "<script>window.location='" . site_url('Trxkamar') . "'</script>";
    }


    public function del($id)
    {
        $this->Trxkamarmodel->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil dihapus')</script>";
        }
        echo "<script>window.location='" . site_url('Trxkamar') . "'</script>";
    }
}