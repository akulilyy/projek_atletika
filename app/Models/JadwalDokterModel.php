<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalDokterModel extends Model
{
    protected $table = 'jadwal_dokter'; // Nama tabel di database
    protected $primaryKey = 'id_jadwaldokter'; // Primary key tabel
    protected $allowedFields = ['nama', 'tanggal', 'jam_praktik']; // Kolom yang bisa diisi

    public function data_jadwal($id_jadwal)
    {
        return $this->find($id_jadwal);
    }
    public function update_data($data, $id_jadwal)
    {
        $query = $this->db->table($this->table)->update($data, array('id_jadwaldokter' => $id_jadwal));
        return $query;
    }
    public function delete_data($id_jadwal)
    {
        $query = $this->db->table($this->table)->delete(array('id_jadwaldokter' => $id_jadwal));
        return $query;
    }
}
