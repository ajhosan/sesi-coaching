<div class="row" style="color: black;">
    <div class="col-md-4">
        <h5>Goals : <?= $goals_user['goals']; ?></h5>
    </div>
    <div class="col-md-8">
        <h5>Success Criteria : <?= $goals_user['success_criteria']; ?></h5>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5>List Action Plan</h5>
            </div>
            <div class="col-md-6">
                <!-- Button trigger modal -->
                <?php foreach ($action_show as $data_show) : ?>
                    <a href="<?= base_url('coach/cetaklaporan/laporan_pdf/'); ?><?= $data_show['id_goals'] ?>/<?= $data_show['sesi_ke']; ?>/<?= $data_show['id_user']; ?>" class="btn btn-success float-right"><i class="fas fa-file-export"></i> Cetak Laporan</a>
                <?php endforeach; ?>
                <button type="button" class="btn btn-primary float-right" style="margin-right:1%;" data-toggle="modal" data-target="#exampleModal">
                    Tambah komentar
                </button>

            </div>
        </div>
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
            <a href="<?= base_url('coach/coach_histori/show_list_pergoals/') ?><?= $tbl_goals['id_goals']; ?>/<?= $tbl_goals['id_user']; ?>" class="btn btn-danger" style="margin-bottom: 1%;">Kembali ke main menu</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th width="1%" rowspan="2">Nomor</th>
                            <th width="59%" rowspan="2" style="text-align: left;">Action Plan</th>
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
                                            <input type="text" hidden name="check_progres" class="form-control" value="SELESAI">
                                            <p style="text-align: left;"><?= $show['action_plan']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p><?= $show['berhasil']; ?></p>
                                </td>
                                <td>
                                    <p><?= $show['tidak_berhasil']; ?></p>
                                </td>
                                <td>
                                    <p><?= $show['butuh_waktu_lama']; ?></p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
        </form>
        <div class="row">
            <div class="col-md-6">
                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                    <h4 style="color: black;">Komentar Coach</h4>
                    <hr>
                    <?php foreach ($action_show as $data) : ?>
                        <p>
                            <?= $data['deskripsi_coach']; ?>
                        </p>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-md-6">
                <div style="border:1px solid gray; padding:10px; box-shadow: 5px 5px 10px #888888; border-radius:5px;">
                    <h4 style="color: black;">Result Coach</h4>
                    <hr>

                    <?php foreach ($action_show as $data) : ?>
                        <p>
                            <?= $data['result_coach']; ?>
                        </p>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah/Update komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('coach/coach_histori/tambah_komentar_coach'); ?>">
                <div class="modal-body">
                    <?php
                    $id_goals_number = 1;
                    foreach ($action_planpeserta as $show) : ?>
                        <input type="text" hidden name="action_plan_id<?= $id_goals_number++; ?>" class="form-control" value="<?= $show['id_actionplan']; ?>">
                    <?php endforeach; ?>
                    <?php foreach ($action_show as $data) : ?>
                        <div class="form-group">
                            <label>Komentar Coach</label>
                            <textarea name="komentar_coach" rows="4" class="form-control" placeholder="Isikan komentar coach..."><?= $data['deskripsi_coach']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Result</label>
                            <textarea name="result_coach_tambah" rows="2" class="form-control" placeholder="Isikan result..."><?= $data['result_coach']; ?></textarea>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>