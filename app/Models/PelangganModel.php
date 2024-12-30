<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    //untuk mengijinkan menambah data
    protected $allowedFields = ['nama', 'jenis_kelamin', 'tanggal_lahir', 'no_hp', 'alamat'];

    public function data_pel($id_pel)
    {
        return $this->find($id_pel);
    }
    public function update_data($data, $id_pel)
    {
        $query = $this->db->table($this->table)->update($data, array('id_pelanggan' => $id_pel));
        return $query;
    }
    public function delete_data($id_pel)
    {
        $query = $this->db->table($this->table)->delete(array('id_pelanggan' => $id_pel));
        return $query;
    }
}
