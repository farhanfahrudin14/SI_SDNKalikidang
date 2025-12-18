<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kontak_model', 'kontak');
        $this->load->library('email');
    }

    public function index()
    {
        $data['title']  = 'Kontak Kami';
        $data['page']   = 'kontak/index';  
        $data['kontak'] = $this->kontak->get_kontak();

        $this->load->view('front/layouts/main', $data);
    }

    public function kirim_saran()
    {
        $nama    = $this->input->post('nama', true);
        $email   = $this->input->post('email_pengirim', true);
        $pesan   = $this->input->post('pesan', true);
        


        // APP PASSWORD TANPA SPASI!!!
        $app_pass = "tqbpmrpkbzitcag"; 

        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.gmail.com',
            'smtp_user'     => 'umkmfokusku2025@gmail.com',
            'smtp_pass'     => 'awfe mqqp wxsd puxt',
            'smtp_port'     => 465,
            'smtp_timeout'  => 10,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n",
            'crlf'          => "\r\n",
            'wordwrap'      => TRUE
        ];

        $this->email->initialize($config);

        $this->email->from('umkmfokusku2025@gmail.com', 'Form Saran Website');
        $this->email->to('farhanfahrudin1933@gmail.com');
        $this->email->reply_to($email, $nama);

        $this->session->set_flashdata('success', 'Saran berhasil dikirim!');

        $this->email->subject('Saran Baru dari Pengunjung Website');
        $this->email->message("
            <b>Nama:</b> $nama<br>
            <b>Email:</b> $email<br><br>
            <b>Pesan:</b><br>$pesan
        ");

        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Saran berhasil dikirim!');
        } else {

            // DEBUG ERROR
            echo $this->email->print_debugger();
            exit;
        }

        redirect('kontak');
    }
    
}
