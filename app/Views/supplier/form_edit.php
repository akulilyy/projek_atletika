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
                    <form action="<?= base_url(); ?>supplier/update" method="post">
                        <div class="row mb-3">
                            <input type="hidden" name="id_supplier" value="<?= $supplier['id_supplier']; ?>">
                            <div class="col-md-8">
                                <label for="nama" class="form-label">Nama Supplier</label>
                                <input type="text" name="nama" class="form-control" value="<?= $supplier['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="no_hp" class="form-label">No. HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= $supplier['no_hp']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?= $supplier['alamat']; ?>" required>
                            </div>
                        </div>
                        <div class="btn d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url() ?>supplier" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>