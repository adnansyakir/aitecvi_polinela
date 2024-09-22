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
                                <img src="/templates/assets/images/faces/2.jpg" alt="Pendamping">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"><?= $user['username'] ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <form id="passwordForm" class="form form-horizontal" action="/pendamping/profil/changePassword" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama Manager Kontingen</label>
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
                                        <label>Nama Perguruan Tinggi</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <?= $pt['nama_pt'] ?> <!-- Menampilkan nama PT -->
                                    </div>
                                    <div class="col-md-4">
                                        <label>No WhatsApp</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="Nomor WhatsApp" value="<?= old('no_wa', $user['no_wa']) ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Change Password</label>
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