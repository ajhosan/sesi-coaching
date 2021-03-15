<div class="card">
    <h5 class="card-header">Update Komentar & Result</h5>
    <div class="card-body">
        <div class="row" style="margin-bottom:1%;">
            <div class="col-md-5">
                <h4 style="color: black;">
                    <strong> Goal</strong> :
                    <?= $action_planedit['goals']; ?>

                </h4>
            </div>
            <div class="col-md-7">
                <h4 style="color: black; text-align:left;">
                    <strong> Success Criteria</strong> :
                    <?= $action_planedit['success_criteria']; ?>

                </h4>
            </div>
        </div>
        <form method="POST" action="<?= base_url('coach/coachcontroller/simpan_edit'); ?>">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th width="1%" rowspan="2">Nomor</th>
                            <th width="29%" rowspan="2">Action Plan</th>
                            <th width="10%" colspan="3">Result</th>

                        </tr>
                        <tr>
                            <th>Berhasil</th>
                            <th>Tidak Berhasil</th>
                            <th>Butuh Waktu Lama</th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($actionplan as $data) : ?>
                        <tbody style="text-align: center;">
                            <tr>
                                <th><?= $no++; ?></th>
                                <td>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <p><?= $data['action_plan']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <p><?= $data['berhasil']; ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <p><?= $data['tidak_berhasil']; ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <p><?= $data['tidak_berhasil']; ?></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h5 style="color: black;">Komentar Coach</h5>
                    <div class="form-group">
                        <textarea name="komentar_coach" class="form-control" rows="6" placeholder="Tambah komentar..."><?= $action_planedit['deskripsi_coach']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 style="color: black;">Result Coach</h5>
                    <div class="form-group">
                        <textarea name="result_coach" class="form-control" rows="6" placeholder="Tambah result..."><?= $action_planedit['result_coach']; ?></textarea>
                    </div>
                </div>
            </div>
            <input type="text" name="id_user" value="<?= $action_planedit['id_user']; ?>">
            <input type="text" name="id_actionplan" value="<?= $action_planedit['id_actionplan'] ?>">
            <input type="text" name="id_goals" value="<?= $action_planedit['id_goals']; ?>">
            <br>
            <a href="<?= $this->agent->referrer(); ?>" class="btn btn-danger">Kembali ke menu sebelumnya</a>
            <button type="submit" class="btn btn-primary">Simpan Komentar & Result</button>
        </form>
    </div>
</div>