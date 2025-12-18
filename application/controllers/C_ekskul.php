<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ekskul extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login(); // kalau project kamu memang pake ini
        $this->load->model('Ekskul_model', 'ekskul');
        $this->load->model('menu_model', 'menu'); // biar sidebar gak error
    }

    public function index()
    {
        $data['title']   = 'Daftar Ekstrakurikuler';
        $data['page']    = 'ekskul/v_index';
        $data['ekskul']  = $this->ekskul->get_all();

        $this->load->view('back/layouts/main', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Ekstrakurikuler';
        $data['page']  = 'ekskul/v_tambah';

        $this->load->view('back/layouts/main', $data);
    }

   public function store()
{
    $judul = $this->input->post('judul', true);
    $deskripsi = $this->input->post('deskripsi', true);

    $config['upload_path']   = './uploads/ekskul/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    $foto = null;
    if ($this->upload->do_upload('foto')) {
        $fotoData = $this->upload->data();
        $foto = $fotoData['file_name'];
    }

    $data = [
        'judul'     => $judul,
        'deskripsi' => $deskripsi,
        'foto'      => $foto
    ];

    $insert = $this->ekskul->insert($data);

    $this->session->set_flashdata(
        $insert ? 'success' : 'error',
        $insert ? 'Ekskul berhasil ditambahkan!' : 'Ekskul gagal ditambahkan!'
    );

    redirect('c_ekskul');
}

    public function edit($id)
    {
        $data['title']   = 'Edit Ekstrakurikuler';
        $data['page']    = 'ekskul/v_edit';
        $data['ekskul']  = $this->ekskul->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function update($id)
{
    $judul     = $this->input->post('judul', true);
    $deskripsi = $this->input->post('deskripsi', true);

    // Konfigurasi upload foto
    $config['upload_path']   = './uploads/ekskul/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    $ekskul = $this->ekskul->get_by_id($id);

    // Default pake foto lama
    $foto = $ekskul->foto; 

    // Jika upload foto baru
    if ($this->upload->do_upload('foto')) {
        $fotoData = $this->upload->data();
        $foto = $fotoData['file_name'];

        // Hapus foto lama
        if (!empty($ekskul->foto) && file_exists('./uploads/ekskul/'.$ekskul->foto)) {
            unlink('./uploads/ekskul/'.$ekskul->foto);
        }
    }

    // Data yang akan diupdate
    $data = [
        'judul'     => $judul,
        'deskripsi' => $deskripsi,
        'foto'      => $foto
    ];

    $update = $this->ekskul->update($id, $data);

    $this->session->set_flashdata(
        $update ? 'success' : 'error',
        $update ? 'Ekskul berhasil diupdate!' : 'Ekskul gagal diupdate!'
    );

    redirect('c_ekskul');
}


    public function delete($id)
    {
        $data['title']   = 'Hapus Ekstrakurikuler';
        $data['page']    = 'ekskul/v_hapus';
        $data['ekskul']  = $this->ekskul->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function destroy($id)
    {
        $ekskul = $this->ekskul->get_by_id($id);

        if (!empty($ekskul->foto) && file_exists('./uploads/ekskul/'.$ekskul->foto)) {
            unlink('./uploads/ekskul/'.$ekskul->foto);
        }

        $delete = $this->ekskul->delete($id);

        $this->session->set_flashdata(
            $delete ? 'success' : 'error',
            $delete ? 'Ekskul berhasil dihapus!' : 'Ekskul gagal dihapus!'
        );

        redirect('c_ekskul');
    }
}
