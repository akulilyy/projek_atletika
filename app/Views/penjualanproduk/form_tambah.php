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
                    <form action="<?= base_url(); ?>/penjualanproduk/simpan" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="id_produk" class="form-label">Nama Produk</label>
                                <select name="id_produk" class="form-select" required>
                                    <option value="">Pilih Produk</option>
                                    <?php foreach ($produk as $p): ?>
                                        <option value="<?= $p['id_produk']; ?>"><?= $p['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                <input type="text" name="harga_satuan" class="form-control" required>
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