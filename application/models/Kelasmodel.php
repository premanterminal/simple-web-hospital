<?php

class KelasModel extends CI_Model
{
    private $_table = "md_kelas_kamar";

    public function ViewKelas()
    {
        return $this->db->get($this->_table)->result_array();
    }
}