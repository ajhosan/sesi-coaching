<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-datas" data-flashdata="<?= $this->session->flashdata('flasha'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif;  ?>
<?php if ($this->session->flashdata('flasha')) : ?>
<?php endif;  ?>

<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahAkun">
    Tambah User <i class="fas fa-fw fa-plus"></i>
</button>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 style="text-align: center;">
            List User
        </h2>
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
                        <th>Target</th>
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
                        <th>Target</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($viewUser as $ur) : ?>
                        <tr>
                            <td scope="row"><?php echo $i; ?></td>
                            <td><?php echo $ur['name']; ?></td>
                            <td><?php echo $ur['email']; ?></td>
                            <td><?php echo $ur['role']; ?></td>
                            <td>
                                <center><?php echo $ur['is_active']; ?></center>
                            </td>
                            <td>Terdaftar Sejak <?= date('d F Y', $ur['date_created']); ?></td>
                            <td><?= $ur['target']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 10px;">
                                        <i class="fas fa-fw fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="<?= base_url(); ?>menu/view_target_user/<?= $ur['id']; ?>" class="dropdown-item">Tambah/Edit Target</a>
                                        <a href="<?= base_url(); ?>menu/view_edit/<?= $ur['id']; ?>" class="dropdown-item">Edit Role</a>
                                        <a href="<?= base_url(); ?>menu/hapus/<?= $ur['id']; ?>" class="dropdown-item">Hapus</a>
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

<!-- Modal -->
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
                    <center><img src="http://korporaconsulting.com/wp-content/uploads/2018/04/Untitled-1cc.png" style="width: 500px 100%; height: 50px;"></center>
                    <div class="form-group"><br>
                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control" style="border-radius:20px;">
                            <option value=" ">Pilih Jabatan</option>
                            <?php foreach ($menus as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['role'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3" >', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                        </div>
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

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>