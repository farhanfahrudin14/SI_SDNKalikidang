<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GaleriKategori_model extends CI_Model {

    protected $table = 'galeri_kategori';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
{
    $this->db->order_by('id', 'DESC');
    return $this->db->get($this->table)->result(); // pastikan kolom 'deskripsi' ada di tabel
}

public function get_by_id($id)
{
    return $this->db->where('id', $id)
                    ->get($this->table)
                    ->row(); // row->deskripsi nanti bisa diakses di view
}


    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
