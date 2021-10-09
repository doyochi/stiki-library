<?php 

class M_pengembalian Extends CI_Model{

	public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->join('login', 'pengembalian.id = login.id');
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function getAllDataAnggota()
    {
        $name = $this->session->userdata('nama');
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->where('nama', $name);
        $this->db->join('login', 'pengembalian.id = login.id');
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }
}