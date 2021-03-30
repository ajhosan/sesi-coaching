<div class="col-xl-12 col-lg-7">
    <a class="btn btn-primary" href="<?= base_url(); ?>coach/coachcontroller/tampil_data/<?= $goals['id_user'] ?>" style="margin-bottom: 1%;">Kembali ke halaman utama</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h2 style="color: black; text-align:center;">Sesi Coaching
                <span style="background-color: #2043E5; padding:5px; color:white; border-radius:10px;">
                    <?php foreach ($join_table as $data_show) : ?>
                        <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                            <?= $data_show['action_plan_mingguke']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </span>
            </h2>
            <div>
                <!-- <a href="<?= base_url(); ?>coach/cetaklaporan/laporan_pdf/<?= $data_actionplan1['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Report</a> -->
                <?php foreach ($join_table as $data_show) : ?>
                    <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                        <a href="<?= base_url(); ?>coach/coachcontroller/edit_action_plan/<?= $data_show['id_goals'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i> Update Komentar & Result</a>
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
                            <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                                <?= $data_show['goals']; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </h4>
                </div>
                <div class="col-lg-6" style="color: black;">
                    <h4>Success Criteria :

                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                                <?= $data_show['success_criteria']; ?>
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
                    foreach ($lihat_action as $data_show) : ?>
                        <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>

                            <tbody style="text-align: center;">
                                <tr>
                                    <th><?= $nomor++; ?></th>
                                    <td style="text-align: left;"><?= $data_show['action_plan']; ?></td>
                                    <td><?= $data_show['berhasil']; ?></td>
                                    <td><?= $data_show['tidak_berhasil']; ?></td>
                                    <td><?= $data_show['butuh_waktu_lama']; ?></td>
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
                            <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                                <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
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
                            <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                                <p><?= nl2br($data_show['result_coach']); ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- onclick="return confirm('Apakah anda menyatakan bahwa sesi coaching ini telah selesai?')" -->
                <!-- /<?= $data_show['id_user'] ?> -->
                <!-- <form method="post" action="<?= base_url(); ?>coach/summary_coachee/email_send_tochoache">

                    <input type="text" name="status_coachee" value="1">
                    <?php foreach ($join_table as $data_show) : ?>
                        <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                            <input type="text" name="idgoals" value="<?= $data_show['id_goals'] ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-success btn-block btn-lg" style="margin-top:1%;"><i class="fas fa-check-circle"></i> Tandai sesi coaching telah selesai</button>
                </form> -->
            </div>
        </div>

    </div>
</div>