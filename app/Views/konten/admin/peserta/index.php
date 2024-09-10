<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Peserta</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/peserta/add" class="btn btn-primary btn-sm"> Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped"  id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>NIM/NIP</th>
                            <th>Nama Program Studi</th>
                            <th>Perguruan Tinggi</th>
                            <th>Nomor Wa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($peserta as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_peserta']; ?></td>
                                <td><?= $row['kode_peserta']; ?></td>
                                <td><?= $row['prodi']; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['no_wa']; ?></td>
                                <td>
                                    <a href="/admin/peserta/view/<?= $row['id']; ?>" class="btn btn-sm btn-info"><i class='bi bi-eye'></i></a>
                                    <a href="/admin/peserta/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/peserta/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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