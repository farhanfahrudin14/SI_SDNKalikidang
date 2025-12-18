<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
{
    parent::__construct();
    is_login();
    // is_master(); <-- hapus ini
    $this->load->model('menu_model', 'menu');
    $this->load->library('ion_auth');
}


	public function index()
	{
		$data['title']		= 'Manajemen User';
		$data['page']		= 'users/index';
		$data['users'] 	= $this->ion_auth->users()->result();

		$this->load->view('back/layouts/main', $data);
	}

	public function delete($id)
{
    // Hanya superadmin yang boleh hapus
    if (!$this->ion_auth->is_admin()) {
        $this->session->set_flashdata('error', 'Anda tidak memiliki izin menghapus user.');
        redirect('user');
    }

    // Superadmin tidak boleh hapus dirinya sendiri
    if ($id == 1) {
        $this->session->set_flashdata('error', 'Superadmin tidak boleh dihapus.');
        redirect('user');
    }

    $this->ion_auth->delete_user($id);
    $this->session->set_flashdata('success', 'User berhasil dihapus.');
    redirect('user');
}


}

/* End of file Controllername.php */
