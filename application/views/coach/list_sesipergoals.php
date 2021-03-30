<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-5">
                <h3 style="color:black;">
                    <span style="background-color: #2043E5; border-radius:8px; padding:5px; color:white;">Goals Anda :</span>
                    <?= $goals_user['goals']; ?>
                </h3>
            </div>
            <div class="col-md-7">
                <h3 style="color:black;">
                    <span style="background-color: #8BC34A; border-radius:8px; padding:5px; color:white;">Criteria success :</span>
                    <?= $goals_user['success_criteria']; ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <a href="<?= base_url('coach/coachcontroller/tampil_data/'); ?><?= $goals_user['id_user'] ?>" class="btn btn-danger"> Kembali ke halaman utama</a>

        <?php
        $no = 1;

        foreach ($action_show as $show) : ?>
            <div class="card" style="margin:3%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="color: black;">Sesi ke : <?= $show['sesi_ke']; ?></h4>
                            <p>Pertemuan ke : <?= $show['pertemuan_ke']; ?></p>
                            <p>Status : <?= $show['check_status'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url(); ?>coach/coach_histori/detail_goals_coachee/<?= $show['id_goals'] ?>/<?= $show['sesi_ke'] ?>/<?= $show['id_user']; ?>" class="btn btn-info btn-lg float-right">Lihat Sesi ini</a>
                        </div>
                    </div>


                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>