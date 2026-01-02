<style>
    .responsive-iframe-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        /* Adjust this value based on the aspect ratio of your iframe (height/width) */
        overflow: hidden;
    }

    .responsive-iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<?= $this->session->flashdata('message'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Layanan Lainnya</h3>
                <p class="text-subtitle text-muted">Layanan Bidang Pengelolaan Aset</p>

            </div>
        </div>
    </div>
    <section class="section">
        <div id="maps">
            <div class="responsive-iframe-container">
                <iframe src="https://www.google.com/maps/d/embed?mid=15JKhq5Khli9Y2VgFYb7fF2l8NWy1tH8&ehbc=2E312F" width="640" height="480"></iframe>
            </div>
        </div>
    </section>
</div>