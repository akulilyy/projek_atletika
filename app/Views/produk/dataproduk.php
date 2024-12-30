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
                    <a href="produk/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="show-entries-container">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <label for="entries" class="me-2">Show</label>
                                <select id="entries" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="ms-2">entries</span>
                            </div>
                            <div class="search-box d-flex align-items-center">
                                <input type="text" id="search" class="form-control" placeholder="Cari..." style="width: 250px;">
                                <button id="search-button" class="btn btn-primary ms-2">Cari</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Produk</th>
                                <th>Supplier</th>
                                <th>Stok</th>
                                <th>Diskon</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($produk as $key) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $key['kode']; ?></td>
                                    <td><?= $key['nama']; ?></td>
                                    <td><?= $key['supplier']; ?></td>
                                    <td><?= $key['stok']; ?></td>
                                    <td><?= $key['diskon']; ?></td>
                                    <td class="text-center justify-content-between align-items-center">
                                        <a href="/produk/edit/<?= $key['id_supplier']; ?>" class="btn btn-success">Edit</a>
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="confirmDelete(<?= $key['id_supplier']; ?>)">Hapus</a>
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
                                                        window.location.href = "/produk/delete/" + id;
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
<?= $this->endSection(); ?>