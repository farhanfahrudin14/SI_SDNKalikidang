<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->model('berita_model', 'berita');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

       // hanya admin, admin_biasa & guru
if (
    !$this->ion_auth->in_group('admin') &&
    !$this->ion_auth->in_group('admin_biasa') &&
    !$this->ion_auth->in_group('Guru')
) {
    show_error('Akses ditolak', 403);
}

    }

    // =====================================================
    // INDEX
    // =====================================================
    public function index()
    {
        $data['title'] = 'Data Berita';
        $data['page']  = 'berita/v_index';

       if ($this->ion_auth->in_group('admin')) {
    // admin lihat semua berita
    $data['berita'] = $this->berita->getAllNews(1);
} else {
    // guru & admin_biasa hanya lihat berita sendiri
    $user_id = $this->ion_auth->get_user_id();
    $data['berita'] = $this->berita->getByUser($user_id);
}


        $this->load->view('back/layouts/main', $data);
    }

    // =====================================================
    // CREATE
    // =====================================================
    public function create()
    {
        $data['title'] = 'Tambah Berita';
        $data['page']  = 'berita/v_tambah';

        $this->load->view('back/layouts/main', $data);
    }

    // =====================================================
    // STORE
    // =====================================================
   public function store()
{
    // =========================
    // VALIDASI FORM
    // =========================
    $this->form_validation->set_rules('title', 'Judul', 'required');
    $this->form_validation->set_rules('content', 'Konten', 'required');

    if ($this->form_validation->run() === FALSE) {
        return $this->create();
    }

    // =========================
    // AMBIL USER LOGIN
    // =========================
   $user = $this->ion_auth->user()->row();

// Ambil grup user untuk menentukan author_name
if ($this->ion_auth->in_group('admin')) {
    $author = 'Admin';
} elseif ($this->ion_auth->in_group('admin_biasa')) {
    $author = 'Admin Biasa';
} elseif ($this->ion_auth->in_group('Guru')) {
    $author = 'Guru';
} else {
    $author = !empty($user->first_name) ? $user->first_name : $user->username;
}



    // =========================
    // CONFIG UPLOAD
    // =========================
    $config = [
        'upload_path'   => './img/berita/',
        'allowed_types' => 'jpg|jpeg|png',
        'max_size'      => 3000,
        'encrypt_name'  => TRUE
    ];

    $this->load->library('upload', $config);

    // =========================
    // WAJIB ADA FOTO
    // =========================
    if (empty($_FILES['photo']['name'])) {
        $this->session->set_flashdata('error', 'Thumbnail wajib diupload');
        redirect('c_berita/create');
    }

    if (!$this->upload->do_upload('photo')) {
        $this->session->set_flashdata(
            'error',
            strip_tags($this->upload->display_errors())
        );
        redirect('c_berita/create');
    }

    $upload   = $this->upload->data();
    $filename = $upload['file_name'];

    // =========================
    // BUAT THUMBNAIL
    // =========================
    $this->load->library('image_lib');

    $thumb_config = [
        'image_library'  => 'gd2',
        'source_image'   => './img/berita/' . $filename,
        'new_image'      => './img/berita/thumbs/' . $filename,
        'maintain_ratio' => TRUE,
        'width'          => 300,
        'height'         => 200,
        'quality'        => '80%'
    ];

    $this->image_lib->initialize($thumb_config);

    if (!$this->image_lib->resize()) {
        $this->session->set_flashdata(
            'error',
            strip_tags($this->image_lib->display_errors())
        );
        redirect('c_berita/create');
    }

    $this->image_lib->clear();

    // =========================
    // SIMPAN KE DATABASE
    // =========================
    $this->load->helper('text');
    $seo_title = url_title($this->input->post('title'), 'dash', TRUE);

    $this->berita->insert([
        'title'       => $this->input->post('title', TRUE),
        'seo_title'   => $seo_title,
        'content'     => $this->input->post('content'),
        'photo'       => $filename,
        'author_name' => $author,
        'id_user'     => $user->id,
        'is_active'   => 'Y',
        'date'        => date('Y-m-d')
    ]);

    $this->session->set_flashdata('success', 'Berita berhasil ditambahkan');
    redirect('c_berita');
}




    // =====================================================
    // EDIT
    // =====================================================
    public function edit($id)
    {
        $berita = $this->berita->getById($id);

        if (!$berita) {
            show_404();
        }

        // GURU hanya boleh edit berita sendiri
        if (
            $this->ion_auth->in_group('Guru') &&
            $berita->id_user != $this->ion_auth->get_user_id()
        ) {
            show_error('Akses ditolak', 403);
        }

        $data['title']  = 'Edit Berita';
        $data['page']   = 'berita/v_edit';
        $data['berita'] = $berita;

        $this->load->view('back/layouts/main', $data);
    }

    // =====================================================
    // UPDATE
    // =====================================================
    public function update($id)
{
    $berita = $this->berita->getById($id);
    if (!$berita) show_404();

    if (
        $this->ion_auth->in_group('Guru') &&
        $berita->id_user != $this->ion_auth->get_user_id()
    ) {
        show_error('Akses ditolak', 403);
    }

    // ======================
    // CONFIG UPLOAD
    // ======================
    $config = [
        'upload_path'   => './img/berita/',
        'allowed_types' => 'jpg|jpeg|png',
        'max_size'      => 3000,
        'encrypt_name'  => TRUE
    ];

    $this->load->library('upload', $config);

    $photo = $berita->photo;

    // ======================
    // UPLOAD FOTO BARU
    // ======================
    if (!empty($_FILES['photo']['name'])) {

        if ($this->upload->do_upload('photo')) {

            $upload = $this->upload->data();
            $photo  = $upload['file_name'];

            // hapus foto lama
            if ($berita->photo) {
                @unlink('./img/berita/'.$berita->photo);
                @unlink('./img/berita/thumbs/'.$berita->photo);
            }

            // ======================
            // BUAT THUMBNAIL
            // ======================
            $this->load->library('image_lib');

            $thumb_conf = [
                'image_library'  => 'gd2',
                'source_image'   => './img/berita/'.$photo,
                'new_image'      => './img/berita/thumbs/'.$photo,
                'maintain_ratio' => TRUE,
                'width'          => 300,
                'height'         => 200
            ];

            $this->image_lib->initialize($thumb_conf);
            $this->image_lib->resize();
            $this->image_lib->clear();

        } else {
            $this->session->set_flashdata(
                'error',
                strip_tags($this->upload->display_errors())
            );
            redirect('c_berita/edit/'.$id);
        }
    }

    // ======================
    // UPDATE DATA
    // ======================
    $this->berita->update($id, [
        'title'     => $this->input->post('title', true),
        'content'   => $this->input->post('content'),
        'photo'     => $photo,
        'is_active' => $this->input->post('is_active')
    ]);

    $this->session->set_flashdata('success', 'Berita berhasil diperbarui');
    redirect('c_berita');
}




    // =====================================================
    // DELETE
    // =====================================================
    public function destroy($id)
{
    $berita = $this->berita->getById($id);
    if (!$berita) show_404();

    $user_id = $this->ion_auth->get_user_id();

    // 🔐 AKSES HAPUS
    if (
        $this->ion_auth->in_group('guru') &&
        $berita->id_user != $user_id
    ) {
        show_error('Anda tidak berhak menghapus berita ini', 403);
    }

    // hapus file
    if ($berita->photo) {
        @unlink('./img/berita/'.$berita->photo);
        @unlink('./img/berita/thumbs/'.$berita->photo);
    }

    $this->berita->delete($id);
    $this->session->set_flashdata('success', 'Berita berhasil dihapus');
    redirect('c_berita');
}

}
