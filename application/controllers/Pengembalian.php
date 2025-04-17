<?php
class Pengembalian extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Pengembalian_model', 'Barang_model', 'Peminjaman_model']);
    }

    public function kembali($id_peminjaman) {
        // Validasi ID
        if(!$id_peminjaman || !ctype_digit($id_peminjaman)) {
            show_404();
        }

        // Ambil data peminjaman
        $peminjaman = $this->Peminjaman_model->get_by_id($id_peminjaman);
        if(!$peminjaman) {
            $this->session->set_flashdata('error', 'Data peminjaman tidak ditemukan');
            redirect('peminjaman');
        }

        // Cek status peminjaman
        if($peminjaman->total_kembali >= $peminjaman->jumlah) {
            $this->session->set_flashdata('error', 'Sudah dikembalikan sepenuhnya');
            redirect('peminjaman');
        }

        // Update stok barang
        $barang = $this->Barang_model->get_by_id($peminjaman->id_barang);
        $this->Barang_model->update($barang->id_barang, [
            'stok' => $barang->stok + $peminjaman->jumlah
        ]);

        // Simpan data pengembalian
        $data_pengembalian = [
            'id_peminjaman' => $id_peminjaman,
            'jumlah_kembali' => $peminjaman->jumlah,
            'tanggal_pengembalian' => date('Y-m-d')
        ];
        $this->Pengembalian_model->insert($data_pengembalian);

        // Update status peminjaman (opsional)
        $this->Peminjaman_model->update($id_peminjaman, ['status' => 'dikembalikan']);

        $this->session->set_flashdata('success', 'Pengembalian berhasil!');
        redirect('peminjaman');
    }
}