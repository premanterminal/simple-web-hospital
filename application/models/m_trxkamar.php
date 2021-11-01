<?php

class m_trxkamar extends CI_Model
{
    private $_table = "trx_pemesanan_hotel";

    public function v_trxkamar()
    {
        return $this->db->get($this->_table)->result_array();
    }
}