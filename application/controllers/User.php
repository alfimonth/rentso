<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function profile()
    {
        $data['user'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');
        $this->load->view('front-end/profile', $data);
    }
    public function password()
    {
        $data['user'] = $this->session->userdata('nama');
        $this->load->view('front-end/password', $data);
    }
    public function history()
    {
        $data['user'] = $this->session->userdata('nama');
        $this->load->view('front-end/history', $data);
    }
}
