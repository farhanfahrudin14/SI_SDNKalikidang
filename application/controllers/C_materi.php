<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_materi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('Materi_model', 'materi');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        // hanya admin & guru
        if (
            !$this->ion_auth->in_group('admin') &&
            !$this->ion_auth->in_group('Guru')
        ) {
            show_error('Akses ditolak', 403);
        }
    }

    public function index()
    {
        $kelas = $this->input->get('kelas');

        $data['materi'] = $kelas
            ? $this->materi->get_by_kelas($kelas)
            : $this->materi->get_all();

        $data['title'] = 'Materi Pelajaran';
        $data['page']  = 'materi/v_index';

        $this->load->view('back/layouts/main', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Materi';
        $data['page']  = 'materi/v_tambah';

        $this->load->view('back/layouts/main', $data);
    }

    public function store()
    {
        $config = [
            'upload_path'   => './uploads/materi/',
            'allowed_types' => 'pdf|jpg|png',
            'max_size'      => 102400 //100mb
        ];

        $this->load->library('upload', $config);

        $file = null;
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data('file_name');
        }

        $this->materi->insert([
            'judul'     => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'kelas'     => $this->input->post('kelas', true),
            'file'      => $file
        ]);

        redirect('c_materi');
    }

    public function edit($id)
    {
        $data['materi'] = $this->materi->get_by_id($id);
        $data['title']  = 'Edit Materi';
        $data['page']   = 'materi/v_edit';

        $this->load->view('back/layouts/main', $data);
    }

    public function update($id)
    {
        $materi = $this->materi->get_by_id($id);
        $file   = $materi->file;

        $config = [
            'upload_path'   => './uploads/materi/',
            'allowed_types' => 'pdf',
            'max_size'      => 20480
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            if ($file && file_exists('./uploads/materi/'.$file)) {
                unlink('./uploads/materi/'.$file);
            }
            $file = $this->upload->data('file_name');
        }

        $this->materi->update($id, [
            'judul'     => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'kelas'     => $this->input->post('kelas', true),
            'file'      => $file
        ]);

        redirect('c_materi');
    }

    public function destroy($id)
{
    if ($this->input->method() !== 'post') {
        show_404();
    }

    $materi = $this->materi->get_by_id($id);
    if (!$materi) {
        show_404();
    }

    if ($materi->file && file_exists('./uploads/materi/'.$materi->file)) {
        unlink('./uploads/materi/'.$materi->file);
    }

    $this->materi->delete($id);
    redirect('c_materi');
}

    public function confirm($id)
{
    $materi = $this->materi->get_by_id($id);

    if (!$materi) {
        show_404();
    }

    $data['materi'] = $materi;
    $data['title']  = 'Konfirmasi Hapus Materi';
    $data['page']   = 'materi/v_hapus';

    $this->load->view('back/layouts/main', $data);
}

}
