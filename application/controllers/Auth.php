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
                $this->session->set_flashdata('login', "<script>Swal.fire({icon: 'success',title: 'Login Berhasil', showConfirmButton: false,timer: 1500})</script>");
                $prev_url = $this->session->userdata('prev_url');
                redirect($prev_url);
            } else {
                $this->session->set_flashdata('login', "<script>Swal.fire({icon: 'error',title: 'Username/Password Salah', showConfirmButton: false,timer: 1500})</script>");
                $prev_url = $this->session->userdata('prev_url');
                redirect($prev_url);
            }
        } else {
            $this->session->set_flashdata('login', "<script>Swal.fire({icon: 'error',title: 'Username/Password Salah', showConfirmButton: false,timer: 1500})</script>");
            $prev_url = $this->session->userdata('prev_url');
            redirect($prev_url);
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
    public function logout()
    {
        $item = array('email', 'id_user', 'nama');
        $this->session->unset_userdata($item);
        $this->session->set_flashdata('login', "<script>Swal.fire({icon: 'success',title: 'Logout Berhasil', showConfirmButton: false,timer: 1500})</script>");
        redirect();
    }
}
