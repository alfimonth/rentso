<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function profile()
    {
        $data['user'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');
        $this->load->view('front-end/profile', $data);
    }
    public function password()
    {
        $data['user'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');

        $this->form_validation->set_rules('mail', 'Email', 'required|trim', ['required' => 'Email tidak Boleh Kosong']);
        $this->form_validation->set_rules('pass', 'Password lama', 'required|trim', ['required' => 'Password lama tidak Boleh Kosong']);
        $this->form_validation->set_rules('new', 'Password', 'required|trim|min_length[3]|matches[confirm]', ['matches' => 'Password Tidak Sama!!', 'min_length' => 'Password Terlalu Pendek']);
        $this->form_validation->set_rules('confirm', 'Repeat Password', 'required|trim|matches[new]');

        if ($this->form_validation->run() == false) {
            $this->load->view('front-end/password', $data);
        } else {
            $email = $this->input->post('mail', true);
            $oldpass = $this->input->post('pass', true);
            $newpass = $this->input->post('new', true);
            $user = $this->ModelUser->cekData(['email' => $email])->row_array();
            // cek old password
            if (password_verify($oldpass, $user['password'])) {
                // ganti password
                $newpass = password_hash($newpass, PASSWORD_DEFAULT);
                $this->ModelUser->updatePassword($newpass, $email);
                $this->session->set_flashdata('up-pass', "<script>Swal.fire({icon: 'success',title: 'Password berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
                redirect('');
            } else {
                $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'error',title: 'current password salah',})</script>");
                $this->load->view('front-end/password', $data);
            }
        }
    }
    public function history()
    {
        $data['user'] = $this->session->userdata('nama');
        $this->load->view('front-end/history', $data);
    }
}
