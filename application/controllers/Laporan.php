<?php
class Laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Peminjaman_model');
    }

    public function index() {
        $data['title'] = 'Laporan Peminjaman';
        
        $this->db->select('peminjaman.*, barang.nama_barang, 
                          SUM(pengembalian.jumlah_kembali) as total_kembali');
        $this->db->join('barang', 'barang.id_barang = peminjaman.id_barang');
        $this->db->join('pengembalian', 'pengembalian.id_peminjaman = peminjaman.id_peminjaman', 'left');
        $this->db->group_by('peminjaman.id_peminjaman');
        $data['peminjaman'] = $this->db->get('peminjaman')->result();
        
        //$this->load->view('template/main', ['content' => 'laporan/index', 'data' => $data]);
        $this->load->view('template/main', array_merge(['content' => 'laporan/index'], $data));
    }

    public function filter() {
        $data['title'] = 'Laporan Peminjaman';
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $this->db->select('peminjaman.*, barang.nama_barang, 
                          SUM(pengembalian.jumlah_kembali) as total_kembali');
        $this->db->join('barang', 'barang.id_barang = peminjaman.id_barang');
        $this->db->join('pengembalian', 'pengembalian.id_peminjaman = peminjaman.id_peminjaman', 'left');
        $this->db->where('tanggal_peminjaman >=', $tgl_awal);
        $this->db->where('tanggal_peminjaman <=', $tgl_akhir);
        $this->db->group_by('peminjaman.id_peminjaman');
        $data['peminjaman'] = $this->db->get('peminjaman')->result();
        
        //$this->load->view('template/main', ['content' => 'laporan/index', 'data' => $data]);
        $this->load->view('template/main', array_merge(['content' => 'laporan/index'], $data));
    }
}