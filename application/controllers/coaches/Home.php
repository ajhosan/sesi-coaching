<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_user');
        $this->load->model('m_goals');
        $this->load->model('m_actionplan');
        $this->load->model('m_success_criteria');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals'] = $this->m_goals->read_data()->result_array();
        $data['action_plan'] = $this->m_actionplan->read_data()->result_array();
        $data['action_plan2'] = $this->m_actionplan->read_data2()->result_array();
        $data['action_plan3'] = $this->m_actionplan->read_data3()->result_array();
        $data['action_plan4'] = $this->m_actionplan->read_data4()->result_array();
        $data['action_plan5'] = $this->m_actionplan->read_data5()->result_array();
        $data['action_plan6'] = $this->m_actionplan->read_data6()->result_array();
        $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_goals()
    {
        $data = [
            'goals' => $this->input->post('goals'),
            'duedate' => $this->input->post('tanggal'),
            'date_created' => date('Y-m-d'),
            'id_user' => $this->input->post('user_id')
        ];

        $this->db->insert('goals', $data);
        redirect('coaches/home/index');
    }



    public function form_action_plan($id_goal)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['action_plan'] = $this->m_goals->edit_data($id_goal)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/tambah_action_plan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_action_plan()
    {
        $data = [
            array(
                'action_plan' => $this->input->post('actionplan1'),
                'date_created' => date('Y-m-d'),
                'action_plan_mingguke' => $this->input->post('minggu_keberapa'),
                'id_goals' => $this->input->post('goals_anda'),
                'success_criteria' => $this->input->post('criteria'),
                'id_user' => $this->input->post('user_id')
            ),
            array(
                'action_plan' => $this->input->post('actionplan2'),
                'date_created' => date('Y-m-d'),
                'action_plan_mingguke' => $this->input->post('minggu_keberapa'),
                'id_goals' => $this->input->post('goals_anda'),
                'success_criteria' => $this->input->post('criteria'),
                'id_user' => $this->input->post('user_id')
            ),
            array(
                'action_plan' => $this->input->post('actionplan3'),
                'date_created' => date('Y-m-d'),
                'action_plan_mingguke' => $this->input->post('minggu_keberapa'),
                'id_goals' => $this->input->post('goals_anda'),
                'success_criteria' => $this->input->post('criteria'),
                'id_user' => $this->input->post('user_id')
            ),
            array(
                'action_plan' => $this->input->post('actionplan4'),
                'date_created' => date('Y-m-d'),
                'action_plan_mingguke' => $this->input->post('minggu_keberapa'),
                'id_goals' => $this->input->post('goals_anda'),
                'success_criteria' => $this->input->post('criteria'),
                'id_user' => $this->input->post('user_id')
            ),
            array(
                'action_plan' => $this->input->post('actionplan5'),
                'date_created' => date('Y-m-d'),
                'action_plan_mingguke' => $this->input->post('minggu_keberapa'),
                'id_goals' => $this->input->post('goals_anda'),
                'success_criteria' => $this->input->post('criteria'),
                'id_user' => $this->input->post('user_id')
            )
        ];

        $data_actionplan = [
            'id_user' => $this->input->post('user_id'),
            'action_plan_mingguke' => $this->input->post('minggu_keberapa'),
            'id_goals' => $this->input->post('goals_anda'),
            'success_criteria' => $this->input->post('criteria')
        ];
        $id_goals = $this->input->post('goals_anda');
        $data2 = [
            'action_plan_true' => $this->input->post('action_plan_true')
        ];

        $this->db->insert_batch('action_plan', $data);

        $this->db->insert('success_criteria', $data_actionplan);

        $this->db->where('id_goals', $id_goals);
        $this->db->update('goals', $data2);
        redirect('coaches/home/index');
    }

    public function edit_action_plan($id_action)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['action_plan'] = $this->m_goals->edit_data_actionplan($id_action)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/edit_action_plan', $data);
        $this->load->view('template/footer');
    }

    public function edit_action_now()
    {
        $id_action = $this->input->post('id_actionplan');
        $data = [
            'action_plan' => $this->input->post('actionplan1'),
            'berhasil' => $this->input->post('berhasil'),
            'tidak_berhasil' => $this->input->post('tidak_berhasil'),
            'butuh_waktu_lama' => $this->input->post('butuh_waktu')
        ];

        $this->db->where('id_actionplan', $id_action);
        $this->db->update('action_plan', $data);
        redirect('coaches/home/index');
    }

    // Edit Success Criteria
    public function form_editcriteria($id_successcriteria)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['edit_criteria'] = $this->m_success_criteria->edit_criteria($id_successcriteria)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/edit_success_criteria', $data);
        $this->load->view('template/footer');
    }

    public function edit_successcriteria()
    {
        $id_successcriteria = $this->input->post('id_criteria');
        $data = [
            'success_criteria' => $this->input->post('success_criteria')
        ];

        $this->db->where('id_success_criteria', $id_successcriteria);
        $this->db->update('success_criteria', $data);
        redirect('coaches/home/index');
    }

    // Hapus 
    public function hapus_action($id_actionplan)
    {
        $this->db->where('id_actionplan', $id_actionplan);
        $this->db->delete('action_plan');
        redirect('coaches/home/index');
    }
}
