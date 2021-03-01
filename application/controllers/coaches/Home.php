<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_user');
        $this->load->model('m_goals');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals'] = $this->m_goals->read_data()->result_array();
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



    public function form_action_plan()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('pengguna/tambah_action_plan');
        $this->load->view('template/footer');
    }
}
