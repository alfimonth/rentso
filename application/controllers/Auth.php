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
    public function login()
    {
        cek_admin();

        $this->form_validation->set_rules('username', 'Nama Lengkap', 'required|trim', ['required' => 'Nama tidak Boleh Kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('back-end/login');
        } else {
            $myHost    = "localhost";
            $myUser    = "root";
            $myPass    = "";
            $myDbs    = "rentso_db";

            $koneksidb = mysqli_connect($myHost, $myUser, $myPass, $myDbs);
            if (!$koneksidb) {
                echo "Failed Connection !";
            }

            $email = $this->input->post('username', true);
            $password = md5($this->input->post('password', true));
            $sql = "SELECT * FROM admin WHERE UserName='$email' AND Password='$password'";
            $query = mysqli_query($koneksidb, $sql);
            $results = mysqli_fetch_array($query);
            if (mysqli_num_rows($query) > 0) {
                $data = [
                    'username' => $email
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('login', "<script>Swal.fire({icon: 'success',title: 'Login berhasil Berhasil', showConfirmButton: false,timer: 1500})</script>");
                redirect(base_url('admin/'));
            } else {
                $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'error',title: 'Username/Password Salah', showConfirmButton: false,timer: 1500})</script>");
                redirect(base_url('auth/login'));
            }
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
