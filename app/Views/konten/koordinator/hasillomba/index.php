<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Hasil Lomba</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/koordinator/hasillomba/add" class="btn btn-primary btn-sm"> Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="get" action="/koordinator/hasillomba">
            <div class="row mb-3 align-items-end">
                <div class="col-md-4">
                    <label for="cabang_perlombaan_id" class="form-label">Kategori Lomba</label>
                    <select class="form-control" name="cabang_perlombaan_id" id="cabang_perlombaan_id">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($cabang_perlombaan as $cabang) : ?>
                            <option value="<?= $cabang['id']; ?>" <?= $cabang['id'] == $current_cabang_perlombaan_id ? 'selected' : '' ?>>
                                <?= $cabang['nama_perlombaan']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>
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
                                    <a href="/koordinator/hasillomba/edit/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id']; ?>','/koordinator/hasillomba/delete/')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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