<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function profil()
    {

        $this->load->view('front-end/profile');
    }
    public function password()
    {
        $this->load->view('front-end/password');
    }
}
