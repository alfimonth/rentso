<?php
class Kendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama_user'];
        } else {
            $data['user'] = 'Guest';
        }

        $this->load->view('front-end/kendaraan', $data);
    }
    public function detail($id)
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama_user'];
        } else {
            $data['user'] = 'Guest';
        }
        $data['id'] = $id;
        $this->load->view('front-end/detail', $data);
    }
    public function booking($id)
    {
        $data['user'] = $this->session->userdata('nama');
        $data['id'] = $id;
        $this->load->view('front-end/booking', $data);
    }
    public function check()
    {
        cek_login();
    }
}
