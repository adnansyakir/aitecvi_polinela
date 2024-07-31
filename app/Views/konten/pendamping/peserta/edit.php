<?= $this->extend('layout/page') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Peserta</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/pendamping/peserta/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/pendamping/peserta/edit<?= $peserta->id ?>">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_peserta">Nama peserta</label>
                                <input type="text" class="form-control <?= isset($errors['nama_peserta']) ? 'is-invalid ' : ''; ?>" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?= isset($errors['nama_peserta']) ? old('nama_peserta') : $peserta->nama_peserta ?>">
                                <?php if (isset($errors['nama_peserta'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_peserta'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_peserta">NIP/NIM</label>
                                <input type="text" class="form-control <?= isset($errors['kode_peserta']) ? 'is-invalid ' : ''; ?>" name="kode_peserta" id="kode_peserta" placeholder="NIP/NIM" value="<?= isset($errors['kode_peserta']) ? old('kode_peserta') : $peserta->kode_peserta ?>">
                                <?php if (isset($errors['kode_peserta'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_peserta'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="no_wa">No Whatsapp</label>
                                <input type="text" class="form-control <?= isset($errors['no_wa']) ? 'is-invalid ' : ''; ?>" name="no_wa" id="no_wa" placeholder="No Whatsapp" value="<?= isset($errors['no_wa']) ? old('no_wa') : $peserta->no_wa ?>">
                                <?php if (isset($errors['no_wa'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['no_wa'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="prodi_id">Program Studi</label>
                                <select name="prodi_id" id="prodi_id" class="form-control <?= isset($errors['prodi_id']) ? 'is-invalid ' : ''; ?>">
                                    <option value="">Pilih..</option>
                                    <?php foreach ($prodi as $j) : ?>
                                        <option value="<?= $j['id'] ?>"><?= $j['nama_prodi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['prodi_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['prodi_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="pt_id">Perguruan Tinggi</label>
                                <select name="pt_id" id="pt_id" class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>">
                                    <option value="">Pilih..</option>
                                    <?php foreach ($pt as $j) : ?>
                                        <option value="<?= $j['id'] ?>"><?= $j['nama_pt'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['pt_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['pt_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kelompok_id">Kelompok</label>
                                <select name="kelompok_id" id="kelompok_id" class="form-control <?= isset($errors['kelompok_id']) ? 'is-invalid ' : ''; ?>">
                                    <option value="">Pilih..</option>
                                    <?php foreach ($kelompok as $j) : ?>
                                        <option value="<?= $j['id'] ?>"><?= $j['nama_kelompok'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['kelompok_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kelompok_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="file_surat_tugas" class="form-label">Surat Tugas</label>
                                <input class="form-control <?= isset($errors['file_surat_tugas']) ? 'is-invalid ' : ''; ?>" type="file" name="file_surat_tugas" id="formFile" value="<?= isset($errors['file_surat_tugas']) ? old('file_surat_tugas') : $peserta->file_surat_tugas ?>" />
                                <?php if (isset($errors['file_surat_tugas'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['file_surat_tugas'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="ktm" class="form-label">KTM</label>
                                <input class="form-control <?= isset($errors['ktm']) ? 'is-invalid ' : ''; ?>" type="file" name="ktm" id="formFile" value="<?= isset($errors['ktm']) ? old('ktm') : $peserta->ktm ?>" />
                                <?php if (isset($errors['ktm'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['ktm'] ?>
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
