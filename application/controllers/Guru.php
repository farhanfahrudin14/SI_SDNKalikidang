<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // 🔥 WAJIB load menu
        $this->load->model('Menu_model', 'menu');

        // ion auth
        $this->load->library('ion_auth');

        // hanya guru
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('Guru')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $user_id = $this->ion_auth->user()->row()->id;

        $this->load->model('Materi_model', 'materi');
        $this->load->model('Berita_model', 'berita');

        $data['title']        = 'Dashboard Guru';
        $data['page']         = 'dashboard/index';
        $data['total_berita'] = $this->berita->countBerita();
        $data['total_materi'] = $this->materi->count_all();


        // 🔥 PAKAI LAYOUT ADMIN
        $this->load->view('back/layouts/main', $data);
    }
}
