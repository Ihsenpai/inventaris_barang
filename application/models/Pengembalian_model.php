<?php

class Pengembalian_model extends CI_Model {
    protected $table = 'pengembalian';
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function get_all() {
        $this->db->select('pengembalian.*, 
                          peminjaman.id_barang,
                          barang.nama_barang,
                          peminjaman.jumlah as jumlah_pinjam')
                 ->join('peminjaman', 'peminjaman.id_peminjaman = pengembalian.id_peminjaman')
                 ->join('barang', 'barang.id_barang = peminjaman.id_barang');
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        $this->db->select('pengembalian.*, 
                          peminjaman.id_barang,
                          barang.nama_barang')
                 ->join('peminjaman', 'peminjaman.id_peminjaman = pengembalian.id_peminjaman')
                 ->join('barang', 'barang.id_barang = peminjaman.id_barang')
                 ->where('pengembalian.id_pengembalian', $id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id_pengembalian', $id)
                 ->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id_pengembalian', $id)
                 ->delete($this->table);
        return $this->db->affected_rows();
    }
}