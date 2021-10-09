<?php

class Laporan Extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		$this->load->helper('tgl_indo_helper');
		$this->load->library('pdf_report');
	}

	public function peminjaman()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_ahir = $this->input->post('tgl_ahir');

		$this->session->set_userdata('tanggal_awal', $tgl_awal);
		$this->session->set_userdata('tanggal_ahir', $tgl_ahir);

		if (empty($tgl_awal) || empty($tgl_ahir)) {
			$isi['content']	= 'laporan/v_peminjaman';
			$isi['judul']	= 'Laporan Peminjaman';
			$isi['data']	= $this->m_laporan->getAllData();			
		}else{
			$isi['content']	= 'laporan/v_peminjaman';
			$isi['judul']	= 'Laporan Peminjaman';
			$isi['data']	= $this->m_laporan->filterData($tgl_awal, $tgl_ahir);
		}

		$this->load->view('v_dashboard', $isi);		
	}

	// public function refresh()
	// {
	// 	$isi['content']	= 'laporan/v_peminjaman';
	// 	$isi['judul']	= 'Laporan Peminjaman';
	// 	$isi['data']	= $this->m_laporan->getAllData();
	// 	$this->load->view('v_dashboard', $isi);	
	// }

	public function pdf_peminjaman()
	{
		if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_ahir'))) {
			$isi['data'] = $this->m_laporan->getAllData();
			$this->load->view('laporan/pdf_peminjaman', $isi);
		}else{
			$isi['data'] = $this->m_laporan->filterData($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_ahir'));
			$this->load->view('laporan/pdf_peminjaman', $isi);
		}
	}

	public function pengembalian()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_ahir = $this->input->post('tgl_ahir');

		$this->session->set_userdata('tanggal_awal', $tgl_awal);
		$this->session->set_userdata('tanggal_ahir', $tgl_ahir);

		if (empty($tgl_awal) || empty($tgl_ahir)) {
			$isi['content']	= 'laporan/v_pengembalian';
			$isi['judul']	= 'Laporan Pengembalian';
			$isi['data']	= $this->m_laporan->getAllDataPengembalian();			
		}else{
			$isi['content']	= 'laporan/v_pengembalian';
			$isi['judul']	= 'Laporan Pengembalian';
			$isi['data']	= $this->m_laporan->filterDataPengembalian($tgl_awal, $tgl_ahir);
		}

		$this->load->view('v_dashboard', $isi);	
	}

	public function pdf_pengembalian()
	{
		if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_ahir'))) {
			$isi['data'] = $this->m_laporan->getAllDataPengembalian();
			$this->load->view('laporan/pdf_pengembalian', $isi);
		}else{
			$isi['data'] = $this->m_laporan->filterDataPengembalian($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_ahir'));
			$this->load->view('laporan/pdf_pengembalian', $isi);
		}
	}
}