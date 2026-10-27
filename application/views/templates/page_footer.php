<style>
    .td-ismail {
        color: white;
    }

    .btn-dark {
        color: #fff;
        background-color: #e75ed0;
        border-color: #e75ed0
    }

    .btn-check:focus+.btn-dark,
    .btn-dark:focus,
    .btn-dark:hover {
        color: #fff;
        background-color: #a7178f;
        border-color: #a7178f
    }

    .btn-check:focus+.btn-info,
    .btn-info:focus,
    .btn-info:hover {
        color: #fff;
        background-color: #0a7388;
        border-color: #0a7388
    }

    .btn-amara {
        color: #353535;
        background-color: #bff52a;
        border-color: #bff52a
    }

    .btn-check:focus+.btn-amara,
    .btn-amara:focus,
    .btn-amara:hover {
        color: #000000;
        background-color: #94c709;
        border-color: #94c709
    }

    .btn-ryan {
        color: #ffffff;
        background-color: #e48315;
        border-color: #e48315
    }

    .btn-check:focus+.btn-ryan,
    .btn-ryan:focus,
    .btn-ryan:hover {
        color: #ffffff;
        background-color: #a15b0a;
        border-color: #a15b0a
    }
</style>


<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content w3-animate-zoom">
            <div class="modal-header bg-info">
                <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                    <i class="fa fa-fw fa-lg fa-times"></i>
                </button>
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    <img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                    Daftar Konsolidator SKPD Kab. Sampang
                </h5>
                <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                    <i class="fa fa-fw fa-lg fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- table hover -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="table-warning">
                                <th style="width: 10%;" class="text-center">NO.</th>
                                <th style="width: 50%;" class="text-center">NAMA SKPD</th>
                                <th style="width: 40%;" class="text-center">KONSOLIDATOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabelKonsolidator">
                            <tr>
                                <td colspan="3" class="text-center">
                                    Memuat data...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const tbody = document.getElementById('tabelKonsolidator');

                        fetch('<?= base_url("assets/data/data_konsolidator.json"); ?>')
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Gagal memuat data JSON');
                                }

                                return response.json();
                            })
                            .then(data => {
                                tbody.innerHTML = '';

                                data.forEach(item => {
                                    const tr = document.createElement('tr');

                                    // Kolom nomor
                                    const tdNo = document.createElement('td');
                                    tdNo.className = 'td-ismail text-center';
                                    tdNo.textContent = item.no;
                                    tr.appendChild(tdNo);

                                    // Kolom nama SKPD
                                    const tdSkpd = document.createElement('td');
                                    tdSkpd.className = 'td-ismail';
                                    tdSkpd.textContent = item.nama_skpd;
                                    tr.appendChild(tdSkpd);

                                    // Kolom konsolidator dan link WhatsApp
                                    const tdKonsolidator = document.createElement('td');
                                    tdKonsolidator.className = 'td-ismail text-center';

                                    const link = document.createElement('a');
                                    link.href = item.link_wa;
                                    link.className = item.type;
                                    link.target = '_blank';
                                    link.rel = 'noopener noreferrer';

                                    // Nama konsolidator dicetak tebal
                                    const nama = document.createElement('strong');
                                    nama.textContent = item.konsolidator;
                                    link.appendChild(nama);

                                    link.appendChild(document.createElement('br'));

                                    link.appendChild(
                                        document.createTextNode(item.pangkat_gol)
                                    );

                                    link.appendChild(document.createElement('br'));

                                    link.appendChild(document.createTextNode(item.nip));

                                    tdKonsolidator.appendChild(link);
                                    tr.appendChild(tdKonsolidator);

                                    tbody.appendChild(tr);
                                });
                            })
                            .catch(error => {
                                console.error(error);

                                tbody.innerHTML = `
                            <tr>
                                <td colspan="4" class="text-center text-danger">
                                    Gagal memuat data konsolidator.
                                </td>
                            </tr>
                        `;
                            });
                    });
                </script>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<br>
