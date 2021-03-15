<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu_management extends CI_Model
{


    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`  /** memilih db 'user_sub_menu', dan db 'user_menu' dengan nama kolom 'menu' **/
					FROM `user_sub_menu` JOIN `user_menu`
					  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
					";
        return $this->db->query($query)->result_array();
    }

    public function getUserData()
    {
        $queri = "SELECT `user`.*, `user_role`.`role` /** 'role' merupakan nama kolom yang akan di join **/
				    FROM `user` JOIN `user_role`
				      ON `user`.`id_role` = `user_role`.`id_role` /**'id' merupakan primary dari 'tabel user_role' **/
		        ORDER BY `id_role` DESC 
				 ";
        return $this->db->query($queri)->result_array();
    }

    public function edit_menu_management($id)
    {
        return $this->db->get_where('user_menu', array('id' => $id));
    }

    public function edit_role($id)
    {
        return $this->db->get_where('user_role', array('id' => $id));
    }

    public function edit_data($id)
    {
        return $this->db->get_where('user', array('id' => $id));
    }

    // 	Function Tambah Data
    public function target_data($id)
    {
        return $this->db->get_where('user', array('id' => $id));
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function hapus_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function hapus_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }
}
