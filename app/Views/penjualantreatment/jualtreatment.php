<?= $this->extend('template/template'); ?>
<?= $this->section('isi'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-3 row">
                <div class="card-header">
                    <h4 class="text-center"><?= $title ?></h4>
                </div>
                <div class="card-body">
                    <a href="/penjualantreatment/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="show-entries-container">
                        <div class="d-flex align-items-center mb-3">
                            <label for="entries" class="me-2">Show</label>
                            <select id="entries" class="form-select" style="width: auto; display: inline-block;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="ms-2">entries</span>
                        </div>
                        <div class="search-box d-flex align-items-center d-flex justify-content-end mb-2">
                            <form action="" method="get" class="d-flex">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari..." style="width: 250px;" value="<?= esc($search) ?>">
                                <button type="submit" class="btn btn-primary ms-2">Cari</button>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Treatment</th>
                                <th>Nama Dokter</th>
                                <th>Jam</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_treatment as $index => $detail): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $detail['tanggal'] ?></td>
                                    <td><?= $detail['nama_pelanggan'] ?></td>
                                    <td><?= $detail['nama_treatment'] ?></td>
                                    <td><?= $detail['nama_dokter'] ?></td>
                                    <td><?= $detail['jam_mulai'] . ' - ' . $detail['jam_selesai'] ?></td>
                                    <td>Rp. <?= number_format($detail['harga'], 0, ',', '.') ?></td>
                                    <td class="text-center">
                                        <a href="/penjualantreatment/edit/<?= $detail['id_detail_treatment'] ?>" class="btn btn-success">Edit</a>
                                        <a href="javascript:void(0)" onclick="confirmDelete(<?= $detail['id_detail_treatment'] ?>)" class="btn btn-danger">Hapus</a>
                                        <script>
                                            function confirmDelete(id) {
                                                swal({
                                                    title: "Apakah Anda yakin?",
                                                    text: "Data yang dihapus tidak dapat dikembalikan!",
                                                    icon: "warning",
                                                    buttons: true,
                                                    dangerMode: true,
                                                }).then((willDelete) => {
                                                    if (willDelete) {
                                                        window.location.href = "/penjualantreatment/delete/" + id;
                                                    }
                                                });
                                            }

                                            document.getElementById('treatment').addEventListener('change', function() {
                                                const selectedOption = this.options[this.selectedIndex];
                                                const harga = selectedOption.getAttribute('data-harga');
                                                document.getElementById('harga').value = harga ? `Rp. ${parseInt(harga).toLocaleString('id-ID')}` : '';
                                            });
                                        </script>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>