<?= $this->extend('layout/page') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Finalisasi Administrasi</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/finalisasi/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/finalisasi/add" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="row">
                        <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Perguruan Tinggi</label>
                                <select class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>" name="pt_id" id="nama_pt">
                                    <option value="" disabled selected>Pilih Perguruan Tinggi</option>
                                    <?php foreach ($pt as $pts) : ?>
                                        <option value="<?= $pts['id'] ?>" <?= old('pt_id') == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_pt'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['pt_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['pt_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="surat_tugas" class="form-label">Surat Tugas</label>
                                <input class="form-control <?= isset($errors['surat_tugas']) ? 'is-invalid ' : ''; ?>" type="file" name="surat_tugas" id="formFile" value="<?= old('surat_tugas') ?>" />
                                <?php if (isset($errors['surat_tugas'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['surat_tugas'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="invoice" class="form-label">Invoice Tagihan Kontribusi</label>
                                <input class="form-control <?= isset($errors['invoice']) ? 'is-invalid ' : ''; ?>" type="file" name="invoice" id="formFile" value="<?= old('invoice') ?>" />
                                <?php if (isset($errors['invoice'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['invoice'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="bukti_transfer" class="form-label">Bukti Transfer</label>
                                <input class="form-control <?= isset($errors['bukti_transfer']) ? 'is-invalid ' : ''; ?>" type="file" name="bukti_transfer" id="formFile" value="<?= old('bukti_transfer') ?>" />
                                <?php if (isset($errors['bukti_transfer'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['bukti_transfer'] ?>
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
