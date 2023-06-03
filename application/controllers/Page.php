<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        save_url();
    }
    public function about()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama_user'];
        } else {
            $data['user'] = 'Guest';
        }
        $data['type'] = 'aboutus';
        $this->load->view('front-end/page', $data);
    }
    public function faq()
    {
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama_user'];
        } else {
            $data['user'] = 'Guest';
        }
        $data['type'] = 'faqs';
        $this->load->view('front-end/page', $data);
    }
}
