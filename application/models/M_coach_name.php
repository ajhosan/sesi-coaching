<?php

class M_coach_name extends CI_Model
{

    public function read_data()
    {
        $this->db->select('*');
        $this->db->from('coach_name');
        $query = $this->db->get();
        return $query;
    }
}
