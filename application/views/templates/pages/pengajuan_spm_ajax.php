<?php if ($user['id_role'] != 2) : ?>
    <?php
    $spmProses = "SELECT spm_masuk.id FROM spm_masuk JOIN data_user
                                                        ON spm_masuk.skpd=data_user.id
                                                        WHERE spm_masuk.tgl_aju LIKE '$tahunIdent%' AND spm_masuk.id_status=?
                                                        ";
    $jumlahProses = $this->db->query($spmProses, array(1))->num_rows();
    $jumlahTolak = $this->db->query($spmProses, array(2))->num_rows();
    $jumlahVerif = $this->db->query($spmProses, array(3))->num_rows();
    ?>
<?php elseif ($user['id_role'] = 2) : ?>
    <?php
    if ($user['status_skpd'] != 1) {
        $NameUser = $user['id'];
    } elseif ($user['status_skpd'] == 1) {
        $NameUser = 13;
    }
    $spmProses = "SELECT spm_masuk.id FROM spm_masuk JOIN data_user
                                                        ON spm_masuk.skpd=data_user.id
                                                        WHERE data_user.id='$NameUser' AND spm_masuk.tgl_aju LIKE '$tahunIdent%'
                                                        AND spm_masuk.id_status=?
                                                        ";
    $jumlahProses = $this->db->query($spmProses, array(1))->num_rows();
    $jumlahTolak = $this->db->query($spmProses, array(2))->num_rows();
    $jumlahVerif = $this->db->query($spmProses, array(3))->num_rows();
    ?>
