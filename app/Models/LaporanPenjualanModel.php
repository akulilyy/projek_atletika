<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanPenjualanModel extends Model
{
    protected $table = 'laporanpenjualan';
    protected $primaryKey = 'id_laporan';
    //untuk mengijinkan menambah data
    protected $allowedFields = ['tanggal', 'produk/treatment', 'qty', 'harga_satuan', 'subtotal'];

    public function data_lap($id_lap)
    {
        return $this->find($id_lap);
    }
    public function update_data($data, $id_lap)
    {
        $query = $this->db->table($this->table)->update($data, array('id_laporan' => $id_lap));
        return $query;
    }
    public function delete_data($id_lap)
    {
        $query = $this->db->table($this->table)->delete(array('id_laporan' => $id_lap));
        return $query;
    }

    /**
     * Mengambil data gabungan dari tabel detail_produk dan detail_treatment
     * dengan UNION ALL dan diurutkan berdasarkan tanggal.
     */
    public function getCombinedData()
    {
        $query = $this->db->query("
            SELECT 
                'Produk' AS kategori,
                dp.tanggal,
                p.nama AS nama_produk_treatment,
                dp.harga_satuan,
                dp.subtotal
            FROM detail_produk dp
            LEFT JOIN produk p ON p.id_produk = dp.id_produk
            UNION ALL
            SELECT 
                'Treatment' AS kategori,
                dt.tanggal,
                t.nama AS nama_produk_treatment,
                dt.harga AS harga_satuan,
                dt.harga AS subtotal
            FROM detail_treatment dt
            LEFT JOIN treatment t ON t.id_treatment = dt.id_treatment
            ORDER BY tanggal DESC
        ");

        return $query->getResultArray();
    }
}
