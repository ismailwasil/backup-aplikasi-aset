<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Spm extends CI_Controller
{
    public function index($idSPM)
    {
        $row = $this->db->query(
            "SELECT *, spm_masuk.id AS id_masuk_spm FROM status_spm
             JOIN spm_masuk ON status_spm.id = spm_masuk.id_status
             JOIN data_user ON spm_masuk.skpd = data_user.id
             WHERE spm_masuk.id = ?",
            [(int) $idSPM]
        )->row_array();
        if (!$row) {
            show_404();
        }
        $data['SPM']   = $row;
        $data['title'] = "Verifikasi SPM - Aset BPPKAD";
        $data['logo']  = $this->_data_uri(FCPATH . 'assets/images/logo/Sampang.png');
        $data['qr']    = $this->_qr_data_uri(base_url('SPM/index/' . $row['id_masuk_spm']));
        $html = $this->load->view('templates/pages/view_spm', $data, TRUE);
        $this->_pdf_inline($html, array(0, 0, 609.45, 935.43), 'Verifikasi_SPM_' . $row['id_masuk_spm'] . '.pdf');
    }

    // dipertahankan agar link lama tetap jalan
    public function printPDF($idSPM)
    {
        $this->index($idSPM);
    }

    // ===== Helper PDF (Dompdf) =====
    private function _data_uri($path)
    {
        if (!is_file($path)) return '';
        $mime = strtolower(pathinfo($path, PATHINFO_EXTENSION)) === 'png' ? 'image/png' : 'image/jpeg';
        return 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($path));
    }

    // QR diambil dari server QR, lalu ditanam sebagai data URI; jika gagal, QR dikosongkan (PDF tetap jadi)
    private function _qr_data_uri($text)
    {
        $url = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . urlencode($text);
        $ctx = stream_context_create(['http' => ['timeout' => 4], 'ssl' => ['verify_peer' => true]]);
        $img = @file_get_contents($url, false, $ctx);
        return $img ? 'data:image/png;base64,' . base64_encode($img) : '';
    }

    // Tampilkan HTML sebagai PDF inline: browser langsung menampilkan preview + tombol simpan/cetak
    private function _pdf_inline($html, $paper, $filename)
    {
        require_once FCPATH . 'vendor/autoload.php';
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->setPaper($paper, 'portrait');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $this->output
            ->set_content_type('application/pdf')
            ->set_header('Content-Disposition: inline; filename="' . $filename . '"')
            ->set_output($dompdf->output());
    }
}
