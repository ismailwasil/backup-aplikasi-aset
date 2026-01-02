    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User Management</h3>
                    <p class="text-subtitle text-muted">Halaman ini hanya bisa diakses oleh <strong>developer</strong>.</p>
                </div>
            </div>
        </div>
        <?= form_error('menu', '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

        <section class="section">
            <div class="row justify-content-center">
                <div class="col-sm-4 mb-1">
                    <form action="" name="JsToPHP" id="JsToPHP" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-info text-white">Cari berdasar</span>
                            <select class="form-select" id="role_input" name="role_input">
                                <option selected style="font-style: italic;" value="">-- Pilih Role --</option>
                                <option value="">Semua</option>
                                <option value="Administrator" class="text-orange">Administrator</option>
                                <option value="SKPD" class="text-primary">SKPD</option>
                            </select>
                            <button type="submit" class="input-group-text bg-info" id="cari_data_user"><i class="fa fa-fw fa-lg fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9">
                    <a href="javascript:;" class="code_view actionBtn21" data-bs-toggle="modal" data-bs-target="#manageUserModal">
                        <i class="ico-plus2">
                            <span></span>
                            <span></span>
                        </i>
                        <span class="lb">Tambah User</span>
                    </a>

                    <br>

                    <!-- Menu Action -->
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div id="filterJS">
                                <?php
                                // $filter = $_POST['role_input'];
                                $filter = "";
                                $filterQuery = "%" . $filter . "%";
                                $user_list = $this->db->query($userQuery, array(3, $filterQuery))->result_array();
                                ?>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <!-- table hover -->
                                    <div class="">
                                        <table class="table mb-0 display" id="example" style="width:100%">
                                            <style>
                                                .thead-ismail {
                                                    background-color: #89b5f8b4;
                                                }
                                            </style>
                                            <thead class="thead-ismail">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>NAMA</th>
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">USERNAME</th>
                                                    <th class="text-center">ROLE</th>
                                                    <th class="text-center">STATUS</th>
                                                    <th class="text-center">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="thead-ismail">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>NAMA</th>
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">USERNAME</th>
                                                    <th class="text-center">ROLE</th>
                                                    <th class="text-center">STATUS</th>
                                                    <th class="text-center">ACTION</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                ?>
                                                <?php foreach ($user_list as $ulist) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i; ?></td>
                                                        <td class=""><?= $ulist['name']; ?></td>
                                                        <td class="text-center"><?= $ulist['id_user']; ?></td>
                                                        <td class="text-center"><?= $ulist['username']; ?></td>
                                                        <td class="text-center"><?= $ulist['role']; ?></td>
                                                        <td class="text-center">
                                                            <?php if ($ulist['is_active'] == 1) : ?>
                                                                Aktif
                                                            <?php elseif ($ulist['is_active'] == 0) : ?>
                                                                Tidak Aktif
                                                            <?php endif ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="badge bg-info" data-bs-toggle="modal" data-bs-target="#ubahPassword<?= $ulist['id_user'] ?>"><i class="bi bi-key"></i></button>
                                                            <button class="badge btn-edit-ismail" data-bs-toggle="modal" data-bs-target="#editModal<?= $ulist['id_user'] ?>"><i class="bi bi-pencil-square"></i></button>
                                                            <button class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $ulist['id_user'] ?>"><i class="bi bi-trash"></i></button>
                                                        </td>
                                                        <!-- Ubah Password Modal -->
                                                        <div class="modal fade text-left modal-borderless" id="ubahPassword<?= $ulist['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <h5 class="modal-title">
                                                                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                                <span class="d-sm-block">
                                                                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                </span>
                                                                            </button>
                                                                            Ubah Password
                                                                        </h5>
                                                                    </div>
                                                                    <form id="formUbahPassword<?= $ulist['id_user'] ?>" action="<?= base_url('developer/ubah_password'); ?>" method="post">
                                                                        <div class="modal-body">
                                                                            <h6 class="text-center" style="color: yellow; text-decoration: underline;">
                                                                                <?= $ulist['name']; ?></h6>

                                                                            <div class="form-group d-none">
                                                                                <label for="id">
                                                                                    <h6><i class="bi bi-key"></i> ID <strong style="color: red;">*</strong></h6>
                                                                                </label>
                                                                                <div class="position-relative">
                                                                                    <input type="text" class="form-control" value="<?= $ulist['id_user'] ?>" id="id" name="id">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="ubahpassword1">
                                                                                    <h6><i class="bi bi-shield-lock"></i>
                                                                                        Password Baru <strong style="color: red;">*</strong></h6>
                                                                                </label>
                                                                                <div class="input-group position-relative">
                                                                                    <input type="password" class="form-control" placeholder="Password" id="ubahpassword1" name="ubahpassword1">
                                                                                    <span class="input-group-text-Is"><i id="ubahshow1" class="showPass fa fa-fw fa-eye" style="cursor: pointer;"></i></span>
                                                                                    <?= form_error('ubahpassword1', '<small class="text-danger">', '</small>') ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="ubahpassword2">
                                                                                    <h6><i class="bi bi-shield-lock"></i> Ulangi
                                                                                        Password Baru <strong style="color: red;">*</strong></h6>
                                                                                </label>
                                                                                <div class="input-group position-relative">
                                                                                    <input type="password" class="form-control" placeholder="Ulangi Password" id="ubahpassword2" name="ubahpassword2">
                                                                                    <span class="input-group-text-Is"><i id="ubahshow2" class="showPass fa fa-fw fa-eye" style="cursor: pointer;"></i></span>
                                                                                    <?= form_error('ubahpassword2', '<small class="text-danger">', '</small>') ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                                <span class="d-sm-block">
                                                                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                </span>
                                                                            </button>
                                                                            <button type="submit" class="btn btn-info ml-1">
                                                                                <span class="d-sm-block">
                                                                                    <i class="fa fa-fw fa-pencil-square-o"></i>
                                                                                    Ubah</span>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            document.getElementById("formUbahPassword<?= $ulist['id_user'] ?>")
                                                                .addEventListener("submit", function(event) {
                                                                    event.preventDefault();
                                                                    Swal.fire({
                                                                        icon: "question",
                                                                        title: "Anda Yakin Mengubah Password?",
                                                                        showCancelButton: true,
                                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                        reverseButtons: false,
                                                                        cancelButtonColor: '#DD6B55',
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            document.getElementById(
                                                                                "formUbahPassword<?= $ulist['id_user'] ?>"
                                                                            ).submit();
                                                                        } else {
                                                                            Swal.fire({
                                                                                title: "Dibatalkan!",
                                                                                text: "Password belum diubah",
                                                                                icon: "error",
                                                                                showConfirmButton: false,
                                                                                timer: 1300
                                                                            })
                                                                        }
                                                                    })
                                                                })
                                                        </script>
                                                        <script>
                                                            const toggleubahPassword1 = document.querySelector('#ubahshow1');
                                                            const ubahpassword1 = document.querySelector('#ubahpassword1');

                                                            toggleubahPassword1.addEventListener('click', function(e) {
                                                                // toggle the type attribute
                                                                const ubahtype1 = ubahpassword1.getAttribute('type') ===
                                                                    'password' ? 'text' : 'password';
                                                                ubahpassword1.setAttribute('type', ubahtype1);
                                                                // toggle the eye slash icon
                                                                this.classList.toggle('fa-eye-slash');
                                                            });
                                                        </script>

                                                        <script>
                                                            const toggleubahPassword2 = document.querySelector('#ubahshow2');
                                                            const ubahpassword2 = document.querySelector('#ubahpassword2');

                                                            toggleubahPassword2.addEventListener('click', function(e) {
                                                                // toggle the type attribute
                                                                const ubahtype2 = ubahpassword2.getAttribute('type') ===
                                                                    'password' ? 'text' : 'password';
                                                                ubahpassword2.setAttribute('type', ubahtype2);
                                                                // toggle the eye slash icon
                                                                this.classList.toggle('fa-eye-slash');
                                                            });
                                                        </script>
                                                        <!-- /Ubah Password modal -->
                                                        <!-- ################################################################## -->
                                                        <!-- Delete Modal -->
                                                        <div class="modal fade text-left modal-borderless" id="delete<?= $ulist['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger">
                                                                        <h5 class="modal-title">
                                                                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                                                <span class="d-sm-block">
                                                                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                </span>
                                                                            </button>
                                                                            Delete User
                                                                        </h5>
                                                                    </div>
                                                                    <form id="formDelete<?= $ulist['id_user'] ?>" action="<?= base_url('developer/delete_user'); ?>" method="post">
                                                                        <div class="modal-body">
                                                                            <span style="color: aliceblue;">
                                                                                Nama User : <strong style="color: yellow;">
                                                                                    <?= $ulist['name']; ?></strong> <br>
                                                                                Username : <strong style="color: yellow;"><?= $ulist['username']; ?></strong>
                                                                                <br>
                                                                                <?php if ($ulist['id_role'] == 1) : ?>
                                                                                    Role ID : <strong style="color: yellow;">Administrator</strong>
                                                                                <?php elseif ($ulist['id_role'] == 2) : ?>
                                                                                    Role ID : <strong style="color: yellow;">SKPD</strong>
                                                                                <?php elseif ($ulist['id_role'] == 3) : ?>
                                                                                    Role ID : <strong style="color: yellow;">Public</strong>
                                                                                <?php elseif ($ulist['id_role'] == 4) : ?>
                                                                                    Role ID : <strong style="color: yellow;">Developer</strong>
                                                                                <?php endif; ?>
                                                                                <br>
                                                                                <?php if ($ulist['is_active'] == 1) : ?>
                                                                                    Posisi : <strong style="color: yellow;">Aktif</strong>
                                                                                <?php elseif ($ulist['is_active'] == 0) : ?>
                                                                                    Posisi : <strong style="color: yellow;">Tidak
                                                                                        Aktif</strong>
                                                                                <?php endif; ?>
                                                                            </span>
                                                                            <div class="position-relative d-none">
                                                                                <input type="text" class="form-control" value="<?= $ulist['id_user'] ?>" id="id_user" name="id_user" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                                                <span class="d-sm-block">
                                                                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                </span>
                                                                            </button>
                                                                            <button type="submit" class="btn btn-danger ml-1">
                                                                                <span class="d-sm-block">Delete</span>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            document.getElementById("formDelete<?= $ulist['id_user'] ?>")
                                                                .addEventListener("submit", function(event) {
                                                                    event.preventDefault();
                                                                    Swal.fire({
                                                                        icon: "question",
                                                                        title: "Anda Yakin Menghapus User?",
                                                                        showCancelButton: true,
                                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                        reverseButtons: false,
                                                                        cancelButtonColor: '#DD6B55',
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            document.getElementById(
                                                                                "formDelete<?= $ulist['id_user'] ?>"
                                                                            ).submit();
                                                                        } else {
                                                                            Swal.fire({
                                                                                title: "Dibatalkan!",
                                                                                text: "User belum dihapus",
                                                                                icon: "error",
                                                                                showConfirmButton: false,
                                                                                timer: 1300
                                                                            })
                                                                        }
                                                                    })
                                                                })
                                                        </script>
                                                        <!-- /Delete modal -->
                                                        <!-- ################################################################## -->
                                                        <!-- Edit Modal -->
                                                        <div class="modal-info me-1 mb-1 d-inline-block">
                                                            <!--info theme Modal -->
                                                            <div class="modal fade text-left" id="editModal<?= $ulist['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-edit-ismail">
                                                                            <h4 class="modal-title text-center text-label-header" id="manageMenuModalTitle">
                                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                                    <span class="d-sm-block">
                                                                                        <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                    </span>
                                                                                </button>
                                                                                <img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                                User Management
                                                                            </h4>
                                                                        </div>
                                                                        <form id="form<?= $ulist['id_user'] ?>" action="<?= base_url('developer/edit_user/' . $ulist['id_user']); ?>" method="post">
                                                                            <div class="modal-body">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="name">
                                                                                            <h6><i class="bi bi-person"></i>
                                                                                                Nama</h6>
                                                                                        </label>
                                                                                        <div class="position-relative">
                                                                                            <input type="text" class="form-control" value="<?= $ulist['name'] ?>" id="name" name="name" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-5">
                                                                                            <div class="form-group">
                                                                                                <label for="username">
                                                                                                    <h6><i class="bi bi-person-x"></i>
                                                                                                        Username</h6>
                                                                                                </label>
                                                                                                <div class="position-relative">
                                                                                                    <input type="text" class="form-control" value="<?= $ulist['username'] ?>" id="username" name="username" readonly>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-7">
                                                                                            <div class="form-group">
                                                                                                <label for="akronim">
                                                                                                    <h6><i class="bi bi-person-bounding-box"></i> Akronim</h6>
                                                                                                </label>
                                                                                                <div class="position-relative">
                                                                                                    <input type="text" class="form-control" value="<?= $ulist['akronim'] ?>" id="akronim" name="akronim" value="<?= set_value('akronim') ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="link-bi">
                                                                                                    <h6><i class="bi bi-link"></i>
                                                                                                        Link BI</h6>
                                                                                                </label>
                                                                                                <div class="position-relative">
                                                                                                    <input type="text" class="form-control" value="<?= $ulist['link_bi'] ?>" id="link-bi" name="link-bi">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="link-stock">
                                                                                                    <h6><i class="bi bi-link"></i> Link Persediaan </h6>
                                                                                                </label>
                                                                                                <div class="position-relative">
                                                                                                    <input type="text" class="form-control" value="<?= $ulist['link_stock'] ?>" id="link-stock" name="link-stock">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="user_role">
                                                                                            <h6><i class="bi bi-bar-chart-steps"></i>
                                                                                                Role</h6>
                                                                                        </label>
                                                                                        <div class="row">
                                                                                            <div class="col-md-8">
                                                                                                <div class="position-relative">
                                                                                                    <select class="form-select" id="user_role" name="user_role" required>
                                                                                                        <option disabled value="">--Pilih
                                                                                                            Jenis Role--
                                                                                                        </option>
                                                                                                        <option <?= $ulist['id_role'] == "1" ? "selected" : null ?> value="1">
                                                                                                            Administrator
                                                                                                        </option>
                                                                                                        <option <?= $ulist['id_role'] == "2" ? "selected" : null ?> value="2">SKPD
                                                                                                        </option>
                                                                                                        <option <?= $ulist['id_role'] == "4" ? "selected" : null ?> value="4">Developer
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <div class="position-relative">
                                                                                                    <select class="form-select" id="status" name="status" required>
                                                                                                        <option disabled value="">--Pilih
                                                                                                            Status--</option>
                                                                                                        <option <?= $ulist['is_active'] == "1" ? "selected" : null ?> value="1">Aktif
                                                                                                        </option>
                                                                                                        <option <?= $ulist['is_active'] == "0" ? "selected" : null ?> value="0">Tidak
                                                                                                            Aktif</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                                    <span class="d-sm-block">
                                                                                        <i class="fa fa-fw fa-lg fa-times"></i>
                                                                                    </span>
                                                                                </button>
                                                                                <button type="submit" class="btn btn-edit-ismail ml-1" id="edit<?= $ulist['id_user'] ?>">
                                                                                    <span class="d-sm-block"><i class="fa fa-fw fa-level-up"></i>
                                                                                        Update</span>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            document.getElementById("form<?= $ulist['id_user'] ?>")
                                                                .addEventListener("submit", function(event) {
                                                                    event.preventDefault();
                                                                    Swal.fire({
                                                                        icon: "question",
                                                                        title: "Anda Yakin?",
                                                                        showCancelButton: true,
                                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                        reverseButtons: false,
                                                                        cancelButtonColor: '#DD6B55',
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            document.getElementById(
                                                                                    "form<?= $ulist['id_user'] ?>")
                                                                                .submit();
                                                                        } else {
                                                                            Swal.fire({
                                                                                title: "Dibatalkan!",
                                                                                text: "User belum di-update",
                                                                                icon: "error",
                                                                                showConfirmButton: false,
                                                                                timer: 1300
                                                                            })
                                                                        }
                                                                    })
                                                                })
                                                        </script>
                                                        <!-- /Edit modal -->
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- /Menu Action -->
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
                                        <h6 class="text-muted mb-0">pihak penanggung jawab sebagai media informasi dan
                                            konsolidasi bagi SKPD jika terdapat kesulitan maupun media bertanya dalam
                                            pengisian BI dan Persediaan.</h6>
                                    </div>
                                </div>
                            </a>
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="<?= base_url('assets/'); ?>images/faces/admin.svg">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Admin Website</h5>
                                    <h6 class="text-muted mb-0">pihak yang bertanggung jawab jika terjadi error pada
                                        <i>website</i> ini.
                                    </h6>
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

    <!-- Add User Modal -->
    <div class="modal-info me-1 mb-1 d-inline-block">
        <!--info theme Modal -->
        <div class="modal fade text-left" id="manageUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                            <span class="d-sm-block">
                                <i class="fa fa-fw fa-lg fa-times"></i>
                            </span>
                        </button>
                        <h4 class="modal-title text-center text-label-header" id="manageMenuModalTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                            Tambah User
                        </h4>
                        <p style="color: black;"><strong style="color: red;">*</strong> Wajib diisi</p>
                    </div>
                    <form id="add_user_form" method="post" action="<?= base_url('developer/add_user'); ?>">
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">
                                        <h6><i class="bi bi-person-badge"></i> Nama <strong style="color: red;">*</strong>
                                        </h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Nama" id="name" name="name" value="<?= set_value('name') ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="username">
                                                <h6><i class="bi bi-person"></i> Username <strong style="color: red;">*</strong>
                                                </h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?= set_value('username') ?>">
                                                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="akronim">
                                                <h6><i class="bi bi-person-bounding-box"></i> Akronim <strong style="color: red;">*</strong>
                                                </h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Akronim" id="akronim" name="akronim" value="<?= set_value('akronim') ?>">
                                                <?= form_error('akronim', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="user_role">
                                        <h6><i class="bi bi-bar-chart-steps"></i> Role <strong style="color: red;">*</strong></h6>
                                    </label>
                                    <div class="position-relative">
                                        <select class="form-select" id="user_role" name="user_role" required>
                                            <option selected disabled value="">--Pilih Jenis Role--</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">SKPD</option>
                                            <option value="4">Developer</option>
                                        </select>
                                        <?= form_error('user_role', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password1">
                                                <h6><i class="bi bi-shield-lock"></i> Password <strong style="color: red;">*</strong></h6>
                                            </label>
                                            <div class="input-group position-relative">
                                                <input type="password" class="form-control text-start" placeholder="Password" id="password1" name="password1">
                                                <span class="input-group-text-Is"><i id="show1" class="showPass fa fa-fw fa-eye" style="cursor: pointer;"></i></span>
                                                <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password2">
                                                <h6><i class="bi bi-shield-lock"></i> Ulangi Password <strong style="color: red;">*</strong></h6>
                                            </label>
                                            <div class="input-group position-relative">
                                                <input type="password" class="form-control text-start" placeholder="Ulangi Password" id="password2" name="password2">
                                                <span class="input-group-text-Is"><i id="show2" class="showPass fa fa-fw fa-eye" style="cursor: pointer;"></i></span>
                                                <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link-bi">
                                                <h6><i class="bi bi-link"></i> Link BI</h6>
                                            </label>
                                            <div class="input-group position-relative">
                                                <input type="text" class="form-control text-start" placeholder="Link BI" id="link-bi" name="link-bi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link-stock">
                                                <h6><i class="bi bi-link"></i> Link Persediaan</h6>
                                            </label>
                                            <div class="input-group position-relative">
                                                <input type="text" class="form-control text-start" placeholder="Link Persediaan" id="link-stock" name="link-stock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            const togglePassword1 = document.querySelector('#show1');
                            const password1 = document.querySelector('#password1');

                            togglePassword1.addEventListener('click', function(e) {
                                // toggle the type attribute
                                const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
                                password1.setAttribute('type', type1);
                                // toggle the eye slash icon
                                this.classList.toggle('fa-eye-slash');
                            });
                        </script>

                        <script>
                            const togglePassword2 = document.querySelector('#show2');
                            const password2 = document.querySelector('#password2');

                            togglePassword2.addEventListener('click', function(e) {
                                // toggle the type attribute
                                const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                                password2.setAttribute('type', type2);
                                // toggle the eye slash icon
                                this.classList.toggle('fa-eye-slash');
                            });
                        </script>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <span class="d-sm-block">
                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                </span>
                            </button>
                            <button type="submit" class="btn btn-info ml-1" id="add_menu">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-sm-block"><i class="bi bi-plus-square"></i> Add</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("add_user_form").addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                icon: "question",
                title: "Anda Yakin Menambah User?",
                showCancelButton: true,
                confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                reverseButtons: false,
                cancelButtonColor: '#DD6B55',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("add_user_form").submit();
                } else {
                    Swal.fire({
                        title: "Dibatalkan!",
                        text: "User belum ditambahkan",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1300
                    })
                }
            })
        })
    </script>
    <script src="<?= base_url('assets/datatable-tfoot/') ?>jquery-3.7.0.js"></script>
    <script src="<?= base_url('assets/datatable-tfoot/') ?>jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable({
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;

                        // Create select element and listener
                        var select = $('<select class="select-width"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = DataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        // Add list of options
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + '</option>'
                                );
                            });
                    });
            }
        });
    </script>
    <!-- /Add User Modal -->