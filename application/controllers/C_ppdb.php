<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ppdb extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ppdb_model', 'ppdb');
        $this->load->model('Menu_model', 'menu'); // biar sidebar jalan
    }

    public function index()
    {
        $data['title'] = 'Data PPDB';
        $data['page']  = 'ppdb/v_index';
        $data['ppdb']  = $this->ppdb->get_all();
        $this->load->view('back/layouts/main', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah PPDB';
        $data['page']  = 'ppdb/v_tambah';
        $this->load->view('back/layouts/main', $data);
    }

    public function store()
    {
        $judul      = $this->input->post('judul', true);
        $deskripsi  = $this->input->post('deskripsi', true);
        $link       = $this->input->post('link', true);

        // Upload foto
        $config['upload_path']   = './uploads/ppdb/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE; // nama file unik

        $this->load->library('upload', $config);

        $foto = null;
        if ($this->upload->do_upload('foto')) {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];
        } elseif(!empty($_FILES['foto']['name'])) {
            // Upload gagal
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('c_ppdb/create');
            return;
        }

        $data = [
            'judul'     => $judul,
            'deskripsi' => $deskripsi,
            'link'      => $link,
            'foto'      => $foto
        ];

        $insert = $this->ppdb->insert($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Data PPDB berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Data PPDB gagal ditambahkan!');
        }

        redirect('c_ppdb');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit PPDB';
        $data['page']  = 'ppdb/v_edit';
        $data['ppdb']  = $this->ppdb->get_by_id($id);
        $this->load->view('back/layouts/main', $data);
    }

    public function update($id)
    {
        $judul      = $this->input->post('judul', true);
        $deskripsi  = $this->input->post('deskripsi', true);
        $link       = $this->input->post('link', true);

        // Upload foto baru
        $config['upload_path']   = './uploads/ppdb/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        $ppdb = $this->ppdb->get_by_id($id);
        $foto = $ppdb->foto;

        if ($this->upload->do_upload('foto')) {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];

            // hapus foto lama
            if (!empty($ppdb->foto) && file_exists('./uploads/ppdb/'.$ppdb->foto)) {
                unlink('./uploads/ppdb/'.$ppdb->foto);
            }
        } elseif(!empty($_FILES['foto']['name'])) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('c_ppdb/edit/'.$id);
            return;
        }

        $data = [
            'judul'     => $judul,
            'deskripsi' => $deskripsi,
            'link'      => $link,
            'foto'      => $foto
        ];

        $update = $this->ppdb->update($id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Data PPDB berhasil diupdate!');
        } else {
            $this->session->set_flashdata('error', 'Data PPDB gagal diupdate!');
        }

        redirect('c_ppdb');
    }

    public function delete($id)
    {
        $data['title'] = 'Hapus PPDB';
        $data['page']  = 'ppdb/v_hapus';
        $data['ppdb']  = $this->ppdb->get_by_id($id);
        $this->load->view('back/layouts/main', $data);
    }

    public function destroy($id)
    {
        $ppdb = $this->ppdb->get_by_id($id);

        if (!empty($ppdb->foto) && file_exists('./uploads/ppdb/'.$ppdb->foto)) {
            unlink('./uploads/ppdb/'.$ppdb->foto);
        }

        $delete = $this->ppdb->delete($id);

        if ($delete) {
            $this->session->set_flashdata('success', 'Data PPDB berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data PPDB gagal dihapus!');
        }

        redirect('c_ppdb');
    }
   public function rekap()
{
    $today = date('Y-m-d');

    // 🔹 jumlah pengunjung PPDB hari ini
    $row = $this->db
        ->get_where('ppdb_views', ['view_date' => $today])
        ->row();

    $pengunjung = $row ? (int) $row->views : 0;

    // 🔹 total pengisi Google Form (sepanjang waktu)
    $pengisi = (int) $this->get_pengisi_form();

    // 🔹 SEMUA pengunjung hari ini dianggap hanya melihat
    $hanya_lihat = $pengunjung;

    $data = [
        'title'       => 'Rekap PPDB',
        'page'        => 'ppdb/v_rekap',
        'pengunjung'  => $pengunjung,
        'pengisi'     => $pengisi,
        // 'hanya_lihat' => $hanya_lihat
    ];

    $this->load->view('back/layouts/main', $data);
}


private function get_pengisi_form()
{
    // GANTI dengan link CSV Google Spreadsheet kamu
    $url = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vTuAMdD72uWF04oeVxrbL26Qkz5XJ2SPrEoEcKeC5X9f1D5-zSWnDmyRN9hkX4SChDG8cqehIR9ZrZt/pub?output=csv';

    $csv = @file_get_contents($url);
    if ($csv === FALSE) {
        return 0;
    }

    $rows = array_map('str_getcsv', explode("\n", $csv));

    // dikurangi header
    return max(count($rows) - 1, 0);
}


}
