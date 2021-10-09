<?php

class Peminjaman Extends CI_Controller{

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('m_peminjaman');
	}

	public function index()
	{
		$isi['content'] = 'peminjaman/v_peminjaman';
		$isi['judul']	= 'Data Peminjaman';
		if($this->session->userdata('level') == 'Anggota'){
			$isi['data']	= $this->m_peminjaman->getDataPeminjamanAnggota();
		}else{
			$isi['data']	= $this->m_peminjaman->getDataPeminjaman();
		}
		// $isi['data']	= $this->m_peminjaman->getDataPeminjaman();
		$this->load->view('v_dashboard', $isi);
	}

	public function tambah_peminjaman()
	{
		$level = 'Anggota';
		$isi['content'] 	= 'peminjaman/t_peminjaman';
		$isi['judul']		= 'Form Tambah Peminjaman';
		$isi['id_peminjaman'] = $this->m_peminjaman->id_peminjaman();
		$isi['peminjam']	= $this->db->get_where('login', array('level' => $level))->result();
		$isi['buku']		= $this->db->get('buku')->result();
		$this->load->view('v_dashboard', $isi);
	}

	public function simpan()
	{
		$data = array(
			'id_pm' => $this->input->post('id_pm'),
			'id' => $this->input->post('id'),
			'id_buku' => $this->input->post('id_buku'),
			'tgl_pinjam' => $this->input->post('tgl_pinjam'),
			'tgl_kembali' => $this->input->post('tgl_kembali'),
		);
		$query = $this->db->insert('peminjaman', $data);
		if ($query = true) {
			$this->session->set_flashdata('info','Data Transaksi Berhasil di Simpan');
			redirect('peminjaman');
		}
	}

	public function jumlah_buku()
	{
		$id = $this->input->post('id');
		$data = $this->m_peminjaman->jumlah_buku($id);
		echo json_encode($data);
	}

	public function kembalikan($id)
	{
		$data = $this->m_peminjaman->getDataById_pm($id);
		$kembalikan = array(
			'id' 		=> $data['id'],
			'id_buku' 			=> $data['id_buku'],
			'tgl_pinjam' 		=> $data['tgl_pinjam'],
			'tgl_kembali' 		=> $data['tgl_kembali'],
			'tgl_kembalikan' 	=> date('Y-m-d')
		);

		$query = $this->db->insert('pengembalian', $kembalikan);
		if ($query = true) {
			$delete = $this->m_peminjaman->deletePm($id);
			if ($delete = true) {
				$this->session->set_flashdata('info', 'Buku Berhasil di Kembalikan');
				redirect('peminjaman');
			}
		}

	}
}