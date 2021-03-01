<?php

class M_goals extends CI_Model
{

    public function read_data()
    {
        return $this->db->query("SELECT * FROM goals ORDER BY id_goals DESC");
    }
}
