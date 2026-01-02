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
        <h3>Layanan Sewa</h3>
    </div>
</div>

<!-- Header Start -->
<div class="container-fluid">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1>Layanan Sewa BMD</h1>
            <img src="<?= base_url('assets/'); ?>images/logo/Lasada BPPKAD.png" alt="Lasada BPPKAD" class="responsive" height="90"> <br>
            <h4 class="animated fadeIn mb-4">Find A <span style="color: #00B98E;">Perfect Asset</span> To Enjoy With Your Lovely Person</h4>
            <!-- <p class=" animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p> -->
            <a href="#listAset" class="btn btn-primary py-3 px-5 me-3 animated fadeIn"><i class="bi bi-chevron-double-down"></i> Daftar Aset</a>
        </div>
        <div class="container-fluid col-md-6 animated fadeIn">
            <!-- <div class="owl-carousel header-carousel"> -->
            <div id="carouselBPU-spg-1" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselBPU-spg-1" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselBPU-spg-1" data-bs-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/'); ?>images/lasada/carousel-1.jpg" class="d-block w-100 responsive" alt="BPU Sampang">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/'); ?>images/lasada/carousel-2.jpg" class="d-block w-100 responsive" alt="Mess Surabaya">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselBPU-spg-1" role="button" data-bs-slide="prev">
                    <div class="btn btn-primary">
                        <span style="color: black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <!-- <span class="visually-hidden">Previous</span> -->
                    </div>
                </a>
                <a class="carousel-control-next" href="#carouselBPU-spg-1" role="button" data-bs-slide="next">
                    <div class="btn btn-primary">
                        <span style="color: black;" class="carousel-control-next-icon" aria-hidden="true"></span>
                        <!-- <span class="visually-hidden">Next</span> -->
                    </div>
                </a>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <!-- Header End -->


    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="row g-2 justify-content-center">
            <div class="col-md-8 mb-1">
                <form id="cek_tagihan" action="<?= base_url('lasada/cek_tagihan'); ?>" method="post">
                    <!-- <form id="cek_tagihan" action="" method="post"> -->
                    <div class="row">
                        <div class="col-md-10">
                            <div class="cont-wrapper">
                                <p class="icon-left"><i class="fa fa-fw fa-lg fa-money"></i></p>
                                <input id="kode_bayar" type="search" class="input-tagihan" name="kode_bayar" required autocomplete="off">
                                <label id="label1" class="label">Cek Tagihan</label>
                                <label id="label2" class="label d-none">Masukkan Kode Pembayaran</label>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="cont-wrapper">
                                <button type="submit" id="cari" class="btn icon-right">
                                    <i class=" fa fa-fw fa-lg fa-search"></i>
                                </button>
                                <button id="loadingCari" class="btn icon-right disabled d-none">
                                    <i class="fa fa-fw fa-lg fa-spin fa-cog"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <!-- Form -->
            <style>
                form h6 {
                    color: #12f58b;
                }
            </style>
            <div class="col-md-7 box-inset-blue d-none" id="input-bayar" style="padding: 3.5em;">
                <form id="form-input-bayar" action="<?= base_url(); ?>" method="post" enctype="multipart/form-data">
                    <h4 class="text-center text-white">Form Upload Bukti Bayar</h4>
                    <p class="text-center text-white">Anda belum mengirimkan bukti pembayaran sewa</p>
                    <hr class="box-inset-blue">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kode_bayar_input">
                                <h6><i class="fa fa-fw fa-lg fa-money"></i> Kode Bayar</h6>
                            </label>
                            <div class="position-relative">
                                <input type="text" class="form-control" value="Kode" id="kode_bayar_input" name="kode_bayar_input" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_identity">
                                <h6><i class="fa fa-fw fa-lg fa-drivers-license-o"></i> No. Identitas <span style="color: red;"><strong>*</strong></span></h6>
                            </label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Masukkan No. Identitas" id="no_identity" name="no_identity" required autocomplete="off" autofocus>
                                <?= form_error('no_identity', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dokumen-bayar">
                                <h6><i class="bi bi-file-earmark-bar-graph"></i> Kwitansi / Bukti Bayar <strong style="color: red;">*</strong></h6>
                            </label>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="document"><i class="bi bi-upload"></i></label>
                                <input type="file" class="form-control" id="dokumen-bayar" name="dokumen-bayar" required>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-ajukan btn-secondary ml-1" id="cancel" onclick="window.location.href='lasada'">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span><i class="fa fa-fw fa-lg fa-arrow-circle-left"></i> Kembali</span>
                    </button>
                    <button type="submit" class="btn btn-ajukan btn-info ml-1" id="ajukan-bayar">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span><i class="fa fa-fw fa-lg fa-arrow-circle-up"></i> Ajukan</span>
                    </button>
                    <button type="button" class="btn-loading btn btn-light-danger d-none" disabled>
                        <img src="<?= base_url('assets/') ?>vendors/svg-loaders/audio.svg" class="me-4" style="width: 1.1rem" alt="audio">
                        <span>Sedang Mengirim...</span>
                    </button>
                </form>
                <script>
                    const btnAju = document.querySelector('.btn-ajukan');
                    const btnLoading = document.querySelector('.btn-loading');
                    document.getElementById("form-input-bayar").addEventListener("submit", function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: "question",
                            title: "Yakin Mengajukan SPM?",
                            text: "Periksa kembali sebelum mengajukan, kesalahan tidak bisa dibatalkan",
                            showCancelButton: true,
                            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Tidak",
                            reverseButtons: false,
                            cancelButtonColor: '#DD6B55',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById("form-input-bayar").submit();
                                btnLoading.classList.toggle('d-none');
                                btnAju.classList.toggle('d-none');
                            } else {
                                Swal.fire({
                                    title: "Dibatalkan!",
                                    text: "SPM Tidak Diajukan",
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1300
                                })
                            }
                        })
                    })
                </script>
            </div>
            <!-- /Form -->
        </div>
    </div>
    <!--info theme Modal -->
    <div class="modal fade text-left" id="info_pemesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <?php
            // $queryTagihan = "SELECT * FROM aset_sewa JOIN event_acara
            //                 ON aset_sewa.id_aset=event_acara.id_aset
            //                 JOIN status_sewa
            //                 ON event_acara.id_status=status_sewa.id_status
            //                 WHERE event_acara.kode_byr='2023081474ded14c60'
            //                 ";

            // $tagihan = $this->db->query($queryTagihan)->row_array();
            ?>
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal" onclick="kembali()">
                        <i class="fa fa-fw fa-lg fa-times"></i>
                    </button>
                    <h5 class="modal-title white" id="myModalLabel130">Info Pemesanan</h5>
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal" onclick="kembali()">
                        <i class="fa fa-fw fa-lg fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" style="background-color: whitesmoke;">
                    <table class="table-responsive" style="width:100%;">
                        <tr>
                            <th>Nama Penyewa</th>
                            <th>:</th>
                            <td id="nama_penyewa"></td>
                            <!-- <td><?= $tagihan['nama'] ?></td> -->
                        </tr>
                        <tr>
                            <th>Aset Disewa</th>
                            <th>:</th>
                            <td id="aset_sewa"></td>
                            <!-- <td><?= $tagihan['nm_aset'] ?></td> -->
                        </tr>
                        <tr>
                            <th>Tanggal Sewa</th>
                            <th>:</th>
                            <td id="tgl_book"></td>
                            <!-- <td><?= $tagihan['tgl_book'] ?></td> -->
                        </tr>
                    </table>
                </div>
                <div class="modal-footer" style="background-color: whitesmoke;">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal" onclick="kembali()">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-info ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const label1 = document.querySelector('#label1');
        const label2 = document.querySelector('#label2');
        const btnCari = document.getElementById('cari');
        const btnLoadingCari = document.getElementById('loadingCari');
        var modalPesan = document.getElementById("info_pemesanan");
        document.getElementById("kode_bayar").addEventListener("focus", function(event) {
            label1.classList.toggle('d-none')
            label2.classList.toggle('d-none')
        })
        document.getElementById("kode_bayar").addEventListener("focusout", function(event) {
            label1.classList.toggle('d-none')
            label2.classList.toggle('d-none')
        })

        document.getElementById("cek_tagihan").addEventListener("submit", function(event) {
            event.preventDefault();
            btnCari.classList.toggle('d-none');
            btnLoadingCari.classList.toggle('d-none');
            document.getElementById("cek_tagihan").submit();
            // $("#info_pemesanan").modal("show");
        })

        // function kembali() {
        //     btnCari.classList.toggle('d-none');
        //     btnLoadingCari.classList.toggle('d-none');
        // }
    </script>
    <!-- Search End -->


    <!-- Property List Start -->
    <div id="listAset" class="card" style="padding: 15px;">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-12">
                <div class="text-center mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Aset Dipinjamkan</h1>
                    <!-- <p>Klik pada setiap gambar atau nama untuk detail penyewaan</p> -->
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4 center-is">
                    <div id="BPU-SPG" class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="<?= base_url('lasada/bus_pemda') ?>" class="zoom-image-hover"><img class="img-fluid" src="<?= base_url('assets/') ?>images/lasada/bus.png" alt="Bus Sampang"></a>
                                <div style="cursor: default;">
                                    <div class="bg-rent rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Loan</div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Kendaraan</div>
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><i class="fa fa-fw fa-money"></i> -</h5>
                                <a class="d-block h4 mb-2" href="<?= base_url('lasada/bus_pemda') ?>">Bus Pemda</a>
                                <p>
                                    <a href="https://goo.gl/maps/HjuejFa29w1isA8N9" style="color: dimgray;" target="_blank"><i class="bi bi-geo-alt" style="color: #037c60;"></i>Kabupaten Sampang, Jawa Timur</a>
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-fw fa-users me-2" style="color: #00B98E;"></i> Kursi: 36</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-fw fa-volume-up me-2" style="color: #00B98E;"></i> Sound Ready</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-fw fa-bath me-2" style="color: #00B98E;"></i> Toilet Ready</small>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                    </div> -->
                </div>
            </div>

        </div>
        <!-- Property List End -->
    </div>
    <div id="listAset" class="card" style="padding: 15px;">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-12">
                <div class="text-center mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Daftar Aset Disewakan</h1>
                    <p>Klik pada setiap gambar atau nama untuk detail penyewaan</p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div id="BPU-SPG" class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="<?= base_url('lasada/bpu_spg') ?>" class="zoom-image-hover"><img class="img-fluid" src="<?= base_url('assets/') ?>images/lasada/property-1.jpg" alt="BPU Sampang"></a>
                                <div style="cursor: default;">
                                    <div class="bg-rent rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Gedung</div>
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><i class="fa fa-fw fa-money"></i> Rp 4.000.000</h5>
                                <a class="d-block h4 mb-2" href="<?= base_url('lasada/bpu_spg') ?>">BPU Sampang</a>
                                <p>
                                    <a href="https://goo.gl/maps/HjuejFa29w1isA8N9" style="color: dimgray;" target="_blank"><i class="bi bi-geo-alt" style="color: #037c60;"></i> Jl. Trunojoyo, Rw. V, Kabupaten Sampang, Jawa Timur</a>
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-fw fa-users me-2" style="color: #00B98E;"></i> Kursi: 400</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-fw fa-volume-up me-2" style="color: #00B98E;"></i> Sound Ready</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-fw fa-bath me-2" style="color: #00B98E;"></i> Toilet Ready</small>
                            </div>
                        </div>
                    </div>
                    <div id="mess" class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="<?= base_url('lasada/mess_sby') ?>" class="zoom-image-hover"><img class="img-fluid" src="<?= base_url('assets/') ?>images/lasada/property-2.jpg" alt="Mess Surabaya"></a>
                                <div style="cursor: default;">
                                    <div class="bg-rent rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Mess</div>
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><i class="fa fa-fw fa-money"></i> Rp x.000.000</h5>
                                <a class="d-block h4 mb-2" href="<?= base_url('lasada/mess_sby') ?>">Mess Surabaya</a>
                                <p>
                                    <a href="https://goo.gl/maps/HjuejFa29w1isA8N9" style="color: dimgray;" target="_blank"><i class="bi bi-geo-alt" style="color: #037c60;"></i> Jl. Trunojoyo, Rw. V, Kabupaten Sampang, Jawa Timur</a>
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                            </div>
                        </div>
                    </div>
                    <div id="BPU-KTP" class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="<?= base_url('lasada/bpu_ktp') ?>" class="zoom-image-hover"><img class="img-fluid" src="<?= base_url('assets/') ?>images/lasada/property-3.jpg" alt="BPU Ketapang"></a>
                                <div style="cursor: default;">
                                    <div class="bg-rent rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Gedung</div>
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><i class="fa fa-fw fa-money"></i> Rp y.000.000</h5>
                                <a class="d-block h4 mb-2" href="<?= base_url('lasada/bpu_ktp') ?>">BPU Ketapang</a>
                                <p>
                                    <a href="https://goo.gl/maps/HjuejFa29w1isA8N9" style="color: dimgray;" target="_blank"><i class="bi bi-geo-alt" style="color: #037c60;"></i> Jl. Trunojoyo, Rw. V, Kabupaten Sampang, Jawa Timur</a>
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                            </div>
                        </div>
                    </div>
                    <div id="sanggerah" class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="<?= base_url('lasada/pesanggerahan') ?>" class="zoom-image-hover"><img class="img-fluid" src="<?= base_url('assets/') ?>images/lasada/property-4.jpg" alt="Pesanggerahan Ketapang"></a>
                                <div style="cursor: default;">
                                    <div class="bg-rent rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Guesthouse</div>
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><i class="fa fa-fw fa-money"></i> Rp z.000.000</h5>
                                <a class="d-block h4 mb-2" href="<?= base_url('lasada/pesanggerahan') ?>">Pesanggerahan Ketapang</a>
                                <p>
                                    <a href="https://goo.gl/maps/HjuejFa29w1isA8N9" style="color: dimgray;" target="_blank"><i class="bi bi-geo-alt" style="color: #037c60;"></i> Jl. Trunojoyo, Rw. V, Kabupaten Sampang, Jawa Timur</a>
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                    </div> -->
                </div>
            </div>

        </div>
        <!-- Property List End -->
    </div>