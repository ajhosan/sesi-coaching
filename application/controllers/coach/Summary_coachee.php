<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Summary_coachee extends CI_Controller
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

        // is_logged_in();
    }

    public function tampil_data($id_user)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['data_actionplan1'] = $this->m_actionplan->lihat_data($id_user)->row_array();
        $data['komentar_result'] = $this->m_goals->komentar_result($id_user)->row_array();
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
        $this->load->view('coach/email_summary_coachee', $data);
        $this->load->view('template/footer');
    }


    public function email_send_tochoache()
    {
        // $data42['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        // $data42['data_actionplan1'] = $this->m_actionplan->lihat_data($id_user)->row_array();
        // $data42['komentar_result'] = $this->m_goals->komentar_result($id_user)->row_array();
        // $data42['show_goals'] = $this->m_goals->read_data()->result_array();
        // $data42['where_goals'] = $this->m_goals->read_data()->row_array();
        // $data42['actionplan1'] = $this->m_actionplan->read_data()->result_array();
        // $data42['action_plan2'] = $this->m_actionplan->read_data2()->result_array();
        // $data42['action_plan3'] = $this->m_actionplan->read_data3()->result_array();
        // $data42['action_plan4'] = $this->m_actionplan->read_data4()->result_array();
        // $data42['action_plan5'] = $this->m_actionplan->read_data5()->result_array();
        // $data42['action_plan6'] = $this->m_actionplan->read_data6()->result_array();
        // $data42['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        // $page = $this->load->view('coach/email_summary_coachee', $data42);

        $config = [
            'protocol' => 'ssmtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => 'alexjhosan11@gmail.com',
            'smtp_pass' => 'kucinggila',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'starttls'  => true,
            'newline'   => "\r\n"

        ];


        $msg = "
				<center> <img src='http://korporaconsulting.com/wp-content/uploads/2018/04/Untitled-1cc.png'> <h2> Daftar sales yang telah melakukan telpon<br>pada hari ini tanggal " . date('d-m-Y') . " <br><br> Bila <b style='color:red;'>Merah</b> tidak Mencapai Target <br> Bila <b style='color:green;'>Hijau</b> telah mencapai target</h2></center>";

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('admin@salesuniversity.id', 'Sesi Coaching');
        $this->email->to('alexjhosan19@gmail.com');

        $this->email->subject('Summary Report');
        $this->email->message($msg);

        // $this->email->send();

        if ($this->email->send()) {
            redirect('coach/coachcontroller/index');
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
        // redirect('coach/coachcontroller/index');
    }

    // $id_goals = $this->input->post('idgoals');
    // $data = [
    //     'status_coachee' => $this->input->post('status_coachee')
    // ];

    // $this->db->where('id_goals', $id_goals);
    // $this->db->update('action_plan', $data);
    // redirect('coach/coachcontroller/index');

}
