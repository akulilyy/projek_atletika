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
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Produk/Treatment</th>
                                    <th>Kategori</th>
                                    <th>Harga Satuan</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($penjualan as $index => $data):
                                    $total += $data['subtotal'];
                                ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= date('Y-m-d', strtotime($data['tanggal'])) ?></td>
                                        <td><?= htmlspecialchars($data['nama_produk_treatment']) ?></td>
                                        <td><?= $data['kategori'] ?></td>
                                        <td>Rp. <?= number_format($data['harga_satuan'], 0, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($data['subtotal'], 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="fw-bold">
                                    <td colspan="5" class="text-end">Total</td>
                                    <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>