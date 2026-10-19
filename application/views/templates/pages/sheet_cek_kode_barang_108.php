<div class="page-heading">
    <button onclick="kembaliDanHapus()" class="btn btn-danger btn-block btn-sm">
        <i class="fa fa-fw fa-arrow-left"></i> Klik Kembali ke Halaman Utama
    </button>
    <script>
        function kembaliDanHapus() {
            localStorage.clear();
            window.location.href = "<?= base_url('auth') ?>";
        }
    </script>
    <style>
        .responsive-iframe-container-mod {
            width: 100%;
            overflow: auto;
        }

        .responsive-iframe-container-mod iframe {
            width: 100%;
            height: 95vh;
            border: none;
        }
    </style>
    <div class="responsive-iframe-container-mod">
        <iframe
            src="https://docs.google.com/spreadsheets/d/1MCaA89OdQJwGPfXhT-Z5GzJG2kkoAoY71JXyoWd9QXE/edit?usp=sharing">
        </iframe>
    </div>
</div>