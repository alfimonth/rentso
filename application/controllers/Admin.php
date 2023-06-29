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
    public function userreset($id)
    {
        $newpass = password_hash('password', PASSWORD_DEFAULT);
        $this->ModelUser->updatePasswordbyId($newpass, $id);
        $this->session->set_flashdata('up-pass', "<script>Swal.fire({icon: 'success',title: 'Password berhasil direset', showConfirmButton: false,timer: 1500})</script>");
        redirect('admin/user');
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
    public function logout()
    {
        $item = array('username');
        $this->session->unset_userdata($item);
        $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'success',title: 'Logout Berhasil', showConfirmButton: false,timer: 1500})</script>");
        redirect(base_url('auth/login'));
    }
}
