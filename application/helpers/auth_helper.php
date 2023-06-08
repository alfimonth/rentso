<?php

function cek_login()

{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan',  "<script>Swal.fire({icon: 'error',title: 'Anda Belum Login',})</script>");
        redirect('');
    }
}
function cek_admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        if (current_url() !== base_url('auth/login')) {
            $ci->session->set_flashdata('pesan',  "<script>Swal.fire({icon: 'error',title: 'Akses ditolak',})</script>");
            redirect(base_url('auth/login'));
        }
    } else {
        if (current_url() !== base_url('admin')) {
            redirect('admin');
        }
    }
}

function save_url()
{
    $ci = get_instance();
    $ci->session->set_userdata('prev_url', current_url());
}
