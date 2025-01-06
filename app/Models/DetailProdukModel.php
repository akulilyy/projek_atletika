<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailProdukModel extends Model
{
    protected $table      = 'detail_produk'; // Nama tabel
    protected $primaryKey = 'id_detail_produk'; // Nama primary key

    // Kolom yang diizinkan untuk diakses
    protected $allowedFields = ['tanggal', 'id_produk', 'jumlah', 'harga_satuan'];

    // Menambahkan konfigurasi untuk relasi
    protected $returnType     = 'array'; // Jenis data yang dikembalikan
    protected $useTimestamps  = false; // Karena tabel sudah menggunakan timestamp default di DB

    /**
     * Mengambil data detail produk dengan nama produk yang digabungkan
     * dengan tabel produk menggunakan join
     */
    public function getDetailProduk()
    {
        // Join dengan tabel produk untuk mengambil nama produk yang baru (nama)
        return $this->select('detail_produk.*, produk.nama')
            ->join('produk', 'produk.id_produk = detail_produk.id_produk', 'left')
            ->findAll();
    }

    public function getProduk()
    {
        return $this->db->table('produk')->get()->getResultArray();
    }
}
