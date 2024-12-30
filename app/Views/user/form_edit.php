<?= $this->extend('template/template'); ?>


<?= $this->section('isi'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-3 row d-flex align-items-stretch">
                <div class="card-header">
                    <h4 class="text-center">Edit User</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('user/update/' . $user['id_user']) ?>" method="post">
                        <div class="row mb-3">
                            <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" value="<?= $user['password']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="role">Bagian:</label>
                                <select name="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="pemilik">Pemilik</option>
                                </select>
                            </div>
                        </div>
                        <div class="btn d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url() ?>user" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>