<?php

class M_goals extends CI_Model
{

    public function read_data()
    {
        return $this->db->query("SELECT * FROM goals ORDER BY id_goals DESC");
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

    public function edit_data_action($id_goal)
    {
        $this->db->select('*');
        $this->db->from('action_plan');
        $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('goals.id_goals', $id_goal);
        return $this->db->get();
    }

    public function edit_data_actionplan($id_action)
    {
        $this->db->select('*');
        $this->db->from('action_plan');
        $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('id_actionplan', $id_action);
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
