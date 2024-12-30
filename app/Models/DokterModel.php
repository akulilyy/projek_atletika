<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    //untuk mengijinkan menambah data
    protected $allowedFields = ['kode_dok', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'no_hp', 'alamat'];

    public function data_dok($id_dok)
    {
        return $this->find($id_dok);
    }
    public function update_data($data, $id_dok)
    {
        $query = $this->db->table($this->table)->update($data, array('id_dokter' => $id_dok));
        return $query;
    }
    public function delete_data($id_dok)
    {
        $query = $this->db->table($this->table)->delete(array('id_dokter' => $id_dok));
        return $query;
    }
}
