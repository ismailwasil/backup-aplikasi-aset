<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>images/favicon/Trunojoyo.ico" />
    <title>
        <?= $title; ?>
    </title>
    <style>
        /* Agar border muncul saat print */
        @media print {
            @page {
                size: A4 portrait;
                /* Tetap A4 Portrait */
                margin: 0;
                /* biar border tidak kepotong */
            }

            .invoice {
                width: 210mm;
                /* Lebar A4 */
                height: 148.5mm;
                /* Setengah dari A4 */
                border: 5px dotted black;
                margin: auto;
                /* posisikan di tengah */
                background: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        /* @page {
            size: A5 landscape;
            margin: 0;
        } */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #9e9e9eff;
        }

        .invoice {
            width: 100%;
            max-width: 210mm;
            /* Lebar A5 landscape */
            height: 148mm;
            box-sizing: border-box;
            padding: 12mm;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: white;
            border: 1px dotted #b3b3b3ff;
        }

        /* Kop surat */
        .kop {
            text-align: center;
            position: relative;
        }

        .kop img.logo {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
        }

        .kop h1 {
            font-size: 14pt;
            font-weight: normal;
            margin: 0;
        }

        .kop h2 {
            font-size: 14pt;
            margin: 0;
            font-weight: bold;
        }

        .kop p {
            margin: 0;
            font-size: 9.5pt;
        }

        .garis-kop {
            border-top: #000408 6px double;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            margin-bottom: 1em;
        }

        /* Judul */
        .judul {
            font-weight: bold;
            text-align: center;
            margin-bottom: 4px;
            font-size: 1em;
            text-decoration: underline;
        }

        /* Rincian */
        .rincian {
            display: flex;
            align-items: flex-start;
            margin-top: 5px;
        }

        .qr {
            width: 20%;
            flex-shrink: 0;
        }

        .qr img {
            width: 100%;
        }

        .tabel-rincian {
            width: 100%;
            border-collapse: collapse;
            margin-left: 10px;
            font-size: 1em;
        }

        .tabel-rincian th {
            background-color: #163B6C;
            color: white;
            text-align: left;
            padding: 4px 6px;
            font-weight: bold;
            font-size: 10pt;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .tabel-rincian td {
            padding: 3px 6px;
            vertical-align: top;
        }

        /* Nominal */
        .nominal {
            margin-top: 2px;
            display: flex;
            justify-content: flex-end;
            font-size: 1.5em;
            border-top: #163B6C 5px solid;
        }

        .nominal-label {
            /* background: #163B6C; */
            /* color: white; */
            padding: 4px 10px;
            font-size: .8em;
        }

        .nominal-value {
            background-color: #163B6C;
            color: white;
            padding: 4px 12px;
            font-weight: bold;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        /* Footer */
        .footer {
            margin-top: 2px;
            font-size: 9.5pt;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            font-weight: bold;
            color: #163B6C;
        }

        .status {
            border: 2px solid #ac0202;
            color: #ac0202;
            font-weight: bold;
            padding: 4px 15px;
            font-size: 14pt;
            margin-top: 6px;
            text-align: center;
        }
    </style>
</head>

<body id="page_SPM" onload="window.print();">
    <?php
    function ubahFormatTanggal($tanggal, $formatTujuan = 'Y-m-d')
    {
        // Coba deteksi pemisah (bisa / atau -)
        $pemisah = strpos($tanggal, '/') !== false ? '/' : '-';

        // Pecah tanggal
        $bagian = explode($pemisah, $tanggal);

        // Deteksi apakah input dd/mm/yyyy atau yyyy-mm-dd
        if (strlen($bagian[0]) == 4) {
            // Format yyyy-mm-dd
            $obj = DateTime::createFromFormat('Y' . $pemisah . 'm' . $pemisah . 'd', $tanggal);
        } else {
            // Format dd/mm/yyyy
            $obj = DateTime::createFromFormat('d' . $pemisah . 'm' . $pemisah . 'Y', $tanggal);
        }

        return $obj ? $obj->format($formatTujuan) : null;
    }
    function formatTanggalIndonesia($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $obj = DateTime::createFromFormat('Y-m-d', $tanggal);
        $hari = (int)$obj->format('j'); // tanpa nol depan
        $bulanIndex = (int)$obj->format('n'); // 1-12
        $tahun = $obj->format('Y');

        return $hari . ' ' . $bulan[$bulanIndex] . ' ' . $tahun;
    }
    ?>

    <div class="invoice">
        <!-- KOP -->
        <div>
            <div class="kop">
                <img src="<?= base_url('assets/') ?>images/logo/Sampang.svg" class="logo" alt="Logo">
                <h1>PEMERINTAH KABUPATEN SAMPANG</h1>
                <h2>BADAN PENDAPATAN, PENGELOLAAN KEUANGAN<br>DAN ASET DAERAH</h2>
                <p>Jalan Rajawali 04 Sampang (69213) ; Telp. (0323) 321024 Fax. (0323) 325371</p>
                <p>Website: https://sampangkab.go.id/bppkad Email: bppkad@sampangkab.go.id</p>
            </div>
            <div class="garis-kop"></div>

            <!-- Judul -->
            <div class="judul">TANDA BUKTI PEMBAYARAN</div>

            <!-- Rincian -->
            <div class="rincian">
                <div class="qr">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= base_url('auth/dokumen_bayar/') . $bayar['id_bb'] ?>" width="20%" alt="QR Code">
                </div>
                <table class="tabel-rincian">
                    <tr>
                        <th colspan="3" style="text-align: center; font-size: 1.2em;">RINCIAN</th>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $bayar['nama_bb'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $bayar['alamat_bb'] . ", " . $bayar['kelurahan_bb'] . ", " . $bayar['kecamatan_bb']  ?></td>
                    </tr>
                    <tr>
                        <td>Berita</td>
                        <td>:</td>
                        <td><?= $bayar['berita_bb'] ?></td>
                    </tr>
                    <tr>
                        <td>Periode</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($bayar['periode_awal'] == $bayar['periode_akhir']) {
                                echo formatTanggalIndonesia($bayar['periode_awal']);
                            } else {
                                echo formatTanggalIndonesia($bayar['periode_awal']) . " - " . formatTanggalIndonesia($bayar['periode_akhir']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Terbilang</td>
                        <td>:</td>
                        <td><?= $bayar['terbilang_bb'] ?></td>
                    </tr>
                </table>
            </div>

            <!-- Nominal -->
            <div class="nominal">
                <div class="nominal-label">Nominal</div>
                <div class="nominal-value">Rp <?= number_format($bayar['nominal_bb'], 2, ".", ",") ?></div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div>Lembar ini adalah bukti pembayaran yang sah</div>
            <div style="text-align:right; font-size: 1.2em;">
                Sampang, <?= ubahFormatTanggal($bayar['tanggal_bb'], 'd-m-Y') ?><br>
                <div class="status">LUNAS</div>
            </div>
        </div>
    </div>
</body>

</html>