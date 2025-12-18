<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_guru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Menu_model', 'menu'); // biar sidebar bisa jalan
    }

    public function index()
    {
        $data['title'] = 'Data Guru';
        $data['page']  = 'guru/v_index';
        $data['guru']  = $this->guru->get_all();

        $this->load->view('back/layouts/main', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Guru';
        $data['page']  = 'guru/v_tambah';

        $this->load->view('back/layouts/main', $data);
    }

    public function store()
    {
        $nama     = $this->input->post('nama', true);
        $nip      = $this->input->post('nip', true);
        $jabatan  = $this->input->post('jabatan', true);

        // kalau nip kosong, isi dengan "-"
        if (empty($nip)) {
            $nip = "-";
        }

        // Konfigurasi upload foto
        $config['upload_path']   = './uploads/guru/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        $foto = null;
        if ($this->upload->do_upload('foto')) {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];
        }

        $data = [
            'nama'    => $nama,
            'nip'     => $nip,
            'jabatan' => $jabatan,
            'foto'    => $foto
        ];

        $insert = $this->guru->insert($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Data guru berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Data guru gagal ditambahkan!');
        }

        redirect('c_guru');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Guru';
        $data['page']  = 'guru/v_edit';
        $data['guru']  = $this->guru->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function update($id)
    {
        $nama     = $this->input->post('nama', true);
        $nip      = $this->input->post('nip', true);
        $jabatan  = $this->input->post('jabatan', true);

        if (empty($nip)) {
            $nip = "-";
        }

        // Upload foto baru
        $config['upload_path']   = './uploads/guru/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        $guru = $this->guru->get_by_id($id);

        $foto = $guru->foto;
        if ($this->upload->do_upload('foto')) {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];

            // hapus foto lama
            if (!empty($guru->foto) && file_exists('./uploads/guru/'.$guru->foto)) {
                unlink('./uploads/guru/'.$guru->foto);
            }
        }

        $data = [
            'nama'    => $nama,
            'nip'     => $nip,
            'jabatan' => $jabatan,
            'foto'    => $foto
        ];

        $update = $this->guru->update($id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Data guru berhasil diupdate!');
        } else {
            $this->session->set_flashdata('error', 'Data guru gagal diupdate!');
        }

        redirect('c_guru');
    }

    public function delete($id)
    {
        $data['title'] = 'Hapus Guru';
        $data['page']  = 'guru/v_hapus';
        $data['guru']  = $this->guru->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function destroy($id)
    {
        $guru = $this->guru->get_by_id($id);

        // hapus foto kalau ada
        if (!empty($guru->foto) && file_exists('./uploads/guru/'.$guru->foto)) {
            unlink('./uploads/guru/'.$guru->foto);
        }

        $delete = $this->guru->delete($id);

        if ($delete) {
            $this->session->set_flashdata('success', 'Data guru berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data guru gagal dihapus!');
        }

        redirect('c_guru');
    }
}
