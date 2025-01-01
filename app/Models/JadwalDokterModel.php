<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalDokterModel extends Model
{
    protected $table = 'jadwal_dokter'; // Nama tabel di database
    protected $primaryKey = 'id_jadwaldokter'; // Primary key tabel
    protected $allowedFields = ['tanggal', 'jam_praktik', 'id_dokter']; // Kolom yang bisa diisi

    public function getJadwalWithDokter()
    {
        return $this->db->table('jadwal_dokter')
            ->join('dokter', 'dokter.id_dokter = jadwal_dokter.id_dokter')
            ->select('jadwal_dokter.*, dokter.nama as dokter_name')
            ->get()
            ->getResultArray();
    }


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
