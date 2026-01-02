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
        <!-- COBA UIVERSE. -->
        <div class="content">
            <h1 class="auth-title text-center">Daftar</h1>
            <form method="post" action="<?= base_url('auth/registration'); ?>">
                <div class="field">
                    <input type="text" class="input" placeholder="Nama Lengkap" id="name" name="name" value="<?= set_value('name') ?>">
                    <span class="span"><i class="bi fa-fw fa-lg bi-person-badge"></i></span>
                    <label class="label">Nama</label>
                    <?= form_error('name', '<small  class="message">', '</small>') ?>
                </div>
                <div class="field">
                    <input type="text" class="input" placeholder="Akronim" name="akronim" id="akronim" value="<?= set_value('akronim') ?>">
                    <span class="span"><i class="bi fa-fw fa-lg bi-person-bounding-box"></i></span>
                    <label class="label">Akronim</label>
                    <?= form_error('akronim', '<small  class="message">', '</small>') ?>
                </div>
                <div class="field">
                    <input type="text" class="input" placeholder="Username" id="username" name="username" value="<?= set_value('username') ?>">
                    <span class="span"><i class="bi fa-fw fa-lg bi-person-fill"></i></span>
                    <label class="label">Username</label>
                    <?= form_error('username', '<small  class="message">', '</small>') ?>
                </div>
                <div class="field">
                    <input type="password" class="input" placeholder="Password" id="password1" name="password1">
                    <span class="span"><i class="bi fa-fw fa-lg bi-shield-lock-fill"></i></span>
                    <span class="span-right"><i id="show1" class="showPass fa fa-fw fa-eye" style="cursor: pointer;"></i></span>
                    <label class="label">Password</label>
                    <?= form_error('password', '<small  class="message">', '</small>') ?>
                </div>
                <div class="field">
                    <input type="password" class="input" placeholder="Ulangi Password" id="password2" name="password2">
                    <span class="span"><i class="bi fa-fw fa-lg bi-shield-lock-fill"></i></span>
                    <span class="span-right"><i id="show2" class="showPass fa fa-fw fa-eye" style="cursor: pointer;"></i></span>
                    <label class="label">Password</label>
                    <?= form_error('password', '<small  class="message">', '</small>') ?>
                </div>
                <div class="text-center">
                    <button type="submit" class="button">Daftar</button>
                </div>
            </form>
            <div class="hubungi-develop text-center">
                <p class="text-gray-600">Sudah memiliki akun? <a href="<?= base_url('auth/'); ?>login">Log in</a></p>
            </div>
        </div>
        <!-- /COBA UIVERSE. -->
    </div>
</div>
<script>
    const togglePassword1 = document.querySelector('#show1');
    const password1 = document.querySelector('#password1');
    const togglePassword2 = document.querySelector('#show2');
    const password2 = document.querySelector('#password2');

    togglePassword1.addEventListener('click', function(e) {
        // toggle the type attribute
        const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type1);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    togglePassword2.addEventListener('click', function(e) {
        // toggle the type attribute
        const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type2);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>