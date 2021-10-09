<?php 

class Buku Extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$isi['content'] = 'buku/v_buku';
		$isi['judul']	= 'Daftar Data Buku';
		$isi['data']	= $this->m_buku->get_data_buku();
		$this->load->view('v_dashboard', $isi);

	}

	public function tambah_buku()
	{
		$isi['content'] = 'buku/form_buku';
		$isi['judul']	= 'Form Tambah Buku';
		$isi['id_buku']	= $this->m_buku->id_buku();
		$isi['pengarang'] = $this->db->get('pengarang')->result();
		$isi['penerbit'] = $this->db->get('penerbit')->result();
		$this->load->view('v_dashboard', $isi);
	}

	public function simpan()
	{
		// get foto
		$config['upload_path'] = './assets/covers';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $_FILES['coverpost']['name'];
  
		$this->upload->initialize($config);

		if (!empty($_FILES['coverpost']['name'])) {
	        if ( $this->upload->do_upload('coverpost') ) {
	            $cover = $this->upload->data();
	            $data = array(
					'id_buku' 		=> $this->input->post('id_buku'),
					'id_pengarang' 	=> $this->input->post('id_pengarang'),
					'id_penerbit' 	=> $this->input->post('id_penerbit'), 
					'judul_buku' 	=> $this->input->post('judul_buku'),
					'tahun_terbit' 	=> $this->input->post('tahun_terbit'),
					'jumlah' 		=> $this->input->post('jumlah'),
					'cover'			=> $cover['file_name']
				);

				$query = $this->db->insert('buku', $data);
				if ($query = true) {
					$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
					redirect('buku');
				}
	        }else {
              die("gagal upload");
	        }
	    }else {
	    }
	}

	public function edit($id)
	{
		$isi['content'] 	= 'buku/edit_buku';
		$isi['judul']		= 'Form Edit Buku';
		$isi['pengarang'] 	= $this->db->get('pengarang')->result();
		$isi['penerbit'] 	= $this->db->get('penerbit')->result();
		$isi['data']		= $this->m_buku->edit($id);
		$this->load->view('v_dashboard', $isi);
	}

	public function update()
	{
		$id_buku = $this->input->post('id_buku');
		$old_cvr= $this->input->post('oldcover');
		$path = './assets/picture/';
		// get foto
		$config['upload_path'] = './assets/covers';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $_FILES['coverpost']['name'];
  
		$this->upload->initialize($config);

		if (!empty($_FILES['coverpost']['name'])) {
	        if ( $this->upload->do_upload('coverpost') ) {
	            $cover = $this->upload->data();
	            $data = array(
						'id_buku' 		=> $this->input->post('id_buku'),
						'id_pengarang' 	=> $this->input->post('id_pengarang'),
						'id_penerbit' 	=> $this->input->post('id_penerbit'), 
						'judul_buku' 	=> $this->input->post('judul_buku'),
						'tahun_terbit' 	=> $this->input->post('tahun_terbit'),
						'jumlah' 		=> $this->input->post('jumlah'),
						'cover'			=> $cover['file_name']
					);

					// hapus foto pada direktori
					@unlink($path.$this->input->post('oldcover'));
					 
					$query = $this->m_buku->update($id_buku, $data);
					if ($query = true) {
						$this->session->set_flashdata('info', 'Data Berhasil di Update');
						redirect('buku');
					}
	        }else {
              die("gagal upload");
	        }
	    }else {

			$cover = $this->upload->data();
			$data = array(
					'id_buku' 		=> $this->input->post('id_buku'),
					'id_pengarang' 	=> $this->input->post('id_pengarang'),
					'id_penerbit' 	=> $this->input->post('id_penerbit'), 
					'judul_buku' 	=> $this->input->post('judul_buku'),
					'tahun_terbit' 	=> $this->input->post('tahun_terbit'),
					'jumlah' 		=> $this->input->post('jumlah'),
					'cover'			=> $old_cvr
				);
				$query = $this->m_buku->update($id_buku, $data);
					if ($query = true) {
						$this->session->set_flashdata('info', 'Data Berhasil di Update');
						redirect('buku');
					}
	    }
	}

	public function hapus($id)
	{
		$query = $this->m_buku->hapus($id);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
			redirect('buku');
		}else{
			$this->session->set_flashdata('info', 'Sek diselang');
		}
	}

}