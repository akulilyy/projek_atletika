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
                    <form action="<?= base_url(); ?>produk/update" method="post">
                        <div class="row mb-3">
                            <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                            <input type="hidden" name="kode_produk" value="<?= $produk['kode_produk']; ?>">
                            <div class="col-md-6">
                                <label for="kode_produk" class="form-label">Kode</label>
                                <input type="text" name="kode_produk" class="form-control" value="<?= $produk['kode_produk']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" value="<?= $produk['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="supplier" class="form-label">Supplier</label>
                                <select name="id_supplier" class="form-select" required>
                                    <option value="">Pilih Supplier</option>
                                    <?php foreach ($supplier as $supplier): ?>
                                        <option value="<?= $supplier['id_supplier']; ?>" <?= ($produk['id_supplier'] == $supplier['id_supplier']) ? 'selected' : ''; ?>>
                                            <?= $supplier['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" name="stok" class="form-control" value="<?= $produk['stok']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="harga_produk" class="form-label">Harga Produk</label>
                                <input type="text" name="harga_produk" class="form-control" value="<?= $produk['harga_produk']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="diskon" class="form-label">Diskon</label>
                                <input type="text" name="diskon" class="form-control" value="<?= $produk['diskon']; ?>">
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