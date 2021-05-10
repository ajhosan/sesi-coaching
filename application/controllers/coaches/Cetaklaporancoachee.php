<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetaklaporancoachee extends CI_Controller
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

    public function index($id_goals, $sesi_ke, $id_user)
    {
        $data2 = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data3 = $this->m_goals->goal_persesi($id_goals)->row_array();
        $data4 = $this->m_actionplan->show_tbl_goals($id_goals)->row_array();
        $data5 = $this->m_actionplan->data_showkomentarcoach($id_goals, $sesi_ke, $id_user)->result_array();
        $data6 = $this->m_goals->edit_data_actionplan($id_goals, $sesi_ke)->result_array();
        $data1 = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();

        $data = array(
            "data_actionplan1" => $data1,
            "user" => $data2,
            "goals_user" => $data3,
            "tbl_goals" => $data4,
            "action_show" => $data5,
            "action_planpeserta" => $data6
        );
        $this->load->view('pengguna/print_laporan/print_actionplan', $data);
    }

    public function laporan_pdf($id_goals, $sesi_ke, $id_user)
    {
        $data2 = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data3 = $this->m_goals->goal_persesi($id_goals)->row_array();
        $data4 = $this->m_actionplan->show_tbl_goals($id_goals)->row_array();
        $data5 = $this->m_actionplan->data_showkomentarcoach($id_goals, $sesi_ke, $id_user)->result_array();
        $data6 = $this->m_goals->edit_data_actionplan($id_goals, $sesi_ke)->result_array();
        $data1 = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $datasesi = $this->m_goals->edit_data_actionplan_datasesi($id_goals, $sesi_ke)->row_array();

        $data = array(
            "data_actionplan1" => $data1,
            "user" => $data2,
            "goals_user" => $data3,
            "tbl_goals" => $data4,
            "action_show" => $data5,
            "action_planpeserta" => $data6
        );

        $id_user = $data1['nama_user'];
        $id_sesi = $datasesi;



        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan coaching " .  $id_user . " pertemuan ke " . $id_sesi['pertemuan_ke'] . " sesi ke " . $id_sesi['sesi_ke'] . ".pdf";
        $this->pdf->load_view('pengguna/print_laporan/print_actionplan', $data);
    }
}
