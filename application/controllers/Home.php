<?php
class Home extends CI_Controller
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

        $this->load->view('front-end/index', $data);
    }
    public function logout()
    {

        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 60 * 60,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        unset($_SESSION['ulogin']);
        session_destroy(); // destroy session
        redirect('');
    }
}
