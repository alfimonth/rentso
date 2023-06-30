<?php
class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_admin();
    }
    public function index()
    {
        $this->load->view('back-end/mobil');
    }

    public function merek()
    {
        $this->load->view('back-end/merek');
    }
    public function addmerek()
    {
        $this->form_validation->set_rules(
            'brand',
            'brand',
            'required|trim|is_unique[merek.nama_merek]',
            [
                'required' => 'Id tidak Boleh Kosong',
                'is_unique' => 'Merek sudah ada',
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('back-end/tambahmerek');
        } else {
            $brand = $this->input->post('brand', true);
            $this->ModelKendaraan->addMerek($brand);
            $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'success',title: 'Tambah merek berhasil', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil/merek'));
        }
    }
    public function editmerek($id)
    {
        $this->form_validation->set_rules(
            'brand',
            'brand',
            'required|trim|is_unique[merek.nama_merek]',
            [
                'required' => 'Id tidak Boleh Kosong',
                'is_unique' => 'Merek sudah ada',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $this->load->view('back-end/merekedit', $data);
        } else {
            $brand = $this->input->post('brand', true);
            $this->ModelKendaraan->editMerek($brand, $id);
            $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'success',title: 'Merek berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil/merek'));
        }
    }
    public function merekdel($id)
    {
        $this->ModelKendaraan->deleteMerek($id);
        $this->session->set_flashdata('hapus', "<script>Swal.fire({icon: 'success',title: 'Merek berhasil dihapus', showConfirmButton: false,timer: 1500})</script>");
        redirect(base_url('mobil/merek'));
    }
    public function driver()
    {
        $this->load->view('back-end/driver');
    }
}
