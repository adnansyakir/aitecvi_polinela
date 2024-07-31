<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Formulir Tambah User</h4>
            </div>
            <div class="col-md-6 text-end">
            <a href="/admin/master/users" class="btn btn-primary btn-sm">Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="/admin/master/users/save" method="post">
                <div class="col-md-12">
                    <label class="mb-2" for="">Username</label>
                    <input type="text" name="username" class="form-control mb-3 <?= isset($validation) && $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Username">
                    <?php if (isset($validation) && $validation->hasError('username')) : ?>
                        <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label class="mb-2" for="">Email</label>
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                    <?php if (isset($validation) && $validation->hasError('email')) : ?>
                        <div class="text-danger"><?= $validation->getError('email') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label class="mb-2" for="">Role</label>
                    <select name="role_id" class="form-control mb-3">
                        <option value="Admin">Pilih Role Akun</option>
                        <?php foreach ($role as $r) : ?>
                            <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('role')) : ?>
                        <div class="text-danger"><?= $validation->getError('role') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label class="mb-2" for="">Password</label>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                    <?php if (isset($validation) && $validation->hasError('password')) : ?>
                        <div class="text-danger"><?= $validation->getError('password') ?></div>
                    <?php endif; ?>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>