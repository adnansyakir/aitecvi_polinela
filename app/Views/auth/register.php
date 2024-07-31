<?= $this->extend('layout/page_register') ?>

<?= $this->section('content') ?>
<div class="row vh-100">
    <div class="col-md-12 d-flex justify-content-center align-items-center">
        <div class="card w-50 border-3 shadow">
            <div class="card-title">
                <div class="mb-0 mt-0 text-center">
                    <a href="index.html"><img src="/assets/img/logo.png" width="200"" alt=" Logo"></a>
                </div>
                <h4 class="mb-0 text-center fw-bold">Form Pendaftaran Akun</h4>
            </div>
            <div class="card-body">
                <!-- Tambahkan kode untuk menampilkan pesan kesalahan -->
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo session('error'); ?>
                    </div>
                <?php endif; ?>

                <form action="/register/save" method="post">
                    <div class="col-md-12">
                        <label class="mb-2" for="">Username</label>
                        <input type="text" name="username" class="form-control mb-3" placeholder="Username">
                    </div>
                    <div class="col-md-12">
                        <label class="mb-2" for="">Email</label>
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email">

                    </div>
                    <div class="col-md-12">
                        <label class="mb-2" for="">Password</label>
                        <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                    </div>
                    <h6>Sudah punya akun? <a href="/login">Login disini</a></h6>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>