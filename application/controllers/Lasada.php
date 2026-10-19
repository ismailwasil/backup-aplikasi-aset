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
            ->order_by('tgl_awal_acara', 'DESC')
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

    // public function buat_booking()
    // {
    //     $this->load->library('telegram');
    //     // Generate kode kombinasi unik
    //     $code = substr(md5(uniqid(mt_rand(), true)), 0, 10);
    //     $tanggal_sekarang = date('Ymd');
    //     $kode_byr = $tanggal_sekarang . $code;

    //     $nama = $this->input->post('nama', TRUE);
    //     $no_hp = $this->input->post('telepon', TRUE);

    //     $no_hp = preg_replace('/(\W*)/', '', $no_hp); //only digits allowed

    //     if (substr($no_hp, 0, 1) == 0) {
    //         $number = "62" . substr($no_hp, 1);
    //     } elseif (substr($no_hp, 0, 2) == 62) {
    //         if (substr($no_hp, 0, 3) == 620) {
    //             $number = "62" . substr($no_hp, 3);
    //         } else {
    //             $number = $no_hp;
    //         }
    //     }

    //     $alamat = $this->input->post('alamat', TRUE);
    //     $id_aset = $this->input->post('aset', TRUE);
    //     $keperluan = $this->input->post('acara', TRUE);
    //     $tgl_book = date('Y-m-d');
    //     $tgl_awal_acara = $this->input->post('tanggal-awal', TRUE) . ' ' . $this->input->post('waktu-awal', TRUE);
    //     $tgl_akhir_acara = $this->input->post('tanggal-akhir', TRUE)  . ' ' . $this->input->post('waktu-akhir', TRUE);

    //     $no_pengenal = $this->input->post('no-pengenal', TRUE);
    //     $bukti_byr = '';
    //     $id_status = 1;
    //     $tgl_byr = '';
    //     $total = '';
    //     $catatan_acara = $this->input->post('catatan_acara', TRUE);

    //     // Query Nama aset Sewa
    //     $QueryNamaAset = $this->db->get_where('aset_sewa', ['id_aset' => $id_aset])->row_array();
    //     $namaAset = $QueryNamaAset['nm_aset'];

    //     // cek jika ada gambar diupload
    //     $bukti_pengenal = $_FILES['bukti-ID']['name'];
    //     // var_dump($bukti_pengenal);
    //     // die();
    //     if ($bukti_pengenal) {
    //         $config = [
    //             'upload_path'   => FCPATH . 'assets/doc/LASADA',
    //             'allowed_types' => 'jpg|jpeg|png|pdf',
    //             'max_size'      => 10024,
    //             'encrypt_name'  => TRUE,
    //             'detect_mime'   => TRUE
    //         ];

    //         $this->load->library('upload', $config);
    //         $this->upload->initialize($config); //mengatasi error upload_path

    //         if ($this->upload->do_upload('bukti-ID')) {
    //             $dok = $this->upload->data('file_name');
    //             // echo '$dok';
    //             // die();
    //             // Kirim data ke database
    //             $numberClear = $number == NULL ? "628999999999" : $number;
    //             // echo $numberClear;
    //             // die();
    //             $this->db->insert('event_acara', [
    //                 'nama'             => $nama,
    //                 'no_hp'            => $numberClear,
    //                 'alamat'           => $alamat,
    //                 'id_aset'          => $id_aset,
    //                 'keperluan'        => $keperluan,
    //                 'tgl_book'         => $tgl_book,
    //                 'tgl_awal_acara'   => $tgl_awal_acara,
    //                 'tgl_akhir_acara'  => $tgl_akhir_acara,
    //                 'no_pengenal'      => $no_pengenal,
    //                 'bukti_pengenal'   => $dok,
    //                 'kode_byr'         => $kode_byr,
    //                 'bukti_byr'        => $bukti_byr,
    //                 'id_status'        => $id_status,
    //                 'tgl_byr'          => $tgl_byr,
    //                 'total'            => $total,
    //                 'catatan_acara'    => $catatan_acara
    //             ]);

    //             // Kirim data ke Telegram
    //             $a = substr($tgl_awal_acara, 0, 10);
    //             $b = substr($tgl_akhir_acara, 0, 10);
    //             if ($a == $b) {
    //                 $hariH = $tgl_awal_acara . " - " . htmlspecialchars($this->input->post('waktu-akhir', TRUE));
    //             } else {
    //                 $hariH = $tgl_awal_acara . " sampai " . $tgl_akhir_acara;
    //             }
    //             $botToken = '6004321041:AAEOCiRHrWrjRCGYmprns7-Vc9UBQaC4_kA';
    //             $chatId = '-856503743';
    //             $message = "Pengajuan Sewa/Pinjam " . $namaAset . "\n\n";
    //             $message .= "Nama : " . $nama . "\n";
    //             $message .= "No. HP : " . $no_hp . "\n";
    //             $message .= "Alamat : " . $alamat . "\n";
    //             $message .= "Acara : " . $keperluan . "\n";
    //             $message .= "Tgl Booking : " . $tgl_book . "\n";
    //             $message .= "Tgl Acara : " . $hariH . "\n";
    //             $message .= "No Pengenal : " . $no_pengenal . "\n";
    //             $buttonText = "Kirim Detail";
    //             if ($id_aset == 5) {
    //                 $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . $nama . "%0A%0AAnda%20menyewa%20*" . $namaAset . "*%0AUntuk%20tanggal%20*" . $tgl_awal_acara . "*%0AUntuk%20keperluan%20*" . $keperluan . "*%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
    //             } else {
    //                 $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . $nama . "%0A%0AAnda%20menyewa%20*" . $namaAset . "*%0AUntuk%20tanggal%20*" . $tgl_awal_acara . "*%0AAtas%20keperluan%20*" . $keperluan . "*%0A%0ADan%20lakukan%20pembayaran%20segera%20maksimal%20H-7%20dari%20hari%20acara.%0A%0AUntuk%20info%20lebih%20lanjut%20bisa%20di-klik%20atau%20_pencet_%20pada%20link%20https://bpu-sampang.pages.dev%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
    //                 // $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . $nama . "%0A%0AAnda%20menyewa%20*" . $namaAset . "*%0AUntuk%20tanggal%20*" . $tgl_awal_acara . "*%0AUntuk%20keperluan%20*" . $keperluan . "*%0A%0ASilakan%20cek%20tagihan%20pembayaran%20Anda%20dengan%20kode%20pembayaran%20" . $kode_byr . "%0A%0ADan%20lakukan%20pembayaran%20segera.%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
    //             }

    //             // $this->telegram->sendMessage($message, $buttonText, $buttonURL, $botToken, $chatId);
    //             $this->telegram->sendLasada($botToken, $chatId, $buttonText, $buttonURL, $message,);

    //             // Response
    //             $swal = '<script>
    //                         window.addEventListener("load", function() {
    //                             Toastify({
    //                                 text: "Data booking berhasil ditambahkan",
    //                                 duration: 3000,
    //                                 close: true,
    //                                 gravity: "center",
    //                                 position: "center",
    //                                 backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    //                             }).showToast();
    //                         });
    //                     </script>';
    //             $this->session->set_flashdata('message', $swal);

    //             $id_role = $this->session->userdata('id_role');
    //             if ($id_role == 1) {
    //                 redirect('admin/lasada');
    //             } elseif ($id_role == 4) {
    //                 redirect('developer/lasada');
    //             } elseif ($id_role == 2) {
    //                 redirect('user/lasada');
    //             } elseif ($id_role == 3) {
    //                 redirect('umum/lasada');
    //             }
    //         } else {
    //             $pesanError = $this->upload->display_errors();
    //             $swal = '<script>
    //                         window.addEventListener("load", function() {
    //                             Toastify({
    //                                 text: "' . $pesanError . '",
    //                                 duration: 3000,
    //                                 close: true,
    //                                 gravity: "center",
    //                                 position: "center",
    //                                 backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    //                             }).showToast();
    //                         });
    //                     </script>';
    //             $this->session->set_flashdata('message', $swal);

    //             $id_role = $this->session->userdata('id_role');
    //             if ($id_role == 1) {
    //                 redirect('admin/lasada');
    //             } elseif ($id_role == 4) {
    //                 redirect('developer/lasada');
    //             } elseif ($id_role == 2) {
    //                 redirect('user/lasada');
    //             } elseif ($id_role == 3) {
    //                 redirect('umum/lasada');
    //             }
    //         }
    //     }
    // }

    public function buat_booking()
    {
        $this->load->library('telegram');
        $this->load->library('form_validation');

        $pesan  = '';     // kosong = belum ada masalah
        $sukses = FALSE;

        // ===== 1. VALIDASI: isian tidak boleh kosong dan dibatasi panjangnya =====
        $this->form_validation->set_error_delimiters('', ' ');
        $this->form_validation->set_rules('aset', 'Aset', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('telepon', 'No. HP', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('acara', 'Acara', 'required|trim|max_length[150]');
        $this->form_validation->set_rules('tanggal-awal', 'Tanggal awal', 'required');
        $this->form_validation->set_rules('tanggal-akhir', 'Tanggal akhir', 'required');
        $this->form_validation->set_rules('waktu-awal', 'Waktu awal', 'required');
        $this->form_validation->set_rules('waktu-akhir', 'Waktu akhir', 'required');
        $this->form_validation->set_rules('no-pengenal', 'No. pengenal', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('catatan_acara', 'Catatan', 'trim|max_length[500]');
        if ($this->form_validation->run() == FALSE) {
            $pesan = trim(validation_errors());
        }

        // Generate kode kombinasi unik
        $code = substr(md5(uniqid(mt_rand(), true)), 0, 10);
        $tanggal_sekarang = date('Ymd');
        $kode_byr = $tanggal_sekarang . $code;

        // ===== 2. BERSIHKAN KARAKTER: tag HTML dan karakter kontrol dibuang =====
        $nama        = trim(preg_replace('/[\x00-\x1F\x7F]/', '', strip_tags((string) $this->input->post('nama', TRUE))));
        $alamat      = trim(preg_replace('/[\x00-\x1F\x7F]/', '', strip_tags((string) $this->input->post('alamat', TRUE))));
        $keperluan   = trim(preg_replace('/[\x00-\x1F\x7F]/', '', strip_tags((string) $this->input->post('acara', TRUE))));
        $no_pengenal = trim(preg_replace('/[\x00-\x1F\x7F]/', '', strip_tags((string) $this->input->post('no-pengenal', TRUE))));
        // catatan boleh multi-baris, jadi tab dan baris baru dipertahankan
        $catatan_acara = trim(preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', strip_tags((string) $this->input->post('catatan_acara', TRUE))));
        $id_aset     = (int) $this->input->post('aset', TRUE);

        // Nomor HP: hanya angka, lalu diubah ke format 62xxxxxxxxxx
        $no_hp = preg_replace('/\D+/', '', (string) $this->input->post('telepon', TRUE));
        $number = '';
        if (substr($no_hp, 0, 1) === '0') {
            $number = "62" . substr($no_hp, 1);
        } elseif (substr($no_hp, 0, 2) === '62') {
            if (substr($no_hp, 0, 3) === '620') {
                $number = "62" . substr($no_hp, 3);
            } else {
                $number = $no_hp;
            }
        }
        if ($pesan === '' && !preg_match('/^628\d{7,12}$/', $number)) {
            $pesan = 'Nomor HP tidak valid. Gunakan nomor seluler, misalnya 0812xxxxxxxx.';
        }

        // Tanggal dan jam: format harus benar dan waktu akhir harus setelah waktu awal
        $ta = trim((string) $this->input->post('tanggal-awal', TRUE));
        $tb = trim((string) $this->input->post('tanggal-akhir', TRUE));
        $wa = trim((string) $this->input->post('waktu-awal', TRUE));
        $wb = trim((string) $this->input->post('waktu-akhir', TRUE));
        $ok_tgl = preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $ta, $m1) && checkdate((int) $m1[2], (int) $m1[3], (int) $m1[1])
            && preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $tb, $m2) && checkdate((int) $m2[2], (int) $m2[3], (int) $m2[1]);
        $ok_jam = preg_match('/^([01]\d|2[0-3]):[0-5]\d(:[0-5]\d)?$/', $wa)
            && preg_match('/^([01]\d|2[0-3]):[0-5]\d(:[0-5]\d)?$/', $wb);
        if ($pesan === '' && (!$ok_tgl || !$ok_jam)) {
            $pesan = 'Format tanggal atau jam tidak valid.';
        }
        $tgl_awal_acara  = $ta . ' ' . substr($wa, 0, 5);
        $tgl_akhir_acara = $tb . ' ' . substr($wb, 0, 5);
        if ($pesan === '' && strtotime($tgl_awal_acara) >= strtotime($tgl_akhir_acara)) {
            $pesan = 'Waktu akhir harus setelah waktu awal.';
        }

        $tgl_book = date('Y-m-d');
        $bukti_byr = '';
        $id_status = 1;
        $tgl_byr = '';
        $total = '';

        // Query Nama aset Sewa
        $namaAset = '';
        if ($pesan === '') {
            $QueryNamaAset = $this->db->get_where('aset_sewa', ['id_aset' => $id_aset])->row_array();
            if ($QueryNamaAset) {
                $namaAset = $QueryNamaAset['nm_aset'];
            } else {
                $pesan = 'Aset tidak ditemukan.';
            }
        }

        // ===== 3. PERIKSA FILE: nama asli, jenis dari ISI file, tidak ada kode PHP =====
        $ext_aman = '';
        if ($pesan === '') {
            $f = isset($_FILES['bukti-ID']) ? $_FILES['bukti-ID'] : null;
            if (!$f || is_array($f['error']) || $f['error'] === UPLOAD_ERR_NO_FILE) {
                $pesan = 'Bukti ID wajib diunggah.';
            } elseif ($f['error'] !== UPLOAD_ERR_OK) {
                $pesan = 'Unggah file gagal. Pastikan ukuran file tidak lebih dari 10 MB.';
            } elseif (
                preg_match('/[\x00-\x1F\x7F\/\\\\]/', (string) $f['name']) ||
                preg_match('/\.(php[0-9]?|phtml|pht|phps|phar|cgi|pl|py|sh|asp|aspx|jsp|exe|html?|xhtml|svg|js)(\.|$)/i', (string) $f['name'])
            ) {
                // menolak nama seperti shell.php.jpg walau akhirannya terlihat aman
                $pesan = 'File ditolak karena nama atau ekstensinya tidak diperbolehkan.';
            } else {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime  = $finfo->file($f['tmp_name']);
                $peta  = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'application/pdf' => 'pdf'];
                if (!is_string($mime) || !isset($peta[$mime])) {
                    $pesan = 'Hanya file JPG, PNG, atau PDF yang diperbolehkan.';
                } elseif (stripos((string) file_get_contents($f['tmp_name']), '<?php') !== FALSE) {
                    $pesan = 'File ditolak karena berisi konten yang tidak diperbolehkan.';
                } else {
                    $ext_aman = $peta[$mime]; // ekstensi ditentukan server dari isi file, bukan dari klien
                }
            }
        }

        // ===== 4. UPLOAD dengan nama acak, lalu simpan dan kirim notifikasi =====
        if ($pesan === '') {
            $config = [
                'upload_path'   => FCPATH . 'assets/doc/LASADA',
                'allowed_types' => 'jpg|jpeg|png|pdf',
                'max_size'      => 10024,
                'file_name'     => bin2hex(random_bytes(16)) . '.' . $ext_aman, // nama acak 32 karakter
                'encrypt_name'  => FALSE,
                'overwrite'     => FALSE,
                'detect_mime'   => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config); //mengatasi error upload_path

            if ($this->upload->do_upload('bukti-ID')) {
                $dok = $this->upload->data('file_name');

                // Kirim data ke database
                $simpan = $this->db->insert('event_acara', [
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

                if ($simpan) {
                    // Kirim data ke Telegram (karakter khusus Markdown di-escape agar pesan tidak rusak)
                    $md   = ['\\', '_', '*', '`', '['];
                    $mdTo = ['\\\\', '\_', '\*', '\`', '\['];
                    $a = substr($tgl_awal_acara, 0, 10);
                    $b = substr($tgl_akhir_acara, 0, 10);
                    if ($a == $b) {
                        $hariH = $tgl_awal_acara . " - " . $wb;
                    } else {
                        $hariH = $tgl_awal_acara . " sampai " . $tgl_akhir_acara;
                    }
                    $botToken = '6004321041:AAEOCiRHrWrjRCGYmprns7-Vc9UBQaC4_kA';
                    $chatId = '-856503743';
                    $message = "Pengajuan Sewa/Pinjam " . str_replace($md, $mdTo, $namaAset) . "\n\n";
                    $message .= "Nama : " . str_replace($md, $mdTo, $nama) . "\n";
                    $message .= "No. HP : " . $no_hp . "\n";
                    $message .= "Alamat : " . str_replace($md, $mdTo, $alamat) . "\n";
                    $message .= "Acara : " . str_replace($md, $mdTo, $keperluan) . "\n";
                    $message .= "Tgl Booking : " . $tgl_book . "\n";
                    $message .= "Tgl Acara : " . $hariH . "\n";
                    $message .= "No Pengenal : " . str_replace($md, $mdTo, $no_pengenal) . "\n";
                    $buttonText = "Kirim Detail";
                    // bagian yang berasal dari pengguna di-encode agar tidak bisa menyisipkan parameter URL
                    if ($id_aset == 5) {
                        $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . rawurlencode($nama) . "%0A%0AAnda%20menyewa%20*" . rawurlencode($namaAset) . "*%0AUntuk%20tanggal%20*" . rawurlencode($tgl_awal_acara) . "*%0AUntuk%20keperluan%20*" . rawurlencode($keperluan) . "*%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
                    } else {
                        $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . rawurlencode($nama) . "%0A%0AAnda%20menyewa%20*" . rawurlencode($namaAset) . "*%0AUntuk%20tanggal%20*" . rawurlencode($tgl_awal_acara) . "*%0AUntuk%20keperluan%20*" . rawurlencode($keperluan) . "*%0A%0ASilakan%20cek%20tagihan%20pembayaran%20Anda%20dengan%20kode%20pembayaran%20" . $kode_byr . "%0A%0ADan%20lakukan%20pembayaran%20segera.%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
                    }

                    // @ agar kegagalan kirim Telegram tidak menampilkan warning yang merusak redirect
                    @$this->telegram->sendLasada($botToken, $chatId, $buttonText, $buttonURL, $message);

                    $sukses = TRUE;
                    $pesan  = 'Data booking berhasil ditambahkan';
                } else {
                    @unlink(FCPATH . 'assets/doc/LASADA/' . $dok); // jangan tinggalkan file tanpa data
                    $pesan = 'Data gagal disimpan. Silakan coba lagi.';
                }
            } else {
                $pesan = trim(strip_tags($this->upload->display_errors('', ' ')));
                if ($pesan === '') {
                    $pesan = 'Unggah file gagal.';
                }
            }
        }

        // ===== 5. RESPON: satu pintu keluar untuk sukses maupun gagal =====
        $bg = $sukses ? 'linear-gradient(to right, #00b09b, #96c93d)' : 'linear-gradient(to right, #d9534f, #ff7b72)';
        // json_encode + HEX_* agar teks apa pun tidak bisa memecah tag script
        $js = json_encode((string) $pesan, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: ' . $js . ',
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "' . $bg . '",
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
        redirect('/'); // peran tidak dikenal: jangan biarkan halaman kosong
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
