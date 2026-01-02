<?= $this->session->flashdata('message'); ?>
<?php
$QueryListAset = "SELECT * FROM aset_sewa";
$ListAset = $this->db->query($QueryListAset)->result_array();
$nama_aset = $this->db->get_where('aset_sewa', ['id_aset' => $id_aset])->row_array();
?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <div class="dropdown">
                <button href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $nama_aset['nm_aset'] ?> <i class="fa fa-fw fa-lg fa-caret-down"></i>
                </button>
                <div class="dropdown-menu">
                    <?php foreach ($ListAset as $LA) : ?>
                        <a class="<?= $LA['id_aset'] == $id_aset ? 'd-none' : 'dropdown-item' ?>" href="<?= $user['id_role'] == 1 ? base_url('admin/admin_item_aset/') . $LA['id_aset'] : ($user['id_role'] == 4 ? base_url('developer/admin_item_aset/') . $LA['id_aset'] : '#') ?>"><?= $LA['nm_aset'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <h3>

            <?php
            $id_role = $this->session->userdata('id_role');
            ?>
            <a href="<?= $id_role == 1 ? base_url('admin/admin_sewa') : ($id_role == 4 ? base_url('developer/admin_sewa') : '#') ?>" class="btn back">
                <i class="fa fa-fw fa-lg fa-arrow-left"></i>
            </a> <?= $id_aset == 5 ? 'Admin Peminjaman ' . $nama_aset['nm_aset'] : 'Admin Penyewaan ' . $nama_aset['nm_aset'] ?>
        </h3>
    </div>
</div>

<!-- CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.css">

<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery-ui.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>moment.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.min.js"></script>

<div class="row">
    <div class="col-12 col-lg-9">
        <!-- FULL CALENDAR -->
        <div class="card">
            <div class="row text-center" style="padding: 15px;">
                <h4 style="color: #007753;">
                    <?= $id_aset == 5 ? 'Jadwal Pinjam ' . $nama_aset['nm_aset'] : 'Jadwal Sewa ' . $nama_aset['nm_aset'] ?>
                </h4>
            </div>
            <div id="calendar" style="padding: 15px;"></div>
        </div>
        <script>
            // Persiapan JQuery
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    // Pengaturan lainnya
                    eventRender: function(event, element) {
                        // Cek apakah event sudah lewat hari ini
                        var today = moment().startOf('day');
                        var eventEnd = event.end ? moment(event.end) : moment(event.start).clone().add(1, 'days');

                        if (eventEnd.isBefore(today)) {
                            // Set warna abu-abu untuk event lampau
                            element.css({
                                'border': 'none',
                                'background-color': '#cf3a69',
                                'color': '#ffffff' // teks tetap terbaca
                            });
                        } else {
                            // Event aktif (masa depan atau hari ini)
                            // none
                        }
                        // Pastikan elemen event memenuhi kotak
                        element.css({
                            'width': '100%', // Lebar penuh
                            'height': '100%', // Tinggi penuh
                            'font-size': '12px', // Set ukuran font
                            'text-align': 'center', // Menyusun teks di tengah
                            'padding': '5px', // Menambahkan padding
                            'box-sizing': 'border-box', // Pastikan padding dan border masuk dalam perhitungan ukuran
                            'display': 'flex', // Memastikan konten berada di tengah
                            'align-items': 'center',
                            'justify-content': 'center',
                            'border-radius': '4px',
                        });

                        // Jika menggunakan icon atau elemen tambahan di dalam event
                        element.find('.fc-title').css({
                            'word-wrap': 'break-word', // Supaya teks panjang bisa wrap
                            'white-space': 'normal' // Allow multiline text
                        });
                    },
                    // editable table, event bisa digeser2
                    editable: true,
                    // atur header calendar
                    header: {
                        left: 'prev, next today',
                        right: 'title',
                        // right: 'month, agendaWeek, agendaDay '
                    },
                    // tampilkan data dari database
                    events: "<?= base_url('lasada/get_events/') . $id_aset ?>",
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
                    },
                    // Saat event diklik
                    eventClick: function(event, jsEvent, view) {
                        // Swal.fire({
                        //     title: event.title,
                        //     html: "<b>Tanggal:</b> " + moment(event.start).format('YYYY-MM-DD') + "<br>" +
                        //         "<b>Deskripsi:</b> " + (event.description || "Tidak ada deskripsi"),
                        //     icon: "info"
                        // });
                        // Isi modal dengan data dari event
                        $('#modal-event-acara').text(event.title);
                        $('#modal-event-date').text(moment(event.start).format('YYYY-MM-DD'));
                        $('#modal-event-desc').text(event.description || 'Tidak ada deskripsi');
                        $('#modal-event-desc').html(event.description.replace(/\n/g, "<br>"));
                        let status_pesan = '';
                        event.id_status == 1 ? status_pesan = 'PROSES' : (event.id_status == 3 ? status_pesan = 'DIPESAN' : status_pesan = 'DITOLAK');
                        $('#modal-event-status').text(status_pesan);
                        // Simpan ID event ke dalam modal
                        $('#event-id').val(event.id); // menyimpan ID event

                        // Tampilkan modal
                        $('#eventDetailModal').modal('show');

                    }
                });
            });
        </script>
        <!-- Modal Detail Event -->
        <div class="modal fade text-left" id="eventDetailModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header bg-info">
                        <h5
                            class="modal-title white"
                            id="myModalLabel130">
                            Detail Pemesanan
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong style="color: #036875ff;">Acara:</strong> <span id="modal-event-acara"></span></p>
                        <p><strong style="color: #036875ff;">Tanggal Acara:</strong> <span id="modal-event-date"></span></p>
                        <p><strong style="color: #036875ff;">Deskripsi:</strong> <span id="modal-event-desc"></span></p>
                        <p style="text-align: center;"><strong>Status: </strong><span style="font-weight: bold; color: #cf3a69;" id="modal-event-status"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button title="Cek Sewa" class="badge btn-success" onclick="detailSewa()"><i class="fa fa-exclamation-circle"></i></button>
                        <button
                            type="button"
                            class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
                <input type="hidden" id="event-id" value="">
            </div>
        </div>
        <script>
            function detailSewa() {
                // Ambil ID event yang disimpan di input hidden
                var eventId = $('#event-id').val();

                let text = "Anda akan masuk ke detail sewa?\nid: " + eventId;
                if (confirm(text) == true) {
                    window.location.href = "<?= base_url(); ?>" + (<?php echo $user['id_role']; ?> == 1 ? 'admin/view_details_verif_sewa/' + eventId : (<?php echo $user['id_role']; ?> == 4 ? 'developer/view_details_verif_sewa/' + eventId : '#'));
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

        <!-- /FULL CALENDAR -->
    </div>

    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">
                    <?= $id_aset == 5 ? 'Pinjam Masuk' : 'Sewa Masuk' ?>
                </h4>
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
                <h4>
                    <?= $id_aset == 5 ? 'Daftar Peminjam ' . $nama_aset['nm_aset'] : 'Daftar Penyewa ' . $nama_aset['nm_aset'] ?>
                </h4>
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
                        <table class="table table-hover mb-0 super-small-table" id="tableProses">
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
                                            <button title="Cek Catatan" class="badge btn-info" data-bs-toggle="modal" data-bs-target="#info<?= $sw['id'] ?>"><i class="fa fa-commenting-o"></i></button>
                                            <!-- Catatan Modal -->
                                            <div class="modal fade text-left" id="info<?= $sw['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content" style="background-color: white;">
                                                        <div class="modal-header bg-info">
                                                            <h5
                                                                class="modal-title white"
                                                                id="myModalLabel130">
                                                                Detail Catatan
                                                            </h5>
                                                            <button
                                                                type="button"
                                                                class="close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?= $sw['catatan_acara'] ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button
                                                                type="button"
                                                                class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Catatan Modal -->
                                            <button title="Cek Sewa" class="badge btn-success" onclick="detailSewa<?= $sw['id'] ?>()"><i class="fa fa-exclamation-circle"></i></button>
                                            <script>
                                                function detailSewa<?= $sw['id'] ?>() {
                                                    let text = "Anda akan masuk ke detail sewa?\nid: <?= $sw['id'] ?>";
                                                    if (confirm(text) == true) {
                                                        <?php
                                                        $id = $sw['id'];
                                                        ?>
                                                        window.location.href =
                                                            "<?= $user['id_role'] == 1 ? base_url('admin/view_details_verif_sewa/' . $id) : ($user['id_role'] == 4 ? base_url('developer/view_details_verif_sewa/' . $id) : '#') ?>";
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
                        <script>
                            new DataTable('#tableProses');
                        </script>
                    </div>
                    <!-- tab DIPESAN -->
                    <div class="tab-pane fade" id="dipesan" role="tabpanel" aria-labelledby="dipesan-tab">
                        <table class="table table-hover mb-0 super-small-table" id="table1">
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
                                            <a href="" data-bs-toggle="modal" data-bs-target="#detailPesanan<?= $swP['id'] ?>" class="badge <?= $swP['kelas_status'] ?>"><?= $swP['status_sewa'] ?></a>
                                            <!-- Modal form -->
                                            <div class="modal-info me-1 mb-1 d-inline-block">
                                                <!--info theme Modal -->
                                                <div class="modal fade text-left" id="detailPesanan<?= $swP['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-BPU-SPG">
                                                                <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                                                </button>
                                                                <h4 class="modal-title text-center text-label-header" id="BPU-spg-pk1Title"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                    <?= $id_aset == 5 ? 'Detail Peminjaman ' . $nama_aset['nm_aset'] : 'Detail Penyewaan ' . $nama_aset['nm_aset'] ?>
                                                                </h4>
                                                                <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="color: #fcf57e;">
                                                                <div>
                                                                    <table style="text-align: start;">
                                                                        <tr>
                                                                            <th>Nama</th>
                                                                            <th>:</th>
                                                                            <td><?= $swP['nama'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>No. HP</th>
                                                                            <th>:</th>
                                                                            <td><?= '0' . substr($swP['no_hp'], 2) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Aset Yang <?= $id_aset == 5 ? 'Dipinjam' : 'Disewa' ?></th>
                                                                            <th>:</th>
                                                                            <td><?= $swP['nm_aset'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Waktu Acara</th>
                                                                            <th>:</th>
                                                                            <td><?= $tanggalSWP; ?> jam <?= substr($swP['tgl_awal_acara'], 11, 5) . ' - ' . substr($swP['tgl_akhir_acara'], 11, 5) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Waktu Pemesanan</th>
                                                                            <th>:</th>
                                                                            <td><?= $swP['tgl_book'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kode <?= $id_aset == 5 ? 'Booking' : 'Bayar' ?></th>
                                                                            <th>:</th>
                                                                            <td><?= $swP['kode_byr'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Catatan</th>
                                                                            <th>:</th>
                                                                            <td><?= $swP['catatan_acara'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="3">
                                                                                <button title="Dokumen" class="badge btn-info" target="popup" onclick="window.open('<?= base_url('assets/doc/LASADA/') . $swP['bukti_pengenal']; ?>','popup','width=600,height=600'); return false;">
                                                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                                                </button>
                                                                            </th>
                                                                        </tr>
                                                                    </table>
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
                                                                                "<?= $user['id_role'] == 1 ? base_url('admin/hapus_lasada/' . $id_lasada) : ($user['id_role'] == 4 ? base_url('developer/hapus_lasada/' . $id_lasada) : '#') ?>";
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
                                        </td>
                                    </tr>
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