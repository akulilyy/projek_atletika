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
                    <form action="<?= base_url(); ?>penjualanproduk/simpan" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kode_pro" class="form-label">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Qty</label>
                                <input type="text" name="qty" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="stok" class="form-label">Harga Satuan</label>
                                <input type="text" name="harga_satuan" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="diskon" class="form-label">Subtotal</label>
                                <input type="text" name="subtotal" class="form-control">
                            </div>
                        </div>
                        <div class="btn d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url() ?>penjualanproduk" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>