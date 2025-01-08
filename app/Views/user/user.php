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
                    <?php if (session()->getFlashdata('success')) : ?>
                        <script>
                            swal({
                                title: "Berhasil!",
                                text: "<?= session()->getFlashdata('success'); ?>",
                                icon: "success",
                                timer: 2000,
                                buttons: false
                            });
                        </script>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <script>
                            swal({
                                title: "Gagal!",
                                text: "<?= session()->getFlashdata('error'); ?>",
                                icon: "error",
                                timer: 2000,
                                buttons: false
                            });
                        </script>
                    <?php endif; ?>

                    <a href="user/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="show-entries-container">
                        <div class="search-box d-flex align-items-center d-flex justify-content-end mb-2">
                            <form action="" method="get" class="d-flex">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari User" style="width: 250px;" value="<?= esc($search) ?>">
                                <button type="submit" class="btn btn-primary ms-2">Cari</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Bagian</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($user as $key) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $key['nama']; ?></td>
                                    <td><?= $key['username']; ?></td>
                                    <td><?= $key['role']; ?></td>
                                    <td class="text-center justify-content-between align-items-center">
                                        <a href="/user/edit/<?= $key['id_user']; ?>" class="btn btn-success">Edit</a>
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="confirmDelete(<?= $key['id_user']; ?>)">Hapus</a>
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
                                                        window.location.href = "/user/delete/" + id;
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