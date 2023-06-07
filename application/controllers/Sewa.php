<?php
class Sewa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function bayar()
    {
        $this->load->view('back-end/sewa_bayar');
    }
    public function view($code)
    {
        $data['kode'] = $code;
        $this->load->view('back-end/sewaview', $data);
    }
}
