<div class="card">
    <h5 class="card-header">Tambah Action Plan</h5>
    <div class="card-body">
        <form method="POST" action="<?= base_url('coaches/home/tambah_action_plan'); ?>" enctype="multipart/form-data">
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
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="berhasil1" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox1">Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tidak_berhasil1" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox2">Tidak Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="butuh_waktu1" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox3">Butuh Waktu Lebih Lama</label>
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
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="berhasil2" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox1">Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tidak_berhasil2" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox2">Tidak Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="butuh_waktu2" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox3">Butuh Waktu Lebih Lama</label>
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
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="berhasil3" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox1">Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tidak_berhasil3" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox2">Tidak Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="butuh_waktu3" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox3">Butuh Waktu Lebih Lama</label>
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
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="berhasil4" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox1">Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tidak_berhasil4" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox2">Tidak Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="butuh_waktu4" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox3">Butuh Waktu Lebih Lama</label>
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
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="berhasil5" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox1">Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tidak_berhasil5" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox2">Tidak Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="butuh_waktu5" value="✔">
                                    <label class="form-check-label" for="inlineCheckbox3">Butuh Waktu Lebih Lama</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <input type="text" value="Y" name="action_plan_true">

            <input type="text" hidden name="goals_anda" value="<?= $action_plan['id_goals']; ?>" style="display: none;">
            <input type="text" hidden name="user_id" value="<?= $user['id_user']; ?>" style="display: none;">
            <br>
            <div class="form-group">
                <label>Success Criteria : </label>
                <input type="text" class="form-control col-md-3" name="criteria">
            </div>
            <div class="form-group">
                <label>Sesi Coaching Yang Ke Berapa : </label>
                <select class="form-select" name="minggu_keberapa" aria-label="Default select example">
                    <option selected>Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <a href="<?= base_url('coaches/home/index'); ?>" class="btn btn-danger">Kembali ke main menu</a>
            <button type="submit" class="btn btn-primary">Simpan action plan</button>
        </form>
    </div>
</div>