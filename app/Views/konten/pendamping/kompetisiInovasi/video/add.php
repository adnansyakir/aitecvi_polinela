<?= $this->extend('layout/page') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Tambah Data Video</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/pendamping/pendaftaran/kompetisiInovasi/video" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/pendamping/pendaftaran/kompetisiInovasi/video/add">
                        <?= csrf_field() ?>
                        <div class="row">

                            <!-- Dropdown Nama Perguruan Tinggi -->
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

                            <!-- Dropdown Nama Perlombaan -->
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_perlombaan">Nama Perlombaan</label>
                                <select class="form-control <?= isset($errors['cabang_perlombaan_id']) ? 'is-invalid ' : ''; ?>" name="cabang_perlombaan_id" id="nama_perlombaan">
                                    <option value="" disabled selected>Pilih Nama Perlombaan</option>
                                    <?php foreach ($cabang_perlombaan as $lomba) : ?>
                                        <option value="<?= $lomba['id'] ?>" <?= old('cabang_perlombaan_id') == $lomba['id'] ? 'selected' : '' ?>><?= $lomba['nama_perlombaan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['cabang_perlombaan_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['cabang_perlombaan_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Dropdown Nama Team dari Proposal -->
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_team">Nama Team</label>
                                <select class="form-control <?= isset($errors['nama_team']) ? 'is-invalid ' : ''; ?>" name="nama_team" id="nama_team">
                                    <option value="" disabled selected>Pilih Nama Team</option>
                                    <?php foreach ($proposal as $team) : ?>
                                        <option value="<?= $team['nama_team'] ?>" <?= old('nama_team') == $team['nama_team'] ? 'selected' : '' ?>><?= $team['nama_team'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['nama_team'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_team'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Input URL Video -->
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="video">Video</label>
                                <input type="text" class="form-control <?= isset($errors['video']) ? 'is-invalid ' : ''; ?>" name="video" id="video" placeholder="Masukkan URL Video" value="<?= old('video') ?>">
                                <?php if (isset($errors['video'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['video'] ?>
                                    </div>
                                <?php endif; ?>
                                <p style="font-weight: bold;">Masukkan link video dari drive.</p>
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
