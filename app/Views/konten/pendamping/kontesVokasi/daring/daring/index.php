<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <div class="col-md-3">
            <h4 class="card-title"><span style="color: red;">Keterangan</span></h4>
        </div>

        <div class="col-md-7">
            <B>
                <ul>
                    <li>Peserta Masih dalam Desk Verifikasi Penilaian,</li>
                    <li> Peserta Tidak Lolos Penilaian </li>
                    <li>Peserta Lolos Desk Verifikasi Akan mengikuti Luring di Politeknik Negeri Lampung</li>
                </ul>
            </B>
        </div>
        <div class="col-md-7">
            <li>Formulasi Pakan Ternak</li>
            <li>Teknik Proses Fillet Ikan</li>
            <li>Formulasi Pakan Ikan</li>
            <li>Teknik Proses Karkas Ayam</li>
            <li>Teknik Okulasi Tanaman</li>
            <li>Penyuluhan Pertanian</li>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Upload Data Daring</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pendamping/pendaftaran/kontesVokasi/daring/daring/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Nama Peserta</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody> <?php $i = 1;
                            foreach ($kntsdaring_luring as $row) : ?> <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['nama_peserta']; ?></td>
                                <td>
                                    <?php
                                    if ($row['keterangan'] == 0) {
                                        echo '<span class="badge bg-danger">Tidak Lolos Desk Evaluation</span>';
                                    } else if ($row['keterangan'] == 1) {
                                        echo '<span class="badge bg-success">Lolos Desk Evaluation</span>';
                                    } else if ($row['keterangan'] == 2) {
                                        echo '<span class="badge bg-secondary">Sedang penilaian</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/pendamping/pendaftaran/kontesVokasi/daring/daring/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/pendamping/pendaftaran/kontesVokasi/daring/daring/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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