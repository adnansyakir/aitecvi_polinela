<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Sertifikat</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/sertifikat/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/sertifikat/edit/<?= $sertifikat['id'] ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Perguruan Tinggi</label>
                                <select class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>" name="pt_id" id="nama_pt">
                                    <option value="" disabled selected>Pilih Perguruan Tinggi</option>
                                    <?php foreach ($pt as $pts) : ?>
                                        <option value="<?= $pts['id'] ?>" <?= old('pt_id', $sertifikat['pt_id']) == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_pt'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['pt_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['pt_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                       
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="file_sertifikat">Sertifikat</label>
                                <input type="text" class="form-control" id="file_sertifikat" name="file_sertifikat" value="<?= old('file_sertifikat', $sertifikat['file_sertifikat']); ?>" required>
                                <?php if (isset($errors['file_sertifikat'])) : ?>
                                    <div class="text-danger"><?= $errors['file_sertifikat'] ?></div>
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
