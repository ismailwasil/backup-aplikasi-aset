<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    <style>
                        .back:hover {
                            border-radius: 15px;
                            box-shadow: inset 5px 5px 3px #e3e8f0,
                                inset -5px -5px 3px #ffffff;
                        }

                        .back i {
                            color: #25396f;
                        }
                    </style>
                    <a href="<?= base_url('auth/pengajuan_spm') ?>" class="btn back">
                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                    </a> Pengajuan SPM
                </h3>
                .
            </div>

        </div>
    </div>
    <?= form_error('menu', '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit SPM</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $idEditSPM = $spm_masuk['id_masuk_spm'] ?>
                            <form class="form form-vertical" id="editSPMmasuk" action="<?= base_url('auth/edit_spm_aju/') . $idEditSPM ?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="skpd">SKPD</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="<?= $spm_masuk['name'] ?>" id="skpd" name="skpd" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-building"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="no_spm">No. SPM</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="<?= $spm_masuk['no_spm'] ?>" id="no_spm" name="no_spm">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-bar-chart-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="jenis">Jenis</label>
                                                <div class="position-relative">
                                                    <select class="form-control form-select" id="jenis" name="jenis" required>
                                                        <option disabled value="">--Pilih Jenis SPM--</option>
                                                        <option class="bg-light-warning" <?= $spm_masuk['jenis'] == "BELANJA MODAL" ? "selected" : null ?> value="BELANJA MODAL">BELANJA MODAL</option>
                                                        <option class="bg-light-success" <?= $spm_masuk['jenis'] == "BELANJA PERSEDIAAN" ? "selected" : null ?> value="BELANJA PERSEDIAAN">BELANJA PERSEDIAAN</option>
                                                        <option class="bg-light-danger" <?= $spm_masuk['jenis'] == "BUKAN BELANJA MODAL/PERSEDIAAN" ? "selected" : null ?> value="BUKAN BELANJA MODAL/PERSEDIAAN">BUKAN BELANJA MODAL/PERSEDIAAN</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-bookmark-check"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="no_spm">Jumlah SPP Diminta</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="<?= $spm_masuk['total_spm'] == NULL ? "" : number_format($spm_masuk['total_spm'], 2, ',', '.'); ?>" id="total-spm" name="total-spm">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-fw fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="dokumenEdit">Dokumen SPM</label>
                                                <div class="position-relative">
                                                    <input type="file" class="form-control" id="dokumenEdit" name="dokumenEdit">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-file-earmark-bar-graph"></i>
                                                    </div>
                                                </div>
                                                <small style="color: orangered;">Jika ada perubahan lembar SPM, bisa diupload ulang. Jika tidak ada, dikosongi saja</small>
                                                <div class="alert alert-danger alert-dismissible show fade" id="pesan_error">
                                                    Nama file tidak valid. Hanya huruf, angka, dan garis bawah (_) yang diperbolehkan.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-update btn-edit-ismail ml-1" id="add_spm"><i class="fa fa-fw fa-level-up"></i> Update & Ajukan Ulang</button>
                                            <button class="btn-loading btn btn-light-danger d-none" type="button" disabled>
                                                <img src="<?= base_url('assets/') ?>vendors/svg-loaders/audio.svg" class="me-4" style="width: 1.1rem" alt="audio">
                                                <span>Sedang Mengirim...</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var pesan = document.getElementById("pesan_error");
                                    window.onload = function() {
                                        // Jalankan JavaScript Anda di sini
                                        pesan.style.display = "none";
                                    };
                                    // Fungsi untuk memeriksa apakah nama file valid
                                    function isValidFilename(filename) {
                                        // Definisikan pola regex untuk karakter yang diperbolehkan
                                        var allowedCharacters = /^[a-zA-Z0-9_.\- ]*$/;
                                        // Lakukan pengecekan dengan ekspresi reguler
                                        return allowedCharacters.test(filename);
                                    }

                                    // Fungsi yang dipanggil ketika input file berubah
                                    function handleFileInputChange(event) {
                                        // var pesan = document.getElementById("pesan_error");
                                        var btnAjukan = document.getElementById("add_spm")
                                        var input = event.target;
                                        var files = input.files;

                                        // Jika ada file yang dipilih
                                        if (files.length > 0) {
                                            // Periksa nama file
                                            var filename = files[0].name;
                                            if (!isValidFilename(filename)) {
                                                // Jika nama file tidak valid, tampilkan pesan dan kosongkan input file
                                                btnAjukan.disabled = true;
                                                pesan.style.display = "block";
                                                pesan.innerHTML = "Nama file tidak valid. Hanya angka, huruf, underscore (_), titik (.), dan dash (-) yang diperbolehkan.";
                                                input.value = ''; // Kosongkan input file
                                            } else {
                                                btnAjukan.disabled = false;
                                                pesan.style.display = "none";
                                            }
                                        }
                                    }

                                    // Mendapatkan referensi ke elemen input file
                                    var fileInput = document.getElementById('dokumenEdit');

                                    // Menambahkan event listener untuk perubahan pada input file
                                    fileInput.addEventListener('change', handleFileInputChange);
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var idAngka = "total-spm";
        </script>
        <script src="<?= base_url('assets/') ?>js/formatAngkaID.js"></script>
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



    </section>
</div>