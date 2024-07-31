<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Pendamping</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/pendamping/add" class="btn btn-primary btn-sm"> Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pendamping</th>
                            <th>Nama Pendamping</th>
                            <th>Perguruan Tinggi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($pendamping as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['kode_pendamping']; ?></td>
                                <td><?= $row['nama_pendamping']; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td>
                                    <a href="/admin/pendamping/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/pendamping/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>