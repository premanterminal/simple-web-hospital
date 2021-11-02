<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelasmodel extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db->from('md_kelas_kamar');
        if ($id != NULL) {
            $this->db->where('id_kelas_kamar', $id);
        }
        $query = $this->db->get()->result();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('id_kelas_kamar', $id)
            ->delete('md_kelas_kamar');
    }

    public function add($post)
    {
        $params = [
            
            'nama_kelas_kamar' => htmlspecialchars($post['nama_kelas_kamar']),
            'harga_perhari' => htmlspecialchars($post['harga_perhari'])
        ];

        $this->db->insert('customers', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_kelas_kamar' => htmlspecialchars($post['nama_kelas_kamar']),
            'harga_perhari' => htmlspecialchars($post['harga_perhari']),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db
            ->where('id_kelas_kamar', $post['id'])
            ->update('md_kelas_kamar', $params);
    }
}