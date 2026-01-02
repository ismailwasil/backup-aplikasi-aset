var selectTahun = document.getElementById("tahunLive");
var dataLive = document.getElementById("dataLive");
var btnLoader = document.getElementById("loader");

selectTahun.addEventListener("change", function () {
	// var tahun = selectTahun.value;
	// alert("Ya kamu mengubahnya menjadi " + pathDoc + tahun);

	// Munculkan loader saat tahun diubah
	btnLoader.classList.toggle("d-none");

	var tahun = selectTahun.value;
	var date = new Date();
	var tahunIni = date.getFullYear();

	// buat object ajax
	var ajax = new XMLHttpRequest();
	// cek kesiapan ajax
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4 && ajax.status == 200) {
			if (tahun == tahunIni) {
				window.location.reload();
			} else {
				dataLive.innerHTML = ajax.responseText;
				// Inisialisasi Datatable setelah konten dimuat
				initializeDatatable(); // Panggil fungsi inisialisasi Datatable
				// hilangkan loader saat data berhasil dimuat sepenuhnya
				btnLoader.classList.toggle("d-none");
			}
		}
	};
	// eksekusi ajax
	ajax.open("GET", pathDoc + tahun, true);
	ajax.send();
});

// Fungsi inisialisasi Datatable
function initializeDatatable() {
	let table1 = document.querySelector("#table1");
	let dataTable = new simpleDatatables.DataTable(table1);
}
