                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Peserta</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Coaches</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">Nomor</th>
                                            <th>Nama Coaches</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($record as $show) : ?>
                                        <?php if ($show['id_role'] == 1) : ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $show['nama_user'] ?></td>
                                                    <td>
                                                        <a class="btn btn-primary" href="<?= base_url(); ?>coach/coachcontroller/tampil_data/<?= $show['id_user'] ?>">Lihat Data</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>