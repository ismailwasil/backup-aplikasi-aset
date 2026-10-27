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
	// tabel SPM server-side (paging/search di database)
	if (typeof initSpmServerTables === "function" && document.querySelector("table[data-ssp-url]")) {
		initSpmServerTables(dataLive);
		return;
	}
	let table1 = document.querySelector("#table1");
	if (table1) new simpleDatatables.DataTable(table1);
}

/**
 * Tabel SPM server-side (DataTables). Tabel cukup diberi atribut:
 *   data-ssp-url="..."  data-ssp-noorder="0,5"  data-ssp-left="2"  data-base="<?= base_url() ?>"
 * Panggil initSpmServerTables() setelah tabel ada di DOM (juga setelah innerHTML diganti).
 */
(function () {
	function esc(s) {
		return String(s == null ? "" : s).replace(/[&<>"']/g, function (c) {
			return { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" }[c];
		});
	}
	function nums(s) {
		return (s || "").split(",").filter(function (x) { return x !== ""; }).map(Number);
	}

	window.initSpmServerTables = function (root) {
		(root || document).querySelectorAll("table[data-ssp-url]").forEach(function (tbl) {
			if (tbl.dataset.sspInit) return;
			tbl.dataset.sspInit = "1";

			var url = tbl.dataset.sspUrl;
			var n = tbl.querySelectorAll("thead th").length;
			var noorder = nums(tbl.dataset.sspNoorder);
			var left = nums(tbl.dataset.sspLeft);
			var columns = [];
			for (var i = 0; i < n; i++) {
				columns.push({
					data: i,
					orderable: noorder.indexOf(i) < 0,
					className: left.indexOf(i) >= 0 ? "" : "text-center",
				});
			}

			new DataTable(tbl, {
				serverSide: true,
				processing: true,
				searchDelay: 400,
				order: [],
				pageLength: 10,
				lengthMenu: [10, 25, 50, 100],
				columns: columns,
				ajax: function (d, callback) {
					var p = new URLSearchParams({
						draw: d.draw,
						start: d.start,
						length: d.length,
						search: d.search ? d.search.value : "",
					});
					if (d.order && d.order.length) {
						p.set("order_col", d.order[0].column);
						p.set("order_dir", d.order[0].dir);
					}
					fetch(url + (url.indexOf("?") > -1 ? "&" : "?") + p.toString(), { credentials: "same-origin" })
						.then(function (r) { if (!r.ok) throw new Error("HTTP " + r.status); return r.json(); })
						.then(callback)
						.catch(function (e) {
							console.error("SPM server-side:", e);
							callback({ draw: d.draw, recordsTotal: 0, recordsFiltered: 0, data: [] });
						});
				},
			});
		});
	};

	// Aksi per baris dipasang SEKALI lewat event delegation (tidak ada script/modal per baris lagi)
	if (!window.__spmDelegated) {
		window.__spmDelegated = true;
		var baseOf = function (el) {
			var t = el.closest("table");
			return (t && t.dataset.base) || "";
		};
		var hapus = function (base, id) {
			if (confirm("Anda Yakin Menghapus SPM ini?\n" + id)) {
				window.location.href = base + "auth/hapus_SPM/" + id;
			} else if (window.Swal) {
				Swal.fire({ title: "Dibatalkan!", text: "SPM batal dihapus", icon: "error", showConfirmButton: false, timer: 1500 });
			}
		};

		document.addEventListener("click", function (e) {
			var h = e.target.closest(".spm-hapus");
			if (h) { e.preventDefault(); hapus(baseOf(h), h.dataset.id); return; }

			var c = e.target.closest(".spm-lihat-catatan");
			if (c) {
				e.preventDefault();
				var base = baseOf(c), id = c.dataset.id;
				var catatan = esc(c.dataset.catatan).replace(/&lt;br\s*\/?&gt;/gi, "<br>");
				Swal.fire({
					icon: "error",
					title: "Ditolak",
					html: '<p>Catatan:</p><p style="color:#c0392b;font-size:1.1rem">' + catatan + "</p>",
					showCloseButton: true,
					showCancelButton: true,
					confirmButtonText: "Ajukan Ulang",
					cancelButtonText: "Hapus SPM",
					confirmButtonColor: "#198754",
					cancelButtonColor: "#dc3545",
				}).then(function (r) {
					if (r.isConfirmed || r.value === true) {
						if (confirm("Anda Yakin Mengajukan ulang SPM ini?\nApakah SPM ini sudah diperbaiki?\n" + id)) {
							window.location.href = base + "auth/ajukan_ulang/" + id;
						}
					} else if (r.dismiss === "cancel") {
						hapus(base, id);
					}
				});
			}
		});
	}
})();
