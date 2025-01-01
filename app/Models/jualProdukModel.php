<?php

namespace App\Models;

use CodeIgniter\Model;

class jualProdukModel extends Model
{
    protected $table = 'detail_penjualan';
    protected $primaryKey = 'id_detailpenjualan';
    protected $allowedFields = ['qty', 'harga_satuan', 'subtotal', 'id_penjualan', 'id_produk'];

    public function getJualProduk()
    {
        // Melakukan join antara detailpenjualan, penjualan, dan produk
        $builder = $this->db->table('detail_penjualan dp');
        $builder->select('dp.id_detailpenjualan, dp.qty, dp.harga_satuan, dp.subtotal, p.tanggal, pr.nama');
        $builder->join('penjualan p', 'dp.id_penjualan = p.id_penjualan');
        $builder->join('produk pr', 'dp.id_produk = pr.id_produk');

        // Jika ada pencarian
        if (!empty($this->request->getVar('search'))) {
            $search = $this->request->getVar('search');
            $builder->like('pr.nama', $search); // Pencarian berdasarkan nama produk
        }

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function data_jupro($id_jupro)
    {
        return $this->find($id_jupro);
    }
    public function update_data($data, $id_jupro)
    {
        $query = $this->db->table($this->table)->update($data, array('id_detailpenjualan' => $id_jupro));
        return $query;
    }
    public function delete_data($id_jupro)
    {
        $query = $this->db->table($this->table)->delete(array('id_detailpenjualan' => $id_jupro));
        return $query;
    }
}
