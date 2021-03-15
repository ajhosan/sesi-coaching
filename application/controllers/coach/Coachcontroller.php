<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coachcontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_actionplan');
        $this->load->model('m_goals');
        $this->load->model('m_success_criteria');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('user_agent');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['record'] = $this->m_user->read_data()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/index', $data);
        $this->load->view('template/footer');
    }


    public function tampil_data($id_user)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['data_actionplan1'] = $this->m_actionplan->lihat_data($id_user)->row_array();
        $data['show_goals'] = $this->m_goals->read_data()->result_array();
        $data['where_goals'] = $this->m_goals->read_data()->row_array();
        $data['actionplan1'] = $this->m_actionplan->read_data()->result_array();
        $data['action_plan2'] = $this->m_actionplan->read_data2()->result_array();
        $data['action_plan3'] = $this->m_actionplan->read_data3()->result_array();
        $data['action_plan4'] = $this->m_actionplan->read_data4()->result_array();
        $data['action_plan5'] = $this->m_actionplan->read_data5()->result_array();
        $data['action_plan6'] = $this->m_actionplan->read_data6()->result_array();
        $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/lihat_data', $data);
        $this->load->view('template/footer');
    }

    public function edit_action_plan($id_goal)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['action_planedit'] = $this->m_goals->edit_data_action($id_goal)->row_array();
        $data['actionplan'] = $this->m_goals->data_action($id_goal)->result_array();
        // $data['goals_data'] = $this->m_goals->edit_data($id_goal)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/edit_data', $data);
        $this->load->view('template/footer');
    }

    public function simpan_edit()
    {
        $id_user = $this->input->post('id_user');
        $id_komentar = $this->input->post('id_goals');
        $data = [
            'deskripsi_coach' => $this->input->post('komentar_coach'),
            'result_coach' => $this->input->post('result_coach')
        ];

        $this->db->where('id_goals', $id_komentar);
        $this->db->update('goals', $data);
        redirect('coach/coachcontroller/tampil_data/' . $id_user);
    }

    public function hapus_goal_peserta($id_goals)
    {
        $this->db->where('id_goals', $id_goals);
        $this->db->delete('goals');
        redirect($this->agent->referrer());
    }
}
