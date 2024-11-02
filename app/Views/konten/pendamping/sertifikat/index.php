<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Sertifikat</h4>
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
                            <th>Perguruan Tinggi</th>
                            <th>Sertifikat</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($sertifikat as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_pt']; ?></td>
                                <td><a href="<?= $row['file_sertifikat']; ?>"><i class="bi bi-file-earmark-text"></i></a></td>
                              
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>