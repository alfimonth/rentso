<?php
class Kendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        save_url();
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama_user'];
        } else {
            $data['user'] = 'Guest';
        }
        $data['vehicles'] = $this->ModelKendaraan->get()->result_array();
        $data['count'] = $this->ModelKendaraan->get()->num_rows();
        $data['new'] = $this->ModelKendaraan->getLimit(3)->result_array();
        $this->load->view('front-end/kendaraan', $data);
    }
    public function detail($id)
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama_user'];
        } else {
            $data['user'] = 'Guest';
        }
        $data['vehicle'] = $this->ModelKendaraan->getOne(['id_mobil' => $id])->row_array();
        if ($data['vehicle'] === null) {
            redirect(base_url('404'));
        } else {
            $merek = $data['vehicle']["id_merek"];
            $data['sejenis'] = $this->ModelKendaraan->getBrand(["kendaraan.id_merek" => $merek])->result_array();
            $this->load->view('front-end/detail', $data);
        }
    }
    public function booking($id)
    {
        cek_login();

        $data['vehicle'] = $this->ModelKendaraan->getOne(['id_mobil' => $id])->row_array();
        $data['user'] = $this->session->userdata('nama');
        $data['id'] = $id;

        $tglnow   = date('Y-m-d');
        $tglmulai = strtotime($tglnow);
        $jmlhari  = 86400 * 1;
        $tglplus  = $tglmulai + $jmlhari;
        $now = date("Y-m-d", $tglplus);
        $data['now'] = $now;

        $this->form_validation->set_rules('vid', 'Id', 'required|trim', ['required' => 'Id tidak Boleh Kosong']);
        $this->form_validation->set_rules('fromdate', 'fromdate', 'required|trim', ['required' => 'fromdate tidak Boleh Kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('front-end/booking', $data);
        } else {

            $vid = $this->input->post('vid', true);
            $fromdate = $this->input->post('fromdate', true);
            $todate = $this->input->post('todate', true);
            $unit = $this->input->post('unit', true);
            $driver = $this->input->post('driver', true);


            if ($todate < $fromdate) {
                $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'error',title: 'Tanggal selesai harus lebih besar dari tanggal mulai sewa!',})</script>");
                $this->load->view('front-end/booking', $data);
            } else {
                if ($fromdate < $now) {
                    $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'error',title: 'Minimal mulai sewa adalah besok',})</script>");
                    $this->load->view('front-end/booking', $data);
                } else {
                    if ($driver > $unit) {
                        $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'error',title: 'Driver tidak boleh melebihi unit',})</script>");
                        $this->load->view('front-end/booking', $data);
                    } else {
                        $check = $this->ModelBooking->check($fromdate, $todate, $vid)->num_rows();
                        if ($check > 0) {
                            $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'error',title: 'Mobil tidak tersedia di tanggal ini', text: 'Silahkan pilih tanggal lain'})</script>");
                            $this->load->view('front-end/booking', $data);
                        } else {
                            $databooking = [
                                'vid' => $vid,
                                'fromdate' => $fromdate,
                                'todate' => $todate,
                                'unit' => $unit,
                                'driver' => $driver,
                            ];

                            $this->session->set_userdata($databooking);
                            $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'success',title: 'Kendaraan tersedia', showConfirmButton: false,timer: 1500})</script>");
                            redirect(base_url() . 'kendaraan/ready');
                        }
                    }
                }
            }
        }
    }
    public function ready()
    {
        cek_login();
        $id = $this->session->userdata('vid');
        $data['vid'] = $id;
        $data['user'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');
        $vehicle = $this->ModelKendaraan->getOne(['id_mobil' => $id])->row_array();
        $data['vehicle'] = $vehicle;
        $unit = $this->session->userdata('unit');

        $mulai = $this->session->userdata('fromdate');
        $selesai = $this->session->userdata('todate');
        $data['unit'] = $unit;
        $data['driver'] = $this->session->userdata('driver');
        $driver = $this->session->userdata('driver');

        $start = new DateTime($mulai);
        $finish = new DateTime($selesai);
        $int = $start->diff($finish);
        $dur = $int->days;
        $durasi = $dur + 1;

        $data['mulai'] = $mulai;
        $data['selesai'] = $selesai;
        $data['durasi'] = $durasi;
        $data['driver'] = $driver;
        $harga    = $vehicle['harga'];
        $totalmobil = $durasi * $harga * $unit;
        $data['totalmobil'] = $totalmobil;

        $drive = intval($this->ModelPages->driver()->row_array()["detail"]);
        if ($driver > 0) {
            $drivercharges = $drive * $durasi * $driver;
        } else {
            $drivercharges = 0;
        }
        $data['drivercharges'] = $drivercharges;
        $data['totalsewa'] = $totalmobil + $drivercharges;

        $this->form_validation->set_rules('vid', 'Id', 'required|trim', ['required' => 'Id tidak Boleh Kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('front-end/booking_ready', $data);
        } else {

            $last = $this->ModelBooking->last();
            $kode = invoice($last);

            $status = "Menunggu Pembayaran";
            $bukti = "";
            $tgl = date('Y-m-d');
            //insert
            $dataBooking = [
                'kode_booking' => $kode,
                'id_mobil' => $this->input->post('vid', true),
                'tgl_mulai' => $this->input->post('fromdate', true),
                'tgl_selesai' => $this->input->post('todate', true),
                'durasi' => $this->input->post('durasi', true),
                'driver' => $this->input->post('biayadriver', true),
                'status' => $status,
                'email' => $this->input->post('email', true),
                'unit' => $this->input->post('unit', true),
                'tgl_booking' => $tgl,
            ];

            $fromdate = $this->input->post('fromdate', true);
            $durasi = $this->input->post('durasi', true);
            $query = $this->ModelBooking->insertData($dataBooking);
            $vid = $this->input->post('vid', true);
            $cek = 0;


            if ($query) {
                for ($cek; $cek < $durasi; $cek++) {
                    $tglmulai = strtotime($fromdate);
                    $jmlhari  = 86400 * $cek;
                    $tgl      = $tglmulai + $jmlhari;
                    $tglhasil = date("Y-m-d", $tgl);
                    $this->ModelBooking->insertCheck($kode, $vid, $tglhasil, $status, $unit);
                }
                $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'success',title: 'Kendaraan berhasil disewa', showConfirmButton: false,timer: 1500})</script>");
                redirect(base_url('/user/booking/') . $kode);
            } else {
                $this->session->set_flashdata('bookingfail', "<script>Swal.fire({icon: 'error',title: 'Terjadi Kesalahan', showConfirmButton: false,timer: 1500})</script>");
                redirect('');
            }
        }
    }
}
