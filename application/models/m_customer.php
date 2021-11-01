<?php

class m_customer extends CI_Model
{
    private $_table = "md_pelanggan";

    public function V_customer()
    {
        return $this->db->get($this->_table)->result_array();
    }
}