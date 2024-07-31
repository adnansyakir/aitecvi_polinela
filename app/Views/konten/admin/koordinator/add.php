<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Tambah Data koordinator</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/koordinator/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/koordinator/add">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_koordinator">Kode koordinator</label>
                                <input type="text" class="form-control <?= isset($errors['kode_koordinator']) ? 'is-invalid ' : ''; ?>" name="kode_koordinator" id="kode_koordinator" placeholder="Kode koordinator" value="<?= old('kode_koordinator') ?>">
                                <?php if (isset($errors['kode_koordinator'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_koordinator'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_koordinator">Nama koordinator</label>
                                <input type="text" class="form-control <?= isset($errors['nama_koordinator']) ? 'is-invalid ' : ''; ?>" name="nama_koordinator" id="nama_koordinator" placeholder="Nama koordinator" value="<?= old('nama_koordinator') ?>">
                                <?php if (isset($errors['nama_koordinator'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_koordinator'] ?>
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

<?= $this->endSection() ?>
