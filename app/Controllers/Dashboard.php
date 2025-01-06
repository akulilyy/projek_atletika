<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\ProdukModel;
use App\Models\TreatmentModel;
use App\Models\PelangganModel;
use App\Models\SupplierModel;

class Dashboard extends BaseController
{

    public function dashboard()
    {
        return view('dashboard/dashboard');
    }

    public function index()
    {
        $produkModel = new ProdukModel();
        $dokterModel = new DokterModel();
        $treatmentModel = new TreatmentModel();
        $pelangganModel = new PelangganModel();
        $supplierModel = new SupplierModel();

        $data = [
            'produkCount' => $produkModel->countAll(),
            'dokterCount' => $dokterModel->countAll(),
            'treatmentCount' => $treatmentModel->countAll(),
            'pelangganCount' => $pelangganModel->countAll(),
            'supplierCount' => $supplierModel->countAll(),
        ];

        $idDokter = session()->get('id_dokter') ?? [];
        $totalDokter = is_array($idDokter) ? count($idDokter) : 0;

        return view('dashboard/dashboard', $data);
    }
}
