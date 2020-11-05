<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->load->view('login');
    }
    
    public function masuk()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password' , 'required');

        $this->form_validation->set_message('required','{field} harus diisi');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $cek = $this->db->get()->row_array();

            if ($cek) {
                $this->session->set_userdata([
                    'nama' => $cek['nama'],
                    'level' => $cek['level']
                ]);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('message',
                '<div class="alert alert-danger alert-dismissible fade show" role="danger">
                    Username atau Password anda salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect(base_url('auth'));
            }
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message',
        '<div class="alert alert-success alert-dismissible fade show" role="success">
            Anda telah logout
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('auth'));
    }
}