<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trxkamarmodel extends CI_Model
{
    public function get($id = NULL)
    {
        $this->db->from('md_trx_pemesanan_hotel');
        if ($id != NULL) {
            $this->db->where('id_pemesanan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db
            ->where('id_pemesanan', $id)
            ->delete('md_trx_pemesanan_hotel');
    }

    public function add($post)
    {
        $params = [
            'id_pelanggan' => htmlspecialchars($post['id_pelanggan']),
            'id_kelas_kamar' => htmlspecialchars($post['id_kelas_kamar']),
            'tanggal_checkin' => htmlspecialchars($post['tanggal_checkin']),
            'tanggal_checkout' => htmlspecialchars($post['tanggal_checkout']),
            'total_invoice' => htmlspecialchars($post['total_invoice'])
        ];

        $this->db->insert('customers', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_pelanggan' => htmlspecialchars($post['id_pelanggan']),
            'id_kelas_kamar' => htmlspecialchars($post['id_kelas_kamar']),
            'tanggal_checkin' => htmlspecialchars($post['tanggal_checkin']),
            'tanggal_checkout' => htmlspecialchars($post['tanggal_checkout']),
            'total_invoice' => htmlspecialchars($post['total_invoice']),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db
            ->where('id_kelas_kamar', $post['id'])
            ->update('md_kelas_kamar', $params);
    }
}