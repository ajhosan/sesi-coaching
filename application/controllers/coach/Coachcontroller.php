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
        $data['komentar_result'] = $this->m_goals->komentar_result($id_user)->row_array();
        $data['show_goals'] = $this->m_goals->read_data()->result_array();
        $data['where_goals'] = $this->m_goals->read_data()->row_array();
        $data['goals_user'] = $this->m_goals->tampil_goals_forcoach($id_user)->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/lihat_data', $data);
        $this->load->view('template/footer');
    }

    public function acc_requeststatus_coachee()
    {
        $id_user = $this->input->post('user_id');
        $id_goals = $this->input->post('id_goals');
        $data = [
            'progres_coaching' => $this->input->post('proses_coaching')
        ];

        $this->db->where('id_goals', $id_goals);
        $this->db->update('goals', $data);
        redirect('coach/coachcontroller/tampil_data/' . $id_user);
    }

    public function edit_action_plan($id_goals)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['action_planedit'] = $this->m_goals->edit_data_action($id_goals)->row_array();
        $data['actionplan'] = $this->m_goals->data_action($id_goals)->result_array();
        $data['goals'] = $this->m_goals->lihat_data($id_goals)->row_array();
        $data['lihat_action'] = $this->m_actionplan->lihat_action_plan($id_goals)->result_array();
        $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        // $data['goals_data'] = $this->m_goals->edit_data($id_goal)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/edit_data', $data);
        $this->load->view('template/footer');
    }

    public function simpan_edit()
    {
        // $id_user = $this->input->post('id_user');
        $id_komentar = $this->input->post('id_goals');
        $data = [
            'deskripsi_coach' => $this->input->post('komentar_coach'),
            'result_coach' => $this->input->post('result_coach')
        ];

        $this->db->where('id_goals', $id_komentar);
        $this->db->update('goals', $data);
        redirect('coach/coachcontroller/lihat_action_plan/' . $id_komentar);
    }

    public function email_send_tochoache()
    {
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

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('admin@salesuniversity.id', 'Sesi Coaching');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Akun Verifikasi');
        $this->email->message('Klik Link ini Untuk Aktifasi Akunmu : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');

        $id_goals = $this->input->post('id_goals');
        $data = [
            'status_coachee' => $this->input->post('status_coachee')
        ];

        $this->db->where('id_goals', $id_goals);
        $this->db->update('action_plan', $data);

        if ($this->email->send()) {
            return true;
            redirect('coach/coachcontroller/index');
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function lihat_action_plan($id_goals)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals'] = $this->m_goals->lihat_data($id_goals)->row_array();
        $data['lihat_action'] = $this->m_actionplan->lihat_action_plan($id_goals)->result_array();
        $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('coach/lihat_action_plancoach', $data);
        $this->load->view('template/footer');
    }

    public function hapus_goal_peserta($id_goals)
    {
        $this->db->where('id_goals', $id_goals);
        $this->db->delete('goals');
        redirect($this->agent->referrer());
    }
}
