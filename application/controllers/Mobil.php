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
    public function tambah()
    {
        $this->form_validation->set_rules(
            'vehicletitle',
            'vehicletitle',
            'required|trim',
            [
                'required' => 'nama tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('back-end/tambahmobil');
        } else {
            $POST = $this->input->post(null, false);
            $vehicletitle = $POST['vehicletitle'];
            $brand = $POST['brandname'];
            $vehicleoverview = $POST['vehicalorcview'];
            $priceperday = $POST['priceperday'];
            $fueltype = $POST['fueltype'];
            $modelyear = $POST['modelyear'];
            $seatingcapacity = $POST['seatingcapacity'];
            $airconditioner = isset($POST['airconditioner']) ? 1 : 0;
            $powerdoorlocks = isset($POST['powerdoorlocks']) ? 1 : 0;
            $antilockbrakingsys = isset($POST['antilockbrakingsys']) ? 1 : 0;
            $brakeassist = isset($POST['brakeassist']) ? 1 : 0;
            $powersteering = isset($POST['powersteering']) ? 1 : 0;
            $driverairbag = isset($POST['driverairbag']) ? 1 : 0;
            $passengerairbag = isset($POST['passengerairbag']) ? 1 : 0;
            $powerwindow = isset($POST['powerwindow']) ? 1 : 0;
            $cdplayer = isset($POST['cdplayer']) ? 1 : 0;
            $centrallocking = isset($POST['centrallocking']) ? 1 : 0;
            $crashcensor = isset($POST['crashcensor']) ? 1 : 0;
            $leatherseats = isset($POST['leatherseats']) ? 1 : 0;
            $vimage1 = $_FILES["img1"]["name"];
            $vimage2 = $_FILES["img2"]["name"];
            $vimage3 = $_FILES["img3"]["name"];
            $vimage4 = $_FILES["img4"]["name"];
            $vimage5 = $_FILES["img5"]["name"];
            move_uploaded_file($_FILES["img1"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img1"]["name"]);
            move_uploaded_file($_FILES["img2"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img2"]["name"]);
            move_uploaded_file($_FILES["img3"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img3"]["name"]);
            move_uploaded_file($_FILES["img4"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img4"]["name"]);
            move_uploaded_file($_FILES["img5"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img5"]["name"]);


            $this->ModelKendaraan->addMobil(
                $vehicletitle,
                $brand,
                $vehicleoverview,
                $priceperday,
                $fueltype,
                $modelyear,
                $seatingcapacity,
                $vimage1,
                $vimage2,
                $vimage3,
                $vimage4,
                $vimage5,
                $airconditioner,
                $powerdoorlocks,
                $antilockbrakingsys,
                $brakeassist,
                $powersteering,
                $driverairbag,
                $passengerairbag,
                $powerwindow,
                $cdplayer,
                $centrallocking,
                $crashcensor,
                $leatherseats
            );


            $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'success',title: 'Tambah mobil berhasil', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil'));
        }
    }

    public function ubah($id)
    {
        $this->form_validation->set_rules(
            'vehicletitle',
            'vehicletitle',
            'required|trim',
            [
                'required' => 'nama tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $this->load->view('back-end/mobiledit', $data);
        } else {
            $POST = $this->input->post(null, false);
            $vehicletitle = $POST['vehicletitle'];
            $brand = $POST['brandname'];
            $vehicleoverview = $POST['vehicalorcview'];
            $priceperday = $POST['priceperday'];
            $fueltype = $POST['fueltype'];
            $modelyear = $POST['modelyear'];
            $seatingcapacity = $POST['seatingcapacity'];
            $airconditioner = isset($POST['airconditioner']) ? 1 : 0;
            $powerdoorlocks = isset($POST['powerdoorlocks']) ? 1 : 0;
            $antilockbrakingsys = isset($POST['antilockbrakingsys']) ? 1 : 0;
            $brakeassist = isset($POST['brakeassist']) ? 1 : 0;
            $powersteering = isset($POST['powersteering']) ? 1 : 0;
            $driverairbag = isset($POST['driverairbag']) ? 1 : 0;
            $passengerairbag = isset($POST['passengerairbag']) ? 1 : 0;
            $powerwindow = isset($POST['powerwindow']) ? 1 : 0;
            $cdplayer = isset($POST['cdplayer']) ? 1 : 0;
            $centrallocking = isset($POST['centrallocking']) ? 1 : 0;
            $crashcensor = isset($POST['crashcensor']) ? 1 : 0;
            $leatherseats = isset($POST['leatherseats']) ? 1 : 0;

            $this->ModelKendaraan->updateMobil(
                $id,
                $vehicletitle,
                $brand,
                $vehicleoverview,
                $priceperday,
                $fueltype,
                $modelyear,
                $seatingcapacity,
                $airconditioner,
                $powerdoorlocks,
                $antilockbrakingsys,
                $brakeassist,
                $powersteering,
                $driverairbag,
                $passengerairbag,
                $powerwindow,
                $cdplayer,
                $centrallocking,
                $crashcensor,
                $leatherseats
            );

            $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'success',title: 'Mobil berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil'));
        }
    }

    public function hapus($id)
    {
        $this->ModelKendaraan->deleteMobil($id);
        $this->session->set_flashdata('hapus', "<script>Swal.fire({icon: 'success',title: 'Mobil berhasil dihapus', showConfirmButton: false,timer: 1500})</script>");
        redirect(base_url('mobil'));
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
    // ubahgambar 1-5
    public function ubahgambar1($id)
    {
        // var_dump($_FILES["img1"]["name"]) . die;
        $this->form_validation->set_rules(
            'id',
            'id',
            'required',
            [
                'required' => 'Gambar tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $data['n'] = '1';
            $this->load->view('back-end/changeimage', $data);
        } else {
            $image1 = $_FILES["img1"]["name"];
            move_uploaded_file($_FILES["img1"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img1"]["name"]);
            $this->ModelKendaraan->editImg('image1', $image1, $id);
            $this->session->set_flashdata('image', "<script>Swal.fire({icon: 'success',title: 'Gambar berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil/ubah/') . $id);
        }
    }
    public function ubahgambar2($id)
    {
        // var_dump($_FILES["img1"]["name"]) . die;
        $this->form_validation->set_rules(
            'id',
            'id',
            'required',
            [
                'required' => 'Gambar tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $data['n'] = '2';
            $this->load->view('back-end/changeimage', $data);
        } else {
            $image1 = $_FILES["img1"]["name"];
            move_uploaded_file($_FILES["img1"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img1"]["name"]);
            $this->ModelKendaraan->editImg('image2', $image1, $id);
            $this->session->set_flashdata('image', "<script>Swal.fire({icon: 'success',title: 'Gambar berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil/ubah/') . $id);
        }
    }
    public function ubahgambar3($id)
    {
        // var_dump($_FILES["img1"]["name"]) . die;
        $this->form_validation->set_rules(
            'id',
            'id',
            'required',
            [
                'required' => 'Gambar tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $data['n'] = '3';
            $this->load->view('back-end/changeimage', $data);
        } else {
            $image1 = $_FILES["img1"]["name"];
            move_uploaded_file($_FILES["img1"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img1"]["name"]);
            $this->ModelKendaraan->editImg('image3', $image1, $id);
            $this->session->set_flashdata('image', "<script>Swal.fire({icon: 'success',title: 'Gambar berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil/ubah/') . $id);
        }
    }
    public function ubahgambar4($id)
    {
        // var_dump($_FILES["img1"]["name"]) . die;
        $this->form_validation->set_rules(
            'id',
            'id',
            'required',
            [
                'required' => 'Gambar tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $data['n'] = '4';
            $this->load->view('back-end/changeimage', $data);
        } else {
            $image1 = $_FILES["img1"]["name"];
            move_uploaded_file($_FILES["img1"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img1"]["name"]);
            $this->ModelKendaraan->editImg('image4', $image1, $id);
            $this->session->set_flashdata('image', "<script>Swal.fire({icon: 'success',title: 'Gambar berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil/ubah/') . $id);
        }
    }
    public function ubahgambar5($id)
    {
        // var_dump($_FILES["img1"]["name"]) . die;
        $this->form_validation->set_rules(
            'id',
            'id',
            'required',
            [
                'required' => 'Gambar tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['id'] = $id;
            $data['n'] = '5';
            $this->load->view('back-end/changeimage', $data);
        } else {
            $image1 = $_FILES["img1"]["name"];
            move_uploaded_file($_FILES["img1"]["tmp_name"], "assets/images/vehicleimages/" . $_FILES["img1"]["name"]);
            $this->ModelKendaraan->editImg('image5', $image1, $id);
            $this->session->set_flashdata('image', "<script>Swal.fire({icon: 'success',title: 'Gambar berhasil diubah', showConfirmButton: false,timer: 1500})</script>");
            redirect(base_url('mobil/ubah/') . $id);
        }
    }

    public function unit($code)
    {
        $this->form_validation->set_rules(
            'nopol',
            'nopol',
            'required|trim',
            [
                'required' => 'nopol tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['kendaraan'] = $this->ModelKendaraan->getOne(['id_mobil' => $code])->row_array();
            $this->load->view('back-end/unit', $data);
        } else {
            $unit = $this->input->post(null, true);
            $stat = $this->ModelKendaraan->addUnit($unit['nopol'], $code, $unit['warna']);
            if ($stat < 1) {
                $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'error',title: 'Unit sudah ada', showConfirmButton: false,timer: 1500})</script>");
            } else {
                $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'success',title: 'Tambah unit berhasil', showConfirmButton: false,timer: 1500})</script>");
            }
            redirect(base_url('mobil'));
        }
    }
    public function dropunit($code)
    {
        $this->form_validation->set_rules(
            'nopol',
            'nopol',
            'required|trim',
            [
                'required' => 'nopol tidak Boleh Kosong',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['kendaraan'] = $this->ModelKendaraan->getOne(['id_mobil' => $code])->row_array();
            $this->load->view('back-end/dropunit', $data);
        } else {
            $unit = $this->input->post(null, true);
            $stat = $this->ModelKendaraan->dropUnit($unit['nopol']);
            if ($stat < 1) {
                $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'error',title: 'Hapus unit gagal', showConfirmButton: false,timer: 1500})</script>");
            } else {
                $this->session->set_flashdata('pesan', "<script>Swal.fire({icon: 'success',title: 'Unit berkurang', showConfirmButton: false,timer: 1500})</script>");
            }
            redirect(base_url('mobil'));
        }
    }
}
