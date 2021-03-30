<?php

class M_goals extends CI_Model
{

    public function read_data()
    {
        return $this->db->query("SELECT * FROM goals ORDER BY id_goals DESC");
    }

    public function tampil_goals()
    {
        $data = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $id_user = $data['id_user'];
        return $this->db->query("SELECT * FROM goals WHERE id_user = $id_user AND action_plan_true = 'Y'");
    }

    public function tampil_goals_forcoach($id_user)
    {
        // $data = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        // $id_user = $data['id_user'];
        return $this->db->query("SELECT * FROM goals WHERE id_user = $id_user AND action_plan_true = 'Y'");
    }

    public function goal_persesi($id_goals)
    {
        return $this->db->query("SELECT * FROM goals WHERE id_goals = $id_goals");
    }

    public function lihat_data($id_goals)
    {
        return $this->db->get_where('goals', array('id_goals' => $id_goals));
    }

    public function edit_data($id_goal)
    {

        return $this->db->get_where('goals', array('id_goals' => $id_goal));
    }

    public function komentar_result($id_user)
    {

        // return $this->db->get_where('action_plan', array('id_actionplan' => $id_action));
        // $data_goals = $this->db->get_where('action_plan', array('id_goals' => $id_goal));
        $this->db->select('*');
        $this->db->from('goals');
        $this->db->join('action_plan', 'goals.id_goals = action_plan.id_goals', 'inner');
        $this->db->where('goals.id_goals', $id_user);
        return $this->db->get();
    }

    public function edit_data_action($id_goals)
    {
        $this->db->select('*');
        $this->db->from('action_plan');
        $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('goals.id_goals', $id_goals);
        return $this->db->get();
    }

    public function edit_data_actionplan($id_goals, $sesi_ke)
    {
        $this->db->select('*');
        $this->db->from('action_plan');
        $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('action_plan.id_goals', $id_goals);
        $this->db->where('action_plan.sesi_ke', $sesi_ke);
        return $this->db->get();
    }

    public function data_action($id_goal)
    {
        $this->db->select('*');
        $this->db->from('action_plan');
        $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where_in('action_plan.id_goals', $id_goal);
        $this->db->order_by('action_plan.id_goals', 'ASC');
        return $this->db->get();
    }
}
