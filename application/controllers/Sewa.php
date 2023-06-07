<?php
class Sewa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['booking'] = $this->ModelBooking->getBooking()->result_array();
        $this->load->view('back-end/sewa', $data);
    }
    public function pengembalian()
    {
        $data['booking'] = $this->ModelBooking->getBooking()->result_array();
        $this->load->view('back-end/sewa_kembali', $data);
    }
    public function bayar()
    {
        $this->load->view('back-end/sewa_bayar');
    }
    public function edit($kode)
    {

        $this->form_validation->set_rules('status', 'Nama Lengkap', 'required|trim', ['required' => 'Nama tidak Boleh Kosong']);
        if ($this->form_validation->run() == false) {
            $data['kode'] = $kode;
            $this->load->view('back-end/sewaedit', $data);
        } else {
            $POST = $this->input->post(null, true);
            $kode = $POST['id'];
            $status = $POST['status'];
            $this->ModelSewa->updateStatus($status, $kode);
            $this->session->set_flashdata('sewa', "<script>Swal.fire({icon: 'success',title: 'Status pembayaran berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('/sewa/konfirmasi/'));
        }
    }
    public function konfirmasi()
    {
        $this->load->view('back-end/sewa_konfirmasi');
    }
    public function view($code)
    {
        $data['kode'] = $code;
        $this->load->view('back-end/sewaview', $data);
    }
}
