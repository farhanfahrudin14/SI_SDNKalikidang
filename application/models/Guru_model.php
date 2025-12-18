<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

    protected $table = 'guru'; // nama tabel di database

    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua data guru
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil 1 data guru berdasarkan id
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // Tambah data guru baru
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update data guru
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Hapus data guru
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
