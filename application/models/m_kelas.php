<?php

class m_kelas extends CI_Model
{
    private $_table = "md_kelas_kamar";

    public function v_kelas()
    {
        return $this->db->get($this->_table)->result_array();
    }
}