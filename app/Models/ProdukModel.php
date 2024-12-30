<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    //untuk mengijinkan menambah data
    protected $allowedFields = ['kode_pro', 'nama', 'harga_produk', 'stok', 'diskon'];

    public function data_pro($id_produk)
    {
        return $this->find($id_produk);
    }
    public function update_data($data, $id_produk)
    {
        $query = $this->db->table($this->table)->update($data, array('id_dokter' => $id_produk));
        return $query;
    }
    public function delete_data($id_produk)
    {
        $query = $this->db->table($this->table)->delete(array('id_dokter' => $id_produk));
        return $query;
    }
}
