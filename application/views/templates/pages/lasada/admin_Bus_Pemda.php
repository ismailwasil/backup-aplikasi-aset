<?= $this->session->flashdata('message'); ?>
<style>

</style>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <div class="dropdown">
                <button href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bus Pemda <i class="fa fa-fw fa-lg fa-caret-down"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" style="color: #435ebe;" href="#"><i class="fa fa-fw fa-lg fa-hand-o-right"></i> Bus Pemda</a>
                    <a class="dropdown-item" href="<?= base_url('admin/admin_bpu_spg') ?>"></i> BPU Sampang</a>
                    <a class="dropdown-item" href="<?= base_url('admin/admin_mess_sby') ?>">Mess Surabaya</a>
                    <a class="dropdown-item" href="<?= base_url('admin/admin_bpu_ktp') ?>">BPU Ketapang</a>
                    <a class="dropdown-item" href="<?= base_url('admin/admin_pesanggerahan_ktp') ?>">Pesanggerahan Ketapang</a>
                </div>
            </div>
        </div>
        <h3>

            <?php
            $id_role = $this->session->userdata('id_role');
            if ($id_role == 1) :
            ?>
                <a href="<?= base_url('admin/admin_sewa') ?>" class="btn back">
                <?php elseif ($id_role == 4) : ?>
                    <a href="<?= base_url('developer/admin_sewa') ?>" class="btn back">
                    <?php endif; ?>
                    <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                    </a> Bus Pemda
        </h3>
    </div>
</div>

<!-- CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.css">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-fullcalendar/') ?>bootstrap.css"> -->

<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery-ui.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>moment.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.min.js"></script>

