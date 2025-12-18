<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GaleriFoto_model extends CI_Model {

    protected $table = 'galeri_foto';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua foto untuk kategori tertentu
public function get_by_kategori($kategori_id)
{
    return $this->db->where('kategori_id', $kategori_id)
                    ->order_by('tanggal_upload', 'DESC')
                    ->get($this->table)
                    ->result();
}

// Ambil 1 foto terbaru
public function get_latest_by_kategori($kategori_id)
{
    return $this->db->where('kategori_id', $kategori_id)
                    ->order_by('tanggal_upload', 'DESC')
                    ->limit(1)
                    ->get($this->table)
                    ->row();
}


    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete_single($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
