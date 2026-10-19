<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Spm extends CI_Controller
{
    public function index($idSPM)
    {
        $querySPM = "SELECT *, spm_masuk.id AS id_masuk_spm FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.id='$idSPM'
                                                            ";
        $data['SPM'] = $this->db->query($querySPM)->row_array();
        $data['title'] = "Print SPM - Aset BPPKAD";
        $verif = $this->load->view('templates/pages/view_spm', $data);
    }
    public function printPDF($idSPM)
    {

        $this->load->library('dompdf_gen');
        $data['SPM'] = $this->db->get_where('spm_masuk', ['id' => $idSPM])->row_array();
        $data['title'] = "Print SPM - Aset BPPKAD";
        // $this->load->view('templates/page_header', $data);
        // $this->load->view('templates/menu/sidebar-menu');
        // $this->load->view('templates/navbar', $data);
        $verif = $this->load->view('templates/pages/view_spm', $data, TRUE);
        // $this->load->view('templates/page_footer');

        $this->dompdf->set_paper('F4', 'potrait');
        $this->dompdf->load_html($verif);
        $this->dompdf->render();
        $this->dompdf->stream('Document_SPM_' . $idSPM, array('Attachment' => 0));
    }
}
