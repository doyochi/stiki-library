<?php

class M_laporan Extends CI_Model{

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('login', 'peminjaman.id = login.id');
		$this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
		return $this->db->get()->result();
	}

	public function filterData($tgl_awal, $tgl_ahir)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('login', 'peminjaman.id = login.id');
		$this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
		$this->db->where('peminjaman.tgl_pinjam >=', $tgl_awal);
		$this->db->where('peminjaman.tgl_pinjam <=', $tgl_ahir);
		return $this->db->get()->result();
	}

	public function getAllDataPengembalian()
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('login', 'pengembalian.id = login.id');
		$this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
		return $this->db->get()->result();
	}

	public function filterDataPengembalian($tgl_awal, $tgl_ahir)
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('login', 'pengembalian.id = login.id');
		$this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
		$this->db->where('pengembalian.tgl_pinjam >=', $tgl_awal);
		$this->db->where('pengembalian.tgl_pinjam <=', $tgl_ahir);
		return $this->db->get()->result();
	}
}