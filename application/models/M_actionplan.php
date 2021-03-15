<?php

class M_actionplan extends CI_Model
{

    public function read_data()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('1') ORDER BY id_actionplan ASC");
    }

    public function read_data2()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('2') ORDER BY id_actionplan ASC");
    }

    public function read_data3()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('3') ORDER BY id_actionplan ASC");
    }
    public function read_data4()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('4') ORDER BY id_actionplan ASC");
    }
    public function read_data5()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('5') ORDER BY id_actionplan ASC");
    }
    public function read_data6()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('6') ORDER BY id_actionplan ASC");
    }

    public function jointabel2()
    {
        $data_action = array('1', '2', '3', '4', '5', '6');
        $this->db->select('*');
        $this->db->from('success_criteria');
        $this->db->join('goals', 'success_criteria.id_goals = goals.id_goals', 'inner');
        $this->db->where_in('action_plan_mingguke', $data_action);
        $query = $this->db->get();
        return $query;
    }

    // public function jointabel3()
    // {
    //     $this->db->select('*');
    //     $this->db->from('action_plan');
    //     $this->db->join('user', 'action_plan.id_user = user.id_user');
    //     $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
    //     $this->db->where('action_plan_mingguke', 2);
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function jointabel4()
    // {
    //     $this->db->select('*');
    //     $this->db->from('action_plan');
    //     $this->db->join('user', 'action_plan.id_user = user.id_user');
    //     $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
    //     $this->db->where('action_plan_mingguke', 3);
    //     $query = $this->db->get();
    //     return $query;
    // }


    // Tampil Data di menu Coach
    public function minggu_1()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('1') ORDER BY id_actionplan DESC");
    }

    public function minggu_2()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('2') ORDER BY id_actionplan DESC");
    }

    public function minggu_3()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE action_plan_mingguke IN ('3') ORDER BY id_actionplan DESC");
    }

    public function lihat_data($id_user)
    {
        return $this->db->get_where('user', array('id_user' => $id_user));
    }
}
