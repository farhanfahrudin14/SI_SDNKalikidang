<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model {

    private $table = 'materi_pelajaran';

    // ===================== GET DATA =====================

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function get_by_kelas($kelas)
    {
        return $this->db->get_where($this->table, ['kelas' => $kelas])->result();
    }

    // 👉 materi milik guru tertentu
    public function get_by_user($user_id)
    {
        return $this->db->get_where($this->table, [
            'id_user' => $user_id
        ])->result();
    }

    public function get_by_kelas_user($kelas, $user_id)
    {
        return $this->db
            ->where('kelas', $kelas)
            ->where('id_user', $user_id)
            ->get($this->table)
            ->result();
    }

    // ===================== CRUD =====================

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
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // ===================== TOTAL =====================

    // 👉 TOTAL UNTUK ADMIN
    public function totalMateri()
    {
        return $this->db->count_all($this->table);
    }

    // 👉 TOTAL UNTUK GURU (punya sendiri)
    public function totalMateriByUser($user_id)
{
    return $this->db
        ->where('id_user', $user_id)
        ->count_all_results($this->table);
}

public function count_all()
{
    return $this->db->count_all('materi_pelajaran');
}


    
}
