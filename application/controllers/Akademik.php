<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Materi_model', 'materi');
        $this->load->model('EkstrakurikulerKategori_model', 'ekskul'); // ✅ FIX
        $this->load->model('Prestasi_model', 'prestasi');
    }

    // =======================
    // MATERI
    // =======================
    public function materi() {
        $data['title'] = 'Pilih Kelas';
        $data['page']  = 'materi/v_kelas';

        $this->load->view('front/layouts/main', $data);
    }

    public function materi_kelas($kelas) {
        $data['title']  = "Materi Kelas $kelas";
        $data['page']   = 'materi/v_index';
        $data['kelas']  = $kelas;
        $data['materi'] = $this->materi->get_by_kelas($kelas);

        $this->load->view('front/layouts/main', $data);
    }

    // =======================
// EKSTRAKURIKULER
// =======================
public function ekskul() {
    $this->load->model('EkstrakurikulerKategori_model', 'kategori_model');

    $data['title']    = 'Ekstrakurikuler';
    $data['page']     = 'ekstrakurikuler/v_index';
    $data['kategori'] = $this->kategori_model->get_all_with_latest_foto(); // <-- pakai method baru

    $this->load->view('front/layouts/main', $data);
}


public function ekskul_detail($id) {
    $this->load->model('EkstrakurikulerKategori_model', 'kategori_model');
    $this->load->model('EkstrakurikulerFoto_model', 'foto_model');

    $kategori = $this->kategori_model->get_by_id($id);
    if (!$kategori) show_404();

    $data['title']    = $kategori->nama_kategori;
    $data['page']     = 'ekstrakurikuler/v_detail';
    $data['kategori'] = $kategori; // untuk v_detail
    $data['foto']     = $this->foto_model->get_by_kategori($id); // semua foto kategori

    $this->load->view('front/layouts/main', $data);
}


    // =======================
    // PRESTASI
    // =======================
    public function prestasi() {
        $data['title']    = 'Prestasi';
        $data['page']     = 'prestasi/v_index';
        $data['prestasi'] = $this->prestasi->get_all();

        $this->load->view('front/layouts/main', $data);
    }

    public function prestasi_detail($id) {
        $prestasi = $this->prestasi->get_by_id($id);

        if (!$prestasi) {
            show_404();
        }

        $data['title'] = $prestasi->judul;
        $data['page']  = 'prestasi/v_detail';
        $data['prestasi'] = $prestasi;

        $this->load->view('front/layouts/main', $data);
    }
}
