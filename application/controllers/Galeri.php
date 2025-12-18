<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model kategori dan foto
        $this->load->model('GaleriKategori_model', 'kategori');
        $this->load->model('GaleriFoto_model', 'foto');
    }

    // Halaman daftar kategori galeri
    public function index()
    {
        $data['title'] = 'Galeri Kegiatan Sekolah';
        
        // Ambil semua kategori
        $kategori_all = $this->kategori->get_all();

        // Untuk setiap kategori ambil 1 foto terbaru
        foreach ($kategori_all as $k) {
            $k->latest_foto = $this->foto->get_latest_by_kategori($k->id);
        }

        $data['kategori'] = $kategori_all;

        // Load view utama
        $data['page'] = 'galeri/galeri_index'; // path ke view front
        $this->load->view('front/layouts/main', $data);
    }

    // Halaman detail kategori, menampilkan semua foto
    public function detail($kategori_id)
    {
        $kategori_data = $this->kategori->get_by_id($kategori_id);
        if (!$kategori_data) show_404();

        // Ambil semua foto untuk kategori ini
        $foto_all = $this->foto->get_by_kategori($kategori_id);

        $data['title']    = $kategori_data->nama_kategori;
        $data['kategori'] = $kategori_data;
        $data['foto']     = $foto_all;

        $data['page'] = 'galeri/galeri_detail'; // path ke view front detail
        $this->load->view('front/layouts/main', $data);
    }
    public function detail_foto($id)
{
    $foto = $this->foto->get_by_id($id);

    if (!$foto) {
        show_404();
    }

    $data['title'] = 'Detail Foto';
    $data['foto']  = $foto;

    // INI YANG PENTING
    $data['page']  = 'galeri/galeri_detail_foto';

    $this->load->view('front/layouts/main', $data);
}



}
