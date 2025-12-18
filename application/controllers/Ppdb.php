<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ppdb_model', 'ppdb');
    }

    // ✅ Halaman daftar PPDB
    public function index() {
        $data['title'] = 'PPDB';
        $data['page']  = 'ppdb/v_index';   // view untuk daftar PPDB
        $data['ppdb']  = $this->ppdb->get_all(); // ambil semua data

        $this->load->view('front/layouts/main', $data);
    }
    // ✅ Halaman detail PPDB
public function detail($id)
{
    $data['title'] = 'Detail PPDB';
    $data['ppdb']  = $this->ppdb->get_by_id($id); // ambil satu data berdasarkan ID

    if (!$data['ppdb']) {
        show_404();
    }

    $data['page'] = 'ppdb/v_detail'; // view detail-nya
    $this->load->view('front/layouts/main', $data);
}

}
