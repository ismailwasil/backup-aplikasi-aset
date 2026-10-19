<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_SPM_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // Call metode untuk mengatur header CORS
        $this->set_cors_headers();
    }

    // Metode untuk mengatur header CORS
    private function set_cors_headers()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization, Content-Type");
    }

    // Metode untuk memeriksa token API
    private function authenticate()
    {
        $headers = $this->input->request_headers();
        if (!isset($headers['API_token'])) {
            $this->output
                ->set_status_header(401)
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Unauthorized')));
            return false;
        }

        // Logic untuk memeriksa token API
        $token = $headers['API_token'];
        if ($token != 'asetbppkad') {  // API_token=asetbppkad
            $this->output
                ->set_status_header(401)
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Invalid token')));
            return false;
        }
        return true;
    }

    // Metode untuk memeriksa API status
    public function index()
    {
        echo "API is working";
    }

    // Endpoint yang memerlukan autentikasi
    public function get_data_error()
    {
        if (!$this->authenticate()) {
            return;
        }
        $reg = $this->input->get('reg');
        $tgl_aju = $this->input->get('tgl_aju');
        if ($reg === null) {
            if ($tgl_aju === null) {
                $get_data_SPM = $this->Data_SPM_model->getDataSPM();
            } else {
                $get_data_SPM = $this->Data_SPM_model->getDataSPM($tgl_aju);
            }
        } else {
            if ($tgl_aju == null) {
                $get_data_SPM = $this->Data_SPM_model->getDataSPM($reg);
            } else {
                $get_data_SPM = $this->Data_SPM_model->getDataSPM($reg, $tgl_aju);
            }
        }
        // Data yang akan dikembalikan dalam format JSON
        if ($get_data_SPM) {
            $data = array(
                'status' => 'true',
                'data' => $get_data_SPM
            );
            // Mengatur header response sebagai JSON
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            if ($reg) {
                if ($tgl_aju) {
                    $pesan = 'Tidak ada pengajuan data pada tahun ' . $tgl_aju . ' dengan register ' . $reg;
                } else {
                    $pesan = 'Tidak ada data dengan register ' . $reg;
                }
            } else {
                if ($tgl_aju) {
                    $pesan = 'Tidak ada pengajuan data di tahun ' . $tgl_aju;
                } else {
                    $pesan = 'Tidak ada data';
                }
            }
            $data = array(
                'status' => 'false',
                'data' => $pesan
            );
            // Mengatur header response sebagai JSON
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode($data));
        }
    }
    public function get_data()
    {
        if (!$this->authenticate()) {
            return;
        }
        $tgl_aju = $this->input->get('tgl_aju');
        $reg = $this->input->get('reg');
        $get_data_SPM = $this->Data_SPM_model->getDataSPM($reg, $tgl_aju);
        // Data yang akan dikembalikan dalam format JSON
        if ($get_data_SPM) {
            $data = array(
                'status' => 'true',
                'data' => $get_data_SPM
            );
            // Mengatur header response sebagai JSON
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            if ($reg) {
                if ($tgl_aju) {
                    $pesan = 'Tidak ada pengajuan data pada tahun ' . $tgl_aju . ' dengan register ' . $reg;
                } else {
                    $pesan = 'Tidak ada data dengan register ' . $reg;
                }
            } else {
                if ($tgl_aju) {
                    $pesan = 'Tidak ada pengajuan data di tahun ' . $tgl_aju;
                } else {
                    $pesan = 'Tidak ada data';
                }
            }
            $data = array(
                'status' => 'false',
                'data' => $pesan
            );
            // Mengatur header response sebagai JSON
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode($data));
        }
    }

    public function options()
    {
        $this->output
            ->set_status_header(200)
            ->set_output('');
    }
}
