                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="verif-tab" data-bs-toggle="tab" href="#verif" role="tab" aria-controls="verif" aria-selected="true">Verified</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="proses-tab" data-bs-toggle="tab" href="#proses" role="tab" aria-controls="proses" aria-selected="false">Proses</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tolak-tab" data-bs-toggle="tab" href="#tolak" role="tab" aria-controls="tolak" aria-selected="false">Tolak</a>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="tab-content" id="myTabContent">
                                        <?php if ($user['id_role'] != 2) : ?>
                                            <?php
                                            $spmQuery = "SELECT spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_aju, data_user.name, spm_masuk.no_spm, spm_masuk.no_spm, spm_masuk.dokumen,spm_masuk.id_status, status_spm.kelas, status_spm.status, spm_masuk.catatan FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user
                                                            ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.tgl_aju LIKE '$tahunIdent%' AND spm_masuk.id_status=?
                                                            ORDER BY spm_masuk.reg DESC
                                                            ";
                                            ?>
                                        <?php elseif ($user['id_role'] = 2) : ?>
                                            <?php
                                            $NameUser = $user['id'];
                                            $spmQuery = "SELECT spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_aju, data_user.name, spm_masuk.no_spm, spm_masuk.no_spm, spm_masuk.dokumen,spm_masuk.id_status, status_spm.kelas, status_spm.status, spm_masuk.catatan FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user
                                                            ON spm_masuk.skpd=data_user.id
                                                            WHERE data_user.id=$NamaUser AND spm_masuk.tgl_aju LIKE '$tahunIdent%' AND spm_masuk.id_status=?
                                                            ORDER BY spm_masuk.id DESC
                                                            ";
                                            ?>
                                        <?php endif ?>
                                        <?php
                                        $i = 1;
                                        $spm_proses = $this->db->query($spmQuery, array(1))->result_array();
                                        $spm_tolak = $this->db->query($spmQuery, array(2))->result_array();
                                        $spm_verified = $this->db->query($spmQuery, array(3))->result_array();
                                        ?>
                                        <div class="tab-pane fade show active" id="verif" role="tabpanel" aria-labelledby="verif-tab">
                                            <h4 class="text-center">SPM Terverifikasi <span><?= $tahunIdent ?></span></h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0" id="table1">
                                                    <thead class="thead-ismail">
                                                        <tr>
                                                            <th class="text-center">NO</th>
                                                            <th class="text-center">TANGGAL</th>
                                                            <?php if ($user['id_role'] != 2) : ?>
                                                                <th class="text-center">SKPD</th>
                                                            <?php elseif ($user['id_role'] = 2) : ?>
                                                                <!-- nothing -->
                                                            <?php endif ?>
                                                            <th class="text-center">NO. SPM</th>
                                                            <th class="text-center">CATATAN</th>
                                                            <th class="text-center">STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data">
                                                        <?php foreach ($spm_verified as $mspm) : ?>
                                                            <tr>
                                                                <td class="text-center"><?= $i; ?></td>
                                                                <td class="text-center"><?= $mspm['tgl_aju']; ?></td>
                                                                <?php if ($user['id_role'] != 2) : ?>
                                                                    <td class="text-center"><?= $mspm['name']; ?></td>
                                                                <?php elseif ($user['id_role'] = 2) : ?>
                                                                    <!-- nothing -->
                                                                <?php endif ?>
                                                                <td class="text-center"><?= $mspm['no_spm']; ?></td>
                                                                <td class="text-center">
                                                                    <a href="<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>','popup','width=600,height=600'); return false;" title="File yang diupload">
                                                                        <i class="bi bi-file-earmark-text"></i>
                                                                    </a>
                                                                    <?php
                                                                    $idSPM = $mspm['id_masuk_spm'];
                                                                    ?>
                                                                    <a href="<?= base_url('SPM/index/' . $idSPM) ?>" class="badge bg-success" target="popup" onclick="window.open('<?= base_url('SPM/index/' . $idSPM) ?>','popup'); return false;" title="Kartu Verifikasi">
                                                                        <i class="bi bi-printer"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge <?= $mspm['kelas'] ?>"><?= $mspm['status'] ?></span>
                                                                </td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                                            <h4 class="text-center">SPM Diproses <span><?= $tahunIdent ?></span></h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0" id="tableprosesUser" style="width: 100%;">
                                                    <thead class="thead-ismail">
                                                        <tr>
                                                            <th class="text-center">NO</th>
                                                            <th class="text-center">TANGGAL</th>
                                                            <?php if ($user['id_role'] != 2) : ?>
                                                                <th class="text-center">SKPD</th>
                                                            <?php elseif ($user['id_role'] = 2) : ?>
                                                                <!-- nothing -->
                                                            <?php endif ?>
                                                            <th class="text-center">NO. SPM</th>
                                                            <th class="text-center">CATATAN</th>
                                                            <th class="text-center">STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data">
                                                        <?php foreach ($spm_proses as $pspm) : ?>
                                                            <tr>
                                                                <td class="text-center"><?= $i; ?></td>
                                                                <td class="text-center"><?= $pspm['tgl_aju']; ?></td>
                                                                <?php if ($user['id_role'] != 2) : ?>
                                                                    <td class="text-center"><?= $pspm['name']; ?></td>
                                                                <?php elseif ($user['id_role'] = 2) : ?>
                                                                    <!-- nothing -->
                                                                <?php endif ?>
                                                                <td class="text-center"><?= $pspm['no_spm']; ?></td>
                                                                <td class="text-center">
                                                                    <a href="<?= base_url('assets/doc/SPMDOC/') . $pspm['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $pspm['dokumen']; ?>','popup','width=600,height=600'); return false;" title="File yang diupload">
                                                                        <i class="bi bi-file-earmark-text"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge <?= $pspm['kelas'] ?>"><?= $pspm['status'] ?></span>
                                                                    <?php if ($pspm['catatan'] == '') : ?>
                                                                        <!-- nothing -->
                                                                    <?php elseif ($pspm['catatan'] != '' and $pspm['id_status'] == 1) : ?>
                                                                        <span class="text-danger"><small>resubmit</small></span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <script>
                                                    new DataTable('#tableprosesUser', {
                                                        order: [
                                                            [0, 'asc']
                                                        ]
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tolak" role="tabpanel" aria-labelledby="tolak-tab">
                                            <h4 class="text-center">SPM Ditolak <span><?= $tahunIdent ?></span></h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0" id="tabletolakUser" style="width: 100%;">
                                                    <thead class="thead-ismail">
                                                        <tr>
                                                            <th class="text-center">NO</th>
                                                            <th class="text-center">TANGGAL</th>
                                                            <?php if ($user['id_role'] != 2) : ?>
                                                                <th class="text-center">SKPD</th>
                                                            <?php elseif ($user['id_role'] = 2) : ?>
                                                                <!-- nothing -->
                                                            <?php endif ?>
                                                            <th class="text-center">NO. SPM</th>
                                                            <th class="text-center">CATATAN</th>
                                                            <th class="text-center">STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data">
                                                        <?php foreach ($spm_tolak as $tspm) : ?>
                                                            <tr style="background-color: #f1e4e6fa;">
                                                                <td class="text-center"><?= $i; ?></td>
                                                                <td class="text-center"><?= $tspm['tgl_aju']; ?></td>
                                                                <?php if ($user['id_role'] != 2) : ?>
                                                                    <td class="text-center"><?= $tspm['name']; ?></td>
                                                                <?php elseif ($user['id_role'] = 2) : ?>
                                                                    <!-- nothing -->
                                                                <?php endif ?>
                                                                <td class="text-center"><?= $tspm['no_spm']; ?></td>
                                                                <td class="text-center">
                                                                    <a title="File yang diupload" href="<?= base_url('assets/doc/SPMDOC/') . $tspm['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $tspm['dokumen']; ?>','popup','width=600,height=600'); return false;">
                                                                        <i class="bi bi-file-earmark-text"></i>
                                                                    </a>
                                                                    <a href="" data-bs-toggle="modal" data-bs-target="#viewCatatan<?= $tspm['id_masuk_spm']; ?>" class="badge bg-danger" title="Lihat Catatan Penolakan">
                                                                        <i class="bi bi-eye"></i>
                                                                    </a>
                                                                    <?php $id_edit_spm = $tspm['id_masuk_spm'] ?>
                                                                    <!-- Lihat Catatan Modal -->
                                                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                                                        <!--info theme Modal -->
                                                                        <div class="modal fade text-left" id="viewCatatan<?= $tspm['id_masuk_spm']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-info">
                                                                                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                        </button>
                                                                                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle">
                                                                                            Catatan Ditolak
                                                                                        </h4>
                                                                                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="col-md-8 col-12 offset-md-2">
                                                                                            <img class="img-error" src="<?= base_url('assets/') ?>images/samples/reject-animate.png" alt="Tolak" width="230">
                                                                                            <div class="text-center">
                                                                                                <h1 class="error-title">Ditolak</h1>
                                                                                                <p style="color: white;">Catatan:</p>
                                                                                                <p class="fs-5" style="color: yellow;">
                                                                                                    <?= $tspm['catatan']; ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer bg-info">
                                                                                        <?php
                                                                                        $idSPM = $tspm['id_masuk_spm'];
                                                                                        ?>
                                                                                        <a href="<?= $user['id_role'] == 1 ? base_url('admin/view_edit_pengajuan_spm/' . $idSPM) : ($user['id_role'] == 2 ? base_url('user/view_edit_pengajuan_spm/' . $idSPM) : null) ?>" title="Edit SPM & Ajukan Ulang" type="button" class="btn btn-edit-ismail">
                                                                                            <i class="fa fa-fw fa-upload"></i>&nbsp;Edit & Ajukan Ulang
                                                                                        </a>
                                                                                        <!-- <script>
                                                                                            function myAjukanLagiAjax<?= $idSPM ?>() {
                                                                                                window.location.href =
                                                                                                    "<?= $user['id_role'] == 1 ? base_url('admin/view_edit_pengajuan_spm/' . $idSPM) : ($user['id_role'] == 2 ? base_url('user/view_edit_pengajuan_spm/' . $idSPM) : null) ?>";
                                                                                            }
                                                                                        </script> -->
                                                                                        <button type="button" class="btn btn-danger ml-1" onclick="myDeleteAjax<?= $idSPM ?>()">
                                                                                            <i class="fa fa-fw fa-trash"></i>&nbsp;Hapus SPM
                                                                                        </button>
                                                                                        <script>
                                                                                            function myDeleteAjax<?= $idSPM ?>() {
                                                                                                let text = "Anda Yakin Menghapus SPM ini?\n<?= $idSPM ?>";
                                                                                                if (confirm(text) == true) {
                                                                                                    window.location.href =
                                                                                                        "<?= base_url('auth/hapus_SPM/' . $idSPM); ?>";
                                                                                                } else {
                                                                                                    Swal.fire({
                                                                                                        title: "Dibatalkan!",
                                                                                                        text: "SPM batal dihapus",
                                                                                                        icon: "error",
                                                                                                        showConfirmButton: false,
                                                                                                        timer: 1500
                                                                                                    })
                                                                                                }
                                                                                            }
                                                                                        </script>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /Lihat Catatan Modal -->
                                                                    <!-- Modal Edit -->
                                                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                                                        <!--info theme Modal -->
                                                                        <div class="modal fade text-left" id="editSPM<?= $tspm['id_masuk_spm'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-edit-ismail">
                                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                                            <i class="fa-fw fa-lg fa fa-times"></i>
                                                                                        </button>
                                                                                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                                            Edit SPM <?= $tspm['id_masuk_spm'] ?>
                                                                                        </h4>
                                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                                            <i class="fa-fw fa-lg fa fa-times"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <?php
                                                                                        $id = $tspm['id_masuk_spm'];
                                                                                        ?>
                                                                                        <form id="edit<?= $tspm['id_masuk_spm'] ?>" action="<?= base_url('auth/edit_spm_Aju/') . $id ?>" method="post">
                                                                                            <div class="col-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="no_spm" style="display: flex; justify-content:start;">
                                                                                                        <h6><i class="bi bi-bar-chart-line-fill"></i> No. SPM</h6>
                                                                                                    </label>
                                                                                                    <div class="position-relative">
                                                                                                        <input type="text" class="form-control" value="<?= $tspm['no_spm'] ?>" id="no_spm" name="no_spm" required>
                                                                                                        <?= form_error('no_spm', '<small class="text-danger">', '</small>') ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label for="jenis" style="display: flex; justify-content:start;">
                                                                                                        <h6><i class="bi bi-bookmark-check"></i> Jenis</h6>
                                                                                                    </label>
                                                                                                    <div class="position-relative">
                                                                                                        <select class="form-select" id="jenis" name="jenis" required>
                                                                                                            <option disabled value="">--Pilih Jenis SPM--</option>
                                                                                                            <option class="bg-light-warning" <?= $tspm['jenis'] == "BELANJA MODAL" ? "selected" : null ?> value="BELANJA MODAL">BELANJA MODAL</option>
                                                                                                            <option class="bg-light-success" <?= $tspm['jenis'] == "BELANJA PERSEDIAAN" ? "selected" : null ?> value="BELANJA PERSEDIAAN">BELANJA PERSEDIAAN</option>
                                                                                                            <option class="bg-light-danger" <?= $tspm['jenis'] == "BUKAN BELANJA MODAL/PERSEDIAAN" ? "selected" : null ?> value="BUKAN BELANJA MODAL/PERSEDIAAN">BUKAN BELANJA MODAL/PERSEDIAAN
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label for="dokumenEdit" style="display: flex; justify-content:start; margin-bottom: -15px;">
                                                                                                        <h6><i class="bi bi-file-earmark-bar-graph"></i> Dokumen SPM</h6>
                                                                                                    </label>
                                                                                                    <small style="color: yellow;">Jika ada perubahan lembar SPM, bisa diupload ulang. Jika tidak ada, dikosongi saja</small>
                                                                                                    <div class="input-group mb-3">
                                                                                                        <label class="input-group-text" for="document"><i class="bi bi-upload"></i></label>
                                                                                                        <input type="file" class="form-control" id="dokumenEdit" name="dokumenEdit">
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button id="update<?= $id ?>" class="btn btn-edit-ismail ml-1">
                                                                                                    <i class="bx bx-check"></i>
                                                                                                    <span><i class="fa fa-fw fa-level-up"></i>
                                                                                                        Update</span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <script>
                                                                        document.getElementById("update<?= $id ?>").addEventListener("click",
                                                                            function(event) {
                                                                                event.preventDefault();
                                                                                Swal.fire({
                                                                                    icon: "question",
                                                                                    title: "Anda Yakin Mengedit SPM ini?",
                                                                                    showCancelButton: true,
                                                                                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                                    reverseButtons: false,
                                                                                    cancelButtonColor: '#DD6B55',
                                                                                }).then((result) => {
                                                                                    if (result.isConfirmed) {
                                                                                        document.getElementById("edit<?= $id ?>").submit();
                                                                                    } else {
                                                                                        Swal.fire({
                                                                                            title: "Dibatalkan!",
                                                                                            text: "SPM batal diedit",
                                                                                            icon: "error",
                                                                                            showConfirmButton: false,
                                                                                            timer: 1300
                                                                                        })
                                                                                    }
                                                                                })
                                                                            })
                                                                    </script>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge <?= $tspm['kelas'] ?>"><?= $tspm['status'] ?></span>
                                                                </td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <script>
                                                    new DataTable('#tabletolakUser', {
                                                        order: [
                                                            [1, 'asc']
                                                        ]
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>