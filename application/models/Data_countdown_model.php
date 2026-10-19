<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_countdown_model extends CI_Model
{
    public function update_event($data, $id = 1)
    {
        return $this->db
            ->where('id_countdown', $id)
            ->update('countdown_event', $data);
    }
}
