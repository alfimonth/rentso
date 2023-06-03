<?php

function cek_login()

{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan',  "<script>Swal.fire({icon: 'error',title: 'Anda Belum Login',})</script>");
        redirect('');
    }
}

function save_url()
{
    $ci = get_instance();
    $ci->session->set_userdata('prev_url', current_url());
}


