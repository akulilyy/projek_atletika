<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    protected $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'dokterCount' => $this->dashboardModel->getTotalDokter(),
            'produkCount' => $this->dashboardModel->getTotalProduk(),
            'treatmentCount' => $this->dashboardModel->getTotalTreatment(),
            'pelangganCount' => $this->dashboardModel->getTotalPelanggan(),
            'supplierCount' => $this->dashboardModel->getTotalSupplier(),
        ];

        return view('dashboard/dashboard', $data);
    }
}
