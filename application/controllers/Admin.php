<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_admin();
    }
    public function index()
    {
        $this->load->view('back-end/dashboard');
    }
    public function user()
    {
        $this->load->view('back-end/reg-users');
    }
    public function menghubungi()
    {
        $this->load->view('back-end/manage-conactusquery');
    }
    public function page()
    {
        $this->load->view('back-end/manage-pages');
    }
    public function kontak()
    {
        $this->load->view('back-end/update-contactinfo');
    }
    public function laporan()
    {
        $this->load->view('back-end/laporan');
    }
}
