<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kontak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kontak_model', 'kontak');
        $this->load->model('Menu_model', 'menu'); // biar sidebar bisa jalan
    }

    public function index()
    {
        $data['title']  = 'Data Kontak';
        $data['page']   = 'kontak/v_index';
        $data['kontak'] = $this->kontak->get_all();

        $this->load->view('back/layouts/main', $data);
    }

public function create()
{
    // Cek apakah sudah ada data kontak
    $kontak = $this->kontak_model->get_all();

    if (!empty($kontak)) {
        // Kalau sudah ada, kembalikan ke index dengan pesan error
        $this->session->set_flashdata('error', 'Data kontak sudah ada, tidak bisa menambah lagi.');
        redirect('c_kontak');
        return;
    }

    // Kalau belum ada, lanjutkan proses tambah
    $data['title'] = 'Tambah Kontak';
    $this->load->view('admin/layouts/header', $data);
    $this->load->view('admin/kontak/v_tambah', $data);
    $this->load->view('admin/layouts/footer');
}


    public function store()
{
    $alamat  = $this->input->post('alamat', true);
    $telepon = $this->input->post('telepon', true);
    $email   = $this->input->post('email', true);
    $maps    = $this->input->post('maps', true);

    // cek apakah user copy iframe atau hanya link
    if (strpos($maps, '<iframe') !== false) {
        // ambil hanya bagian src dari iframe
        preg_match('/src="([^"]+)"/', $maps, $match);
        $maps = $match[1] ?? '';
    }

    $data = [
        'alamat'  => $alamat,
        'telepon' => $telepon,
        'email'   => $email,
        'maps'    => $maps
    ];

    $insert = $this->kontak->insert($data);

    if ($insert) {
        $this->session->set_flashdata('success', 'Data kontak berhasil ditambahkan!');
    } else {
        $this->session->set_flashdata('error', 'Data kontak gagal ditambahkan!');
    }

    redirect('c_kontak');
}


    public function edit($id)
    {
        $data['title']  = 'Edit Kontak';
        $data['page']   = 'kontak/v_edit';
        $data['kontak'] = $this->kontak->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function update($id)
{
    $alamat  = $this->input->post('alamat', true);
    $telepon = $this->input->post('telepon', true);
    $email   = $this->input->post('email', true);
    $maps    = $this->input->post('maps', true);

    if (strpos($maps, '<iframe') !== false) {
        preg_match('/src="([^"]+)"/', $maps, $match);
        $maps = $match[1] ?? '';
    }

    $data = [
        'alamat'  => $alamat,
        'telepon' => $telepon,
        'email'   => $email,
        'maps'    => $maps
    ];

    $update = $this->kontak->update($id, $data);

    if ($update) {
        $this->session->set_flashdata('success', 'Data kontak berhasil diupdate!');
    } else {
        $this->session->set_flashdata('error', 'Data kontak gagal diupdate!');
    }

    redirect('c_kontak');
}


    public function delete($id)
    {
        $data['title']  = 'Hapus Kontak';
        $data['page']   = 'kontak/v_hapus';
        $data['kontak'] = $this->kontak->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function destroy($id)
    {
        $delete = $this->kontak->delete($id);

        if ($delete) {
            $this->session->set_flashdata('success', 'Data kontak berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data kontak gagal dihapus!');
        }

        redirect('c_kontak');
    }
}
