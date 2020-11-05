<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('level')) {
            redirect(base_url('auth'));
        }
        $this->load->model('MhsModel');
        $this->load->library('form_validation');
    }

	public function index()
	{
        if ($this->input->post('cari')) {
            $data['title'] = "Data Mahasiswa";
            $data['mahasiswa'] = $this->MhsModel->getCari();
            $this->load->view('template/header',$data);
            $this->load->view('mahasiswa/index',$data);
            $this->load->view('template/footer',$data);
        } else {
            $data['title'] = "Data Mahasiswa";
            $data['mahasiswa'] = $this->MhsModel->getAllMhs();
            $this->load->view('template/header',$data);
            $this->load->view('mahasiswa/index',$data);
            $this->load->view('template/footer',$data);
        }
    }
    
    public function tambah()
    {
        $data['title'] = "Tambah Mahasiswa";
        $this->load->view('template/header',$data);
        $this->load->view('mahasiswa/tambah',$data);
        $this->load->view('template/footer',$data);
    }

    public function tambahaksi()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');

        $this->form_validation->set_message('required', '{field} harus diisi');

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $this->MhsModel->insertMhs();
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="success">
                Data Berhasil Ditambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect(base_url('mahasiswa'));
        }
    }

    public function edit($nim)
    {
        $data['title'] = "Edit Mahasiswa";
        $data['mhs'] = $this->MhsModel->getMhsId($nim);
        $this->load->view('template/header',$data);
        $this->load->view('mahasiswa/edit',$data);
        $this->load->view('template/footer',$data);
    }

    public function editaksi()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');

        $this->form_validation->set_message('required', '{field} harus diisi');

        if ($this->form_validation->run() == false) {
            $this->edit();
        } else {
            $this->MhsModel->updateMhs();
            $this->session->set_flashdata('message',
            '<div class="alert alert-success alert-dismissible fade show" role="success">
                Data Berhasil Diedit
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect(base_url('mahasiswa'));
        }
    }

    public function hapus($nim)
    {
        $this->MhsModel->deleteMhs($nim);
        $this->session->set_flashdata('message',
        '<div class="alert alert-success alert-dismissible fade show" role="success">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('mahasiswa'));
    }

}