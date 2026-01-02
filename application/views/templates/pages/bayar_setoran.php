<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Bukti Pembayaran
                </h3>
                <a href="<?= base_url('admin/admin_sewa') ?>" class="icon"><i class="fa-fw fa-lg fa fa-arrow-circle-left"></i></a>
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
                                    <form id="form-invoice" autocomplete="off" action="<?= base_url('auth/bayarSetoran') ?>" method="post">
                                        <div class="row">
                                            <input type="hidden" class="form-control" id="id_invoice" name="id_invoice"
                                                placeholder="masukkan id"> <!--Untuk edit-->
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        placeholder="masukkan nama" required>
                                                    <label for="nama" class="text-primary">Nama</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        placeholder="masukkan alamat" required>
                                                    <label for="alamat" class="text-primary">Alamat</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                                        placeholder="masukkan kelurahan/desa" required>
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
                                                        <option value='-'>Di Luar Kab. Sampang</option>
                                                    </select>
                                                    <label for="kecamatan" class="text-primary">Kecamatan</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <div class="form-floating">
                                                    <select type="text" class="form-select" id="kabupaten" name="kabupaten" required>
                                                        <option value="" disabled selected>-- pilih kabupaten --</option>
                                                        <option value='Kab. Sampang'>Kab. Sampang</option>
                                                        <option value='Kab. Bangkalan'>Kab. Bangkalan</option>
                                                        <option value='Kab. Pamekasan'>Kab. Pamekasan</option>
                                                        <option value='Kab. Sumenep'>Kab. Sumenep</option>
                                                        <option value='-'>Di Luar Kab. Sampang</option>
                                                    </select>
                                                    <label for="kabupaten" class="text-primary">Kabupaten</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="periode_awal" name="periode_awal"
                                                        placeholder="masukkan periode awal" required>
                                                    <label for="periode_awal" class="text-primary">Periode Awal</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="periode_akhir" name="periode_akhir"
                                                        placeholder="masukkan periode akhir" required>
                                                    <label for="periode_akhir" class="text-primary">Periode Akhir</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="berita" name="berita"
                                                    placeholder="masukkan berita" required></textarea>
                                                <label for="berita" class="text-primary">Berita</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" inputmode="decimal" pattern="[0-9]*[.]?[0-9]*"
                                                        class="form-control" id="nominal" name="nominal" placeholder="masukkan nominal"
                                                        required>
                                                    <label for="nominal" class="text-primary">Nominal</label>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-8">
                                                <div class="form-floating">
                                                    <textarea class="form-control bg-light" id="terbilang" name="terbilang"
                                                        placeholder="terbilang" readonly></textarea>
                                                    <label for="terbilang" class="text-primary">Terbilang</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <button type="submit" id="submit1" class="mt-3 btn btn-success hover-outline">Submit <i class="fa-fw fa-sm fa fa-send-o"></i></button>
                                                <div class="d-flex gap-2">
                                                    <button type="button" id="btnCancel" class="mt-3 btn btn-secondary d-none hover-outline" onclick="backBuktiBayar()">Cancel</button>
                                                    <button type="button" id="submit2" style="display: none;" class="mt-3 btn btn-edit-ismail hover-outline">Edit <i class="fa-fw fa-sm fa fa-send-o"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-7 mt-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_bayar" id="lunas" value="Lunas"
                                                        checked>
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

        <div class="row justify-content-center" id="tag-table">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Invoice</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body">
                                <table id="table1" style="border-color: #d3d2d2ff;" class="table table-bordered mb-0 table-responsive super-small-table">
                                    <thead>
                                        <tr style="background-color: white; color: #003c8aff;">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Periode</th>
                                            <th class="text-center">Berita</th>
                                            <th class="text-center">Nominal</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">
                                        <?php
                                        $i = 1;
                                        foreach ($daftarBayar as $dataBayar):
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $i; ?></td>
                                                <td class="text-center"><?= $dataBayar['nama_bb']; ?></td>
                                                <td class="text-center"><?= $dataBayar['alamat_bb']; ?></td>
                                                <td class="text-center"><?= $dataBayar['periode_awal']; ?></td>
                                                <td><?= $dataBayar['berita_bb']; ?></td>
                                                <td class="text-center"><?= number_format($dataBayar['nominal_bb'], 2, ".", ","); ?></td>
                                                <td class="text-center"><?= $dataBayar['status_bb']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('auth/dokumen_bayar/' . $dataBayar['id_bb']) ?>" target="_blank" title="Print" class="badge btn-success" id="verif"><i class="fa-fw fa-sm fa fa-print"></i></a>
                                                    <button title="Edit" class="badge btn-edit-ismail" onclick="editBayar(<?= $dataBayar['id_bb'] ?>)"><i class="fa-fw fa-sm fa fa-pencil"></i></button>
                                                    <button title="Hapus" class="badge btn-danger" onclick="hapusBayar(<?= $dataBayar['id_bb'] ?>)"><i class="fa-fw fa-sm fa fa-trash-o"></i></button>
                                                </td>
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
        </div>
    </section>

    <script>
        document.getElementById("form-invoice").addEventListener("submit",
            function(event) {
                event.preventDefault();
                Swal.fire({
                    icon: "question",
                    title: "Anda Yakin Submit Data Invoice?",
                    showCancelButton: true,
                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                    reverseButtons: false,
                    cancelButtonColor: '#DD6B55',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("form-invoice").submit();
                    } else {
                        Swal.fire({
                            title: "Dibatalkan!",
                            text: "Data Invoice Batal Disubmit",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            });



        // function hapusBayar(id)
        function editBayar(id) {
            if (confirm("Yakin ingin mengedit data ini? \n id: " + id)) {
                // redirect ke controller edit
                window.location.href = "<?= base_url('admin/getBayarById/'); ?>" + id;
            }
        };

        function backBuktiBayar() {
            window.location.href = "<?= base_url('admin/bukti_bayar'); ?>";
        }

        document.getElementById("submit2").addEventListener("click", function(event) {
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
                    window.location.href = "<?= base_url('auth/edit_bayar/'); ?>" + idEdit;
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
        })

        // function hapusBayar(id)
        function hapusBayar(id) {
            if (confirm("Yakin ingin menghapus data ini? \n id: " + id)) {
                // redirect ke controller hapus
                window.location.href = "<?= base_url('auth/hapus_bayar/'); ?>" + id;
            }
        }
    </script>

    <script src="<?= base_url('assets/') ?>js/terbilang.js"></script>
</div>