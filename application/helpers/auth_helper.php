<?php

// fungsi arahkan user ke halaman login jika session kosong
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user_name')) {
        redirect('auth');
    }
}

// cek apakah yg login admin? jika bukan arahkan ke halaman block
function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('user_level') != 1) {
        redirect('auth/blocked');
    }
}
