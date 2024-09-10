<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Formulir Update Password User</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/master/users" class="btn btn-primary btn-sm">Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="/admin/master/users/update" method="post">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="col-md-12">
                    <label class="mb-2" for="">Username</label>
                    <input type="text" name="username" class="form-control mb-3 <?= isset($validation) && $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= $user['username'] ?>" readonly>
                    <?php if (isset($validation) && $validation->hasError('username')) : ?>
                        <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label class="mb-2" for="">Email</label>
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="<?= $user['email'] ?>" readonly>
                    <?php if (isset($validation) && $validation->hasError('email')) : ?>
                        <div class="text-danger"><?= $validation->getError('email') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label class="mb-2" for="">Role</label>
                    <select name="role_id" class="form-control mb-3" readonly>
                        <option value="Admin">Pilih Role Akun</option>
                        <?php foreach ($role as $r) : ?>
                            <option value="<?= $r['id'] ?>" <?= $r['id'] == $user['role_id'] ? 'selected' : '' ?>><?= $r['role'] ?></option>
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
                <div class="col-md-12">
                    <label class="mb-2" for="">Perguruan Tinggi</label>
                    <select name="pt_id" class="form-control mb-3 select2">
                        <option value="">Pilih Perguruan Tinggi</option>
                        <?php foreach ($pt as $p) : ?>
                            <option value="<?= $p['id'] ?>" <?= $p['id'] == $user['pt_id'] ? 'selected' : '' ?>><?= $p['nama_pt'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('pt')) : ?>
                        <div class="text-danger"><?= $validation->getError('pt') ?></div>
                    <?php endif; ?>
                </div>

                <br><br></br><br>
                </br>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih Perguruan Tinggi",
            allowClear: true,
            minimumInputLength: 3, // Memulai pencarian setelah 3 huruf
            dropdownAutoWidth: true,
            width: '100%',
            dropdownParent: $('.select2').parent(),
        });
    });
</script>
<?= $this->endSection() ?>