<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['goals'] = $this->m_goals->read_data()->result_array();
        $data['goals_user'] = $this->m_goals->tampil_goals()->result_array();
        $data['action_plan'] = $this->m_actionplan->read_data()->result_array();
        $data['action_plan2'] = $this->m_actionplan->read_data2()->result_array();
        $data['action_plan3'] = $this->m_actionplan->read_data3()->result_array();
        $data['action_plan4'] = $this->m_actionplan->read_data4()->result_array();
        $data['action_plan5'] = $this->m_actionplan->read_data5()->result_array();
        $data['action_plan6'] = $this->m_actionplan->read_data6()->result_array();
        // $data['join_table'] = $this->m_success_criteria->read_data_success_criteria1()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/index', $data);
        $this->load->view('template/footer');
    }

    public function request_permintaan_coaching()
    {
        $id_goals = $this->input->post('id_goals');
        $data = [
            'progres_coaching' => $this->input->post('progres_coaching')
        ];

        $this->db->where('id_goals', $id_goals);
        $this->db->update('goals', $data);
        redirect('coaches/home/index');
    }

    public function tambah_goals()
    {
        $data = [
            'goals' => $this->input->post('goals'),
            'duedate' => $this->input->post('tanggal'),
            'date_created_goals' => date('Y-m-d'),
            'id_user' => $this->input->post('user_id'),
            'progres_coaching' => "PERSETUJUAN"
        ];

        $this->db->insert('goals', $data);
        redirect('coaches/home/index');
    }

    // public function update_successcriteria()
    // {
    //     $id_user = $this->input->post('');
    //     $data_savedpertemuan = [
    //         'pertemuan_ke' => $this->input->post('saved_pertemuan'),
    //         'tanggal_pertemuan' => date('Y-m-d')
    //     ];

    //     $id_goals = $this->input->post('');
    //     $data_successcriteria = [
    //         'success_criteria' => $this->input->post(''),
    //         'date_created_successcriteria' => date('Y-m-d'),
    //         'pertemuan_ke' => "1",
    //         'progres_coaching' => "PROSES"
    //     ];

    //     $this->db->where('id_user', $id_user);
    //     $this->db->update('user', $data_savedpertemuan);

    //     $this->db->where('id_goals', $id_goals);
    //     $this->db->update('goals', $data_successcriteria);
    //     redirect('coaches/home/index');
    // }



    public function form_action_plan($id_goal)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['action_plan'] = $this->m_goals->edit_data($id_goal)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/tambah_success_criteria', $data);
        $this->load->view('template/footer');
    }

    public function tambah_action_plan()
    {
        $data_pertemuan = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $pertemuan = $this->input->post('pertemuan_ke');
        $tambah_pertemuan = $pertemuan + 1;

        if ($this->input->post('tanggal_pertemuan_skrng') == $data_pertemuan['tanggal_pertemuan']) {
            $data = [
                array(
                    'action_plan' => $this->input->post('actionplan1'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan2'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan3'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan4'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan5'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $pertemuan,
                    'id_user' => $this->input->post('user_id')
                )
            ];

            $id_goals = $this->input->post('goals_anda');
            $data2 = [
                'action_plan_true' => $this->input->post('action_plan_true'),
                'sesi_ke' => $this->input->post('sesi_ke'),
                'pertemuan_ke' => $pertemuan,
                'success_criteria' => $this->input->post('criteria'),
                'date_created_successcriteria' => date('Y-m-d'),
                'progres_coaching' => "PROSES"
            ];

            $id_user = $this->input->post('user_id');
            $data3 = [
                'pertemuan_ke' => $pertemuan,
                'tanggal_pertemuan' => date('Y-m-d')

            ];

            $this->db->insert_batch('action_plan', $data);

            $this->db->where('id_goals', $id_goals);
            $this->db->update('goals', $data2);

            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data3);
            redirect('coaches/home/index');
        } else {
            $data = [
                array(
                    'action_plan' => $this->input->post('actionplan1'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $tambah_pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan2'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $tambah_pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan3'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $tambah_pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan4'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $tambah_pertemuan,
                    'id_user' => $this->input->post('user_id')
                ),
                array(
                    'action_plan' => $this->input->post('actionplan5'),
                    'date_created' => date('Y-m-d'),
                    'sesi_ke' => $this->input->post('sesi_ke'),
                    'id_goals' => $this->input->post('goals_anda'),
                    'success_criteria' => $this->input->post('criteria'),
                    'pertemuan_ke' => $tambah_pertemuan,
                    'id_user' => $this->input->post('user_id')
                )
            ];

            $id_goals = $this->input->post('goals_anda');
            $data2 = [
                'action_plan_true' => $this->input->post('action_plan_true'),
                'sesi_ke' => $this->input->post('sesi_ke'),
                'pertemuan_ke' => $tambah_pertemuan,
                'success_criteria' => $this->input->post('criteria'),
                'date_created_successcriteria' => date('Y-m-d'),
                'progres_coaching' => "PROSES"
            ];

            $id_user = $this->input->post('user_id');
            $data3 = [
                'pertemuan_ke' => $tambah_pertemuan,
                'tanggal_pertemuan' => date('Y-m-d')

            ];

            $this->db->insert_batch('action_plan', $data);

            $this->db->where('id_goals', $id_goals);
            $this->db->update('goals', $data2);

            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data3);
            redirect('coaches/home/index');
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
        $this->load->view('pengguna/lihat_action_plan', $data);
        $this->load->view('template/footer');
    }

    public function edit_action_plan($id_action)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['action_plan'] = $this->m_goals->edit_data_actionplan($id_action)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/edit_action_plan', $data);
        $this->load->view('template/footer');
    }

    // Function Tambah & Update Action Plan
    public function edit_action_now()
    {
        $data_pertemuan = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $pertemuan = $this->input->post('pertemuan_ke');
        $tambah_pertemuan = $pertemuan + 1;
        $sesi_coaching = $this->input->post('sesi_coaching');
        $total_sesi_coaching = $sesi_coaching + 1;

        $field_actionplan = $this->input->post('actionplan1');
        $field_id_goals = $this->input->post('goals_anda');
        $field_successcriteria = $this->input->post('success_criteria');
        $field_berhasil = $this->input->post('berhasil');
        $field_tidakberhasil = $this->input->post('tidak_berhasil');
        $field_butuh_waktu = $this->input->post('butuh_waktu_lama');
        $field_iduser = $this->input->post('user_id');


        if ($this->input->post('sesi_selesai')) {
            $update_status_action_plan = [
                array(
                    'id_actionplan' => $this->input->post('id_actionplan1'),
                    'berhasil' => $this->input->post('berhasil2'),
                    'tidak_berhasil' => $this->input->post('tidak_berhasil3'),
                    'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama4'),
                    'check_status' =>  $this->input->post('check_progres')
                ),
                array(
                    'id_actionplan' => $this->input->post('id_actionplan2'),
                    'berhasil' => $this->input->post('berhasil6'),
                    'tidak_berhasil' => $this->input->post('tidak_berhasil7'),
                    'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama8'),
                    'check_status' =>  $this->input->post('check_progres')
                ),
                array(
                    'id_actionplan' => $this->input->post('id_actionplan3'),
                    'berhasil' => $this->input->post('berhasil10'),
                    'tidak_berhasil' => $this->input->post('tidak_berhasil11'),
                    'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama12'),
                    'check_status' =>  $this->input->post('check_progres')
                ),
                array(
                    'id_actionplan' => $this->input->post('id_actionplan4'),
                    'berhasil' => $this->input->post('berhasil14'),
                    'tidak_berhasil' => $this->input->post('tidak_berhasil15'),
                    'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama16'),
                    'check_status' =>  $this->input->post('check_progres')
                ),
                array(
                    'id_actionplan' => $this->input->post('id_actionplan5'),
                    'berhasil' => $this->input->post('berhasil18'),
                    'tidak_berhasil' => $this->input->post('tidak_berhasil19'),
                    'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama20'),
                    'check_status' =>  $this->input->post('check_progres')
                )
            ];

            $this->db->update_batch('action_plan', $update_status_action_plan, 'id_actionplan');

            redirect('coaches/transisi_sesi/lihat_isigoals/' . $field_id_goals);
        } else {
            if ($this->input->post('tanggal_pertemuan_skrng') == $data_pertemuan['tanggal_pertemuan']) {

                $data_actionplan = [
                    array(
                        'action_plan' => $this->input->post('actionplan1'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan5'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan9'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan13'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan17'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $pertemuan,
                        'id_user' => $field_iduser
                    )
                ];

                $update_status_action_plan = [
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan1'),
                        'berhasil' => $this->input->post('berhasil2'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil3'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama4'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan2'),
                        'berhasil' => $this->input->post('berhasil6'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil7'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama8'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan3'),
                        'berhasil' => $this->input->post('berhasil10'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil11'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama12'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan4'),
                        'berhasil' => $this->input->post('berhasil14'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil15'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama16'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan5'),
                        'berhasil' => $this->input->post('berhasil18'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil19'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama20'),
                        'check_status' =>  $this->input->post('check_progres')
                    )
                ];

                $id_goals = $field_id_goals;
                $data2 = [
                    'sesi_ke' => $total_sesi_coaching,
                    'pertemuan_ke' => $pertemuan
                ];

                $id_user = $field_iduser;
                $data3 = [
                    'pertemuan_ke' => $pertemuan,
                    'tanggal_pertemuan' => date('Y-m-d')

                ];


                $this->db->insert_batch('action_plan', $data_actionplan);


                $this->db->update_batch('action_plan', $update_status_action_plan, 'id_actionplan');

                $this->db->where('id_goals', $id_goals);
                $this->db->update('goals', $data2);

                $this->db->where('id_user', $id_user);
                $this->db->update('user', $data3);
                redirect('coaches/transisi_sesi/lihat_isigoals/' . $field_id_goals);
            } else {
                $data_actionplan = [
                    array(
                        'action_plan' => $this->input->post('actionplan1'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $tambah_pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan5'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $tambah_pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan9'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $tambah_pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan13'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $tambah_pertemuan,
                        'id_user' => $field_iduser
                    ),
                    array(
                        'action_plan' => $this->input->post('actionplan17'),
                        'date_created' => date('Y-m-d'),
                        'sesi_ke' => $total_sesi_coaching,
                        'success_criteria' => $field_successcriteria,
                        'id_goals' => $field_id_goals,
                        'pertemuan_ke' => $tambah_pertemuan,
                        'id_user' => $field_iduser
                    )
                ];

                $update_status_action_plan = [
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan1'),
                        'berhasil' => $this->input->post('berhasil2'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil3'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama4'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan2'),
                        'berhasil' => $this->input->post('berhasil6'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil7'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama8'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan3'),
                        'berhasil' => $this->input->post('berhasil10'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil11'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama12'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan4'),
                        'berhasil' => $this->input->post('berhasil14'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil15'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama16'),
                        'check_status' =>  $this->input->post('check_progres')
                    ),
                    array(
                        'id_actionplan' => $this->input->post('id_actionplan5'),
                        'berhasil' => $this->input->post('berhasil18'),
                        'tidak_berhasil' => $this->input->post('tidak_berhasil19'),
                        'butuh_waktu_lama' => $this->input->post('butuh_waktu_lama20'),
                        'check_status' =>  $this->input->post('check_progres')
                    )
                ];

                $id_goals = $field_id_goals;
                $data2 = [
                    'sesi_ke' => $total_sesi_coaching,
                    'pertemuan_ke' => $tambah_pertemuan
                ];

                $id_user = $field_iduser;
                $data3 = [
                    'pertemuan_ke' => $tambah_pertemuan,
                    'tanggal_pertemuan' => date('Y-m-d')
                ];

                $this->db->insert_batch('action_plan', $data_actionplan);

                $this->db->update_batch('action_plan', $update_status_action_plan, 'id_actionplan');

                $this->db->where('id_goals', $id_goals);
                $this->db->update('goals', $data2);

                $this->db->where('id_user', $id_user);
                $this->db->update('user', $data3);
                redirect('coaches/transisi_sesi/lihat_isigoals/' . $field_id_goals);
            }
        }
    }

    // Edit Success Criteria
    public function form_editcriteria($id_successcriteria)
    {
        $data['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();
        $data['edit_criteria'] = $this->m_success_criteria->edit_criteria($id_successcriteria)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pengguna/edit_success_criteria', $data);
        $this->load->view('template/footer');
    }

    public function edit_successcriteria()
    {
        $id_goals = $this->input->post('id_goals');
        $id_successcriteria = $this->input->post('id_criteria');
        $data = [
            'success_criteria' => $this->input->post('success_criteria')
        ];

        $this->db->where('id_success_criteria', $id_successcriteria);
        $this->db->update('success_criteria', $data);
        redirect('coaches/home/lihat_action_plan/' . $id_goals);
    }

    // Hapus 
    public function hapus_action($id_actionplan)
    {

        $this->db->where('id_actionplan', $id_actionplan);
        $this->db->delete('action_plan');
        redirect($this->agent->referrer());
    }
}
