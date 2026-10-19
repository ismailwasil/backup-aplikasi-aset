<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{
    public function excel()
    {
        $data['SPM'] = $this->db->get_where('spm_masuk', ['id' => 9])->row_array();
        $data['title'] = "Export Excel - Aset BPPKAD";
        require(APPPATH . 'PhpSpreadsheet-master');
        require(APPPATH . 'PhpSpreadsheet-master/Writer/Xls');

        // Create a new Spreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'REG');
        $sheet->setCellValue('B1', 'NAMA SKPD');
        $sheet->setCellValue('C1', 'NO SPM');

        $baris = 2;
        foreach ($data['SPM'] as $spm) {
            $sheet->setCellValue('A' . $baris, $spm->reg);
            $sheet->setCellValue('A' . $baris, $spm->skpd);
            $sheet->setCellValue('A' . $baris, $spm->no_spm);

            $baris++;
        }
        $filename = "Data Persediaan" . '.xlsx';
        // Set the appropriate headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data.xlsx"');
        header('Cache-Control: max-age=0');

        // Output the spreadsheet directly to the browser
        $writer->save('php://output');
        exit;
    }
}
