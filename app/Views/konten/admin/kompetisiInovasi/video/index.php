<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Upload Video</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/pendaftaran/kompetisiInovasi/video/add" class="btn btn-primary btn-sm"> Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover" id="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Perguruan tinggi</th>
                            <th>Nama Perlombaan</th>
                            <th>Nama Team</th>

                            <th>Video</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody> <?php $i = 1;
                            foreach ($video as $row) : ?> <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['nama_team']; ?></td>
                                <td><a href="<?= $row['video']; ?>"><i class="bi bi-file-earmark-play"></i></a></td>

                                <td>
                                <?php
                                    if ($row['keterangan'] == 0) {
                                        echo '<span class="badge bg-danger">Tidak Lolos</span>';
                                    } else if ($row['keterangan'] == 1) {
                                        echo '<span class="badge bg-success">Lolos</span>';
                                    } else if ($row['keterangan'] == 2) {
                                        echo '<span class="badge bg-secondary">Sedang diverifikasi</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/pendaftaran/kompetisiInovasi/video/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/pendaftaran/kompetisiInovasi/video/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                        <?php if ($row['keterangan'] == 0) : ?>
                                            <a href="/admin/pendaftaran/kompetisiInovasi/video/updateKeterangan/1/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-power"></i></a>
                                        <?php else : ?>
                                            <a href="/admin/pendaftaran/kompetisiInovasi/video/updateKeterangan/0/<?= $row['id']; ?>" class="btn btn-secondary btn-sm"><i class="bi bi-power"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr> <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>