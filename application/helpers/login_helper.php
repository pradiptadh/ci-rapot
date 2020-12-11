<?php


function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {

        $role_id = $ci->session->userdata('role');
        $menu = $ci->uri->segment(1);
        $querymenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $querymenu['menu_id'];

        $access = $ci->db->get_where('user_access_menu', ['menu_id' => $menu_id, 'role_id' => $role_id]);

        if ($access->num_rows() < 1) {
            // var_dump($access);
            redirect('auth/blocked');
        }
    }
}

function check_access($role, $menu)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role);
    $ci->db->where('menu_id', $menu);
    $check = $ci->db->get('user_access_menu');

    if ($check->num_rows() > 0) {
        return "checked = 'checked'";
    }
}
