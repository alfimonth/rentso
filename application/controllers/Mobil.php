<?php
class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('back-end/mobil');
    }
    public function merek()
    {
        $this->load->view('back-end/merek');
    }
    public function driver()
    {
        $this->load->view('back-end/driver');
    }
}
