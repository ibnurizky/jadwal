<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MhsModel extends CI_Model {

    public function getAllMhs()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function getMhsId($nim)
    {
        return $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
    }

    public function getCari()
    {
        $cari = $this->input->post('cari');

        $this->db->like('nim', $cari);
        $this->db->or_like('nama', $cari);
        $this->db->or_like('jurusan', $cari);
        $this->db->or_like('alamat', $cari);
        $this->db->or_like('telp', $cari);
        $this->db->from('mahasiswa');
        
        return $this->db->get()->result_array();
    }

    public function insertMhs()
    {
        $data = ['nim' => $this->input->post('nim'),
                 'nama' => $this->input->post('nama'),
                 'jurusan' => $this->input->post('jurusan'),
                 'alamat' => $this->input->post('alamat'),
                 'telp' => $this->input->post('telp')];
        $this->db->insert('mahasiswa', $data);
    }

    public function updateMhs()
    {
        $data = ['nim' => $this->input->post('nim'),
                 'nama' => $this->input->post('nama'),
                 'jurusan' => $this->input->post('jurusan'),
                 'alamat' => $this->input->post('alamat'),
                 'telp' => $this->input->post('telp')];
        $this->db->where('nim', $this->input->post('nim'));
        $this->db->update('mahasiswa', $data);
    }

    public function deleteMhs($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('mahasiswa');
    }
}