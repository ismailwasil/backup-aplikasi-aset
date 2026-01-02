<div class="page-heading">
    <h3>Admin Sewa</h3>
</div>
<div class="page-content">
    <?= $this->session->flashdata('message'); ?>

    <?php
    $ListAset = $this->db->get('aset_sewa')->result_array();
    ?>
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <?php foreach ($ListAset as $LA) : ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <?php
                        $id_jumlah_aset = $LA['id_aset'];
                        $this->db
                            ->where('id_aset', $id_jumlah_aset)
                            ->from('event_acara')
                            ->count_all_results();

                        $id_role = $this->session->userdata('id_role');
                        ?>
                        <a href="<?= $id_role == 1 ? base_url('admin/admin_item_aset/') . $LA['id_aset'] : ($id_role == 4 ? base_url('developer/admin_item_aset/') . $LA['id_aset'] : '#') ?>">
                            <div class="card transform">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon" style="background-color: <?= $LA['color'] ?>;">
                                                <span style="color: white;">
                                                    <i class="fa fa-fw fa-lg fa-bar-chart"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold"><?= $LA['nm_aset'] ?></h6>
                                            <h6 class="font-extrabold mb-0"><?= $jumlahAngkaSewa ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <script src="<?= base_url('assets/') ?>js/chartV2.9.4.js"></script>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>% Persentase Penyewa Aset</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartBaru"></canvas>
                            <script>
                                var chartData = <?php echo json_encode($acara); ?>;

                                var labels = [];
                                var values = [];
                                var colors = [];

                                // Memproses data yang diambil dari database
                                chartData.forEach(function(data) {
                                    labels.push(data.nm_aset);
                                    values.push(data.series);
                                    colors.push(data.color);
                                });

                                // Membuat doughnut chart
                                var ctx = document.getElementById('chartBaru').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            data: values,
                                            backgroundColor: colors,
                                        }]
                                    },
                                    options: {
                                        cutoutPercentage: 30,
                                        tooltips: {
                                            callbacks: {
                                                label: function(tooltipItem, data) {
                                                    var label = data.labels[tooltipItem.index] || '';
                                                    var value = data.datasets[0].data[tooltipItem.index];
                                                    var total = data.datasets[0].data.reduce(function(acc, val) {
                                                        return acc + val;
                                                    });
                                                    var percentage = ((value / total) * 100).toFixed(2) + '%';
                                                    return label + ' : ' + value + ' (' + percentage + ')';
                                                }
                                            }
                                        },
                                        responsive: true,
                                        legend: {
                                            position: 'bottom'
                                        }
                                    },
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                                            <use xlink:href="<?= base_url('assets/'); ?>vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Europe</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">862</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-europe"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-success" width="32" height="32" fill="blue" style="width:10px">
                                            <use xlink:href="<?= base_url('assets/'); ?>vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">America</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">375</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-america"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                                            <use xlink:href="<?= base_url('assets/'); ?>vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Indonesia</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">1025</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-indonesia"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Comments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="<?= base_url('assets/'); ?>images/faces/5.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Congratulations on your graduation!</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="<?= base_url('assets/'); ?>images/faces/2.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Wow amazing design! Can you make another tutorial for this design?</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">

            <div class="card">
                <div class="card-header">
                    <h4>Recent Messages</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/'); ?>images/faces/4.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Hank Schrader</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/'); ?>images/faces/5.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Dean Winchester</h5>
                            <h6 class="text-muted mb-0">@imdean</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/'); ?>images/faces/2.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Ismail</h5>
                            <h6 class="text-muted mb-0">@ismail</h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <a href="<?= base_url('admin/bukti_bayar') ?>" class='btn btn-block btn-xl btn-secondary font-bold mt-3'>Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>