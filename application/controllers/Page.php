<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function about()
    {
        $data['type'] = 'aboutus';
        $this->load->view('front-end/page', $data);
    }
    public function faq()
    {
        $data['type'] = 'faqs';
        $this->load->view('front-end/page', $data);
    }
}
