<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Finalisasi Admin</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/finalisasi/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Surat tugas</th>
                            <th>Invoice Tagihan Kontribusi</th>
                            <th>Bukti Transfer</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($finalisasi as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_team']; ?></td>
                                <td><a href="/uploads/surat_tugas/<?= $row['surat_tugas']; ?>"><i class="bi bi-file-earmark-text"></i></a></td>
                                <td><a href="/uploads/invoice/<?= $row['invoice']; ?>"><i class="bi bi-card-heading"></a></td>
                                <td><a href="/uploads/bukti_transfer/<?= $row['bukti_transfer']; ?>"><i class="bi bi-card-heading"></a></td>
                                <td>
                                    <?php
                                    if ($row['keterangan'] == 2) {
                                        echo '<span class="badge bg-danger">Tidak Diverifikasi</span>';
                                    } else if ($row['keterangan'] == 1) {
                                        echo '<span class="badge bg-success">Terverifikasi</span>';
                                    } else if($row['keterangan'] == 0){
                                        echo '<span class="badge bg-secondary">Sedang diverifikasi</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="/pendamping/finalisasi/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/pendamping/finalisasi/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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