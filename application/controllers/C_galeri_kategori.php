<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_galeri_kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('GaleriKategori_model', 'kategori');
        $this->load->model('Menu_model', 'menu'); // sidebar admin
    }

    // =========================
    // DAFTAR KATEGORI
    // =========================
    public function index()
    {
        $data['title']      = 'Kategori Galeri';
        $data['page']       = 'galeri_kategori/v_index';
        $data['kategori']   = $this->kategori->get_all();
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // FORM TAMBAH KATEGORI
    // =========================
    public function create()
    {
        $data['title']      = 'Tambah Kategori Galeri';
        $data['page']       = 'galeri_kategori/v_tambah';
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // SIMPAN KATEGORI BARU
    // =========================
    public function store()
    {
        $nama_kategori = trim($this->input->post('nama_kategori', TRUE));

        if ($nama_kategori == '') {
            $this->session->set_flashdata('error', 'Nama kategori tidak boleh kosong!');
            redirect('c_galeri_kategori/create');
        }

        $data = [
            'nama_kategori' => $nama_kategori
        ];

        $this->kategori->insert($data);
        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan!');
        redirect('c_galeri_kategori');
    }

    // =========================
    // FORM EDIT KATEGORI
    // =========================
    public function edit($id)
    {
        $kategori = $this->kategori->get_by_id($id);
        if (!$kategori) {
            show_404();
        }

        $data['title']      = 'Edit Kategori Galeri';
        $data['page']       = 'galeri_kategori/v_edit';
        $data['kategori']   = $kategori;
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // UPDATE KATEGORI
    // =========================
    public function update($id)
    {
        $nama_kategori = trim($this->input->post('nama_kategori', TRUE));

        if ($nama_kategori == '') {
            $this->session->set_flashdata('error', 'Nama kategori tidak boleh kosong!');
            redirect('c_galeri_kategori/edit/'.$id);
        }

        $data = [
            'nama_kategori' => $nama_kategori
        ];

        $this->kategori->update($id, $data);
        $this->session->set_flashdata('success', 'Kategori berhasil diupdate!');
        redirect('c_galeri_kategori');
    }

    // =========================
    // HAPUS KATEGORI
    // =========================
    public function destroy($id)
    {
        $kategori = $this->kategori->get_by_id($id);
        if (!$kategori) {
            show_404();
        }

        $this->kategori->delete($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus!');
        redirect('c_galeri_kategori');
    }
    // =========================
// KONFIRMASI HAPUS KATEGORI
// =========================
public function hapus($id)
{
    $kategori = $this->kategori->get_by_id($id);
    if (!$kategori) {
        show_404();
    }

    $data['title']      = 'Hapus Kategori Galeri';
    $data['page']       = 'galeri_kategori/v_hapus';
    $data['kategori']   = $kategori;
    $data['menu_admin'] = $this->menu->getMenuAdmin();

    $this->load->view('back/layouts/main', $data);
}

}
