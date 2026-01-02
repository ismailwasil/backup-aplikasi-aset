<?= $this->session->flashdata('message'); ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <div class="dropdown">
                <button href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Daftar Aset <i class="fa fa-fw fa-lg fa-caret-down"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('lasada/bpu_spg') ?>">BPU Sampang</a>
                    <a class="dropdown-item" href="<?= base_url('lasada/mess_sby') ?>">Mess Surabaya</a>
                    <a class="dropdown-item" style="color: #435ebe;" href="#"><i class="fa fa-fw fa-lg fa-hand-o-right"></i> BPU Ketapang</a>
                    <a class="dropdown-item" href="<?= base_url('lasada/pesanggerahan') ?>">Pesanggerahan Ketapang</a>
                </div>
            </div>
        </div>
        <h3>
            <style>
                .back:hover {
                    border-radius: 15px;
                    box-shadow: inset 5px 5px 3px #e3e8f0,
                        inset -5px -5px 3px #ffffff;
                }

                .back i {
                    color: #25396f;
                }
            </style>
            <a href="<?= base_url('auth/lasada') ?>" class="btn back">
                <i class="fa fa-fw fa-lg fa-arrow-left"></i>
            </a> Details
        </h3>
    </div>
</div>
<!-- About Start -->
<!-- Header Start -->
<div class="container-fluid">
    <div class="row g-0 align-items-center flex-md-row">
        <div class=" container-fluid col-md-6 animated fadeIn">
            <!-- <div class="trapezoid"></div> -->
            <div id="carouselBPU-spg-1" class="carousel slide partial-border-gradient" data-bs-ride="carousel" style="z-index: 9;">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselBPU-spg-1" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselBPU-spg-1" data-bs-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/'); ?>images/lasada/carousel-1.jpg" class="d-block w-100 responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/'); ?>images/lasada/carousel-2.jpg" class="d-block w-100 responsive" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselBPU-spg-1" role="button" data-bs-slide="prev">
                    <div class="btn btn-light-success">
                        <span style="color: black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <!-- <span class="visually-hidden">Previous</span> -->
                    </div>
                </a>
                <a class="carousel-control-next" href="#carouselBPU-spg-1" role="button" data-bs-slide="next">
                    <div class="btn btn-light-success">
                        <span style="color: black;" class="carousel-control-next-icon" aria-hidden="true"></span>
                        <!-- <span class="visually-hidden">Next</span> -->
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="mb-4">#3 BPU Kec. Ketapang</h1>
            <p class="mb-4">Gedung BPU Sampang berkantor pusat di Jawa Timur.</p>
            <table class="table-responsive" style="width:100%">
                <tr>
                    <th><i class="fa fa-check text-primary me-3"></i>Kursi</th>
                    <th>:</th>
                    <td>400 buah <span style="color: red;">*</span></td>
                </tr>
                <tr>
                    <th><i class="fa fa-check text-primary me-3"></i>Sound System</th>
                    <th>:</th>
                    <td>ready</td>
                </tr>
                <tr>
                    <th><i class="fa fa-check text-primary me-3"></i>Toilet</th>
                    <th>:</th>
                    <td>ready</td>
                </tr>
            </table>
            <small style="color: red;"><strong>NB</strong> : Jika ada penambahan jumlah kursi dari luar gedung, biaya sewa kursi ditanggung pihak penyewa</small>
            </p>
            <p>
                <i class="bi bi-geo-alt"></i> <a href="https://goo.gl/maps/HjuejFa29w1isA8N9"> Jl. Trunojoyo, Rw. V,</a> <br>Kel. Rong Tengah, Kec. Sampang, Sampang, Jawa Timur, Indonesia <i class="bi bi-mailbox"></i> 69216
            </p>
            <hr>
            <!-- <button type="button" class="btn bg-rent py-3 px-5 mt-3" style="color: #ffffff;" data-bs-toggle="modal" data-bs-target="#BPU-ktp"><strong>Formulir Sewa</strong></button> -->
        </div>
    </div>
</div>
<!-- Header End -->
<!-- About End -->
<br>

