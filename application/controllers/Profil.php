<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fasilitas_model', 'fasilitas');
		$this->load->model('struktur_model', 'struktur');
		$this->load->model('Guru_model', 'guru'); // ✅ tambahin model guru
	}
	
	public function sejarah()
	{
		$data['title'] = 'Sejarah';
		$data['page']  = 'profil/sejarah';

		$this->load->view('front/layouts/main', $data);
	}

	public function visimisi()
	{
		$data['title'] = 'Visi & Misi'; // ✅ rapihin judul biar konsisten
		$data['page']  = 'profil/visimisi';

		$this->load->view('front/layouts/main', $data);
	}

	public function struktur()
	{
		$data['title']     = 'Struktur Organisasi';
		$data['page']      = 'profil/struktur';
		$data['struktur']  = $this->struktur->getData();

		$this->load->view('front/layouts/main', $data);
	}

	public function fasilitas()
	{
		$data['title']      = 'Fasilitas';
		$data['page']       = 'profil/fasilitas';
		$data['fasilitas']  = $this->fasilitas->getAllFasility();

		$this->load->view('front/layouts/main', $data);
	}

	public function fasilitas_detail($id)
{
    $data['title'] = 'Detail Fasilitas';
    $data['page']  = 'profil/fasilitas_detail';
    $data['fasilitas'] = $this->fasilitas->getDataById($id);

    if (!$data['fasilitas']) {
        show_404();
    }

    $this->load->view('front/layouts/main', $data);
}


	// ✅ Tambahan untuk halaman Guru
public function guru()
{
    $this->load->model('Guru_model', 'guru_model');

    $data['title'] = 'Guru';
    $data['page']  = 'profil/guru'; // ❗JANGAN ditambah "front/pages/"

    $data['guru']  = $this->guru_model->get_all();

    $this->load->view('front/layouts/main', $data);
}
public function insert($data)
{
    $data['date'] = date('Y-m-d H:i:s');
    $this->db->insert('facilities', $data);
}

public function update($id, $data)
{
    $data['date'] = date('Y-m-d H:i:s');
    $this->db->update('facilities', $data, ['id' => $id]);
    return $this->db->affected_rows();
}

}
