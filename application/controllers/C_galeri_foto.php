<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_galeri_foto extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();

        $this->load->model('GaleriKategori_model', 'kategori');
        $this->load->model('GaleriFoto_model', 'foto');
        $this->load->model('Menu_model', 'menu'); // biar sidebar jalan
    }

    // Halaman daftar kategori
    public function index()
    {
        $data['title']      = 'Daftar Kategori Galeri';
        $data['page']       = 'galeri_foto/v_index';
        $data['kategori']   = $this->kategori->get_all();
        $data['menu_admin'] = $this->menu->getMenuAdmin();
        $this->load->view('back/layouts/main', $data);
    }

    // Halaman detail kategori & foto
    public function detail($kategori_id)
    {
        $data['title']      = 'Kelola Foto Galeri';
        $data['page']       = 'galeri_foto/v_detail';
        $data['kategori']   = $this->kategori->get_by_id($kategori_id);
        $data['foto']       = $this->foto->get_by_kategori($kategori_id);
        $data['menu_admin'] = $this->menu->getMenuAdmin();
        $this->load->view('back/layouts/main', $data);
    }

    // Form tambah foto untuk kategori tertentu
    public function tambah($kategori_id)
    {
        $kategori = $this->kategori->get_by_id($kategori_id);
        if (!$kategori) redirect('c_galeri_foto');

        $data['title']      = 'Tambah Foto Galeri';
        $data['page']       = 'galeri_foto/v_tambah';
        $data['kategori']   = $kategori; // untuk hidden input
        $data['menu_admin'] = $this->menu->getMenuAdmin();
        $this->load->view('back/layouts/main', $data);
    }

    // Upload foto baru
    public function upload($kategori_id)
{
    $deskripsi = $this->input->post('deskripsi', TRUE);

    $config['upload_path']   = './uploads/galeri/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
        $upload = $this->upload->data();

        $data = [
            'kategori_id'    => $kategori_id,
            'foto'           => $upload['file_name'],
            'tanggal_upload' => date('Y-m-d'),
            'deskripsi'      => $deskripsi
        ];

        $this->foto->insert($data);
        $this->session->set_flashdata('success', 'Foto berhasil diupload!');
    } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
    }

    redirect('c_galeri_foto/detail/'.$kategori_id);
}



    // Form edit foto
    public function edit($id)
    {
        $foto = $this->foto->get_by_id($id);
        if (!$foto) redirect('c_galeri_foto');

        $data['title']         = 'Edit Foto Galeri';
        $data['page']          = 'galeri_foto/v_edit';
        $data['foto_data']     = $foto;
        $data['kategori_list'] = $this->kategori->get_all();
        $data['menu_admin']    = $this->menu->getMenuAdmin();
        $this->load->view('back/layouts/main', $data);
    }

    // Update foto
    public function update($id)
    {
        $foto_data = $this->foto->get_by_id($id);
        if (!$foto_data) redirect('c_galeri_foto');

        $kategori_id = $this->input->post('kategori_id', TRUE);
        $deskripsi   = $this->input->post('deskripsi', TRUE);

        $config['upload_path']   = './uploads/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $this->load->library('upload', $config);

        $foto = $foto_data->foto;

        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $upload = $this->upload->data();
                $foto = $upload['file_name'];
                if (file_exists('./uploads/galeri/'.$foto_data->foto)) {
                    unlink('./uploads/galeri/'.$foto_data->foto);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('c_galeri_foto/edit/'.$id);
            }
        }

        $this->foto->update($id, [
            'kategori_id' => $kategori_id,
            'deskripsi'   => $deskripsi,
            'foto'        => $foto
        ]);

        $this->session->set_flashdata('success', 'Foto berhasil diupdate!');
        redirect('c_galeri_foto/detail/'.$kategori_id);
    }

    // Hapus foto
    public function delete($id, $kategori_id)
    {
        $foto = $this->foto->get_by_id($id);
        if ($foto && file_exists('./uploads/galeri/'.$foto->foto)) {
            unlink('./uploads/galeri/'.$foto->foto);
        }
        $this->foto->delete_single($id);
        $this->session->set_flashdata('success', 'Foto berhasil dihapus!');
        redirect('c_galeri_foto/detail/'.$kategori_id);
    }
}
