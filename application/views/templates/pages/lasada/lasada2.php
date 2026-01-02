<style>
    .bg-rent {
        background-color: #00B98E !important
    }
</style>


<?= $this->session->flashdata('message'); ?>

<div class="page-title d-md-block d-lg-none">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <p>.</p>
        </div>
        <h3>Layanan Aset</h3>
    </div>
</div>

<!-- Header Start -->
<div class="container-fluid">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <h3 class="animated fadeIn mb-4">Find A <span style="color: #00B98E;">Proper Information</span> For Your Needs And Things</h3>
        <!-- <div class="col-md-6 p-5 mt-lg-5">
            <h3 class="animated fadeIn mb-4">Find A <span style="color: #00B98E;">Proper Information</span> For Your Needs And Things</h3>
        </div>
        <div class="container-fluid col-md-6 animated fadeIn">
            <img src="<?= base_url('assets/'); ?>images/logo/Lasada BPPKAD.svg" alt="Lasada BPPKAD" class="responsive" height="90"> <br>
        </div> -->
    </div>
    <!-- Header End -->

    <?php
    $id_role = $this->session->userdata('id_role');
    ?>
    <br>
    <div class="row" id="countdown-ismail">
        <!-- Confetti -->
        <!-- <style>
            #confetti {
                height: 100%;
                left: 0px;
                position: fixed;
                top: 0px;
                width: 100%;
                z-index: -1111;
            }
        </style>
        <script type="text/javascript" src="<?= base_url('assets/'); ?>js/confetti.js"></script>
        <div id="confetti"></div> -->
        <!-- #Confetti -->
        <!-- Countdown Template -->
        <?php $eventCountdown = $this->db->get_where('countdown_event', ['id_countdown' => 1])->row_array(); ?>
        <div class="col-12">
            <div id="result"></div>
            <script>
                <?php
                $date_countdown = $eventCountdown['date_countdown'];
                $message_1 = $eventCountdown['message_1'];
                $message_final = $eventCountdown['message_final'];
                ?>
                var date_countdown = "<?= $date_countdown ?>";
                var message_1 = "<?= $message_1 ?>";
                var message_final = "<?= $message_final ?>";
            </script>
            <audio controls loop id="sound-result" class="d-none">
                <source src="<?= base_url('assets/sounds/Takbir_cut.mp3') ?>" type="audio/mp3">
                Browser Anda tidak mendukung elemen audio.
            </audio>
            <div class="row center-display">
                <div class="col-md-8 center-display rmd-countdown-box rmd-animation">
                    <div class="card-is bg-light-warning">
                        <div class="card-body px-1 py-1-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-white rmd-icon-box">
                                        <span>
                                            <i class="fa fa-fw fa-lg fa-calendar" style="color: rebeccapurple;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="font-extrabold mb-0" id="days"><strong>--</strong></h4>
                                    <h6 class="text-muted font-semibold">Hari</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-is bg-light-success">
                        <div class="card-body px-1 py-1-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-white rmd-icon-box">
                                        <span>
                                            <i class="fa fa-fw fa-lg fa-hourglass-start" style="color: rebeccapurple;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="font-extrabold mb-0" id="hours"><strong>--</strong></h4>
                                    <h6 class="text-muted font-semibold">Jam</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-is bg-light-danger">
                        <div class="card-body px-1 py-1-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-white rmd-icon-box">
                                        <span>
                                            <i class="fa fa-fw fa-lg fa-hourglass-half" style="color: rebeccapurple;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="font-extrabold mb-0" id="minutes"><strong>--</strong></h4>
                                    <h6 class="text-muted font-semibold">Menit</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-is" style="background-color: #aeeffc;">
                        <div class="card-body px-1 py-1-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-white rmd-icon-box">
                                        <span>
                                            <i class="fa fa-fw fa-lg fa-hourglass-end" style="color: rebeccapurple;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="font-extrabold mb-0" id="seconds"><strong>--</strong></h4>
                                    <h6 class="text-muted font-semibold">Detik</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($id_role == 1 or $id_role == 4) : ?>
                <div class="d-flex justify-content-center align-items-center">
                    <!-- Button trigger for change countdown modal -->
                    <button type="button" class="btn btn-sm btn-outline-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#inlineForm">
                        <i class="fa fa-fw fa-pencil-square-o" aria-hidden="true"></i> Change Event

                    </button>

                    <!--Countdown Modal -->
                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h4 class="modal-title text-white">
                                        Change Countdown Event
                                    </h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form id="changeEvent" action="<?= base_url('auth/changeEventCountdown') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="dateCountdown" name="dateCountdown" value="<?= $eventCountdown['date_countdown'] ?>">
                                            <label for="dateCountdown">Tanggal Event</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="message_1" name="message_1" value="<?= $eventCountdown['message_1'] ?>">
                                            <label for="message_1">Tulisan Awal</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="message_final" name="message_final" value="<?= $eventCountdown['message_final'] ?>">
                                            <label for="message_final">Tulisan di hari H</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="fa fa-fw fa-close"></i>
                                        </button>
                                        <button type="submit" id="changeEventBtn" class="btn btn-success ml-1">
                                            <i class="fa fa-fw fa-check-square-o d-block d-sm-none" aria-hidden="true"></i>
                                            <span class="d-none d-sm-block">Change</span>
                                        </button>
                                        <button class="btn-loading btn btn-light-danger d-none" type="button" disabled>
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                            <span>Loading...</span>
                                        </button>
                                    </div>
                                </form>
                                <script>
                                    const btnChange = document.querySelector('#changeEventBtn');
                                    const btnLoading = document.querySelector('.btn-loading');
                                    document.getElementById("changeEvent").addEventListener("submit", function(event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            icon: "question",
                                            title: "Anda Yakin Mengubah Event ini?",
                                            text: "Periksa kembali sebelum mengubah",
                                            showCancelButton: true,
                                            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Tidak",
                                            reverseButtons: false,
                                            cancelButtonColor: '#DD6B55',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById("changeEvent").submit();
                                                btnLoading.classList.toggle('d-none');
                                                btnChange.classList.toggle('d-none');
                                            } else {
                                                Swal.fire({
                                                    title: "Dibatalkan!",
                                                    text: "Event batal diubah",
                                                    icon: "error",
                                                    showConfirmButton: false,
                                                    timer: 1300
                                                })
                                            }
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <br>
            <?php endif; ?>
        </div>
        <!-- /Countdown Template -->
    </div>
    <script src="<?= base_url('assets/js/ismailCountdown.js') ?>"></script>

    <!-- Property List Start -->
    <div id="listLayanan" class="card" style="padding: 15px;">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-12">
                <div class="text-center mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Jenis-Jenis Layanan</h1>
                </div>
            </div>
        </div>
        <!-- <div class="tab-content"> -->
        <!-- <div id="tab-1" class="tab-pane fade show p-0 active"> -->
        <div class="row g-4 center-is">
            <div id="sewa" class="center-is col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                <a href="<?= base_url($id_role == 1 ? 'admin/' : ($id_role == 2 ? 'user/' : ($id_role == 3 ? 'umum/' : 'developer/'))) . 'lasada' ?>">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front-1">
                                <div class="texture1"></div>
                                <div class="texture2"></div>
                                <p class="heading_8264">KAB. SAMPANG</p>
                                <svg class="contactless" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                                    <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                    <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                    <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                                </svg>
                                <img src="<?= base_url('assets/images/logo/chip.svg') ?>" alt="Chip" class="chip">
                                <img class="logoproduct" src="<?= base_url('assets/images/logo/Lasada BPPKAD.svg') ?>" alt="logo" />
                                <p class="title-flip-card">LAYANAN SEWA BMD</p>
                                <p class="date_8264">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    echo date('m / Y');
                                    ?>
                                </p>
                            </div>
                            <div class="flip-card-back">
                                <div class="strip"></div>
                                <div class="mstrip">
                                    <p class="mcode">Layanan Sewa</p>
                                </div>
                                <div class="sstrip">
                                    <p class="code">***</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div id="kendaraan" class="center-is col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                <a href="<?= base_url('lasada/cek_kendaraan_dinas') ?>">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front-2">
                                <p class="texture1"></p>
                                <p class="texture2"></p>
                                <p class="heading_8264">KAB. SAMPANG</p>
                                <svg class="contactless" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                                    <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                    <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                    <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                                </svg>
                                <img src="<?= base_url('assets/images/logo/chip.svg') ?>" alt="Chip" class="chip">
                                <img class="logo" src="<?= base_url('assets/images/logo/Sampang.svg') ?>" alt="logo" />
                                <p class="title-flip-card">CEK KENDARAAN DINAS</p>
                                <p class="date_8264">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    echo date('m / Y');
                                    ?>
                                </p>
                            </div>
                            <div class="flip-card-back">
                                <div class="strip"></div>
                                <div class="mstrip">
                                    <p class="mcode">Cek Kendaraan Dinas</p>
                                </div>
                                <div class="sstrip">
                                    <p class="code">***</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div id="layananlain" class="center-is col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                <a href="<?= base_url($id_role == 1 ? 'admin/' : ($id_role == 2 ? 'user/' : ($id_role == 3 ? 'umum/' : 'developer/'))) . 'layanan_lainnya#maps' ?>">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front-3">
                                <p class="texture1"></p>
                                <p class="texture2"></p>
                                <p class="heading_8264">KAB. SAMPANG</p>
                                <svg class="contactless" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                                    <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                    <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                    <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                                </svg>
                                <img src="<?= base_url('assets/images/logo/chip.svg') ?>" alt="Chip" class="chip">
                                <img class="logo" src="<?= base_url('assets/images/logo/Sampang.svg') ?>" alt="logo" />
                                <p class="title-flip-card">LAYANAN LAINNYA</p>
                                <p class="date_8264">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    echo date('m / Y');
                                    ?>
                                </p>
                            </div>
                            <div class="flip-card-back">
                                <div class="strip"></div>
                                <div class="mstrip">
                                    <p class="mcode">Layanan Lainnya</p>
                                </div>
                                <div class="sstrip">
                                    <p class="code">***</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
        <!-- Property List End -->
    </div>


    <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault(); // Mencegah aksi default saat klik kanan
        });
    </script>