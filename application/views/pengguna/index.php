<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sesi Coaching</h1>
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

            <div class="card-body">
                <form method="POST" action="<?= base_url('coaches/home/tambah_goals'); ?>">
                    <input type="text" name="user_id" value="<?= $user['id_user']; ?>" hidden style="display: none;">
                    <input type="text" hidden name="saved_pertemuan" value="<?= $user['pertemuan_ke'] ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Goals Anda</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="goals" rows="5" placeholder="Isikan goals Anda..." id="floatingTextarea" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save Data</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h2 style="color: black;">Goals Anda <p><span style="font-size: 15px; color:gray;">Masukan Maximal 7 Goals</span></p>
                </h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Nomor</th>
                                <th scope="col" width="35%">Goals</th>
                                <th scope="col" width="20%">Due Date</th>
                                <th scope="col" width="35%">Action</th>

                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($goals as $show) : ?>
                            <?php if ($user['id_user'] == $show['id_user']) : ?>
                                <!-- <?= var_dump($show); ?> -->
                                <tbody>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td><?= $show['goals']; ?></td>
                                        <td><?= $show['duedate']; ?></td>

                                        <?php $validasi = $show['action_plan_true'] == NULL;
                                        $tong = $validasi == $show['id_user']; ?>

                                        <?php $validasi_onprogress = $show['progres_coaching'];
                                        $not_active = $validasi_onprogress == $show['id_user'];
                                        ?>

                                        <?php if ($validasi == TRUE) : ?>
                                            <td>
                                                <a href="<?= base_url(); ?>coaches/home/form_action_plan/<?= $show['id_goals']; ?>" class="btn btn-primary">Tambah Action Plan</a>
                                            </td>
                                        <?php else : ?>
                                            <td><a style="color: white; background-color:green; padding:4px; border-radius:5px;">Terimakasih Telah Mengisi Data</a></td>
                                        <?php endif; ?>

                                    </tr>

                                </tbody>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2 style="color: black; text-align:center;">Histori Sesi Coaching</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($goals_user as $show) : ?>
                <div class="col-md-6">
                    <div class="card" style="margin-bottom: 2%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 style="color: black;">Goals :
                                        <?= $show['goals']; ?>
                                    </h3>
                                    <p>Pertemuan ke : <?= $show['pertemuan_ke']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <a href="<?= base_url(); ?>coaches/transisi_sesi/lihat_isigoals/<?= $show['id_goals']; ?>" class="btn btn-primary float-right" style="margin-top: 60%;">Lihat Goals ini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>