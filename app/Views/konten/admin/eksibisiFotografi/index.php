<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <div class="col-md-6">
        <h4 class="card-title"><span style="color: red;">Informasi Penting</span></h4>

            </div>
            
        </div>
        <div class="col-md-6">
                
            </div>
            
        </div>
    
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Eksibisi Fotografi</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/pendaftaran/eksibisiFotografi/add" class="btn btn-primary btn-sm"> Tambah Data</a>
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
                            foreach ($fotografi as $row) : ?> <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['nama_peserta']; ?></td>
                    
                                
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/pendaftaran/eksibisiFotografi/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/admin/pendaftaran/eksibisiFotografi/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                        <?php if ($row['keterangan'] == 0) : ?>
                                            <a href="/admin/pendaftaran/eksibisiFotografi/updateKeterangan/1/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-power"></i></a>
                                        <?php else : ?>
                                            
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