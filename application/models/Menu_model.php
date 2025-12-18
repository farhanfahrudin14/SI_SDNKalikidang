<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    /* ================= ADMIN ================= */

    public function getMenuAdmin()
    {
        return $this->db
            ->where('is_active', 'Y')
            ->get('menus')
            ->result();
    }

    public function getSubmenuAdmin($menu_id)
    {
        return $this->db
            ->where('menu_id', $menu_id)
            ->where('is_active', 'Y')
            ->get('submenus')
            ->result();
    }

    /* ================= GURU ================= */

    /**
     * Menu khusus guru
     * contoh: Berita & Materi
     */
    public function getMenuGuru()
{
    return $this->db
        ->where('is_active', 'Y')
        ->where_in('id', [3, 8]) // 3 = Manajemen Media, 8 = Akademik
        ->get('menus')
        ->result();
}


    /**
     * Submenu khusus guru
     */
 public function getSubmenuGuru($menu_id)
{
    return $this->db
        ->where('menu_id', $menu_id)
        ->where('is_active', 'Y')
        ->where_in('sub_title', [
            'Berita',
            'Materi Pelajaran'
        ])
        ->get('submenus')
        ->result();
}


}
