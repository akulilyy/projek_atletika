<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getTotalDokter()
    {
        return $this->db->table('dokter')->countAll();
    }

    public function getTotalProduk()
    {
        return $this->db->table('produk')->countAll();
    }

    public function getTotalTreatment()
    {
        return $this->db->table('treatment')->countAll();
    }

    public function getTotalPelanggan()
    {
        return $this->db->table('pelanggan')->countAll();
    }

    public function getTotalSupplier()
    {
        return $this->db->table('supplier')->countAll();
    }
}
