<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id_role = $this->session->userdata('id_role');
        $pengunjung = $this->db->get_where('data_user', ['id_role' => 3])->row_array();

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => $pengunjung['username'],
                'id_role' => $pengunjung['id_role'],
            ];
            $this->session->set_userdata($data);
            redirect('umum');
        } elseif ($id_role == 1) {
            redirect('admin');
        } elseif ($id_role == 4) {
            redirect('developer');
        } elseif ($id_role == 3) {
            redirect('umum');
        } elseif ($id_role == 3 or $id_role == 5) {
            redirect('user');
        }
    }

    public function loginEBMD()
    {
        $id_role = $this->session->userdata('id_role');
        $posisiurl = htmlspecialchars($this->input->post('posisiURL'));
        $data = '<script>
                                    window.addEventListener("load", function(event) { 
                                        event.preventDefault();
                                        document.getElementById("usernameEBMD").value = "admin";
                                        document.getElementById("passwordEBMD").value = "sampang101";
                                        $("#submitEBMDmdl").modal("show");
                                    });
                                </script>';
        $this->session->set_flashdata('message', $data);
        redirect($posisiurl);
    }

    public function lasada()
    {
        $id_role = $this->session->userdata('id_role');
        $pengunjung = $this->db->get_where('data_user', ['id_role' => 3])->row_array();

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => $pengunjung['username'],
                'id_role' => $pengunjung['id_role'],
            ];
            $this->session->set_userdata($data);

            redirect('umum/lasada');
        } elseif ($id_role == 1) {
            redirect('admin/lasada');
        } elseif ($id_role == 4) {
            redirect('developer/lasada');
        } elseif ($id_role == 2) {
            redirect('user/lasada');
        } elseif ($id_role == 3) {
            redirect('umum/lasada');
        }
    }

    public function pengajuan_spm()
    {
        $id_role = $this->session->userdata('id_role');
        $pengunjung = $this->db->get_where('data_user', ['id_role' => 3])->row_array();

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => $pengunjung['username'],
                'id_role' => $pengunjung['id_role'],
            ];
            $this->session->set_userdata($data);

            redirect('auth/error');
        } elseif ($id_role == 1) {
            redirect('admin/pengajuan_spm');
        } elseif ($id_role == 4) {
            redirect('developer/pengajuan_spm');
        } elseif ($id_role == 2) {
            redirect('user/pengajuan_spm');
        } elseif ($id_role == 3) {
            redirect('auth/error');
        }
    }

    public function registration()
    {
        show_404();
        // if ($this->session->userdata('id_role') == 4) {
        //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
        //     $this->form_validation->set_rules('akronim', 'Acronim', 'required|trim');
        //     $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[data_user.username]', [
        //         'is_unique' => 'Username ini sudah tersedia. Buat username lain!'
        //     ]);
        //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //         'matches' => 'Password tidak sama!',
        //         'min_length' => 'Password terlalu pendek!'
        //     ]);
        //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
        //         'matches' => 'Password tidak sama!',
        //         'min_length' => 'Password terlalu pendek!'
        //     ]);
        //     if ($this->form_validation->run() == false) {
        //         $data['title'] = "Register";
        //         $this->load->view('templates/auth_header', $data);
        //         $this->load->view('auth/regist');
        //         $this->load->view('templates/auth_footer');
        //     } else {
        //         $data = [
        //             'name' => htmlspecialchars($this->input->post('name', true)),
        //             'username' => htmlspecialchars($this->input->post('username', true)),
        //             'image' => 'default.png',
        //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        //             'id_role' => 2,
        //             'is_active' => 1,
        //             'akronim' => htmlspecialchars($this->input->post('akronim', true)),
        //             'link_bi' => '',
        //             'link_stock' => '',
        //         ];
        //         $this->db->insert('data_user', $data);
        //         $this->session->set_flashdata('message', '<div class="alert alert-light-success alert-dismissible show fade">
        //                                     <i class="bi bi-check-circle"></i> Akun berhasil dibuat. Silakan Login!
        //                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                                 </div>');
        //         redirect('auth/login');
        //     }
        // } else {
        //     // redirect('auth/error');
        //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
        //     $this->form_validation->set_rules('akronim', 'Acronim', 'required|trim');
        //     $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[data_user.username]', [
        //         'is_unique' => 'Username ini sudah tersedia. Buat username lain!'
        //     ]);
        //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //         'matches' => 'Password tidak sama!',
        //         'min_length' => 'Password terlalu pendek!'
        //     ]);
        //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
        //         'matches' => 'Password tidak sama!',
        //         'min_length' => 'Password terlalu pendek!'
        //     ]);
        //     if ($this->form_validation->run() == false) {
        //         $data['title'] = "Register";
        //         $this->load->view('templates/auth_header', $data);
        //         $this->load->view('auth/regist');
        //         $this->load->view('templates/auth_footer');
        //     } else {
        //         $data = [
        //             'name' => htmlspecialchars($this->input->post('name', true)),
        //             'username' => htmlspecialchars($this->input->post('username', true)),
        //             'image' => 'default.png',
        //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        //             'id_role' => 2,
        //             'is_active' => 1,
        //             'akronim' => htmlspecialchars($this->input->post('akronim', true))
        //         ];
        //         $this->db->insert('data_user', $data);
        //         $this->session->set_flashdata('message', '<div class="alert alert-light-success alert-dismissible show fade">
        //                                     <i class="bi bi-check-circle"></i> Akun berhasil dibuat. Silakan Login!
        //                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                                 </div>');
        //         redirect('auth/login');
        //     }
        // }
    }

    public function login()
    {
        if (!$this->session->userdata('username')) {
            // ###################
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Login";
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            } else {
                $this->_login();
            }
        } else {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');

            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Login";
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            } else {
                $this->_login();
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('data_user', ['username' => $username])->row_array();

        if ($user) {
            // username ada
            // dan jika username  aktiv
            if ($user['is_active'] == 1) {
                // cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    $akronim = $user['akronim'];
                    $swaldash = '<script>
                                    window.addEventListener("load", function() {
                                        Toastify({
                                            text: "' . $akronim . ' Berhasil Login",
                                            duration: 3000,
                                            close: true,
                                            gravity: "center",
                                            position: "center",
                                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                        }).showToast();
                                    });
                                </script>';
                    $this->session->set_flashdata('message', $swaldash);
                    if ($user['id_role'] == 1) {
                        redirect('admin/admin_sewa');
                    } elseif ($user['id_role'] == 4) {
                        redirect('developer');
                    } else {
                        redirect('user');
                    }
                } else {
                    $swalLog = '<script>
                                    window.addEventListener("load", function() {
                                        Swal.fire({
                                            title: "Salah!",
                                            text: "Password Salah",
                                            icon: "error",
                                            confirmButtonText: "Coba Lagi",
                                        })
                                    });
                                </script>';
                    $this->session->set_flashdata('message', $swalLog);
                    redirect('auth/login');
                }
            } else {
                $swalLog = '<script>
                             window.addEventListener("load", function() {
                                Swal.fire({
                                     title: "Tidak Aktif!",
                                     text: "Username Tidak Aktif, minta aktivasi ke developer",
                                     icon: "error",
                                     confirmButtonText: "Coba Lagi",
                                 })
                             });
                          </script>';
                $this->session->set_flashdata('message', $swalLog);
                redirect('auth/login');
            }
        } else {
            $swalLog = '<script>
                                    window.addEventListener("load", function() {
                                        Swal.fire({
                                            title: "Tidak Terdaftar!",
                                        text: "Username Tidak Terdaftar, coba username lain",
                                        icon: "error",
                                        confirmButtonText: "Coba Lagi",
                                        })
                                    });
                                </script>';
            $this->session->set_flashdata('message', $swalLog);
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $swaldash = '<script>
                        window.addEventListener("load", function() {
                            Swal.fire({
                                title: "Success!",
                                text: "Anda Berhasil Logout",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1300,
                            })
                        });
                    </script>';
        $this->session->set_flashdata('message', $swaldash);
        redirect('umum/index');
    }

    public function error()
    {
        $this->load->view('templates/error403');
    }

    public function darurat()
    {
        $id_role = $this->session->userdata('id_role');

        $pkm_sreseh = password_hash('pkmsresehhebat', PASSWORD_DEFAULT);
        $pkm_torjun = password_hash('pkmtorjunhebat', PASSWORD_DEFAULT);
        $pkm_pangarengan = password_hash('pkmpangarenganhebat', PASSWORD_DEFAULT);
        $pkm_kamoning = password_hash('pkmkamoninghebat', PASSWORD_DEFAULT);
        $pkm_banyuanyar = password_hash('pkmbanyuanyarhebat', PASSWORD_DEFAULT);
        $pkm_camplong = password_hash('pkmcamplonghebat', PASSWORD_DEFAULT);
        $pkm_tanjung = password_hash('pkmtanjunghebat', PASSWORD_DEFAULT);
        $pkm_omben = password_hash('pkmombenhebat', PASSWORD_DEFAULT);
        $pkm_jrangoan = password_hash('pkmjrangoanhebat', PASSWORD_DEFAULT);
        $pkm_kedungdung = password_hash('pkmkedungdunghebat', PASSWORD_DEFAULT);
        $pkm_banjar = password_hash('pkmbanjarhebat', PASSWORD_DEFAULT);
        $pkm_jrengik = password_hash('pkmjrengikhebat', PASSWORD_DEFAULT);
        $pkm_tambelangan = password_hash('pkmtambelanganhebat', PASSWORD_DEFAULT);
        $pkm_banyuates = password_hash('pkmbanyuateshebat', PASSWORD_DEFAULT);
        $pkm_bringkoning = password_hash('pkmbringkoninghebat', PASSWORD_DEFAULT);
        $pkm_robatal = password_hash('pkmrobatalhebat', PASSWORD_DEFAULT);
        $pkm_karang_penang = password_hash('pkmkarangpenanghebat', PASSWORD_DEFAULT);
        $pkm_ketapang = password_hash('pkmketapanghebat', PASSWORD_DEFAULT);
        $pkm_bunten_barat = password_hash('pkmbuntenbarathebat', PASSWORD_DEFAULT);
        $pkm_batulenger = password_hash('pkmbatulengerhebat', PASSWORD_DEFAULT);
        $pkm_tamberu_barat = password_hash('pkmtamberubarathebat', PASSWORD_DEFAULT);
        $pkm_mandangin = password_hash('pkmmandanginhebat', PASSWORD_DEFAULT);

        // $query_darurat = "ALTER TABLE spm_masuk ADD COLUMN total_spm DECIMAL(15,2) NULL AFTER dokumen;
        //                 ";
        // $this->db->query($query_darurat);
        //$data['aset_sewa'] = $this->db->get_where('aset_sewa', ['nm_aset' => 'Bus Pemda'])->row_array();
        //var_dump($data['aset_sewa']);
        //die();
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "data berhasil di ubah",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/pengajuan_spm');
        } elseif ($id_role == 4) {
            redirect('developer/pengajuan_spm');
        } elseif ($id_role == 2) {
            redirect('user/pengajuan_spm');
        }
    }

    public function changeEventCountdown()
    {
        $id_role = $this->session->userdata('id_role');


        $date_countdown = htmlspecialchars($this->input->post('dateCountdown'));
        $message_1 = htmlspecialchars($this->input->post('message_1'));
        $message_final = htmlspecialchars($this->input->post('message_final'));

        $query_darurat = "UPDATE `countdown_event` SET `date_countdown` = '$date_countdown', `message_1` = '$message_1', `message_final` = '$message_final'  WHERE `countdown_event`.`id_countdown` = 1;
                        ";
        $this->db->query($query_darurat);
        //$data['aset_sewa'] = $this->db->get_where('aset_sewa', ['nm_aset' => 'Bus Pemda'])->row_array();
        //var_dump($data['aset_sewa']);
        //die();
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "data event berhasil di ubah",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/aset');
        } elseif ($id_role == 4) {
            redirect('developer/aset');
        }
    }

    public function kirim()
    {
        $id_role = $this->session->userdata('id_role');

        $this->form_validation->set_rules('pengirim', 'Nama', 'required|trim');
        $this->form_validation->set_rules('wa', 'No. Wa', 'required|trim');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        $token = "6267092313:AAFIE6Xbxh25IFiAWxDynqjQPSyhlVlQZa0";
        $chatID = "-856503743";
        // Path to store the uploaded file temporarily
        $uploadDir = './assets/temp_tele/';

        $nama = htmlspecialchars($this->input->post('pengirim'));
        $wa = htmlspecialchars($this->input->post('wa'));
        $pesan = htmlspecialchars($this->input->post('pesan'));

        $wa = preg_replace('/(\W*)/', '', $wa); //only digits allowed


        if (substr($wa, 0, 1) == 0) {
            $number = "62" . substr($wa, 1);
        } elseif (substr($wa, 0, 2) == 62) {
            if (substr($wa, 0, 3) == 620) {
                $number = "62" . substr($wa, 3);
            } else {
                $number = $wa;
            }
        }


        $chat = "Nama : " . $nama . "\n";
        $chat .= "Pesan : " . $pesan . "\n";

        $file = $_FILES['file'];
        // var_dump($file);
        // echo $file;
        // die();

        // cek apa ada gambar diupload?
        if ($file) {
            // jika ada file yg diinput
            // Check if a file was uploaded successfully
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Generate a unique filename for the uploaded file
                $filename = uniqid() . '_' . $file['name'];

                // Move the uploaded file to the desired directory
                move_uploaded_file($file['tmp_name'], $uploadDir . $filename);

                // Send the file to Telegram using cURL
                $apiUrl = "https://api.telegram.org/bot{$token}/sendPhoto";
                $postData = array(
                    'chat_id' => $chatID,
                    'photo' => new CURLFile(realpath($uploadDir . $filename)),
                    'caption' => $chat,
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Chat WA',
                                    'url' => 'https://wa.me/' . $number
                                )
                            )
                        )
                    ))
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiUrl);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Delete the temporary uploaded file
                unlink($uploadDir . $filename);

                // Display the response from the Telegram API
                $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swalChat);

                if ($id_role == 1) {
                    redirect('admin/contact');
                } elseif ($id_role == 4) {
                    redirect('developer/contact');
                } elseif ($id_role == 2) {
                    redirect('user/contact');
                } elseif ($id_role == 3) {
                    redirect('umum/contact');
                }
                // echo $response;
            } else {
                // echo 'Error uploading file.';
                $data = [
                    'text' => $chat,
                    'chat_id' => $chatID,
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Chat WA',
                                    'url' => 'https://wa.me/' . $number
                                )
                            )
                        )
                    ))
                ];
                file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

                $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swalChat);

                if ($id_role == 1) {
                    redirect('admin/contact');
                } elseif ($id_role == 4) {
                    redirect('developer/contact');
                } elseif ($id_role == 2) {
                    redirect('user/contact');
                } elseif ($id_role == 3) {
                    redirect('umum/contact');
                }
                // 
            }
        } else {
            $data = [
                'text' => $chat,
                'chat_id' => $chatID,
                'reply_markup' => json_encode(array(
                    'inline_keyboard' => array(
                        array(
                            array(
                                'text' => 'Chat WA',
                                'url' => 'https://wa.me/' . $number
                            )
                        )
                    )
                ))
            ];
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

            $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
            $this->session->set_flashdata('message', $swalChat);

            if ($id_role == 1) {
                redirect('admin/contact');
            } elseif ($id_role == 4) {
                redirect('developer/contact');
            } elseif ($id_role == 2) {
                redirect('user/contact');
            } elseif ($id_role == 3) {
                redirect('umum/contact');
            }
            // 
        }
    }

    public function kirim_cronjob()
    {
        $id_role = $this->session->userdata('id_role');

        $this->form_validation->set_rules('pengirim', 'Nama', 'required|trim');
        $this->form_validation->set_rules('wa', 'No. Wa', 'required|trim');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        $token = "6267092313:AAFIE6Xbxh25IFiAWxDynqjQPSyhlVlQZa0";
        $chatID = "-856503743";
        // Path to store the uploaded file temporarily
        $uploadDir = './assets/temp_tele/';

        // $nama = htmlspecialchars($this->input->post('pengirim'));
        // $wa = htmlspecialchars($this->input->post('wa'));
        // $pesan = htmlspecialchars($this->input->post('pesan'));

        // $wa = preg_replace('/(\W*)/', '', $wa); //only digits allowed

        $nama = 'Sistem Aset';
        $wa = '81913333320';
        $pesan = 'Waaahhh.. Ryan nih. Bangun yan.';

        if (substr($wa, 0, 1) == 0) {
            $number = "62" . substr($wa, 1);
        } elseif (substr($wa, 0, 2) == 62) {
            if (substr($wa, 0, 3) == 620) {
                $number = "62" . substr($wa, 3);
            } else {
                $number = $wa;
            }
        }


        $chat = "Nama : " . $nama . "\n";
        $chat .= "Pesan : " . $pesan . "\n";

        $file = $_FILES['file'];
        // var_dump($file);
        // echo $file;
        // die();

        // cek apa ada gambar diupload?
        if ($file) {
            // jika ada file yg diinput
            // Check if a file was uploaded successfully
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Generate a unique filename for the uploaded file
                $filename = uniqid() . '_' . $file['name'];

                // Move the uploaded file to the desired directory
                move_uploaded_file($file['tmp_name'], $uploadDir . $filename);

                // Send the file to Telegram using cURL
                $apiUrl = "https://api.telegram.org/bot{$token}/sendPhoto";
                $postData = array(
                    'chat_id' => $chatID,
                    'photo' => new CURLFile(realpath($uploadDir . $filename)),
                    'caption' => $chat,
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Chat WA',
                                    'url' => 'https://wa.me/' . $number
                                )
                            )
                        )
                    ))
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiUrl);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Delete the temporary uploaded file
                unlink($uploadDir . $filename);

                // Display the response from the Telegram API
                $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swalChat);

                if ($id_role == 1) {
                    redirect('admin/contact');
                } elseif ($id_role == 4) {
                    redirect('developer/contact');
                } elseif ($id_role == 2) {
                    redirect('user/contact');
                } elseif ($id_role == 3) {
                    redirect('umum/contact');
                }
                // echo $response;
            } else {
                // echo 'Error uploading file.';
                $data = [
                    'text' => $chat,
                    'chat_id' => $chatID,
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Chat WA',
                                    'url' => 'https://wa.me/' . $number
                                )
                            )
                        )
                    ))
                ];
                file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

                $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swalChat);

                if ($id_role == 1) {
                    redirect('admin/contact');
                } elseif ($id_role == 4) {
                    redirect('developer/contact');
                } elseif ($id_role == 2) {
                    redirect('user/contact');
                } elseif ($id_role == 3) {
                    redirect('umum/contact');
                }
                // 
            }
        } else {
            $data = [
                'text' => $chat,
                'chat_id' => $chatID,
                'reply_markup' => json_encode(array(
                    'inline_keyboard' => array(
                        array(
                            array(
                                'text' => 'Chat WA',
                                'url' => 'https://wa.me/' . $number
                            )
                        )
                    )
                ))
            ];
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

            $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
            $this->session->set_flashdata('message', $swalChat);

            if ($id_role == 1) {
                redirect('admin/contact');
            } elseif ($id_role == 4) {
                redirect('developer/contact');
            } elseif ($id_role == 2) {
                redirect('user/contact');
            } elseif ($id_role == 3) {
                redirect('umum/contact');
            }
            // 
        }
    }

    // Ajukan SPM
    public function ajukanSPM()
    {
        $id_role = $this->session->userdata('id_role');
        $this->load->library('telegram'); //load library telegram

        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('spm', 'No. SPM', 'required|trim|is_unique[spm_masuk.no_spm]');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        // $this->form_validation->set_rules('dokument', 'Dokumen', 'required');
        // if ($this->form_validation->run() === FALSE) {
        //     show_error('Pengajuan SPM gagal');
        // }

        $reg = '';
        $dateAju = date('Y-m-d');
        $dateVerif = '';
        $tgl_aju = $dateAju;
        $tgl_verif = $dateVerif;
        $skpd = $this->input->post('skpd', TRUE);
        $no_spm = $this->input->post('no_spm', TRUE);
        $jenis = $this->input->post('jenis', TRUE);
        $total_spm_val = $this->input->post('total-spm', TRUE);
        $total_spm = str_replace(',', '.', str_replace('.', '', $total_spm_val));
        $verifikator = '';
        $id_status = 1;
        $catatan = '';

        // cek jika ada gambar diupload
        $dokumen = $_FILES['dokumen']['name'];
        // Dapatkan nama file tanpa extensi
        $nama_file = pathinfo($dokumen, PATHINFO_FILENAME);
        // Dapatkan ekstensi file
        $extension = pathinfo($dokumen, PATHINFO_EXTENSION);
        $new_name = date('Ymd_his') . "_" . $dokumen;
        // var_dump($new_name);
        // die();
        if ($dokumen) {
            $config = [
                'upload_path'   => FCPATH . 'assets/doc/SPMDOC/',
                'allowed_types' => 'jpg|jpeg|png|pdf',
                'max_size'      => 10024,
                'encrypt_name'  => TRUE,
                'detect_mime'   => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config); //mengatasi error upload_path

            if ($this->upload->do_upload('dokumen')) {
                $dok = $this->upload->data('file_name');
                // echo '$dok';
                // die();
                // $queryAjukanSPM = "INSERT INTO spm_masuk (reg, tgl_aju, tgl_verif, skpd, no_spm, jenis, dokumen, total_spm, verifikator, id_status, catatan)
                //             VALUES ('$reg', '$tgl_aju', '$tgl_verif', '$skpd', '$no_spm', '$jenis', '$dok', '$total_spm', '$verifikator', $id_status, '$catatan')
                //         ";
                // $this->db->query($queryAjukanSPM);

                // INSERT TANPA RAW SQL
                $this->db->insert('spm_masuk', [
                    'reg'         => $reg,
                    'tgl_aju'     => $tgl_aju,
                    'tgl_verif'   => $tgl_verif,
                    'skpd'        => $skpd,
                    'no_spm'      => $no_spm,
                    'jenis'       => $jenis,
                    'dokumen'     => $dok,
                    'total_spm'   => $total_spm,
                    'verifikator' => $verifikator,
                    'id_status'   => $id_status,
                    'catatan'     => $catatan
                ]);

                // Kirim data ke Telegram
                $QuerySKPDName = $this->db->get_where('data_user', ['id' => $skpd])->row_array();
                $skpdName = $QuerySKPDName['akronim'];

                $botTokenSPM = '6549922145:AAFnKxXdsR29DrsqJ-MZTrKV69FqRXpIyao';
                $chatIdSPM = '-856503743';
                $message = "*SPM Masuk* \n\n";
                $message .= "SKPD : _" . $skpdName . "_\n\n";
                $message .= "No. SPM : _" . $no_spm . "_\n\n";
                $message .= "Jenis : _" . $jenis . "_\n";

                $data = [
                    'text' => $message,
                    'chat_id' => $chatIdSPM,
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Periksa SPM',
                                    'url' => 'https://aset.sampangkab.go.id/admin/verifikasi_spm'
                                )
                            )
                        )
                    ))
                ];
                file_get_contents("https://api.telegram.org/bot$botTokenSPM/sendMessage?" . http_build_query($data));

                // Response
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Data SPM berhasil ditambahkan",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swal);
                if ($id_role == 1) {
                    redirect('admin/pengajuan_spm');
                } elseif ($id_role == 4) {
                    redirect('developer/pengajuan_spm');
                } elseif ($id_role == 2) {
                    redirect('user/pengajuan_spm');
                } elseif ($id_role == 3) {
                    redirect('umum/pengajuan_spm');
                }
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function view_edit_pengajuan_spm()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Ajukan SPM";


        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/view_edit_pengajuan_spm', $data);
        $this->load->view('templates/page_footer');
    }

    // EditSPM setelah diajukan karena ditolak
    public function edit_spm_aju($idEditSPM)
    {
        $id_role = $this->session->userdata('id_role');
        $no_spm = htmlspecialchars($this->input->post('no_spm'));
        $jenis = htmlspecialchars($this->input->post('jenis'));
        $total_spm_val = htmlspecialchars($this->input->post('total-spm'));
        $total_spm = str_replace(',', '.', str_replace('.', '', $total_spm_val));

        // cek jika ada gambar diupload
        $dokumen = $_FILES['dokumenEdit']['name'];
        // var_dump($dokumen);
        // die();
        if ($dokumen) {
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size'] = '10024';
            $config['upload_path'] = './assets/doc/SPMDOC';

            $this->load->library('upload', $config);
            $this->upload->initialize($config); //mengatasi error upload_path

            if ($this->upload->do_upload('dokumenEdit')) {
                // hapus file dokumen lama
                $uploadDirUpdate = './assets/doc/SPMDOC/';
                $hasilrecordUpdate = $this->db->get_where('spm_masuk', ['id' => $idEditSPM])->row_array();
                $filenameLama = $hasilrecordUpdate['dokumen'];
                // Delete the temporary uploaded file
                unlink($uploadDirUpdate . $filenameLama);

                $dok = $this->upload->data('file_name');
                // $queryEditSPM = "UPDATE spm_masuk SET no_spm='$no_spm', jenis='$jenis', total_spm='$total_spm', dokumen='$dok', id_status=1
                //                 WHERE id='$idEditSPM'
                //             ";
                // $this->db->query($queryEditSPM);

                $this->db->trans_start();

                $this->db->where('id', (int)$idEditSPM);
                $this->db->update('spm_masuk', [
                    'no_spm'    => $no_spm,
                    'jenis'     => $jenis,
                    'total_spm' => $total_spm,
                    'dokumen'   => $dok,
                    'id_status' => 1
                ]);

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    echo ("Tidak bisa Memperbarui SPM");
                }


                // Kirim data ke Telegram
                // $queryRoot = "SELECT * FROM spm_masuk JOIN data_user ON spm_masuk.skpd=data_user.id WHERE spm_masuk.id='$idEditSPM'";

                $this->db->select('*');
                $this->db->from('spm_masuk');
                $this->db->join('data_user', 'spm_masuk.skpd = data_user.id');
                $this->db->where('spm_masuk.id', (int)$idEditSPM);

                $QuerySKPDNameUlang = $this->db->get()->row_array();
                $skpdNameUlang = $QuerySKPDNameUlang['akronim'];

                $botTokenSPM = '6549922145:AAFnKxXdsR29DrsqJ-MZTrKV69FqRXpIyao';
                $chatIdSPM = '-856503743';
                $message = "*Pengajuan Ulang SPM* \n\n";
                $message .= "SKPD : _" . $skpdNameUlang . "_\n\n";
                $message .= "No. SPM : _" . $QuerySKPDNameUlang['no_spm'] . "_\n\n";
                $message .= "Jenis : _" . $QuerySKPDNameUlang['jenis'] . "_\n";

                $data = [
                    'text' => $message,
                    'chat_id' => $chatIdSPM,
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Periksa SPM',
                                    'url' => 'https://aset.sampangkab.go.id/admin/verifikasi_spm'
                                )
                            )
                        )
                    ))
                ];
                file_get_contents("https://api.telegram.org/bot$botTokenSPM/sendMessage?" . http_build_query($data));

                // Response
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "SPM berhasil diedit dan Diajukan Ulang",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swal);
                if ($id_role == 1) {
                    redirect('admin/pengajuan_spm');
                } elseif ($id_role == 4) {
                    redirect('developer/pengajuan_spm');
                } elseif ($id_role == 2) {
                    redirect('user/pengajuan_spm');
                } elseif ($id_role == 3) {
                    redirect('umum/pengajuan_spm');
                }
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $this->db->where('id', (int)$idEditSPM);
            $this->db->update('spm_masuk', [
                'no_spm'    => $no_spm,
                'jenis'     => $jenis,
                'total_spm' => $total_spm,
                'id_status' => 1
            ]);

            // Kirim data ke Telegram
            // $queryRoot = "SELECT * FROM spm_masuk JOIN data_user ON spm_masuk.skpd=data_user.id WHERE spm_masuk.id='$idEditSPM'";

            $this->db->select('*');
            $this->db->from('spm_masuk');
            $this->db->join('data_user', 'spm_masuk.skpd = data_user.id');
            $this->db->where('spm_masuk.id', (int)$idEditSPM);

            $QuerySKPDNameUlang = $this->db->get()->row_array();
            $skpdNameUlang = $QuerySKPDNameUlang['akronim'];

            $botTokenSPM = '6549922145:AAFnKxXdsR29DrsqJ-MZTrKV69FqRXpIyao';
            $chatIdSPM = '-856503743';
            $message = "*Pengajuan Ulang SPM* \n\n";
            $message .= "SKPD : _" . $skpdNameUlang . "_\n\n";
            $message .= "No. SPM : _" . $QuerySKPDNameUlang['no_spm'] . "_\n\n";
            $message .= "Jenis : _" . $QuerySKPDNameUlang['jenis'] . "_\n";

            $data = [
                'text' => $message,
                'chat_id' => $chatIdSPM,
                'parse_mode' => 'Markdown',
                'reply_markup' => json_encode(array(
                    'inline_keyboard' => array(
                        array(
                            array(
                                'text' => 'Periksa SPM',
                                'url' => 'https://aset.sampangkab.go.id/admin/verifikasi_spm'
                            )
                        )
                    )
                ))
            ];
            file_get_contents("https://api.telegram.org/bot$botTokenSPM/sendMessage?" . http_build_query($data));

            // Response
            $swal = '<script>
                        window.addEventListener("load", function() {
                            Toastify({
                                text: "SPM berhasil diedit dan Diajukan Ulang",
                                duration: 3000,
                                close: true,
                                gravity: "center",
                                position: "center",
                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            }).showToast();
                        });
                    </script>';
            $this->session->set_flashdata('message', $swal);
            if ($id_role == 1) {
                redirect('admin/pengajuan_spm');
            } elseif ($id_role == 4) {
                redirect('developer/pengajuan_spm');
            } elseif ($id_role == 2) {
                redirect('user/pengajuan_spm');
            } elseif ($id_role == 3) {
                redirect('umum/pengajuan_spm');
            }
        }
    }

    public function ajukan_ulang($idSPM)
    {
        $id_role = $this->session->userdata('id_role');
        $this->db
            ->where('id', (int)$idSPM)
            ->update('spm_masuk', ['id_status' => 1]);

        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: "SPM berhasil diajukan ulang",
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/verifikasi_spm');
        } elseif ($id_role == 4) {
            redirect('developer/verifikasi_spm');
        } elseif ($id_role == 2) {
            redirect('user/pengajuan_spm');
        }
    }

    public function hapus_SPM($idSPM)
    {
        $id_role = $this->session->userdata('id_role');
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $uploadDir = './assets/doc/SPMDOC/';
        $hasilrecord = $this->db->get_where('spm_masuk', ['id' => $idSPM])->row_array();
        $filename = $hasilrecord['dokumen'];
        // Delete the temporary uploaded file
        unlink($uploadDir . $filename);

        $this->db->delete('spm_masuk', ['id' => (int)$idSPM]);

        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: "SPM berhasil dihapus",
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/verifikasi_spm');
        } elseif ($id_role == 4) {
            redirect('developer/verifikasi_spm');
        } elseif ($id_role == 2) {
            redirect('user/pengajuan_spm');
        }
    }

    public function ubah_username_profile($id_user_for_input)
    {
        $input_username = htmlspecialchars($this->input->post('input_username'));

        $this->db
            ->where('id', (int)$id_user_for_input)
            ->update('data_user', ['username' => $input_username]);

        // Response
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Username berhasil diedit",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('auth/logout');
    }

    // tampilan sesuai tahun Pilihan versi live
    public function tampilkanDataByYearLive()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $tahun = $this->input->get('tahun');
        $data['tahunIdent'] = $tahun;

        $statusList = [
            'proses'   => 1,
            'tolak'    => 2,
            'verified' => 3
        ];

        foreach ($statusList as $key => $status) {
            $this->db->from('spm_masuk');
            $this->db->where('id_status', $status);
            $this->db->like('tgl_aju', $tahun, 'after');
            $data[$key] = $this->db->count_all_results();
        }

        // $query = "SELECT spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_verif, spm_masuk.reg, data_user.name, spm_masuk.no_spm, spm_masuk.jenis,spm_masuk.dokumen, spm_masuk.verifikator FROM status_spm JOIN spm_masuk 
        //             ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
        //             WHERE spm_masuk.id_status=3 AND spm_masuk.tgl_verif LIKE '$tahun%'
        //             ORDER BY spm_masuk.reg DESC";
        $result = $this->db
            ->select('spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_verif, spm_masuk.reg, data_user.name, spm_masuk.no_spm, spm_masuk.jenis, spm_masuk.dokumen, spm_masuk.verifikator')
            ->from('status_spm')
            ->join('spm_masuk', 'status_spm.id = spm_masuk.id_status')
            ->join('data_user', 'spm_masuk.skpd = data_user.id')
            ->where('spm_masuk.id_status', 3)
            ->like('spm_masuk.tgl_verif', $tahun, 'after')
            ->order_by('spm_masuk.reg', 'DESC')
            ->get()
            ->result_array();


        $data['spm_masuk'] = $result;
        $data['title'] = "Admin";
        $this->load->view('templates/pages/verifikasi_spm_ajax', $data);
    }
    // tampilan sesuai tahun Pilihan versi live

    // tampilan sesuai tahun Pilihan versi live
    public function tampilkanDataAjuByYearLive()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $tahun = $this->input->get('tahun');
        $data['tahunIdent'] = $tahun;

        $data['title'] = "Versi Barada-E";
        $this->load->view('templates/pages/pengajuan_spm_ajax', $data);
    }
    // tampilan sesuai tahun Pilihan versi live
    // Notif Ajax
    public function notif()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $tahunSkr = date('Y');

        $datajumlahproses = $this->db
            ->from('spm_masuk')
            ->where('id_status', 1)
            ->like('tgl_aju', $tahunSkr, 'after')
            ->count_all_results();

        $datajumlahtolak = $this->db
            ->from('spm_masuk')
            ->where('id_status', 2)
            ->like('tgl_aju', $tahunSkr, 'after')
            ->count_all_results();

        $datajumlahverif = $this->db
            ->from('spm_masuk')
            ->where('id_status', 3)
            ->like('tgl_aju', $tahunSkr, 'after')
            ->count_all_results();

        $dataAdmin = [
            'jmlproses' => $datajumlahproses,
            'jmltolak'  => $datajumlahtolak,
            'jmlverif'  => $datajumlahverif
        ];

        echo json_encode($dataAdmin);

        // $this->load->view('templates/navbar_ajax', $data);
    }

    public function notif_user()
    {
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $tahunSkr = date('Y');
        $IdUser   = (int) $user['id'];

        $result = $this->db
            ->select('id_status, COUNT(*) as total')
            ->from('spm_masuk')
            ->where('skpd', $IdUser)
            ->like('tgl_aju', $tahunSkr, 'after')
            ->where_in('id_status', [1, 2, 3])
            ->group_by('id_status')
            ->get()
            ->result();

        $data = [
            'proses'   => 0,
            'tolak'    => 0,
            'verified' => 0
        ];

        foreach ($result as $row) {
            if ($row->id_status == 1) $data['proses'] = $row->total;
            if ($row->id_status == 2) $data['tolak'] = $row->total;
            if ($row->id_status == 3) $data['verified'] = $row->total;
        }

        echo json_encode($data);


        // $this->load->view('templates/navbar_ajax', $data);
    }
    public function jumlah_SPM()
    {
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        // $tahunSkr = date("Y");
        // $idRole = $user['id_role'];
        // $IdUser = $user['id'];
        // if ($idRole == 2) {
        //     $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=? AND skpd=$IdUser AND tgl_aju LIKE '$tahunSkr%'";
        // } else {
        //     $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=? AND tgl_aju LIKE '$tahunSkr%'";
        // }
        // $jumlahproses = $this->db->query($queryRootNotif, array(1))->num_rows();
        // $jumlahtolak = $this->db->query($queryRootNotif, array(2))->num_rows();
        // $jumlahverif = $this->db->query($queryRootNotif, array(3))->num_rows();
        // $data = array('proses' => $jumlahproses, 'tolak' => $jumlahtolak, 'verified' => $jumlahverif);
        // echo json_encode($data);

        $this->db->select('id_status, COUNT(*) as total');
        $this->db->from('spm_masuk');
        $this->db->like('tgl_aju', date('Y'), 'after');

        if ($user['id_role'] == 2) {
            $this->db->where('skpd', (int) $user['id']);
        }

        $this->db->group_by('id_status');
        $result = $this->db->get()->result_array();

        $data = ['proses' => 0, 'tolak' => 0, 'verified' => 0];

        foreach ($result as $row) {
            if ($row['id_status'] == 1) $data['proses']   = $row['total'];
            if ($row['id_status'] == 2) $data['tolak']    = $row['total'];
            if ($row['id_status'] == 3) $data['verified'] = $row['total'];
        }

        echo json_encode($data);


        // $this->load->view('templates/navbar_ajax', $data);
    }

    public function data_SPM_berubah_ajax()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $tahun = date("Y");
        $data['tahunIdent'] = $tahun;

        // $data['title'] = "Versi Barada-E";
        $this->load->view('templates/pages/data_spm_berubah_ajax', $data);
    }
    // Notif Ajax

    // Cek Password ke Drive
    public function cek_password_drive()
    {
        $idUserDrive = htmlspecialchars($this->input->post('id_user'));
        $jenisLayananDrive = htmlspecialchars($this->input->post('jenis_layanan'));
        $passwordDrivebefore = htmlspecialchars($this->input->post('pwdDrive'));
        $passwordDrive = hash('sha256', $passwordDrivebefore);

        $data_user = $this->db->get_where('data_user', ['id' => $idUserDrive])->row_array();

        // Cek password SKPD mana
        if ($idUserDrive = 11) {
            $password_benar = '47fd02a773ea72b880ef6607cd48c681c3bf405650fba2145d0b84febc915843'; //id = 11 adalah disdik
        } else {
            // nothing
        }

        if ($passwordDrive === $password_benar) {
            // Jika password benar, arahkan ke halaman tujuan
            if ($jenisLayananDrive == 1) {
                $link_drive = $data_user['link_bi'];
                $jenis_layanan = "Buku Inventaris";
            } elseif ($jenisLayananDrive == 2) {
                $link_drive = $data_user['link_stock'];
                $jenis_layanan = "Persediaan";
            }
            //$open_new = '<script>
            //                window.open("' . $link_drive . '", "_blank");
            //                window.location.reload();
            //            </script>';
            $open_new = '<div class="modal fade text-left" id="small" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true" data-bs-backdrop="static">';
            $open_new .= '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">';
            $open_new .= '<div class="modal-content bg-white w3-animate-zoom">';
            $open_new .= '<div class="modal-header">';
            $open_new .= '<h4 class="modal-title" id="myModalLabel19">Konfirmasi?</h4>';
            $open_new .= '<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">';
            $open_new .= '<i class="fa fa-fw fa-times"></i>';
            $open_new .= '</button>';
            $open_new .= '</div>';
            $open_new .= '<div class="modal-body">';
            $open_new .= 'Klik tombol <strong><i class="fa fa-fw fa-folder-open"></i> OK</strong> di bawah untuk buka ' . $jenis_layanan;
            $open_new .= '</div>';
            $open_new .= '<div class="modal-footer">';
            $open_new .= '<button id="link_ke" class="btn btn-primary ml-1 btn-sm denyut">';
            $open_new .= '<span class="d-sm-block d-none"><i class="fa fa-fw fa-folder-open"></i> OK</span>';
            $open_new .= '</button>';
            $open_new .= '</div>';
            $open_new .= '</div>';
            $open_new .= '</div>';
            $open_new .= '</div>';
            $open_new .= '<script>
                                document.getElementById("link_ke").addEventListener("click", function() {
                                    window.open("' . $link_drive . '", "_blank");
                                    window.location.reload();
                                })
                            </script>';
            $this->session->set_flashdata('message', $open_new);
            if ($jenisLayananDrive == 1) {
                redirect('user/inventaris');
            } elseif ($jenisLayananDrive == 2) {
                redirect('user/stock');
            }
            // redirect($link_drive);
        } else {
            // Jika password salah, tampilkan pesan kesalahan
            $swal = '<script>
                        window.addEventListener("load", function() {
                            Swal.fire({
                                title: "Password Salah!",
                                text: "Password tidak sesuai.",
                                icon: "error",
                                showConfirmButton: false,
                                timer: 1300,
                            })
                        });
                    </script>';
            $this->session->set_flashdata('message', $swal);
            if ($jenisLayananDrive == 1) {
                redirect('user/inventaris');
            } elseif ($jenisLayananDrive == 2) {
                redirect('user/stock');
            }
        }
    }
    // / Cek Password ke Drive

    public function bayarSetoran()
    {
        $id_role = $this->session->userdata('id_role');

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

        // Form isian
        $data = [
            'nama_bb'        => $this->input->post('nama', TRUE),
            'alamat_bb'      => $this->input->post('alamat', TRUE),
            'kelurahan_bb'   => $this->input->post('kelurahan', TRUE),
            'kecamatan_bb'   => $this->input->post('kecamatan', TRUE),
            'kabupaten_bb'   => $this->input->post('kabupaten', TRUE),
            'periode_awal'   => ubahFormatTanggal($this->input->post('periode_awal', TRUE), 'Y-m-d'),
            'periode_akhir'  => ubahFormatTanggal($this->input->post('periode_akhir', TRUE), 'Y-m-d'),
            'berita_bb'      => $this->input->post('berita', TRUE),
            'nominal_bb'     => $this->input->post('nominal', TRUE),
            'terbilang_bb'   => $this->input->post('terbilang', TRUE),
            'status_bb'      => $this->input->post('status_bayar', TRUE),
            'tanggal_bb'     => date('Y-m-d'),
            'ket_bb'         => NULL
        ];

        // Insert data
        $this->db->insert('bukti_bayar', $data);


        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: "Data berhasil ditambahkan",
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/bukti_bayar');
        } elseif ($id_role == 4) {
            redirect('developer/bukti_bayar');
        } elseif ($id_role == 2) {
            redirect('user/index');
        }
    }

    public function dokumen_bayar($id_bb)
    {
        $data['bayar'] = $this->db
            ->where('id_bb', (int) $id_bb)
            ->get('bukti_bayar')
            ->row_array();
        $data['title'] = "Print Bukti Bayar - Aset BPPKAD";
        $this->load->view('templates/pages/dokumen_bayar', $data);
    }

    public function hapus_bayar($id_bb)
    {
        $id_role = $this->session->userdata('id_role');

        $this->db->delete('bukti_bayar', ['id_bb' => $id_bb]);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: "Data berhasil dihapus",
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/bukti_bayar');
        } elseif ($id_role == 4) {
            redirect('developer/bukti_bayar');
        } elseif ($id_role == 2) {
            redirect('user/index');
        }
    }


    public function edit_bayar($id_bb)
    {
        $id_role = $this->session->userdata('id_role');

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

        // form isian
        $data = [
            'nama_bb'        => htmlspecialchars($this->input->post('nama')),
            'alamat_bb'      => htmlspecialchars($this->input->post('alamat')),
            'kelurahan_bb'   => htmlspecialchars($this->input->post('kelurahan')),
            'kecamatan_bb'   => htmlspecialchars($this->input->post('kecamatan')),
            'kabupaten_bb'   => htmlspecialchars($this->input->post('kabupaten')),
            'periode_awal'   => ubahFormatTanggal(htmlspecialchars($this->input->post('periode_awal')), 'Y-m-d'),
            'periode_akhir'  => ubahFormatTanggal(htmlspecialchars($this->input->post('periode_akhir')), 'Y-m-d'),
            'berita_bb'      => htmlspecialchars($this->input->post('berita')),
            'nominal_bb'     => htmlspecialchars($this->input->post('nominal')),
            'terbilang_bb'   => htmlspecialchars($this->input->post('terbilang')),
            'status_bb'      => htmlspecialchars($this->input->post('status_bayar', TRUE))
        ];

        // update data
        $this->db
            ->where('id_bb', (int) $id_bb)
            ->update('bukti_bayar', $data);


        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: "Data berhasil diedit",
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/bukti_bayar');
        } elseif ($id_role == 4) {
            redirect('developer/bukti_bayar');
        } elseif ($id_role == 2) {
            redirect('user/index');
        }
    }
}
