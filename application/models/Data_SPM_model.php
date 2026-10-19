<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_SPM_model extends CI_Model
{
    public function getDataSPM()
    {
        return $this->db->get('spm_masuk')->result_array();
    }
}
