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
        $id_coach = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_coach', $id_coach['id_coach']);
        $query = $this->db->get();
        return $query;
    }

    public function data_coach($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('coach_name', 'user.id_coach = coach_name.id_coach', 'inner');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        return $query;
    }
}
