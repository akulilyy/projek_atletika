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
}
