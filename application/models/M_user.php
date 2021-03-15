<?php

class M_user extends CI_Model
{

    // public function read_data()
    // {
    //     $this->db->select('*');
    //     $this->db->from('action_plan');
    //     $this->db->join('user', 'action_plan.id_user = user.id_user');
    //     $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
    //     $this->db->group_by("nama_user");
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function read_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query;
    }
}
