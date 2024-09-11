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
                    <a href="/admin/peserta/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/peserta/edit/<?= $peserta->id ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_peserta">Nama Lengkap</label>
                                <input type="text" class="form-control <?= isset($errors['nama_peserta']) ? 'is-invalid ' : ''; ?>" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?= old('nama_peserta', $peserta->nama_peserta) ?>">
                                <?php if (isset($errors['nama_peserta'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_peserta'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_peserta">NIM/NPM</label>
                                <input type="text" class="form-control <?= isset($errors['kode_peserta']) ? 'is-invalid ' : ''; ?>" name="kode_peserta" id="kode_peserta" placeholder="NIP/NIM" value="<?= old('kode_peserta', $peserta->kode_peserta) ?>">
                                <?php if (isset($errors['kode_peserta'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_peserta'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-control <?= isset($errors['status']) ? 'is-invalid ' : ''; ?>" name="status" id="status">
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="1" <?= old('status', $peserta->status) == '1' ? 'selected' : '' ?>>Peserta (Mahasiswa)</option>
                                  
                                </select>
                                <?php if (isset($errors['status'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['status'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="no_wa">No Whatsapp</label>
                                <input type="text" class="form-control <?= isset($errors['no_wa']) ? 'is-invalid ' : ''; ?>" name="no_wa" id="no_wa" placeholder="No Whatsapp" value="<?= old('no_wa', $peserta->no_wa) ?>">
                                <?php if (isset($errors['no_wa'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['no_wa'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="jk">Jenis Kelamin</label>
                                <select class="form-control <?= isset($errors['jk']) ? 'is-invalid ' : ''; ?>" name="jk" id="jk">
                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                    <option value="1" <?= old('jk', $peserta->jk) == '1' ? 'selected' : '' ?>>Perempuan</option>
                                    <option value="2" <?= old('jk', $peserta->jk) == '2' ? 'selected' : '' ?>>Laki-laki</option>
                                </select>
                                <?php if (isset($errors['jk'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['jk'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="ukuran_kaos">Ukuran Kaos</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['ukuran_kaos']) ? 'is-invalid ' : ''; ?>"
                                    name="ukuran_kaos"
                                    id="ukuran_kaos"
                                    placeholder="S,M,L,XL,XXL"
                                    value="<?= old('ukuran_kaos') ?>"
                                    oninput="this.value = this.value.toUpperCase()">
                                <?php if (isset($errors['ukuran_kaos'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['ukuran_kaos'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="prodi">Program Studi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control <?= isset($errors['prodi']) ? 'is-invalid ' : ''; ?>" value="<?= old('prodi', $peserta->prodi) ?>">
                                <?php if (isset($errors['prodi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['prodi'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Perguruan Tinggi</label>
                                <select class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>" name="pt_id" id="nama_pt">
                                    <option value="" disabled>Pilih Perguruan Tinggi</option>
                                    <?php foreach ($pt as $pts) : ?>
                                        <option value="<?= $pts['id'] ?>" <?= old('pt_id', $peserta->pt_id) == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_pt'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['pt_id'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['pt_id'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="foto" class="form-label">Foto Peserta</label>
                                <input class="form-control <?= isset($errors['foto']) ? 'is-invalid ' : ''; ?>" type="file" name="foto" id="foto" />
                                <?php if (isset($peserta->foto)) : ?>
                                    <img src="/uploads/foto/<?= $peserta->foto ?>" alt="Foto Peserta" style="width: 100px; height: auto;">
                                <?php endif; ?>
                                <?php if (isset($errors['foto'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['foto'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="ktm" class="form-label">KTM</label>
                                <input class="form-control <?= isset($errors['ktm']) ? 'is-invalid ' : ''; ?>" type="file" name="ktm" id="ktm" />
                                <?php if (isset($peserta->ktm)) : ?>
                                    <a href="/uploads/ktm/<?= $peserta->ktm ?>" target="_blank">Lihat KTM</a>
                                <?php endif; ?>
                                <?php if (isset($errors['ktm'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['ktm'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="berita_acara" class="form-label">Berita Acara</label>
                                <input class="form-control <?= isset($errors['berita_acara']) ? 'is-invalid ' : ''; ?>" type="file" name="berita_acara" id="berita_acara" />
                                <?php if (isset($peserta->berita_acara)) : ?>
                                    <a href="/uploads/berita_acara/<?= $peserta->berita_acara ?>" target="_blank">Lihat Berita Acara</a>
                                <?php endif; ?>
                                <?php if (isset($errors['berita_acara'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['berita_acara'] ?>
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