<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <h4 class="card-title">EDIT TEST</h4>
            </div>
            <div class="col-md-12">
                <form action="">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Hari</label>
                            <input type="text" class="form-control" name="hari" value="<?= $jadwal->hari ?>">
                        </div>
                        <div class="col-6">
                            <label for="">Kelas</label>

                            <select name="" id="" class="form-control">
                                <?php foreach ($kelas as $k) : ?>
                                    <?php if ($jadwal->kelas_id == $k['id']) : ?>
                                        <option value="" selected><?= $k['nama_kelas'] ?></option>
                                    <?php else : ?>
                                        <option value=""><?= $k['nama_kelas'] ?></option>

                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection() ?>