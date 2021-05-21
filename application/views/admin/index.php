<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-datas" data-flashdata="<?= $this->session->flashdata('flasha'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif;  ?>
<?php if ($this->session->flashdata('flasha')) : ?>
<?php endif;  ?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>List Coach</h3>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahCoach">Tambah Data <i class="fas fa-fw fa-plus"></i></button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($list_coach as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td>
                                        <a href="#" class="badge badge-success" data-toggle="modal" data-target="#editCoach<?= $data['id_coach']; ?>">Edit</a>
                                        <a href="<?= base_url('') ?>admin/admin_controller/delete_coach/<?= $data['id_coach']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h2>
                            List User
                        </h2>
                    </div>
                    <div class="col-md-6">

                        <!-- Modal Button -->
                        <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#tambahAkun">
                            Tambah User <i class="fas fa-fw fa-plus"></i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role Id</th>
                                <th>Aktif</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role Id</th>
                                <th>Aktif</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($viewUser as $ur) : ?>
                                <tr>
                                    <td scope="row"><?php echo $i; ?></td>
                                    <td><?php echo $ur['nama_user']; ?></td>
                                    <td><?php echo $ur['email_user']; ?></td>
                                    <td><?php echo $ur['role']; ?></td>
                                    <td>
                                        <center><?php echo $ur['is_active']; ?></center>
                                    </td>
                                    <td>Terdaftar Sejak <?= date('d F Y', $ur['date_created']); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 10px;">
                                                <i class="fas fa-fw fa-bars"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editAkun<?= $ur['id_user']; ?>">Edit Role</a>
                                                <a href="<?= base_url(); ?>menu/hapus/<?= $ur['id_user']; ?>" class="dropdown-item">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah Akun -->
<div class="modal fade" id="tambahAkun" tabindex="-1" role="dialog" aria-labelledby="tambahAkunLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: blue;">
                <h5 class="modal-title" id="tambahAkunLabel" style="color: white;">Input User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" method="post" action="<?php echo base_url('menu/registration'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama_lengkap" id="exampleFirstName" placeholder="Full Name" required>
                        <?= form_error('name', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address" required>
                        <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect2" name="role_akun" style="border-radius: 50px; height:50px;" required>
                            <option value="">Pilih role sebagai</option>
                            <?php foreach ($role_id as $data) : ?>
                                <option value="<?= $data['id_role']; ?>"><?= $data['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="input_coach" style="border-radius: 50px; height:50px;">
                            <option value="">Pilih coach</option>
                            <?php foreach ($categori_coach as $data) : ?>
                                <option value="<?= $data['id_coach']; ?>"><?= $data['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small style="text-align: center;">Abaikan apabila membuat user admin</small>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
                        <?= form_error('password', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Akun -->
<?php foreach ($viewUser as $data) : ?>
    <div class="modal fade" id="editAkun<?= $data['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="editAkunLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: blue;">
                    <h5 class="modal-title" id="editAkunLabel" style="color: white;">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="post" action="<?= base_url('admin/admin_controller/edit_akun'); ?>">
                    <div class="modal-body">
                        <input type="text" hidden name="id_user" value="<?= $data['id_user']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama_lengkap" id="exampleFirstName" placeholder="Full Name" required value="<?= $data['nama_user']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address" required value="<?= $data['email_user']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect2" name="role_akun" style="border-radius: 50px; height:50px;" required>
                                <option value="">Pilih role sebagai</option>
                                <?php foreach ($role_id as $data_role) : ?>
                                    <option value="<?= $data_role['id_role']; ?>" <?= $data['id_role'] == $data_role['id_role'] ? 'selected' :  $data_role['id_role']; ?>><?= $data_role['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="input_coach" style="border-radius: 50px; height:50px;">
                                <option value="">Pilih coach</option>
                                <?php foreach ($categori_coach as $data_coach) : ?>
                                    <option value="<?= $data_coach['id_coach']; ?>" <?= $data['id_coach'] == $data_coach['id_coach'] ? 'selected' :  $data_coach['id_coach']; ?>><?= $data_coach['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small style="text-align: center;">Abaikan apabila membuat user admin</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Tambah Coach-->
<div class="modal fade" id="tambahCoach" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahCoachLabel">Tambah Coach Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('admin/admin_controller/tambah_coach'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama_coach" id="coachName" placeholder="Nama Coach" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Coach-->
<?php foreach ($detail_coachname as $data) : ?>
    <div class="modal fade" id="editCoach<?= $data['id_coach']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahCoachLabel">Edit Nama Coach</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('admin/admin_controller/edit_coach'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="id_coach" hidden class="form-control" value="<?= $data['id_coach']; ?>" readonly required style="display: none;">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama_coach" id="coachName" placeholder="Nama Coach" value="<?= $data['nama'] ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<script>
    $('#dataTable').DataTable({
        ordering: false
    });
</script>