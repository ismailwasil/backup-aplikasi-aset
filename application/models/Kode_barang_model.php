<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kode_barang_model extends CI_Model
{
    public function getDataKodeBarang($banyak, $mulai)
    {
        $this->db->select('*');
        $this->db->from('kode_barang_108');
        $this->db->limit($banyak, $mulai);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataKodBar()
    {
        $this->db->select('*');
        $this->db->from('kode_barang_108');
        // $this->db->limit(15, 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function searchDataKodeBarang($keyword, $banyak, $mulai)
    {
        $this->db->from('kode_barang_108');
        $this->db->like('kode_aset_108', $keyword);
        $this->db->or_like('uraian_aset_108', $keyword);
        $this->db->or_like('ket_108', $keyword);
        $this->db->limit($banyak, $mulai);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countSearchDataKodeNoLimit($keyword)
    {
        // $this->db->from('kode_barang_108');
        // $this->db->like('kode_aset_108', $keyword);
        // $this->db->or_like('uraian_aset_108', $keyword);
        // $this->db->or_like('ket_108', $keyword);
        // $query = $this->db->get();
        // return $query->result_array();

        $this->db->from('kode_barang_108');

        if ($keyword != '') {
            $this->db->group_start();
            $this->db->like('kode_aset_108', $keyword);
            $this->db->or_like('uraian_aset_108', $keyword);
            $this->db->or_like('ket_108', $keyword);
            $this->db->group_end();
        }

        return $this->db->count_all_results();
    }
}
