<?php

class M_login extends CI_Model{

	public function proses_login($user,$pass)
    {
        $password = $pass;
        $user = $this->db->where('username', $user);
        $pass = $this->db->where('password', $password);
        $query = $this->db->get('login');
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $sess = array(
                    'id'        => $row->id ,
                    'nama'      => $row->nama ,
                    'jk'        => $row->jk ,
                    'alamat'    => $row->alamat ,
                    'telp'      => $row->telp ,
                    'username'  => $row->username , 
                    'password'  => $row->password ,
                    'level'     => $row->level
                );
                $this->session->set_userdata($sess);
            }
            if ($this->session->userdata('level') == 'Anggota'){
                redirect('buku');
            }else{
                redirect('dashboard');
            }
        }else{
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Periksa Username dan Password !</div>');
            redirect('login');
        }
    }
}