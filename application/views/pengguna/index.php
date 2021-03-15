<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sesi Coaching</h1>
</div>

<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h2 style="color: black;">Tambah Goals Anda <p><span style="font-size: 15px; color:gray;">Masukan Maximal 7 Goals</span></p>
                </h2>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="<?= base_url('coaches/home/tambah_goals'); ?>">
                    <input type="text" name="user_id" value="<?= $user['id_user']; ?>" hidden style="display: none;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Goals Anda</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="goals" rows="5" placeholder="Isikan goals Anda..." id="floatingTextarea" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save Data</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h2 style="color: black;">Goals Anda <p><span style="font-size: 15px; color:gray;">Masukan Maximal 7 Goals</span></p>
                </h2>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Goals</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($goals as $show) : ?>
                            <?php if ($user['id_user'] == $show['id_user']) : ?>
                                <tbody>
                                    <?php $validasi = $show['action_plan_true'] == NULL;
                                    $tong = $validasi == $show['id_user'] ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $show['goals']; ?></td>
                                        <td><?= $show['duedate']; ?></td>
                                        <?php if ($validasi == TRUE) : ?>
                                            <td>
                                                <a href="<?= base_url(); ?>coaches/home/form_action_plan/<?= $show['id_goals'] ?>">Tambah Action Plan</a>
                                            </td>
                                        <?php else : ?>
                                            <td><a style="color: white; background-color:green; padding:4px; border-radius:5px;">Terimakasih Telah Mengisi Data</a></td>
                                        <?php endif; ?>
                                    </tr>

                                </tbody>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sesi Coaching Pertama</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sesi Coaching Kedua</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Sesi Coaching Ketiga</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="sesi4-tab" data-toggle="tab" href="#sesi4" role="tab" aria-controls="sesi4" aria-selected="false">Sesi Coaching Keempat</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="sesi5-tab" data-toggle="tab" href="#sesi5" role="tab" aria-controls="sesi5" aria-selected="false">Sesi Coaching Kelima</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#sesi6" role="tab" aria-controls="contact" aria-selected="false">Sesi Coaching Keenam</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 style="color: black; text-align:center;">Sesi Coaching Pertama</h2>
                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                    <a class="btn btn-info float-right" href="<?= base_url() ?>coaches/home/form_editcriteria/<?= $data_show['id_success_criteria'] ?>">Edit Success Criteria</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                                <?= $data_show['goals']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div class="col-lg-6" style="color: black;">
                                <h4>Success Criteria :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                                <?= $data_show['success_criteria']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th width="1%" rowspan="2">Nomor</th>
                                        <th width="40%" rowspan="2">Action Plan</th>
                                        <th width="40%" colspan="3">Result</th>
                                        <th rowspan="2">Action</th>

                                    </tr>
                                    <tr>
                                        <th>Berhasil</th>
                                        <th>Tidak Berhasil</th>
                                        <th>Butuh Waktu Lama</th>
                                    </tr>
                                </thead>
                                <?php
                                $nomor = 1;
                                foreach ($action_plan as $show1) : ?>
                                    <?php if ($user['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" style="margin-bottom:5%;" href="<?= base_url(); ?>coaches/home/edit_action_plan/<?= $show1['id_actionplan'] ?>">Update Data </a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coaches/home/hapus_action/<?= $show1['id_actionplan'] ?>">Hapus Data</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 style="color: black; text-align:center;">Sesi Coaching Kedua</h2>
                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 2) : ?>
                                    <a class="btn btn-info float-right" href="<?= base_url() ?>coaches/home/form_editcriteria/<?= $data_show['id_success_criteria'] ?>">Edit Success Criteria</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 2) : ?>
                                                <?= $data_show['goals']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div class="col-lg-6" style="color: black;">
                                <h4>Success Criteria :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 2) : ?>
                                                <?= $data_show['success_criteria']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th width="1%" rowspan="2">Nomor</th>
                                        <th width="40%" rowspan="2">Action Plan</th>
                                        <th width="40%" colspan="3">Result</th>
                                        <th rowspan="2">Action</th>

                                    </tr>
                                    <tr>
                                        <th>Berhasil</th>
                                        <th>Tidak Berhasil</th>
                                        <th>Butuh Waktu Lama</th>
                                    </tr>
                                </thead>
                                <?php
                                $nomor = 1;
                                foreach ($action_plan2 as $show1) : ?>
                                    <?php if ($user['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" style="margin-bottom:5%;" href="<?= base_url(); ?>coaches/home/edit_action_plan/<?= $show1['id_actionplan'] ?>">Update Data </a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coaches/home/hapus_action/<?= $show1['id_actionplan'] ?>">Hapus Data</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 style="color: black; text-align:center;">Sesi Coaching Ketiga</h2>
                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 3) : ?>
                                    <a class="btn btn-info float-right" href="<?= base_url() ?>coaches/home/form_editcriteria/<?= $data_show['id_success_criteria'] ?>">Edit Success Criteria</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 3) : ?>
                                                <?= $data_show['goals']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div class="col-lg-6" style="color: black;">
                                <h4>Success Criteria :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 3) : ?>
                                                <?= $data_show['success_criteria']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th width="1%" rowspan="2">Nomor</th>
                                        <th width="40%" rowspan="2">Action Plan</th>
                                        <th width="40%" colspan="3">Result</th>
                                        <th rowspan="2">Action</th>

                                    </tr>
                                    <tr>
                                        <th>Berhasil</th>
                                        <th>Tidak Berhasil</th>
                                        <th>Butuh Waktu Lama</th>
                                    </tr>
                                </thead>
                                <?php
                                $nomor = 1;
                                foreach ($action_plan3 as $show1) : ?>
                                    <?php if ($user['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" style="margin-bottom:5%;" href="<?= base_url(); ?>coaches/home/edit_action_plan/<?= $show1['id_actionplan'] ?>">Update Data </a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coaches/home/hapus_action/<?= $show1['id_actionplan'] ?>">Hapus Data</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="sesi4" role="tabpanel" aria-labelledby="sesi4-tab">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 style="color: black; text-align:center;">Sesi Coaching Keempat</h2>
                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                    <a class="btn btn-info float-right" href="<?= base_url() ?>coaches/home/form_editcriteria/<?= $data_show['id_success_criteria'] ?>">Edit Success Criteria</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <?= $data_show['goals']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div class="col-lg-6" style="color: black;">
                                <h4>Success Criteria :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <?= $data_show['success_criteria']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th width="1%" rowspan="2">Nomor</th>
                                        <th width="40%" rowspan="2">Action Plan</th>
                                        <th width="40%" colspan="3">Result</th>
                                        <th rowspan="2">Action</th>

                                    </tr>
                                    <tr>
                                        <th>Berhasil</th>
                                        <th>Tidak Berhasil</th>
                                        <th>Butuh Waktu Lama</th>
                                    </tr>
                                </thead>
                                <?php
                                $nomor = 1;
                                foreach ($action_plan4 as $show1) : ?>
                                    <?php if ($user['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" style="margin-bottom:5%;" href="<?= base_url(); ?>coaches/home/edit_action_plan/<?= $show1['id_actionplan'] ?>">Update Data </a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coaches/home/hapus_action/<?= $show1['id_actionplan'] ?>">Hapus Data</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="sesi5" role="tabpanel" aria-labelledby="sesi5-tab">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 style="color: black; text-align:center;">Sesi Coaching Kelima</h2>
                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 5) : ?>
                                    <a class="btn btn-info float-right" href="<?= base_url() ?>coaches/home/form_editcriteria/<?= $data_show['id_success_criteria'] ?>">Edit Success Criteria</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 5) : ?>
                                                <?= $data_show['goals']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div class="col-lg-6" style="color: black;">
                                <h4>Success Criteria :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 5) : ?>
                                                <?= $data_show['success_criteria']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th width="1%" rowspan="2">Nomor</th>
                                        <th width="40%" rowspan="2">Action Plan</th>
                                        <th width="40%" colspan="3">Result</th>
                                        <th rowspan="2">Action</th>

                                    </tr>
                                    <tr>
                                        <th>Berhasil</th>
                                        <th>Tidak Berhasil</th>
                                        <th>Butuh Waktu Lama</th>
                                    </tr>
                                </thead>
                                <?php
                                $nomor = 1;
                                foreach ($action_plan5 as $show1) : ?>
                                    <?php if ($user['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" style="margin-bottom:5%;" href="<?= base_url(); ?>coaches/home/edit_action_plan/<?= $show1['id_actionplan'] ?>">Update Data </a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coaches/home/hapus_action/<?= $show1['id_actionplan'] ?>">Hapus Data</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="sesi6" role="tabpanel" aria-labelledby="sesi6-tab">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 style="color: black; text-align:center;">Sesi Coaching Keenam</h2>
                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 6) : ?>
                                    <a class="btn btn-info float-right" href="<?= base_url() ?>coaches/home/form_editcriteria/<?= $data_show['id_success_criteria'] ?>">Edit Success Criteria</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 6) : ?>
                                                <?= $data_show['goals']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div class="col-lg-6" style="color: black;">
                                <h4>Success Criteria :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $user['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 6) : ?>
                                                <?= $data_show['success_criteria']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th width="1%" rowspan="2">Nomor</th>
                                        <th width="40%" rowspan="2">Action Plan</th>
                                        <th width="40%" colspan="3">Result</th>
                                        <th rowspan="2">Action</th>

                                    </tr>
                                    <tr>
                                        <th>Berhasil</th>
                                        <th>Tidak Berhasil</th>
                                        <th>Butuh Waktu Lama</th>
                                    </tr>
                                </thead>
                                <?php
                                $nomor = 1;
                                foreach ($action_plan6 as $show1) : ?>
                                    <?php if ($user['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" style="margin-bottom:5%;" href="<?= base_url(); ?>coaches/home/edit_action_plan/<?= $show1['id_actionplan'] ?>">Update Data </a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coaches/home/hapus_action/<?= $show1['id_actionplan'] ?>">Hapus Data</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>