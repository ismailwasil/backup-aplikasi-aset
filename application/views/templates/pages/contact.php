<style>
    /* UIverse Input */
    .content {
        max-width: 100%;
        padding: 25px 15px;
        background: #dde1e7;
        border-radius: 10px;
        box-shadow: 7px -7px 8px #cbcfd5,
            -7px 7px 8px #ffffff82;
    }

    .content .text {
        font-size: 33px;
        font-weight: 600;
        margin-bottom: 35px;
        color: #595959;
    }

    .field {
        height: 50px;
        width: 100%;
        display: flex;
        position: relative;
        margin-bottom: 23px;
    }

    .field:nth-child(2) {
        margin-top: 20px;
    }

    .field .input {
        height: 100%;
        width: 100%;
        padding-left: 45px;
        outline: none;
        border: none;
        font-size: 18px;
        background: #dde1e7;
        color: #595959;
        border-radius: 12px;
        box-shadow: inset 2px 2px 5px #BABECC,
            inset -5px -5px 10px #ffffff73;
    }

    .field .input:focus {
        box-shadow: inset 1px 1px 2px #BABECC,
            inset -1px -1px 2px #ffffff73;
    }

    .field .input-upload {
        height: 100%;
        width: 45%;
        padding-left: 45px;
        outline: none;
        border: none;
        font-size: 22px;
        line-height: 50px;
        font-weight: bold;
        border-radius: 25px;
        cursor: pointer;
        color: #25396f;
        background: #dde1e7;
        box-shadow: 2px 2px 5px #BABECC,
            -5px -5px 10px #ffffff73;
    }

    .field .input-upload:focus {
        box-shadow: inset 1px 1px 2px #BABECC,
            inset -1px -1px 2px #ffffff73;
    }

    .input-upload:hover {
        color: #ffffff;
        background: #435ebe;
        text-shadow: 4px 4px 2px rgba(0, 0, 0, 0.6);
        box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
        -webkit-box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
        -moz-box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
        border-right: 3px inset #ffffff;
        border-bottom: 3px inset #ffffff;
    }

    .visuallyhidden {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    .field .span {
        position: absolute;
        color: #25396f;
        line-height: 60px;
        padding-left: 15px;
    }

    .field .span-right {
        position: absolute;
        right: 15px;
        color: #595959;
        line-height: 55px;
    }

    .message {
        position: absolute;
        left: 20px;
        bottom: 0px;
        color: #dc3545;
        line-height: 5px;
    }

    .field .label {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 45px;
        pointer-events: none;
        color: #666666;
    }

    .field .input:valid~label {
        opacity: 0;
    }

    .forgot-pass {
        text-align: left;
        margin: 10px 0 10px 5px;
    }

    .forgot-pass a {
        font-size: 16px;
        color: #666666;
        text-decoration: none;
    }

    .forgot-pass:hover a {
        text-decoration: underline;
    }

    .button {
        margin: 15px 0;
        width: 50%;
        height: 50px;
        font-size: 22px;
        line-height: 50px;
        font-weight: bold;
        border-radius: 25px;
        border: none;
        outline: none;
        cursor: pointer;
        color: #25396f;
        background: #dde1e7;
        box-shadow: 2px 2px 5px #BABECC,
            -5px -5px 10px #ffffff73;
    }

    .button-1 {
        margin: 15px 0;
        width: 50%;
        height: 50px;
        font-size: 22px;
        line-height: 50px;
        font-weight: bold;
        border-radius: 25px;
        border: none;
        outline: none;
        cursor: pointer;
        color: #25396f;
        background: #dde1e7;
        box-shadow: 2px 2px 5px #BABECC,
            -5px -5px 10px #ffffff73;
        cursor: not-allowed;
    }

    .button:focus {
        color: #3498db;
        box-shadow: inset 2px 2px 5px #BABECC,
            inset -5px -5px 10px #ffffff73;
    }

    .button:hover {
        color: #ffffff;
        background: #435ebe;
        text-shadow: 4px 4px 2px rgba(0, 0, 0, 0.6);
        box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
        -webkit-box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
        -moz-box-shadow: 3px 2px 5px 1px rgba(0, 0, 0, 0.43) inset;
        border-right: 3px inset #ffffff;
        border-bottom: 3px inset #ffffff;
    }

    .hubungi-develop {
        margin: 10px 0;
        color: #595959;
        font-size: 16px;
    }

    .hubungi-develop a {
        color: #435ebe;
        text-decoration: none;
    }

    .hubungi-develop a:hover {
        text-decoration: underline;
    }

    /* /UIverse Input */
</style>
<?= $this->session->flashdata('message'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Our Contact</h3>
                <p class="text-subtitle text-muted">Get in touch</p>

            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Our Office</h4>
                    </div>
                    <div class="card-body">
                        <br>
                        <div class="row">
                            <img src="<?= base_url('assets/'); ?>images/bg/BPPKAD.jpg" alt="">
                        </div>
                        <br>
                        <div class="row">
                            <span><a href="https://www.google.com/maps/place/BPPKAD+Kab+Sampang/@-7.19536,113.2448533,17z/data=!4m5!3m4!1s0x2dd787014528a18f:0xb563f506b0793054!8m2!3d-7.1958336!4d113.2446815" target="_blank">
                                    <i class="bi bi-building"></i>
                                    Rajawali 04, st., Sampang, 69213
                                </a>
                            </span>
                        </div>
                        <div class="row">
                            <span><a href="tel:0323321024" target="_blank"><i class="bi bi-telephone-outbound-fill"></i> (0323) 321024</a> <i>(Mon to Fri 7:30am to 16:00pm)</i></span>
                        </div>
                        <div class="row">
                            <span><a href="mailto:bppkad@sampangkab.go.id?subject=Tulis%20Judul%20Email%20Anda%20%di%20Sini%20default&body=Tulis%20Pesan%20Email%20Anda%20%di%20Sini." target="_blank">
                                    <i class="bi bi-envelope-open-fill"></i> bppkad@sampangkab.go.id
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                    <h4>Berbicara Dengan Kami Di Sini <i class="bi bi-emoji-smile-upside-down"></i> <span style="color: red;">*</span> <small style="color: coral; font-size: smaller;">Wajib Diisi</small></h4>
                    <form class="form form-horizontal" id="form-pengaduan" action="<?= base_url('auth/kirim'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="pengirim">Nama <strong style="color: red;">*</strong></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative field">
                                            <input type="text" class="form-control input" placeholder="Nama" id="pengirim" name="pengirim" required>
                                            <div class="form-control-icon span">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="wa">No. WA <strong style="color: red;">*</strong></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative field">
                                            <input type="tel" class="form-control input" placeholder="62812xxxxxxxx" id="wa" name="wa" required>
                                            <div class="form-control-icon ">
                                                <i class="bi bi-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="pesan">Pesan <strong style="color: red;">*</strong></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative field">
                                            <textarea class="form-control input" id="pesan" placeholder="Pesan anda" rows="3" id="pesan" name="pesan" required></textarea>
                                            <div class="form-control-icon">
                                                <i class="bi bi-card-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="file">Gambar Pendukung</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="position-relative field">
                                                    <input type="file" class="form-control visuallyhidden" id="file" accept=".png, .jpg, .jpeg" name="file">
                                                    <div class="button" onclick="img_upload()" style="display:flex; justify-content: center; align-items: center;"><i class="fa fa-fw fa-lg fa-upload"></i></div>
                                                </div>
                                            </div>
                                            <div id="preview" class="col-md-7" style="padding: 5px;">
                                                <img id="prev-img" src="" style="max-height: 100px; width: auto;">
                                            </div>
                                        </div>
                                        <small style="color: #b82500;"><i class="bi bi-exclamation-triangle"></i> (Kirim foto jika diperlukan (tidak wajib))</small>
                                    </div>
                                </div>
                                <script type='text/javascript'>
                                    function img_upload() {
                                        document.getElementById('file').click();
                                    }

                                    let img = document.getElementById('prev-img');
                                    let input = document.getElementById('file');
                                    input.onchange = (e) => {
                                        if (input.files[0])
                                            img.src = URL.createObjectURL(input.files[0]);
                                    };
                                </script>

                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn-loadingPesan button-1 d-none" type="button" disabled>
                                        <i class="fa fa-gear fa-spin fa-lg fa-fw"></i> Mengirim...
                                    </button>
                                    <button type="submit" class="btn-submitPesan button" id="sendMessage"><i class="fa fa-send fa-lg fa-fw"></i> Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    const btnSubmitPesan = document.querySelector('.btn-submitPesan')
    const btnLoadingPesan = document.querySelector('.btn-loadingPesan')
    document.getElementById("form-pengaduan").addEventListener("submit", function(event) {
        event.preventDefault();
        Swal.fire({
            icon: "question",
            title: "Yakin Mengirim Pesan?",
            text: "Periksa kembali nomer WA agar mendapat respon balik",
            showCancelButton: true,
            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Tidak",
            reverseButtons: false,
            cancelButtonColor: '#DD6B55',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("form-pengaduan").submit();
                btnLoadingPesan.classList.toggle('d-none')
                btnSubmitPesan.classList.toggle('d-none')
            } else {
                Swal.fire({
                    title: "Dibatalkan!",
                    text: "Pesan Batal Dikirim",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1300
                })
            }
        })
    })
</script>