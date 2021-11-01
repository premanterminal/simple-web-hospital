<?php

class C_kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelas');
    }

    public function index()
    {
        $data['md_kelas_kamar'] = $this->m_kelas->v_kelas();
        $this->load->view('md_kelas_kamar', $data);
    }
}
