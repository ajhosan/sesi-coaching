<?php

class M_actionplan extends CI_Model
{

    public function read_data()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('1') ORDER BY id_actionplan ASC");
    }

    public function data_show($id_goals)
    {
        $data = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $id_user = $data['id_user'];
        $data_sesi = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20');
        $this->db->select('*');
        $this->db->from('action_plan');
        // $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_goals', $id_goals);
        $this->db->group_by('sesi_ke', $data_sesi);

        // $this->db->in('1', '2', '3');
        $query = $this->db->get();
        return $query;
    }

    public function data_showforcoach($id_goals, $id_user)
    {
        // $data = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        // $id_user = $data['id_user'];
        $data_sesi = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20');
        $this->db->select('*');
        $this->db->from('action_plan');
        // $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_goals', $id_goals);
        $this->db->group_by('sesi_ke', $data_sesi);

        // $this->db->in('1', '2', '3');
        $query = $this->db->get();
        return $query;
    }

    public function data_showkomentarcoach($id_goals, $sesi_ke, $id_user)
    {
        // $data = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        // $id_user = $data['id_user'];
        $data_sesi = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20');
        $this->db->select('*');
        $this->db->from('action_plan');
        // $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_goals', $id_goals);
        $this->db->where('sesi_ke', $sesi_ke);
        $this->db->group_by('sesi_ke');

        // $this->db->in('1', '2', '3');
        $query = $this->db->get();
        return $query;
    }

    public function data_show1($id_goals, $sesi_ke)
    {
        $data = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $id_user = $data['id_user'];
        $data_sesi = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20');
        $this->db->select('*');
        $this->db->from('action_plan');
        // $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_goals', $id_goals);
        $this->db->where('sesi_ke', $sesi_ke);
        $this->db->group_by('sesi_ke', $sesi_ke);

        // $this->db->in('1', '2', '3');
        $query = $this->db->get();
        return $query;
    }

    public function show_tbl_goals($id_goals)
    {
        return $this->db->query("SELECT * FROM goals WHERE id_goals = $id_goals");
    }

    public function read_data2()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('2') ORDER BY id_actionplan ASC");
    }

    public function read_data3()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('3') ORDER BY id_actionplan ASC");
    }
    public function read_data4()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('4') ORDER BY id_actionplan ASC");
    }
    public function read_data5()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('5') ORDER BY id_actionplan ASC");
    }
    public function read_data6()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('6') ORDER BY id_actionplan ASC");
    }

    public function lihat_action_plan($id_goals)
    {
        $this->db->select('*');
        $this->db->from('action_plan');
        $this->db->join('goals', 'action_plan.id_goals = goals.id_goals', 'inner');
        $this->db->where('action_plan.id_goals', $id_goals);
        $query = $this->db->get();
        return $query;
    }

    // Tampil Data di menu Coach
    public function minggu_1()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('1') ORDER BY id_actionplan DESC");
    }

    public function minggu_2()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('2') ORDER BY id_actionplan DESC");
    }

    public function minggu_3()
    {
        return $this->db->query("SELECT * FROM action_plan WHERE sesi_ke IN ('3') ORDER BY id_actionplan DESC");
    }

    public function lihat_data($id_user)
    {
        return $this->db->get_where('user', array('id_user' => $id_user));
    }
}
