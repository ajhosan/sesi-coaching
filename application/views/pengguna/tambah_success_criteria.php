<form method="POST" action="<?= base_url('coaches/home/tambah_action_plan'); ?>">
    <a href="<?= base_url('coaches/home/index'); ?>" class="btn btn-danger" style="margin-bottom: 1%;">Kembali ke main menu</a>
    <div class="card">
        <h5 class="card-header">Tambah Action Plan</h5>
        <br>
        <div style="padding-left: 2%; padding-right: 2%;">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" hidden name="sesi_ke" class="form-control" value="1">
                        <input type="text" hidden name="pertemuan_ke" class="form-control" value="<?= $user['pertemuan_ke']; ?>">
                        <input type="date" hidden class="form-control" name="tanggal_pertemuan_skrng" value="<?= date('Y-m-d'); ?>">
                        <input type="date" hidden name="tanggal_pertemuan_database" class="form-control" value="<?= $user['tanggal_pertemuan']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-lg float-right">Simpan action plan</button>
                </div>
            </div>

            <div class="form-group">
                <label>Success Criteria : </label>
                <input type="text" class="form-control" name="criteria" required>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th width="1%" rowspan="2">Nomor</th>
                            <th width="40%" rowspan="2">Action Plan</th>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody style="text-align: center;">
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="3" name="actionplan1" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="3" name="actionplan2" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="3" name="actionplan3" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="3" name="actionplan4" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="3" name="actionplan5" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <input type="text" hidden value="Y" name="action_plan_true">

            <input type="text" hidden name="goals_anda" value="<?= $action_plan['id_goals']; ?>" style="display: none;">
            <input type="text" hidden name="user_id" value="<?= $user['id_user']; ?>" style="display: none;">
            <br>
</form>
</div>
</div>