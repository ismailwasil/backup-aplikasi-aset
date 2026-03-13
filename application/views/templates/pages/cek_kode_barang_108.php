<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="row">
                <div class="nav-bar">
                    <nav class="navbar navbar-expand navbar-light float-start float-sm-start">
                        <div class="container-fluid justify-content-end">
                            <button onclick="kembaliDanHapus()" class="btn btn-edit-ismail btn-block btn-sm shadow-lg mb-5 mt-5">
                                <i class="fa fa-fw fa-arrow-left"></i> Kembali
                            </button>
                            <script>
                                function kembaliDanHapus() {
                                    localStorage.clear();
                                    window.location.href = "<?= base_url('auth') ?>";
                                }
                            </script>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first" style="z-index: 1 ;">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-caret-right-fill"></i>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <!--Cek Kode Barang-->
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cek Kode Barang 108</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <style>
                            .khusus_kode_barang table,
                            th,
                            td {
                                border: 1px solid #000000;
                            }

                            .khusus_kode_barang table {
                                margin-top: 5px;
                                margin-bottom: 5px;
                            }

                            .khusus_kode_barang nav {
                                margin-top: 5px;
                            }
                        </style>
                        <div id="container" class="khusus_kode_barang">
                            <table class="table table-responsive mb-0 super-small-table" id="example">
                                <thead style="background-color: #ef853d; color: #000000;">
                                    <tr>
                                        <th scope="col" class="text-center">NO</th>
                                        <th scope="col" class="text-center">KODE ASET</th>
                                        <th scope="col" class="text-center">URAIAN ASET</th>
                                        <th scope="col" class="text-center">TYPE</th>
                                        <th scope="col" class="text-center">KET</th>
                                    </tr>
                                </thead>
                                <tbody id="tableKodBar">
                                    <!-- <?php foreach ($kode_108 as $kd108) : ?>
                                        <?php if ($kd108['level_108'] == 1): ?>
                                            <tr style="background-color: #cc8ecc;">
                                            <?php elseif ($kd108['level_108'] == 2): ?>
                                            <tr style="background-color: #ffe598;">
                                            <?php elseif ($kd108['level_108'] == 3): ?>
                                            <tr style="background-color: #f7caac;">
                                            <?php elseif ($kd108['level_108'] == 4): ?>
                                            <tr style="background-color: #a1f5a3;">
                                            <?php elseif ($kd108['level_108'] == 5): ?>
                                            <tr style="background-color: cyan;">
                                            <?php elseif ($kd108['level_108'] == 6): ?>
                                            <tr style="background-color: #fffd83;">
                                            <?php endif; ?>
                                            <th scope="row" class="text-center"><?= $kd108['no'] ?></th>
                                            <td><?= $kd108['kode_aset_108'] ?></td>
                                            <td><?= $kd108['uraian_aset_108'] ?></td>
                                            <td id="type" class="text-center"><?= $kd108['type_108'] ?></td>
                                            <?php $additional = $kd108['ket_108'] == "Additional" ? "bg-danger text-white" : ""; ?>
                                            <td id="ket" class="text-center <?= $additional ?>"><?= $kd108['ket_108'] ?></td>
                                            </tr>
                                        <?php endforeach; ?> -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/Cek Kode Barang-->
    </section>
</div>


<script>
    document.getElementById("tableKodBar").innerHTML = `
                                                <tr>
                                                    <td colspan=5 class="text-center">Memuat data <i class="fa fa-spinner fa-pulse fa-fw"></i></td>
                                                </tr>
                                                `;
    let data108 = <?= json_encode($kode_108 ?? []); ?>;
    if (!localStorage.getItem("kodeBarang108")) {
        localStorage.setItem("kodeBarang108", JSON.stringify(data108));
    };
</script>

<!-- <script src="<?= base_url('assets/') ?>js/ajax-kode-barang-108.js"></script> -->
<script>
    let datas = JSON.parse(localStorage.getItem("kodeBarang108"));
    let html = "";
    datas.forEach(function(data) {
        let warna = '';
        if (data.level_108 == 1) {
            warna = '#cc8ecc;';
        } else if (data.level_108 == 2) {
            warna = '#ffe598;';
        } else if (data.level_108 == 3) {
            warna = '#f7caac;';
        } else if (data.level_108 == 4) {
            warna = '#a1f5a3;';
        } else if (data.level_108 == 5) {
            warna = 'cyan;';
        } else if (data.level_108 == 6) {
            warna = '#fffd83;';
        };
        html += `
        <tr style="background-color: ${warna}">
        <td scope="row" class="text-center">${data.no}</td>
        <td>${data.kode_aset_108}</td>
        <td>${data.uraian_aset_108}</td>
        <td id="type" class="text-center">${data.type_108}</td>
        <td id="ket" class="text-center ${data.ket_108=='Additional'?'text-white bg-danger':''}">${data.ket_108==null?'':data.ket_108}</td>
        </tr>
        `;
    });
    document.getElementById("tableKodBar").innerHTML = html;
    new DataTable("#example");
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>