<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fasilitas_kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();

        $this->load->model('FasilitasKategori_model', 'kategori');
        $this->load->model('Menu_model', 'menu');
    }

    // =========================
    // DAFTAR KATEGORI
    // =========================
    public function index()
    {
        $data['title']      = 'Kategori Fasilitas';
        $data['page']       = 'fasilitas_kategori/v_index';
        $data['kategori']   = $this->kategori->get_all();
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // FORM TAMBAH KATEGORI
    // =========================
    public function create()
    {
        $data['title']      = 'Tambah Kategori Fasilitas';
        $data['page']       = 'fasilitas_kategori/v_tambah';
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // SIMPAN KATEGORI
    // =========================
    public function store()
    {
        $data = [
            'nama_kategori' => trim($this->input->post('nama_kategori', TRUE)),
            'deskripsi'     => trim($this->input->post('deskripsi', TRUE))
        ];

        if ($data['nama_kategori'] == '' || $data['deskripsi'] == '') {
            $this->session->set_flashdata('error', 'Nama & deskripsi wajib diisi!');
            redirect('c_fasilitas_kategori/create');
        }

        $this->kategori->insert($data);
        $this->session->set_flashdata('success', 'Kategori fasilitas berhasil ditambahkan!');
        redirect('c_fasilitas_kategori');
    }

    // =========================
    // FORM EDIT KATEGORI
    // =========================
    public function edit($id)
    {
        $kategori = $this->kategori->get_by_id($id);
        if (!$kategori) show_404();

        $data['title']      = 'Edit Kategori Fasilitas';
        $data['page']       = 'fasilitas_kategori/v_edit';
        $data['kategori']   = $kategori;
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // UPDATE KATEGORI
    // =========================
    public function update($id)
    {
        $data = [
            'nama_kategori' => trim($this->input->post('nama_kategori', TRUE)),
            'deskripsi'     => trim($this->input->post('deskripsi', TRUE))
        ];

        if ($data['nama_kategori'] == '' || $data['deskripsi'] == '') {
            redirect('c_fasilitas_kategori/edit/'.$id);
        }

        $this->kategori->update($id, $data);
        $this->session->set_flashdata('success', 'Kategori fasilitas berhasil diupdate!');
        redirect('c_fasilitas_kategori');
    }

    // =========================
    // KONFIRMASI HAPUS
    // =========================
    public function hapus($id)
    {
        $kategori = $this->kategori->get_by_id($id);
        if (!$kategori) show_404();

        $data['title']      = 'Hapus Kategori Fasilitas';
        $data['page']       = 'fasilitas_kategori/v_hapus';
        $data['kategori']   = $kategori;
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // DELETE KATEGORI
    // =========================
    public function destroy($id)
    {
        $this->kategori->delete($id);
        $this->session->set_flashdata('success', 'Kategori fasilitas berhasil dihapus!');
        redirect('c_fasilitas_kategori');
    }
}
