<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Upload Proposal</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/pendaftaran/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Nama Peserta</th>
                            <th>Proposal</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody> <?php $i = 1;
                            foreach ($proposal as $row) : ?> <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['nama_team']; ?></td>
                                <td><?= $row['nama_peserta']; ?></td>
                                <td><?= $row['proposal']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td> <a href="/admin/pendaftaran/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/pendaftaran/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a> </td>
                            </tr> <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>