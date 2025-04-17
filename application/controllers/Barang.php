<?php
class Barang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Barang_model', 'Kategori_model']);
    }

    public function index() {
        $data['title'] = 'Data Barang';
        $data['barang'] = $this->Barang_model->get_all();
        $this->load->view('template/main', array_merge(['content' => 'barang/index'], $data));
    }

    public function create() {
        $data['title'] = 'Tambah Barang';
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('template/main', array_merge(['content' => 'barang/create'], $data));
    
    }

    public function store() {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'stok' => $this->input->post('stok')
        ];

        if($this->Barang_model->insert($data)) {
            $this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan barang');
        }

        redirect('barang');
    }

    public function edit($id) {
        $data['title'] = 'Edit Barang';
        $data['barang'] = $this->Barang_model->get_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();
        //$this->load->view('template/main', ['content' => 'barang/edit', 'data' => $data]);
        $this->load->view('template/main', array_merge(['content' => 'barang/edit'], $data));
    }

    public function update($id) {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'stok' => $this->input->post('stok')
        ];

        if($this->Barang_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Barang berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah barang');
        }

        redirect('barang');
    }

    public function delete($id) {
        if($this->Barang_model->delete($id)) {
            $this->session->set_flashdata('success', 'Barang berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus - Masih ada peminjaman terkait');
        }
        redirect('barang');
    }
}