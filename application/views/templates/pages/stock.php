<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Buku Persediaan</h3>
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
                                <h4 class="section-title">Akses Persediaan Di Sini</h4>
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
                                                        <a href="<?= $user['link_stock'] ?>" target="_blank">
                                                        <?php endif; ?>
                                                        <div class="card-content">
                                                            <img class="card-img-top img-fluid" src="<?= base_url('assets/'); ?>images/logo/drive.png" alt="Stock">
                                                            <div class="card-body">
                                                                <h4 class="card-title text-center">PERSEDIAAN <?= $user['akronim']; ?></h4>
                                                                <p class="card-text text-center">
                                                                    Buku Persediaan <?= $user['name'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </a>
                                        </div>
                                    </div>
                                    <div class="card-group col-md-4 <?= $user['id'] == 13 ? null : 'd-none' ?>">
                                        <!-- <style>
                                            .filter-UPTD {
                                                transform: rotate(180deg);
                                                -webkit-transform: rotate(180deg);
                                                -moz-transform: rotate(180deg);
                                                filter: grayscale(48%);
                                                -webkit-filter: grayscale(48%);
                                                -moz-filter: grayscale(48%);
                                            }
                                        </style>
                                        <div class="card" style="padding: 15%;">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#cekPassDriveDinkes">
                                                <div class="card-content">
                                                    <img class="card-img-top img-fluid filter-UPTD" src="<?= base_url('assets/'); ?>images/logo/drive.png" alt="Stock">
                                                    <div class="card-body">
                                                        <h4 class="card-title text-center">PERSEDIAAN UPTD <?= $user['akronim']; ?></h4>
                                                        <p class="card-text text-center">
                                                            Buku Persediaan UPTD <?= $user['name'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div> -->
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
                                                    <form id="cekPass" action="<?= base_url('auth/cek_password_drive') ?>" method="post">
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
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal pilihan setelah password -->
                                        <div class="modal fade text-left" id="PilihanDriveDinkes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" data-bs-backdrop="false">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning">
                                                        <h4 class="modal-title" id="myModalLabel33">Pilih Salah Satu</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                            <a href="<?= $user['link_stock'] ?>" target="_blank" type="button" id="persediaanDinkes" class="btn btn-danger">Persediaan Dinkes</a>
                                                            <a href="https://drive.google.com/drive/folders/1bSq3wpd9GCJ3__p8oKPYNhathvspSZvC?usp=sharing" target="_blank" type="button" id="UPTDpersediaanDinkes" class="btn btn-success">Persediaan Semua UPTD</a>
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
                                                const sediaan = document.getElementById("persediaanDinkes");
                                                const sediaanUPTD = document.getElementById("UPTDpersediaanDinkes");

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
                                                    sediaan.addEventListener('click', muatUlang);
                                                    sediaanUPTD.addEventListener('click', muatUlang);
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
                                    <!-- UPTD -->
                                    <div class="card-group col-md-4 <?= $user['id'] == 13 ? null : 'd-none' ?>">
                                        <select id="uptd_PKM" class="dropbtn" style="height: max-content;">
                                            <option disabled selected value="">-- Khusus Pilih Puskesmas --</option>
                                            <option value='pkm_sreseh'>1. PKM SRESEH</option>
                                            <option value='pkm_torjun'>2. PKM TORJUN</option>
                                            <option value='pkm_pangarengan'>3. PKM PANGARENGAN</option>
                                            <option value='pkm_kamoning'>4. PKM KAMONING</option>
                                            <option value='pkm_banyuanyar'>5. PKM BANYUANYAR</option>
                                            <option value='pkm_camplong'>6. PKM CAMPLONG</option>
                                            <option value='pkm_tanjung'>7. PKM TANJUNG</option>
                                            <option value='pkm_omben'>8. PKM OMBEN</option>
                                            <option value='pkm_jrangoan'>9. PKM JRANGOAN</option>
                                            <option value='pkm_kedungdung'>10. PKM KEDUNGDUNG</option>
                                            <option value='pkm_banjar'>11. PKM BANJAR</option>
                                            <option value='pkm_jrengik'>12. PKM JRENGIK</option>
                                            <option value='pkm_tambelangan'>13. PKM TAMBELANGAN</option>
                                            <option value='pkm_banyuates'>14. PKM BANYUATES</option>
                                            <option value='pkm_bringkoning'>15. PKM BRINGKONING</option>
                                            <option value='pkm_robatal'>16. PKM ROBATAL</option>
                                            <option value='pkm_karang_penang'>17. PKM KARANG PENANG</option>
                                            <option value='pkm_ketapang'>18. PKM KETAPANG</option>
                                            <option value='pkm_bunten_barat'>19. PKM BUNTEN BARAT</option>
                                            <option value='pkm_batulenger'>20. PKM BATULENGER</option>
                                            <option value='pkm_tamberu_barat'>21. PKM TAMBERU BARAT</option>
                                            <option value='pkm_mandangin'>22. PKM MANDANGIN</option>
                                        </select>
                                        <script src="<?= base_url('assets/js/cekPWDpuskesmas.js') ?>"></script>
                                        <script>
                                            document.getElementById("uptd_PKM").addEventListener("change", openModal);
                                            // document.getElementById("uptd_PKM").addEventListener("change", function() {
                                            //     alert("Kamu memilih " + this.value);
                                            // });
                                        </script>
                                    </div>
                                    <!-- /UPTD -->
                                </div>
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
                                                <input type="text" value="2" class="form-control" name="jenis_layanan" hidden>
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
                                <a href="<?= base_url('user/stock2') ?>">
                                    <h6 class="mb-0"><i>Semua keterangan di atas bisa diakses pada menu.</i></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault(); // Mencegah aksi default saat klik kanan
    });
</script> -->