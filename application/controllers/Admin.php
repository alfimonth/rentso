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
        $data['feeds'] = $this->ModelUser->getFeed()->result_array();
        $this->load->view('back-end/manage-conactusquery', $data);
    }
    public function feed($id)
    {
        $data['feed'] = $this->ModelUser->getFeedbyId($id)->row_array();
        $this->load->view('back-end/userfeed', $data);
    }
    public function feedclose($id)
    {
        $this->ModelUser->readFeed($id);
        redirect('admin/menghubungi');
    }
    public function feeddel($id)
    {
        $this->ModelUser->deleteFeed($id);
        $this->session->set_flashdata('hapus', "<script>Swal.fire({icon: 'success',title: 'Hapus feedback berhasil', showConfirmButton: false,timer: 1500})</script>");
        redirect('admin/menghubungi');
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
