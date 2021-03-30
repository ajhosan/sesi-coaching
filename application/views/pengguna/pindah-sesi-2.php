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
            <form method="POST" action="<?= base_url('coaches/transisi_sesi/update_data2') ?>">
                <div>
                    <button type="submit" class="btn btn-primary btn-lg">Simpan Data Terbaru</button>
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
                                <input type="text" hidden name="success_criteria" value="<?= $data_show['success_criteria']; ?>">
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

                        </tr>
                        <tr>
                            <th>Berhasil</th>
                            <th>Tidak Berhasil</th>
                            <th>Butuh Waktu Lama</th>
                        </tr>
                    </thead>
                    <input type="text" hidden name="user_id" value="<?= $user['id_user'] ?>">
                    <input type="text" hidden name="goals_id" value="<?= $goals['id_goals']; ?>">
                    <?php
                    $nomor = 1;
                    foreach ($lihat_action as $show1) : ?>
                        <?php if ($goals['id_goals'] == $show1['id_goals']) : ?>
                            <tbody style="text-align: center;">
                                <tr>
                                    <th><?= $nomor++; ?></th>
                                    <input type="text" class="form-control" hidden name="sesi-coach" readonly value="<?= $show1['action_plan_mingguke'] ?>">
                                    <td>
                                        <div class="form-floating">
                                            <textarea class="form-control" rows="4" name="actionplan1" placeholder="Leave a comment here" id="floatingTextarea"><?= $show1['action_plan']; ?></textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="berhasil" value="✔" <?= $show1['berhasil'] ? "checked"  : '✔'; ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tidak_berhasil" value="✔" <?= $show1['tidak_berhasil'] ? "checked"  : '✔'; ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="butuh_waktu_lama" value="✔" <?= $show1['butuh_waktu_lama'] ? "checked"  : '✔'; ?>>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </form>
                </table>

            </div>
            </form>
        </div>

    </div>
</div>