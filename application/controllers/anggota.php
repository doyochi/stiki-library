<?php

class Anggota Extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_anggota');
	}

	public function index()
	{
		$isi['content']	= 'anggota/v_anggota';
		$isi['judul']	= 'Daftar Data Pengguna';
		$isi['data']	= $this->db->get('login')->result();
		$this->load->view('v_dashboard', $isi);
	}

	public function tambah_anggota()
	{
		$isi['content']		= 'anggota/form_anggota';
		$isi['judul']		= 'Form Tambah Pengguna';
		$isi['id_anggota'] 	= $this->m_anggota->id_anggota();
		$this->load->view('v_dashboard', $isi);
	}

	public function simpan()
	{
		$data = array(
			'id' 		=> $this->input->post('id'),
			'nama' 		=> $this->input->post('nama'),
			'jk' 		=> $this->input->post('jk'),
			'alamat' 	=> $this->input->post('alamat'),
			'telp' 		=> $this->input->post('telp'),
			'level' 	=> $this->input->post('level'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->input->post('password')
		);
		$query = $this->db->insert('login', $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
			redirect('anggota');
		}
	}

	public function edit($id)
	{
		$isi['content']		= 'anggota/edit_anggota';
		$isi['judul']		= 'Form Edit Pengguna';
		$isi['data']	 	= $this->m_anggota->edit($id);
		$this->load->view('v_dashboard', $isi);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'id' 		=> $this->input->post('id'),
			'nama' 		=> $this->input->post('nama'),
			'jk' 		=> $this->input->post('jk'),
			'alamat' 	=> $this->input->post('alamat'),
			'telp' 		=> $this->input->post('telp'),
			'level' 	=> $this->input->post('level'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->input->post('password')
		);
		$query = $this->m_anggota->update($id, $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil diupdate');
			redirect('anggota');
		}
	}

	public function hapus($id)
	{
		$query = $this->m_anggota->hapus($id);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
			redirect('anggota');
		}
	}
}