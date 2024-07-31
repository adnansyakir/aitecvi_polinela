<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Perguruan Tinggi</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/master/perguruantinggi/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Kode PT</th>
                            <th>Nama Perguruan Tinggi</th>
                            <th>Email</th>
                            <th>Asal Provinsi</th>
                            <th>Asal Negara</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php $i = 1;
                            foreach ($pt as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['kode_pt']; ?></td>
                                    <td><?= $row['nama_pt']; ?></td>
                                    <td><?= $row['email_pt']; ?></td>
                                    <td><?= $row['asal_prov']; ?></td>
                                    <td><?= $row['asal_negara']; ?></td>
                                    <td>
                                        <a href="/admin/master/perguruantinggi/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/master/perguruantinggi/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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