<?= $this->extend('layout/page') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Finalisasi Administrasi</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/pendamping/finalisasi" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/pendamping/finalisasi/edit/<?= $finalisasi->id ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="row">
                        <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Perguruan Tinggi</label>
                                <select class="form-control" name="pt_id" id="nama_pt" readonly>
                                    <?php foreach ($pt as $pts) : ?>
                                        <?php if ($pts['id'] == session()->get('pt_id')) : ?>
                                            <option value="<?= $pts['id'] ?>" selected><?= $pts['nama_pt'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="surat_tugas" class="form-label">Surat Tugas</label>
                                <input class="form-control <?= isset($errors['surat_tugas']) ? 'is-invalid' : ''; ?>" type="file" name="surat_tugas" id="surat_tugas" />
                                <?php if (isset($finalisasi->surat_tugas) && !empty($finalisasi->surat_tugas)) : ?>
                                    <a href="/uploads/surat_tugas/<?= $finalisasi->surat_tugas ?>" target="_blank">Lihat Surat Tugas</a>
                                <?php endif; ?>
                                <?php if (isset($errors['surat_tugas'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['surat_tugas'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="invoice" class="form-label">Invoice Tagihan Kontribusi</label>
                                <input class="form-control <?= isset($errors['invoice']) ? 'is-invalid' : ''; ?>" type="file" name="invoice" id="invoice" />
                                <?php if (isset($finalisasi->invoice) && !empty($finalisasi->invoice)) : ?>
                                    <a href="/uploads/invoice/<?= $finalisasi->invoice ?>" target="_blank">Lihat Invoice Tagihan Kontribusi</a>
                                <?php endif; ?>
                                <?php if (isset($errors['invoice'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['invoice'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="bukti_transfer" class="form-label">Bukti Transfer</label>
                                <input class="form-control <?= isset($errors['bukti_transfer']) ? 'is-invalid' : ''; ?>" type="file" name="bukti_transfer" id="bukti_transfer" />
                                <?php if (isset($finalisasi->bukti_transfer) && !empty($finalisasi->bukti_transfer)) : ?>
                                    <a href="/uploads/bukti_transfer/<?= $finalisasi->bukti_transfer ?>" target="_blank">Lihat Bukti Transfer</a>
                                <?php endif; ?>
                                <?php if (isset($errors['bukti_transfer'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['bukti_transfer'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
