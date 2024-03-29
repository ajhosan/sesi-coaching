<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetaklaporan extends CI_Controller
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

    public function index($id_user)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['data_actionplan1'] = $this->m_actionplan->lihat_data($id_user)->row_array();
        $data['show_goals'] = $this->m_goals->read_data()->result_array();
        $data['actionplan1'] = $this->m_actionplan->read_data()->result_array();
        $data['action_plan2'] = $this->m_actionplan->read_data2()->result_array();
        $data['action_plan3'] = $this->m_actionplan->read_data3()->result_array();
        $data['action_plan4'] = $this->m_actionplan->read_data4()->result_array();
        $data['action_plan5'] = $this->m_actionplan->read_data5()->result_array();
        $data['action_plan6'] = $this->m_actionplan->read_data6()->result_array();
        $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        $this->load->view('coach/laporan_pdf', $data);
    }

    public function laporan_pdf($id_goals, $sesi_ke, $id_user)
    {
        $data2 = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data3 = $this->m_goals->goal_persesi($id_goals)->row_array();
        $data4 = $this->m_actionplan->show_tbl_goals($id_goals)->row_array();
        $data5 = $this->m_actionplan->data_showkomentarcoach($id_goals, $sesi_ke, $id_user)->result_array();
        $data6 = $this->m_goals->edit_data_actionplan($id_goals, $sesi_ke)->result_array();
        $data1 = $this->m_actionplan->lihat_data($id_user)->row_array();

        // $data1 = $this->m_actionplan->lihat_data($id_user)->row_array();
        // $data2 = $this->m_goals->read_data()->result_array();
        // $data3 = $this->m_actionplan->read_data()->result_array();
        // $data4 = $this->m_actionplan->read_data2()->result_array();
        // $data5 = $this->m_actionplan->read_data3()->result_array();
        // $data7 = $this->m_actionplan->read_data4()->result_array();
        // $data8 = $this->m_actionplan->read_data5()->result_array();
        // $data9 = $this->m_actionplan->read_data6()->result_array();
        // $data10 = $this->m_goals->komentar_result($id_user)->row_array();
        // $data6 = $this->m_success_criteria->read_data_success_criteria1()->result_array();

        $data = array(
            "data_actionplan1" => $data1,
            "user" => $data2,
            "goals_user" => $data3,
            "tbl_goals" => $data4,
            "action_show" => $data5,
            "action_planpeserta" => $data6
        );

        $id_user = $data1['nama_user'];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Coaching Sesi 1" . $id_user . ".pdf";
        $this->pdf->load_view('coach/laporan_pdf', $data);
    }
}
