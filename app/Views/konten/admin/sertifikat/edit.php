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
                                <label class="form-label" for="nama_peserta">Nama Peserta</label>
                                <select class="form-control <?= isset($errors['peserta_id']) ? 'is-invalid ' : ''; ?>" name="peserta_id" id="nama_peserta">
                                    <option value="" disabled selected>Pilih Nama Peserta</option>
                                    <?php foreach ($peserta as $pesr) : ?>
                                        <option value="<?= $pesr['id'] ?>" <?= old('peserta_id', $sertifikat['peserta_id']) == $pesr['id'] ? 'selected' : '' ?>><?= $pesr['nama_peserta'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['peserta_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['peserta_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="kode_peserta">NIM/NIP</label>
                                <input type="text" class="form-control" id="kode_peserta" name="kode_peserta" value="<?= old('kode_peserta', $sertifikat['kode_peserta']); ?>" required>
                                <?php if (isset($errors['kode_peserta'])) : ?>
                                    <div class="text-danger"><?= $errors['kode_peserta'] ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="prodi_id">Program Studi</label>
                                <select name="prodi_id" id="prodi_id" class="form-control <?= isset($errors['prodi_id']) ? 'is-invalid ' : ''; ?>">
                                    <option value="">Pilih..</option>
                                    <?php foreach ($prodi as $j) : ?>
                                        <option value="<?= $j['id'] ?>" <?= old('prodi_id', $sertifikat['prodi_id']) == $j['id'] ? 'selected' : '' ?>><?= $j['nama_prodi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['prodi_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['prodi_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

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
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_perlombaan">Nama Perlombaan</label>
                                <select class="form-control <?= isset($errors['cabang_perlombaan_id']) ? 'is-invalid ' : ''; ?>" name="cabang_perlombaan_id" id="nama_perlombaan">
                                    <option value="" disabled selected>Pilih Nama Perlombaan</option>
                                    <?php foreach ($cabang_perlombaan as $lomba) : ?>
                                        <option value="<?= $lomba['id'] ?>" <?= old('cabang_perlombaan_id', $sertifikat['cabang_perlombaan_id']) == $lomba['id'] ? 'selected' : '' ?>><?= $lomba['nama_perlombaan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['cabang_perlombaan_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['cabang_perlombaan_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="upload" class="form-label">Sertifikat</label>
                                <input class="form-control <?= isset($errors['file_sertifikat']) ? 'is-invalid ' : ''; ?>" type="file" name="file_sertifikat" id="formFile">
                                <?php if (!empty($sertifikat['file_sertifikat'])) : ?>
                                    <div class="mt-2">
                                        <p>Dokumen Sertifikat saat ini:<a href="/uploads/sertifikat/<?= $sertifikat['file_sertifikat']; ?>">File</a></p>
                                        <input type="hidden" name="file_sertifikat_old" value="<?= $sertifikat['file_sertifikat'] ?>">
                                    </div>
                                <?php else : ?>
                                    <div class="mt-2">
                                        <p>Tidak ada file yang diunggah</p>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($errors['file_sertifikat'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['file_sertifikat'] ?>
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
