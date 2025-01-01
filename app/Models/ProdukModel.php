<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    //untuk mengijinkan menambah data
    protected $allowedFields = ['kode_produk', 'nama', 'harga_produk', 'stok', 'diskon', 'id_supplier'];

    public function getProdukWithSupplier()
    {
        return $this->db->table('produk')
            ->join('supplier', 'produk.id_supplier = supplier.id_supplier')
            ->select('produk.*, supplier.nama as supplier_name')
            ->get()
            ->getResultArray();
    }

    public function data_pro($id_produk)
    {
        return $this->find($id_produk);
    }
    public function update_data($data, $id_produk)
    {
        $query = $this->db->table($this->table)->update($data, array('id_produk' => $id_produk));
        return $query;
    }
    public function delete_data($id_produk)
    {
        $query = $this->db->table($this->table)->delete(array('id_produk' => $id_produk));
        return $query;
    }
}
