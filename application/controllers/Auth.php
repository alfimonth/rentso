<?php
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->_login();
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['email' => $email])->row_array(); //jika usernya ada 
        if ($user) {
            //cek password 
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'], 'id_user' => $user['id_user'], 'nama' => $user['nama_user']
                ];
                $this->session->set_userdata($data);
                redirect('');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                redirect('');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('');
        }
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
