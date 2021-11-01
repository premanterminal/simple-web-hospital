<?php

class C_trxkamar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_trxkamar');
    }

    public function index()
    {
        $data['trx_pemesanan_hotel'] = $this->m_trxkamar->v_trxkamar();
        $this->load->view('trx_pemesanan_hotel', $data);
    }
}
