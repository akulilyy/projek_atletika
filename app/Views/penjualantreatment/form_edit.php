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
                    <form action="<?= base_url(); ?>penjualantreatment/update/<?= $detail['id_detail_treatment']; ?>" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= $detail['tanggal']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="id_pelanggan" class="form-label">Nama Pelanggan</label>
                                <select name="id_pelanggan" class="form-select" required>
                                    <?php foreach ($pelanggan as $p): ?>
                                        <option value="<?= $p['id_pelanggan']; ?>" <?= ($detail['id_pelanggan'] == $p['id_pelanggan']) ? 'selected' : ''; ?>>
                                            <?= $p['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="id_treatment" class="form-label">Nama Treatment</label>
                                <select name="id_treatment" id="treatment" class="form-select" required>
                                    <?php foreach ($treatment as $t): ?>
                                        <option value="<?= $t['id_treatment']; ?>" <?= ($detail['id_treatment'] == $t['id_treatment']) ? 'selected' : ''; ?>>
                                            <?= $t['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="id_dokter" class="form-label">Nama Dokter</label>
                                <select name="id_dokter" class="form-select" required>
                                    <?php foreach ($dokter as $d): ?>
                                        <option value="<?= $d['id_dokter']; ?>" <?= ($detail['id_dokter'] == $d['id_dokter']) ? 'selected' : ''; ?>>
                                            <?= $d['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control" value="<?= $detail['jam_mulai']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                <input type="time" name="jam_selesai" class="form-control" value="<?= $detail['jam_selesai']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control" value="<?= $detail['harga']; ?>" required>
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

<script>
    document.getElementById('treatment').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga');
        document.getElementById('harga').value = harga ? `Rp. ${parseInt(harga).toLocaleString('id-ID')}` : '';
    });
</script>

<?= $this->endSection(); ?>