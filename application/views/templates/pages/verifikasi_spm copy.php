<div class="page-heading">
    <div class="page-title">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <img src="<?= base_url('assets/'); ?>images/logo/versi_barada_e2.png" alt="Versi Barada-E" class="responsive" height="60">
        </div>
        <div class="row">
            <br>
        </div>
    </div>
    <!-- 2//////////// -->
    <form id="formTahunLive" method="post" action="<?= base_url('admin/tampilkanDataByYearLive'); ?>">
        <div class="row justify-content-center">
            <div class="col-sm-3 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-info text-white" for="tahunLive">Pilih Tahun</span>
                    <select class="form-select" name="tahunLive" id="tahunLive">
                        <!-- Opsi tahun dapat diisi dari rentang tahun yang diinginkan -->
                        <?php for ($i = date("Y"); $i >= date("Y") - 2; $i--) : ?>
                            <option class="text-center" style="color:<?= $i == date('Y') - 2 ? 'red;' : ($i == date('Y') - 1 ? 'blue;' : 'green') ?>" value="<?= $i; ?>"><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <span class="input-group-text" style="border: none; background-color: transparent; font-weight: bolder;"><i class="fa fa-fw fa-lg fa-spin fa-spinner d-none" id="loader"></i></span>
                </div>
            </div>
        </div>
    </form>
    <!-- /2/////////// -->
    <div id="dataLive">
        <?= $this->session->flashdata('message'); ?>
        <div class="col-12">
            <div class="card" style="padding: 15px;">
                <h3 class="text-center">SPM Masuk <span><?= $tahunIdent ?></h3>
                <div class="row center-display">
                    <div class="col-md-6 center-display">
                        <a href="" data-bs-toggle="modal" data-bs-target="#lihatSPMproses">
                            <div class="card-is bg-light-warning-ismail">
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
                                            <h4 class="font-extrabold mb-0"><strong id="jml-proses"><?= $proses ?></strong></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#lihatSPMtolak">
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
                                            <h4 class="font-extrabold mb-0"><strong id="jml-tolak"><?= $tolak ?></strong></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#SPM_verified">
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
                                            <h4 class="font-extrabold mb-0"><strong id="jml-verif"><?= $verified ?></strong></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <script>
                    // Ajax jumlah
                    <?php
                    $echojml = base_url('auth/notif/');
                    ?>
                    var pathDocJml = "<?= $echojml ?>";

                    function UpdateJml() {
                        $.ajax({
                            url: pathDocJml,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                // Lakukan sesuatu dengan data yang diterima dari server
                                $("#jml-proses").html(data.jmlproses);
                                $("#jml-tolak").html(data.jmltolak);
                                $("#jml-verif").html(data.jmlverif);
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            },
                        });
                    }

                    // Panggil fungsi setiap beberapa waktu
                    setInterval(UpdateJml, 2000); // Contoh: perbarui setiap 2 detik
                </script>
            </div>
            <div class="card">
                <!-- Groups section start -->
                <section id="groups">

                    <div class="col-12">
                        <div id="SPM_verified" class="card" style="padding: 15px;">
                            <div class="card-content">
                                <h4 class="text-center">Data SPM Terverifikasi <span><?= $tahunIdent ?></span></h4>
                                <!-- //////////// -->
                                <!-- <form id="formTahun" method="post" action="<?= base_url('admin/tampilkanDataByYear'); ?>">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-2 mb-1">
                                            <div class="input-group mb-3">
                                                <select class="form-select" name="tahun" id="tahun">
                                                    <option value="<?= date("Y"); ?>" selected disabled>--Pilih Tahun--</option>
                                                    <?php for ($i = date("Y"); $i >= date("Y") - 2; $i--) : ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <button type="submit" class="input-group-text bg-info" id="cari-persediaan"><i class="fa fa-fw fa-lg fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function() {
                                        $('#formTahun').on('submit', function(e) {
                                            e.preventDefault(); // Menghentikan pengiriman form bawaan browser

                                            var formData = $(this).serialize(); // Mengambil data form

                                            $.ajax({
                                                type: 'POST',
                                                url: $(this).attr('action'),
                                                data: formData,
                                                success: function(response) {
                                                    $('#tampilData').html(response); // Memperbarui bagian tampilan dengan data yang baru
                                                }
                                            });
                                        });
                                    });
                                </script> -->
                                <!-- //////////// -->
                                <!-- table hover -->

                                <div class="table-responsive">
                                    <div>
                                        <table class="table table-hover mb-0" id="table1">
                                            <thead class=" thead-ismail">
                                                <tr>
                                                    <th class="text-center">WAKTU</th>
                                                    <th class="text-center">REG.</th>
                                                    <th class="text-center">NAMA SKPD</th>
                                                    <th class="text-center">NO. SPM</th>
                                                    <th class="text-center">BUKTI</th>
                                                    <th class="text-center">DOCUMENT</th>
                                                    <th class="text-center">VERIFIKATOR</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data">
                                                <?php
                                                $memoryBefore = memory_get_usage();
                                                $i = 1;
                                                ?>
                                                <?php foreach ($spm_masuk as $mspm) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $mspm['tgl_verif'] ?></td>
                                                        <td class="text-center"><?= $mspm['reg'] ?></td>
                                                        <td><?= $mspm['name'] ?></td>
                                                        <td class="text-center"><?= $mspm['no_spm'] ?></td>
                                                        <td class="text-center"><?= $mspm['jenis'] ?></td>
                                                        <td class="text-center">
                                                            <!-- <button title="Lihat detail" class="badge btn-success rounded-pill" onclick="finalDetail<?= $mspm['id_masuk_spm'] ?>()"><i class="fa fa-navicon"></i></button>
                                                    <script>
                                                        function finalDetail<?= $mspm['id_masuk_spm'] ?>() {
                                                            <?php
                                                            $id = $mspm['id_masuk_spm'];
                                                            ?>
                                                            window.location.href =
                                                                "<?= base_url('admin/finaldetail/' . $id); ?>";
                                                        }
                                                    </script> -->
                                                            <a title="File yang diupload" href="<?= base_url('assets/doc/') ?>DOK-SPM.pdf" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>','popup','width=600,height=600'); return false;">
                                                                <i class="bi bi-file-earmark-text"></i>
                                                            </a>
                                                            <?php
                                                            $idSPM = $mspm['id_masuk_spm'];
                                                            ?>
                                                            <a title="Kartu Verifikasi" href="<?= base_url('SPM/index/' . $idSPM) ?>" class="badge bg-success" target="_blank">
                                                                <i class="bi bi-printer"></i>
                                                            </a>
                                                            <!-- <a href="#" class="badge btn-danger" id="hapusSPM<?= $idSPM ?>"><i class="bi bi-trash"></i></a> -->
                                                            <button title="Hapus SPM" class="badge btn-danger" onclick="myFunction<?= $idSPM ?>()"><i class="bi bi-trash"></i></button>
                                                            <script>
                                                                function myFunction<?= $idSPM ?>() {
                                                                    let text = "Anda Yakin Menghapus SPM ini?\n";
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
                                                        </td>
                                                        <td class="text-center"><?= $mspm['verifikator'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php
                                                $memoryAfter = memory_get_usage();
                                                $memoryUsed = $memoryAfter - $memoryBefore;
                                                echo "Penggunaan memori: " . formatBytes($memoryUsed); // Fungsi untuk menampilkan dalam format yang lebih mudah dibaca
                                                function formatBytes($bytes, $precision = 2)
                                                {
                                                    $units = array('B', 'KB', 'MB', 'GB', 'TB');

                                                    $bytes = max($bytes, 0);
                                                    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                                                    $pow = min($pow, count($units) - 1);

                                                    $bytes /= (1 << (10 * $pow));

                                                    return round($bytes, $precision) . ' ' . $units[$pow];
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /Groups section start -->
            </div>
        </div>
        <!-- Hoverable rows end -->

        <!-- SPM MASUK Proses ######################## -->
        <div class=" modal fade text-left" id="lihatSPMproses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light-info">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <i class="fa fa-fw fa-lg fa-times"></i>
                        </button>
                        <h4 class="modal-title" id="myModalLabel33"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35"> Daftar
                            SPM Masuk</h4>
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <i class="fa fa-fw fa-lg fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <style>
                                .ismailText {
                                    color: aliceblue;
                                }
                            </style>
                            <table class="table table-hover mb-0" id="table1">
                                <thead class=" thead-ismail ismailText">
                                    <tr>
                                        <th class="text-center">WAKTU</th>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NAMA SKPD</th>
                                        <th class="text-center">NO. SPM</th>
                                        <th class="text-center">JENIS</th>
                                        <th class="text-center">ACTION</th>
                                        <th class="text-center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                    <?php
                                    $i = 1;
                                    // $IdUser = $user['id_status'];
                                    $spmProsesQuery = "SELECT *, spm_masuk.id AS id_masukP FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.id_status=1 AND spm_masuk.tgl_aju LIKE '$tahunIdent%'
                                                            ORDER BY spm_masuk.tgl_aju DESC
                                                            ";
                                    $spm_masuk_proses = $this->db->query($spmProsesQuery)->result_array();
                                    ?>
                                    <?php foreach ($spm_masuk_proses as $mspmP) : ?>
                                        <tr>
                                            <td class="text-center ismailText"><?= $mspmP['tgl_aju'] ?></td>
                                            <td class="text-center ismailText"><?= $i ?></td>
                                            <td class="ismailText"><?= $mspmP['name'] ?></td>
                                            <td class="text-center ismailText"><?= $mspmP['no_spm'] ?></td>
                                            <td class="text-center ismailText"><?= $mspmP['jenis'] ?></td>
                                            <td class="text-center">
                                                <button title="Koreksi SPM" class="badge btn-success" id="koreksi<?= $mspmP['id_masukP'] ?>"><i class="bi bi-info-circle"></i></button>
                                                <script>
                                                    document.getElementById('koreksi<?= $mspmP['id_masukP'] ?>').addEventListener('click', (
                                                        e) => {
                                                        Swal.fire({
                                                            icon: "question",
                                                            title: "Anda Akan Memeriksa SPM ini?",
                                                            showCancelButton: true,
                                                            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                            reverseButtons: false,
                                                            cancelButtonColor: '#DD6B55',
                                                        }).then(function(result) {
                                                            if (result.value) {
                                                                <?php
                                                                $id = $mspmP['id_masukP'];
                                                                ?>
                                                                window.location.href =
                                                                    "<?= base_url('admin/koreksi_spm/' . $id); ?>";
                                                            } else if (result.dismiss === "cancel") {
                                                                Swal.fire({
                                                                    title: "Dibatalkan!",
                                                                    text: "Data batal diperiksa",
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
                                                <style>
                                                    .on-process {
                                                        text-shadow: 1.5px 1.5px 0px rgba(0, 0, 0, 0.6);
                                                        color: white;
                                                    }
                                                </style>
                                                <?php if ($mspmP['id_status'] == 1) : ?>
                                                    <?php if ($mspmP['catatan'] == '') : ?>
                                                        <?php if ($mspmP['verifikator'] == '') : ?>
                                                            <small style="color: yellow;">Menunggu diverifikasi</small>
                                                        <?php else : ?>
                                                            <small class="on-process"><i class="fa fa-spinner fa-spin fa-fw"></i> <span>sedang diperiksa <?= $mspmP['verifikator'] ?></span></small>
                                                        <?php endif ?>
                                                    <?php else : ?>
                                                        <?php if ($mspmP['verifikator'] == '') : ?>
                                                            <small style="color: red;">Resubmit</small>
                                                        <?php else : ?>
                                                            <small style="color: red;">Resubmit</small> <br>
                                                            <small class="on-process"><i class="fa fa-spinner fa-spin fa-fw"></i> <span>sedang diperiksa <?= $mspmP['verifikator'] ?></span></small>
                                                        <?php endif ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <span class="">
                                <i class="fa fa-fw fa-lg fa-times"></i> Close
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /SPM MASUK Proses ######################## -->

        <!-- SPM MASUK Ditolak ######################## -->
        <div class=" modal fade text-left" id="lihatSPMtolak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light-info">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <i class="fa fa-fw fa-lg fa-times"></i>
                        </button>
                        <h4 class="modal-title" id="myModalLabel33"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35"> Daftar
                            SPM Ditolak</h4>
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <i class="fa fa-fw fa-lg fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <style>
                                .ismailText {
                                    color: aliceblue;
                                }
                            </style>
                            <table class="table table-hover mb-0" id="table1">
                                <thead class=" thead-ismail ismailText">
                                    <tr>
                                        <th class="text-center">WAKTU</th>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NAMA SKPD</th>
                                        <th class="text-center">NO. SPM</th>
                                        <th class="text-center">JENIS</th>
                                        <th class="text-center">ACTION</th>
                                        <th class="text-center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                    <?php
                                    $i = 1;
                                    // $IdUser = $user['id_status'];
                                    $spmTolakQuery = "SELECT *, spm_masuk.id AS id_masukT FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.id_status=2 AND spm_masuk.tgl_aju LIKE '$tahunIdent%'
                                                            ORDER BY spm_masuk.tgl_aju DESC
                                                            ";
                                    $spm_masuk_tolak = $this->db->query($spmTolakQuery)->result_array();
                                    ?>
                                    <?php foreach ($spm_masuk_tolak as $mspmT) : ?>
                                        <tr>
                                            <td class="text-center ismailText"><?= $mspmT['tgl_aju'] ?></td>
                                            <td class="text-center ismailText"><?= $i ?></td>
                                            <td class="ismailText"><?= $mspmT['name'] ?></td>
                                            <td class="text-center ismailText"><?= $mspmT['no_spm'] ?></td>
                                            <td class="text-center ismailText"><?= $mspmT['jenis'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                $idSPM = $mspmT['id_masukT'];
                                                ?>
                                                <a title="File yang diupload" href="<?= base_url('assets/doc/SPMDOC/') . $mspmT['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspmT['dokumen']; ?>','popup','width=600,height=600'); return false;">
                                                    <i class="bi bi-file-earmark-text"></i>
                                                </a>
                                                <button title="Ajukan Ulang" class="badge btn-edit-ismail" onclick="myAjukanLagi<?= $mspmT['id_masukT'] ?>()"><i class="bi bi-bootstrap-reboot"></i></button>
                                                <script>
                                                    function myAjukanLagi<?= $mspmT['id_masukT'] ?>() {
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
                                            </td>
                                            <td class="text-center">
                                                <?php if ($mspmT['id_status'] == 2) : ?>
                                                    <span class="badge <?= $mspmT['kelas'] ?>"><?= $mspmT['status'] ?></span> <br>
                                                    <a title="Catatan Penolakan" href="#" data-bs-toggle="modal" data-bs-target="#viewCatatan<?= $mspmT['id_masukT']; ?>" class="badge bg-danger"><i class="bi bi-eye"></i></a>
                                                    <!-- Lihat Catatan Modal -->
                                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                                        <!--info theme Modal -->
                                                        <div class="modal fade text-left" id="viewCatatan<?= $mspmT['id_masukT']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true" data-bs-backdrop="false">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                            <span class="">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle">
                                                                            Catatan <?= $mspmT['id_masukT'] ?>
                                                                        </h4>
                                                                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                            <span class="">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="col-md-8 col-12 offset-md-2">
                                                                            <img class="img-error" src="<?= base_url('assets/') ?>images/samples/reject-animate.png" alt="Tolak" width="300">
                                                                            <div class="text-center">
                                                                                <h1 class="error-title">Ditolak</h1>
                                                                                <p class="fs-5" style="color: black;">
                                                                                    <?= $mspmT['catatan']; ?></p>
                                                                            </div>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Lihat Catatan Modal -->
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <span class="">
                                <i class="fa fa-fw fa-lg fa-times"></i> Close
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /SPM MASUK Ditolak ######################## -->
    </div>
</div>
<script>
    // window.onload = function() {
    //     $('#lihatSPMproses').modal('show');
    // };

    <?php
    $echo1 = base_url('auth/tampilkanDataByYearLive') . '?tahun=';
    ?>
    var pathDoc = '<?= $echo1 ?>';
</script>
<script src="<?= base_url('assets/js/liveSearch.js') ?>"></script>