</div>
</div>
<footer style="background-color: #435ebe; padding: 25px; border-top: #f3bc24 solid 10px;">
    <div class="footer clearfix mb-0">
        <div class="row">
            <!-- <div id="rectangle-ismail"></div> -->
            <div class="col-md-4 col-sm-none">
            </div>
            <div class="col-md-4">
                <h5 style="color: #f3bc24;">Links</h5>
                <div style="padding: 15px;">
                    <ul style="color: #f3bc24;">
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable" style="color: white;">Daftar Konsolidator</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send/?phone=6281913333320&text=Halo%2C+Developer+Aset&type=phone_number&app_absent=0" style="color: white;" target="_blank">Chat Developer</a>
                        </li>
                        <li>
                            <a href="<?= base_url('auth/') ?>" style="color: white;">Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= base_url('umum/info') ?>" style="color: white;">Info</a>
                            <!-- <?php if ($user['id_role'] = 1) : ?>
                                <a href="<?= base_url('admin/info') ?>" style="color: white;">Info</a>
                            <?php elseif ($user['id_role'] = 2) : ?>
                                <a href="<?= base_url('user/info') ?>" style="color: white;">Info</a>
                            <?php elseif ($user['id_role'] = 3) : ?>
                                <a href="<?= base_url('umum/info') ?>" style="color: white;">Info</a>
                            <?php elseif ($user['id_role'] = 4) : ?>
                                <a href="<?= base_url('developer/info') ?>" style="color: white;">Info</a>
                            <?php endif; ?> -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-3">
                    <h5 style="color: #f3bc24;">Contact Us</h5>
                </div>
                <div class="row">
                    <table>
                        <tr>
                            <td><i class="fa fa-fw fa-lg fa-building" style="color: #f3bc24;"></i></td>
                            <td>
                                <a style="color: white;" href="https://www.google.com/maps/place/BPPKAD+Kab+Sampang/@-7.19536,113.2448533,17z/data=!4m5!3m4!1s0x2dd787014528a18f:0xb563f506b0793054!8m2!3d-7.1958336!4d113.2446815" target="_blank">
                                    Rajawali 04, st.
                                </a>
                            </td>
                        </tr>
                        <tr style="margin-bottom: 5px;">
                            <td></td>
                            <td style="color: white;">Sampang, 69213</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-fw fa-lg fa-phone-square" style="color: #f3bc24;"></i></td>
                            <td>
                                <a style="color: white;" href="tel:0323321024" target="_blank"> (0323) 321024</a>
                            </td>
                        </tr>
                        <tr style="margin-bottom: 5px;">
                            <td></td>
                            <td style="color: white;"><i>(Mon to Fri 7:30am to 16:00pm)</i></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-fw fa-lg fa-envelope-open" style="color: #f3bc24;"></i></td>
                            <td>
                                <a style="color: white;" href="mailto:bppkad@sampangkab.go.id?subject=Tulis%20Judul%20Email%20Anda%20%di%20Sini%20default&body=Tulis%20Pesan%20Email%20Anda%20%di%20Sini." target="_blank">
                                    bppkad@sampangkab.go.id
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</footer>
<div style="justify-content: center; display: flex; padding-top: 10px; background-color: #3d54aa;">
    <p style="color: #fff;">
        Copyright &copy; <?= date('Y'); ?> | Version 3 2025 Made with &hearts; by <a style="color: #fff;" href="https://api.whatsapp.com/send/?phone=6281913333320&text=Halo%2C+Developer+Aset.&type=phone_number&app_absent=0" target="_blank">Ismail Aset BPPKAD</a>
    </p>
</div>
<script src="<?= base_url('assets/'); ?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-3.6.0.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendors/apexcharts/apexcharts.js"></script>
<script src="<?= base_url('assets/'); ?>js/pages/dashboard.js"></script>

<script src="<?= base_url('assets/'); ?>js/extensions/sweetalert2.js"></script>
<script src="<?= base_url('assets/'); ?>vendors/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Tostify -->
<script src="<?= base_url('assets/'); ?>vendors/toastify/toastify.js"></script>
<script src="<?= base_url('assets/'); ?>js/extensions/toastify.js"></script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/wow/wow.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/owlcarousel/owl.carousel.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendors/simple-datatables/simple-datatables.js"></script>

