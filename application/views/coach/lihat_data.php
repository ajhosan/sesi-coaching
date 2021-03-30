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
                                <th scope="col" width="5%">Nomor</th>
                                <th scope="col" width="35%">Goals</th>
                                <th scope="col" width="10%">Due Date</th>
                                <th scope="col" width="50%">Action</th>

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
                                        <?php if ($show['progres_coaching'] == "PERSETUJUAN") : ?>
                                            <td>
                                                <p style="color: white;" class="badge badge-secondary"><u>Peserta belum memilih goals ini untuk di coaching </u></p>
                                            </td>
                                        <?php elseif ($show['progres_coaching'] == "PENDING") : ?>
                                            <td>
                                                <form method="POST" action="<?= base_url('coach/coachcontroller/acc_requeststatus_coachee'); ?>">
                                                    <input type="text" hidden name="id_goals" value="<?= $show['id_goals']; ?>">
                                                    <input type="text" hidden name="proses_coaching" value="PROSES">
                                                    <input type="text" hidden name="user_id" value="<?= $data_actionplan1['id_user'] ?>">
                                                    <button type="submit" class="btn btn-warning">Peserta meminta persetujuan ingin di coaching pada goals ini</button>
                                                </form>

                                            </td>
                                        <?php elseif ($show['progres_coaching'] == "PROSES") : ?>
                                            <td>
                                                <p style="color:white;" class="badge badge-primary">Saat ini Peserta sedang melakukan coaching di goals ini</p>
                                            </td>
                                        <?php elseif ($show['progres_coaching'] == "DONE") : ?>
                                            <td>
                                                <a href="<?= base_url(); ?>coaches/home/form_action_plan/<?= $show['id_goals'] ?>">ON PROGRES</a>
                                            </td>
                                        <?php endif; ?>
                                        <!-- <?php if (!$show['action_plan_true'] == NULL) : ?>
                                            <td>
                                                <a href="<?= base_url(); ?>coach/coachcontroller/lihat_action_plan/<?= $show['id_goals'] ?>" style="color: white; background-color:green; padding:8px; border-radius:5px;">Lihat Action Plan Ini</a>
                                            </td>
                                        <?php else : ?>
                                            <td><a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="<?= base_url(); ?>coach/coachcontroller/hapus_goal_peserta/<?= $show['id_goals'] ?>">Hapus Data</a></td>
                                        <?php endif; ?> -->

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


<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 style="color: black; text-align:center;">History Coaching : <?= $data_actionplan1['nama_user']; ?></h3>
            </div>
            <!-- Card Body -->
            <div class="card-body" style="color: black;">
                <div class="row">
                    <?php foreach ($goals_user as $show) : ?>
                        <div class="col-md-6">
                            <div class="card" style="margin-bottom: 2%;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3 style="color: black;">Goals :
                                                <?= $show['goals']; ?>
                                            </h3>
                                            <p>Pertemuan ke : <?= $show['pertemuan_ke']; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= base_url(); ?>coach/coach_histori/show_list_pergoals/<?= $show['id_goals']; ?>/<?= $show['id_user']; ?>" class="btn btn-primary float-right" style="margin-top: 60%;">Lihat Goals ini</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>