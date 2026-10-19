<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="row">
            <div class="nav-bar">
                <nav class="navbar navbar-expand navbar-light float-end float-sm-end">
                    <div class="container-fluid justify-content-end">
                        <a href="<?= base_url() ?>" class="btn btn-edit-ismail btn-block btn-sm shadow-lg mt-5">
                            <i class="fa fa-fw fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <script>
            localStorage.clear();
        </script>
        <?= $this->session->flashdata('message'); ?>

        <!-- COBA UIVERSE. -->
        <div class="content">
            <h1 class="auth-title text-center">Log in</h1>
            <form action="<?= base_url('auth/login'); ?>" method="post">
                <div class="field">
                    <input type="text" class="input" placeholder="Username" name="username" id="username" value="<?= set_value('username') ?>" autocomplete="off">
                    <span class="span"><i class="bi fa-fw fa-lg bi-person-fill"></i></span>
                    <label class="label">Username</label>
                    <?= form_error('username', '<small  class="message">', '</small>') ?>
                </div>
                <div class="field">
                    <input type="password" class="input" placeholder="Password" name="password" id="password" autocomplete="off">
                    <span class="span"><i class="bi fa-fw fa-lg bi-shield-lock-fill"></i></span>
                    <span class="span-right"><i id="show" class="showPass fa fa-fw fa-eye" style="cursor: pointer;"></i></span>
                    <label class="label">Password</label>
                    <?= form_error('password', '<small  class="message">', '</small>') ?>
                </div>
                <div class="text-center">
                    <button type="submit" class="button">Log in</button>
                </div>
            </form>
            <div class="hubungi-develop text-center">
                <p class="text-gray-600">Belum memiliki akun? <a href="https://api.whatsapp.com/send/?phone=6281913333320&text=Halo%2C+Developer+Aset.%0D%0ASaya+ingin+membuat+akun+Aset&type=phone_number&app_absent=0" class="font-bold" target="_blank">Hubungi Developer</a></p>
            </div>
        </div>
        <!-- /COBA UIVERSE. -->
    </div>
</div>
<script>
    const togglePassword = document.querySelector('#show');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>