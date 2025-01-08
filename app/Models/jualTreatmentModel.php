<?php

namespace App\Models;

use CodeIgniter\Model;

class JualTreatmentModel extends Model
{
    protected $table = 'detail_treatment';
    protected $primaryKey = 'id_detail_treatment';
    protected $allowedFields = [
        'tanggal',
        'id_pelanggan',
        'id_treatment',
        'id_dokter',
        'jam_mulai',
        'jam_selesai',
        'harga'
    ];

    public function getDetailTreatment($search = '')
    {
        $this->select('detail_treatment.*, pelanggan.nama as nama_pelanggan, dokter.nama as nama_dokter, treatment.nama as nama_treatment, treatment.harga as harga_treatment');
        $this->join('pelanggan', 'pelanggan.id_pelanggan = detail_treatment.id_pelanggan');
        $this->join('dokter', 'dokter.id_dokter = detail_treatment.id_dokter');
        $this->join('treatment', 'treatment.id_treatment = detail_treatment.id_treatment');
        if ($search) {
            $this->like('pelanggan.nama', $search);
        }
        return $this->findAll();
    }
}