<?php endif ?>
<?= form_error('menu', '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
<?= $this->session->flashdata('message'); ?>

<section class="section">
    <div class="row justify-content-center">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card-is  bg-light-warning-ismail">
                <div class="card-body px-1 py-1-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon bg-white" style="box-shadow: inset 5px -5px 2px #e0e0e0, inset -5px 5px 2px #fcfcfc;">
                                <!-- <i class="iconly-boldShow"></i> -->
                                <span>
                                    <i class="fa fa-fw fa-lg fa-pencil-square-o" style="color: rebeccapurple;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Proses</h6>
                            <h4 class="font-extrabold mb-0"><strong><?= $jumlahProses ?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card-is bg-light-danger">
                <div class="card-body px-1 py-1-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon bg-white" style="box-shadow: inset 5px -5px 2px #e0e0e0, inset -5px 5px 2px #fcfcfc;">
                                <span>
                                    <i class="fa fa-fw fa-lg fa-ban" style="color: rebeccapurple;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Ditolak</h6>
                            <h4 class="font-extrabold mb-0"><strong><?= $jumlahTolak ?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card-is bg-light-success-ismail">
                <div class="card-body px-1 py-1-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon bg-white" style="box-shadow: inset 5px -5px 2px #e0e0e0, inset -5px 5px 2px #fcfcfc;">
                                <span>
                                    <i class="fa fa-fw fa-lg fa-check-square-o" style="color: rebeccapurple;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Verified</h6>
                            <h4 class="font-extrabold mb-0"><strong><?= $jumlahVerif ?></strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">

            <!-- Menu Action -->
            <div class="row" id="table-hover-row">
                <div class="col-12">


                    <div class="card" style="padding: 7px;">
                        <h4 class="text-center">Data SPM <span><?= $tahunIdent ?></span></h4>
                        <details>
                            <summary style="color: #00B98E; font-size: 1.3rem;">Keterangan</summary>
                            <small style="padding-top: 15px;">
                                <table class="table-responsive" style="width:100%;">
                                    <tr>
                                        <th><span class="badge bg-light-warning-ismail">Proses</span></th>
                                        <th>:</th>
                                        <td>SPM yang diajukan sudah masuk dan menunggu diverifikasi oleh verifikator aset.</td>
                                    </tr>
                                    <tr>
                                        <th><span class="badge bg-light-danger">Ditolak</span></th>
                                        <th>:</th>
                                        <td>SPM yang diajukan terdapat kesalahan <strong>(bisa berupa data entry atau lembar SPM)</strong> yang perlu diperbaiki.</td>
                                    </tr>
                                    <tr>
                                        <th><span class="badge bg-light-success-ismail">Diverifikasi</span></th>
                                        <th>:</th>
                                        <td>SPM yang diajukan <strong>clear</strong> dan sudah diverifikasi.</td>
                                    </tr>
                                </table>
                                <br>
                                <table class="table-responsive" style="width:100%; display: flex; justify-content: center;">
                                    <tr>
                                        <th><span class="badge bg-info"><i class="bi bi-file-earmark-text"></i></span></th>
                                        <th style="padding: 7px;">:</th>
                                        <td style="padding-right: 7px;">file yang telah diupload</td>
                                        <th style="border-left: 1px solid gray; padding: 7px;"> </th>
                                        <th><span class="badge bg-danger"><i class="bi bi-eye"></i></span></th>
                                        <th style="padding: 7px;">:</th>
                                        <td>lihat detail penolakan</td>
                                    </tr>
                                    <tr style="border-top: 1px solid gray; padding: 7px;">
                                        <th><span class="badge bg-success"><i class="bi bi-printer"></i></span></th>
                                        <th style="padding: 7px;">:</th>
                                        <td style="padding-right: 7px;">lembar verifikasi siap print</td>
                                        <th style="border-left: 1px solid gray; padding: 7px;"> </th>
                                        <th><span class="badge btn-edit-ismail"><i class="bi bi-pencil-square"></i></span></th>
                                        <th style="padding: 7px;">:</th>
                                        <td>edit SPM yang ditolak</td>
                                    </tr>
                                </table>
                            </small>
                        </details>
                        <div class="card-content">
                            <!-- table hover -->
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
                                        <?php if ($user['id_role'] != 2) : ?>
                                            <?php
                                            $i = 1;
                                            $spmQuery = "SELECT spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_aju, data_user.name, spm_masuk.no_spm, spm_masuk.no_spm, spm_masuk.dokumen,spm_masuk.id_status, status_spm.kelas, status_spm.status, spm_masuk.catatan FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user
                                                            ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.tgl_aju LIKE '$tahunIdent%'
                                                            ORDER BY spm_masuk.reg DESC
                                                            ";
                                            $spm_masuk = $this->db->query($spmQuery)->result_array();
                                            ?>
                                        <?php elseif ($user['id_role'] = 2) : ?>
                                            <?php
                                            $i = 1;
                                            $IdUser = $user['id'];
                                            $spmQuery = "SELECT spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_aju, data_user.name, spm_masuk.no_spm, spm_masuk.no_spm, spm_masuk.dokumen,spm_masuk.id_status, status_spm.kelas, status_spm.status, spm_masuk.catatan FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user
                                                            ON spm_masuk.skpd=data_user.id
                                                            WHERE data_user.id=$IdUser AND spm_masuk.tgl_aju LIKE '$tahunIdent%'
                                                            ORDER BY spm_masuk.id DESC
                                                            ";
                                            $spm_masuk = $this->db->query($spmQuery)->result_array();
                                            ?>
                                        <?php endif ?>
                                        <?php foreach ($spm_masuk as $mspm) : ?>
                                            <?php if ($mspm['id_status'] == 2) : ?>
                                                <tr style="background-color: #f1e4e6fa;">
                                                <?php else : ?>
                                                <tr>
                                                <?php endif; ?>
                                                <td class="text-center"><?= $i; ?></td>
                                                <td class="text-center"><?= $mspm['tgl_aju']; ?></td>
                                                <?php if ($user['id_role'] != 2) : ?>
                                                    <td class="text-center"><?= $mspm['name']; ?></td>
                                                <?php elseif ($user['id_role'] = 2) : ?>
                                                    <!-- nothing -->
                                                <?php endif ?>
                                                <td class="text-center"><?= $mspm['no_spm']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($mspm['id_status'] == 3) : ?>
                                                        <a href="<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>','popup','width=600,height=600'); return false;" title="File yang diupload">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                        </a>
                                                        <?php
                                                        $idSPM = $mspm['id_masuk_spm'];
                                                        ?>
                                                        <a href="<?= base_url('SPM/index/' . $idSPM) ?>" class="badge bg-success" target="popup" onclick="window.open('<?= base_url('SPM/index/' . $idSPM) ?>','popup'); return false;" title="Kartu Verifikasi">
                                                            <i class="bi bi-printer"></i>
                                                        </a>
                                                    <?php elseif ($mspm['id_status'] == 1) : ?>
                                                        <a href="<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>','popup','width=600,height=600'); return false;" title="File yang diupload">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                        </a>
                                                    <?php elseif ($mspm['id_status'] == 2) : ?>
                                                        <a title="File yang diupload" href="<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>','popup','width=600,height=600'); return false;">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                        </a>
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#viewCatatan<?= $mspm['id_masuk_spm']; ?>" class="badge bg-danger" title="Lihat Catatan Penolakan">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        <?php $id_edit_spm = $mspm['id_masuk_spm'] ?>
                                                        <!-- <?php if ($user['id_role'] == 1) : ?>
                                                                <a href="<?= base_url('admin/view_edit_pengajuan_spm/') . $id_edit_spm ?>" class="badge btn-edit-ismail"><i class="bi bi-pencil-square"></i></a>
                                                            <?php elseif ($user['id_role'] == 2) : ?>
                                                                <a href="<?= base_url('user/view_edit_pengajuan_spm/') . $id_edit_spm ?>" class="badge btn-edit-ismail"><i class="bi bi-pencil-square"></i></a>
                                                            <?php elseif ($user['id_role'] == 4) : ?>
                                                                <a href="<?= base_url('developer/view_edit_pengajuan_spm/') . $id_edit_spm ?>" class="badge btn-edit-ismail"><i class="bi bi-pencil-square"></i></a>
                                                            <?php endif ?> -->
                                                        <!-- Lihat Catatan Modal -->
                                                        <div class="modal-info me-1 mb-1 d-inline-block">
                                                            <!--info theme Modal -->
                                                            <div class="modal fade text-left" id="viewCatatan<?= $mspm['id_masuk_spm']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
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
                                                                                        <?= $mspm['catatan']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer bg-info">
                                                                            <?php
                                                                            $idSPM = $mspm['id_masuk_spm'];
                                                                            ?>
                                                                            <button title="Sudah selesai diedit? Ajukan Ulang" type="button" class="btn btn-success" onclick="myAjukanLagi<?= $idSPM ?>()">
                                                                                <i class="fa fa-fw fa-upload"></i>&nbsp;Ajukan Ulang
                                                                            </button>
                                                                            <script>
                                                                                function myAjukanLagi<?= $idSPM ?>() {
                                                                                    let text = "Anda Yakin Mengajukan ulang SPM ini?\nApakah SPM ini sudah diperbaiki?\n<?= $idSPM ?>";
                                                                                    if (confirm(text) == true) {
                                                                                        window.location.href =
                                                                                            "<?= base_url('auth/ajukan_ulang/' . $idSPM); ?>";
                                                                                    } else {
                                                                                        Swal.fire({
                                                                                            title: "Dibatalkan!",
                                                                                            text: "SPM batal diajukan",
                                                                                            icon: "error",
                                                                                            showConfirmButton: false,
                                                                                            timer: 1500
                                                                                        })
                                                                                    }
                                                                                }
                                                                            </script>
                                                                            <button type="button" class="btn btn-danger ml-1" onclick="myDelete<?= $idSPM ?>()">
                                                                                <i class="fa fa-fw fa-trash"></i>&nbsp;Hapus SPM
                                                                            </button>
                                                                            <script>
                                                                                function myDelete<?= $idSPM ?>() {
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
                                                            <div class="modal fade text-left" id="editSPM<?= $mspm['id_masuk_spm'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-edit-ismail">
                                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                                            </button>
                                                                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                                Edit SPM <?= $mspm['id_masuk_spm'] ?>
                                                                            </h4>
                                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php
                                                                            $id = $mspm['id_masuk_spm'];
                                                                            ?>
                                                                            <form id="edit<?= $mspm['id_masuk_spm'] ?>" action="<?= base_url('auth/edit_spm_Aju/') . $id ?>" method="post">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="no_spm" style="display: flex; justify-content:start;">
                                                                                            <h6><i class="bi bi-bar-chart-line-fill"></i> No. SPM</h6>
                                                                                        </label>
                                                                                        <div class="position-relative">
                                                                                            <input type="text" class="form-control" value="<?= $mspm['no_spm'] ?>" id="no_spm" name="no_spm" required>
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
                                                                                                <option class="bg-light-warning" <?= $mspm['jenis'] == "BELANJA MODAL" ? "selected" : null ?> value="BELANJA MODAL">BELANJA MODAL</option>
                                                                                                <option class="bg-light-success" <?= $mspm['jenis'] == "BELANJA PERSEDIAAN" ? "selected" : null ?> value="BELANJA PERSEDIAAN">BELANJA PERSEDIAAN</option>
                                                                                                <option class="bg-light-danger" <?= $mspm['jenis'] == "BUKAN BELANJA MODAL/PERSEDIAAN" ? "selected" : null ?> value="BUKAN BELANJA MODAL/PERSEDIAAN">BUKAN BELANJA MODAL/PERSEDIAAN
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
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge <?= $mspm['kelas'] ?>"><?= $mspm['status'] ?></span>
                                                    <?php if ($mspm['catatan'] == '') : ?>
                                                        <!-- nothing -->
                                                    <?php elseif ($mspm['catatan'] != '' and $mspm['id_status'] == 1) : ?>
                                                        <span class="text-danger"><small>resubmit</small></span>
                                                    <?php endif; ?>
                                                </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <!-- /Menu Action -->
        </div>
    </div>
</section>