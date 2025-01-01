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
                    <form action="<?= base_url(); ?>jadwaldokter/update" method="post">
                        <div class="row mb-3">
                            <input type="hidden" name="id" value="<?= $jadwaldokter['id_jadwaldokter']; ?>">
                            <div class="col-md-6">
                                <label for="nama" class="form-label" name="nama">Nama</label>
                                <select name="id_dokter" class="form-control" value="<?= $jadwaldokter['nama']; ?>" required>
                                    <?php foreach ($dokter as $dokter) : ?>
                                        <option value="<?= $dokter['id_dokter']; ?>"><?= $dokter['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= $jadwaldokter['tanggal']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jam_praktik" class="form-label">Jam Praktik</label>
                                <input type="time" name="jam_praktik" class="form-control" value="<?= $jadwaldokter['jam_praktik']; ?>" required>
                            </div>
                        </div>
                        <div class="btn d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url() ?>jadwaldokter" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>