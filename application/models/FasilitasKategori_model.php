<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasKategori_model extends CI_Model {

    protected $table = 'fasilitas_kategori';

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
        $this->db->join(
            "(SELECT kategori_id, foto FROM fasilitas_foto 
              WHERE id IN (SELECT MAX(id) FROM fasilitas_foto GROUP BY kategori_id)) AS f",
            "f.kategori_id = $this->table.id",
            "left"
        );
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
    public function getKategoriWithThumbnail()
{
    return $this->db
        ->select('k.*, f.foto AS foto_terbaru')
        ->from('fasilitas_kategori k')
        ->join(
            '(SELECT kategori_id, foto 
              FROM fasilitas_foto 
              ORDER BY id DESC) f',
            'f.kategori_id = k.id',
            'left'
        )
        ->group_by('k.id')
        ->get()
        ->result();
}

public function getById($id)
{
    return $this->db
        ->get_where('fasilitas_kategori', ['id' => $id])
        ->row();
}

}
