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
                    <form action="<?= base_url(); ?>produk/simpan" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kode_pro" class="form-label">Kode</label>
                                <input type="text" name="kode" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Supplier</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="harga_produk" class="form-label">Harga Produk</label>
                                <input type="text" name="harga_produk" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" name="stok" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="diskon" class="form-label">Diskon</label>
                                <input type="text" name="diskon" class="form-control">
                            </div>
                        </div>
                        <div class="btn d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url() ?>produk" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>