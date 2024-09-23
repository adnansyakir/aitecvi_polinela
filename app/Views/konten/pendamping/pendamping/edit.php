<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Data</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/pendamping/pendamping/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/pendamping/pendamping/edit/<?= $pendamping['id'] ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_pendamping">Kode pendamping</label>
                                <input type="text" class="form-control <?= isset($errors['kode_pendamping']) ? 'is-invalid ' : ''; ?>" name="kode_pendamping" id="kode_pendamping" value="<?= old('kode_pendamping', $pendamping['kode_pendamping']) ?>">
                                <?php if (isset($errors['kode_pendamping'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_pendamping'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pendamping">Nama pendamping</label>
                                <input type="text" class="form-control <?= isset($errors['nama_pendamping']) ? 'is-invalid ' : ''; ?>" name="nama_pendamping" id="nama_pendamping" value="<?= old('nama_pendamping', $pendamping['nama_pendamping']) ?>">
                                <?php if (isset($errors['nama_pendamping'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_pendamping'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
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
                            <!-- Tambahan kolom status, jk, uk_kaos, no_wa, foto -->
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-control <?= isset($errors['status']) ? 'is-invalid ' : ''; ?>" name="status" id="status">
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="1" <?= old('status', $pendamping['status']) == '1' ? 'selected' : '' ?>>Dosen (Manager Pendamping)</option>
                                    <option value="2" <?= old('status', $pendamping['status']) == '2' ? 'selected' : '' ?>>Teknisi / Official</option>
                                    <option value="3" <?= old('status', $pendamping['status']) == '3' ? 'selected' : '' ?>>Pimpinan (Direktur / Wakil Direktur)</option>
                                </select>
                                <?php if (isset($errors['status'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['status'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="jk">Jenis Kelamin</label>
                                <select class="form-control <?= isset($errors['jk']) ? 'is-invalid ' : ''; ?>" name="jk" id="jk">
                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                    <option value="1" <?= old('jk', $pendamping['jk']) == '1' ? 'selected' : '' ?>>Perempuan</option>
                                    <option value="2" <?= old('jk', $pendamping['jk']) == '2' ? 'selected' : '' ?>>Laki-laki</option>
                                </select>
                                <?php if (isset($errors['jk'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['jk'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="uk_kaos">Ukuran Kaos</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['uk_kaos']) ? 'is-invalid ' : ''; ?>"
                                    name="uk_kaos"
                                    id="uk_kaos"
                                    placeholder="S,M,L,XL,XXL"
                                    value="<?= old('uk_kaos', $pendamping['uk_kaos']) ?>"
                                    oninput="this.value = this.value.toUpperCase()">
                                <?php if (isset($errors['uk_kaos'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['uk_kaos'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="no_wa">Nomor WhatsApp</label>
                                <input type="text" class="form-control <?= isset($errors['no_wa']) ? 'is-invalid ' : ''; ?>" name="no_wa" id="no_wa" value="<?= old('no_wa', $pendamping['no_wa']) ?>">
                                <?php if (isset($errors['no_wa'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['no_wa'] ?>
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