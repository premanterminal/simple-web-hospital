<?php

class C_customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
    }

    public function index()
    {
        $data['md_pelanggan'] = $this->m_customer->V_customer();
        $this->load->view('md_pelanggan', $data);
    }
}
