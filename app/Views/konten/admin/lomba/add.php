<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Tambah Data Cabang Perlombaan</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/master/lomba/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/master/lomba/add">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_perlombaan">Kode Perlombaan</label>
                                <input type="text" class="form-control <?= isset($errors['kode_perlombaan']) ? 'is-invalid ' : ''; ?>" name="kode_perlombaan" id="kode_perlombaan" placeholder="Kode Perlombaan" value="<?= old('kode_perlombaan') ?>">
                                <?php if (isset($errors['kode_perlombaan'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_perlombaan'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_perlombaan">Nama Perlombaan</label>
                                <input type="text" class="form-control <?= isset($errors['nama_perlombaan']) ? 'is-invalid ' : ''; ?>" name="nama_perlombaan" id="nama_perlombaan" placeholder="Nama Perlombaan" value="<?= old('nama_perlombaan') ?>">
                                <?php if (isset($errors['nama_perlombaan'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_perlombaan'] ?>
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

<scricabang_lomba>

</scricabang_lomba>

<?= $this->endSection() ?>