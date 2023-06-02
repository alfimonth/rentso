<?php
class Kendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $this->load->view('front-end/kendaraan');
    }
    public function detail($id)
    {
        $data['id'] = $id;
        $this->load->view('front-end/detail', $data);
    }
    public function booking($id)
    {
        $data['id'] = $id;
        $this->load->view('front-end/booking', $data);
    }
    public function check()
    {
        cek_login();
    }
}
