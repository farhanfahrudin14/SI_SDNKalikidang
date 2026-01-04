<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ekstrakurikuler_foto extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();

        $this->load->model('EkstrakurikulerKategori_model', 'kategori');
        $this->load->model('EkstrakurikulerFoto_model', 'foto');
        $this->load->model('Menu_model', 'menu');
    }

    // =========================
    // DAFTAR KATEGORI
    // =========================
    public function index()
    {
        $data['title']      = 'Daftar Kategori Ekstrakurikuler';
        $data['page']       = 'ekstrakurikuler_foto/v_index';
        $data['kategori']   = $this->kategori->get_all();
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // DETAIL FOTO PER KATEGORI
    // =========================
    public function detail($kategori_id)
    {
        $kategori = $this->kategori->get_by_id($kategori_id);
        if (!$kategori) show_404();

        $data['title']      = 'Kelola Foto Ekstrakurikuler';
        $data['page']       = 'ekstrakurikuler_foto/v_detail';
        $data['kategori']   = $kategori;
        $data['foto']       = $this->foto->get_by_kategori($kategori_id);
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // FORM TAMBAH FOTO
    // =========================
    public function tambah($kategori_id)
    {
        $kategori = $this->kategori->get_by_id($kategori_id);
        if (!$kategori) redirect('c_ekstrakurikuler_foto');

        $data['title']      = 'Tambah Foto Ekstrakurikuler';
        $data['page']       = 'ekstrakurikuler_foto/v_tambah';
        $data['kategori']   = $kategori;
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // UPLOAD FOTO
    // =========================
    public function upload($kategori_id)
    {
        $config['upload_path']   = './uploads/ekstrakurikuler/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('c_ekstrakurikuler_foto/detail/'.$kategori_id);
        }

        $upload = $this->upload->data();

        $this->foto->insert([
            'kategori_id'    => $kategori_id,
            'foto'           => $upload['file_name'],
            'tanggal_upload' => date('Y-m-d')
        ]);

        $this->session->set_flashdata('success', 'Foto berhasil diupload!');
        redirect('c_ekstrakurikuler_foto/detail/'.$kategori_id);
    }

    // =========================
    // HAPUS FOTO
    // =========================
    public function delete($id, $kategori_id)
    {
        $foto = $this->foto->get_by_id($id);

        if ($foto && file_exists('./uploads/ekstrakurikuler/'.$foto->foto)) {
            unlink('./uploads/ekstrakurikuler/'.$foto->foto);
        }

        $this->foto->delete_single($id);
        $this->session->set_flashdata('success', 'Foto berhasil dihapus!');
        redirect('c_ekstrakurikuler_foto/detail/'.$kategori_id);
    }
    // =========================
// FORM EDIT FOTO
// =========================
// =========================
// FORM EDIT FOTO
// =========================
public function edit($id)
{
    $foto_data = $this->foto->get_by_id($id); // ambil data foto
    if (!$foto_data) {
        $this->session->set_flashdata('error', 'Foto tidak ditemukan!');
        redirect('c_ekstrakurikuler_foto');
    }

    $data['title'] = 'Edit Foto Ekstrakurikuler';
    $data['page'] = 'ekstrakurikuler_foto/v_edit';
    $data['foto_data'] = $foto_data;
    $data['kategori_list'] = $this->kategori->get_all(); // untuk dropdown kategori
    $data['menu_admin'] = $this->menu->getMenuAdmin();

    $this->load->view('back/layouts/main', $data);
}


// =========================
// PROSES UPDATE FOTO
// =========================
public function update($id)
{
    $foto_data = $this->foto->get_by_id($id);
    if (!$foto_data) {
        $this->session->set_flashdata('error', 'Foto tidak ditemukan!');
        redirect('c_ekstrakurikuler_foto');
    }

    // cek apakah ada file baru di upload
    if (!empty($_FILES['foto']['name'])) {
        $config['upload_path']   = './uploads/ekstrakurikuler/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('c_ekstrakurikuler_foto/edit/'.$id);
        }

        $upload = $this->upload->data();

        // hapus file lama
        if (file_exists('./uploads/ekstrakurikuler/'.$foto_data->foto)) {
            unlink('./uploads/ekstrakurikuler/'.$foto_data->foto);
        }

        // update db
        $this->foto->update($id, ['foto' => $upload['file_name']]);
        $this->session->set_flashdata('success', 'Foto berhasil diperbarui!');
    } else {
        $this->session->set_flashdata('error', 'Tidak ada file yang diupload.');
    }

    redirect('c_ekstrakurikuler_foto/detail/'.$foto_data->kategori_id);
}

public function v_hapus($id)
{
    $foto = $this->foto->get_by_id($id);
    if (!$foto) redirect('c_ekstrakurikuler_foto');

    $kategori = $this->kategori->get_by_id($foto->kategori_id);

    $data['title']      = 'Hapus Foto Ekstrakurikuler';
    $data['page']       = 'ekstrakurikuler_foto/v_hapus';
    $data['foto']       = $foto;       // <-- pakai $foto
    $data['kategori']   = $kategori;
    $data['menu_admin'] = $this->menu->getMenuAdmin();

    $this->load->view('back/layouts/main', $data);
}


}
