<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sesi Coaching</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h2 style="color: black;">Tambah Goals Anda <p><span style="font-size: 15px; color:gray;">Masukan Maximal 7 Goals</span></p>
                </h2>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="<?= base_url('coaches/home/tambah_goals'); ?>">
                    <input type="text" name="user_id" value="<?= $user['id_user']; ?>" hidden style="display: none;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Goals Anda</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="goals" rows="5" placeholder="Isikan goals Anda..." id="floatingTextarea"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save Data</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h2 style="color: black;">Goals Anda <p><span style="font-size: 15px; color:gray;">Masukan Maximal 7 Goals</span></p>
                </h2>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Goals</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($goals as $show) : ?>
                            <tbody>

                                <tr>
                                    <th><?= $no++; ?></th>
                                    <td><?= $show['goals']; ?></td>
                                    <td><?= $show['duedate']; ?></td>
                                    <td><a href="<?= base_url(); ?>coaches/home/form_action_plan<?= $show['id_goals'] ?>">Tambah Action Plan</a></td>
                                </tr>

                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h2 style="color: black; text-align:center;">Action Plan Anda</h2>
            </div>
            <!-- <tr>
                    <th rowspan="2" bgcolor="yellow">Bulan</th>
                    <th colspan="2" bgcolor="#00ff80">Hasil Panen</th>
                </tr>
                <tr>
                    <th>Padi</th>
                    <th>Kacang</th>
                </tr> -->
            <!-- Card Body -->
            <div class="card-body">
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
                        <tbody style="text-align: center;">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@meqwedo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>