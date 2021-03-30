<?php

class M_success_criteria extends CI_Model
{

    // public function read_data_success_criteria1()
    // {
    //     $data_action = array('1', '2', '3', '4', '5', '6');
    //     $this->db->select('*');
    //     $this->db->from('success_criteria');
    //     $this->db->join('goals', 'success_criteria.id_goals = goals.id_goals', 'inner');
    //     $this->db->where_in('action_plan_mingguke', $data_action);
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function edit_criteria($id_successcriteria)
    {
        return $this->db->get_where('success_criteria', array('id_success_criteria' => $id_successcriteria));
    }
}
