<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model
{
    private $table = 'kontak';

    // Ambil semua data kontak
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil satu kontak (untuk front)
    public function get_kontak()
    {
        return $this->db->get($this->table)->row();
    }

    // Ambil data by ID (untuk edit/hapus)
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // Tambah data
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update data
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Hapus data
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
