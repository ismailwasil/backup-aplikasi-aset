<div class="page-heading">
    <?= $this->session->flashdata('message'); ?>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hallo, <?= $user['akronim']; ?></h3>
                .
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first" style="z-index: 1 ;">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-caret-right-fill"></i>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-9">
                <!-- Running Text -->

                <!-- CSS Code -->
                <style>
                    .GeneratedMarquee {
                        font-family: Geneva, sans-serif;
                        font-size: 1em;
                        line-height: 1.3em;
                        color: #4765d1;
                        padding: 0.3mm;
                        margin: 0.8mm;
                    }
                </style>

                <!-- HTML Code -->
                <marquee class="GeneratedMarquee" direction="left" scrollamount="6" behavior="scroll">
                    Gantilah Password secara berkala, konfirmasikan kepada developer.
                </marquee>

                <br />
                <!-- /Running Text -->

                <!-- Pejabat -->
                <!-- Column card -->
                <div class="row justify-content-center">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row text-center">
                                            <img src="<?= base_url('assets/'); ?>images/master/man.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <br>
                                        <details>
                                            <summary>
                                                <h6 class="font-extrabold mb-0">Achmad Murang TD, S.T., M.Si.</h6>
                                            </summary>
                                            <p><i>NIP. 19800216 200501 1 009</i></p>
                                        </details>
                                        <h6 class="text-muted font-semibold">Kepala Bidang Pengelolaan Aset BPPKAD</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Column card -->

                <div class="row justify-content-center">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row text-center">
                                            <img src="<?= base_url('assets/'); ?>images/master/plan.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <br>
                                        <details>
                                            <summary>
                                                <h6 class="font-extrabold mb-0">Fajar Romadhon, S.T., M.Si</h6>
                                            </summary>
                                            <p><i>NIP. 19780826 200801 1 010</i></p>
                                        </details>
                                        <h6 class="text-muted font-semibold">Kepala Subid Perencanaan dan Pengendalian</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row text-center">
                                            <img src="<?= base_url('assets/'); ?>images/master/hand.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <br>
                                        <details>
                                            <summary>
                                                <h6 class="font-extrabold mb-0">H. Ahmad Munasik, S.Sos</h6>
                                            </summary>
                                            <p><i>NIP. 19690524 198903 1 002</i></p>
                                        </details>
                                        <h6 class="text-muted font-semibold">Kepala Subid Pemanfaatan dan Pemindahtanganan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row text-center">
                                            <img src="<?= base_url('assets/'); ?>images/master/note.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <br>
                                        <details>
                                            <summary>
                                                <h6 class="font-extrabold mb-0">Joni Purna Irawan, S.E., M.M.</h6>
                                            </summary>
                                            <p><i>NIP. 19810807 201001 1 010</i></p>
                                        </details>
                                        <h6 class="text-muted font-semibold">Kepala Subid Inventarisasi dan Pelaporan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Pejabat -->

                <!-- Poster Pengajuan SPM -->
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid responsive" src="<?= base_url('assets/'); ?>images/info/pengajuan-spm.png" alt="Alur Pengajuan SPM" />
                    </div>
                </div>
                <!-- /Poster Pengajuan SPM -->


            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Keterangan</h4>
                    </div>
                    <div class="card-content pb-4">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="<?= base_url('assets/'); ?>images/faces/konsol.svg">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Konsolidator</h5>
                                    <h6 class="text-muted mb-0">pihak penanggung jawab sebagai media informasi dan konsolidasi bagi SKPD jika terdapat kesulitan maupun media bertanya dalam pengisian BI dan Persediaan.</h6>
                                </div>
                            </div>
                        </a>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="<?= base_url('assets/'); ?>images/faces/admin.svg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Admin Website</h5>
                                <h6 class="text-muted mb-0">pihak yang bertanggung jawab jika terjadi error pada <i>website</i> ini.</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <!-- <div class="avatar avatar-lg">
                                            <img src="<?= base_url('assets/'); ?>images/faces/9.jpg">
                                        </div> -->
                            <div class="name ms-4">
                                <!-- <h5 class="mb-1">Ismail</h5> -->
                                <h6 class="mb-0"><i>Semua keterangan di atas bisa diakses pada menu.</i></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>