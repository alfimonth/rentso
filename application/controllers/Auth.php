<?php
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function register()
    {

        $this->load->view('front-end/regist');
    }
    public function add_user()
    {

        $this->load->view('front-end/registact');
    }
}
