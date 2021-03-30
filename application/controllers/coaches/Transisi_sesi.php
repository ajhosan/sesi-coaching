<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transisi_sesi extends CI_Controller
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

    public function update_sesi2($id_goals)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals'] = $this->m_goals->lihat_data($id_goals)->row_array();
        $data['lihat_action'] = $this->m_actionplan->lihat_action_plan($id_goals)->result_array();
        $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/pindah-sesi-2', $data);
        $this->load->view('template/footer');
    }

    public function lihat_isigoals($id_goals)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals_user'] = $this->m_goals->goal_persesi($id_goals)->row_array();
        $data['action_show'] = $this->m_actionplan->data_show($id_goals)->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/sesi_coaching_pergoals', $data);
        $this->load->view('template/footer');
    }

    public function update_data2()
    {
        // $id_actionplan = $this->input->post('actionplan_id');
        $sesi_coaching = $this->input->post('sesi-coach');
        // $tambah = 1;
        // $up_sesicoaching = $sesi_coaching + $tambah;
        $data = [
            'action_plan' => $this->input->post('actionplan1'),
            'action_plan_mingguke' => $sesi_coaching,
            'berhasil' => $this->input->post('berhasil'),
            'tidak_berhasil' => $this->input->post('tidak_berhasil'),
            'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama'),
            'id_goals' => $this->input->post('goals_id'),
            'id_user' => $this->input->post('user_id'),
            'date_created' => date('Y-m-d'),
            'success_criteria' => $this->input->post('success_criteria')
        ];

        $this->db->insert('action_plan', $data);
        redirect('coaches/home/index');
    }

    public function detail_goals($id_goals, $sesi_ke)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals_user'] = $this->m_goals->tampil_goals($id_goals)->row_array();
        $data['tbl_goals'] = $this->m_actionplan->show_tbl_goals($id_goals)->row_array();
        $data['action_show'] = $this->m_actionplan->data_show1($id_goals, $sesi_ke)->result_array();
        $data['action_planpeserta'] = $this->m_goals->edit_data_actionplan($id_goals, $sesi_ke)->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/edit_action_plan', $data);
        $this->load->view('template/footer');
    }
}
