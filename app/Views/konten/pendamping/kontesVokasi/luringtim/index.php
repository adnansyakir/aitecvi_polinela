<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="col-md-3">
            <h4 class="card-title"><span style="color: red;">Informasi Penting</span></h4>
        </div>
    
        <div class="col-md-9">
        <B><ul>
            <li> Lomba dilaksanakan secara luring (offline) di Politeknik Negeri Lampung.</li>
            <li> ⁠Setiap Perguruan Tinggi hanya dapat mengirimkan <span style="color: red;">maksimal 2 orang dan maksimal 2 peserta setiap tim.</span></li>
            <li>Setiap peserta <span style="color: red;">wajib</span> mengikuti Technical Meeting.</li>
        </ul></B>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="col-md-6">
            <h2 class="card-title"><span style="color: blue;">Informasi Kontes Vokasi Luring (Tim)</span></h2>
        </div>
    <div class="col-md-7">
        <B><ul>
            <li>Handling Ternak,</li>
            <li>Survey Pemetaan Lahan</li>
        </ul></B>
    </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Daftar Peserta Kontes Vokasi Luring (Tim)</h4>
               
            </div>
            <div class="col-md-6 text-end">
                <a href="/pendamping/pendaftaran/kontesVokasi/luring/tim/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            <th>Nama Perguruan Tinggi</th>
                            <th>Nama Perlombaan</th>
                            <th>Nama Tim</th>
                            <th>Nama Peserta</th>
                            
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody> <?php $i = 1;
                            foreach ($luringtim as $row) : ?> <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['nama_team']; ?></td>
                                <td>
                                    <?= implode(', ', $row['peserta_names'])?>
                                </td>
                                <td> <a href="/pendamping/pendaftaran/kontesVokasi/luring/tim/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/pendamping/pendaftaran/kontesVokasi/luring/tim/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a> </td>
                            </tr> <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>