<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Sesi Coaching</title>
</head>

<body>

    <div>
        <h2>Summary Sesi Coaching</h2>

        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 style="color: black;">Goals yang dipilih :
                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                    <?= $data_show['goals']; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </h4>
                </div>
                <div class="col-lg-6" style="color: black;">
                    <h4>Success Criteria :

                        <?php foreach ($join_table as $data_show) : ?>
                            <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                <?php if ($data_show['action_plan_mingguke'] == 1) : ?>
                                    <?= $data_show['success_criteria']; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th width="1%" rowspan="2">Nomor</th>
                            <th width="60%" rowspan="2" style="text-align: left;">Action Plan</th>

                            <th width="10%" colspan="3">Result</th>

                        </tr>
                        <tr>
                            <th>Berhasil</th>
                            <th>Tidak Berhasil</th>
                            <th>Butuh Waktu Lama</th>
                        </tr>
                    </thead>
                    <?php
                    $nomor = 1;
                    foreach ($actionplan1 as $show1) : ?>
                        <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>

                            <tbody style="text-align: center;">
                                <tr>
                                    <th><?= $nomor++; ?></th>
                                    <td style="text-align: left;"><?= $show1['action_plan']; ?></td>
                                    <td><?= $show1['berhasil']; ?></td>
                                    <td><?= $show1['tidak_berhasil']; ?></td>
                                    <td><?= $show1['butuh_waktu_lama']; ?></td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>

    </div>

</body>

</html>