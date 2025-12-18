<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_prestasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Prestasi_model', 'prestasi');
        $this->load->model('menu_model', 'menu');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title']    = 'Prestasi Siswa';
        $data['page']     = 'prestasi/v_index';
        $data['prestasi'] = $this->prestasi->get_all();

        $this->load->view('back/layouts/main', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Prestasi';
        $data['page']  = 'prestasi/v_tambah';

        $this->load->view('back/layouts/main', $data);
    }

    public function store()
    {
        $config['upload_path']   = './uploads/prestasi/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 3072;
        $config['encrypt_name']  = TRUE;

        $this->upload->initialize($config);

        $foto = null;
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('c_prestasi/create');
            }
        }

        $data = [
            'judul'     => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'foto'      => $foto,
            'aktif'     => $this->input->post('aktif', TRUE),
            'diupload'  => date('Y-m-d H:i:s'),
        ];

        $this->prestasi->insert($data);
        $this->session->set_flashdata('success', 'Prestasi berhasil ditambahkan');
        redirect('c_prestasi');
    }

    public function edit($id)
    {
        $data['title']    = 'Edit Prestasi';
        $data['page']     = 'prestasi/v_edit';
        $data['prestasi'] = $this->prestasi->get_by_id($id);

        $this->load->view('back/layouts/main', $data);
    }

    public function update($id)
    {
        $prestasi = $this->prestasi->get_by_id($id);

        $config['upload_path']   = './uploads/prestasi/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 3072;
        $config['encrypt_name']  = TRUE;

        $this->upload->initialize($config);

        $foto = $prestasi->foto;
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                if ($prestasi->foto && file_exists('./uploads/prestasi/'.$prestasi->foto)) {
                    unlink('./uploads/prestasi/'.$prestasi->foto);
                }
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('c_prestasi/edit/'.$id);
            }
        }

        $data = [
            'judul'     => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'foto'      => $foto,
            'aktif'     => $this->input->post('aktif', TRUE),
        ];

        $this->prestasi->update($id, $data);
        $this->session->set_flashdata('success', 'Prestasi berhasil diperbarui');
        redirect('c_prestasi');
    }

public function hapus($id)
{
    $data['title']    = 'Hapus Prestasi';
    $data['page']     = 'prestasi/v_hapus';
    $data['prestasi'] = $this->prestasi->get_by_id($id);

    if (!$data['prestasi']) {
        show_404();
    }

    $this->load->view('back/layouts/main', $data);
}

}
