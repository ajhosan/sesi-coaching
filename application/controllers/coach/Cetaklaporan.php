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
        $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        $this->load->view('coach/laporan_pdf', $data);
    }

    public function laporan_pdf($id_user)
    {

        $data1 = $this->m_actionplan->lihat_data($id_user)->row_array();
        $data2 = $this->m_goals->read_data()->result_array();
        $data3 = $this->m_actionplan->read_data()->result_array();
        $data4 = $this->m_actionplan->read_data2()->result_array();
        $data5 = $this->m_actionplan->read_data3()->result_array();
        $data6 = $this->m_success_criteria->read_data_success_criteria1()->result_array();

        $data = array(
            "data_actionplan1" => $data1,
            "show_goals" => $data2,
            "actionplan1" => $data3,
            "action_plan2" => $data4,
            "action_plan3" => $data5,
            "join_table" => $data6,
        );

        $id_user = $data1['nama_user'];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Coaching Sesi 1" . $id_user . ".pdf";
        $this->pdf->load_view('coach/laporan_pdf', $data);
    }

    public function laporan_pdf2($id_user)
    {

        $data1 = $this->m_actionplan->lihat_data($id_user)->row_array();
        $data2 = $this->m_goals->read_data()->result_array();
        $data3 = $this->m_actionplan->read_data()->result_array();
        $data4 = $this->m_actionplan->read_data2()->result_array();
        $data5 = $this->m_actionplan->read_data3()->result_array();
        $data6 = $this->m_success_criteria->read_data_success_criteria1()->result_array();

        $data = array(
            "data_actionplan1" => $data1,
            "show_goals" => $data2,
            "actionplan1" => $data3,
            "action_plan2" => $data4,
            "action_plan3" => $data5,
            "join_table" => $data6,
        );

        $id_user = $data1['nama_user'];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Coaching Sesi 2" . $id_user . ".pdf";
        $this->pdf->load_view('coach/laporan_pdf_sesi2', $data);
    }

    public function laporan_pdf3($id_user)
    {

        $data1 = $this->m_actionplan->lihat_data($id_user)->row_array();
        $data2 = $this->m_goals->read_data()->result_array();
        $data3 = $this->m_actionplan->read_data()->result_array();
        $data4 = $this->m_actionplan->read_data2()->result_array();
        $data5 = $this->m_actionplan->read_data3()->result_array();
        $data6 = $this->m_success_criteria->read_data_success_criteria1()->result_array();

        $data = array(
            "data_actionplan1" => $data1,
            "show_goals" => $data2,
            "actionplan1" => $data3,
            "action_plan2" => $data4,
            "action_plan3" => $data5,
            "join_table" => $data6,
        );

        $id_user = $data1['nama_user'];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Coaching Sesi 3" . $id_user . ".pdf";
        $this->pdf->load_view('coach/laporan_pdf_sesi3', $data);
    }
}
