<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Daftar Peserta Kontes Vokasi Luring (Tim)</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/pendamping/pendaftaran/kontesVokasi/luring/tim" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col- lg-12 p-5">
                    <form method="POST" action="/pendamping/pendaftaran/kontesVokasi/luring/tim/add">
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
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_team">Nama Tim</label>
                                <input type="text" class="form-control <?= isset($errors['nama_team']) ? 'is-invalid ' : ''; ?>" name="nama_team" id="nama_team" placeholder="Nama Tim" value="<?= old('nama_team') ?>">
                                <?php if (isset($errors['nama_team'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_team'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                           

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_peserta">Nama Peserta</label>
                                <div id="peserta-wrapper">
                                    <div class="input-group mb-2">
                                        <select class="form-control" name="peserta_id[]">
                                            <option value="" disabled selected>Pilih Peserta</option>
                                            <?php foreach ($peserta as $pesr) : ?>
                                                <option value="<?= $pesr['id'] ?>"><?= $pesr['nama_peserta'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button type="button" class="btn btn-outline-danger remove-peserta">Hapus</button>
                                    </div>
                                
                                </div>
                                <p style="font-weight: bold;">Tambahkan seluruh peserta dalam Tim.</p>
                                <button type="button" class="btn btn-outline-primary add-peserta">Tambah Peserta</button>
                                
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

<script>
    $(document).ready(function() {
        var pesertaCount = 1;

        $('.add-peserta').on('click', function() {
            pesertaCount++;
            $('#peserta-wrapper').append(`
            <div class="input-group mb-2">
                <select class="form-control" name="peserta_id[]">
                    <option value="" disabled selected>Pilih Peserta</option>
                    <?php foreach ($pesertaOptions as $pesr) : ?>
                        <option value="<?= $pesr['id'] ?>"><?= $pesr['nama_peserta'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="button" class="btn btn-outline-danger remove-peserta">Hapus</button>
            </div>
        `);
        });

        $(document).on('click', '.remove-peserta', function() {
            $(this).parent().remove();
        });
    });
</script>



<?= $this->endSection() ?>