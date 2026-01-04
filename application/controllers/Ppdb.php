<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ppdb_model', 'ppdb');
    }

    // ✅ Halaman daftar PPDB (FRONTEND)
public function index()
{
    // 🔹 hitung pengunjung PPDB
    $this->hitung_pengunjung();

    $data['title'] = 'PPDB';
    $data['page']  = 'ppdb/v_index';        // view daftar PPDB
    $data['ppdb']  = $this->ppdb->get_all(); // ambil data PPDB

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

private function hitung_pengunjung()
{
    $today = date('Y-m-d');

    $row = $this->db
        ->get_where('ppdb_views', ['view_date' => $today])
        ->row();

    if ($row) {
        $this->db->set('views', 'views+1', false)
                 ->where('view_date', $today)
                 ->update('ppdb_views');
    } else {
        $this->db->insert('ppdb_views', [
            'view_date' => $today,
            'views' => 1
        ]);
    }
}


}
