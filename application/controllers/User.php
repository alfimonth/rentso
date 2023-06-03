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
                echo
                "<script type='text/javascript'>
				alert('Password berhasil dirubah!'); 
				</script>";
            } else {
                echo
                "<script type='text/javascript'>
				alert('Password lama salah!'); 
				</script>";
                // $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password lama salah!!</div>');
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
