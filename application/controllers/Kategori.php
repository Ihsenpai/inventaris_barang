<?php

class Kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->Kategori_model->get_all();
        //$this->load->view('template/main', ['content' => 'kategori/index', 'data' => $data]);
        $this->load->view('template/main', array_merge(['content' => 'kategori/index'], $data));
    }

    public function create() {
        $data['title'] = 'Tambah Kategori';
        $this->load->view('template/main', array_merge(['content' => 'kategori/create'], $data));
    }

    public function store() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        if($this->Kategori_model->insert($data)) {
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan kategori');
        }

        redirect('kategori');
    }

    public function edit($id) {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        //$this->load->view('template/main', ['content' => 'kategori/edit', 'data' => $data]);
        $this->load->view('template/main', array_merge(['content' => 'kategori/edit'], $data));
    }

    public function update($id) {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        if($this->Kategori_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Kategori berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah kategori');
        }

        redirect('kategori');
    }

    public function delete($id) {
        if($this->Kategori_model->delete($id)) {
            $this->session->set_flashdata('success', 'Kategori berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus - Masih ada barang terkait');
        }
        redirect('kategori');
    }
}