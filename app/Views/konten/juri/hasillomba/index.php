<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Hasil Lomba</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/juri/hasillomba/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Nama Team</th>
                            <th>Kategori Lomba</th>
                            <th>Nilai Juri 1</th>
                            <th>Nilai Juri 2</th>
                            <th>Nilai Juri 3</th>
                            <th>Catatan Nilai 1</th>
                            <th>Catatan Nilai 2</th>
                            <th>Catatan Nilai 3</th>
                            <th>Keterangan</th>
                            <th>Total Nilai</th>
                            <th>Nilai Akhir</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($hasillomba as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_team']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['nilai_juri1']; ?></td>
                                <td><?= $row['nilai_juri2']; ?></td>
                                <td><?= $row['nilai_juri3']; ?></td>
                                <td><a href="/uploads/catatan/<?= $row['catatan_juri1']; ?>"><i class="bi bi-file-earmark-text"></i></a></td>
                                <td><a href="/uploads/catatan/<?= $row['catatan_juri2']; ?>"><i class="bi bi-file-earmark-text"></a></td>
                                <td><a href="/uploads/catatan/<?= $row['catatan_juri3']; ?>"><i class="bi bi-file-earmark-text"></a></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?= $row['total_nilai']; ?></td>
                                <td><?= $row['hasil_akhir']; ?></td>
                                <td>
                                    <a href="/juri/hasillomba/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/juri/hasillomba/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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