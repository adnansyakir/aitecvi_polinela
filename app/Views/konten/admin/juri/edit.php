<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Data Juri</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/juri/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/juri/edit/<?= $juri['id'] ?>">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_juri">Kode Juri</label>
                                <input type="text" class="form-control <?= isset($errors['kode_juri']) ? 'is-invalid ' : ''; ?>" name="kode_juri" id="kode_juri" placeholder="Kode Juri" value="<?= old('kode_juri', $juri['kode_juri']) ?>" readonly>
                                <?php if (isset($errors['kode_juri'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_juri'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_juri">Nama Juri</label>
                                <input type="text" class="form-control <?= isset($errors['nama_juri']) ? 'is-invalid ' : ''; ?>" name="nama_juri" id="nama_juri" placeholder="Nama Juri" value="<?= old('nama_juri', $juri['nama_juri']) ?>">
                                <?php if (isset($errors['nama_juri'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_juri'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Perguruan Tinggi</label>
                                <select class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>" name="pt_id" id="nama_pt">
                                    <option value="" disabled selected>Pilih Perguruan Tinggi</option>
                                    <?php foreach ($pt as $pts) : ?>
                                        <option value="<?= $pts['id'] ?>" <?= old('pt_id', $juri['pt_id']) == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_pt'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['pt_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['pt_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_perlombaan">Nama Perlombaan</label>
                                <select class="form-control <?= isset($errors['cabang_perlombaan_id']) ? 'is-invalid ' : ''; ?>" name="cabang_perlombaan_id" id="nama_perlombaan">
                                    <option value="" disabled selected>Pilih Nama Perlombaan</option>
                                    <?php foreach ($cabang_perlombaan as $lomba) : ?>
                                        <option value="<?= $lomba['id'] ?>" <?= old('cabang_perlombaan_id', $juri['cabang_perlombaan_id']) == $lomba['id'] ? 'selected' : '' ?>><?= $lomba['nama_perlombaan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['cabang_perlombaan_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['cabang_perlombaan_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <select class="form-control <?= isset($errors['keterangan']) ? 'is-invalid ' : ''; ?>" name="keterangan" id="keterangan">
                                    <option value="" disabled>Pilih Keterangan</option>
                                    <option value="juri 1" <?= $juri['keterangan'] == 'juri 1' ? 'selected' : '' ?>>Juri 1</option>
                                    <option value="juri 2" <?= $juri['keterangan'] == 'juri 2' ? 'selected' : '' ?>>Juri 2</option>
                                    <option value="juri 3" <?= $juri['keterangan'] == 'juri 3' ? 'selected' : '' ?>>Juri 3</option>
                                </select>
                                <?php if (isset($errors['keterangan'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['keterangan'] ?>
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