<?= $this->extend('layout/page') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Tambah Peserta</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/peserta/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/peserta/add" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_peserta">Nama peserta</label>
                                <input type="text" class="form-control <?= isset($errors['nama_peserta']) ? 'is-invalid ' : ''; ?>" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?= old('nama_peserta') ?>">
                                <?php if (isset($errors['nama_peserta'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_peserta'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="kode_peserta">NIP/NIM</label>
                                <input type="text" class="form-control <?= isset($errors['kode_peserta']) ? 'is-invalid ' : ''; ?>" name="kode_peserta" id="kode_peserta" placeholder="NIP/NIM" value="<?= old('kode_peserta') ?>">
                                <?php if (isset($errors['kode_peserta'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['kode_peserta'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                       
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="no_wa">No Whatsapp</label>
                                <input type="text" class="form-control <?= isset($errors['no_wa']) ? 'is-invalid ' : ''; ?>" name="no_wa" id="no_wa" placeholder="No Whatsapp" value="<?= old('no_wa') ?>">
                                <?php if (isset($errors['no_wa'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['no_wa'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                           
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="email">email</label>
                                <input type="text" class="form-control <?= isset($errors['email']) ? 'is-invalid ' : ''; ?>" name="email" id="email" placeholder="email@example.com" value="<?= old('email') ?>">
                                <?php if (isset($errors['email'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="ukuran_kaos">Ukuran Kaos</label>
                                <input type="text" class="form-control <?= isset($errors['ukuran_kaos']) ? 'is-invalid ' : ''; ?>" name="ukuran_kaos" id="ukuran_kaos" placeholder="S,M,L,XL,XXL" value="<?= old('ukuran_kaos') ?>">
                                <?php if (isset($errors['ukuran_kaos'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['ukuran_kaos'] ?>
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
                                <label for="berita_acara" class="form-label">Berita Acara</label>
                                <input class="form-control <?= isset($errors['berita_acara']) ? 'is-invalid ' : ''; ?>" type="file" name="berita_acara" id="formFile" value="<?= old('berita_acara') ?>" />
                                <?php if (isset($errors['berita_acara'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['berita_acara'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="foto" class="form-label">Foto Peserta</label>
                                <input class="form-control <?= isset($errors['foto']) ? 'is-invalid ' : ''; ?>" type="file" name="foto" id="formFile" value="<?= old('foto') ?>" />
                                <?php if (isset($errors['foto'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['foto'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="ktm" class="form-label">KTM</label>
                                <input class="form-control <?= isset($errors['ktm']) ? 'is-invalid ' : ''; ?>" type="file" name="ktm" id="formFile" value="<?= old('ktm') ?>" />
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
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>