<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Sertifikat</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/sertifikat/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Nama Peserta/Pendamping</th>
                            <th>NIM/NIP</th>
                            <th>Nama Program Studi</th>
                            <th>Perguruan Tinggi</th>
                            
                            <th>Sertifikat</th>
                            <th>Nama Perlombaan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($sertifikat as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_peserta']; ?></td>
                                <td><?= $row['kode_peserta']; ?></td>
                                <td><?= $row['nama_prodi']; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><a href="/uploads/sertifikat/<?= $row['file_sertifikat']; ?>"><i class="bi bi-file-earmark-text"></i></a></td>
                                <td><?= $row['nama_perlombaan']; ?></a></td>
                                <td>
                                    <a href="/koordinator/sertifikat/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/koordinator/sertifikat/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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