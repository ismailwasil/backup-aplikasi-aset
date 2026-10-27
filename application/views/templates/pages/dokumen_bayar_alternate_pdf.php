<?php
// Dirender menjadi PDF oleh Dompdf (Auth::dokumen_bayar) - layout memakai tabel, bukan flexbox.
function ubahFormatTanggal($tanggal, $formatTujuan = 'Y-m-d')
{
    $pemisah = strpos($tanggal, '/') !== false ? '/' : '-';
    $bagian = explode($pemisah, $tanggal);
    if (strlen($bagian[0]) == 4) {
        $obj = DateTime::createFromFormat('Y' . $pemisah . 'm' . $pemisah . 'd', $tanggal);
    } else {
        $obj = DateTime::createFromFormat('d' . $pemisah . 'm' . $pemisah . 'Y', $tanggal);
    }
    return $obj ? $obj->format($formatTujuan) : '';
}
function formatTanggalIndonesia($tanggal)
{
    $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $obj = DateTime::createFromFormat('Y-m-d', $tanggal);
    if (!$obj) return html_escape($tanggal);
    return (int) $obj->format('j') . ' ' . $bulan[(int) $obj->format('n')] . ' ' . $obj->format('Y');
}
$e = function ($v) {
    return html_escape((string) $v);
};
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $e($title) ?></title>
    <style>
        @page { margin: 10mm; }
        body { font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color: #000; }
        .invoice { border: 2px dotted #000; padding: 14px; }
        .kop h1 { font-size: 14pt; font-weight: normal; margin: 0; text-align: center; }
        .kop h2 { font-size: 14pt; font-weight: bold; margin: 0; text-align: center; }
        .kop p { margin: 0; font-size: 9pt; text-align: center; }
        .garis-kop { border-top: 6px double #000408; margin: 8px 0 12px 0; }
        .judul { font-weight: bold; text-align: center; font-size: 11pt; text-decoration: underline; margin-bottom: 8px; }
        .tabel-rincian { width: 100%; border-collapse: collapse; }
        .tabel-rincian th { background-color: #163B6C; color: #fff; text-align: center; padding: 4px 6px; font-size: 10pt; }
        .tabel-rincian td { padding: 3px 6px; vertical-align: top; }
        .nominal { border-top: 5px solid #163B6C; margin-top: 6px; }
        .nominal-label { padding: 4px 10px; font-size: 11pt; }
        .nominal-value { background-color: #163B6C; color: #fff; padding: 4px 12px; font-weight: bold; font-size: 15pt; }
        .footer td { font-size: 9.5pt; font-weight: bold; color: #163B6C; vertical-align: top; }
        .status { border: 2px solid #ac0202; color: #ac0202; font-weight: bold; padding: 4px 15px; font-size: 14pt; margin-top: 6px; text-align: center; }
    </style>
</head>

<body>
    <div class="invoice">
        <!-- KOP -->
        <table width="100%" class="kop">
            <tr>
                <td width="12%" valign="middle"><?php if (!empty($logo)) : ?><img src="<?= $logo ?>" width="62"><?php endif; ?></td>
                <td>
                    <h1>PEMERINTAH KABUPATEN SAMPANG</h1>
                    <h2>BADAN PENDAPATAN, PENGELOLAAN KEUANGAN<br>DAN ASET DAERAH</h2>
                    <p>Jalan Rajawali 04 Sampang (69213) ; Telp. (0323) 321024 Fax. (0323) 325371</p>
                    <p>Website: https://sampangkab.go.id/bppkad Email: bppkad@sampangkab.go.id</p>
                </td>
                <td width="12%"></td>
            </tr>
        </table>
        <div class="garis-kop"></div>

        <div class="judul">TANDA BUKTI PEMBAYARAN</div>

        <!-- RINCIAN -->
        <table width="100%">
            <tr>
                <td width="20%" valign="top"><?php if (!empty($qr)) : ?><img src="<?= $qr ?>" width="100"><?php endif; ?></td>
                <td valign="top">
                    <table class="tabel-rincian">
                        <tr>
                            <th colspan="3">RINCIAN</th>
                        </tr>
                        <tr>
                            <td width="16%">Nama</td>
                            <td width="2%">:</td>
                            <td><?= $e($bayar['nama_bb']) ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $e($bayar['alamat_bb'] . ", " . $bayar['kelurahan_bb'] . ", " . $bayar['kecamatan_bb']) ?></td>
                        </tr>
                        <tr>
                            <td>Berita</td>
                            <td>:</td>
                            <td><?= $e($bayar['berita_bb']) ?></td>
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
                            <td><?= $e($bayar['terbilang_bb']) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- NOMINAL -->
        <table width="100%" class="nominal">
            <tr>
                <td align="right">
                    <table align="right">
                        <tr>
                            <td class="nominal-label">Nominal</td>
                            <td class="nominal-value">Rp <?= number_format($bayar['nominal_bb'], 2, ".", ",") ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- FOOTER -->
        <table width="100%" class="footer" style="margin-top: 10px;">
            <tr>
                <td>Lembar ini adalah bukti pembayaran yang sah</td>
                <td align="right" style="font-size: 11pt;">
                    Sampang, <?= $e(ubahFormatTanggal($bayar['tanggal_bb'], 'd-m-Y')) ?>
                    <div class="status"><?= $e($bayar['status_bb']) ?></div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
