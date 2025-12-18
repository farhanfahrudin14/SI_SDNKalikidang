<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    protected $table   = 'posts';
    protected $perPage = 8;

    /* =============================
       GET DATA
    ============================== */

    public function getLastNews()
    {
        return $this->db
            ->where('is_active', 'Y')
            ->order_by('id', 'DESC')
            ->limit(4)
            ->get($this->table)
            ->result();
    }

    public function getAllNews()
{
    return $this->db
        ->select('
            posts.*,
            users.first_name,
            users.last_name,
            groups.name AS role
        ')
        ->from('posts')
        ->join('users', 'users.id = posts.id_user')
        ->join('users_groups', 'users_groups.user_id = users.id')
        ->join('groups', 'groups.id = users_groups.group_id')
        ->order_by('posts.id', 'DESC')
        ->get()
        ->result();
}


    public function getById($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }

    public function getBySeo($seo_title)
{
    return $this->db
        ->select('
            posts.*,
            users.first_name,
            users.last_name,
            groups.name AS role
        ')
        ->from('posts')
        ->join('users', 'users.id = posts.id_user')
        ->join('users_groups', 'users_groups.user_id = users.id')
        ->join('groups', 'groups.id = users_groups.group_id')
        ->where('posts.seo_title', $seo_title)
        ->where('posts.is_active', 'Y')
        ->get()
        ->row();
}


    public function getByUser($user_id)
{
    return $this->db
        ->select('
            posts.*,
            users.first_name,
            users.last_name,
            groups.name AS role
        ')
        ->from('posts')
        ->join('users', 'users.id = posts.id_user')
        ->join('users_groups', 'users_groups.user_id = users.id')
        ->join('groups', 'groups.id = users_groups.group_id')
        ->where('posts.id_user', $user_id)
        ->order_by('posts.id', 'DESC')
        ->get()
        ->result();
}


    /* =============================
       CRUD
    ============================== */

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    /* =============================
       UTIL
    ============================== */

    public function getDefaultValues()
    {
        return [
            'title'     => '',
            'seo_title' => '',
            'content'   => '',
            'photo'     => '',
            'is_active' => 'Y',
            'date'      => date('Y-m-d')
        ];
    }

    public function countBerita()
    {
        return $this->db
            ->where('is_active', 'Y')
            ->count_all_results($this->table);
    }

    public function countByUser($user_id)
    {
        return $this->db
            ->where('id_user', $user_id)
            ->count_all_results($this->table);
    }

    /* =============================
       PAGINATION
    ============================== */

    public function paginate($page)
    {
        $offset = ($page > 1)
            ? ($page * $this->perPage) - $this->perPage
            : 0;

        return $this->db->limit($this->perPage, $offset);
    }
    public function makePagination($base_url, $total_rows)
{
    $this->load->library('pagination');

    $config['base_url']   = $base_url;
    $config['total_rows'] = $total_rows;
    $config['per_page']   = $this->perPage;
    $config['uri_segment'] = 3;

    $this->pagination->initialize($config);

    return $this->pagination->create_links();
}
public function get_all()
{
    $this->db->select('
        berita.*,
        users.username,
        users.first_name,
        users.last_name,
        groups.name AS role
    ');
    $this->db->from('berita');
    $this->db->join('users', 'users.id = berita.id_user');
    $this->db->join('users_groups', 'users_groups.user_id = users.id');
    $this->db->join('groups', 'groups.id = users_groups.group_id');
    $this->db->order_by('berita.id', 'DESC');

    return $this->db->get()->result();
}

// Semua berita
public function count_all()
{
    return $this->db->count_all('posts');
}

// Berita milik user tertentu (Guru)
public function count_by_user($id_user)
{
    return $this->db
                ->where('id_user', $id_user)
                ->count_all_results('posts');
}


}