<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery.min.js"></script>
<!-- <script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery-ui.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>moment.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.min.js"></script> -->



<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script src="<?= base_url('assets/'); ?>js/main.js"></script>
<script src="<?= base_url('assets/'); ?>js/pages/app.js"></script>

<!-- SweetAlert when Load page -->
<script src="<?= base_url('assets/'); ?>js/extensions/sweetalert.min.js"></script>

<!-- style transparent swal -->
<style>
    .swal2-modal {
        background-color: rgba(255, 255, 255, 0.02) !important;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.01);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    }

    .swal2-title {
        color: white;
    }

    .swal2-content {
        color: white;
    }
</style>
<!-- /style transparent swal -->
<script>
    // Wait for the page to fully load before showing the alert
    window.addEventListener('load', function() {
        // Swal.fire({
        //     title: "Welcome!",
        //     text: "This page has been reloaded.",
        //     icon: "success",
        //     showConfirmButton: false,
        //     timer: 1000,
        // });
        // window.location.href = "http://103.146.132.145:9637/";
    });
</script>
<!-- /SweetAlert when Load page -->

<!-- E-BMD -->
<form id="formPosisiURL" action="<?= base_url('auth/loginEBMD') ?>" method="post">
    <input type="hidden" id="posisiURL" name="posisiURL">
</form>
<div class="px-4">
    <form id="frmEbmD" action="https://e-bmd.sampangkab.go.id/auth/authenticate"
        method="post" target="_blank" rel="noopener noreferrer">
        <input type="hidden" id="usernameEBMD" name="username">
        <input type="hidden" id="passwordEBMD" name="password">
        <input type="hidden" name="loginperiode" value="2026">
        <input type="hidden" name="linkblud" value="https://e-bmd.sampangkab.go.id/">
    </form>

    <!-- <a href="<?= base_url('auth/loginEBMD') ?>" class='btn btn-block btn-xl btn-secondary font-bold mt-3'>Login E-BMD</a> -->
    <!-- Modal -->
    <div class="modal fade text-left" id="submitEBMDmdl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="myModalLabel33">Anda Yakin Login E-BMD?</h5>
                    <button type="button" class="close" aria-label="Close" onclick="batalSubmit()">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <p class="text-center">
                        <a href="javascript:void(0)" class="btn btn-success font-bold" id="btn_submit_EBMD" onclick="loginEBMD()">
                            YA
                        </a>
                        <a href="javascript:void(0)" class="btn btn-secondary font-bold" id="btn_submit_EBMD" onclick="batalSubmit()">
                            TIDAK
                        </a>
                    </p>
                </div>
                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-light-secondary" onclick="batalSubmit()">
                        <i class="fa fa-fw fa-times d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
            <!-- Script -->
            <script>
                function toLogInEBMD() {
                    // Ini diisi dari PHP
                    <?php
                    $parsed = parse_url(current_url());

                    $path1 = isset($parsed['path']) ? ltrim($parsed['path'], '/') : '';
                    $path = str_replace("backup_aset_bppkad.github.io-main/", '', $path1);
                    ?>
                    var currentUrl = "<?= $path; ?>";
                    document.getElementById('posisiURL').value = currentUrl;
                    document.getElementById('formPosisiURL').submit();
                    // alert("URL saat ini:\n" + currentUrl);
                }

                function loginEBMD() {
                    document.getElementById('frmEbmD').submit();
                    document.getElementById("usernameEBMD").value = "";
                    document.getElementById("passwordEBMD").value = "";
                    $("#submitEBMDmdl").modal("hide");
                }

                function batalSubmit() {
                    document.getElementById("usernameEBMD").value = "";
                    document.getElementById("passwordEBMD").value = "";
                    $("#submitEBMDmdl").modal("hide");
                }
            </script>
        </div>
    </div>
    <!-- Modal -->
</div>
<!-- E-BMD -->



</body>

</html>