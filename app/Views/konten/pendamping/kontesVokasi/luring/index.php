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

            <h2 class="card-title"><span style="color: blue;">Informasi Kontes Vokasi Luring (Individu)</span></h2>
        </div>
    <div class="col-md-7">
        <B><ul>
            
            <li> Desain Alat dan Mesin Pertanian dengan AutoCAD</li>
            <li>Teknik Pengambilan Sampel Darah Ayam</li>
            <li> Packing Benih Ikan</li>
            <li>Sortasi Biji Kopi</li>
            <li> Teknik Pembuatan Bakso Ikan</li>
            

            <h2 class="card-title"><span style="color: blue;"> Daftar Cabang Lomba dengan Pelaksanaan Luring (Individu)</span></h2>
        </div>
    <div class="col-md-7">
        <B><ul>
            <ol>1. Sortasi Biji Kopi</ol>            
            <ol>2. Teknik Proses Pengambilan Sampel Darah Ayam </ol>
            <ol>3. Packing Benih Ikan </ol>
            <ol>4. Teknik Pembuatan Bakso Ikan</ol>
            <ol>5. Desain Alat dan Mesin Pertanian dengan AutoCaD</ol>

        </ul></B>
    </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Daftar Peserta Kontes Vokasi Luring (Individu)</h4>

            </div>
            <div class="col-md-6 text-end">
                <a href="/pendamping/pendaftaran/kontesVokasi/luring/individu/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                                        <a href="/pendamping/pendaftaran/kontesVokasi/luring/individu/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/pendamping/pendaftaran/kontesVokasi/luring/individu/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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