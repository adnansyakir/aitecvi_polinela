<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Data pe$pendaftaran</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/pendaftaran/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/pendaftaran/edit/<?= $pendaftaran['id'] ?>">
                        <?= csrf_field() ?>
                        <div class="row">
                            
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Perguruan Tinggi</label>
                                <select class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>" name="pt_id" id="nama_pt">
                                    <option value="" disabled selected>Pilih Perguruan Tinggi</option>
                                    <?php foreach ($pt as $pts) : ?>
                                        <option value="<?= $pts['id'] ?>" <?= old('pt_id', $pendaftaran['pt_id']) == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_pt'] ?></option>
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
                                        <option value="<?= $lomba['id'] ?>" <?= old('cabang_perlombaan_id', $pendaftaran['cabang_perlombaan_id']) == $lomba['id'] ? 'selected' : '' ?>><?= $lomba['nama_perlombaan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['cabang_perlombaan_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['cabang_perlombaan_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_team">Nama Team</label>
                                <input type="text" class="form-control <?= isset($errors['nama_team']) ? 'is-invalid ' : ''; ?>" name="nama_team" id="nama_team" placeholder="Nama pe$pendaftaran" value="<?= old('nama_team', $pendaftaran['nama_team']) ?>">
                                <?php if (isset($errors['nama_team'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_team'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_peserta">Nama Peserta</label>
                                <select class="form-control <?= isset($errors['peserta_id']) ? 'is-invalid ' : ''; ?>" name="peserta_id" id="nama_peserta">
                                    <option value="" disabled selected>Pilih Nama Peserta</option>
                                    <?php foreach ($peserta as $pesr) : ?>
                                        <option value="<?= $pesr['id'] ?>" <?= old('peserta_id', $pendaftaran['peserta_id']) == $pesr['id'] ? 'selected' : '' ?>><?= $pesr['nama_peserta'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['peserta_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['peserta_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_peserta">kode_peserta</label>
                                <input type="text" class="form-control <?= isset($errors['kode_peserta']) ? 'is-invalid ' : ''; ?>" name="kode_peserta" id="kode_peserta" placeholder="Nama pe$pendaftaran" value="<?= old('kode_peserta', $pendaftaran['kode_peserta']) ?>">
                                <?php if (isset($errors['kode_peserta'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_peserta'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <select class="form-control <?= isset($errors['keterangan']) ? 'is-invalid ' : ''; ?>" name="keterangan" id="keterangan">
                                    <option value="" disabled>Pilih Keterangan</option>
                                    <option value="anggota 1" <?= $pendaftaran['keterangan'] == 'anggota 1' ? 'selected' : '' ?>>Anggota 1</option>
                                    <option value="anggota 2" <?= $pendaftaran['keterangan'] == 'anggota 2' ? 'selected' : '' ?>>Anggota 2</option>
                                    <option value="anggota 3" <?= $pendaftaran['keterangan'] == 'anggota 3' ? 'selected' : '' ?>>Anggota 3</option>
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