<?= $this->extend('layout/page') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title mb-0">Users</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="/admin/master/users/add" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
        </div>


    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status Akun</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="filteredUsers">
                        <?php $i = 1;
                        foreach ($users as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['username'] ?> </td>
                                <td><?= $row['email'] ?> </td>
                                <td><?= $row['role'] ?> </td>
                                <td>
                                    <?php
                                    if ($row['status'] == 0) {
                                        echo '<span class="badge bg-danger">Nonaktif</span>';
                                    } else if ($row['status'] == 1) {
                                        echo '<span class="badge bg-success">Aktif</span>';
                                    } else {
                                        echo '<span class="badge bg-secondary">Status Tidak Valid</span>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/admin/master/users/edit/<?= $row['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                        <?php if ($row['status'] == 0) : ?>
                                            <a href="/admin/master/users/updateStatus/1/<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-power"></i></a>
                                        <?php else : ?>
                                            <a href="/admin/master/users/updateStatus/0/<?= $row['id']; ?>" class="btn btn-secondary btn-sm"><i class="bi bi-power"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var allUsers = <?= json_encode($users) ?>;


        // Tangkap perubahan pada dropdown filter
        $('#filter_status').change(function() {
            var selectedStatus = $(this).val(); // Ambil nilai status yang dipilih

            // Filter data pengguna berdasarkan status yang dipilih
            var filteredUsers = allUsers.filter(function(user) {
                return selectedStatus === '' || user.status == selectedStatus;
            });

            // Bangun kembali isi tabel dengan data pengguna yang sudah difilter
            // Bangun kembali isi tabel dengan data pengguna yang sudah difilter
            var newTbody = '';
            $.each(filteredUsers, function(index, user) {
                newTbody += '<tr>';
                newTbody += '<td>' + (index + 1) + '</td>';
                newTbody += '<td>' + user.username + '</td>';
                newTbody += '<td>' + user.email + '</td>';
                newTbody += '<td>' + user.role + '</td>';
                newTbody += '<td class="text-center">';
                newTbody += '<div class="btn-group">';
                newTbody += '<a href="/admin/master/users/edit/' + user.id + '" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>';
                newTbody += '<a href="#" onclick="confirmDelete(\'' + user.id + '\', \'/admin/master/users/delete/\')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>';
                if (user.status == 0) {
                    newTbody += '<a href="/admin/master/users/updateStatus/1/' + user.id + '" class="btn btn-success btn-sm status-update" data-status="1"><i class="bi bi-power"></i></a>';
                } else {
                    newTbody += '<a href="/admin/master/users/updateStatus/0/' + user.id + '" class="btn btn-secondary btn-sm status-update" data-status="0"><i class="bi bi-power"></i></a>';
                }
                newTbody += '</div></td></tr>';

            });

            // Gantikan isi tbody yang sudah ada dengan tbody baru yang sudah difilter
            $('#filteredUsers').html(newTbody);

        });


    });
</script>




<?= $this->endSection() ?>