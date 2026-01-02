<script>
    localStorage.clear(); //memastikan tidak ada localstorage yang ada sebelumnya
</script>
<!-- Slide Bar -->
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="<?= base_url(); ?>" class="animate-charcter"><img src="<?= base_url('assets/'); ?>images/favicon/Trunojoyo.ico" alt="Logo" height="200">aset</a>
                    </div>
                    <div class="sidebar-toggler x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
                <div style="display: inline;">
                    <style>
                        input[type="color"] {
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            appearance: none;
                            border: 2px black solid;
                            width: 10%;
                            height: 30%;
                            border-radius: 50px;
                            overflow: hidden;
                            cursor: pointer;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                        }

                        input[type="color"]::-webkit-color-swatch {
                            border: none;
                            border-radius: 50px;
                        }

                        input[type="color"]::-webkit-color-swatch-wrapper {
                            padding: 0;
                            border: none;
                            border-radius: 50px;
                        }

                        /* Tulisan berdenyut */
                        .berdenyut {
                            display: inline-block;
                            animation: pulse 1.5s infinite;
                            /* Nama animasi, durasi, dan pengulangan */
                        }

                        @keyframes pulse {
                            0% {
                                transform: scale(1);
                                opacity: 1;
                            }

                            50% {
                                transform: scale(1.2);
                                opacity: 0.7;
                                color: #a91ee9ff;
                                font-weight: bold;
                            }

                            100% {
                                transform: scale(1);
                                opacity: 1;
                            }
                        }

                        /* Tulisan berdenyut */
                    </style>
                    <a href="<?= base_url(); ?>" class="animate-charcter"><img src="<?= base_url('assets/'); ?>images/favicon/Trunojoyo.ico" alt="Logo" height="200">aset</a>
                    <input type="color" name="color-picker" id="color-picker" value="#e5e9f6">
                    <script>
                        const body = document.querySelector("body");
                        const colorPicker = document.getElementById("color-picker");

                        colorPicker.addEventListener("input", function() {
                            body.style.background = colorPicker.value;
                        });
                    </script>
                </div>
            </div>
        </div>

        <!-- QUERY MENU DARI DATABASE -->
        <?php
        $id_role = $this->session->userdata('id_role');
        $queryMenu = "SELECT menu.id, menu.menu 
                        FROM menu JOIN access_menu 
                        ON menu.id = access_menu.id_menu 
                        WHERE access_menu.id_role=$id_role
                        ORDER BY access_menu.id_menu ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();
        // var_dump($menu);
        // die;
        ?>
        <!-- /QUERY MENU DARI DATABASE -->

        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title text-muted">
                        <?= $m['menu'] ?>
                    </li>

                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT * ,sub_menu.id AS id_sub_menu
                            FROM sub_menu JOIN menu 
                            ON sub_menu.id_menu = menu.id
                            WHERE sub_menu.id_menu=$menuId
                            AND sub_menu.is_active=1
                        ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <?php if ($sm['has_sub'] == 0) : ?>
                            <?php if ($id_role == 1 && $sm['url'] == 'inventaris'): ?>
                                <li class="sidebar-item">
                                    <a href="javascript:void(0)" class='sidebar-link' onclick="toLogInEBMD()">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span class="berdenyut">e-BMD</span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="<?= $title == $sm['title'] ? 'sidebar-item active' : 'sidebar-item' ?>">
                                    <a href="<?= ($id_role == 1 ? base_url('admin/') : ($id_role == 2 ? base_url('user/') : ($id_role == 3 ? base_url('umum/') : ($id_role == 4 ? base_url('developer/') : '#')))) . $sm['url'] ?>" class='sidebar-link'>
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span><?= $sm['title']; ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php elseif ($sm['has_sub'] == 1) : ?>
                            <li class="<?= $title == $sm['title'] ? 'sidebar-item has-sub active' : 'sidebar-item has-sub' ?>">
                                <a href="#" class='sidebar-link'>
                                    <i class="<?= $sm['icon']; ?>"></i>
                                    <span><?= $sm['title']; ?></span>
                                </a>
                                <?php
                                $id_sub_menu = $sm['id_sub_menu'];
                                $queryHasSub = "SELECT * FROM has_sub_menu
                                                    WHERE id_sub_menu=$id_sub_menu
                                                ";
                                $HasSub = $this->db->query($queryHasSub)->result_array();
                                ?>
                                <ul class="<?= $title == $sm['title'] ? 'submenu active' : 'submenu' ?>">
                                    <?php foreach ($HasSub as $hs) : ?>
                                        <?php $submenu_title = $hs['title_has_sub']; ?>
                                        <li class="<?= isset($has_sub) ? ($has_sub == $submenu_title ? 'submenu-item active' : 'submenu-item') : 'submenu-item' ?>">
                                            <a href="<?= ($id_role == 1 ? base_url('admin/') : ($id_role == 2 ? base_url('user/') : ($id_role == 3 ? base_url('umum/') : ($id_role == 4 ? base_url('developer/') : '#')))) . $hs['url_has_sub'] ?>">
                                                <i class="<?= $hs['icon_has_sub']; ?>"></i>
                                                <span><?= $hs['title_has_sub']; ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endforeach; ?>
        <!-- /LOOPING MENU -->
        <br>
        <div style="display: flex;justify-content: center;">
            <a href="https://api.whatsapp.com/send/?phone=6281913333320&text=Halo%2C+Developer+Aset&type=phone_number&app_absent=0" class="btn btn-edit-ismail btn-sm shadow-lg mt-5" target="_blank">
                <i class="fa fa-fw fa-code"></i> Hubungi Developer
            </a>
        </div>
        <br>
    </div>
</div>
<!-- /Slide Bar -->