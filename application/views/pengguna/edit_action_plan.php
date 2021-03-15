<div class="card">
    <h5 class="card-header">Tambah Action Plan</h5>
    <div class="card-body">
        <form method="POST" action="<?= base_url('coaches/home/edit_action_now'); ?>">
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
                                        <textarea class="form-control" rows="5" name="actionplan1" placeholder="Leave a comment here" id="floatingTextarea"><?= $action_plan['action_plan']; ?></textarea>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="berhasil" value="✔" <?= $action_plan['berhasil'] ? "checked"  : '✔'; ?>>
                                    <label class="form-check-label" for="inlineCheckbox1">Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="tidak_berhasil" value="✔" <?= $action_plan['tidak_berhasil'] ? "checked"  : '✔'; ?>>
                                    <label class="form-check-label" for="inlineCheckbox2">Tidak Berhasil</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="butuh_waktu" value="✔" <?= $action_plan['butuh_waktu_lama'] ? "checked"  : '✔'; ?>>
                                    <label class="form-check-label" for="inlineCheckbox3">Butuh Waktu Lebih Lama</label>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <input type="text" hidden name="id_actionplan" value="<?= $action_plan['id_actionplan'] ?>">

            <br>
            <!-- <div class="form-group">
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
            </div> -->
            <a href="<?= base_url('coaches/home/index'); ?>" class="btn btn-danger">Kembali ke main menu</a>
            <button type="submit" class="btn btn-primary">Simpan action plan</button>
        </form>
    </div>
</div>