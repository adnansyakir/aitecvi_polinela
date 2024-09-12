<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-calendar fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0">20</h3>
                        <span>Jadwal Kegiatan AITEC</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-trophy-fill fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0"><?= $jumlahCabangKompetisi ?></h3>
                        <span>Jumlah Cabang Kompetisi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-file-person fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0"><?= $jumlahPendamping ?></h3>
                        <span>Jumlah Pendamping</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-file-person fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0"><?= $jumlahPeserta ?></h3>
                        <span>Jumlah Peserta</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-building fs-1 mb-4 me-5"></i> <!-- Ganti dengan icon building -->
                    <div class="mb-0">
                        <h3 class="mb-0"><?= $pt ?></h3>
                        <span>Jumlah Perguruan Tinggi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-trophy fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0">17</h3>
                        <span>Perolehan Mendali</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




<?= $this->endSection() ?>