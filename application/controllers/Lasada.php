<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lasada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // if (!$this->session->userdata('username')) {
        //     redirect('auth');
        // }
        if (!$this->session->userdata('username')) {
            $data = [
                'username' => 'pengunjung',
                'id_role' => 3,
            ];
            $this->session->set_userdata($data);
        }
    }

    public function get_events($id_aset)
    {
        $events = $this->db->get_where('event_acara', ['id_aset' => $id_aset])->result();

        $result = array();
        foreach ($events as $event) {
            $no_hp_nol = '0' . substr($event->no_hp, 2);
            // Tombol telpon dan WhatsApp
            $btn_telepon = '<a href="tel:' . $no_hp_nol . '" class="badge btn-info"><i class="fa fa-fw fa-phone"></i></a>';
            $btn_wa = '<a href="https://wa.me/' . $event->no_hp . '" target="_blank" class="badge btn-success"><i class="fa fa-fw fa-whatsapp"></i></a>';
            $result[] = array(
                'id' => $event->id,
                'id_status' => $event->id_status,
                'title' => $event->keperluan,
                'start' => $event->tgl_awal_acara,
                'end' => $event->tgl_akhir_acara,
                'description' =>
                "\n<strong>Pemesan :</strong> {$event->nama}\n" .
                    "<strong>No. HP :</strong> {$no_hp_nol} {$btn_telepon} {$btn_wa}\n" .
                    "<strong>Alamat :</strong> {$event->alamat}\n" .
                    "<strong>Tanggal Pesan :</strong> {$event->tgl_book}\n" .
                    "<strong>Waktu Acara :</strong> " . substr($event->tgl_awal_acara, 11, 5) . " - " . substr($event->tgl_akhir_acara, 11, 5) . " WIB\n" .
                    "<strong>Catatan :</strong> {$event->catatan_acara}",
                ENT_QUOTES,
                'UTF-8'
            );
        }

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function bpu_spg()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        // $querySewaAset = "SELECT * FROM event_acara JOIN status_sewa
        //                     ON event_acara.id_status=status_sewa.id_status
        //                     WHERE id_aset = 1
        //                     ORDER BY tgl_awal_acara ASC
        //                 ";

        $data['sewa'] = $this->db
            ->from('event_acara')
            ->join('status_sewa', 'event_acara.id_status = status_sewa.id_status')
            ->where('id_aset', 1)
            ->order_by('tgl_awal_acara', 'ASC')
            ->get()
            ->result_array();


        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/bpu_spg', $data);
        $this->load->view('templates/page_footer');
    }


    public function mess_sby()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['sewa'] = $this->db
            ->from('event_acara')
            ->join('status_sewa', 'event_acara.id_status = status_sewa.id_status')
            ->where('id_aset', 2)
            ->order_by('tgl_awal_acara', 'ASC')
            ->get()
            ->result_array();


        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/mess_sby', $data);
        $this->load->view('templates/page_footer');
    }

    public function bpu_ktp()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['sewa'] = $this->db
            ->from('event_acara')
            ->join('status_sewa', 'event_acara.id_status = status_sewa.id_status')
            ->where('id_aset', 3)
            ->order_by('tgl_awal_acara', 'ASC')
            ->get()
            ->result_array();


        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/bpu_ktp', $data);
        $this->load->view('templates/page_footer');
    }

    public function pesanggerahan()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['sewa'] = $this->db
            ->from('event_acara')
            ->join('status_sewa', 'event_acara.id_status = status_sewa.id_status')
            ->where('id_aset', 4)
            ->order_by('tgl_awal_acara', 'ASC')
            ->get()
            ->result_array();


        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/pesanggerahan', $data);
        $this->load->view('templates/page_footer');
    }

    public function bus_pemda()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['sewa'] = $this->db
            ->from('event_acara')
            ->join('status_sewa', 'event_acara.id_status = status_sewa.id_status')
            ->where('id_aset', 5)
            ->order_by('tgl_awal_acara', 'ASC')
            ->get()
            ->result_array();


        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/bus_pemda', $data);
        $this->load->view('templates/page_footer');
    }

    public function buat_booking()
    {
        $this->load->library('telegram');
        // Generate kode kombinasi unik
        $code = substr(md5(uniqid(mt_rand(), true)), 0, 10);
        $tanggal_sekarang = date('Ymd');
        $kode_byr = $tanggal_sekarang . $code;

        $nama = $this->input->post('nama', TRUE);
        $no_hp = $this->input->post('telepon', TRUE);

        $no_hp = preg_replace('/(\W*)/', '', $no_hp); //only digits allowed

        if (substr($no_hp, 0, 1) == 0) {
            $number = "62" . substr($no_hp, 1);
        } elseif (substr($no_hp, 0, 2) == 62) {
            if (substr($no_hp, 0, 3) == 620) {
                $number = "62" . substr($no_hp, 3);
            } else {
                $number = $no_hp;
            }
        }

        $alamat = $this->input->post('alamat', TRUE);
        $id_aset = $this->input->post('aset', TRUE);
        $keperluan = $this->input->post('acara', TRUE);
        $tgl_book = date('Y-m-d');
        $tgl_awal_acara = $this->input->post('tanggal-awal', TRUE) . ' ' . $this->input->post('waktu-awal', TRUE);
        $tgl_akhir_acara = $this->input->post('tanggal-akhir', TRUE)  . ' ' . $this->input->post('waktu-akhir', TRUE);

        $no_pengenal = $this->input->post('no-pengenal', TRUE);
        $bukti_byr = '';
        $id_status = 1;
        $tgl_byr = '';
        $total = '';
        $catatan_acara = $this->input->post('catatan_acara', TRUE);

        // Query Nama aset Sewa
        $QueryNamaAset = $this->db->get_where('aset_sewa', ['id_aset' => $id_aset])->row_array();
        $namaAset = $QueryNamaAset['nm_aset'];

        // cek jika ada gambar diupload
        $bukti_pengenal = $_FILES['bukti-ID']['name'];
        // var_dump($bukti_pengenal);
        // die();
        if ($bukti_pengenal) {
            $config = [
                'upload_path'   => FCPATH . 'assets/doc/LASADA',
                'allowed_types' => 'jpg|jpeg|png|pdf',
                'max_size'      => 10024,
                'encrypt_name'  => TRUE,
                'detect_mime'   => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config); //mengatasi error upload_path

            if ($this->upload->do_upload('bukti-ID')) {
                $dok = $this->upload->data('file_name');
                // echo '$dok';
                // die();
                // Kirim data ke database
                $this->db->insert('event_acara', [
                    'nama'             => $nama,
                    'no_hp'            => $number,
                    'alamat'           => $alamat,
                    'id_aset'          => $id_aset,
                    'keperluan'        => $keperluan,
                    'tgl_book'         => $tgl_book,
                    'tgl_awal_acara'   => $tgl_awal_acara,
                    'tgl_akhir_acara'  => $tgl_akhir_acara,
                    'no_pengenal'      => $no_pengenal,
                    'bukti_pengenal'   => $dok,
                    'kode_byr'         => $kode_byr,
                    'bukti_byr'        => $bukti_byr,
                    'id_status'        => $id_status,
                    'tgl_byr'          => $tgl_byr,
                    'total'            => $total,
                    'catatan_acara'    => $catatan_acara
                ]);

                // Kirim data ke Telegram
                $a = substr($tgl_awal_acara, 0, 10);
                $b = substr($tgl_akhir_acara, 0, 10);
                if ($a == $b) {
                    $hariH = $tgl_awal_acara . " - " . htmlspecialchars($this->input->post('waktu-akhir'));
                } else {
                    $hariH = $tgl_awal_acara . " sampai " . $tgl_akhir_acara;
                }
                $botToken = '6004321041:AAEOCiRHrWrjRCGYmprns7-Vc9UBQaC4_kA';
                $chatId = '-856503743';
                $message = "Pengajuan Sewa/Pinjam " . $namaAset . "\n\n";
                $message .= "Nama : " . $nama . "\n";
                $message .= "No. HP : " . $no_hp . "\n";
                $message .= "Alamat : " . $alamat . "\n";
                $message .= "Acara : " . $keperluan . "\n";
                $message .= "Tgl Booking : " . $tgl_book . "\n";
                $message .= "Tgl Acara : " . $hariH . "\n";
                $message .= "No Pengenal : " . $no_pengenal . "\n";
                $buttonText = "Kirim Detail";
                if ($id_aset == 5) {
                    $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . $nama . "%0A%0AAnda%20menyewa%20*" . $namaAset . "*%0AUntuk%20tanggal%20*" . $tgl_awal_acara . "*%0AUntuk%20keperluan%20*" . $keperluan . "*%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
                } else {
                    $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . $nama . "%0A%0AAnda%20menyewa%20*" . $namaAset . "*%0AUntuk%20tanggal%20*" . $tgl_awal_acara . "*%0AUntuk%20keperluan%20*" . $keperluan . "*%0A%0ASilakan%20cek%20tagihan%20pembayaran%20Anda%20dengan%20kode%20pembayaran%20" . $kode_byr . "%0A%0ADan%20lakukan%20pembayaran%20segera.%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
                }

                // $this->telegram->sendMessage($message, $buttonText, $buttonURL, $botToken, $chatId);
                $this->telegram->sendLasada($botToken, $chatId, $buttonText, $buttonURL, $message,);

                // Response
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Data booking berhasil ditambahkan",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swal);

                $id_role = $this->session->userdata('id_role');
                if ($id_role == 1) {
                    redirect('admin/lasada');
                } elseif ($id_role == 4) {
                    redirect('developer/lasada');
                } elseif ($id_role == 2) {
                    redirect('user/lasada');
                } elseif ($id_role == 3) {
                    redirect('umum/lasada');
                }
            } else {
                $pesanError = $this->upload->display_errors();
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "' . $pesanError . '",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swal);

                $id_role = $this->session->userdata('id_role');
                if ($id_role == 1) {
                    redirect('admin/lasada');
                } elseif ($id_role == 4) {
                    redirect('developer/lasada');
                } elseif ($id_role == 2) {
                    redirect('user/lasada');
                } elseif ($id_role == 3) {
                    redirect('umum/lasada');
                }
            }
        }
    }

    public function cek_tagihan()
    {
        $hasilInput = $this->input->post('kode_bayar', TRUE);
        $kode_byr_input = preg_replace("/[^a-zA-Z0-9]/", "", $hasilInput);

        $tagihan = $this->db
            ->join('event_acara', 'aset_sewa.id_aset = event_acara.id_aset')
            ->join('status_sewa', 'event_acara.id_status = status_sewa.id_status')
            ->where('event_acara.kode_byr', $kode_byr_input)
            ->get('aset_sewa')
            ->row_array();


        if ($tagihan) {
            if ($tagihan['id_status'] == 3) {
                // $swal = '<script>
                //             window.addEventListener("load", function() {
                //                     Swal.fire({
                //                     title: "Success",
                //                     text: "Data dengan kode bayar ' . $kode_byr_input . ' sudah lunas",
                //                     icon: "success",
                //                     showConfirmButton: true,
                //                 })
                //             });
                //         </script>';
                $swal = '<script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
                $swal .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>';
                $swal .= '<script>';
                $swal .= 'function tampilkanModal(){';
                $swal .= 'document.getElementById("nama_penyewa").innerHTML ="';
                $swal .= $tagihan['nama'];
                $swal .= '";';
                $swal .= 'document.getElementById("aset_sewa").innerHTML ="';
                $swal .= $tagihan['nm_aset'];
                $swal .= '";';
                $swal .= 'document.getElementById("tgl_book").innerHTML ="';
                $swal .= $tagihan['tgl_book'];
                $swal .= '";';
                $swal .= '$("#info_pemesanan").modal("show");';
                $swal .= '}</script>';
                $swal .= '<script>
                $(document).ready(function() {
                    tampilkanModal();
                });
                </script>';
                $this->session->set_flashdata('message', $swal);
            } else {

                $swal = '<script>
                window.addEventListener("load", function() {
                    var inputKdByr = document.getElementById(\'kode_bayar_input\');
                    const input_bayar = document.querySelector(\'#input-bayar\');
                    
                    inputKdByr.value="' . $kode_byr_input . '";
                    input_bayar.classList.toggle(\'d-none\');
                    window.location.hash = "input-bayar";
                });
                </script>';

                $this->session->set_flashdata('message', $swal);
            }
        } else {
            $swal = '<script>
            window.addEventListener("load", function() {
                Swal.fire({
                title: "Gagal!",
                text: "Data dengan kode bayar ' . $kode_byr_input . ' tidak ditemukan",
                icon: "error",
                showConfirmButton: true,
                allowHtml: true
            })
            });
            </script>';
            $this->session->set_flashdata('message', $swal);
        }
        $id_role = $this->session->userdata('id_role');

        if ($id_role == 1) {
            redirect('admin/lasada');
        } elseif ($id_role == 4) {
            redirect('developer/lasada');
        } elseif ($id_role == 2) {
            redirect('user/lasada');
        } elseif ($id_role == 3) {
            redirect('umum/lasada');
        }
    }

    public function cek_kendaraan_dinas()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = "Aset";
            $this->load->view('templates/page_header', $data);
            // $this->load->view('templates/menu/sidebar-menu');
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/pages/lasada/cek_kendaraan_dinas', $data);
            $this->load->view('templates/page_footer');
        }
    }
}
