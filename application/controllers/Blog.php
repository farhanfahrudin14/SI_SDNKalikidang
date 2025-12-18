<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model', 'berita');
	}

	public function index($page = 1)
	{
		$data['title'] = 'Berita';

		// ambil data berita
		$data['news'] = $this->berita->getAllNews($page);

		// pagination
		$total_rows = $this->berita->countBerita();
		$data['pagination'] = $this->berita->makePagination(
			base_url('blog/index'),
			$total_rows
		);

		$data['page'] = 'berita/blog';
		$this->load->view('front/layouts/main', $data);
	}

	public function baca($seo_title)
	{
		$berita = $this->berita->getBySeo($seo_title);

		if (!$berita) {
			show_404();
		}

		$data['title']  = $berita->title;
		$data['page']   = 'berita/blog-detail';
		$data['berita'] = $berita;

		$this->load->view('front/layouts/main', $data);
	}
}
