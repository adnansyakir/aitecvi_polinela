<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Juri</h4>
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
                            <th>Kode Juri</th>
                            <th>Nama Juri</th>
                            <th>Perguruan Tinggi</th>
                            <th>Nama Perlombaan</th>
                            <th>Keterangan</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($juri as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['kode_juri']; ?></td>
                                <td><?= $row['nama_juri']; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><?= $row['nama_perlombaan']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>