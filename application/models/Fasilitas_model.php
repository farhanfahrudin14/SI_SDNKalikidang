<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {

    // Ambil data berdasarkan ID
    public function getDataById($id)
    {
        return $this->db->get_where('facilities', ['id' => $id])->row();
    }

    // Ambil semua data
    public function getAllFasility()
    {
        return $this->db->get('facilities')->result();
    }

    // Insert fasilitas (pakai kolom 'date' bukan updated_at)
    public function insert($data)
    {
        // Jika admin tidak isi tanggal → set otomatis
        if (empty($data['date'])) {
            $data['date'] = date('Y-m-d');
        }

        return $this->db->insert('facilities', $data);
    }

    // Update fasilitas
    public function update($id, $data)
    {
        // Jika tanggal kosong → set otomatis
        if (empty($data['date'])) {
            $data['date'] = date('Y-m-d');
        }

        return $this->db->update('facilities', $data, ['id' => $id]);
    }

    // Hapus
    public function delete($id)
    {
        return $this->db->delete('facilities', ['id' => $id]);
    }

    // Default values form
    public function getDefaultValues()
    {
        return [
            'name'        => '',
            'description' => '',
            'photo'       => '',
            'date'        => '',   // ← sesuai kolom di database
        ];
    }

    // Hitung total
    public function totalFasilitas()
    {
        return $this->db->count_all('facilities');
    }

    // Upload foto
    public function uploadImage($imageName)
    {
        $config = [
            'upload_path'      => './img/fasilitas',
            'file_name'        => $imageName,
            'allowed_types'    => 'jpg|jpeg|png|JPG|PNG',
            'max_size'         => 3000,
            'overwrite'        => TRUE,
            'file_ext_tolower' => TRUE
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata(
                'image_error',
                'Jenis file tidak diizinkan atau ukuran file terlalu besar.'
            );
            return false;
        }
    }

}
