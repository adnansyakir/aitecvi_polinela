<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Tambah Data Perguruan Tinggi</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/master/perguruantinggi/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/master/perguruantinggi/add">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_pt">Kode Perguruan Tinggi</label>
                                <input type="text" class="form-control <?= isset($errors['kode_pt']) ? 'is-invalid ' : ''; ?>" name="kode_pt" id="kode_pt" placeholder="Kode Perguruan Tinggi" value="<?= old('kode_pt') ?>">
                                <?php if (isset($errors['kode_pt'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_pt'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Nama Perguruan Tinggi</label>
                                <input type="text" class="form-control <?= isset($errors['nama_pt']) ? 'is-invalid ' : ''; ?>" name="nama_pt" id="nama_pt" placeholder="Nama Perguruan Tinggi" value="<?= old('nama_pt') ?>">
                                <?php if (isset($errors['nama_pt'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_pt'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="email_pt">Email</label>
                                <input type="email" class="form-control <?= isset($errors['email_pt']) ? 'is-invalid ' : ''; ?>" name="email_pt" id="email_pt" placeholder="ex. email@domain.com" value="<?= old('email_pt') ?>">
                                <?php if (isset($errors['email_pt'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['email_pt'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="asal_prov">Asal Provinsi</label>
                                <input type="text" class="form-control <?= isset($errors['asal_prov']) ? 'is-invalid ' : ''; ?>" name="asal_prov" id="asal_prov" placeholder="Asal Provinsi" value="<?= old('asal_prov') ?>">
                                <?php if (isset($errors['asal_prov'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['asal_prov'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="asal_negara">Asal Negara</label>
                                <input type="text" class="form-control <?= isset($errors['asal_negara']) ? 'is-invalid ' : ''; ?>" name="asal_negara" id="asal_negara" placeholder="Asal Negara" value="<?= old('asal_negara') ?>">
                                <?php if (isset($errors['asal_negara'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['asal_negara'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

</script>

<?= $this->endSection() ?>