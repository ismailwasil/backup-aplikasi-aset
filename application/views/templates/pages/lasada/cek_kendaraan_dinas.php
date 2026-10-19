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
        <!-- masukkan data ke localStorage -->
        <script src="<?= base_url('assets/'); ?>js/BPKBLocalStorage.js"></script>
        <!-- /masukkan data ke localStorage -->
        <!--Cek KDO-->
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-6 col-12">
                <style>
                    .bgText {
                        /* position: relative; */
                        animation: bgText linear 1.3s infinite;
                    }

                    @keyframes bgText {
                        0% {
                            background: linear-gradient(0deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        12.5% {
                            background: linear-gradient(51deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        25% {
                            background: linear-gradient(102deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        37.5% {
                            background: linear-gradient(154deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        50% {
                            background: linear-gradient(205deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        62.5% {
                            background: linear-gradient(257deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        75% {
                            background: linear-gradient(308deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        87.5% {
                            background: linear-gradient(320deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }

                        100% {
                            background: linear-gradient(360deg, #56d8e4 20%, #9f01ea 90%);
                            width: 100%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }
                    }

                    .pesanError {
                        background: linear-gradient(115deg, #9f01ea 30%, #56a4e4 70%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        position: relative;
                        display: inline-block;
                    }

                    .pesanError::after {
                        content: '';
                        position: absolute;
                        left: 0;
                        bottom: -5px;
                        /* Jarak dari teks */
                        width: 100%;
                        height: 5px;
                        /* Ketebalan garis */
                        background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                        /* Warna garis */
                        animation: mymove ease-in-out 1.3s infinite;
                    }

                    @keyframes mymove {
                        0% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 0%;
                        }

                        12.5% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 25%;
                        }

                        25% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 50%;
                        }

                        37.5% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 75%;
                        }

                        50% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 100%;
                        }

                        62.5% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 75%;
                        }

                        75% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 50%;
                        }

                        87.5% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 25%;
                        }

                        100% {
                            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                            width: 0%;
                        }
                    }

                    .neumorphism {
                        padding-top: 5px;
                        color: #fc007e;
                        background-color: #e5e9f6;
                        border-radius: 20px;
                        box-shadow: inset 5px 5px 7px #d5d9e5,
                            inset -5px -5px 7px #f5f9ff;
                        caret-color: #fc007e;
                    }

                    .neumorphism:focus {
                        border: none;
                        background-color: #e5e9f6;
                        box-shadow: 5px 5px 7px #d5d9e5,
                            -5px -5px 7px #f5f9ff;
                    }

                    #cariBPKB {
                        border-radius: 50px;
                        color: #ffffff;
                        background: #0076fc;
                        box-shadow: 5px 5px 7px #d5d9e5,
                            -5px -5px 7px #f5f9ff;
                    }

                    #cariBPKB:hover {
                        box-shadow: inset 5px 5px 7px #006eea,
                            inset -5px -5px 7px #007eff;
                    }

                    #cariBPKB:active {
                        color: yellow;
                        transform: rotate(20deg);
                        font-weight: bold;
                        font-size: 1em;
                        background: #2a00fc;
                        box-shadow: inset 5px 5px 7px #2700ea,
                            inset -5px -5px 7px #2d00ff;
                    }

                    #tabelHasil {
                        border-collapse: collapse;
                        width: 100%;
                        font-size: 12px;
                    }

                    #tabelHasil caption {
                        text-align: center;
                        caption-side: top;
                        font-size: 30 px;
                        font-weight: 600;
                        font-family: "Poppins", sans-serif;
                        background: -webkit-linear-gradient(right,
                                #56d8e4,
                                #9f01ea,
                                #56d8e4,
                                #9f01ea);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                    }

                    #tabelHasil th,
                    td {
                        text-align: left;
                        padding: 8px;
                    }

                    #tabelHasil td {
                        border: 1px solid #ddd;
                    }

                    #tabelHasil tr:nth-child(even) {
                        background-color: #f2f2f2
                    }

                    #tabelHasil th {
                        background: linear-gradient(115deg, #9f01ea 10%, #56d8e4 90%);
                        color: white;
                    }

                    #tabelHasil th .lebar20 {
                        width: 20%;
                    }
                </style>
                <div class="card">
                    <div class="card-header">
                        <h4>Cek Kendaraan Dinas</h4>
                    </div>
                    <div class="card-body">
                        <form id="myFormBPKB" onsubmit="searchBPKB(); return false;">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="berdasar">
                                        <h6 class="text-label"><i class="fa fa-fw fa-id-card-o"></i> Cari Berdasarkan
                                            <span style="color: red;">*</span>
                                        </h6>
                                    </label>
                                    <div class="position-relative">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select id="berdasar" name="berdasar" class="form-select neumorphism">
                                                    <option value="Nopol">Nopol</option>
                                                    <option value="Nosin">Nomor Mesin</option>
                                                    <option value="Norangka">Nomor Rangka</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control neumorphism" placeholder="Masukkan Nopol ..." id="kataKunci" name="kataKunci" required autocomplete="off">
                                                <!-- Dropdown suggestions -->
                                                <div id="dropdownHasilCari" class="list-group position-absolute w-100 shadow-sm" style="z-index: 999; max-height: 550%; max-width: 80%; overflow-y: auto; display:none;">
                                                </div>
                                            </div>
                                            <script>
                                                document.getElementById("berdasar").addEventListener("change", function() {
                                                    var selectedOption = this.options[this.selectedIndex].value;
                                                    if (selectedOption == "Nopol") {
                                                        var isi = "Nopol";
                                                    } else if (selectedOption == "Nosin") {
                                                        var isi = "Nomor Mesin";
                                                    } else {
                                                        var isi = "Nomor Rangka";
                                                    }
                                                    document.getElementById("kataKunci").placeholder = "Masukkan " +
                                                        isi + " ...";
                                                });

                                                // Ambil data dari localStorage
                                                function getDataBpkb() {
                                                    return JSON.parse(localStorage.getItem("dataBpkb")) || [];
                                                }

                                                const selectBerdasar = document.getElementById("berdasar");
                                                const inputCari = document.getElementById("kataKunci");
                                                const dropdown = document.getElementById("dropdownHasilCari");

                                                // Ubah placeholder saat pilihan select berubah
                                                selectBerdasar.addEventListener("change", () => {
                                                    let p = selectBerdasar.value;

                                                    if (p === "Nopol") inputCari.placeholder = "Masukkan Nopol ...";
                                                    if (p === "Nosin") inputCari.placeholder = "Masukkan Nomor Mesin ...";
                                                    if (p === "Norangka") inputCari.placeholder = "Masukkan Nomor Rangka ...";

                                                    inputCari.value = "";
                                                    dropdown.style.display = "none";
                                                });

                                                // Event mengetik
                                                inputCari.addEventListener("input", function() {
                                                    const keyword = this.value.trim().toLowerCase();
                                                    const data = getDataBpkb();

                                                    dropdown.innerHTML = "";

                                                    if (keyword === "") {
                                                        dropdown.style.display = "none";
                                                        return;
                                                    }

                                                    let kolom = "";
                                                    if (selectBerdasar.value === "Nopol") kolom = "no_pol";
                                                    if (selectBerdasar.value === "Nosin") kolom = "no_mesin";
                                                    if (selectBerdasar.value === "Norangka") kolom = "no_rangka";

                                                    // Filter data berdasarkan kolom pilihan
                                                    const hasil = data.filter(item =>
                                                        item[kolom]?.toLowerCase().includes(keyword)
                                                    );

                                                    if (hasil.length === 0) {
                                                        dropdown.style.display = "none";
                                                        return;
                                                    }

                                                    // Tampilkan hasil
                                                    hasil.forEach(item => {
                                                        const div = document.createElement("div");
                                                        div.classList.add("list-group-item", "list-group-item-action");
                                                        div.style.cursor = "pointer";
                                                        div.textContent = item[kolom];

                                                        // Klik → isi input
                                                        div.addEventListener("click", function() {
                                                            inputCari.value = item[kolom];
                                                            dropdown.style.display = "none";
                                                        });

                                                        dropdown.appendChild(div);
                                                    });

                                                    dropdown.style.display = "block";
                                                });

                                                // Klik di luar → tutup dropdown
                                                document.addEventListener("click", function(e) {
                                                    if (!dropdown.contains(e.target) && e.target !== inputCari) {
                                                        dropdown.style.display = "none";
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn" id="cariBPKB">
                                    <span><i class="fa fa-fw fa-search"></i> Cari</span>
                                </button>
                                <button type="button" class="btn btn-info d-none" id="loading" style="border-radius: 20px;" disabled>
                                    <span><i class="fa fa-spin fa-fw fa-spinner"></i> Loading</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="tempatHasil" class="card-footer" style="overflow-x:auto;">
                        <table id="tabelHasil">
                            <!-- <caption class="bgText">
                                <h5 class="pesanError">Hasil Pencarian</h5>
                            </caption>
                            <tbody id="isiHasil"></tbody> -->
                        </table>
                    </div>
                </div>
                <script>
                    // Hasil Pencarian
                    document.getElementById("cariBPKB").addEventListener("click", function(e) {
                        e.preventDefault();

                        const keyword = document.getElementById("kataKunci").value.trim().toLowerCase();
                        const berdasarkan = document.getElementById("berdasar").value;
                        const data = getDataBpkb();

                        if (keyword === "") {
                            alert("Masukkan kata kunci dahulu!");
                            return;
                        }

                        // Tentukan kolom yang dipakai
                        let kolom = "";
                        if (berdasarkan === "Nopol") kolom = "no_pol";
                        if (berdasarkan === "Nosin") kolom = "no_mesin";
                        if (berdasarkan === "Norangka") kolom = "no_rangka";

                        // Cari data yang cocok (exact match lebih baik)
                        const hasil = data.find(item => item[kolom]?.toLowerCase() === keyword);

                        if (!hasil) {
                            document.getElementById("tabelHasil").innerHTML = `
                                                            <tr><td colspan="3"><strong>Tidak ada hasil ditemukan...</strong></td></tr>
                                                        `;
                            return;
                        }

                        // Masukkan hasil ke tabel
                        document.getElementById("tabelHasil").innerHTML = `
                                                    <caption class="bgText">
                                                        <h5 class="pesanError">Hasil Pencarian</h5>
                                                    </caption>
                                                    <tbody id="isiHasil">
                                                        <tr>
                                                            <th class="lebar20">SKPD</th>
                                                            <td colspan="2">${hasil.skpd}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="lebar20">Spek Kendaraan</th>
                                                            <td>${hasil.spesifikasi}</td>
                                                            <th>${hasil.nama_barang}</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="lebar20">Nopol</th>
                                                            <td>${hasil.no_pol}</td>
                                                            <td>No. Urut ${hasil.nibar}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="lebar20">No. Mesin</th>
                                                            <td>${hasil.no_mesin}</td>
                                                            <td>No. Urut BI ${hasil.no_urut_bi}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="lebar20">No. Rangka</th>
                                                            <td colspan="2">${hasil.no_rangka}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="lebar20">No. BPKB</th>
                                                            <td>${hasil.no_bpkb}</td>
                                                            <th>jatuh tempo pada ${hasil.tanggal_jatuh_tempo}</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="lebar20">Pemegang</th>
                                                            <td>${hasil.nama_pemakai}</td>
                                                            <td>(sebagai: ${hasil.jabatan_pemakai})</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="lebar20">Lokasi</th>
                                                            <td colspan="2">${hasil.lokasi_barang}</td>
                                                        </tr>
                                                    </tbody>
                                                    `;
                    });
                    // Hasil Pencarian
                </script>
            </div>
        </div>

        <!--/Cek KDO-->
    </section>
</div>