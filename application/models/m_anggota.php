<?php 

class M_anggota Extends CI_Model{

	public function id_anggota()
    {
        $this->db->select('login.id as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('login');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        // $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        // $kodejadi = $kodemax;
        return $kode;
    }

    public function edit($id)
    {
    	$this->db->where('id', $id);
    	return $this->db->get('login')->row_array();
    }

    public function update($id, $data)
    {
    	$this->db->where('id', $id);
    	$this->db->update('login', $data);
    }

    public function hapus($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('login');
    }
}