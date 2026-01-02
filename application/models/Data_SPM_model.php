<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_SPM_model extends CI_Model
{
    public function getDataSPM1($reg = null, $tgl_aju = null)
    {
        // if ($reg === null) {
        //     return $this->db->get('spm_masuk')->result_array();
        // } else {
        //     return $this->db->get_where('spm_masuk', ['reg' => $reg])->result_array();
        // }

        // $this->db->select('*');
        // $this->db->from('spm_masuk');
        // if ($reg) {
        //     $this->db->where('reg', $reg);
        // }
        // if ($tgl_aju) {
        //     $this->db->like('tgl_aju', $tgl_aju, 'after');
        // }
        if ($reg === null) {
            if ($tgl_aju) {
                $queryData = "SELECT * FROM spm_masuk WHERE tgl_aju LIKE '$tgl_aju%'";
                // $this->db->like('tgl_aju', $tgl_aju, 'after');
            } else {
                $queryData = "SELECT * FROM spm_masuk";
                // $queryData = "SELECT * FROM spm_masuk";
            }
        } else {
            if ($tgl_aju) {
                $queryData = "SELECT * FROM spm_masuk WHERE reg=$reg AND tgl_aju LIKE '$tgl_aju%'";
                // $this->db->where('reg', $reg);
                // $this->db->like('tgl_aju', $tgl_aju, 'after');
            } else {
                $queryData = "SELECT * FROM spm_masuk WHERE reg=$reg";
                // $this->db->where('reg', $reg);
            }
        }

        // $query = $this->db->get();
        $query = $this->db->query($queryData);
        return $query->result_array();
    }
    public function getDataSPM($reg = null, $tgl_aju = null)
    {
        $this->db->select('*');
        $this->db->from('spm_masuk');
        if ($reg) {
            $this->db->where('reg', $reg);
        }
        if ($tgl_aju) {
            $this->db->like('tgl_aju', $tgl_aju, 'after');
        }
        $query = $this->db->get();
        return $query->result_array();
    }
}
