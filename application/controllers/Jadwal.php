<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('level')) {
            redirect(base_url('auth'));
        }
        $this->load->model('JdwModel');
        $this->load->model('MhsModel');
        $this->load->model('MtkModel');
        $this->load->library('form_validation');
    }

	public function index()
	{
        if ($this->input->post('cari')) {
            $data['title'] = "Jadwal Kuliah";
            $data['jadwal'] = $this->JdwModel->getCari();
            $this->load->view('template/header',$data);
            $this->load->view('jadwal/index',$data);
            $this->load->view('template/footer',$data);
        } else {
            $data['title'] = "Jadwal Matkul";
            $data['jadwal'] = $this->JdwModel->getAllJdw();
            $this->load->view('template/header',$data);
            $this->load->view('jadwal/index',$data);
            $this->load->view('template/footer',$data);
        }
    }
    
    public function tambah()
    {
        $data['title'] = "Tambah Jadwal";
        $data['mahasiswa'] = $this->MhsModel->getAllMhs();
        $data['matkul'] = $this->MtkModel->getAllMtk();
        $this->load->view('template/header',$data);
        $this->load->view('jadwal/tambah',$data);
        $this->load->view('template/footer',$data);
    }

    public function tambahaksi()
    {      
        $this->JdwModel->insertJdw();
        $this->session->set_flashdata('message',
        '<div class="alert alert-success alert-dismissible fade show" role="success">
            Data Berhasil Ditambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('jadwal'));
    }

    public function edit($kd_jadwal)
    {
        $data['title'] = "Edit Jadwal";
        $data['mahasiswa'] = $this->MhsModel->getAllMhs();
        $data['matkul'] = $this->MtkModel->getAllMtk();
        $data['jadwal'] = $this->JdwModel->getJdwId($kd_jadwal);
        $this->load->view('template/header',$data);
        $this->load->view('jadwal/edit',$data);
        $this->load->view('template/footer',$data);
    }

    public function editaksi()
    {
        $this->JdwModel->updateJdw();
        $this->session->set_flashdata('message',
        '<div class="alert alert-success alert-dismissible fade show" role="success">
            Data Berhasil Diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('jadwal'));
    }

    public function hapus($kd_jadwal)
    {
        $this->JdwModel->deleteJdw($kd_jadwal);
        $this->session->set_flashdata('message',
        '<div class="alert alert-success alert-dismissible fade show" role="success">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('jadwal'));
    }

}