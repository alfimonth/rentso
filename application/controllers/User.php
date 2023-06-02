<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function profile()
    {
        $this->load->view('front-end/profile');
    }
    public function password()
    {
        $this->load->view('front-end/password');
    }
    public function history()
    {
        $this->load->view('front-end/history');
    }
}
