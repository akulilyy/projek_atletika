<?php

namespace App\Controllers;

use App\Models\PenjualanGabunganModel;

class PenjualanGabungan extends BaseController
{
    protected $penjualanGabunganModel;

    public function __construct()
    {
        $this->penjualanGabunganModel = new PenjualanGabunganModel();
    }

    /**
     * Menampilkan laporan gabungan penjualan produk dan treatment.
     */
    public function index()
    {
        $data = [
            'title' => 'Laporan Penjualan Gabungan',
            'penjualan' => $this->penjualanGabunganModel->getCombinedData(),
        ];

        return view('laporanpenjualan/laporanpenjualan', $data);
    }
}
