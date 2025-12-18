<?php

function is_login()
{
    $CI =& get_instance();
    $CI->load->library('ion_auth');

    // Jika belum login, redirect ke login
    if (!$CI->ion_auth->logged_in()) {
        $CI->session->set_flashdata('error', 'Silahkan login terlebih dahulu.');
        redirect('auth/login');
    }

    // TANPA CEK ADMIN
    // semua user yg login boleh masuk
}



function is_master()
{
	$CI =& get_instance();

	if($CI->session->userdata('id') != 1){
		redirect('admin');
	}
	
}

function slugify($text)
{
   // replace non letter or digits by -
   $text = preg_replace('~[^\pL\d]+~u', '-', $text);

   // transliterate
   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

   // remove unwanted characters
   $text = preg_replace('~[^-\w]+~', '', $text);

   // trim
   $text = trim($text, '-');

   // remove duplicate -
   $text = preg_replace('~-+~', '-', $text);

   // lowercase
   $text = strtolower($text);

   if (empty($text)) {
      return 'n-a';
   }

   return $text;  
}
