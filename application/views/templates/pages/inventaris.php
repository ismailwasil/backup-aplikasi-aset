<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Buku Inventaris</h3>
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
    <?= $this->session->flashdata('message'); ?>
    <!-- Script untuk trigger modal dari controller -->
    <script src="<?= base_url('assets/'); ?>js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#small").modal("show");
        });
    </script>
    <!-- /Script untuk trigger modal dari controller -->
    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-9">
                <!-- konsolidator -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Konsolidator</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Pihak penanggung jawab sebagai media informasi dan konsolidasi bagi SKPD jika terdapat kesulitan maupun media bertanya dalam pengisian BI dan Persediaan.
                            </p>
                            <!-- Button trigger for scrolling content modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
                                Lihat Konsolidator
                            </button>

                        </div>
                    </div>
                </div>
                <!-- /konsolidator -->
                <div class="card" style="padding: 2%;">
                    <!-- Groups section start -->
                    <section id="groups">
                        <div class="row match-height">
                            <div class="col-12 mt-3 mb-1">
                                <h4 class="section-title">Akses Buku Inventaris Di Sini</h4>
                            </div>
                        </div>
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="card-group col-md-4">
                                        <div class="card" style="padding: 15px;">
                                            <?php if ($user['id'] == 11) : ?>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#cekPassDrive">
                                                <?php elseif ($user['id'] == 13) : ?>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#cekPassDriveDinkes">
                                                    <?php else : ?>
                                                        <a href="<?= $user['link_bi'] ?>" target="_blank">
                                                        <?php endif; ?>
                                                        <div class="card-content">
                                                            <img class="card-img-top img-fluid" src="<?= base_url('assets/'); ?>images/logo/drive.png" alt="BI">
                                                            <div class="card-body">
                                                                <h4 class="card-title text-center">BI <?= $user['akronim'] ?></h4>
                                                                <p class="card-text text-center">
                                                                    Buku Inventaris <?= $user['name'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group col-md-4 <?= $user['id'] == 13 ? null : 'd-none' ?>">
                                <!--Cek Password Drive -->
                                <div class="modal fade text-left" id="cekPassDriveDinkes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h4 class="modal-title" id="myModalLabel33">Password Konfirmasi </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <label style="color: black; font-weight: bolder;">Password: </label>
                                                <div class="form-group">
                                                    <input type="password" placeholder="Masukkan Password ..." class="form-control" name="pwdDriveDinkes" id="pwdDriveDinkes">
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-info">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="fa fa-fw fa-times d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" id="konfirmDinkes" class="btn btn-success ml-1">
                                                    <i class="fa fa-fw fa-cloud-upload d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Confirm</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal pilihan setelah password -->
                                <div class="modal fade text-left" id="PilihanDriveDinkes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h4 class="modal-title" id="myModalLabel33">Menuju BI</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                    <a href="<?= $user['link_bi'] ?>" target="_blank" type="button" id="BIdinkes" class="btn btn-danger">BI Dinkes</a>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-warning">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="fa fa-fw fa-times d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    document.getElementById("konfirmDinkes").addEventListener("click", function(event) {
                                        event.preventDefault();
                                        var password = document.getElementById("pwdDriveDinkes").value;
                                        const biDinkes = document.getElementById("BIdinkes");

                                        function muatUlang() {
                                            window.location.reload();
                                        }
                                        // Periksa kata sandi
                                        if (password === "dinkesyangbisa") { // Ganti "dinkesyangbisa" dengan kata sandi yang Anda inginkan
                                            // Jika kata sandi benar, arahkan pengguna ke halaman yang dituju
                                            // window.open("https://drive.google.com/drive/folders/1bSq3wpd9GCJ3__p8oKPYNhathvspSZvC?usp=sharing", "_blank");
                                            // window.location.reload();
                                            // Menutup modal dengan id 'cekPassDriveDinkes'
                                            $("#pwdDriveDinkes").val("");
                                            $('#cekPassDriveDinkes').modal('hide');
                                            $('#PilihanDriveDinkes').modal('show');
                                            biDinkes.addEventListener('click', muatUlang);
                                        } else if (password === "") {
                                            // Jika kata sandi kosong, mungkin tampilkan pesan kesalahan
                                            alert("Kata sandi kosong!");
                                        } else {
                                            // Jika kata sandi salah, mungkin tampilkan pesan kesalahan
                                            $("#pwdDriveDinkes").val("");
                                            alert("Kata sandi salah. Akses ditolak.");
                                        }
                                    })
                                </script>

                            </div>
                        </div>

                        <!--Cek Password Drive -->
                        <div class="modal fade text-left" id="cekPassDrive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" data-bs-backdrop="false">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title" id="myModalLabel33">Password Konfirmasi </h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form id="cekPass" action="<?= base_url('auth/cek_password_drive') ?>" method="post">
                                        <div class="modal-body">
                                            <label class="d-none" style="color: black; font-weight: bolder;">Id: </label>
                                            <div class="form-group">
                                                <input type="text" value="<?= $user['id'] ?>" class="form-control" name="id_user" hidden>
                                            </div>
                                            <label class="d-none" style="color: black; font-weight: bolder;">Jenis Layanan: </label>
                                            <div class="form-group">
                                                <input type="text" value="1" class="form-control" name="jenis_layanan" hidden>
                                            </div>
                                            <label style="color: black; font-weight: bolder;">Password: </label>
                                            <div class="form-group">
                                                <input type="password" placeholder="Masukkan Password ..." class="form-control" name="pwdDrive">
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-info">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="fa fa-fw fa-times d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button type="submit" id="konfirm" class="btn btn-success ml-1">
                                                <i class="fa fa-fw fa-cloud-upload d-sm-none"></i>
                                                <span class="d-none d-sm-block">Confirm</span>
                                            </button>
                                            <button type="button" id="load-konfirm" class="btn btn-light-success ml-1 d-none">
                                                <i class="fa fa-spin fa-fw fa-refresh d-sm-none"></i>
                                                <span class="d-none d-sm-block"><i class="fa fa-spin fa-fw fa-refresh"></i> Confirm</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.getElementById("cekPass").addEventListener("submit", function(event) {
                                event.preventDefault();
                                document.getElementById("konfirm").classList.toggle('d-none');
                                document.getElementById("load-konfirm").classList.toggle('d-none');
                                document.getElementById("cekPass").submit();
                            })
                        </script>
                    </section>
                    <!-- /Groups section start -->
                </div>
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