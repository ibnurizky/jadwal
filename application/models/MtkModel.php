<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MtkModel extends CI_Model {

    public function getAllMtk()
    {
        return $this->db->get('matkul')->result_array();
    }

    public function getMtkId($kd_matkul)
    {
        return $this->db->get_where('matkul', ['kd_matkul' => $kd_matkul])->row_array();
    }

    public function getCari()
    {
        $cari = $this->input->post('cari');

        $this->db->like('kd_matkul', $cari);
        $this->db->or_like('nm_matkul', $cari);
        $this->db->or_like('sks', $cari);
        $this->db->from('matkul');
        
        return $this->db->get()->result_array();
    }

    public function insertMtk()
    {
        $data = ['kd_matkul' => $this->input->post('kdmatkul'),
                 'nm_matkul' => $this->input->post('nmmatkul'),
                 'sks' => $this->input->post('sks')];
        $this->db->insert('matkul', $data);
    }

    public function updateMtk()
    {
        $data = ['kd_matkul' => $this->input->post('kdmatkul'),
                 'nm_matkul' => $this->input->post('nmmatkul'),
                 'sks' => $this->input->post('sks')];
        $this->db->where('kd_matkul', $this->input->post('kdmatkul'));
        $this->db->update('matkul', $data);
    }

    public function deleteMtk($kd_matkul)
    {
        $this->db->where('kd_matkul', $kd_matkul);
        $this->db->delete('matkul');
    }
}