<!-- Modal form -->
<div class="modal-info me-1 mb-1 d-inline-block">
    <!--info theme Modal -->
    <div class="modal fade text-left" id="BPU-ktp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
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
                    <h4 class="modal-title text-center text-label-header" id="BPU-spg-pk1Title"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                        Form Sewa BPU Ketapang
                    </h4>
                    <p style="color: tomato;"><strong style="color: red;">*</strong> Wajib diisi</p>
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <span class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_pesan" action="<?= base_url('lasada/buat_booking'); ?>" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">
                                        <h6 class="text-label"><i class="bi bi-person"></i> Nama <span style="color: red;">*</span></h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="-- Nama Penyewa --" id="nama" name="nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="telepon">
                                                <h6 class="text-label"><i class="bi bi-phone"></i> No. HP <span style="color: red;">*</span></h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="tel" class="form-control" placeholder="+62 8345xxxxxx" id="telepon" name="telepon" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="alamat">
                                                <h6 class="text-label"><i class="bi bi-geo-alt"></i> Alamat <span style="color: red;">*</span></h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="-- Alamat Penyewa --" id="alamat" name="alamat" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="aset" class="d-none">
                                        <h6 class="text-label"><i class="bi bi-person"></i> Aset Sewa <span style="color: red;">*</span></h6>
                                    </label>
                                    <div class="position-relative d-none">
                                        <input type="text" class="form-control" value="3" id="aset" name="aset" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="acara">
                                        <h6 class="text-label"><i class="bi bi-hdd-rack"></i> Acara <span style="color: red;">*</span></h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="-- Keperluan untuk --" id="acara" name="acara" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-none">
                                <div class="form-group">
                                    <label for="tanggal-awal">
                                        <h6 class="text-label"><i class="bi bi-calendar-check"></i> Tanggal Acara <span style="color: red;">*</span></h6>
                                    </label>
                                    <div class="position-relative">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="tanggal-awal" name="tanggal-awal">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="tanggal-akhir" name="tanggal-akhir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="waktu-awal">
                                        <h6 class="text-label"><i class="bi bi-alarm"></i> Rentang Waktu Acara/Pemesanan <span style="color: red;">*</span></h6>
                                    </label>
                                    <div class="position-relative">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="time" class="form-control" id="waktu-awal" name="waktu-awal" required>
                                            </div>
                                            <div class="col-2" style="color: azure;">sampai</div>
                                            <div class="col-5">
                                                <input type="time" class="form-control" id="waktu-akhir" name="waktu-akhir" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="no-pengenal">
                                        <h6 class="text-label">
                                            <i class="bi bi-receipt-cutoff"></i> Nomer Tanda Pengenal <span style="color: red;">*</span>
                                        </h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="-- NIK atau Nomer SIM --" id="no-pengenal" name="no-pengenal" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="bukti-ID">
                                        <h6 class="text-label">
                                            <i class="fa fa-address-card-o"></i>
                                            Unggah Tanda Pengenal <span style="color: red;">*</span>
                                        </h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="file" class="form-control" id="bukti-ID" name="bukti-ID" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ml-1 btn-kirim" id="ajukan_booking">
                                <span><i class="bi bi-cloud-upload"></i> Kirim</span>
                            </button>
                            <button class="btn-loading btn btn-light-danger d-none" type="button" disabled>
                                <i class="fa fa-gear fa-spin fa-lg fa-fw"></i> Mengirim...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal form -->

<!-- CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.css">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-fullcalendar/') ?>bootstrap.css"> -->

<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery-ui.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>moment.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.min.js"></script>

<div class="row justify-content-center">
    <div class="card col-xl-8 col-md-6 col-sm-4">
        <div class="row text-center" style="padding: 15px;">
            <h4 style="color: #007753;">Jadwal Sewa BPU Ketapang</h4>
            <small style="font-style: italic;">Cari tanggal, dan klik tanggal untuk menyewa</small>
        </div>
        <div id="calendar" style="padding: 15px;"></div>
    </div>
</div>
<script>
    var modal_item = "#BPU-ktp-modal";
    var get_event_sewa = "<?= base_url('lasada/get_events/3') ?>";
</script>
<script src="<?= base_url('assets/js/tampil-fullCalendar-For-item-aset.js') ?>"></script>
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
                <p><strong>Acara:</strong> <span id="modal-event-acara"></span></p>
                <p><strong>Tanggal Acara:</strong> <span id="modal-event-date"></span></p>
                <p><strong>Deskripsi:</strong> <span id="modal-event-desc"></span></p>
                <p style="text-align: center;"><strong>Status: </strong><span style="font-weight: bold; color: #cf3a69;" id="modal-event-status"></span></p>
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
        <input type="hidden" id="event-id" value="">
    </div>
</div>

<!-- /CALENDAR -->

<br>
<!-- Tabel Penyewa -->
<div class="container-fluid card table-responsive" style="padding: 15px;">
    <div class="row text-center">
        <h4>Daftar Penyewa BPU Ketapang</h4>
        <small style="font-style: italic;">Demi menjaga privasi, nama penyewa tidak ditampilkan</small>
    </div>
    <table class="table table-hover mb-0" id="table1">
        <thead>
            <tr style="color: #25396f; border-radius:15px; background: #daedfb; box-shadow: inset 5px 5px 1px #d1e4f1, inset -5px -5px 1px #e3f6ff;">
                <th class="text-center">NO</th>
                <th class="text-center">TANGGAL</th>
                <th class="text-center">ACARA</th>
                <th class="text-center">WAKTU</th>
                <th class="text-center">ALAMAT</th>
                <th class="text-center">NO HP</th>
                <th class="text-center">STATUS</th>
            </tr>
        </thead>
        <tbody id="data">
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
                    <td class="text-center"><?= $tanggal; ?></td>
                    <td class="text-center"><?= $sw['keperluan'] ?></td>
                    <td class="text-center"><?= substr($sw['tgl_awal_acara'], 11, 5) . ' - ' . substr($sw['tgl_akhir_acara'], 11, 5) ?></td>
                    <td class="text-center"><?= $sw['alamat'] ?></td>
                    <td class="text-center"><?= '0' . substr($sw['no_hp'], 2) ?></td>
                    <td class="text-center"><span class="badge <?= $sw['kelas_status'] ?>" style="cursor: default;"><?= $sw['status_sewa'] ?></span></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- /Tabel Penyewa -->