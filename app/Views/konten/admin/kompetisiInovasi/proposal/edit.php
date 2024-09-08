<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-header">Edit Data Proposal</h5>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/admin/pendaftaran/kompetisiInovasi/proposal" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
                </div>
                <div class="col-lg-12 p-5">
                    <form method="POST" action="/admin/pendaftaran/kompetisiInovasi/proposal/update/<?= $proposal['id'] ?>">
                        <?= csrf_field() ?>
                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_pt">Perguruan Tinggi</label>
                                <select class="form-control <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>" name="pt_id" id="nama_pt">
                                    <option value="" disabled>Pilih Perguruan Tinggi</option>
                                    <?php foreach ($pt as $pts) : ?>
                                        <option value="<?= $pts['id'] ?>" <?= $proposal['pt_id'] == $pts['id'] ? 'selected' : '' ?>><?= $pts['nama_pt'] ?></option>
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
                                    <option value="" disabled>Pilih Nama Perlombaan</option>
                                    <?php foreach ($cabang_perlombaan as $lomba) : ?>
                                        <option value="<?= $lomba['id'] ?>" <?= $proposal['cabang_perlombaan_id'] == $lomba['id'] ? 'selected' : '' ?>><?= $lomba['nama_perlombaan'] ?></option>
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
                                <input type="text" class="form-control <?= isset($errors['nama_team']) ? 'is-invalid ' : ''; ?>" name="nama_team" id="nama_team" value="<?= $proposal['nama_team'] ?>">
                                <?php if (isset($errors['nama_team'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_team'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="proposal">Proposal</label>
                                <input type="text" class="form-control <?= isset($errors['proposal']) ? 'is-invalid ' : ''; ?>" name="proposal" id="proposal" value="<?= $proposal['proposal'] ?>">
                                <?php if (isset($errors['proposal'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['proposal'] ?>
                                    </div>
                                <?php endif; ?>
                                <p style="font-weight: bold;">Masukkan link drive proposal.</p>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="nama_peserta">Nama Peserta</label>
                                <div id="peserta-wrapper">
                                    <?php foreach ($proposalPesertaIds as $peserta_id) : ?>
                                        <div class="input-group mb-2">
                                            <select class="form-control" name="peserta_id[]">
                                                <option value="" disabled>Pilih Peserta</option>
                                                <?php foreach ($pesertaOptions as $pesr) : ?>
                                                    <option value="<?= $pesr['id'] ?>" <?= $peserta_id == $pesr['id'] ? 'selected' : '' ?>><?= $pesr['nama_peserta'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <button type="button" class="btn btn-outline-danger remove-peserta">Hapus</button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <button type="button" class="btn btn-outline-primary add-peserta">Tambah Peserta</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateAvailableOptions() {
            var selectedValues = Array.from(document.querySelectorAll('select[name="peserta_id[]"]')).map(function(select) {
                return select.value;
            });

            document.querySelectorAll('select[name="peserta_id[]"] option').forEach(function(option) {
                if (selectedValues.includes(option.value) && option.value !== "") {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        }

        document.querySelector('.add-peserta').addEventListener('click', function() {
            var wrapper = document.getElementById('peserta-wrapper');
            var newField = document.createElement('div');
            newField.className = 'input-group mb-2';
            newField.innerHTML = `
            <select class="form-control" name="peserta_id[]">
                <option value="" disabled selected>Pilih Peserta</option>
                <?php foreach ($pesertaOptions as $pesr) : ?>
                    <option value="<?= $pesr['id'] ?>"><?= $pesr['nama_peserta'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" class="btn btn-outline-danger remove-peserta">Hapus</button>
        `;
            wrapper.appendChild(newField);

            updateAvailableOptions();

            newField.querySelector('.remove-peserta').addEventListener('click', function() {
                wrapper.removeChild(newField);
                updateAvailableOptions();
            });

            newField.querySelector('select').addEventListener('change', function() {
                updateAvailableOptions();
            });
        });

        document.getElementById('peserta-wrapper').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-peserta')) {
                event.target.parentElement.remove();
                updateAvailableOptions();
            }
        });

        updateAvailableOptions();
    });
</script>

<?= $this->endSection() ?>
