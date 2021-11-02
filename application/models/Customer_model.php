<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db->from('md_pelanggan');
        if ($id != NULL) {
            $this->db->where('id_pelanggan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('id_pelanggan', $id)
            ->delete('md_pelanggan');
    }

    public function add($post)
    {
        $params = [
            
            'nama_pelanggan' => htmlspecialchars($post['nama_pelanggan']),
            'tanggal_lahir' => htmlspecialchars($post['tanggal_lahir']),
            'no_handphone' => htmlspecialchars($post['no_handphone']),
            'email' => htmlspecialchars($post['email'])
        ];

        $this->db->insert('customers', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_pelanggan' => htmlspecialchars($post['nama_pelanggan']),
            'tanggal_lahir' => htmlspecialchars($post['tanggal_lahir']),
            'no_handphone' => htmlspecialchars($post['no_handphone']),
            'email' => htmlspecialchars($post['email']),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db
            ->where('id_pelanggan', $post['id'])
            ->update('md_pelanggan', $params);
    }
}