<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Menu Management</h3>
                <p class="text-subtitle text-muted">Halaman ini hanya bisa diakses oleh <strong>developer</strong>.</p>
            </div>
        </div>
    </div>
    <?= form_error('menu', '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-9">

                <!-- Menu Action -->
                <a href="#" class="BtnIs1" data-bs-toggle="modal" data-bs-target="#manageMenuModal">
                    <span class="backIs1"><i class="bi bi-plus-square"></i> Tambah Menu</span>
                    <span class="frontIs1"><i class="bi bi-plus-square"></i> Tambah Menu</span>
                </a>
                <br>
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <style>
                                            .thead-ismail {
                                                background-color: #89b5f8b4;
                                            }
                                        </style>
                                        <thead class="thead-ismail">
                                            <tr>
                                                <th>ID</th>
                                                <th>MENU</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($menu as $m) : ?>
                                                <tr>
                                                    <td class="text-bold-500"><?= $i; ?></td>
                                                    <td class="text-bold-500"><?= $m['menu']; ?></td>
                                                    <td class="text-bold-500">
                                                        <button class="badge btn-edit-ismail" data-bs-toggle="modal" data-bs-target="#editMenu<?= $m['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                                        <button class="badge bg-danger" id="delete<?= $m['id'] ?>"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                    <!-- Modal Edit -->
                                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                                        <!--info theme Modal -->
                                                        <div class="modal fade text-left" id="editMenu<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-edit-ismail">
                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                                        </button>
                                                                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                            Edit Menu <?= $m['menu'] ?>
                                                                        </h4>
                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <?php $idMenu = $m['id'] ?>
                                                                        <form id="formEditMenu<?= $idMenu ?>" action="<?= base_url('developer/edit_menu/' . $idMenu) ?>" method="post">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for="menu">
                                                                                        <h6><i class="bi bi-menu-button-fill"></i> Nama Menu </h6>
                                                                                    </label>
                                                                                    <div class="position-relative">
                                                                                        <input type="text" class="form-control" value="<?= $m['menu'] ?>" id="menu" name="menu">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-edit-ismail ml-1">
                                                                                    <i class="bx bx-check"></i>
                                                                                    <span><i class="fa fa-fw fa-level-up"></i> Update</span>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        document.getElementById("formEditMenu<?= $idMenu ?>").addEventListener("submit", function(event) {
                                                            event.preventDefault();
                                                            Swal.fire({
                                                                icon: "question",
                                                                title: "Anda Yakin Mengedit " + "<?= $m['menu'] ?>" + "?",
                                                                showCancelButton: true,
                                                                confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                reverseButtons: false,
                                                                cancelButtonColor: '#DD6B55',
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.getElementById("formEditMenu<?= $idMenu ?>").submit();
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Dibatalkan!",
                                                                        text: "<?= $m['menu'] ?>" + " batal diedit",
                                                                        icon: "error",
                                                                        showConfirmButton: false,
                                                                        timer: 1300
                                                                    })
                                                                }
                                                            })
                                                        })
                                                    </script>
                                                    <!-- /Modal Edit -->
                                                    <!-- Delete Modal -->
                                                    <script>
                                                        document.getElementById('delete<?= $m['id'] ?>').addEventListener('click', (e) => {
                                                            Swal.fire({
                                                                icon: "question",
                                                                title: "Anda Yakin Menghapus Menu?",
                                                                showCancelButton: true,
                                                                confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                reverseButtons: false,
                                                                cancelButtonColor: '#DD6B55',
                                                            }).then(function(result) {
                                                                if (result.value) {
                                                                    Swal.fire({
                                                                        icon: "question",
                                                                        title: "Beneran Yakin???",
                                                                        showCancelButton: true,
                                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                        reverseButtons: false,
                                                                        cancelButtonColor: '#DD6B55',
                                                                    }).then(function(result) {
                                                                        if (result.value) {
                                                                            <?php
                                                                            $id = $m['id'];
                                                                            ?>
                                                                            window.location.href = "<?= base_url('developer/delete/' . $id); ?>";

                                                                        } else if (result.dismiss === "cancel") {
                                                                            Swal.fire({
                                                                                title: "Dibatalkan!",
                                                                                text: "Menu Batal Dihapus",
                                                                                icon: "error",
                                                                                showConfirmButton: false,
                                                                                timer: 1300
                                                                            })
                                                                        }
                                                                    })

                                                                } else if (result.dismiss === "cancel") {
                                                                    Swal.fire({
                                                                        title: "Dibatalkan!",
                                                                        text: "Menu Batal Dihapus",
                                                                        icon: "error",
                                                                        showConfirmButton: false,
                                                                        timer: 1300
                                                                    })
                                                                }
                                                            })
                                                        })
                                                    </script>
                                                    <!-- /Delete modal -->
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

                <!-- Sub Menu Action -->

                <a href="javascript:;" class="code_view actionBtn21" data-bs-toggle="modal" data-bs-target="#addSubMenu">
                    <i class="ico-plus2">
                        <span></span>
                        <span></span>
                    </i>
                    <span class="lb">Tambah Sub Menu</span>
                </a>

                <br>
                <!-- QUERY SUB MENU -->
                <?php
                $querySubMenu = "SELECT sub_menu.id, sub_menu.id_menu, menu.menu, sub_menu.title, sub_menu.url, sub_menu.icon,sub_menu.is_active 
                            FROM sub_menu JOIN menu 
                            ON sub_menu.id_menu = menu.id
                        ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <!-- /QUERY SUB MENU -->

                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-ismail">
                                            <tr>
                                                <th>#</th>
                                                <th>AKSES MENU</th>
                                                <th>SUB MENU</th>
                                                <th>URL</th>
                                                <th>ICON</th>
                                                <th class="text-center">STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            ?>
                                            <?php foreach ($subMenu as $sm) : ?>
                                                <tr>
                                                    <td class="text-bold-500"><?= $i; ?></td>
                                                    <td class="text-bold-500"><?= $sm['menu']; ?></td>
                                                    <td class="text-bold-500"><?= $sm['title']; ?></td>
                                                    <td class="text-bold-500"><?= $sm['url']; ?></td>
                                                    <td class="text-bold-500"><?= $sm['icon']; ?></td>
                                                    <td class="text-bold-500 text-center">
                                                        <?php
                                                        if ($sm['is_active'] == 1) {
                                                            echo "Aktif";
                                                        } elseif ($sm['is_active'] == 0) {
                                                            echo "Tidak Aktif";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-bold-500">
                                                        <?php $idSub = $sm['id']; ?>
                                                        <button class="badge btn-edit-ismail" data-bs-toggle="modal" data-bs-target="#editSubMenu<?= $sm['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                                        <button class="badge bg-danger" id="deleteSub<?= $idSub ?>"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                    <!-- Modal Edit -->
                                                    <div class="modal-info me-1 mb-1 d-inline-block">
                                                        <!--info theme Modal -->
                                                        <div class="modal fade text-left" id="editSubMenu<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-edit-ismail">
                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                                        </button>
                                                                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                            Edit Sub Menu <?= $sm['title'] ?>
                                                                        </h4>
                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="fa fa-fw fa-lg fa-times"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <?php $idSubMenu = $sm['id'] ?>
                                                                        <form id="formEditSubMenu<?= $idSubMenu ?>" action="<?= base_url('developer/edit_sub_menu/' . $idSubMenu) ?>" method="post">
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="id_menu">
                                                                                                <h6><i class="fa fa-fw fa-code-fork"></i> Akses Menu </h6>
                                                                                            </label>
                                                                                            <div class="position-relative">
                                                                                                <select class="form-select" id="id_menu" name="id_menu" required>
                                                                                                    <option disabled value="">--Pilih Akses Menu--</option>
                                                                                                    <?php foreach ($menu as $m) : ?>
                                                                                                        <option <?= $sm['id_menu'] == $m['id'] ? "selected" : null ?> value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                                                                    <?php endforeach; ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="title">
                                                                                                <h6><i class="bi bi-menu-up"></i> Sub Menu </h6>
                                                                                            </label>
                                                                                            <div class="position-relative">
                                                                                                <input type="text" class="form-control" value="<?= $sm['title'] ?>" id="title" name="title">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-8">
                                                                                        <div class="form-group">
                                                                                            <label for="url">
                                                                                                <h6><i class="bi bi-link"></i> URL <small style="color: whitesmoke;">(nama file php)</small> </h6>
                                                                                            </label>
                                                                                            <div class="position-relative">
                                                                                                <input type="text" class="form-control" value="<?= $sm['url'] ?>" id="url" name="url">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="is_active">
                                                                                                <h6><i class="fa fa-fw fa-power-off"></i> STATUS </h6>
                                                                                            </label>
                                                                                            <div class="position-relative">
                                                                                                <select class="form-select" id="is_active" name="is_active" required>
                                                                                                    <option disabled value="">--Pilih Status--</option>
                                                                                                    <option <?= $sm['is_active'] == "1" ? "selected" : null ?> value="1">Aktif</option>
                                                                                                    <option <?= $sm['is_active'] == "0" ? "selected" : null ?> value="0">Tidak Aktif</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="icon">
                                                                                        <h6><i class="fa fa-fw fa-font-awesome"></i> ICON <small style="color: whitesmoke;">(bootstrap icon)</small></h6>
                                                                                    </label>
                                                                                    <div class="position-relative">
                                                                                        <input type="text" class="form-control" value="<?= $sm['icon'] ?>" id="icon" name="icon">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-edit-ismail ml-1">
                                                                                    <i class="bx bx-check"></i>
                                                                                    <span><i class="fa fa-fw fa-level-up"></i> Update</span>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        document.getElementById("formEditSubMenu<?= $idSubMenu ?>").addEventListener("submit", function(event) {
                                                            event.preventDefault();
                                                            Swal.fire({
                                                                icon: "question",
                                                                title: "Anda Yakin Mengedit " + "<?= $sm['title'] ?>" + "?",
                                                                showCancelButton: true,
                                                                confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                reverseButtons: false,
                                                                cancelButtonColor: '#DD6B55',
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.getElementById("formEditSubMenu<?= $idSubMenu ?>").submit();
                                                                } else {
                                                                    Swal.fire({
                                                                        title: "Dibatalkan!",
                                                                        text: "<?= $sm['title'] ?>" + " batal diedit",
                                                                        icon: "error",
                                                                        showConfirmButton: false,
                                                                        timer: 1300
                                                                    })
                                                                }
                                                            })
                                                        })
                                                    </script>
                                                    <!-- /Modal Edit -->
                                                    <!-- Delete Modal -->
                                                    <script>
                                                        document.getElementById('deleteSub<?= $idSub ?>').addEventListener('click', (e) => {
                                                            Swal.fire({
                                                                icon: "question",
                                                                title: "Anda Yakin Menghapus " + "<?= $sm['title'] . '?' ?>",
                                                                showCancelButton: true,
                                                                confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                reverseButtons: false,
                                                                cancelButtonColor: '#DD6B55',
                                                            }).then(function(result) {
                                                                if (result.value) {
                                                                    Swal.fire({
                                                                        icon: "question",
                                                                        title: "Beneran Yakin???",
                                                                        showCancelButton: true,
                                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                                        reverseButtons: false,
                                                                        cancelButtonColor: '#DD6B55',
                                                                    }).then(function(result) {
                                                                        if (result.value) {
                                                                            window.location.href = "<?= base_url('developer/delete_sub_menu/' . $idSub); ?>";

                                                                        } else if (result.dismiss === "cancel") {
                                                                            Swal.fire({
                                                                                title: "Dibatalkan!",
                                                                                text: "<?= $sm['title'] ?>" + " Batal Dihapus",
                                                                                icon: "error",
                                                                                showConfirmButton: false,
                                                                                timer: 1300
                                                                            })
                                                                        }
                                                                    })

                                                                } else if (result.dismiss === "cancel") {
                                                                    Swal.fire({
                                                                        title: "Dibatalkan!",
                                                                        text: "<?= $sm['title'] ?>" + " Batal Dihapus",
                                                                        icon: "error",
                                                                        showConfirmButton: false,
                                                                        timer: 1300
                                                                    })
                                                                }
                                                            })
                                                        })
                                                    </script>
                                                    <!-- /Delete modal -->
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
                <!-- /Sub Menu Action -->
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

        <!-- Menu Modal -->
        <div class="modal-info me-1 mb-1 d-inline-block">
            <!--info theme Modal -->
            <div class="modal fade text-left" id="manageMenuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <span class="d-sm-block">
                                    <i class="fa-fw fa-lg fa fa-times"></i>
                                </span>
                            </button>
                            <h4 class="modal-title text-center text-label-header" id="manageMenuModalTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                Menu Management
                            </h4>
                            <p style="color: black;"><span style="color: red;"><strong>*</strong></span> Wajib diisi</p>
                        </div>
                        <form action="<?= base_url('developer/menu') ?>" method="post">
                            <div class="modal-body">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="menu">
                                            <h6><i class="bi bi-menu-button-fill"></i> Menu</h6>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Nama Menu" id="menu" name="menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <span class="d-sm-block">
                                        <i class="fa-fw fa-lg fa fa-times"></i>
                                    </span>
                                </button>
                                <button type="submit" class="btn btn-info ml-1" id="add_menu">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block"><i class="bi bi-plus-square"></i> Add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('add_menu').addEventListener('click', (e) => {
                Swal.fire({
                    icon: "question",
                    title: "Anda Yakin Memverifikasi?",
                    showCancelButton: true,
                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                    reverseButtons: false,
                    cancelButtonColor: '#DD6B55',
                }).then(function(result) {
                    if (result.value) {
                        Swal.fire({
                            icon: "question",
                            title: "Beneran Nih?",
                            text: "Gak Bisa Dibatalin Loh",
                            showCancelButton: true,
                            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                            reverseButtons: false,
                            cancelButtonColor: '#DD6B55',
                        }).then(function(result) {
                            if (result.value) {
                                <?php
                                $id = $mspm['id'];
                                ?>
                                window.location.href = "<?= base_url('developer/menu'); ?>";
                            } else if (result.dismiss === "cancel") {
                                Swal.fire({
                                    title: "Becanda Deng...",
                                    text: "Bisa dibatalin Kok",
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        })
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            title: "Dibatalkan!",
                            text: "Data belum diverifikasi",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            })
        </script>
        <!-- /Menu Modal -->
        <!-- Add Sub Menu Modal -->
        <div class="modal-info me-1 mb-1 d-inline-block">
            <!--info theme Modal -->
            <div class="modal fade text-left" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="fa fa-fw fa-lg fa-times"></i>
                            </button>
                            <h4 class="modal-title text-center text-label-header" id="manageMenuModalTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                Tambah Sub Menu
                            </h4>
                            <p style="color: black;"><strong style="color: red;">*</strong> Wajib diisi</p>
                        </div>
                        <form id="add_submenu_form" method="post" action="<?= base_url('developer/add_sub_menu'); ?>">
                            <div class="modal-body">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="id_menu">
                                            <h6><i class="fa fa-fw fa-code-fork"></i> Akses Menu <small style="color: red;">*</small></h6>
                                        </label>
                                        <div class="position-relative">
                                            <select class="form-select" id="id_menu" name="id_menu" required>
                                                <option selected disabled value="">--Pilih Akses Menu--</option>
                                                <?php foreach ($menu as $m) : ?>
                                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">
                                            <h6><i class="bi bi-menu-up"></i> Sub Menu <small style="color: red;">*</small></h6>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="--nama sub menu--" id="title" name="title" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">
                                            <h6><i class="bi bi-link"></i> URL <small style="color: red;">*</small> <small style="color: whitesmoke;">(nama file php)</small> </h6>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="--url--" id="url" name="url" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">
                                            <h6><i class="fa fa-fw fa-font-awesome"></i> ICON <small style="color: red;">*</small> <small style="color: whitesmoke;">(bootstrap icon)</small></h6>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="--icon--" id="icon" name="icon" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active">
                                            <h6><i class="fa fa-fw fa-power-off"></i> STATUS <small style="color: red;">*</small></h6>
                                        </label>
                                        <div class="position-relative">
                                            <select class="form-select" id="is_active" name="is_active" required>
                                                <option selected disabled value="">--Pilih Status--</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-warning ml-1">
                                    <span class="d-sm-block"><i class="bi bi-plus-square"></i> Add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("add_submenu_form").addEventListener("submit", function(event) {
                event.preventDefault();
                Swal.fire({
                    icon: "question",
                    title: "Anda Yakin Menambah Sub Menu?",
                    showCancelButton: true,
                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                    reverseButtons: false,
                    cancelButtonColor: '#DD6B55',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("add_submenu_form").submit();
                    } else {
                        Swal.fire({
                            title: "Dibatalkan!",
                            text: "Sub Menu belum ditambahkan",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            })
        </script>
        <!-- /Add Sub Menu Modal -->

    </section>
</div>