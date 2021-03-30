<div class="col-xl-12 col-lg-12">
    <a class="btn btn-primary" href="<?= base_url('coaches/home/index') ?>" style="margin-bottom: 1%;">Kembali ke halaman Utama</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h2 style="color: black; text-align:center;">Sesi Coaching :
                <span style="background-color: #2043E5; padding:5px; color:white; border-radius:10px;">
                    <?php foreach ($join_table as $data_show) : ?>
                        <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                            <?= $data_show['action_plan_mingguke']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </span>
            </h2>
            <div class="row col-md-4">
                <div class="col-md-6">
                    <?php foreach ($join_table as $data_show) : ?>
                        <?php if ($goals['id_goals'] == $data_show['id_goals']) : ?>
                            <a class="btn btn-info float-right" href="<?= base_url() ?>coaches/home/form_editcriteria/<?= $data_show['id_success_criteria'] ?>" style="margin-right:1%;">Edit Success Criteria</a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url(); ?>coaches/transisi_sesi/update_sesi2/<?= $goals['id_goals']; ?>" class="btn btn-primary">Update Action Plan</a>
                </div>
            </div>

        </div>

        <!-- Card Body -->
        <div class=" card-body">
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
                    foreach ($lihat_action as $show1) : ?>
                        <?php if ($goals['id_goals'] == $show1['id_goals']) : ?>
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