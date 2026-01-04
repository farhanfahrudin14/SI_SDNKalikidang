<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fasilitas_foto extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();

        $this->load->model('FasilitasKategori_model', 'kategori');
        $this->load->model('FasilitasFoto_model', 'foto');
        $this->load->model('Menu_model', 'menu');
    }

    // =========================
    // DAFTAR KATEGORI
    // =========================
    public function index()
    {
        $data['title']      = 'Daftar Kategori Fasilitas';
        $data['page']       = 'fasilitas_foto/v_index';
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

        $data['title']      = 'Kelola Foto Fasilitas';
        $data['page']       = 'fasilitas_foto/v_detail';
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
        if (!$kategori) redirect('c_fasilitas_foto');

        $data['title']      = 'Tambah Foto Fasilitas';
        $data['page']       = 'fasilitas_foto/v_tambah';
        $data['kategori']   = $kategori;
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }

    // =========================
    // UPLOAD FOTO
    // =========================
    public function upload($kategori_id)
    {
        $config['upload_path']   = './uploads/fasilitas/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('c_fasilitas_foto/detail/'.$kategori_id);
        }

        $upload = $this->upload->data();

        $this->foto->insert([
            'kategori_id'    => $kategori_id,
            'foto'           => $upload['file_name'],
            'tanggal_upload' => date('Y-m-d')
        ]);

        $this->session->set_flashdata('success', 'Foto fasilitas berhasil diupload!');
        redirect('c_fasilitas_foto/detail/'.$kategori_id);
    }

    // =========================
    // FORM EDIT FOTO
    // =========================
    public function edit($id)
    {
        $foto_data = $this->foto->get_by_id($id);
        if (!$foto_data) {
            $this->session->set_flashdata('error', 'Foto tidak ditemukan!');
            redirect('c_fasilitas_foto');
        }

        $data['title']          = 'Edit Foto Fasilitas';
        $data['page']           = 'fasilitas_foto/v_edit';
        $data['foto_data']      = $foto_data;
        $data['kategori_list']  = $this->kategori->get_all();
        $data['menu_admin']     = $this->menu->getMenuAdmin();

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
            redirect('c_fasilitas_foto');
        }

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './uploads/fasilitas/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('c_fasilitas_foto/edit/'.$id);
            }

            $upload = $this->upload->data();

            if (file_exists('./uploads/fasilitas/'.$foto_data->foto)) {
                unlink('./uploads/fasilitas/'.$foto_data->foto);
            }

            $this->foto->update($id, ['foto' => $upload['file_name']]);
            $this->session->set_flashdata('success', 'Foto fasilitas berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Tidak ada file yang diupload.');
        }

        redirect('c_fasilitas_foto/detail/'.$foto_data->kategori_id);
    }

    // =========================
    // HAPUS FOTO
    // =========================
    public function delete($id, $kategori_id)
    {
        $foto = $this->foto->get_by_id($id);

        if ($foto && file_exists('./uploads/fasilitas/'.$foto->foto)) {
            unlink('./uploads/fasilitas/'.$foto->foto);
        }

        $this->foto->delete_single($id);
        $this->session->set_flashdata('success', 'Foto fasilitas berhasil dihapus!');
        redirect('c_fasilitas_foto/detail/'.$kategori_id);
    }

    // =========================
    // KONFIRMASI HAPUS
    // =========================
    public function v_hapus($id)
    {
        $foto = $this->foto->get_by_id($id);
        if (!$foto) redirect('c_fasilitas_foto');

        $kategori = $this->kategori->get_by_id($foto->kategori_id);

        $data['title']      = 'Hapus Foto Fasilitas';
        $data['page']       = 'fasilitas_foto/v_hapus';
        $data['foto']       = $foto;
        $data['kategori']   = $kategori;
        $data['menu_admin'] = $this->menu->getMenuAdmin();

        $this->load->view('back/layouts/main', $data);
    }
}
