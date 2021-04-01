<div class="card">

    <div class="card-header">
        <h5>Tambah Action Plan</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="<?= base_url('coaches/home/edit_action_now'); ?>">
            <input type="text" hidden name="user_id" value="<?= $user['id_user']; ?>">
            <input type="text" hidden name="goals_anda" value="<?= $tbl_goals['id_goals']; ?>">
            <input type="text" hidden name="success_criteria" value="<?= $tbl_goals['success_criteria']; ?>">
            <input type="text" hidden name="pertemuan_ke" value="<?= $user['pertemuan_ke']; ?>">
            <input type="date" hidden name="tanggal_pertemuan_database" value="<?= $user['tanggal_pertemuan']; ?>">
            <input type="date" hidden name="tanggal_pertemuan_skrng" value="<?= date('Y-m-d'); ?>">
            <input type="text" hidden name="sesi_coaching" value="<?= $tbl_goals['sesi_ke']; ?>">
            <a href="<?= $this->agent->referrer(); ?>" class="btn btn-danger">Kembali ke main menu</a>
            <?php foreach ($action_show as $result) : ?>
                <?php if ($result['check_status'] == "Telah menyelesaikan sesi ini") : ?>
                    <h4 style="color: black;" class="float-right">Anda telah menyelesaikan sesi coaching ini, terimakasih</h4>
                <?php else : ?>
                    <button type="submit" class="btn btn-success btn-lg float-right" name="sesi_selesai" style="margin-bottom: 2%;"> <i class="far fa-check-circle"></i> Simpan, & selesai</button>
                    <button type="submit" class="btn btn-primary btn-lg float-right" name="sesi_belumselesai" style="margin-bottom: 2%; margin-right:5px;"><i class="fas fa-caret-right"></i> Simpan, & buat sesi baru</button>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th width="1%" rowspan="2">Nomor</th>
                            <th width="59%" rowspan="2">Action Plan</th>
                            <th width="40%" colspan="3">Result</th>

                        </tr>
                        <tr>
                            <th>Berhasil</th>
                            <th>Tidak Berhasil</th>
                            <th>Butuh Waktu Lama</th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    $array = 1;
                    $id_goals_number = 1;
                    ?>
                    <tbody style="text-align: center;">
                        <?php foreach ($action_planpeserta as $show) : ?>
                            <tr>
                                <th><?= $no++; ?></th>
                                <td>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="text" hidden name="id_actionplan<?= $id_goals_number++; ?>" class="form-control" value="<?= $show['id_actionplan']; ?>">
                                            <input type="text" hidden name="check_progres" class="form-control" value="Telah menyelesaikan sesi ini">
                                            <textarea class="form-control" rows="5" name="actionplan<?= $array++; ?>" placeholder="Leave a comment here" id="floatingTextarea"><?= $show['action_plan']; ?></textarea>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="berhasil<?= $array++; ?>" value="✔" <?php echo $show['berhasil'] ? "checked"  : ' '; ?>>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tidak_berhasil<?= $array++; ?>" value="✔" <?php echo $show['tidak_berhasil'] ? "checked"  : ' '; ?>>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="butuh_waktu_lama<?= $array++; ?>" value="✔" <?php echo $show['butuh_waktu_lama'] ? "checked"  : ' '; ?>>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
        </form>
    </div>
</div>