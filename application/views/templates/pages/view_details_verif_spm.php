<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Details SPM
                </h3>
                .
            </div>

        </div>
    </div>
    <?= form_error('menu', '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <section class="section" style="padding-top: 0.5%;">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Rincian SPM</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <style>
                                        .content_edit {
                                            width: 70%;
                                        }

                                        .border-bawah {
                                            border-bottom: 1px solid #d4d8df;
                                            padding-bottom: 5px;
                                        }
                                    </style>
                                    <div class="border-bawah">
                                        <?php $idCancelSPM = $spm_masuk['id_masuk_spm'] ?>
                                        <a href="<?= base_url('admin/cancel_koreksi/') . $idCancelSPM ?>" title="Batal Koreksi" class="badge btn-secondary">Cancel</a>
                                        <button class="badge btn-warning" data-bs-toggle="modal" data-bs-target="#editSPM">Edit</button>
                                    </div>
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-bold-500">SKPD</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_skpd"><?= $spm_masuk['name'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">No. SPM</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span class="" id="span_no_spm"><?= $spm_masuk['no_spm'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">Jenis</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_jenis"><?= $spm_masuk['jenis'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">Jumlah SPP Diminta</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_jenis"><?= "Rp " . ($spm_masuk['total_spm'] == NULL ? "" : number_format($spm_masuk['total_spm'], 2, ',', '.')); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <details>
                                                        <summary>
                                                            <h6>Klik Lihat Dokumen</h6>
                                                        </summary>
                                                        <?php
                                                        $extension_media = pathinfo($spm_masuk['dokumen'], PATHINFO_EXTENSION);
                                                        ?>
                                                        <?php if ($extension_media === "pdf"): ?>
                                                            <iframe id="myIframe" src="<?= base_url('assets/doc/SPMDOC/') . $spm_masuk['dokumen']; ?>" width="100%" height="600">
                                                            </iframe>
                                                        <?php else: ?>
                                                            <!-- ini gambar media -->
                                                            <style>
                                                                .canvas-container {
                                                                    width: 100%;
                                                                    max-width: 600px;
                                                                    margin: auto;
                                                                    border: 2px solid #333;
                                                                    position: relative;
                                                                    background: #f0f0f0;
                                                                    overflow: hidden;
                                                                }

                                                                canvas {
                                                                    display: block;
                                                                    width: 100%;
                                                                    /* Buat responsif */
                                                                    cursor: grab;
                                                                }

                                                                .btn-canvas {
                                                                    padding: 8px 12px;
                                                                    margin: 5px;
                                                                    cursor: pointer;
                                                                }
                                                            </style>

                                                            <div class="controls">
                                                                <button onclick="zoomIn()" class="badge btn-info"><i class="fa fa-search-plus"></i></button>
                                                                <button onclick="zoomOut()" class="badge btn-info"><i class="fa fa-search-minus"></i></button>
                                                                <button onclick="resetZoom()" class="badge btn-info"><i class="fa fa-undo"></i></button>
                                                            </div>

                                                            <div class="canvas-container">
                                                                <canvas id="canvas"></canvas>
                                                            </div>

                                                            <script>
                                                                const canvas = document.getElementById("canvas");
                                                                const ctx = canvas.getContext("2d");

                                                                let img = new Image();
                                                                img.src = "<?= base_url('assets/doc/SPMDOC/') . $spm_masuk['dokumen']; ?>";

                                                                let scale = 1,
                                                                    offsetX = 0,
                                                                    offsetY = 0;
                                                                let isDragging = false,
                                                                    lastX, lastY;
                                                                let imgWidth, imgHeight, imgRatio;

                                                                function setupCanvas() {
                                                                    const containerWidth = canvas.parentElement.clientWidth;

                                                                    // Hitung rasio asli gambar
                                                                    imgRatio = img.width / img.height;
                                                                    imgWidth = containerWidth;
                                                                    imgHeight = imgWidth / imgRatio;

                                                                    // Atur canvas agar tetap proporsional
                                                                    canvas.width = imgWidth;
                                                                    canvas.height = imgHeight;

                                                                    drawImage();
                                                                }

                                                                function drawImage() {
                                                                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                                                                    ctx.save();

                                                                    // Geser ke pusat sebelum scale
                                                                    ctx.translate(canvas.width / 2 + offsetX, canvas.height / 2 + offsetY);
                                                                    ctx.scale(scale, scale);
                                                                    ctx.translate(-canvas.width / 2, -canvas.height / 2);

                                                                    ctx.drawImage(img, 0, 0, imgWidth, imgHeight);
                                                                    ctx.restore();
                                                                }

                                                                function zoomIn() {
                                                                    scale = Math.min(scale + 0.2, 3);
                                                                    drawImage();
                                                                }

                                                                function zoomOut() {
                                                                    scale = Math.max(scale - 0.2, 1);
                                                                    drawImage();
                                                                }

                                                                function resetZoom() {
                                                                    scale = 1;
                                                                    offsetX = 0;
                                                                    offsetY = 0;
                                                                    drawImage();
                                                                }

                                                                // Zoom dengan scroll mouse (ke tengah)
                                                                canvas.addEventListener("wheel", (e) => {
                                                                    e.preventDefault();
                                                                    let zoomFactor = e.deltaY > 0 ? 0.9 : 1.1;
                                                                    scale *= zoomFactor;
                                                                    scale = Math.max(1, Math.min(scale, 3));
                                                                    drawImage();
                                                                });

                                                                // Drag dengan mouse
                                                                canvas.addEventListener("mousedown", (e) => {
                                                                    isDragging = true;
                                                                    lastX = e.clientX;
                                                                    lastY = e.clientY;
                                                                    canvas.style.cursor = "grabbing";
                                                                });

                                                                window.addEventListener("mousemove", (e) => {
                                                                    if (!isDragging) return;
                                                                    let dx = e.clientX - lastX;
                                                                    let dy = e.clientY - lastY;
                                                                    lastX = e.clientX;
                                                                    lastY = e.clientY;

                                                                    offsetX += dx;
                                                                    offsetY += dy;
                                                                    drawImage();
                                                                });

                                                                window.addEventListener("mouseup", () => {
                                                                    isDragging = false;
                                                                    canvas.style.cursor = "grab";
                                                                });

                                                                img.onload = setupCanvas;
                                                                window.addEventListener("resize", setupCanvas);
                                                            </script>
                                                            <!-- /ini gambar media -->
                                                        <?php endif ?>
                                                    </details>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer center-display">
                        <button title="Verif SPM" class="badge btn-success" id="verif<?= $spm_masuk['id_masuk_spm'] ?>"><i class="bi bi-check-circle"></i></button>
                        <script>
                            document.getElementById('verif<?= $spm_masuk['id_masuk_spm'] ?>').addEventListener('click', (
                                e) => {
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
                                                $id = $spm_masuk['id_masuk_spm'];
                                                ?>
                                                window.location.href =
                                                    "<?= base_url('admin/verif/' . $id); ?>";
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
                        <button title="Tolak SPM" class="badge btn-danger" data-bs-toggle="modal" data-bs-target="#tolakSPM<?= $spm_masuk['id_masuk_spm'] ?>"><i class="bi bi-x-circle"></i></button>
                        <!-- Modal tolak -->
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <!--info theme Modal -->
                            <div class="modal fade text-left" id="tolakSPM<?= $spm_masuk['id_masuk_spm'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                            </button>
                                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                Catatan Penolakan SPM No ID <?= $spm_masuk['id_masuk_spm'] ?>
                                            </h4>
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php $id = $spm_masuk['id_masuk_spm'] ?>
                                            <form id="tolak<?= $spm_masuk['id_masuk_spm'] ?>" action="<?= base_url('admin/tolak/' . $id) ?>" method="post">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="catatan">
                                                            <h6><i class="bi bi-pencil-square"></i> Catatan
                                                            </h6>
                                                        </label>
                                                        <div class="position-relative">
                                                            <textarea class="form-control" name="catatan" id="catatan" row="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger ml-1">
                                                        <i class="bx bx-check"></i>
                                                        <span><i class="bi bi-backspace"></i> Tolak</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.getElementById("tolak<?= $spm_masuk['id_masuk_spm'] ?>").addEventListener("submit",
                                function(event) {
                                    event.preventDefault();
                                    Swal.fire({
                                        icon: "question",
                                        title: "Anda Yakin Menolak SPM ini?",
                                        showCancelButton: true,
                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                        reverseButtons: false,
                                        cancelButtonColor: '#DD6B55',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById("tolak<?= $spm_masuk['id_masuk_spm'] ?>")
                                                .submit();
                                        } else {
                                            Swal.fire({
                                                title: "Dibatalkan!",
                                                text: "Data batal ditolak",
                                                icon: "error",
                                                showConfirmButton: false,
                                                timer: 1300
                                            })
                                        }
                                    })
                                })
                        </script>
                        <!-- /Modal tolak -->

                        <?php
                        $idSPM = $spm_masuk['id_masuk_spm'];
                        ?>
                        <button title="Hapus SPM" class="badge btn-edit-ismail" onclick="myFunction<?= $idSPM ?>()"><i class="bi bi-trash"></i></button>
                        <script>
                            function myFunction<?= $idSPM ?>() {
                                let text = "Anda Yakin Menghapus SPM ini?\n<?= $idSPM ?>";
                                if (confirm(text) == true) {
                                    window.location.href =
                                        "<?= base_url('auth/hapus_SPM/' . $idSPM); ?>";
                                } else {
                                    Swal.fire({
                                        title: "Dibatalkan!",
                                        text: "SPM batal dihapus",
                                        icon: "error",
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const btnUpdate = document.querySelector('.btn-update');
            const btnLoading = document.querySelector('.btn-loading');
            document.getElementById("editSPMmasuk").addEventListener("submit", function(event) {
                event.preventDefault();
                Swal.fire({
                    icon: "question",
                    title: "Anda Yakin Mengedit SPM ini?",
                    text: "Periksa kembali sebelum mengedit, kesalahan tidak bisa dibatalkan",
                    showCancelButton: true,
                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Tidak",
                    reverseButtons: false,
                    cancelButtonColor: '#DD6B55',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("editSPMmasuk").submit();
                        btnLoading.classList.toggle('d-none');
                        btnUpdate.classList.toggle('d-none');
                    } else {
                        Swal.fire({
                            title: "Dibatalkan!",
                            text: "SPM Batal Diajukan",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            })
        </script>

        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Catatan Penolakan SPM</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body">
                                <?php if ($spm_masuk['id_status'] == 2) : ?>
                                    <p style="color: red;"><?= $spm_masuk['catatan'] ?></p>
                                <?php else : ?>
                                    <?php if ($spm_masuk['catatan'] == '') : ?>
                                        <p class="text-muted">Tidak ada catatan penolakan...</p>
                                    <?php else : ?>
                                        <p style="color: red;"><?= $spm_masuk['catatan'] ?></p>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Edit -->
    <div class="modal-info me-1 mb-1 d-inline-block">
        <!--info theme Modal -->
        <div class="modal fade text-left" id="editSPM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-edit-ismail">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="fa-fw fa-lg fa fa-times"></i>
                        </button>
                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                            Edit SPM <?= $spm_masuk['id_masuk_spm'] ?>
                        </h4>
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="fa-fw fa-lg fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $id = $spm_masuk['id_masuk_spm'];
                        ?>
                        <form id="edit<?= $spm_masuk['id_masuk_spm'] ?>" action="<?= base_url('admin/edit_spm/') . $id ?>" method="post">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="no_spm" style="display: flex; justify-content:start;">
                                        <h6><i class="bi bi-bar-chart-line-fill"></i> No. SPM</h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="<?= $spm_masuk['no_spm'] ?>" id="no_spm" name="no_spm">
                                        <?= form_error('no_spm', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis" style="display: flex; justify-content:start;">
                                        <h6><i class="bi bi-bookmark-check"></i> Jenis</h6>
                                    </label>
                                    <div class="position-relative">
                                        <select class="form-select" id="jenis" name="jenis">
                                            <option disabled value="">--Pilih Jenis SPM--</option>
                                            <option <?= $spm_masuk['jenis'] == "BELANJA MODAL" ? "selected" : null ?> value="BELANJA MODAL">BELANJA MODAL</option>
                                            <option <?= $spm_masuk['jenis'] == "BELANJA PERSEDIAAN" ? "selected" : null ?> value="BELANJA PERSEDIAAN">BELANJA PERSEDIAAN</option>
                                            <option <?= $spm_masuk['jenis'] == "BUKAN BELANJA MODAL/PERSEDIAAN" ? "selected" : null ?> value="BUKAN BELANJA MODAL/PERSEDIAAN">BUKAN BELANJA MODAL/PERSEDIAAN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis" style="display: flex; justify-content:start;">
                                        <h6><i class="fa fa-fw fa-money"></i> Jumlah SPP Diminta</h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="<?= $spm_masuk['total_spm'] == NULL ? "" : number_format($spm_masuk['total_spm'], 2, ',', '.'); ?>" id="total-spm" name="total-spm">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="update<?= $id ?>" class="btn btn-edit-ismail ml-1">
                                    <i class="bx bx-check"></i>
                                    <span><i class="fa fa-fw fa-level-up"></i>
                                        Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var idAngka = "total-spm";
        document.getElementById("update<?= $id ?>").addEventListener("click",
            function(event) {
                event.preventDefault();
                Swal.fire({
                    icon: "question",
                    title: "Anda Yakin Mengedit SPM ini?",
                    showCancelButton: true,
                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                    reverseButtons: false,
                    cancelButtonColor: '#DD6B55',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("edit<?= $id ?>").submit();
                    } else {
                        Swal.fire({
                            title: "Dibatalkan!",
                            text: "SPM batal diedit",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            })
    </script>
    <script src="<?= base_url('assets/') ?>js/formatAngkaID.js"></script>
    <!-- /Modal Edit -->
</div>