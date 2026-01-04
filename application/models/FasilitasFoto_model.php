<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasFoto_model extends CI_Model {

    protected $table = 'fasilitas_foto';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // =========================
    // Ambil semua foto berdasarkan kategori
    // =========================
    public function get_by_kategori($kategori_id)
    {
        return $this->db
            ->where('kategori_id', $kategori_id)
            ->order_by('tanggal_upload', 'DESC')
            ->get($this->table)
            ->result();
    }

    // =========================
    // Ambil 1 foto terbaru per kategori
    // =========================
    public function get_latest_by_kategori($kategori_id)
    {
        return $this->db
            ->where('kategori_id', $kategori_id)
            ->order_by('tanggal_upload', 'DESC')
            ->limit(1)
            ->get($this->table)
            ->row();
    }

    // =========================
    // Ambil foto by ID
    // =========================
    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }

    // =========================
    // Ambil foto terbaru untuk semua kategori
    // =========================
    public function get_latest_for_all_categories()
    {
        $subquery = $this->db
            ->select('MAX(id) AS id')
            ->from($this->table)
            ->group_by('kategori_id')
            ->get_compiled_select();

        return $this->db
            ->select('*')
            ->from($this->table)
            ->where("id IN ($subquery)", null, false)
            ->get()
            ->result();
    }

    // =========================
    // Insert foto
    // =========================
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // =========================
    // Update foto
    // =========================
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    // =========================
    // Hapus satu foto
    // =========================
    public function delete_single($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }
    public function getByKategori($kategori_id)
{
    return $this->db
        ->get_where('fasilitas_foto', ['kategori_id' => $kategori_id])
        ->result();
}

}
