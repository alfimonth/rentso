<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
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
        $data['email'] = $this->session->userdata('email');

        $this->load->view('front-end/history', $data);
    }
    public function booking($kode)
    {
        $data['user'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');
        $data['kode'] = $kode;
        $this->load->view('front-end/booking_detail', $data);
    }
    public function pembayaran($kode)
    {
        $data['user'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');
        $data['kode'] = $kode;
        $this->load->view('front-end/pembayaran', $data);
    }
    public function cetak($kode)
    {
        $data['user'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');
        $data['kode'] = $kode;
        $this->load->view('front-end/detail_cetak', $data);
    }
    public function bukti()
    {
        include('includes/config.php');

        $image1 = $_FILES["img1"]["name"];
        $newimg1 = date('dmYHis') . $image1;
        $kode = $_POST['kode'];
        $stt = "Menunggu Konfirmasi";

        move_uploaded_file($_FILES["img1"]["tmp_name"], "image/bukti/" . $newimg1);

        $sql = "UPDATE booking SET bukti_bayar='$newimg1', status='$stt' WHERE kode_booking='$kode'";
        $lastInsertId = mysqli_query($koneksidb, $sql);
        if ($lastInsertId) {
            echo "<script>alert('Upload Bukti Pembayaran Berhasil!');</script>";
            echo "<script type='text/javascript'> document.location = 'riwayatsewa.php'; </script>";
        } else {
            echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
            echo "<script type='text/javascript'> document.location = 'bookingedit.php?kode'" . $kode . "'; </script>";
        }
    }
}
