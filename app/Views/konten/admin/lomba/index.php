<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Cabang Perlombaan</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/master/lomba/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Kode Perlombaan</th>
                            <th>Nama Perlombaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                
                            <?php $i = 1;
                            foreach ($cabang_perlombaan as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['kode_perlombaan']; ?></td>
                                    <td><?= $row['nama_perlombaan']; ?></td>
                                    <td>
                                    <a href="/admin/master/lomba/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/master/lomba/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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