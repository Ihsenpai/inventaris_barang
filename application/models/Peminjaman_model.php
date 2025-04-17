<?php

class Peminjaman_model extends CI_Model {
    protected $table = 'peminjaman';
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
     public function get_all() {
         $this->db->select('peminjaman.*, barang.nama_barang, kategori.nama_kategori')
                 ->join('barang', 'barang.id_barang = peminjaman.id_barang')
                 ->join('kategori', 'kategori.id_kategori = barang.id_kategori')
                 ->where('peminjaman.status', 'dipinjam'); // Hanya tampilan yang masih bisa dipinjam aja ya ges yag :3
            return $this->db->get('peminjaman')->result();
    }


    public function get_by_id($id) {
        $this->db->select('peminjaman.*, barang.nama_barang, SUM(pengembalian.jumlah_kembali) AS total_kembali')
                ->join('barang', 'barang.id_barang = peminjaman.id_barang')
                ->join('pengembalian', 'pengembalian.id_peminjaman = peminjaman.id_peminjaman', 'left')
                ->where('peminjaman.id_peminjaman', $id)
                ->group_by('peminjaman.id_peminjaman');
            return $this->db->get('peminjaman')->row();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id_peminjaman', $id)
                 ->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id_peminjaman', $id)
                 ->delete($this->table);
        return $this->db->affected_rows();
    }

    public function get_total_pinjam($id_barang) {
        $this->db->select_sum('jumlah')
                ->where('id_barang', $id_barang)
                ->where('status', 'dipinjam'); 
        $result = $this->db->get($this->table)->row();
        return $result ? $result->jumlah : 0;
    }
}