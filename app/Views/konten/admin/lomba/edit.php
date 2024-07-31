<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Data Cabang Lomba</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/master/lomba/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/master/lomba/edit/<?= $cabang_perlombaan->id ?>">
                        <?= csrf_field() ?>

                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_perlombaan">Kode Perguruan Tinggi</label>
                                <input type="text" class="form-control <?= isset($errors['kode_perlombaan']) ? 'is-invalid ' : ''; ?>" name="kode_perlombaan" id="kode_perlombaan" placeholder="Kode Perlombaan" value="<?= isset($errors['kode_perlombaan']) ? old('kode_perlombaan') : $cabang_perlombaan->kode_perlombaan ?>" disabled>
                                <?php if (isset($errors['kode_perlombaan'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_perlombaan'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_perlombaan">Nama Perguruan Tinggi</label>
                                <input type="text" class="form-control <?= isset($errors['nama_perlombaan']) ? 'is-invalid ' : ''; ?>" name="nama_perlombaan" id="nama_perlombaan" placeholder="Nama Perguruan Tinggi" value="<?= isset($errors['nama_perlombaan']) ? old('nama_perlombaan') : $cabang_perlombaan->nama_perlombaan ?>">
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

<script>

</script>

<?= $this->endSection() ?>