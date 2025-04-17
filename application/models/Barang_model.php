<?php

class Barang_model extends CI_Model {
    protected $table = 'barang';

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function get_all() {
        $this->db->select('barang.*, kategori.nama_kategori')
                 ->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        return $this->db->get($this->table)->result();
    }
    public function get_by_id($id) {
        $this->db->select('barang.*, kategori.nama_kategori')
                 ->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left')
                 ->where('id_barang', $id);
        return $this->db->get('barang')->row();
    }
    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id_barang', $id)
                 ->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        // Cek relasi dengan peminjaman
        $this->db->where('id_barang', $id);
        $count = $this->db->count_all_results('peminjaman');
        
        if($count > 0) {
            return false; // Masih ada peminjaman terkait
        }
        
        $this->db->where('id_barang', $id)
                 ->delete($this->table);
        return $this->db->affected_rows();
    }

    public function get_stok($id_barang) {
        $this->db->select('stok')
                 ->where('id_barang', $id_barang);
        $result = $this->db->get($this->table)->row();
        return $result ? $result->stok : 0;
        
    }

    public function get_terbaru($limit = 5) {
        $this->db->select('barang.*, kategori.nama_kategori')
                 ->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left')
                 ->order_by('id_barang', 'DESC')
                 ->limit($limit);
        return $this->db->get('barang')->result();
    }
}