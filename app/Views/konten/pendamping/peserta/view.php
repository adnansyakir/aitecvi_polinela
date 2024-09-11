<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Peserta Detail</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pendamping/peserta/" class="btn btn-dark me-3 mt-3"><i class='bx bx-arrow-back'></i> Kembali</a>
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
                            <th>Nama Peserta</th>
                            <th>Nomor Wa</th>
                            <th>Jenis Kelamin</th>
                            <th>Ukuran Kaos</th>
                            <th>Berita Acara</th>
                            <th>KTM</th>
                            <th>Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td> <!-- Karena hanya satu peserta, No nya langsung 1 -->
                            <td><?= $peserta['nama_peserta']; ?></td>
                            <td><?= $peserta['no_wa']; ?></td>
                            <td>
                                <?php
                                if ($peserta['jk'] == 1) {
                                    echo '<span>Perempuan</span>';
                                } else if ($peserta['jk'] == 2) {
                                    echo '<span>Laki-Laki</span>';
                                }
                                ?>
                            </td>
                            <td><?= $peserta['ukuran_kaos']; ?></td>
                            <td><a href="/uploads/berita_acara/<?= $peserta['berita_acara']; ?>"><i class="bi bi-file-earmark-text"></i></a></td>
                            <td><a href="/uploads/ktm/<?= $peserta['ktm']; ?>"><i class="bi bi-card-heading"></i></a></td>
                            <td>
                                <a href="/uploads/foto/<?= $peserta['foto']; ?>"><img src="/uploads/foto/<?= $peserta['foto']; ?>" alt="Foto Peserta" style="width: 100px; height: auto;"></a>
                            </td>

                            <td>
                                <a href="/pendamping/peserta/edit/<?= $peserta['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" onclick="confirmDelete('<?= $peserta['id']; ?>','/pendamping/peserta/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>