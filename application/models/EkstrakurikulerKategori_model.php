<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EkstrakurikulerKategori_model extends CI_Model {

    protected $table = 'ekstrakurikuler_kategori';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // =========================
    // AMBIL SEMUA KATEGORI (ADMIN / UMUM)
    // =========================
    public function get_all()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result();
    }

    // =========================
    // AMBIL SEMUA KATEGORI (FRONT)
    // 👉 dipisah biar aman kalau nanti ada status / filter
    // =========================
    public function get_all_front()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result();
    }

    // =========================
    // AMBIL KATEGORI BY ID
    // =========================
    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }

    // =========================
    // AMBIL KATEGORI DENGAN FOTO TERBARU
    // Untuk v_index agar setiap kategori punya thumbnail
    // =========================
    public function get_all_with_latest_foto()
    {
        $this->db->select("$this->table.*, f.foto AS foto_terbaru");
        $this->db->from($this->table);
        $this->db->join("(SELECT kategori_id, foto FROM ekstrakurikuler_foto 
                          WHERE id IN (SELECT MAX(id) FROM ekstrakurikuler_foto GROUP BY kategori_id)) AS f",
                        "f.kategori_id = $this->table.id",
                        "left");
        $this->db->order_by("$this->table.id", "DESC");
        return $this->db->get()->result();
    }

    // =========================
    // INSERT KATEGORI
    // =========================
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // =========================
    // UPDATE KATEGORI
    // =========================
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    // =========================
    // DELETE KATEGORI
    // =========================
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }
}
