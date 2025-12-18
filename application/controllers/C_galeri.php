<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_galeri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Galeri_model', 'galeri');
        $this->load->model('Menu_model', 'menu'); // biar sidebar jalan
    }

    public function index()
    {
        $data['title'] = 'Data Galeri';
        $data['page']  = 'galeri/v_index';
        $data['galeri'] = $this->galeri->get_all();

        $this->load->view('back/layouts/main', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Galeri';
        $data['page']  = 'galeri/v_tambah';
        $this->load->view('back/layouts/main', $data);
    }

    public function store()
    {
        $deskripsi = $this->input->post('deskripsi', true);
        $tanggal_upload = $this->input->post('tanggal_upload', true);

        // Konfigurasi upload foto
        $config['upload_path']   = './uploads/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        $foto = null;
        if ($this->upload->do_upload('foto')) {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];
        }

        $data = [
            'foto'           => $foto,
            'deskripsi'      => $deskripsi,
            'tanggal_upload' => $tanggal_upload
        ];

        $insert = $this->galeri->insert($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Foto galeri berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Foto galeri gagal ditambahkan!');
        }

        redirect('c_galeri');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Galeri';
        $data['page']  = 'galeri/v_edit';
        $data['galeri'] = $this->galeri->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function update($id)
{
    $deskripsi = $this->input->post('deskripsi', true);
    $tanggal   = $this->input->post('tanggal_upload', true);

    $galeri = $this->galeri->get_by_id($id);
    $foto_lama = $galeri->foto;

    $config['upload_path']   = './uploads/galeri/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    $foto = $foto_lama;

    if (!empty($_FILES['foto']['name'])) {  // <- CEK kalau memang ada file baru
        if ($this->upload->do_upload('foto')) {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];

            // hapus foto lama
            if (!empty($foto_lama) && file_exists('./uploads/galeri/'.$foto_lama)) {
                unlink('./uploads/galeri/'.$foto_lama);
            }
        } else {
            echo $this->upload->display_errors();
            die;
        }
    }

    $data = [
        'foto'           => $foto,
        'deskripsi'      => $deskripsi,
        'tanggal_upload' => $tanggal
    ];

    $this->galeri->update($id, $data);

    $this->session->set_flashdata('success', 'Foto galeri berhasil diupdate!');
    redirect('c_galeri');
}


    public function delete($id)
    {
        $data['title'] = 'Hapus Galeri';
        $data['page']  = 'galeri/v_hapus';
        $data['galeri'] = $this->galeri->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function destroy($id)
    {
        $galeri = $this->galeri->get_by_id($id);

        if (!empty($galeri->foto) && file_exists('./uploads/galeri/'.$galeri->foto)) {
            unlink('./uploads/galeri/'.$galeri->foto);
        }

        $delete = $this->galeri->delete($id);

        if ($delete) {
            $this->session->set_flashdata('success', 'Data galeri berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data galeri gagal dihapus!');
        }

        redirect('c_galeri');
    }
    
}
