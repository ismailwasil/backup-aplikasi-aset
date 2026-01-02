<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>

    <style>
        .btn.btn-light-secondary-Is {
            background-color: #94959638;
            /* color: #181e24 */
        }

        .btn.btn-light-secondary-Is:hover {
            background-color: #94959662;
            /* color: #181e24 */
        }

        .btn.btn-light-secondary-Is-Login {
            background-color: #ffffff9f;
            /* color: #181e24 */
        }

        .btn.btn-light-secondary-Is-Login:hover {
            background-color: #c7c7c79f;
            /* color: #181e24 */
        }
    </style>

    <audio class="d-none" id="notifSound" src="<?= base_url('assets/sounds/notif2.mp3') ?>"></audio>

    <nav class="navbar navbar-expand navbar-light float-end float-sm-end">
        <div class="container-fluid justify-content-end">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- query -->
                <?php
                $IdUser = $user['id'];
                $queryUser = "SELECT * 
                            FROM data_user JOIN user_role 
                            ON data_user.id_role = user_role.id
                            WHERE data_user.id=$IdUser
                        ";
                $position = $this->db->query($queryUser)->row_array();
                ?>
                <!-- /query -->
                <?php if ($position['id_role'] == 3) : ?>
                    <a href="<?= base_url('auth/login'); ?>">
                        <div class="btn glow-on-hover row">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h5 class="mb-0">Log in</h5>
                                    <p class="mb-0 text-sm"><?= $position['role'] ?></p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="<?= base_url('assets/'); ?>images/faces/default.png" alt="Default.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php else : ?>
                    <?php if ($position['id_role'] == 1) : ?>
                        <div>
                            <?php
                            $tahunSkr = date("Y");
                            $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=1 AND tgl_aju LIKE '$tahunSkr%'";
                            $jumlah = $this->db->query($queryRootNotif)->num_rows();
                            ?>
                            <li class="nav-item dropdown me-3 notification-icon">
                                <a class="nav-link active text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"> <!-- class="dropdown-toggle " untuk drop toggle segitiga-->
                                    <i class='fa fa-fw fa-bell-o fa-2x'></i>
                                    <span class="badge-icon" id="bell">
                                        <span id="notif"><?= $jumlah ?></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-start notification-dropdown" aria-labelledby="dropdownMenuButton">
                                    <li class="dropdown-header">
                                        <h6>Notifications</h6>
                                    </li>
                                    <li class="dropdown-item notification-item">
                                        <a class="d-flex align-items-center" href="verifikasi_spm">
                                            <span id="notif_badge" class="badge rounded-pill bg-info">
                                                <span id="notif-list"><?= $jumlah ?></span>
                                            </span>&nbsp; SPM masuk
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                if (<?= $jumlah ?> == 0) {
                                    document.getElementById('bell').classList.add("d-none");
                                }
                            })
                        </script>
                    <?php elseif ($position['id_role'] == 2) : ?>
                        <div>
                            <?php
                            $tahunSkr = date("Y");
                            $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=? AND skpd=$IdUser AND tgl_aju LIKE '$tahunSkr%'";
                            $jumlahproses = $this->db->query($queryRootNotif, array(1))->num_rows();
                            $jumlahtolak = $this->db->query($queryRootNotif, array(2))->num_rows();
                            ?>
                            <li class="nav-item dropdown me-3 notification-icon">
                                <a class="nav-link active text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"> <!-- class="dropdown-toggle " untuk drop toggle segitiga-->
                                    <i class='fa fa-fw fa-bell-o fa-2x'></i>
                                    <span class="badge-icon" id="bell-user">
                                        <span id="notif-user"><?= $jumlahproses + $jumlahtolak ?></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-start notification-dropdown" aria-labelledby="dropdownMenuButton">
                                    <li class="dropdown-header">
                                        <h6>Notifications</h6>
                                    </li>
                                    <li class="dropdown-item notification-item">
                                        <a class="d-flex align-items-center" href="pengajuan_spm">
                                            <span id="notif_badge" class="badge rounded-pill bg-success">
                                                <span id="notif-proses"><?= $jumlahproses ?></span>
                                            </span>&nbsp; SPM diproses
                                        </a>
                                    </li>
                                    <li class="dropdown-item notification-item">
                                        <a class="d-flex align-items-center" href="pengajuan_spm">
                                            <span id="notif_badge" class="badge rounded-pill bg-danger">
                                                <span id="notif-tolak"><?= $jumlahtolak ?></span>
                                            </span>&nbsp; SPM ditolak
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                if (<?= $jumlahproses + $jumlahtolak ?> == 0) {
                                    document.getElementById('bell-user').classList.add("d-none");
                                }
                            })
                        </script>
                    <?php endif; ?>
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="btn glow-on-hover row">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0"><?= $position['akronim'] ?></h6>
                                        <?php if ($position['status_skpd'] != NULL): ?>
                                            <p class="mb-0 text-sm">UPTD</p>
                                        <?php else: ?>
                                            <p class="mb-0 text-sm"><?= $position['role'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="<?= base_url('assets/'); ?>images/faces/default.png" alt="Default.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Hello, <?= $position['akronim'] ?></h6>
                            </li>
                            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#viewProfile"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                            <?php if ($position['id_role'] == 1 or $position['id_role'] == 2 or $position['id_role'] == 4) : ?>
                                <li class="d-none"><a class="dropdown-item" href="<?= base_url('auth/login'); ?>"><i class="icon-mid bi bi-person me-2"></i> Log In</a></li>
                                <hr class="dropdown-divider">
                                <button id="question_logout" class="dropdown-item"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="<?= base_url('auth/login'); ?>"><i class="icon-mid bi bi-person me-2"></i> Log In</a></li>
                                <hr class="dropdown-divider">
                                <button id="question_logout" class="dropdown-item d-none"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button>
                            <?php endif; ?>

                            <script>
                                document.getElementById('question_logout').addEventListener('click', (e) => {
                                    Swal.fire({
                                        icon: "question",
                                        title: "Do you wanna Log out?",
                                        showCancelButton: true,
                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> Log out",
                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> No",
                                        reverseButtons: false,
                                        cancelButtonColor: '#DD6B55',
                                    }).then(function(result) {
                                        if (result.value) {
                                            window.location.href =
                                                "<?= base_url('auth/logout'); ?>";
                                        } else if (result.dismiss === "cancel") {
                                            Swal.fire({
                                                title: "Cancelled!",
                                                text: "You still in the page",
                                                icon: "error",
                                                showConfirmButton: false,
                                                timer: 1300
                                            })
                                        }
                                    })
                                })
                            </script>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- View Profil -->
        <div class="modal fade text-left" id="viewProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <i class="fa fa-fw fa-lg fa-times"></i>
                        </button>
                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle">
                            Profil <?= $user['akronim'] ?>
                        </h4>
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <i class="fa fa-fw fa-lg fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center text-info">
                            <img class="img-error" src="<?= base_url('assets/') ?>images/logo/Sampang.png" alt="Profile" width="30"> <?= $user['akronim'] ?>
                        </h3>
                        <table class="table-responsive" style="width:100%; color: white;">
                            <tr style="height: 50px;">
                                <th style="padding: 5px;">NAMA</th>
                                <th style="padding: 5px;">:</th>
                                <td style="padding: 5px;"><?= $user['name'] ?></td>
                            </tr>
                            <tr style="height: 50px;">
                                <th style="padding: 10px 5px 5px 5px;">
                                    <p>USERNAME</p>
                                </th>
                                <th style="padding: 10px 5px 5px 5px;">
                                    <p>:</p>
                                </th>
                                <td style="padding: 5px;">
                                    <p>
                                        <?php $id_user_for_input = $user['id'] ?>
                                    <form id="ubah_username_profile" action="<?= base_url('auth/ubah_username_profile/') . $id_user_for_input ?>" method="post">
                                        <input class="d-none" type="text" id="input_username" name="input_username" value="<?= $user['username'] ?>">
                                        <span class="" id="span_username"><?= $user['username'] ?></span>
                                        <i class="fa fa-fw fa-pencil" id="pencil" style="color: yellow; cursor: pointer;"></i>
                                        <i class="d-none fa fa-fw fa-lg fa-check" id="check" style="color: greenyellow; cursor: pointer;"></i>
                                        <i class="d-none fa fa-fw fa-lg fa-times" id="cancel" style="color: orangered; cursor: pointer;"></i>
                                        <i class="d-none fa fa-fw fa-spin fa-cog" id="spinner" style="color: yellow;"></i>
                                    </form>
                                    </p>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <?php
                        $wadevelop = 'https://api.whatsapp.com/send/?phone=6281913333320&text=Hallo%20Developer%20Aset%2C%0ASaya%20admin%20' . $user['akronim'] . '%2C%20ingin%20mengganti%20password.&type=phone_number&app_absent=0';
                        ?>
                        <p style="color: yellow;">Hubungi developer untuk ganti password 👉</p>
                        <a href="<?= $wadevelop ?>" class="btn btn-info" style="font-weight: bolder;" target="_blank">
                            <i class="fa fa-fw fa-code"></i> Developer
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /View Profil -->
        <script>
            const pencil = document.querySelector('#pencil');
            const check = document.querySelector('#check');
            const cancel = document.querySelector('#cancel');
            const spinner = document.querySelector('#spinner');
            const span_username = document.querySelector('#span_username');
            const input_username = document.querySelector('#input_username');
            document.getElementById("pencil").addEventListener("click", function(event) {
                pencil.classList.toggle('d-none')
                check.classList.toggle('d-none')
                cancel.classList.toggle('d-none')
                span_username.classList.toggle('d-none')
                input_username.classList.toggle('d-none')
            })
            document.getElementById("check").addEventListener("click", function(event) {
                check.classList.toggle('d-none')
                spinner.classList.toggle('d-none')
                cancel.classList.toggle('d-none')
                document.getElementById("ubah_username_profile").submit();
            })
            document.getElementById("cancel").addEventListener("click", function(event) {
                pencil.classList.toggle('d-none')
                check.classList.toggle('d-none')
                cancel.classList.toggle('d-none')
                input_username.classList.toggle('d-none')
                span_username.classList.toggle('d-none')
            })
        </script>
    </nav>
    <?php if ($position['id_role'] == 1) : ?>
        <script>
            function playNotificationSound() {
                var audio = document.getElementById("notifSound");
                audio.play();
            }

            <?php
            $echonotif = base_url('auth/notif/');
            ?>
            var pathDocNotif = "<?= $echonotif ?>";
        </script>
        <script src="<?= base_url('assets/js/notif.js') ?>"></script>
    <?php elseif ($position['id_role'] == 2) : ?>

        <!-- Notif User -->
        <script>
            function playNotificationSound() {
                var audio = document.getElementById("notifSound");
                audio.play();
            }
            <?php
            $echonotifUser = base_url('auth/notif_user/');
            ?>
            var pathDocNotifUser = "<?= $echonotifUser ?>";
        </script>
        <script src="<?= base_url('assets/js/notif-alter.js') ?>"></script>
    <?php endif ?>

</header>