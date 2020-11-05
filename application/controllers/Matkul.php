<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('level')) {
            redirect(base_url('auth'));
        }
        $this->load->model('MtkModel');
        $this->load->library('form_validation');
    }

	public function index()
	{
        if ($this->input->post('cari')) {
            $data['title'] = "Data Matkul";
            $data['matkul'] = $this->MtkModel->getCari();
            $this->load->view('template/header',$data);
            $this->load->view('matkul/index',$data);
            $this->load->view('template/footer',$data);
        } else {
            $data['title'] = "Data Matkul";
            $data['matkul'] = $this->MtkModel->getAllMtk();
            $this->load->view('template/header',$data);
            $this->load->view('matkul/index',$data);
            $this->load->view('template/footer',$data);
        }
    }
    
    public function tambah()
    {
        $data['title'] = "Tambah Matkul";
        $this->load->view('template/header',$data);
        $this->load->view('matkul/tambah',$data);
        $this->load->view('template/footer',$data);
    }

    public function tambahaksi()
    {
        $this->form_validation->set_rules('kdmatkul', 'Kode Matkul', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required|integer');

        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('integer', '{field} harus diisi angka');

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $this->MtkModel->insertMtk();
            $this->session->set_flashdata('message',
            '<div class="alert alert-success alert-dismissible fade show" role="success">
                Data Berhasil Ditambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect(base_url('matkul'));
        }
    }

    public function edit($kd_matkul)
    {
        $data['title'] = "Edit Mahasiswa";
        $data['mtk'] = $this->MtkModel->getMtkId($kd_matkul);
        $this->load->view('template/header',$data);
        $this->load->view('matkul/edit',$data);
        $this->load->view('template/footer',$data);
    }

    public function editaksi()
    {
        $this->form_validation->set_rules('kdmatkul', 'Kode Matkul', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required|integer');

        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('integer', '{field} harus diisi angka');

        if ($this->form_validation->run() == false) {
            $this->edit($kd_matkul);
        } else {
            $this->MtkModel->updateMtk();
            $this->session->set_flashdata('message',
            '<div class="alert alert-success alert-dismissible fade show" role="success">
                Data Berhasil Diedit
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect(base_url('matkul'));
        }
    }

    public function hapus($kd_matkul)
    {
        $this->MtkModel->deleteMtk($kd_matkul);
        $this->session->set_flashdata('message',
        '<div class="alert alert-success alert-dismissible fade show" role="success">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('matkul'));
    }

}