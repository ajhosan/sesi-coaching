<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_menu_management', 'menu'); //'menu' = alias dari m_memnu_management
        $this->load->library('form_validation');
        is_logged_in();
    }


    public function index()
    {
        //$data1['menu_management'] = $this->m_data_corporate->tampil_data()->result();
        $data1['title'] = 'Menu Management';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data1['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        //setiap masuk menu management form validation pasti false
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_tabel', $data1);
            $this->load->view('sidebar', $data1);
            $this->load->view('template/topbar', $data1);
            $this->load->view('menu/index', $data1);
            $this->load->view('footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Baru Ditambahkan</div>');
            redirect('menu');
        }
    }

    public function edit_menu_management($id)
    {
        $data1['title'] = 'Menu Management';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kode1'] = $this->menu->edit_menu_management($id)->row_array();

        $this->load->view('header', $data1);
        $this->load->view('sidebar', $data1);
        $this->load->view('template/topbar', $data1);
        $this->load->view('menu/edit_menu_management', $data);
        $this->load->view('footer');
    }

    public function update_menu_management()
    {

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim|is_unique[user_menu.menu]', [
            'is_unique' => 'Menu ini telah ada!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $data = array(
                'menu' => $this->input->post('menu')
            );

            $this->db->where('id', $id);
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('flash', 'Disimpan');
            redirect('menu');
        } else {
            $this->session->set_flashdata('flasha', 'Gagal');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data1['title'] = 'Submenu Management';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data1['subMenu'] = $this->menu->getSubMenu();
        $data1['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_tabel', $data1);
            $this->load->view('sidebar', $data1);
            $this->load->view('template/topbar', $data1);
            $this->load->view('menu/submenu', $data1);
            $this->load->view('footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu baru telah ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function view_edit()
    {
        $data1['title'] = 'View User';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->uri->segment(3);
        $data['viewUser'] = $this->menu->getUserData();
        $data['menus'] = $this->db->get('user_role')->result_array();
        $data['kode1'] = $this->menu->edit_data($id)->row_array();
        $this->load->view('header', $data1);
        $this->load->view('sidebar', $data1);
        $this->load->view('template/topbar', $data1);
        $this->load->view('menu/edit_user', $data);
        $this->load->view('footer');
    }

    public function role()
    {

        $data1['title'] = 'Role';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data1['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('template/header_tabel', $data1);
        $this->load->view('sidebar', $data1);
        $this->load->view('template/topbar', $data1);
        $this->load->view('menu/role', $data1);
        $this->load->view('footer');
    }

    public function input_role()
    {

        $data = array('role' => $this->input->post('role'));

        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('menu/role');
    }

    public function edit_role($id)
    {
        $data1['title'] = 'Role';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kode1'] = $this->menu->edit_role($id)->row_array();
        $this->load->view('header', $data1);
        $this->load->view('sidebar', $data1);
        $this->load->view('template/topbar', $data1);
        $this->load->view('menu/edit_role', $data);
        $this->load->view('footer');
    }

    public function input_edit_role()
    {
        $id = $this->input->post('id');
        $data = array(
            'role' => $this->input->post('roles')
        );

        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('menu/role');
    }


    public function roleAccess($role_id)
    {

        $data1['title'] = 'Role';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data1['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 4);
        $data1['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header_tabel', $data1);
        $this->load->view('sidebar', $data1);
        $this->load->view('template/topbar', $data1);
        $this->load->view('menu/role-access', $data1);
        $this->load->view('footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('flash', 'Disimpan');
    }


    public function view_user()
    {
        $data1['title'] = 'View User';
        $data1['user'] = $this->db->get_where('user', ['email_user' => $this->session->userdata('email')])->row_array();

        $data1['viewUser'] = $this->menu->getUserData();
        $data1['menus'] = $this->db->get('user_role')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data1);
            $this->load->view('template/sidebar', $data1);
            $this->load->view('template/topbar', $data1);
            $this->load->view('admin/index', $data1);
            $this->load->view('template/footer');


            // $this->load->view('template/header_tabel', $data1);
            // $this->load->view('sidebar', $data1);
            // $this->load->view('template/topbar', $data1);
            // $this->load->view('menu/user_info', $data1);
        }
    }



    public function registration()
    {
        // $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email_user]', [
            'is_unique' => 'Email Ini Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[4]',
            [
                'min_length' => 'Password Terlalu Pendek Minimal 8 huruf/angka'
            ]
        );

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Buat Akun';
            $this->load->view('auth/register', $data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_lengkap'), true),
                'email_user' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_role' =>  1,
                /**$this->input->post('parameter'),**/
                'is_active' => 1,
                'date_created' => time()
            ];


            $this->db->insert('user', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun Anda telah terdaftar. Harap cek Email Anda, untuk aktivasi akun Anda!!!</div>');
            redirect('menu/view_user');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'ssmtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => 'alexjhosan11@gmail.com',
            'smtp_pass' => 'kucinggila',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('alexjhosan11@gmail.com', 'Korpora Consulting Aktivasi Akun');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Akun Verifikasi');
            $this->email->message('<center><img src="http://korporaconsulting.com/wp-content/uploads/2018/04/Untitled-1cc.png"><br><h2 class="text-monospace">Klik Link Dibawah Ini Untuk Aktivasi Akunmu </h2> <h2 class="text-monospace"><a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a><br> Password defult = korpora2020</h2></center>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik Link ini Untuk Reset Password Akunmu : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah Di Aktivasi!! Silahkan Login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);


                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Expired</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal! Email Salah</div>');
            redirect('auth');
        }
    }

    public function edit_user()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Ini Sudah Terdaftar!'
        ]);

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $data3 = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'id_role' => $this->input->post('id_role')
            ];

            $this->db->where('id', $id);
            $this->db->update('user', $data3);
            $this->session->set_flashdata('flash', 'Disimpan');
            redirect('menu/view_user');
        } else {
            $this->session->set_flashdata('flasha', 'Gagal');
            redirect('menu/view_user');
        }
    }


    // 	Controller Tambah Target
    public function view_target_user($id)
    {
        $data1['title'] = 'View User';
        $data1['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kode1'] = $this->menu->target_data($id)->row_array();
        $this->load->view('header', $data1);
        $this->load->view('sidebar', $data1);
        $this->load->view('template/topbar', $data1);
        $this->load->view('menu/tambah_target', $data);
        $this->load->view('footer');
    }

    public function tambah_target_user()
    {
        $id = $this->input->post('id');
        $data = array(
            'name' =>  $this->input->post('name'),
            'email' =>  $this->input->post('email'),
            'target' => $this->input->post('target_capai')
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        redirect('menu/view_user');
    }


    public function hapus($id)
    {
        $this->menu->hapus_data($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu/view_user');
    }

    public function hapus1($id)
    {
        $this->menu->hapus_menu($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu');
    }

    public function hapus_role($id)
    {
        $this->menu->hapus_role($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu/role');
    }
}
