<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller
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

    public function tambah_coach()
    {
        $data = [
            'nama' => $this->input->post('nama_coach')
        ];

        $this->db->insert('coach_name', $data);
        redirect('menu/view_user');
    }

    public function edit_coach()
    {
        $id_coach = $this->input->post('id_coach');
        $data = [
            'nama' => $this->input->post('nama_coach')
        ];

        $this->db->where('id_coach', $id_coach);
        $this->db->update('coach_name', $data);
        redirect('menu/view_user');
    }

    public function delete_coach($id_coach)
    {
        $this->db->where('id_coach', $id_coach);
        $this->db->delete('coach_name');
        redirect('menu/view_user');
    }

    public function edit_akun()
    {
        if ($this->input->post('input_coach')) {
            $id_user = $this->input->post('id_user');
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_lengkap'), true),
                'id_role' =>  $this->input->post('role_akun'),
                'id_coach' => $this->input->post('input_coach')
            ];


            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_lengkap'), true),
                'id_role' =>  $this->input->post('role_akun')
            ];


            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data);
        }
        redirect('menu/view_user');
    }
}
