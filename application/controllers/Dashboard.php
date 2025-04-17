<?php

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Barang_model', 'Kategori_model', 
                           'Peminjaman_model', 'Pengembalian_model']);
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['total_barang'] = count($this->Barang_model->get_all());
        $data['total_kategori'] = count($this->Kategori_model->get_all());
        $data['total_peminjaman'] = count($this->Peminjaman_model->get_all());
        $data['total_pengembalian'] = count($this->Pengembalian_model->get_all());
        $data['barang_terakhir'] = $this->Barang_model->get_terbaru();
        
    $this->load->view('template/main', array_merge(['content' => 'dashboard/index'], $data));

    }
}