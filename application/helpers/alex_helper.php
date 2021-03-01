<?php

function is_logged_in()
{

    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('id_role', $role_id);
    $ci->db->where('id_menu', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='cheked'";
    }
}