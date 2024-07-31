<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Koordinator</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/koordinator/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Kode Koordinator</th>
                            <th>Nama Koordinator</th>
                            
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($koordinator as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['kode_koordinator']; ?></td>
                                <td><?= $row['nama_koordinator']; ?></td>
                               
                                <td>
                                    <a href="/admin/koordinator/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/koordinator/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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