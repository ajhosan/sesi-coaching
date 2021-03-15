<div class="card">
    <h5 class="card-header">Tambah Action Plan</h5>
    <div class="card-body">
        <form method="POST" action="<?= base_url('coaches/home/tambah_action_plan'); ?>">
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
                                        <textarea class="form-control" rows="5" name="actionplan1" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="5" name="actionplan2" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="5" name="actionplan3" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="5" name="actionplan4" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" rows="5" name="actionplan5" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
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
            <div class="form-group">
                <label>Success Criteria : </label>
                <input type="text" class="form-control" name="criteria" required>
            </div>
            <div class="form-group">
                <label style="background-color: blue; color:white; padding:1%; border-radius: 10px 100px 100px 10px;">Sesi Coaching Yang Ke Berapa : </label>
                <select class=" form-select" name="minggu_keberapa" aria-label="Default select example" required>
                    <option value="">Pilih Sesi</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <a href="<?= base_url('coaches/home/index'); ?>" class="btn btn-danger">Kembali ke main menu</a>
            <button type="submit" class="btn btn-primary">Simpan action plan</button>
        </form>
    </div>
</div>