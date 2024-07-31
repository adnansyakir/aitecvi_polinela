<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Data Program studi</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/master/prodi/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/master/prodi/edit/<?= $prodi->id ?>">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_prodi">Kode Program Studi</label>
                                <input type="text" class="form-control <?= isset($errors['kode_prodi']) ? 'is-invalid ' : ''; ?>" name="kode_prodi" id="kode_prodi" placeholder="Kode Prodi" value="<?= old('kode_prodi', $prodi->kode_prodi) ?>" disabled>
                                <?php if (isset($errors['kode_prodi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_prodi'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_prodi">Nama Program Studi</label>
                                <input type="text" class="form-control <?= isset($errors['nama_prodi']) ? 'is-invalid ' : ''; ?>" name="nama_prodi" id="nama_prodi" placeholder="Nama Program studi" value="<?= old('nama_prodi', $prodi->nama_prodi) ?>">
                                <?php if (isset($errors['nama_prodi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_prodi'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="pt_id">Nama Perguruan Tinggi</label>
                                <select name="pt_id" id="pt_id" class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>">
                                    <option value="">Pilih..</option>
                                    <?php foreach ($pt as $j) : ?>
                                        <option value="<?= $j['id'] ?>" <?= old('pt_id', $prodi->pt_id) == $j['id'] ? 'selected' : '' ?>><?= $j['nama_pt'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['pt_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['pt_id'] ?>
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
