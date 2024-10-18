<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Tambah Data</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/pendamping/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/pendamping/add">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_pendamping">NIP/NIDN</label>
                                <input type="text" class="form-control <?= isset($errors['kode_pendamping']) ? 'is-invalid ' : ''; ?>" name="kode_pendamping" id="kode_pendamping" placeholder="NIP/NIDN" value="<?= old('kode_pendamping') ?>">
                                <?php if (isset($errors['kode_pendamping'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_pendamping'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pendamping">Nama Lengkap</label>
                                <input type="text" class="form-control <?= isset($errors['nama_pendamping']) ? 'is-invalid ' : ''; ?>" name="nama_pendamping" id="nama_pendamping" placeholder="Nama Lengkap" value="<?= old('nama_pendamping') ?>">
                                <?php if (isset($errors['nama_pendamping'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_pendamping'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
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
                                <label class="form-label" for="status">Status</label>
                                <select class="form-control <?= isset($errors['status']) ? 'is-invalid ' : ''; ?>" name="status" id="status">
                                    <option value="">Pilih Status</option>
                                    <option value="1" <?= old('status') == '1' ? 'selected' : ''; ?>>Dosen (Manager Pendamping)</option>
                                    <option value="2" <?= old('status') == '2' ? 'selected' : ''; ?>>Teknisi / Official</option>
                                    <option value="3" <?= old('status') == '3' ? 'selected' : ''; ?>>Pimpinan (Direktur / Wakil Direktur)</option>
                                </select>
                                <?php if (isset($errors['status'])) : ?>
                                    <div class="invalid-feedback"><?= $errors['status'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="jk">Jenis Kelamin</label>
                                <select class="form-control <?= isset($errors['jk']) ? 'is-invalid ' : ''; ?>" name="jk" id="jk">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="1" <?= old('jk') == '1' ? 'selected' : ''; ?>>Perempuan</option>
                                    <option value="2" <?= old('jk') == '2' ? 'selected' : ''; ?>>Laki-laki</option>
                                </select>
                                <?php if (isset($errors['jk'])) : ?>
                                    <div class="invalid-feedback"><?= $errors['jk'] ?></div>
                                <?php endif; ?>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="uk_kaos">Ukuran Kaos</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['uk_kaos']) ? 'is-invalid ' : ''; ?>"
                                    name="uk_kaos"
                                    id="uk_kaos"
                                    placeholder="S,M,L,XL,XXL"
                                    value="<?= old('uk_kaos') ?>"
                                    oninput="this.value = this.value.toUpperCase()">
                                <?php if (isset($errors['uk_kaos'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['uk_kaos'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="no_wa">No WhatsApp</label>
                                <input type="text" class="form-control <?= isset($errors['no_wa']) ? 'is-invalid ' : ''; ?>" name="no_wa" id="no_wa" placeholder="Nomor WhatsApp" value="<?= old('no_wa') ?>">
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