<?= $this->extend('template/template'); ?>


<?= $this->section('isi'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-3 row d-flex align-items-stretch">
                <div class="card-header">
                    <h4 class="text-center"><?= $title ?></h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url(); ?>penjualanproduk/update" method="post">
                        <div class="row mb-3">
                            <input type="hidden" name="id" value="<?= $jualtreatment['id_penjualantreatment']; ?>">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" value="<?= $jualtreatment['tanggal']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control" value="<?= $jualtreatment['nama_pelangan']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="supplier" class="form-label">Treatment</label>
                                <input type="text" name="treatment" class="form-control" value="<?= $jualtreatment['treatment']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="stok" class="form-label">Dokter</label>
                                <input type="text" name="dokter" class="form-control" value="<?= $jualtreatment['dokter']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="diskon" class="form-label">Jam</label>
                                <input type="text" name="jam" class="form-control" value="<?= $jualtreatment['jam']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="diskon" class="form-label">Total Harga</label>
                                <input type="text" name="total_harga" class="form-control" value="<?= $jualtreatment['total_harga']; ?>">
                            </div>
                        </div>
                        <div class="btn d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url() ?>penjualantreatment" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>