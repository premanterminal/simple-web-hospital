<?php

class TrxKamarModel extends CI_Model
{
    private $_table = "trx_pemesanan_hotel";

    public function ViewTrxKamar()
    {
        return $this->db->get($this->_table)->result_array();
    }
}