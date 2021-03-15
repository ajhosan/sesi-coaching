<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h1 style="text-align: center;">Laporan Coaching Sesi Keempat</h1>
        </div>
        <div class="card-body">
            <div class="profil">
                <h2>Profil</h2>
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: left;">
                                <p>Nama</p>
                            </th>
                            <td>
                                <p>: <?= $data_actionplan1['nama_user']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">
                                <p>Email</p>
                            </th>
                            <td>
                                <p>: <?= $data_actionplan1['email_user']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">
                                <p>Sesi coaching pada tanggal</p>
                            </th>
                            <td>
                                <p>:
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <?= $data_show['date_created']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">
                                <p>Sesi coaching yang ke</p>
                            </th>
                            <td>
                                <p>:
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <?= $data_show['action_plan_mingguke']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </p>
                            </td>
                        </tr>
                    </thead>
                </table>
                <hr>
                <h2>Report Sesi</h2>
                <table width="100%">
                    <thead>
                        <tr>
                            <th width="50%" style="text-align: left;">
                                <p>Goal :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <?= $data_show['goals']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </p>
                            </th>
                            <th width="50%" style="text-align:right;">
                                <p>Due Date :
                                    <?php foreach ($join_table as $data_show) : ?>
                                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                                <?= $data_show['duedate']; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </p>
                            </th>
                        </tr>
                    </thead>
                </table>
                <p style="font-weight: bold;">Success Criteria :
                    <?php foreach ($join_table as $data_show) : ?>
                        <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                            <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                <?= $data_show['success_criteria']; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?></p>
                <table width="100%" style="border: 1px solid black;">
                    <thead style="text-align: center;">
                        <tr>
                            <th width="5%" rowspan="2" style="border: 1px solid black;">Nomor</th>
                            <th width="75%" rowspan="2" style="border: 1px solid black;">Action Plan</th>
                            <th width="20%" colspan="3" style="border: 1px solid black;">Result</th>

                        </tr>
                        <tr>
                            <th><span style="font-size: 10px;" style="border: 1px solid black;">Berhasil</span></th>
                            <th><span style="font-size: 10px;" style="border: 1px solid black;">Tidak Berhasil</span></th>
                            <th><span style="font-size: 10px;" style="border: 1px solid black;">Butuh Waktu Lama</span></th>
                        </tr>
                    </thead>
                    <?php
                    $nomor = 1;
                    foreach ($action_plan4 as $show1) : ?>
                        <?php if ($data_actionplan1['id_user'] == $show1['id_user']) : ?>
                            <tbody style="text-align: left;" style="border: 1px solid black;">
                                <tr>
                                    <th style="border: 1px solid black;"><?= $nomor++ ?></th>
                                    <td style="border: 1px solid black;"><?= $show1['action_plan']; ?></td>
                                    <td style="border: 1px solid black;text-align:center; font-family: DejaVu Sans;"><?= $show1['berhasil']; ?></td>
                                    <td style="border: 1px solid black;text-align:center; font-family: DejaVu Sans;"><?= $show1['tidak_berhasil']; ?></td>
                                    <td style="border: 1px solid black;text-align:center; font-family: DejaVu Sans;"><?= $show1['butuh_waktu_lama']; ?></td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <br>
            <p>Coach Name : <b>Antonius Arif</b></p>
            <table width="100%" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th width="70%" style="border: 1px solid black; text-align:left;">
                            <p>Coaching Notes</p>
                        </th>
                        <th style="border: 1px solid black; text-align:left;">
                            <p>Result</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid black; text-align:left;">
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                        <p><?= nl2br($data_show['deskripsi_coach']); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td style="border: 1px solid black; text-align:left;">
                            <?php foreach ($join_table as $data_show) : ?>
                                <?php if ($data_show['id_user'] == $data_actionplan1['id_user']) : ?>
                                    <?php if ($data_show['action_plan_mingguke'] == 4) : ?>
                                        <p><?= nl2br($data_show['result_coach']); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>