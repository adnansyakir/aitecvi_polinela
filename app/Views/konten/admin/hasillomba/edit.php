<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Hasil Lomba</h4>
    </div>
    <div class="col-lg-12 text-end">
        <a href="/juri/hasillomba/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
    </div>
    <div class="card-body">
        <?= \Config\Services::validation()->listErrors(); ?>
        <form action="/admin/hasillomba/update/<?= $hasillomba['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="nama_team">Nama Team</label>
                    <select class="form-control <?= isset($errors['pendaftaran_id']) ? 'is-invalid ' : ''; ?>" name="pendaftaran_id" id="nama_team">
                        <option value="" disabled>Pilih Nama Team</option>
                        <?php foreach ($pendaftaran as $pts) : ?>
                            <option value="<?= $pts['id'] ?>" <?= old('pendaftaran_id', $hasillomba['pendaftaran_id']) == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_team'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['pendaftaran_id'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['pendaftaran_id'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="nama_perlombaan">Kategori Lomba</label>
                    <select class="form-control <?= isset($errors['cabang_perlombaan_id']) ? 'is-invalid ' : ''; ?>" name="cabang_perlombaan_id" id="nama_perlombaan">
                        <option value="" disabled>Pilih Kategori Perlombaan</option>
                        <?php foreach ($cabang_perlombaan as $pts) : ?>
                            <option value="<?= $pts['id'] ?>" <?= old('cabang_perlombaan_id', $hasillomba['cabang_perlombaan_id']) == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_perlombaan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['cabang_perlombaan_id'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['cabang_perlombaan_id'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="nilai_juri1">Nilai Juri 1</label>
                    <input type="text" name="nilai_juri1" id="nilai_juri1" class="form-control" value="<?= old('nilai_juri1', $hasillomba['nilai_juri1']); ?>" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="nilai_juri2">Nilai Juri 2</label>
                    <input type="text" name="nilai_juri2" id="nilai_juri2" class="form-control" value="<?= old('nilai_juri2', $hasillomba['nilai_juri2']); ?>" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="nilai_juri3">Nilai Juri 3</label>
                    <input type="text" name="nilai_juri3" id="nilai_juri3" class="form-control" value="<?= old('nilai_juri3', $hasillomba['nilai_juri3']); ?>" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="catatan_juri1">Catatan Juri 1</label>
                    <input type="file" name="catatan_juri1" id="catatan_juri1" class="form-control">
                    <?php if ($hasillomba['catatan_juri1']): ?>
                        <small>File yang ada: <a href="<?= base_url('/uploads/catatan/' . $hasillomba['catatan_juri1']); ?>" target="_blank">file</a></small>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="catatan_juri2">Catatan Juri 2</label>
                    <input type="file" name="catatan_juri2" id="catatan_juri2" class="form-control">
                    <?php if ($hasillomba['catatan_juri2']): ?>
                        <small>File yang ada: <a href="<?= base_url('/uploads/catatan/' . $hasillomba['catatan_juri2']); ?>" target="_blank">file</a></small>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="catatan_juri3">Catatan Juri 3</label>
                    <input type="file" name="catatan_juri3" id="catatan_juri3" class="form-control">
                    <?php if ($hasillomba['catatan_juri3']): ?>
                        <small>File yang ada: <a href="<?= base_url('/uploads/catatan/' . $hasillomba['catatan_juri3']); ?>" target="_blank">file</a></small>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 mb-3">
                    <label class="form-label" for="keterangan">Keterangan</label>
                    <select class="form-control <?= isset($errors['keterangan']) ? 'is-invalid ' : ''; ?>" name="keterangan" id="keterangan">
                        <option value="" disabled>Pilih Keterangan</option>
                        <option value="Juara 1" <?= old('keterangan', $hasillomba['keterangan']) == 'Juara 1' ? 'selected' : '' ?>>Juara 1</option>
                        <option value="Juara 2" <?= old('keterangan', $hasillomba['keterangan']) == 'Juara 2' ? 'selected' : '' ?>>Juara 2</option>
                        <option value="Juara 3" <?= old('keterangan', $hasillomba['keterangan']) == 'Juara 3' ? 'selected' : '' ?>>Juara 3</option>
                    </select>
                    <?php if (isset($errors['keterangan'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['keterangan'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
