<?php
class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        save_url();
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama_user'];
        } else {
            $data['user'] = 'Guest';
        }
        $this->load->view('front-end/contact-us', $data);
    }
}