<div class="row">
    <div class="col-12 col-lg-9">
        <!-- FULL CALENDAR -->
        <div class="card">
            <div class="row text-center" style="padding: 15px;">
                <h4 style="color: #007753;">Jadwal Pinjam Bus Pemda</h4>
            </div>
            <div id="calendar" style="padding: 15px;"></div>
        </div>
        <script>
            // Persiapan JQuery
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    // editable table, event bisa digeser2
                    editable: true,
                    // atur header calendar
                    header: {
                        left: 'prev, next today',
                        right: 'title',
                        // right: 'month, agendaWeek, agendaDay '
                    },
                    // tampilkan data dari database
                    events: "<?= base_url('lasada/get_events_bus_pemda') ?>",
                    // izinkan tanggal bisa dipilih
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        // tampilkan pesan input/modal/alert
                        // var title = prompt("Masukkan Kegiatan");
                        $('#BPU-spg-modal').modal('show');
                        // Tampung tgl yg dipilih ke dalam varible start dan end
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                        // Isi nilai input tanggal acara dengan variabel JavaScript
                        $('#tanggal-awal').val(start);
                        $('#tanggal-akhir').val(end);
                        // Tangkap form saat submit
                        $("#ajukan_booking").on("click", function(event) {
                            event.preventDefault();

                            Swal.fire({
                                icon: "question",
                                title: "Anda Yakin Booking?",
                                showCancelButton: true,
                                confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                reverseButtons: false,
                                cancelButtonColor: '#DD6B55',
                            }).then((result) => {
                                if (result.isConfirmed) {

                                    $("#form_pesan").submit();
                                } else {
                                    Swal.fire({
                                        title: "Dibatalkan!",
                                        text: "Data batal ditambahkan",
                                        icon: "error",
                                        showConfirmButton: false,
                                        timer: 1300
                                    })
                                }
                            })
                        })
                    }
                });
            });
        </script>

        <!-- /FULL CALENDAR -->
    </div>

    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Pinjaman Masuk</h4>
            </div>
            <div class="card-content pb-4" style="padding: 5px;">
                <script src="<?= base_url('assets/') ?>js/chartV2.9.4.js"></script>
                <canvas id="myChart"></canvas>
                <script>
                    const xValues = ["Proses", "Dipesan"];
                    const yValues = [<?= $JumlahSewa ?>, <?= $JumlahPesan ?>];
                    const barColors = ["#faf25f", "#75ffb8"];

                    new Chart("myChart", {
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            cutoutPercentage: 50,
                            responsive: true,
                            legend: {
                                position: 'right'
                            },
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="text-center" style="padding-top: 15px;">
                <h4>Daftar Peminjam Bus Pemda</h4>
            </div>
            <small>
                <style>
                    .li {
                        list-style-type: none;
                    }
                </style>
                <ul>
                    <li class="li"><span class="badge bg-proses"><i class="fa fa-fw fa-lg fa-spin fa-gear"></i> Proses</span> : Peminjam yang sudah diajukan dan <strong>belum</strong> disetujui</li>
                    <li class="li"><span class="badge bg-light-success">Dipesan</span> : Peminjam yang sudah diajukan dan disetujui</li>
                </ul>
            </small>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="back nav-link active" id="proses-tab" data-bs-toggle="tab" href="#proses" role="tab" aria-controls="proses" aria-selected="true">
                            <i class="fa fa-fw fa-lg fa-spin fa-gear"></i> Proses
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="back nav-link" id="dipesan-tab" data-bs-toggle="tab" href="#dipesan" role="tab" aria-controls="dipesan" aria-selected="false">
                            <i class="fa fa-fw fa-lg fa-check-square-o"></i> Dipesan
                        </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr style="color: #25396f; border-radius:15px; background: #daedfb; box-shadow: inset 5px 5px 1px #d1e4f1, inset -5px -5px 1px #e3f6ff;">
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">BOOK DATE</th>
                                    <th class="text-center">DATE</th>
                                    <th class="text-center">EVENT</th>
                                    <th class="text-center">TIME</th>
                                    <th class="text-center">ADDRESS</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($sewa as $sw) : ?>
                                    <?php
                                    if (substr($sw['tgl_awal_acara'], 0, 10) == substr($sw['tgl_akhir_acara'], 0, 10)) {
                                        $tanggal = substr($sw['tgl_awal_acara'], 0, 10);
                                    } else {
                                        $tanggal = substr($sw['tgl_awal_acara'], 0, 10) . ' -- ' . substr($sw['tgl_akhir_acara'], 0, 10);
                                    }

                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $sw['nama']; ?></td>
                                        <td class="text-center"><?= $sw['tgl_book']; ?></td>
                                        <td class="text-center"><?= $tanggal; ?></td>
                                        <td class="text-center"><?= $sw['keperluan'] ?></td>
                                        <td class="text-center"><?= substr($sw['tgl_awal_acara'], 11, 5) . ' - ' . substr($sw['tgl_akhir_acara'], 11, 5) ?></td>
                                        <td class="text-center"><?= $sw['alamat'] ?></td>
                                        <td class="text-center">
                                            <span class="badge <?= $sw['kelas_status'] ?>" style="cursor: default;"><?= $sw['status_sewa'] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <button title="Cek Sewa" class="badge btn-info" onclick="detailSewa<?= $sw['id'] ?>()"><i class="bi bi-info-circle"></i></button>
                                            <script>
                                                function detailSewa<?= $sw['id'] ?>() {
                                                    let text = "Anda akan masuk ke detail sewa?\nid: <?= $sw['id'] ?>";
                                                    if (confirm(text) == true) {
                                                        <?php
                                                        $id = $sw['id'];
                                                        ?>
                                                        window.location.href =
                                                            "<?= base_url('admin/view_details_verif_sewa/' . $id); ?>";
                                                    } else {
                                                        Swal.fire({
                                                            title: "Dibatalkan!",
                                                            text: "Anda Batal Masuk",
                                                            icon: "error",
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        })
                                                    }
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- tab DIPESAN -->
                    <div class="tab-pane fade" id="dipesan" role="tabpanel" aria-labelledby="dipesan-tab">
                        <table class="table table-hover mb-0" id="table1">
                            <thead>
                                <tr style="color: #25396f; border-radius:15px; background: #daedfb; box-shadow: inset 5px 5px 1px #d1e4f1, inset -5px -5px 1px #e3f6ff;">
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">BOOK DATE</th>
                                    <th class="text-center">DATE</th>
                                    <th class="text-center">EVENT</th>
                                    <th class="text-center">TIME</th>
                                    <th class="text-center">ADDRESS</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                <?php $i = 1; ?>
                                <?php foreach ($sewaPesan as $swP) : ?>
                                    <?php
                                    if (substr($swP['tgl_awal_acara'], 0, 10) == substr($swP['tgl_akhir_acara'], 0, 10)) {
                                        $tanggalSWP = substr($swP['tgl_awal_acara'], 0, 10);
                                    } else {
                                        $tanggalSWP = substr($swP['tgl_awal_acara'], 0, 10) . ' -- ' . substr($swP['tgl_akhir_acara'], 0, 10);
                                    }

                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $swP['nama']; ?></td>
                                        <td class="text-center"><?= $swP['tgl_book']; ?></td>
                                        <td class="text-center"><?= $tanggalSWP; ?></td>
                                        <td class="text-center"><?= $swP['keperluan'] ?></td>
                                        <td class="text-center"><?= substr($swP['tgl_awal_acara'], 11, 5) . ' - ' . substr($swP['tgl_akhir_acara'], 11, 5) ?></td>
                                        <td class="text-center"><?= $swP['alamat'] ?></td>
                                        <td class="text-center">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#detailPesananBPUSPG" class="badge <?= $swP['kelas_status'] ?>"><?= $swP['status_sewa'] ?></a>
                                        </td>
                                    </tr>
                                    <!-- Modal form -->
                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                        <!--info theme Modal -->
                                        <div class="modal fade text-left" id="detailPesananBPUSPG" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-BPU-SPG">
                                                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                        </button>
                                                        <h4 class="modal-title text-center text-label-header" id="BPU-spg-pk1Title"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                            Detail Peminjaman <?= $swP['nm_aset'] ?>
                                                        </h4>
                                                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: #fcf57e;">
                                                        <div>
                                                            <div>
                                                                Nama : <?= $swP['nama'] ?> <br>
                                                                Aset Yang Disewa : <?= $swP['nm_aset'] ?><br>
                                                                Kode Bayar : <?= $swP['kode_byr'] ?> <br>
                                                                <button title="Dokumen" class="badge btn-info" target="popup" onclick="window.open('<?= base_url('assets/doc/LASADA/') . $swP['bukti_pengenal']; ?>','popup','width=600,height=600'); return false;">
                                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                                </button>
                                                            </div>
                                                            <div class="text-center">
                                                                <span style="color: white;">status sewa:</span>
                                                                <h4><?= $swP['status_sewa'] ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?php
                                                        $idSewaHapus = $swP['id'];
                                                        ?>
                                                        <button class="badge btn-danger" onclick="hapusSewa<?= $idSewaHapus ?>()"><i class="fa fa-trash"></i> Hapus Sewa</button>
                                                        <script>
                                                            function hapusSewa<?= $idSewaHapus ?>() {
                                                                let text = "Anda Yakin Menghapus Sewa ini?\n<?= $idSewaHapus ?>";
                                                                if (confirm(text) == true) {
                                                                    <?php
                                                                    $id_lasada = $swP['id'];
                                                                    ?>
                                                                    window.location.href =
                                                                        "<?= base_url('admin/hapus_lasada/' . $id_lasada); ?>";
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Dibatalkan!",
                                                                        text: "Sewa batal dihapus",
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
                                    <!-- /Modal form -->
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- //tab DIPESAN -->
                </div>
            </div>
        </div>
    </div>
</div>