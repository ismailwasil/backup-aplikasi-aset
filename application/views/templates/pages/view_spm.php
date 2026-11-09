<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=794, user-scalable=yes">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>images/favicon/Trunojoyo.ico" />
    <title>
        <?= $title; ?>
    </title>
    <style>
        html {
            -webkit-text-size-adjust: 100%;
            text-size-adjust: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            min-width: 210mm;
            margin: 0;
            background: #9e9e9eff;
        }

        /* Lembar kertas (sama seperti dokumen_bayar) */
        .sheet {
            width: 210mm;
            max-width: 210mm;
            box-sizing: border-box;
            padding: 12mm;
            margin: 0 auto;
            background: white;
            border: 1px dotted #b3b3b3ff;
        }

        .sheet+.sheet {
            margin: 10mm auto 0;
        }

        @media print {

            /* Ukuran kertas TIDAK dipaksa: ikut pilihan di dialog cetak (A4 atau F4) */
            @page {
                margin: 5mm;
            }

            html,
            body {
                background: none;
                min-width: 0;
                margin: 0;
            }

            /* Halaman dibagi dua bagian sama tinggi, mengikuti tinggi kertas yang dipilih */
            #page_SPM {
                display: flex;
                flex-direction: column;
                width: auto;
                height: auto;
                min-height: 98vh;
            }

            .sheet {
                flex: 1 1 auto;
                width: auto;
                max-width: none;
                box-sizing: border-box;
                padding: 2mm 0 0;
                margin: 0;
                border: none;
                background: none;
                page-break-inside: avoid;
                break-inside: avoid;
            }

            /* garis potong di tengah kertas */
            .sheet+.sheet {
                margin: 0;
                border-top: 1px dashed #000;
            }

            /* Skala isi agar satu salinan muat di setengah kertas A4 (paling kecil).
               Naikkan/turunkan angka ini bila perlu: 0.80 - 0.90 */
            .sheet>table {
                zoom: 0.82;
            }

            .qr_code {
                width: 35mm;
            }
        }
    </style>
</head>

<body id="page_SPM" onload="window.print();">
    <?php for ($salinan = 1; $salinan <= 2; $salinan++) : ?>
        <div class="sheet">
            <!-- <body onload="window.print();"> -->
            <table width="100%">
                <td style="padding: 10px; border:3px double black;">
                    <table width="100%">
                        <?php
                        $lebar = 78;
                        $sempit = 100 - $lebar;
                        ?>
                        <tr>
                            <th rowspan="5" width="<?= $sempit; ?>%"><img src="<?= base_url('assets/') ?>images/logo/Sampang.png" width="50%"></th>
                            <th style="text-align: right; text-decoration: underline;" width="<?= $lebar; ?>%"><?= $SPM['reg'] . " / ASET / " . date('m / Y') ?></th>
                        </tr>
                        <tr style="padding: 5px;">
                            <th style="text-align: center;" width="<?= $lebar; ?>%"><strong class="strong">PEMERINTAH KABUPATEN
                                    SAMPANG</strong></th>
                        </tr>
                        <tr style="padding: 5px;">
                            <th style="text-align: center;" width="<?= $lebar; ?>%"><strong class="strong">BADAN PENDAPATAN, PENGELOLAAN
                                    KEUANGAN DAN ASET DAERAH</strong></th>
                        </tr>
                        <tr style="padding: 5px;">
                            <th style="text-align: center;" width="<?= $lebar; ?>%">Jl. Rajawali No. 04 Telp. (0323) 321024 Fax.
                                (0323) 325371</th>
                        </tr>
                        <tr style="padding: 5px;">
                            <th style="text-align: center;" width="<?= $lebar; ?>%">SAMPANG 69213</th>
                        </tr>
                    </table>
                    <strong>
                        <hr style="border:3px double black;">
                    </strong>
                    <font face="Arial" color="black">
                        <p align="center">
                            <strong>LEMBAR VERIFIKASI SPM BIDANG PENGELOLAAN ASET</strong>
                        </p>
                        <table width="100%" style="border:3px solid black; text-align: left">
                            <tr>
                                <th style="padding: 20px;" colspan="2">
                                    Telah melakukan Inventarisir dengan rincian:
                                </th>
                            </tr>
                            <tr>
                                <th width="24%" style="padding: 10px;">SKPD</th>
                                <td width="76%">: <?= $SPM['name'] ?></td>
                            </tr>
                            <tr>
                                <th width="24%" style="padding: 10px;">NO. SPM</th>
                                <td width="76%">: <?= $SPM['no_spm'] ?></td>
                            </tr>
                            <tr>
                                <th width="24%" style="padding: 10px;">JENIS SPM</th>
                                <td width="76%">: <?= $SPM['jenis'] ?></td>
                            </tr>
                        </table>
                        <br>
                        <table width="100%" style="border:3px solid black;">
                            <tr>
                                <th style=" padding: 15px; text-align: left;" width="30%" colspan="2">Informasi Verifikasi
                                    Berkas:</th>
                                <th style="text-align: center; border:3px solid black;" width="20%" rowspan="4">
                                    <!-- <img src="https://chart.googleapis.com/chart?cht=qr&chs=230x230&chl=<?= base_url('SPM/index/' . $SPM['id']) ?>" title="Dokumen Verifikasi" /> -->
                                    <img class="qr_code" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= base_url('SPM/document/' . $SPM['id_masuk_spm']) ?>" alt="QR Code <?= $SPM['id'] ?>" title="Dokumen Verifikasi" />
                                </th>
                            </tr>
                            <tr>
                                <th style="padding: 5px; text-align: left;" width="30%">JUMLAH SPP DIMINTA</th>
                                <td style="padding: 5px; text-align: left;" width="50%">: <?= "Rp " . ($SPM['total_spm'] == NULL ? "" : number_format($SPM['total_spm'], 2, ',', '.')); ?></td>
                            </tr>
                            <tr>
                                <?php
                                $bulan = array(
                                    1 =>   'Januari',
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
                                );
                                ?>
                                <th style="padding: 5px; text-align: left;" width="30%">TANGGAL VERIFIKASI</th>
                                <td style="padding: 5px; text-align: left;" width="50%">:
                                    <?= date('d', strtotime($SPM['tgl_verif'])) . ' ' . $bulan[date('n', strtotime($SPM['tgl_verif']))] . ' ' . date('Y', strtotime($SPM['tgl_verif'])) ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; text-align: left;" width="30%">VERIFIKATOR</th>
                                <td style="padding: 5px; text-align: left;" width="50%">: <?= $SPM['verifikator'] ?></td>
                            </tr>
                        </table>
                    </font>
                    <?php
                    // Set the new timezone
                    date_default_timezone_set('Asia/Jakarta');
                    $date = date('l, d/m/y H:i:s');
                    ?>
                    <small style="float: left;">Versi_Barada_E_Version3_2025_loaded_on: <i><?= $date; ?> </i>from <i>aset.sampangkab.go.id</i></small>
                </td>
            </table>
        </div>
    <?php endfor; ?>
</body>

</html>
