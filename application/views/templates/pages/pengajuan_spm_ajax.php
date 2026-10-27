<?php $tahunIdent = (int) $tahunIdent; ?>
<?php if ($user['id_role'] != 2) : ?>
    <?php
    $spmProses = "SELECT spm_masuk.id FROM spm_masuk JOIN data_user
                                                        ON spm_masuk.skpd=data_user.id
                                                        WHERE spm_masuk.tgl_aju >= '$tahunIdent-01-01' AND spm_masuk.tgl_aju < '".((int)$tahunIdent + 1)."-01-01' AND spm_masuk.id_status=?
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
                                                        WHERE data_user.id='$NameUser' AND spm_masuk.tgl_aju >= '$tahunIdent-01-01' AND spm_masuk.tgl_aju < '".((int)$tahunIdent + 1)."-01-01'
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
                                <table class="table table-hover mb-0" id="tableBaradaTahun" data-ssp-url="<?= base_url('auth/spm_data_barada?status=all&total=0&tahun=' . (int) $tahunIdent) ?>" data-ssp-noorder="0,<?= $user['id_role'] != 2 ? (false ? 5 : 4) : (false ? 4 : 3) ?>" data-base="<?= base_url() ?>">
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
                                    <tbody></tbody>
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