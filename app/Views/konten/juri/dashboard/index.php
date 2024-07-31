<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-house-fill fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0"><?= $kelas ?></h3>
                        <span>Total Kelas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-fill fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0"><?= $mapel ?></h3>
                        <span>Total Mata Pelajaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-patch-question-fill fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0"><?= $jadwal ?></h3>
                        <span>Total Jadwal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-patch-question-fill fs-1 mb-4 me-5"></i>
                    <div class="mb-0">
                        <h3 class="mb-0">0</h3>
                        <span>Total Jadwal Pelajaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




<?= $this->endSection() ?>