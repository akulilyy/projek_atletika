<?= $this->extend('template/template'); ?>

<?= $this->section('isi'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card-header">
                <h1 class="text-center pt-2 pb-5"><?= $title ?></h1>
            </div>
            <div class="row d-flex justify-content-start">
                <div class="col-xl-4 col-md-6 d-flex align-items-center">
                    <div class="card bg-primary text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>DOKTER<br><span><?= $dokterCount ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex align-items-center">
                    <div class="card bg-success text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>PRODUK<br><span><?= $produkCount ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex align-items-center">
                    <div class="card bg-dark text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>TREATMENT<br><span><?= $treatmentCount ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex align-items-center">
                    <div class="card bg-danger text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>PELANGGAN<br><span><?= $pelangganCount ?></span></strong>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex align-items-center">
                    <div class="card bg-secondary text-white mb-4 w-100 custom-card">
                        <div class="card-body text-center">
                            <strong>SUPPLIER<br><span><?= $supplierCount ?></span></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>