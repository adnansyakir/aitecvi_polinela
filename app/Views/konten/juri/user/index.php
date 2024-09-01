<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Profil</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="/templates/assets/images/faces/2.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Juri</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <form id="passwordForm" class="form form-horizontal" action="/juri/profil/changePassword" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <?= $user['username'] ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <?= $user['email'] ?>
                                    </div>

                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="Confirm password">
                                            <small>kosongkan jika tidak ingin merubah password</small>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>