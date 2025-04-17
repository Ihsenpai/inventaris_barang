<?php

class Kategori_model extends CI_Model {
    protected $table = 'kategori';

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->where('id_kategori', $id)
                        ->get($this->table)
                        ->row();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id_kategori', $id)
                 ->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        // Cek relasi dengan barang
        $this->db->where('id_kategori', $id);
        $count = $this->db->count_all_results('barang');
        
        if($count > 0) {
            return false;
        }
        
        $this->db->where('id_kategori', $id)
                 ->delete($this->table);
        return $this->db->affected_rows();
    }
}