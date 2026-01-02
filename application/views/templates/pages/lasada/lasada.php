<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <img src="<?= base_url('assets/'); ?>images/logo/Lasada BPPKAD.png" alt="Lasada BPPKAD" height="90">
                <!-- <h3>Layanan Sewa Aset Daerah (Lasada)</h3> -->
                <!-- <p class="text-subtitle text-muted">Pemanfaatan Aset Daerah</p> -->
            </div>
        </div>
    </div>

    <div class="page-content">
        <?= $this->session->flashdata('message'); ?>
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row justify-content-center">
                    <!-- <div class="col-md-6 col-12"> -->
                    <div class="card">
                        <div class="card-header text-center">
                            <!-- <img src="<?= base_url('assets/'); ?>images/logo/Lasada BPPKAD.png" alt="Lasada BPPKAD" height="90"> -->
                            <h5 class="card-title">Aset-Aset Yang Disewakan</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-bpuSpg-list" data-bs-toggle="list" href="#list-bpuSpg" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                                    </svg> <strong>BPU Sampang</strong>
                                </a>
                                <a class="list-group-item list-group-item-action" id="list-mess-list" data-bs-toggle="list" href="#list-mess" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-check" viewBox="0 0 16 16">
                                        <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z" />
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z" />
                                    </svg> <strong>Mess Surabaya</strong>
                                </a>
                                <a class="list-group-item list-group-item-action" id="list-bpuKTP-list" data-bs-toggle="list" href="#list-bpuKTP" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                    </svg> <strong>BPU Ketapang</strong>
                                </a>
                                <a class="list-group-item list-group-item-action" id="list-pesanggrahan-list" data-bs-toggle="list" href="#list-pesanggrahan" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-down" viewBox="0 0 16 16">
                                        <path d="M12.5 9a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm.354 5.854 1.5-1.5a.5.5 0 0 0-.708-.708l-.646.647V10.5a.5.5 0 0 0-1 0v2.793l-.646-.647a.5.5 0 0 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0Z" />
                                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1V1Z" />
                                        <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                    </svg> <strong>Pesanggrahan</strong>
                                </a>
                            </div>
                            <div class="tab-content text-justify">
                                <!-- BPU SAMPANG -->
                                <div class="tab-pane fade show active" id="list-bpuSpg" role="tabpanel" aria-labelledby="list-bpuSpg-list">
                                    <div class="row justify-content-center">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div id="carouselBPU-spg-1" class="carousel slide" data-bs-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-bs-target="#carouselBPU-spg-1" data-bs-slide-to="0" class="active"></li>
                                                            <li data-bs-target="#carouselBPU-spg-1" data-bs-slide-to="1"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="<?= base_url('assets/'); ?>images/bg/BPPKAD.jpg" class="d-block w-100" alt="..." style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/samples/building.jpg" class="d-block w-100" alt="..." style="height: 20rem">
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselBPU-spg-1" role="button" data-bs-slide="prev">
                                                            <div class="card bg-primary">
                                                                <span style="color: black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </div>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselBPU-spg-1" role="button" data-bs-slide="next">
                                                            <div class="card bg-primary">
                                                                <span style="color: black;" class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">BPU Kab. Sampang</h4>
                                                        <!-- Read More -->
                                                        <div id="heading1" data-bs-toggle="collapse" data-bs-target="#collapse-BPU-spg" aria-expanded="false" aria-controls="collapse1" role="button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                            </svg>
                                                            <strong>Harga</strong>: Rp 3.000.000
                                                            <p>Kapasitas: 700 orang</p>
                                                            <hr>
                                                            <button class="btn btn-light-success">Lihat Lebih Lanjut...</button>
                                                        </div>
                                                        <div id="collapse-BPU-spg" class="collapse pt-1" aria-labelledby="heading1" data-parent="#cardAccordion">
                                                            <p>
                                                                Gedung BPU Sampang berkantor pusat di Jawa Timur.
                                                            </p>
                                                            <p>
                                                                Fasilitas yang didapat:
                                                            <table class="table-responsive" style="width:100%">
                                                                <tr>
                                                                    <th>Kursi</th>
                                                                    <th>:</th>
                                                                    <td>400 buah <span style="color: red;">*</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sound System</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Toilet</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                            </table>
                                                            <p style="color: red;"># Jika ada penambahan jumlah kursi dari luar gedung, biaya sewa kursi ditanggung pihak penyewa</p>
                                                            </p>
                                                            <p>
                                                                <i class="bi bi-geo-alt"></i> <a href="https://goo.gl/maps/HjuejFa29w1isA8N9"> Jl. Trunojoyo, Rw. V,</a> <br>Kel. Rong Tengah, Kec. Sampang, <br>Kabupaten Sampang, Jawa Timur
                                                                <br><i class="bi bi-mailbox"></i> 69216, Indonesia.
                                                            </p>
                                                            <hr>
                                                            <button type="button" class="btn d-flex btn-success" data-bs-toggle="modal" data-bs-target="#BPU-spg-pk1">
                                                                Isi Form Sewa
                                                            </button>
                                                        </div>
                                                        <!-- /Read more -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <div class="row text-center">
                                            <h4>Daftar Penyewa</h4>
                                        </div>
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>TANGGAL</th>
                                                    <th>ACARA</th>
                                                    <th>WAKTU</th>
                                                    <th>ALAMAT PENYEWA</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">2-Juni-2023</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">25-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Wijaya Kusuma</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">30-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Imam Ghozali</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!--scrolling content Modal -->
                                    <div class="modal fade" id="BPU-spg-pk1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-center text-label-header" id="exampleModalScrollableTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="" height="35"> Form Penyewaan BPU Sampang</h4>
                                                    <p style="color: bisque;"><span style="color: red;"><strong>*</strong></span> Wajib diisi</p>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <!-- <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="nomerRegister"><h6><i class="bi bi-pencil-square"></i> Nomer Register</h6></label>
                                                                                <div class="position-relative">
                                                                                    <input type="number" class="form-control" placeholder="No Register" id="nomerRegister" name="noreg" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="nama">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Nama <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Nama Penyewa --" id="nama" name="nama" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="telepon">
                                                                        <h6 class="text-label"><i class="bi bi-phone"></i> No. HP <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="tel" class="form-control" placeholder="+62 8345xxxxxx" id="telepon" name="telepon" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">
                                                                        <h6 class="text-label"><i class="bi bi-geo-alt"></i> Alamat <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Alamat Penyewa --" id="alamat" name="alamat" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Aset Sewa <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="BPU Sampang" id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="acara">
                                                                        <h6 class="text-label"><i class="bi bi-hdd-rack"></i> Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Keperluan untuk --" id="acara" name="acara" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggal">
                                                                        <h6 class="text-label"><i class="bi bi-calendar-check"></i> Tanggal Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <script>
                                                                                var d = new Date();
                                                                                document.getElementById("tanggal").value = d.toLocaleDateString();
                                                                            </script> -->

                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="waktu">
                                                                        <h6 class="text-label"><i class="bi bi-alarm"></i> Rentang Waktu Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-ID">
                                                                        <h6 class="text-label">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                                                <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                                                            </svg> Bukti Tanda Pengenal <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-ID" name="bukti-ID" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-uang">
                                                                        <h6 class="text-label">
                                                                            <i class="bi bi-receipt-cutoff"></i> Bukti Bayar Uang Muka <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-uang" name="bukti-uang" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Status <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="Pending..." id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Alert data berhasil -->
                                                            <div class="alert alert-success alert-dismissible fade show my-alert d-none" id="btnAlert" role="alert">
                                                                <strong>Terima Kasih!</strong> Data berhasil diinput.
                                                                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <!-- /Alert data berhasil -->
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary btn-submit me-1 mb-1">Submit</button>
                                                                <button class="btn btn-light-primary btn-loading me-1 mb-1 d-none" type="button" disabled>
                                                                    <img src="<?= base_url('assets/'); ?>vendors/svg-loaders/audio.svg" class="me-4" style="width: 1.1rem" alt="audio">
                                                                    <span>Loading...</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-danger btn-reload me-1 mb-1 d-none" onClick="document.location.reload(true)">Masukkan Data Baru</button>
                                                                <script>
                                                                    function reloadpage() {
                                                                        location.reload()
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bi bi-x-circle-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /BPU SAMPANG -->
                                <div class="tab-pane fade" id="list-mess" role="tabpanel" aria-labelledby="list-mess-list">
                                    <div class="row justify-content-center">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div id="carouselMess" class="carousel slide" data-bs-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="0" class="active"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="1"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="2"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="3"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="4"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess1.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess2.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess3.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess4.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess5.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselMess" role="button" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselMess" role="button" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">Mess Pemkab Sampang</h4>
                                                        <!-- Read More -->
                                                        <div id="heading1" data-bs-toggle="collapse" data-bs-target="#collapse-mess" aria-expanded="false" aria-controls="collapse1" role="button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                            </svg>
                                                            <strong>Harga</strong>: Rp 3.000.000
                                                            <p>Kapasitas: 700 orang</p>
                                                            <hr>
                                                            <button class="btn btn-light-success">Lihat Lebih Lanjut...</button>
                                                        </div>
                                                        <div id="collapse-mess" class="collapse pt-1" aria-labelledby="heading1" data-parent="#cardAccordion">
                                                            <p>
                                                                Mess Pemkab Sampang terletak di Surabaya
                                                            </p>
                                                            <p>
                                                                Fasilitas Paket 1
                                                            <table class="table-responsive" style="width:100%">
                                                                <tr>
                                                                    <th>Kursi</th>
                                                                    <th>:</th>
                                                                    <td>400 buah</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sound System</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Toilet</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                            </table>
                                                            <p style="color: red;">Penambahan kursi ....</p>
                                                            </p>
                                                            <p>
                                                                <i class="bi bi-geo-alt"></i> <a href="https://goo.gl/maps/HjuejFa29w1isA8N9"> Jl. Trunojoyo, Rw. V,</a> <br>Kel. Rong Tengah, Kec. Sampang, <br>Kabupaten Sampang, Jawa Timur
                                                                <br><i class="bi bi-mailbox"></i> 69216, Indonesia.
                                                            </p>
                                                            <hr>
                                                            <button type="button" class="btn d-flex btn-success" data-bs-toggle="modal" data-bs-target="#Mess">
                                                                Isi Form Sewa
                                                            </button>
                                                        </div>
                                                        <!-- /Read more -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <div class="row text-center">
                                            <h4>Daftar Penyewa</h4>
                                        </div>
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>TANGGAL</th>
                                                    <th>ACARA</th>
                                                    <th>WAKTU</th>
                                                    <th>ALAMAT PENYEWA</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">2-Juni-2023</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">25-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Wijaya Kusuma</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">30-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Imam Ghozali</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!--scrolling content Modal -->
                                    <div class="modal fade" id="Mess" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-center text-label-header" id="exampleModalScrollableTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="" height="35"> Form Penyewaan Mess Surabaya</h4>
                                                    <p style="color: bisque;"><span style="color: red;"><strong>*</strong></span> Wajib diisi</p>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <!-- <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="nomerRegister"><h6><i class="bi bi-pencil-square"></i> Nomer Register</h6></label>
                                                                                <div class="position-relative">
                                                                                    <input type="number" class="form-control" placeholder="No Register" id="nomerRegister" name="noreg" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="nama">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Nama <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Nama Penyewa --" id="nama" name="nama" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="telepon">
                                                                        <h6 class="text-label"><i class="bi bi-phone"></i> No. HP <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="tel" class="form-control" placeholder="+62 8345xxxxxx" id="telepon" name="telepon" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">
                                                                        <h6 class="text-label"><i class="bi bi-geo-alt"></i> Alamat <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Alamat Penyewa --" id="alamat" name="alamat" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Aset Sewa <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="Mess Surabaya" id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="acara">
                                                                        <h6 class="text-label"><i class="bi bi-hdd-rack"></i> Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Keperluan untuk --" id="acara" name="acara" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggal">
                                                                        <h6 class="text-label"><i class="bi bi-calendar-check"></i> Tanggal Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <script>
                                                                                var d = new Date();
                                                                                document.getElementById("tanggal").value = d.toLocaleDateString();
                                                                            </script> -->

                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="waktu">
                                                                        <h6 class="text-label"><i class="bi bi-alarm"></i> Rentang Waktu Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-ID">
                                                                        <h6 class="text-label">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                                                <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                                                            </svg> Bukti Tanda Pengenal <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-ID" name="bukti-ID" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-uang">
                                                                        <h6 class="text-label">
                                                                            <i class="bi bi-receipt-cutoff"></i> Bukti Bayar Uang Muka <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-uang" name="bukti-uang" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Status <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="Pending..." id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Alert data berhasil -->
                                                            <div class="alert alert-success alert-dismissible fade show my-alert d-none" id="btnAlert" role="alert">
                                                                <strong>Terima Kasih!</strong> Data berhasil diinput.
                                                                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <!-- /Alert data berhasil -->
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary btn-submit me-1 mb-1">Submit</button>
                                                                <button class="btn btn-light-primary btn-loading me-1 mb-1 d-none" type="button" disabled>
                                                                    <img src="<?= base_url('assets/'); ?>vendors/svg-loaders/audio.svg" class="me-4" style="width: 1.1rem" alt="audio">
                                                                    <span>Loading...</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-danger btn-reload me-1 mb-1 d-none" onClick="document.location.reload(true)">Masukkan Data Baru</button>
                                                                <script>
                                                                    function reloadpage() {
                                                                        location.reload()
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bi bi-x-circle-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-bpuKTP" role="tabpanel" aria-labelledby="list-bpuKTP-list">
                                    <div class="row justify-content-center">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div id="carouselMess" class="carousel slide" data-bs-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="0" class="active"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="1"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="2"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="3"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="4"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess3.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess2.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess3.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess4.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess5.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselMess" role="button" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselMess" role="button" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">BPU Kec. Ketapang</h4>
                                                        <!-- Read More -->
                                                        <div id="heading1" data-bs-toggle="collapse" data-bs-target="#collapse-BPU-ktp" aria-expanded="false" aria-controls="collapse1" role="button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                            </svg>
                                                            <strong>Harga</strong>: Rp 3.000.000
                                                            <p>Kapasitas: 700 orang</p>
                                                            <hr>
                                                            <button class="btn btn-light-success">Lihat Lebih Lanjut...</button>
                                                        </div>
                                                        <div id="collapse-BPU-ktp" class="collapse pt-1" aria-labelledby="heading1" data-parent="#cardAccordion">
                                                            <p>
                                                                Mess Pemkab Sampang terletak di Surabaya
                                                            </p>
                                                            <p>
                                                                Fasilitas Paket 1
                                                            <table class="table-responsive" style="width:100%">
                                                                <tr>
                                                                    <th>Kursi</th>
                                                                    <th>:</th>
                                                                    <td>400 buah</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sound System</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Toilet</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                            </table>
                                                            <p style="color: red;">Penambahan kursi ....</p>
                                                            </p>
                                                            <p>
                                                                <i class="bi bi-geo-alt"></i> <a href="https://goo.gl/maps/HjuejFa29w1isA8N9"> Jl. Trunojoyo, Rw. V,</a> <br>Kel. Rong Tengah, Kec. Sampang, <br>Kabupaten Sampang, Jawa Timur
                                                                <br><i class="bi bi-mailbox"></i> 69216, Indonesia.
                                                            </p>
                                                            <hr>
                                                            <button type="button" class="btn d-flex btn-success" data-bs-toggle="modal" data-bs-target="#bpuKTP">
                                                                Isi Form Sewa
                                                            </button>
                                                        </div>
                                                        <!-- /Read more -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <div class="row text-center">
                                            <h4>Daftar Penyewa</h4>
                                        </div>
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>TANGGAL</th>
                                                    <th>ACARA</th>
                                                    <th>WAKTU</th>
                                                    <th>ALAMAT PENYEWA</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">2-Juni-2023</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">25-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Wijaya Kusuma</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">30-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Imam Ghozali</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!--scrolling content Modal -->
                                    <div class="modal fade" id="bpuKTP" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-center text-label-header" id="exampleModalScrollableTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="" height="35"> Form Penyewaan BPU Ketapang</h4>
                                                    <p style="color: bisque;"><span style="color: red;"><strong>*</strong></span> Wajib diisi</p>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <!-- <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="nomerRegister"><h6><i class="bi bi-pencil-square"></i> Nomer Register</h6></label>
                                                                                <div class="position-relative">
                                                                                    <input type="number" class="form-control" placeholder="No Register" id="nomerRegister" name="noreg" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="nama">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Nama <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Nama Penyewa --" id="nama" name="nama" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="telepon">
                                                                        <h6 class="text-label"><i class="bi bi-phone"></i> No. HP <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="tel" class="form-control" placeholder="+62 8345xxxxxx" id="telepon" name="telepon" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">
                                                                        <h6 class="text-label"><i class="bi bi-geo-alt"></i> Alamat <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Alamat Penyewa --" id="alamat" name="alamat" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Aset Sewa <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="BPU Ketapang" id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="acara">
                                                                        <h6 class="text-label"><i class="bi bi-hdd-rack"></i> Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Keperluan untuk --" id="acara" name="acara" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggal">
                                                                        <h6 class="text-label"><i class="bi bi-calendar-check"></i> Tanggal Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <script>
                                                                                var d = new Date();
                                                                                document.getElementById("tanggal").value = d.toLocaleDateString();
                                                                            </script> -->

                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="waktu">
                                                                        <h6 class="text-label"><i class="bi bi-alarm"></i> Rentang Waktu Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-ID">
                                                                        <h6 class="text-label">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                                                <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                                                            </svg> Bukti Tanda Pengenal <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-ID" name="bukti-ID" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-uang">
                                                                        <h6 class="text-label">
                                                                            <i class="bi bi-receipt-cutoff"></i> Bukti Bayar Uang Muka <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-uang" name="bukti-uang" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Status <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="Pending..." id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Alert data berhasil -->
                                                            <div class="alert alert-success alert-dismissible fade show my-alert d-none" id="btnAlert" role="alert">
                                                                <strong>Terima Kasih!</strong> Data berhasil diinput.
                                                                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <!-- /Alert data berhasil -->
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary btn-submit me-1 mb-1">Submit</button>
                                                                <button class="btn btn-light-primary btn-loading me-1 mb-1 d-none" type="button" disabled>
                                                                    <img src="<?= base_url('assets/'); ?>vendors/svg-loaders/audio.svg" class="me-4" style="width: 1.1rem" alt="audio">
                                                                    <span>Loading...</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-danger btn-reload me-1 mb-1 d-none" onClick="document.location.reload(true)">Masukkan Data Baru</button>
                                                                <script>
                                                                    function reloadpage() {
                                                                        location.reload()
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bi bi-x-circle-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-pesanggrahan" role="tabpanel" aria-labelledby="list-pesanggrahan-list">
                                    <div class="row justify-content-center">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div id="carouselMess" class="carousel slide" data-bs-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="0" class="active"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="1"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="2"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="3"></li>
                                                            <li data-bs-target="#carouselMess" data-bs-slide-to="4"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess4.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess2.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess3.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess1.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?= base_url('assets/'); ?>images/lasada/mess/Mess5.jpg" class="d-block w-100" alt="Mess" style="height: 20rem">
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselMess" role="button" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselMess" role="button" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">Pesanggrahan Kec. Ketapang</h4>
                                                        <!-- Read More -->
                                                        <div id="heading1" data-bs-toggle="collapse" data-bs-target="#collapse-pesanggrahan" aria-expanded="false" aria-controls="collapse1" role="button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                            </svg>
                                                            <strong>Harga</strong>: Rp 3.000.000
                                                            <p>Kapasitas: 700 orang</p>
                                                            <hr>
                                                            <button class="btn btn-light-success">Lihat Lebih Lanjut...</button>
                                                        </div>
                                                        <div id="collapse-pesanggrahan" class="collapse pt-1" aria-labelledby="heading1" data-parent="#cardAccordion">
                                                            <p>
                                                                Mess Pemkab Sampang terletak di Surabaya
                                                            </p>
                                                            <p>
                                                                Fasilitas Paket 1
                                                            <table class="table-responsive" style="width:100%">
                                                                <tr>
                                                                    <th>Kursi</th>
                                                                    <th>:</th>
                                                                    <td>400 buah</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sound System</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Toilet</th>
                                                                    <th>:</th>
                                                                    <td>ready</td>
                                                                </tr>
                                                            </table>
                                                            <p style="color: red;">Penambahan kursi ....</p>
                                                            </p>
                                                            <p>
                                                                <i class="bi bi-geo-alt"></i> <a href="https://goo.gl/maps/HjuejFa29w1isA8N9"> Jl. Trunojoyo, Rw. V,</a> <br>Kel. Rong Tengah, Kec. Sampang, <br>Kabupaten Sampang, Jawa Timur
                                                                <br><i class="bi bi-mailbox"></i> 69216, Indonesia.
                                                            </p>
                                                            <hr>
                                                            <button type="button" class="btn d-flex btn-success" data-bs-toggle="modal" data-bs-target="#pesanggrahan">
                                                                Isi Form Sewa
                                                            </button>
                                                        </div>
                                                        <!-- /Read more -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <div class="row text-center">
                                            <h4>Daftar Penyewa</h4>
                                        </div>
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>TANGGAL</th>
                                                    <th>ACARA</th>
                                                    <th>WAKTU</th>
                                                    <th>ALAMAT PENYEWA</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">2-Juni-2023</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">25-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Wijaya Kusuma</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">30-Agust-2023</td>
                                                    <td>Pernikahan</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Imam Ghozali</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-warning">Pending...</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2-Feb-2024</td>
                                                    <td>Wisuda</td>
                                                    <td>08:00 - 15:00</td>
                                                    <td class="text-bold-500">Jl. Bahagia</td>
                                                    <td><span class="badge bg-light-success">Disetujui</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!--scrolling content Modal -->
                                    <div class="modal fade" id="pesanggrahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-center text-label-header" id="exampleModalScrollableTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="" height="35"> Form Penyewaan Pesanggrahan</h4>
                                                    <p style="color: bisque;"><span style="color: red;"><strong>*</strong></span> Wajib diisi</p>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <!-- <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="nomerRegister"><h6><i class="bi bi-pencil-square"></i> Nomer Register</h6></label>
                                                                                <div class="position-relative">
                                                                                    <input type="number" class="form-control" placeholder="No Register" id="nomerRegister" name="noreg" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="nama">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Nama <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Nama Penyewa --" id="nama" name="nama" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="telepon">
                                                                        <h6 class="text-label"><i class="bi bi-phone"></i> No. HP <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="tel" class="form-control" placeholder="+62 8345xxxxxx" id="telepon" name="telepon" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">
                                                                        <h6 class="text-label"><i class="bi bi-geo-alt"></i> Alamat <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Alamat Penyewa --" id="alamat" name="alamat" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Aset Sewa <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="Pesanggrahan Ketapang" id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="acara">
                                                                        <h6 class="text-label"><i class="bi bi-hdd-rack"></i> Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="-- Keperluan untuk --" id="acara" name="acara" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggal">
                                                                        <h6 class="text-label"><i class="bi bi-calendar-check"></i> Tanggal Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="date" class="form-control" id="tanggal-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <script>
                                                                                var d = new Date();
                                                                                document.getElementById("tanggal").value = d.toLocaleDateString();
                                                                            </script> -->

                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="waktu">
                                                                        <h6 class="text-label"><i class="bi bi-alarm"></i> Rentang Waktu Acara <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-awal" name="waktu-awal" required>
                                                                            </div>
                                                                            <div class="col-md-2" style="color: azure;">sampai</div>
                                                                            <div class="col-md-5">
                                                                                <input type="time" class="form-control" id="waktu-akhir" name="waktu-akhir" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-ID">
                                                                        <h6 class="text-label">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                                                <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                                                            </svg> Bukti Tanda Pengenal <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-ID" name="bukti-ID" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="bukti-uang">
                                                                        <h6 class="text-label">
                                                                            <i class="bi bi-receipt-cutoff"></i> Bukti Bayar Uang Muka <span style="color: red;">*</span>
                                                                        </h6>
                                                                    </label>
                                                                    <div class="position-relative">
                                                                        <input type="file" class="form-control" id="bukti-uang" name="bukti-uang" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="aset" class="d-none">
                                                                        <h6 class="text-label"><i class="bi bi-person"></i> Status <span style="color: red;">*</span></h6>
                                                                    </label>
                                                                    <div class="position-relative d-none">
                                                                        <input type="text" class="form-control" value="Pending..." id="aset" name="aset" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Alert data berhasil -->
                                                            <div class="alert alert-success alert-dismissible fade show my-alert d-none" id="btnAlert" role="alert">
                                                                <strong>Terima Kasih!</strong> Data berhasil diinput.
                                                                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <!-- /Alert data berhasil -->
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary btn-submit me-1 mb-1">Submit</button>
                                                                <button class="btn btn-light-primary btn-loading me-1 mb-1 d-none" type="button" disabled>
                                                                    <img src="<?= base_url('assets/'); ?>vendors/svg-loaders/audio.svg" class="me-4" style="width: 1.1rem" alt="audio">
                                                                    <span>Loading...</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-danger btn-reload me-1 mb-1 d-none" onClick="document.location.reload(true)">Masukkan Data Baru</button>
                                                                <script>
                                                                    function reloadpage() {
                                                                        location.reload()
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bi bi-x-circle-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="<?= base_url('assets/'); ?>images/master/man.svg" alt="Face 2">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Hallo,</h5>
                                <h6 class="text-muted mb-0">Jangan Lupa Bahagia</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Ada kesulitan dalam menyewa?</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="<?= base_url('assets/'); ?>images/faces/question.svg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Bingung harus bertanya kepada siapa?</h5>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="name ms-4">
                                <h5 class="mb-1">Tenang, <strong>Klik</strong> saja tombol di bawah ini</h5>
                            </div>
                        </div>
                        <div class="px-4">
                            <a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Hallo,+Admin.&app_absent=0" class="btn btn-block btn-xl btn-outline-primary font-bold mt-3 ">Admin</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>