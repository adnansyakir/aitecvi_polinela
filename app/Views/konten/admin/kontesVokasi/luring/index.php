<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="col-md-3">
            <h4 class="card-title"><span style="color: red;">Informasi Penting</span></h4>
        </div>
    
        <div class="col-md-11">
        <B><ul>
            <li> Lomba dilaksanakan secara luring (offline) di Politeknik Negeri Lampung.</li>
            <li> ⁠Setiap Perguruan Tinggi hanya dapat mengirimkan <span style="color: red;">2 orang (kategori lomba individu) </span>sebagai perwakilan.</li>
            <li>Setiap peserta <span style="color: red;">wajib</span> mengikuti Technical Meeting.</li>
        </ul></B>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="col-md-6">
            <h2 class="card-title"><span style="color: blue;"> Daftar Cabang Lomba dengan Pelaksanaan Luring            </span></h2>
        </div>
    <div class="col-md-7">
        <B><ul>
            <ol>1. Sortasi Biji Kopi (Individu)            </ol>            
            <ol>2. Teknik Proses Pengambilan Sampel Darah Ayam (Individu)            </ol>
            <ol>3. Packing Benih Ikan (Individu)            </ol>
            <ol>4. Teknik Pembuatan Bakso Ikan (Individu) </ol>
            <ol>5. Desain Alat dan Mesin Pertanian dengan AutoCaD (Individu)/ol>
        </ul></B>
    </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Upload Data Luring</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/pendaftaran/kontesVokasi/luring/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                          
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody> <?php $i = 1;
                            foreach ($kntsluring as $row) : ?> <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['nama_peserta']; ?></td>
                               
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/pendaftaran/kontesVokasi/luring/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/pendaftaran/kontesVokasi/luring/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                        <?php if ($row['keterangan'] == 0) : ?>
                                            <a href="/admin/pendaftaran/kontesVokasi/luring/updateKeterangan/1/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-power"></i></a>
                                        <?php else : ?>
                                            <a href="/admin/pendaftaran/kontesVokasi/luring/updateKeterangan/0/<?= $row['id']; ?>" class="btn btn-secondary btn-sm"><i class="bi bi-power"></i></a>
                                        <?php endif; ?>
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