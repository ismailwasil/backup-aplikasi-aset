<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3> <?= $sewa_masuk['id_aset'] == 5 ? 'Detail Peminjaman ' . $sewa_masuk['nm_aset'] : 'Detail Penyewaan ' . $sewa_masuk['nm_aset'] ?></h3>
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
                        <h4 class="card-title"><?= $sewa_masuk['id_aset'] == 5 ? 'Data Rincian Peminjaman ' . $sewa_masuk['nm_aset'] : 'Data Rincian Penyewaan ' . $sewa_masuk['nm_aset'] ?></h4>
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
                                        <a href="<?= $user['id_role'] == 1 ? base_url('admin/admin_item_aset/') . $sewa_masuk['id_aset'] : ($user['id_role'] == 4 ? base_url('developer/admin_item_aset/') . $sewa_masuk['id_aset'] : '#') ?>" class="badge btn-secondary">Cancel</a>
                                        <button class="badge btn-warning" data-bs-toggle="modal" data-bs-target="#editSewa">Edit</button>
                                    </div>
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <?php
                                            if (substr($sewa_masuk['tgl_awal_acara'], 0, 10) == substr($sewa_masuk['tgl_akhir_acara'], 0, 10)) {
                                                $tanggal = substr($sewa_masuk['tgl_awal_acara'], 0, 10);
                                            } else {
                                                $tanggal = substr($sewa_masuk['tgl_awal_acara'], 0, 10) . ' -- ' . substr($sewa_masuk['tgl_akhir_acara'], 0, 10);
                                            }

                                            ?>
                                            <tr>
                                                <th class="text-bold-500">No. Pengenal</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_no_pengenal"><?= $sewa_masuk['no_pengenal'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">Nama</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_nama"><?= $sewa_masuk['nama'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">No. HP</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <a href="https://wa.me/<?= $sewa_masuk['no_hp'] ?>" class="badge bg-success" id="span_no_hp"><i class="fa fa-fw fa-whatsapp"></i> <span id="nomor_copy"><?= '0' . substr($sewa_masuk['no_hp'], 2) ?></span></a>
                                                    <button class="badge bg-light-secondary" onclick="copyNomor()">Copy</button>
                                                    <script>
                                                        function copyNomor() {
                                                            // Pilih teks yang akan dicopy
                                                            var textToCopy = document.getElementById('nomor_copy');

                                                            // Buat elemen input untuk menyimpan teks yang akan dicopy
                                                            var inputElement = document.createElement('input');
                                                            inputElement.value = textToCopy.innerText;
                                                            document.body.appendChild(inputElement);

                                                            // Pilih teks di dalam elemen input
                                                            inputElement.select();

                                                            // Salin teks ke clipboard
                                                            document.execCommand('copy');

                                                            // Hapus elemen input yang sudah tidak diperlukan
                                                            document.body.removeChild(inputElement);

                                                            // Optional: Beri feedback kepada pengguna bahwa teks telah dicopy
                                                            Toastify({
                                                                text: "Nomor berhasil dicopy!",
                                                                duration: 3000,
                                                                close: true,
                                                                gravity: "center",
                                                                position: "center",
                                                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                                            }).showToast();
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">Alamat</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_alamat"><?= $sewa_masuk['alamat'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">Acara</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_acara"><?= $sewa_masuk['keperluan'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">Waktu Acara</th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_waktu"><?= $tanggal . ' <b>Pukul</b> ' . substr($sewa_masuk['tgl_awal_acara'], 11, 5) . ' - ' . substr($sewa_masuk['tgl_akhir_acara'], 11, 5) ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500"><?= $sewa_masuk['id_aset'] == 5 ? 'Kode Booking' : 'Kode Bayar' ?></th>
                                                <th class="text-bold-500">:</th>
                                                <td class="content_edit">
                                                    <span id="span_kode_byr"><?= $sewa_masuk['kode_byr'] ?></span> <button class="badge bg-light-secondary" onclick="copyKode()">Copy</button>
                                                    <script>
                                                        function copyKode() {
                                                            // Pilih teks yang akan dicopy
                                                            var textToCopy = document.getElementById('span_kode_byr');

                                                            // Buat elemen input untuk menyimpan teks yang akan dicopy
                                                            var inputElement = document.createElement('input');
                                                            inputElement.value = textToCopy.innerText;
                                                            document.body.appendChild(inputElement);

                                                            // Pilih teks di dalam elemen input
                                                            inputElement.select();

                                                            // Salin teks ke clipboard
                                                            document.execCommand('copy');

                                                            // Hapus elemen input yang sudah tidak diperlukan
                                                            document.body.removeChild(inputElement);

                                                            // Optional: Beri feedback kepada pengguna bahwa teks telah dicopy
                                                            Toastify({
                                                                text: "Kode berhasil dicopy!",
                                                                duration: 3000,
                                                                close: true,
                                                                gravity: "center",
                                                                position: "center",
                                                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                                            }).showToast();
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-bold-500">Dokumen</th>
                                                <th class="text-bold-500">:</th>
                                                <td>
                                                    <?php if ($sewa_masuk['id_aset'] == 5) : ?>
                                                        <a title="Surat" href="<?= base_url('assets/doc/LASADA/') . $sewa_masuk['bukti_pengenal']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/LASADA/') . $sewa_masuk['bukti_pengenal']; ?>','popup','width=600,height=600'); return false;">
                                                            <i class="fa fa-fw fa-address-card"></i>
                                                        </a>
                                                    <?php else : ?>
                                                        <a title="Tanda Pengenal" href="<?= base_url('assets/doc/LASADA/') . $sewa_masuk['bukti_pengenal']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/LASADA/') . $sewa_masuk['bukti_pengenal']; ?>','popup','width=600,height=600'); return false;">
                                                            <i class="fa fa-fw fa-address-card"></i>
                                                        </a>
                                                        <?php if ($sewa_masuk['bukti_byr'] == "") : ?>
                                                            <span title="Bukti Bayar" href="" class="badge bg-secondary">
                                                                <i class="fa fa-fw fa-money"></i> Belum Ada Bukti Bayar
                                                            </span>
                                                        <?php else : ?>
                                                            <a title="Bukti Bayar" href="<?= base_url('assets/doc/LASADA/') . $sewa_masuk['bukti_byr']; ?>" class="badge bg-success" target="popup" onclick="window.open('<?= base_url('assets/doc/LASADA/') . $sewa_masuk['bukti_byr']; ?>','popup','width=600,height=600'); return false;">
                                                                <i class="fa fa-fw fa-money"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <h6 class="text-danger">Catatan:</h6><br>
                                                    <?= $sewa_masuk['catatan_acara'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer center-display">
                        <?php
                        $id_lasada = $sewa_masuk['id'];
                        ?>
                        <button title="Verif Sewa" class="badge btn-success" onclick="verif<?= $id_lasada ?>()"><i class="bi bi-check-circle"></i></button>
                        <script>
                            function verif<?= $id_lasada ?>() {
                                let text = "Anda Yakin Akan Menyetujui Sewa?\nid: <?= $sewa_masuk['id'] ?>";
                                if (confirm(text) == true) {
                                    window.location.href =
                                        "<?= $user['id_role'] == 1 ? base_url('admin/verif_lasada/' . $id_lasada) : ($user['id_role'] == 4 ? base_url('developer/verif_lasada/' . $id_lasada) : '#') ?>";
                                } else {
                                    Swal.fire({
                                        title: "Dibatalkan!",
                                        text: "Sewa belum diverifikasi",
                                        icon: "error",
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            }
                        </script>
                        <button title="Tolak Sewa" class="badge btn-danger" data-bs-toggle="modal" data-bs-target="#tolakSPM<?= $sewa_masuk['id'] ?>"><i class="bi bi-x-circle"></i></button>
                        <!-- Modal tolak -->
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <!--info theme Modal -->
                            <div class="modal fade text-left" id="tolakSPM<?= $sewa_masuk['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                            </button>
                                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                Catatan Penolakan SPM No ID <?= $sewa_masuk['id'] ?>
                                            </h4>
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php $id = $sewa_masuk['id'] ?>
                                            <form id="tolak<?= $sewa_masuk['id'] ?>" action="<?= $user['id_role'] == 1 ? base_url('admin/tolak_sewa/' . $id) : ($user['id_role'] == 4 ? base_url('developer/tolak_sewa/' . $id) : null) ?>" method="post">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="catatan">
                                                            <h6><i class="bi bi-pencil-square"></i> Catatan</h6>
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
                            document.getElementById("tolak<?= $sewa_masuk['id'] ?>").addEventListener("submit",
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
                                            document.getElementById("tolak<?= $sewa_masuk['id'] ?>")
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
                        $id_lasada = $sewa_masuk['id'];
                        ?>
                        <button title="Hapus Sewa" class="badge btn-edit-ismail" onclick="myFunction<?= $id_lasada ?>()"><i class="bi bi-trash"></i></button>
                        <script>
                            function myFunction<?= $id_lasada ?>() {
                                let text = "Anda Yakin Menghapus Sewa ini?\nid: <?= $id_lasada ?>";
                                if (confirm(text) == true) {
                                    window.location.href =
                                        "<?= $user['id_role'] == 1 ? base_url('admin/hapus_lasada/' . $id_lasada) : ($user['id_role'] == 4 ? base_url('developer/hapus_lasada/' . $id_lasada) : '#') ?>";
                                } else {
                                    Swal.fire({
                                        title: "Dibatalkan!",
                                        text: "Sewa batal dihapus",
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
                        <h4 class="card-title"><?= $sewa_masuk['id_aset'] == 5 ? 'Catatan Penolakan Peminjaman ' . $sewa_masuk['nm_aset'] : 'Catatan Penolakan Penyewaan ' . $sewa_masuk['nm_aset'] ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body">
                                <!-- <?php if ($spm_masuk['id_status'] == 2) : ?>
                                    <p style="color: red;"><?= $spm_masuk['catatan'] ?></p>
                                <?php else : ?>
                                    <?php if ($spm_masuk['catatan'] == '') : ?>
                                        <p class="text-muted">Tidak ada catatan penolakan...</p>
                                    <?php else : ?>
                                        <p style="color: red;"><?= $spm_masuk['catatan'] ?></p>
                                    <?php endif ?>
                                <?php endif ?> -->
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
        <div class="modal fade text-left" id="editSewa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-edit-ismail">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="fa-fw fa-lg fa fa-times"></i>
                        </button>
                        <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                            Edit Rincian id <?= $sewa_masuk['id'] ?>
                        </h4>
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="fa-fw fa-lg fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $id = $sewa_masuk['id'];
                        ?>
                        <form id="edit<?= $sewa_masuk['id'] ?>" action="<?= $user['id_role'] == 1 ? base_url('admin/edit_sewa/') . $id : ($user['id_role'] == 4 ? base_url('developer/edit_sewa/') . $id : null) ?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama" style="display: flex; justify-content:start;">
                                        <h6><i class="fa-fw fa-lg fa fa-user-md"></i> Nama Penyewa</h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="<?= $sewa_masuk['nama'] ?>" id="nama" name="nama">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="telepon" style="display: flex; justify-content:start;">
                                                <h6><i class="bi bi-phone"></i> No. HP</h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" value="<?= $sewa_masuk['no_hp'] ?>" id="telepon" name="telepon">
                                                <?= form_error('telepon', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="alamat" style="display: flex; justify-content:start;">
                                                <h6><i class="bi bi-geo-alt"></i> Alamat</h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" value="<?= $sewa_masuk['alamat'] ?>" id="alamat" name="alamat">
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal-awal" style="display: flex; justify-content:start;">
                                                <h6><i class="fa-fw fa-lg fa fa-calendar"></i> Tanggal Awal Acara</h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="date" class="form-control" value="<?= substr($sewa_masuk['tgl_awal_acara'], 0, 10) ?>" id="tanggal-awal" name="tanggal-awal">
                                                <?= form_error('tanggal-awal', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="waktu-awal" style="display: flex; justify-content:start;">
                                                <h6><i class="fa-fw fa-lg fa fa-clock-o"></i> Waktu Awal Acara</h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="time" class="form-control" value="<?= substr($sewa_masuk['tgl_awal_acara'], 11, 5) ?>" id="waktu-awal" name="waktu-awal">
                                                <?= form_error('waktu-awal', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal-akhir" style="display: flex; justify-content:start;">
                                                <h6><i class="fa-fw fa-lg fa fa-calendar"></i> Tanggal Akhir Acara</h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="date" class="form-control" value="<?= substr($sewa_masuk['tgl_akhir_acara'], 0, 10) ?>" id="tanggal-akhir" name="tanggal-akhir">
                                                <?= form_error('tanggal-akhir', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="waktu-akhir" style="display: flex; justify-content:start;">
                                                <h6><i class="fa-fw fa-lg fa fa-clock-o"></i> Waktu Akhir Acara</h6>
                                            </label>
                                            <div class="position-relative">
                                                <input type="time" class="form-control" value="<?= substr($sewa_masuk['tgl_akhir_acara'], 11, 5) ?>" id="waktu-akhir" name="waktu-akhir">
                                                <?= form_error('waktu-akhir', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="acara" style="display: flex; justify-content:start;">
                                        <h6><i class="fa-fw fa-lg fa fa-tasks"></i> Acara</h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="<?= $sewa_masuk['keperluan'] ?>" id="acara" name="acara">
                                        <?= form_error('acara', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="buktiIDupdate" style="display: flex; justify-content:start;">
                                        <h6><i class="fa fa-fw fa-lg fa-address-card-o"></i> Unggah Dokumen</h6>
                                    </label>
                                    <div class="position-relative">
                                        <input type="file" class="form-control" id="buktiIDupdate" name="buktiIDupdate">
                                        <?= form_error('buktiIDupdate', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="catatan_acara" style="display: flex; justify-content:start;">
                                        <h6><i class="fa-fw fa-lg fa fa-tasks"></i> Catatan</h6>
                                    </label>
                                    <div class="position-relative">
                                        <textarea type="text" class="form-control" id="catatan_acara" name="catatan_acara"><?= $sewa_masuk['catatan_acara'] ?></textarea>
                                        <?= form_error('catatan_acara', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="update<?= $id ?>" class="btn btn-edit-ismail ml-1" onclick="gantiText()">
                                    <i class="bx bx-check"></i>
                                    <span><i class="fa fa-fw fa-level-up"></i>
                                        Update</span>
                                </button>
                                <script>
                                    function gantiText() {
                                        let textArea = document.getElementById("catatan_acara");
                                        textArea.value.trim() === "" ? "<?= $sewa_masuk['catatan_acara'] ?>" : textArea.value;
                                    }
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("update<?= $id ?>").addEventListener("click",
            function(event) {
                event.preventDefault();
                Swal.fire({
                    icon: "question",
                    title: "Anda Yakin Mengedit Sewa ini?\nid <?= $id ?>",
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
                            text: "Sewa batal diedit",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            })
    </script>
    <!-- /Modal Edit -->
</div>