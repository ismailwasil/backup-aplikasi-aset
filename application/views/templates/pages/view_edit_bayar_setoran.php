<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Bukti Pembayaran
                </h3>
                <a href="<?= base_url('admin/bukti_bayar') ?>" class="icon"><i class="fa-fw fa-lg fa fa-arrow-circle-left"></i></a>
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
                        <h4 class="card-title">Isi Invoice Di Sini</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <form id="form-invoice-edit" autocomplete="off" action="<?= base_url('auth/edit_bayar/') . $daftarBayar['id_bb'] ?>" method="post">
                                        <div class="row">
                                            <input type="hidden" class="form-control" id="id_invoice" name="id_invoice"
                                                placeholder="masukkan id"> <!--Untuk edit-->
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        placeholder="masukkan nama" value="<?= $daftarBayar['nama_bb'] ?>">
                                                    <label for="nama" class="text-primary">Nama</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        placeholder="masukkan alamat" value="<?= $daftarBayar['alamat_bb'] ?>">
                                                    <label for="alamat" class="text-primary">Alamat</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                                        placeholder="masukkan kelurahan/desa" value="<?= $daftarBayar['kelurahan_bb'] ?>">
                                                    <label for="name" class="text-primary">Kelurahan/Desa</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <div class="form-floating">
                                                    <select class="form-select" id="kecamatan" name="kecamatan" required>
                                                        <option value="" disabled selected>-- pilih kecamatan --</option>
                                                        <option value='Kec. Sampang'>Kec. Sampang</option>
                                                        <option value='Kec. Omben'>Kec. Omben</option>
                                                        <option value='Kec. Camplong'>Kec. Camplong</option>
                                                        <option value='Kec. Torjun'>Kec. Torjun</option>
                                                        <option value='Kec. Pangarengan'>Kec. Pangarengan</option>
                                                        <option value='Kec. Jrengik'>Kec. Jrengik</option>
                                                        <option value='Kec. Sreseh'>Kec. Sreseh</option>
                                                        <option value='Kec. Tambelangan'>Kec. Tambelangan</option>
                                                        <option value='Kec. Kedungdung'>Kec. Kedungdung</option>
                                                        <option value='Kec. Robatal'>Kec. Robatal</option>
                                                        <option value='Kec. Karang Penang'>Kec. Kr_Penang</option>
                                                        <option value='Kec. Ketapang'>Kec. Ketapang</option>
                                                        <option value='Kec. Banyuates'>Kec. Banyuates</option>
                                                        <option value='Kec. Sokobanah'>Kec. Sokobanah</option>
                                                    </select>
                                                    <label for="kecamatan" class="text-primary">Kecamatan</label>
                                                </div>
                                                <script>
                                                    document.getElementById('kecamatan').value = "<?= $daftarBayar['kecamatan_bb'] ?>"
                                                </script>
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <div class="form-floating">
                                                    <select type="text" class="form-select" id="kabupaten" name="kabupaten" required>
                                                        <option value="" disabled selected>-- pilih kabupaten --</option>
                                                        <option value='Kab. Sampang'>Kab. Sampang</option>
                                                        <option value='Kab. Bangkalan'>Kab. Bangkalan</option>
                                                        <option value='Kab. Pamekasan'>Kab. Pamekasan</option>
                                                        <option value='Kab. Sumenep'>Kab. Sumenep</option>
                                                    </select>
                                                    <label for="kabupaten" class="text-primary">Kabupaten</label>
                                                </div>
                                                <script>
                                                    document.getElementById('kabupaten').value = "<?= $daftarBayar['kabupaten_bb'] ?>"
                                                </script>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="periode_awal" name="periode_awal"
                                                        placeholder="masukkan periode awal" value="<?= $daftarBayar['periode_awal'] ?>">
                                                    <label for="periode_awal" class="text-primary">Periode Awal</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="periode_akhir" name="periode_akhir"
                                                        placeholder="masukkan periode akhir" value="<?= $daftarBayar['periode_akhir'] ?>">
                                                    <label for="periode_akhir" class="text-primary">Periode Akhir</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="berita" name="berita"
                                                    placeholder="masukkan berita"><?= $daftarBayar['berita_bb'] ?></textarea>
                                                <label for="berita" class="text-primary">Berita</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" inputmode="decimal" pattern="[0-9]*[.]?[0-9]*"
                                                        class="form-control" id="nominal" name="nominal" placeholder="masukkan nominal"
                                                        value="<?= $daftarBayar['nominal_bb'] ?>">
                                                    <label for="nominal" class="text-primary">Nominal</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-8">
                                                <div class="form-floating">
                                                    <textarea class="form-control bg-light" id="terbilang" name="terbilang"
                                                        placeholder="terbilang" readonly><?= $daftarBayar['terbilang_bb'] ?></textarea>
                                                    <label for="terbilang" class="text-primary">Terbilang</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="d-flex gap-2">
                                                    <button type="button" id="btnCancel" class="mt-3 btn btn-secondary hover-outline" onclick="backBuktiBayar()">Cancel</button>
                                                    <button type="submit" id="submit2" style="display: none;" class="mt-3 btn btn-edit-ismail hover-outline">Edit <i class="fa-fw fa-sm fa fa-send-o"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-7 mt-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_bayar" id="lunas" value="Lunas">
                                                    <label class="form-check-label" for="lunas">
                                                        Lunas
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_bayar" id="dp" value="DP">
                                                    <label class="form-check-label" for="dp">
                                                        DP
                                                    </label>
                                                </div>
                                                <script>
                                                    var status = "<?= $daftarBayar['status_bb'] ?>"
                                                    status == "Lunas" ? document.getElementById("lunas").checked = true : document.getElementById("dp").checked = true;
                                                </script>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer center-display">
                        <button title="Verif SPM" class="badge btn-success" id="verif"><i class="bi bi-check-circle"></i></button>
                        <button title="Tolak SPM" class="badge btn-danger" data-bs-toggle="modal" data-bs-target="#tolakSPM"><i class="bi bi-x-circle"></i></button>
                        <button title="Hapus SPM" class="badge btn-edit-ismail" onclick="myFunction"><i class="bi bi-trash"></i></button>
                    </div> -->
                </div>
            </div>
        </div>

    </section>


    <script>
        function backBuktiBayar() {
            window.location.href = "<?= base_url('admin/bukti_bayar'); ?>";
        }

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("form-invoice-edit");
            const submitBtn = document.getElementById("submit2");

            // Ambil semua elemen input, select, textarea
            const fields = form.querySelectorAll("input, select, textarea");

            // Simpan nilai awal
            const initialValues = {};
            fields.forEach(field => {
                if (field.type === "radio" || field.type === "checkbox") {
                    initialValues[field.name + "_" + field.value] = field.checked;
                } else {
                    initialValues[field.name] = field.value;
                }
            });

            // Cek perubahan
            function checkChanges() {
                let changed = false;

                fields.forEach(field => {
                    if (field.type === "radio" || field.type === "checkbox") {
                        if (initialValues[field.name + "_" + field.value] !== field.checked) {
                            changed = true;
                        }
                    } else {
                        if (initialValues[field.name] !== field.value) {
                            changed = true;
                        }
                    }
                });

                // Tampilkan tombol jika ada perubahan
                submitBtn.style.display = changed ? "inline-block" : "none";
            }

            // Pasang listener
            fields.forEach(field => {
                field.addEventListener("change", checkChanges);
                field.addEventListener("input", checkChanges); // untuk textarea & text
            });
        });

        document.getElementById("form-invoice-edit").addEventListener("submit",
            function(event) {
                event.preventDefault();
                Swal.fire({
                    icon: "question",
                    title: "Anda Yakin Edit Data Invoice?",
                    showCancelButton: true,
                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                    reverseButtons: false,
                    cancelButtonColor: '#DD6B55',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("form-invoice-edit").submit();
                    } else {
                        Swal.fire({
                            title: "Dibatalkan!",
                            text: "Data Invoice Batal Diedit",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            });
    </script>

    <script src="<?= base_url('assets/') ?>js/terbilang.js"></script>
</div>