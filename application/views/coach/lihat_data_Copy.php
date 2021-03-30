<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class="mb-0 text-800" style="color: white; padding:10px; background-color:#2043E5; border-radius:5px;">Data Peserta : <?= $data_actionplan1['nama_user']; ?></h2>
</div>

<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h2 style="color: black;">Goals <?= $data_actionplan1['nama_user']; ?>
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
                        foreach ($show_goals as $show) : ?>
                            <?php if ($data_actionplan1['id_user'] == $show['id_user']) : ?>
                                <tbody>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $show['goals']; ?></td>
                                        <td><?= $show['duedate']; ?></td>
                                        <?php if (!$show['action_plan_true'] == NULL) : ?>
                                            <td>
                                                <a href="<?= base_url(); ?>coach/coachcontroller/lihat_action_plan/<?= $show['id_goals'] ?>" style="color: white; background-color:green; padding:8px; border-radius:5px;">Lihat Action Plan Ini</a>
                                            </td>
                                        <?php else : ?>
                                            <td><a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coach/coachcontroller/hapus_goal_peserta/<?= $show['id_goals'] ?>">Hapus Data</a></td>
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
                        <div>
                            <a href="<?= base_url(); ?>coach/cetaklaporan/laporan_pdf/<?= $data_actionplan1['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Report</a>
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                        <a href="<?= base_url(); ?>coach/coachcontroller/edit_action_plan/<?= $data_show['id_goals'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i> Update Komentar & Result</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <!-- <?= var_dump($join_table); ?> -->
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <th width="60%" rowspan="2" style="text-align: left;">Action Plan</th>

                                        <th width="10%" colspan="3">Result</th>

                                    </tr>
                                    <tr>
                                        <th>Berhasil</th>
                                        <th>Tidak Berhasil</th>
                                        <th>Butuh Waktu Lama</th>
                                    </tr>
                                </thead>
                                <?php
                                $nomor = 1;
                                foreach ($actionplan1 as $show1) : ?>
                                    <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>

                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td style="text-align: left;"><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <?= var_dump($komentar_result); ?> -->
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Komentar Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                                <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- <?= var_dump($komentar_result); ?> -->
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Result Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                                <p><?= nl2br($data_show['result_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- onclick="return confirm('Apakah anda menyatakan bahwa sesi coaching ini telah selesai?')" -->
                            <!-- /<?= $data_show['id_user'] ?> -->
                            <form method="post" action="<?= base_url(); ?>coach/summary_coachee/email_send_tochoache">

                                <input type="text" name="status_coachee" value="1">
                                <?php foreach ($join_table as $data_show) : ?>
                                    <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                        <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                            <input type="text" name="idgoals" value="<?= $data_show['id_goals'] ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <button type="submit" class="btn btn-success btn-block btn-lg" style="margin-top:1%;"><i class="fas fa-check-circle"></i> Tandai sesi coaching telah selesai</button>
                            </form>
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
                        <div>
                            <a href="<?= base_url(); ?>coach/cetaklaporan/laporan_pdf2/<?= $data_actionplan1['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Report</a>
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 2) : ?>
                                        <a href="<?= base_url(); ?>coach/coachcontroller/edit_action_plan/<?= $data_show['id_goals'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i> Update Komentar & Result</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <th width="30%" rowspan="2">Action Plan</th>

                                        <th width="10%" colspan="3">Result</th>

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
                                    <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Komentar Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 2) : ?>
                                                <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Result Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 2) : ?>
                                                <p><?= nl2br($data_show['result_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
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
                        <div>
                            <a href="<?= base_url(); ?>coach/cetaklaporan/laporan_pdf3/<?= $data_actionplan1['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Report</a>
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 3) : ?>
                                        <a href="<?= base_url(); ?>coach/coachcontroller/edit_action_plan/<?= $data_show['id_goals'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i> Update Komentar & Result</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <th width="30%" rowspan="2">Action Plan</th>

                                        <th width="10%" colspan="3">Result</th>

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
                                    <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Komentar Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 3) : ?>
                                                <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Result Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 3) : ?>
                                                <p><?= nl2br($data_show['result_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
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
                        <div>
                            <a href="<?= base_url(); ?>coach/cetaklaporan/laporan_pdf4/<?= $data_actionplan1['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Report</a>
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                        <a href="<?= base_url(); ?>coach/coachcontroller/edit_action_plan/<?= $data_show['id_goals'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i> Update Komentar & Result</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <th width="30%" rowspan="2">Action Plan</th>

                                        <th width="10%" colspan="3">Result</th>

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
                                    <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Komentar Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Result Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <p><?= nl2br($data_show['result_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
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
                        <div>
                            <a href="<?= base_url(); ?>coach/cetaklaporan/laporan_pdf5/<?= $data_actionplan1['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Report</a>
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 5) : ?>
                                        <a href="<?= base_url(); ?>coach/coachcontroller/edit_action_plan/<?= $data_show['id_goals'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i> Update Komentar & Result</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <th width="30%" rowspan="2">Action Plan</th>

                                        <th width="10%" colspan="3">Result</th>

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
                                    <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Komentar Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 5) : ?>
                                                <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Result Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 5) : ?>
                                                <p><?= nl2br($data_show['result_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
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
                        <div>
                            <a href="<?= base_url(); ?>coach/cetaklaporan/laporan_pdf6/<?= $data_actionplan1['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Report</a>
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 6) : ?>
                                        <a href="<?= base_url(); ?>coach/coachcontroller/edit_action_plan/<?= $data_show['id_goals'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i> Update Komentar & Result</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: black;">Goals yang dipilih :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
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
                                        <th width="30%" rowspan="2">Action Plan</th>

                                        <th width="10%" colspan="3">Result</th>

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
                                    <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <th><?= $nomor++; ?></th>
                                                <td><?= $show1['action_plan']; ?></td>
                                                <td><?= $show1['berhasil']; ?></td>
                                                <td><?= $show1['tidak_berhasil']; ?></td>
                                                <td><?= $show1['butuh_waktu_lama']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Komentar Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 6) : ?>
                                                <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                                    <h4 style="color: black;">Result Coach</h4>
                                    <hr>
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 6) : ?>
                                                <p><?= nl2br($data_show['result_coach']); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>