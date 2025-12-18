<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('ekskul')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('ekskul', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('ekskul', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('ekskul', $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('ekskul', ['id' => $id]);
    }
}

