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
        $merek = $data['vehicle']["id_merek"];
        $data['sejenis'] = $this->ModelKendaraan->getBrand(["kendaraan.id_merek" => $merek])->result_array();
        $this->load->view('front-end/detail', $data);
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
        if ($this->form_validation->run() == false) {
            $this->load->view('front-end/booking', $data);
        } else {

            $vid = $this->input->post('vid', true);
            $fromdate = $this->input->post('fromdate', true);
            $todate = $this->input->post('todate', true);
            $pickup = $this->input->post('pickup', true);
            $driver = $this->input->post('driver', true);

            if ($todate < $fromdate) {
                $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'error',title: 'Tanggal selesai harus lebih besar dari tanggal mulai sewa!',})</script>");
                $prev_url = $this->session->userdata('prev_url');
                redirect($prev_url);
            }
            if ($fromdate < $now) {
                $this->session->set_flashdata('booking', "<script>Swal.fire({icon: 'error',title: 'Minimal mulai sewa adalah besok',})</script>");
                $prev_url = $this->session->userdata('prev_url');
                redirect($prev_url);
            }

            //cek
            $sql     = "SELECT kode_booking FROM cek_booking WHERE tgl_booking between '$fromdate' AND '$todate' AND id_mobil='$id' AND status!='Cancel'";
            $query     = mysqli_query($koneksidb, $sql);
            if (mysqli_num_rows($query) > 0) {
                echo " <script> alert ('Mobil tidak tersedia di tanggal yang anda pilih, silahkan pilih tanggal lain!'); 
		</script> ";
            } else {
                echo "<script type='text/javascript'> document.location = 'booking_ready.php?vid=$id&mulai=$fromdate&selesai=$todate&driver=$driver&pickup=$pickup'; </script>";
            }
        }
    }
}
