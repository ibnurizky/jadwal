<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JdwModel extends CI_Model {

    public function getAllJdw()
    {
        $this->db->select('jadwal_kuliah.kd_jadwal');
        $this->db->select('jadwal_kuliah.nim');
        $this->db->select('mahasiswa.nama');
        $this->db->select('jadwal_kuliah.kd_matkul');
        $this->db->select('matkul.nm_matkul');
        $this->db->select('jadwal_kuliah.hari');
        $this->db->select('jadwal_kuliah.jam');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mahasiswa','mahasiswa.nim = jadwal_kuliah.nim','inner');
        $this->db->join('matkul','matkul.kd_matkul = jadwal_kuliah.kd_matkul','inner');
        
        return $this->db->get()->result_array();
    }

    public function getDesainGrafis()
    {
        $this->db->select('jadwal_kuliah.kd_jadwal');
        $this->db->select('jadwal_kuliah.nim');
        $this->db->select('mahasiswa.nama');
        $this->db->select('jadwal_kuliah.kd_matkul');
        $this->db->select('matkul.nm_matkul');
        $this->db->select('jadwal_kuliah.hari');
        $this->db->select('jadwal_kuliah.jam');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mahasiswa','mahasiswa.nim = jadwal_kuliah.nim','inner');
        $this->db->join('matkul','matkul.kd_matkul = jadwal_kuliah.kd_matkul','inner');
        $this->db->where('matkul.nm_matkul', 'Desain Grafis');

        return $this->db->get()->result_array();
    }

    public function getMobile()
    {
        $this->db->select('jadwal_kuliah.kd_jadwal');
        $this->db->select('jadwal_kuliah.nim');
        $this->db->select('mahasiswa.nama');
        $this->db->select('jadwal_kuliah.kd_matkul');
        $this->db->select('matkul.nm_matkul');
        $this->db->select('jadwal_kuliah.hari');
        $this->db->select('jadwal_kuliah.jam');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mahasiswa','mahasiswa.nim = jadwal_kuliah.nim','inner');
        $this->db->join('matkul','matkul.kd_matkul = jadwal_kuliah.kd_matkul','inner');
        $this->db->where('matkul.nm_matkul', 'Pemrograman Mobile Android');

        return $this->db->get()->result_array();
    }

    public function getJdwId($kd_jadwal)
    {
        return $this->db->get_where('jadwal_kuliah', ['kd_jadwal' => $kd_jadwal])->row_array();
    }

    public function getCari()
    {
        $cari = $this->input->post('cari');

        $this->db->select('jadwal_kuliah.kd_jadwal');
        $this->db->select('jadwal_kuliah.nim');
        $this->db->select('mahasiswa.nama');
        $this->db->select('jadwal_kuliah.kd_matkul');
        $this->db->select('matkul.nm_matkul');
        $this->db->select('jadwal_kuliah.hari');
        $this->db->select('jadwal_kuliah.jam');
        $this->db->like('jadwal_kuliah.nim', $cari);
        $this->db->or_like('mahasiswa.nama', $cari);
        $this->db->or_like('matkul.nm_matkul', $cari);
        $this->db->or_like('jadwal_kuliah.hari', $cari);
        $this->db->or_like('jadwal_kuliah.jam', $cari);
        $this->db->from('jadwal_kuliah');
        $this->db->join('mahasiswa','mahasiswa.nim = jadwal_kuliah.nim','inner');
        $this->db->join('matkul','matkul.kd_matkul = jadwal_kuliah.kd_matkul','inner');
        
        return $this->db->get()->result_array();
    }

    public function insertJdw()
    {
        $data = ['nim' => $this->input->post('nim'),
                 'kd_matkul' => $this->input->post('kd_matkul'),
                 'hari' => $this->input->post('hari'),
                 'jam' => $this->input->post('jam')];
        $this->db->insert('jadwal_kuliah', $data);
    }

    public function updateJdw()
    {
        $data = ['nim' => $this->input->post('nim'),
                 'kd_matkul' => $this->input->post('kd_matkul'),
                 'hari' => $this->input->post('hari'),
                 'jam' => $this->input->post('jam')];
        $this->db->where('kd_jadwal', $this->input->post('kd_jadwal'));
        $this->db->update('jadwal_kuliah', $data);
    }

    public function deleteJdw($kd_jadwal)
    {
        $this->db->where('kd_jadwal', $kd_jadwal);
        $this->db->delete('jadwal_kuliah');
    }
}