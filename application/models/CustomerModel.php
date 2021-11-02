<?php

class CustomerModel extends CI_Model
{
    private $_table = "md_pelanggan";

    public function ViewCustomer()
    {
        return $this->db->get($this->_table)->result_array();
    }
}