<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Persediaan V.2</h3>
                .
            </div>
            <?php
            $NameUser = $user['name'];
            $spmProses = "SELECT spm_masuk.id FROM spm_masuk JOIN data_user
                                                            ON spm_masuk.skpd=data_user.name
                                                            WHERE data_user.name='$NameUser'
                                                            AND spm_masuk.id_status=?
                                                            ";
            $jumlahProses = $this->db->query($spmProses, array(1))->num_rows();
            $jumlahTolak = $this->db->query($spmProses, array(2))->num_rows();
            $jumlahVerif = $this->db->query($spmProses, array(3))->num_rows();
            ?>


            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-caret-right-fill"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>
    <?= form_error('menu', '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-sm-6 mb-1">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-info text-white">Cari berdasar</span>
                    <select class="form-select" id="tahun">
                        <option selected disabled class="text-muted" style="font-style: italic;">--tahun--</option>
                        <option value="2021" class="text-orange">2021</option>
                        <option value="2022" class="text-primary">2022</option>
                        <option value="2023" class="text-success">2023</option>
                    </select>
                    <select class="form-select" id="bulan">
                        <option selected disabled class="text-muted" style="font-style: italic;">--bulan--</option>
                        <option disabled class="text-muted">----------------</option>
                        <option value="0">Semua Bulan</option>
                        <option disabled class="text-muted">----------------</option>
                        <option value="1" class="text-success">Januari</option>
                        <option value="2" class="text-success">Februari</option>
                        <option value="3" class="text-success">Maret</option>
                        <option disabled class="text-muted">----------------</option>
                        <option value="4" class="text-primary">April</option>
                        <option value="5" class="text-primary">Mei</option>
                        <option value="6" class="text-primary">Juni</option>
                        <option disabled class="text-muted">----------------</option>
                        <option value="7" class="text-orange">Juli</option>
                        <option value="8" class="text-orange">Agustus</option>
                        <option value="9" class="text-orange">September</option>
                        <option disabled class="text-muted">----------------</option>
                        <option value="10" class="text-danger">Oktober</option>
                        <option value="11" class="text-danger">November</option>
                        <option value="12" class="text-danger">Desember</option>
                    </select>
                    <select class="form-select" id="tahun">
                        <option selected disabled class="text-muted" style="font-style: italic;">--belanja--</option>
                        <option value="2021" class="text-orange">ATK</option>
                        <option value="2022" class="text-primary">POS</option>
                        <option value="2023" class="text-success">KOMPUTER</option>
                    </select>
                    <a href="#" class="input-group-text bg-info" id="cari-persediaan"><i class="fa fa-fw fa-lg fa-search"></i></a>
                </div>
            </div>
        </div>
        <!-- Menu Action -->
        <div id="table-hover-row">
            <div class="card col-12" style="padding: 7px;">
                <div class="buttons">
                    <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#ajukanSPM"><i class="fa fa-fw fa-lg fa-plus-square-o"></i> Input Item</a>
                    <a href="<?= base_url('export/excel') ?>" class="btn btn-success rounded-pill"><i class="fa fa-fw fa-file-excel-o"></i> Excel</a>
                </div>
                <details>
                    <summary style="color: #00B98E; font-size: 1.3rem;">Keterangan</summary>
                    <small style="padding-top: 15px;">
                        <table class="table-responsive" style="width:100%;">
                            <tr>
                                <th><span class="badge bg-light-warning-ismail">Proses</span></th>
                                <th>:</th>
                                <td>SPM yang diajukan sudah masuk dan menunggu diverifikasi oleh verifikator aset.</td>
                            </tr>
                            <tr>
                                <th><span class="badge bg-light-danger">Ditolak</span></th>
                                <th>:</th>
                                <td>SPM yang diajukan terdapat kesalahan <strong>(bisa berupa data entry atau lembar SPM)</strong> yang perlu diperbaiki.</td>
                            </tr>
                            <tr>
                                <th><span class="badge bg-light-success-ismail">Diverifikasi</span></th>
                                <th>:</th>
                                <td>SPM yang diajukan <strong>clear</strong> dan sudah diverifikasi.</td>
                            </tr>
                        </table>
                        <br>
                        <table class="table-responsive" style="width:100%; display: flex; justify-content: center;">
                            <tr style="border-bottom: 1px solid gray; padding: 7px;">
                                <th><span class="badge bg-info"><i class="bi bi-file-earmark-text"></i></span></th>
                                <th style="padding: 7px;">:</th>
                                <td style="padding-right: 7px;">file yang telah diupload</td>
                                <th style="border-left: 1px solid gray; padding: 7px;"> </th>
                                <th><span class="badge bg-danger"><i class="bi bi-eye"></i></span></th>
                                <th style="padding: 7px;">:</th>
                                <td>lihat detail penolakan</td>
                            </tr>
                            <tr>
                                <th><span class="badge bg-success"><i class="bi bi-printer"></i></span></th>
                                <th style="padding: 7px;">:</th>
                                <td style="padding-right: 7px;">lembar verifikasi siap print</td>
                                <th style="border-left: 1px solid gray; padding: 7px;"> </th>
                                <th><span class="badge btn-edit-ismail"><i class="bi bi-pencil-square"></i></span></th>
                                <th style="padding: 7px;">:</th>
                                <td>edit SPM yang ditolak</td>
                            </tr>
                        </table>
                    </small>
                </details>
                <!-- table hover -->
                <div class="table-responsive">
                    <small>
                        <table class="table table-hover table-bordered display" id="example" style="width:100%">
                            <thead style="justify-content: center;">
                                <!-- <tr>
                                    <th rowspan="2" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Action</th>
                                    <th rowspan="2" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">No.</th>
                                    <th rowspan="2" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Kode Rekening Belanja</th>
                                    <th rowspan="2" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Jenis Persediaan</th>
                                    <th colspan="4" style="border-right: 1px solid gray; padding: 7px;" class="text-center bg-info text-white">Saldo Awal 2023</th>
                                    <th colspan="5" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-warning">Pengadaan 2023</th>
                                    <th colspan="5" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-danger">Pemakaian 2023</th>
                                    <th colspan="4" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-active">Saldo Akhir 2023</th>
                                    <th rowspan="2" style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Ket.</th>
                                </tr>
                                <tr>
                                    <th class="text-center bg-info text-white">Volume</th>
                                    <th class="text-center bg-info text-white">Satuan</th>
                                    <th class="text-center bg-info text-white">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center bg-info text-white">Total Nilai</th>
                                    <th class="text-center table-warning">Tgl Pengadaan</th>
                                    <th class="text-center table-warning">Volume</th>
                                    <th class="text-center table-warning">Satuan</th>
                                    <th class="text-center table-warning">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-warning">Total Nilai</th>
                                    <th class="text-center table-danger">Tgl Pemakaian</th>
                                    <th class="text-center table-danger">Volume</th>
                                    <th class="text-center table-danger">Satuan</th>
                                    <th class="text-center table-danger">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-danger">Total Nilai</th>
                                    <th class="text-center table-active">Volume</th>
                                    <th class="text-center table-active">Satuan</th>
                                    <th class="text-center table-active">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-active">Total Nilai</th>
                                </tr> -->
                                <tr>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Action</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">No.</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Kode Rekening Belanja</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Jenis Persediaan</th>
                                    <th class="text-center bg-info text-white">Volume</th>
                                    <th class="text-center bg-info text-white">Satuan</th>
                                    <th class="text-center bg-info text-white">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center bg-info text-white">Total Nilai</th>
                                    <th class="text-center table-warning">Tgl Pengadaan</th>
                                    <th class="text-center table-warning">Volume</th>
                                    <th class="text-center table-warning">Satuan</th>
                                    <th class="text-center table-warning">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-warning">Total Nilai</th>
                                    <th class="text-center table-danger">Tgl Pemakaian</th>
                                    <th class="text-center table-danger">Volume</th>
                                    <th class="text-center table-danger">Satuan</th>
                                    <th class="text-center table-danger">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-danger">Total Nilai</th>
                                    <th class="text-center table-active">Volume</th>
                                    <th class="text-center table-active">Satuan</th>
                                    <th class="text-center table-active">Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-active">Total Nilai</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;" class="text-center table-success">Ket.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <button class="btn btn-info rounded-pill">
                                            <i class="fa fa-fw fa-file-text"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">5.1.02.01.01.0004 - BAHAN BAKAR DAN PELUMAS</td>
                                    <td style="border-right: 1px solid gray; padding: 7px;">Solar</td>
                                    <!-- saldo awal -->
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-end"></td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;"></td>
                                    <!-- pengadaan -->
                                    <td class="text-center">2023-08-16</td>
                                    <td class="text-center">50</td>
                                    <td class="text-center">liter</td>
                                    <td class="text-end">6000</td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;">300000</td>
                                    <!-- pemakaian -->
                                    <td class="text-center">2023-08-16</td>
                                    <td class="text-center">50</td>
                                    <td class="text-center">liter</td>
                                    <td class="text-end">6000</td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;">300000</td>
                                    <!-- saldo akhir -->
                                    <td class="text-center">0</td>
                                    <td class="text-center">liter</td>
                                    <td class="text-end">6000</td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;">0</td>
                                    <!-- Keterangan -->
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;">Habis terpakai</td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <button class="btn btn-info rounded-pill">
                                            <i class="fa fa-fw fa-file-text"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">2</td>
                                    <td class="text-center">5.1.02.01.01.xxx - ALAT TULIS KANTOR</td>
                                    <td style="border-right: 1px solid gray; padding: 7px;">Spidol</td>
                                    <!-- saldo awal -->
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-end"></td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;"></td>
                                    <!-- pengadaan -->
                                    <td class="text-center">2023-09-12</td>
                                    <td class="text-center">5</td>
                                    <td class="text-center">Pack</td>
                                    <td class="text-end">11000</td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;">55000</td>
                                    <!-- pemakaian -->
                                    <td class="text-center">2023-09-12</td>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Pack</td>
                                    <td class="text-end">11000</td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;">22000</td>
                                    <!-- saldo akhir -->
                                    <td class="text-center">3</td>
                                    <td class="text-center">Pack</td>
                                    <td class="text-end">11000</td>
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;">33000</td>
                                    <!-- Keterangan -->
                                    <td class="text-end" style="border-right: 1px solid gray; padding: 7px;"></td>
                                </tr>

                                <!-- Add more rows here -->
                            </tbody>
                            <tfoot class="table-success">
                                <!-- <tr>
                                    <th>Action</th>
                                    <th>No.</th>
                                    <th>Kode Rekening Belanja</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;">Jenis Persediaan</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;">Total Nilai</th>
                                    <th>Tgl Pengadaan</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;">Total Nilai</th>
                                    <th>Tgl Pengadaan</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;">Total Nilai</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;">Total Nilai</th>
                                    <th style="border-right: 1px solid gray; padding: 7px;">Ket.</th>
                                </tr> -->
                                <tr class="text-primary" style="border-bottom: 1px solid gray; padding: 7px;">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="border-right: 1px solid gray; padding: 7px;">Total</th>
                                    <th class="text-center">2</th>
                                    <th></th>
                                    <th class="text-end">270</th>
                                    <th class="text-end" style="border-right: 1px solid gray; padding: 7px;">650</th>
                                    <th></th>
                                    <th class="text-center">2</th>
                                    <th></th>
                                    <th class="text-end">270</th>
                                    <th class="text-end" style="border-right: 1px solid gray; padding: 7px;">650</th>
                                    <th></th>
                                    <th class="text-center">2</th>
                                    <th></th>
                                    <th class="text-end">270</th>
                                    <th class="text-end" style="border-right: 1px solid gray; padding: 7px;">650</th>
                                    <th class="text-center">2</th>
                                    <th></th>
                                    <th class="text-end">270</th>
                                    <th class="text-end" style="border-right: 1px solid gray; padding: 7px;">650</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </small>

                    <!-- <script src="<?= base_url('assets/datatable-tfoot/') ?>jquery-3.7.0.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/') ?>jquery.dataTables.min.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/baru/') ?>dataTables.fixedHeader.min.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/baru/') ?>buttons.html5.min.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/baru/') ?>buttons.print.min.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/baru/') ?>dataTables.buttons.min.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/baru/') ?>jszip.min.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/baru/') ?>pdfmake.min.js"></script>
                    <script src="<?= base_url('assets/datatable-tfoot/baru/') ?>vfs_fonts.js"></script> -->

                    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
                    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
                    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
                    <!-- <script>
                        $('#example').DataTable({
                            initComplete: function() {
                                this.api()
                                    .columns()
                                    .every(function() {
                                        var column = this;

                                        // Create select element and listener
                                        var select = $('<select class="select-width"><option value="">All..</option></select>')
                                            .appendTo($(column.header()).empty())
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
                    </script> -->

                    <script>
                        // $(document).ready(function() {
                        // Setup - add a text input to each footer cell
                        $('#example thead tr').clone(true).addClass('filters').appendTo('#example thead');
                        var table = $('#example').DataTable({
                            dom: 'Bfrtip',
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

                            orderCellsTop: true,
                            fixedHeader: true,
                            initComplete: function() {
                                var api = this.api();
                                // For each column
                                api.columns().eq(0).each(function(colIdx) {
                                    // Set the header cell to contain the input element
                                    var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                                    var title = $(cell).text();
                                    $(cell).html('<input class="select-width" type="text" placeholder="Cari ' + title + '" />');
                                    // On every keypress in this input
                                    $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                                        .off('keyup change')
                                        .on('keyup change', function(e) {
                                            e.stopPropagation();
                                            // Get the search value
                                            $(this).attr('title', $(this).val());
                                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
                                            var cursorPosition = this.selectionStart;
                                            // Search the column for that value
                                            api
                                                .column(colIdx)
                                                .search((this.value != "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value != "", this.value == "")
                                                .draw();
                                            $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                                        });
                                });
                            }
                        });
                        // });
                    </script>
                </div>
            </div>
        </div>
        <br>
        <!-- /Menu Action -->

        <!-- Ajukan SPM Modal -->
        <div class="modal-info me-1 mb-1 d-inline-block">
            <!--info theme Modal -->
            <div class="modal fade text-left" id="ajukanSPM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                <i class="fa fa-fw fa-lg fa-times"></i>
                            </button>
                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                Masukkan Data SPM
                            </h4>
                            <p style="color: tomato;"><strong style="color: red;">*</strong> Wajib diisi</p>
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                <i class="fa fa-fw fa-lg fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <?= form_open_multipart('user/ajukan') ?> -->
                            <form id="form_pengajuan" action="<?= base_url('user/ajukan'); ?>" method="post" enctype="multipart/form-data">
                                <div class="col-12">
                                    <div class="form-group d-none">
                                        <label for="id">
                                            <h6><i class="bi bi-card-checklist"></i> ID</h6>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value="" id="id" name="id" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group d-none">
                                        <label for="skpd">
                                            <h6>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                                    <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z" />
                                                </svg>
                                                SKPD
                                            </h6>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value="<?= $user['name'] ?>" id="skpd" name="skpd" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_spm">
                                            <h6><i class="bi bi-bar-chart-line-fill"></i> No. SPM <span style="color: red;"><strong>*</strong></span></h6>
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Masukkan No. SPM" id="no_spm" name="no_spm" required>
                                            <?= form_error('no_spm', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis">
                                            <h6><i class="bi bi-bookmark-check"></i> Jenis <span style="color: red;"><strong>*</strong></span></h6>
                                        </label>
                                        <div class="position-relative">
                                            <select class="form-select" id="jenis" name="jenis" required>
                                                <option selected disabled value="">--Pilih Jenis SPM--</option>
                                                <option value="BELANJA MODAL SEMESTER I/II">BELANJA MODAL SEMESTER I/II
                                                </option>
                                                <option value="BUKU PERSEDIAAN">BUKU PERSEDIAAN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dokumen">
                                            <h6><i class="bi bi-file-earmark-bar-graph"></i> Dokumen SPM <strong style="color: red;">*</strong></h6>
                                        </label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="document"><i class="bi bi-upload"></i></label>
                                            <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-ajukan btn-primary ml-1" id="add_spm">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span><i class="bi bi-plus-square"></i> Ajukan</span>
                                    </button>
                                    <button class="btn-loading btn btn-light-danger d-none" type="button" disabled>
                                        <img src="<?= base_url('assets/') ?>vendors/svg-loaders/audio.svg" class="me-4" style="width: 1.1rem" alt="audio">
                                        <span>Sedang Mengirim...</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Ajukan SPM Modal -->

    </section>
</div>

<script>
    const btnAju = document.querySelector('.btn-ajukan');
    const btnLoading = document.querySelector('.btn-loading');
    document.getElementById("form_pengajuan").addEventListener("submit", function(event) {
        event.preventDefault();
        Swal.fire({
            icon: "question",
            title: "Yakin Mengajukan SPM?",
            text: "Periksa kembali sebelum mengajukan, kesalahan tidak bisa dibatalkan",
            showCancelButton: true,
            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Tidak",
            reverseButtons: false,
            cancelButtonColor: '#DD6B55',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("form_pengajuan").submit();
                btnLoading.classList.toggle('d-none');
                btnAju.classList.toggle('d-none');
            } else {
                Swal.fire({
                    title: "Dibatalkan!",
                    text: "SPM Tidak Diajukan",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1300
                })
            }
        })
    })
</script>