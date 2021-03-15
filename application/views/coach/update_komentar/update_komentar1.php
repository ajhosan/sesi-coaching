<div class="card">
    <h5 class="card-header">Tambah Action Plan</h5>
    <div class="card-body">
        <form method="POST" action="<?= base_url('coach/coachcontroller/simpan_edit'); ?>">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th width="1%" rowspan="2">Nomor</th>
                            <th width="29%" rowspan="2">Action Plan</th>
                            <th width="10%" colspan="3">Result</th>
                            <th width="30%" rowspan="2">Tambah Komentar</th>
                            <th width="30%" rowspan="2">Tambah Result</th>

                        </tr>
                        <tr>
                            <th>Berhasil</th>
                            <th>Tidak Berhasil</th>
                            <th>Butuh Waktu Lama</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody style="text-align: center;">
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <p><?= $action_planedit['action_plan']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <p><?= $action_planedit['berhasil']; ?></p>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <p><?= $action_planedit['tidak_berhasil']; ?></p>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <p><?= $action_planedit['tidak_berhasil']; ?></p>
                                </div>
                            </td>
                            <td>
                                <div class="form-floating">
                                    <textarea class="form-control" rows="5" name="komentar" placeholder="Tambah komentar untuk peserta..." id="floatingTextarea"><?= $action_planedit['deskripsi_coach']; ?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-floating">
                                    <textarea class="form-control" rows="5" name="result" placeholder="Tambah result untuk peserta..." id="floatingTextarea"><?= $action_planedit['result_coach']; ?></textarea>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <input type="text" hidden name="id_user" value="<?= $action_planedit['id_user']; ?>">
            <input type="text" hidden name="id_actionplan" value="<?= $action_planedit['id_actionplan'] ?>">
            <br>
            <a href="<?= $this->agent->referrer(); ?>" class="btn btn-danger">Kembali ke menu sebelumnya</a>
            <button type="submit" class="btn btn-primary">Simpan Komentar & Result</button>
        </form>
    </div>
</div>