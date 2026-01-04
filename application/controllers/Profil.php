<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

   public function __construct()
{
    parent::__construct();

    $this->load->model('FasilitasKategori_model', 'fasilitas_kategori');
    $this->load->model('FasilitasFoto_model', 'fasilitas_foto');
    $this->load->model('Struktur_model', 'struktur');
    $this->load->model('Guru_model', 'guru');
}


    /* ===============================
       PROFIL UMUM
    =============================== */

    public function sejarah()
    {
        $data['title'] = 'Sejarah';
        $data['page']  = 'profil/sejarah';
        $this->load->view('front/layouts/main', $data);
    }

    public function visimisi()
    {
        $data['title'] = 'Visi & Misi';
        $data['page']  = 'profil/visimisi';
        $this->load->view('front/layouts/main', $data);
    }

    public function struktur()
    {
        $data['title']    = 'Struktur Organisasi';
        $data['page']     = 'profil/struktur';
        $data['struktur'] = $this->struktur->getData();
        $this->load->view('front/layouts/main', $data);
    }

    /* ===============================
       FASILITAS (FRONT)
    =============================== */

    // 📌 LIST KATEGORI FASILITAS
    public function fasilitas()
    {
        $data['title']    = 'Fasilitas';
        $data['page']     = 'fasilitas/v_index';
        $data['kategori'] = $this->fasilitas_kategori->getKategoriWithThumbnail();

        $this->load->view('front/layouts/main', $data);
    }

    // 📌 DETAIL FASILITAS
    public function fasilitas_detail($id)
    {
        $kategori = $this->fasilitas_kategori->getById($id);
        if (!$kategori) {
            show_404();
        }

        $data['title']    = 'Detail Fasilitas';
        $data['page']     = 'fasilitas/v_detail';
        $data['kategori'] = $kategori;
        $data['foto']     = $this->fasilitas_foto->getByKategori($id);

        $this->load->view('front/layouts/main', $data);
    }

    /* ===============================
       GURU
    =============================== */

    public function guru()
    {
        $data['title'] = 'Guru';
        $data['page']  = 'profil/guru';
        $data['guru']  = $this->guru->get_all();

        $this->load->view('front/layouts/main', $data);
    }
}
