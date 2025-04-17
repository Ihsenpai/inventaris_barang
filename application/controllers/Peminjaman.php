<?php

class Peminjaman extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Peminjaman_model', 'Barang_model']);
    }

    public function index() {
        $data['title'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->get_all();
        //$this->load->view('template/main', ['content' => 'peminjaman/index', 'data' => $data]);
        $this->load->view('template/main', array_merge(['content' => 'peminjaman/index'], $data));
    }

    public function pinjam($id_barang = NULL) {
        // Validasi ID
        if(!$id_barang || !ctype_digit($id_barang)) {
            $this->session->set_flashdata('error', 'ID Barang tidak valid');
            redirect('barang');
        }

        $barang = $this->Barang_model->get_by_id($id_barang);
        
        if(!$barang) {
            $this->session->set_flashdata('error', 'Barang tidak ditemukan');
            redirect('barang');
        }
        // Cek stok
        if($barang->stok < 1) {
            $this->session->set_flashdata('error', 'Stok barang habis');
            redirect('barang');
        }

        // Kirim data ke view
        $data['title'] = 'Form Peminjaman';
        $data['barang'] = $barang;
        $this->load->view('template/main', array_merge(['content' => 'peminjaman/pinjam'], $data));
    }


    public function store() {
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');

        // Validasi stok
        $barang = $this->Barang_model->get_by_id($id_barang);
        if($jumlah > $barang->stok) {
            $this->session->set_flashdata('error', 'Jumlah melebihi stok!');
            redirect('barang');
        }

        // Update stok
        $this->Barang_model->update($id_barang, ['stok' => $barang->stok - $jumlah]);

        // Simpan peminjaman
        $data_peminjaman = [
            'id_barang' => $id_barang,
            'jumlah' => $jumlah,
            'tanggal_peminjaman' => date('Y-m-d')
        ];
        $this->Peminjaman_model->insert($data_peminjaman);

        $this->session->set_flashdata('success', 'Peminjaman berhasil!');
        redirect('barang');
    }
}