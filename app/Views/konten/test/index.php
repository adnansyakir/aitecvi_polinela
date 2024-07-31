<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <h4 class="card-title">TEST</h4>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1;
                    foreach ($jadwals as $jadwal) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $jadwal['nama_mapel'] ?></td>
                            <td><?= $jadwal['nama'] ?></td>
                            <td><?= $jadwal['nama_kelas'] ?></td>
                            <td>
                                <a href="/admin/test/edit/<?= $jadwal['id'] ?>">EDIT</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection() ?>