<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('level')) {
            redirect(base_url('auth'));
        }
        $this->load->model('JdwModel');
    }

	public function index()
	{
        $data['title'] = "Halaman Dashboard";
        $data['desain'] = $this->JdwModel->getDesainGrafis();
        $data['mobile'] = $this->JdwModel->getMobile();
        $this->load->view('template/header',$data);
        $this->load->view('dashboard/index',$data);
        $this->load->view('template/footer',$data);
    }
}