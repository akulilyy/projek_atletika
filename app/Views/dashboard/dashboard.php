<?= $this->extend('template/template'); ?>

<?= $this->section('isi'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card-header">
                <h4 class="text-center"></h4>
            </div>
            <div class="row d-flex align-items-stretch">
                <div class="col-xl-2 col-md-6 d-flex align-items-center">
                    <div class="card bg-primary text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>DOKTER <br><span><?= isset($dokterCount) ? $dokterCount : 4 ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 d-flex align-items-center">
                    <div class="card bg-success text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>PRODUK<br><span><?= isset($produkCount) ? $produkCount : 5 ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 d-flex align-items-center">
                    <div class="card bg-dark text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>TREATMENT<br><span><?= isset($treatmentCount) ? $treatmentCount : 3 ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 d-flex align-items-center">
                    <div class="card bg-danger text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>PELANGGAN<br><span><?= isset($pelangganCount) ? $pelangganCount : 2 ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 d-flex align-items-center">
                    <div class="card bg-secondary text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>SUPPLIER<br><span><?= isset($supplierCount) ? $supplierCount : 2 ?></span></strong>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex  justify-content-between align-items-center">
                            <div><i class="fas fa-chart-area me-1"></i>Grafik Penjualan Produk</div>
                            <select id="salesFilter" class="form-select w-auto">
                                <option value="bulan">Per Bulan</option>
                                <option value="tahun">Per Tahun</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <canvas id="" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-chart-area me-1"></i>Grafik Penjualan Treatment</div>
                            <select id="salesFilter" class="form-select w-auto">
                                <option value="bulan">Per Bulan</option>
                                <option value="tahun">Per Tahun</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <canvas id="" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>