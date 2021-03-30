<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coach_histori extends CI_Controller
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

    public function show_list_pergoals($id_goals, $id_user)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals_user'] = $this->m_goals->goal_persesi($id_goals)->row_array();
        $data['action_show'] = $this->m_actionplan->data_showforcoach($id_goals, $id_user)->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/list_sesipergoals', $data);
        $this->load->view('template/footer');
    }

    public function detail_goals_coachee($id_goals, $sesi_ke, $id_user)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals_user'] = $this->m_goals->goal_persesi($id_goals)->row_array();
        $data['tbl_goals'] = $this->m_actionplan->show_tbl_goals($id_goals)->row_array();
        $data['action_show'] = $this->m_actionplan->data_showkomentarcoach($id_goals, $sesi_ke, $id_user)->result_array();
        $data['action_planpeserta'] = $this->m_goals->edit_data_actionplan($id_goals, $sesi_ke)->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/komentar/isi_action_plan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_komentar_coach()
    {
        $update_status_action_plan = [
            array(
                'id_actionplan' => $this->input->post('action_plan_id1'),
                'deskripsi_coach' =>  $this->input->post('komentar_coach'),
                'result_coach' =>  $this->input->post('result_coach_tambah')
            ),
            array(
                'id_actionplan' => $this->input->post('action_plan_id2'),
                'deskripsi_coach' =>  $this->input->post('komentar_coach'),
                'result_coach' =>  $this->input->post('result_coach_tambah')
            ),
            array(
                'id_actionplan' => $this->input->post('action_plan_id3'),
                'deskripsi_coach' =>  $this->input->post('komentar_coach'),
                'result_coach' =>  $this->input->post('result_coach_tambah')
            ),
            array(
                'id_actionplan' => $this->input->post('action_plan_id4'),
                'deskripsi_coach' =>  $this->input->post('komentar_coach'),
                'result_coach' =>  $this->input->post('result_coach_tambah')
            ),
            array(
                'id_actionplan' => $this->input->post('action_plan_id5'),
                'deskripsi_coach' =>  $this->input->post('komentar_coach'),
                'result_coach' =>  $this->input->post('result_coach_tambah')
            )
        ];

        $this->db->update_batch('action_plan', $update_status_action_plan, 'id_actionplan');
        redirect(redirect($this->agent->referrer()));
    }
}
