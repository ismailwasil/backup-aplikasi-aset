/*
 * Kalender aset berbasis Flatpickr (pengganti FullCalendar).
 *
 * Variabel global yang dibaca (diisi di halaman PHP, sama seperti sebelumnya):
 *   get_event_sewa           URL JSON event (wajib), mis. lasada/get_events/5
 *   modal_item               selector modal form booking, mis. "#Bus-Pemda" (halaman pengguna)
 *   kalender_hanya_lihat     true = tanpa pilih tanggal/booking (halaman admin)
 *   kalender_akhir_eksklusif true = #tanggal-akhir diisi hari setelah tanggal terakhir
 *                            (perilaku lama halaman admin; default false)
 */
(function () {
	"use strict";

	var WARNA_LAMPAU = "#cf3a69"; // sama dengan warna event lampau di versi FullCalendar
	var WARNA_AKTIF = "#3a87ad"; // warna bawaan event FullCalendar

	/* ---------- Fungsi tanggal ---------- */
	function tgl(s) {
		var p = String(s).slice(0, 10).split("-");
		return new Date(+p[0], +p[1] - 1, +p[2]);
	}
	function tambahHari(d, n) {
		return new Date(d.getFullYear(), d.getMonth(), d.getDate() + n);
	}
	function ymd(d) {
		return (
			d.getFullYear() +
			"-" +
			String(d.getMonth() + 1).padStart(2, "0") +
			"-" +
			String(d.getDate()).padStart(2, "0")
		);
	}
	function hariIni() {
		var t = new Date();
		return new Date(t.getFullYear(), t.getMonth(), t.getDate());
	}

	// Rentang jam pemesanan, mis. "08:00-16:00" (kosong bila event tidak punya jam)
	function jamEvent(ev) {
		var a =
			String(ev.start || "").length >= 16 ? String(ev.start).slice(11, 16) : "";
		var b =
			String(ev.end || "").length >= 16 ? String(ev.end).slice(11, 16) : "";
		if (!a || (a === "00:00" && (!b || b === "00:00"))) return "";
		return b && b !== a ? a + "-" + b : a;
	}

	// Ubah event {start, end} menjadi rentang hari inklusif [s, f].
	// Aturan sama dengan FullCalendar: akhir tanpa jam, atau tepat 00:00, tidak ikut dihitung.
	function normalisasi(ev) {
		var s = tgl(ev.start);
		var f = ev.end ? tgl(ev.end) : s;
		if (ev.end && f > s) {
			var teks = String(ev.end);
			if (teks.length <= 10 || /\s00:00(:00)?$/.test(teks))
				f = tambahHari(f, -1);
		}
		return { s: s, f: f, e: ev, lampau: f < hariIni() };
	}

	/* ---------- Pembantu tampilan ---------- */
	function pasangGaya() {
		if (document.getElementById("gaya-kalender-aset")) return;
		var css =
			".flatpickr-calendar.inline{width:100%;max-width:100%;box-shadow:none}" +
			// tambahan dari saya
			// ----- Header nama hari (Min, Sen, ..., Sab) -----
			".flatpickr-calendar .flatpickr-weekdays{background:#198754;border-radius:6px;height:36px}" +
			".flatpickr-calendar span.flatpickr-weekday{color:#fff;font-size:1.25em;font-weight:700;letter-spacing:.3px}" +
			".flatpickr-calendar span.flatpickr-weekday:first-child{color:#fc96af;height:auto}" +
			// ----- Navigator bulan (nama bulan, tahun, dan panah) -----
			".flatpickr-calendar .flatpickr-current-month{font-size:1.5em;font-weight:700}" +
			".flatpickr-calendar .flatpickr-current-month .flatpickr-monthDropdown-months{font-weight:700;color:#198754}" +
			".flatpickr-calendar .flatpickr-current-month input.cur-year{font-weight:700;color:#198754}" +
			".flatpickr-calendar .flatpickr-months .flatpickr-prev-month,.flatpickr-calendar .flatpickr-months .flatpickr-next-month{color:#198754;fill:#198754}" +
			".flatpickr-calendar .flatpickr-months .flatpickr-prev-month svg,.flatpickr-calendar .flatpickr-months .flatpickr-next-month svg{width:18px;height:18px}" +
			".flatpickr-calendar .flatpickr-months .flatpickr-prev-month svg path,.flatpickr-calendar .flatpickr-months .flatpickr-next-month svg path{fill:#198754;stroke:#198754;stroke-width:1.5}" +
			".flatpickr-calendar .flatpickr-months .flatpickr-prev-month:hover svg path,.flatpickr-calendar .flatpickr-months .flatpickr-next-month:hover svg path{fill:#0f5132;stroke:#0f5132}" +
			// ----- Cell Hari -----
			".flatpickr-calendar .flatpickr-day{font-weight: bold;font-size: 1.15em;}" +
			// tambahan dari saya
			".flatpickr-calendar.inline .flatpickr-innerContainer," +
			".flatpickr-calendar.inline .flatpickr-rContainer," +
			".flatpickr-calendar.inline .flatpickr-days," +
			".flatpickr-calendar.inline .dayContainer{width:100%;min-width:100%;max-width:100%}" +
			".flatpickr-calendar.inline .flatpickr-day{max-width:none;height:56px;line-height:1.15;display:flex;flex-direction:column;align-items:center;justify-content:center}" +
			".flatpickr-calendar .flatpickr-days{user-select:none;-webkit-user-select:none}" +
			".flatpickr-calendar .flatpickr-day .jam{display:block;max-width:100%;font-size:10px;font-weight:600;line-height:1.1;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}" +
			"@media (max-width:576px){.flatpickr-calendar .flatpickr-day .jam{font-size:8px}}" +
			".flatpickr-calendar .flatpickr-day.minggu:not(.selected):not(.startRange):not(.endRange):not(.booked){color:#dc3545}" +
			".flatpickr-calendar .flatpickr-day.minggu.prevMonthDay,.flatpickr-calendar .flatpickr-day.minggu.nextMonthDay{opacity:.65}" +
			".flatpickr-calendar .flatpickr-day.booked.minggu .nomor{background:#fff;color:#dc3545;border-radius:999px;min-width:1.6em;height:1.6em;line-height:1.6em}" +
			".flatpickr-calendar .flatpickr-day.flatpickr-disabled.booked{background:" +
			WARNA_AKTIF +
			";border-color:" +
			WARNA_AKTIF +
			";color:#fff;cursor:pointer}" +
			".flatpickr-calendar .flatpickr-day.flatpickr-disabled.booked.lampau{background:" +
			WARNA_LAMPAU +
			";border-color:" +
			WARNA_LAMPAU +
			"}" +
			".flatpickr-calendar .flatpickr-day.flatpickr-disabled.booked:hover{filter:brightness(1.1)}" +
			".flatpickr-calendar .flatpickr-day.flatpickr-disabled.booked.prevMonthDay," +
			".flatpickr-calendar .flatpickr-day.flatpickr-disabled.booked.nextMonthDay{opacity:.6}" +
			".kalender-legenda span.kotak{display:inline-block;width:12px;height:12px;border-radius:3px;margin:0 4px -1px 10px}";
		var st = document.createElement("style");
		st.id = "gaya-kalender-aset";
		st.textContent = css;
		document.head.appendChild(st);
	}

	function bukaModal(selector) {
		var el = selector && document.querySelector(selector);
		if (!el) return;
		// Pakai jalur yang sama seperti kode lama ($(...).modal) bila tersedia
		if (window.jQuery && window.jQuery.fn && window.jQuery.fn.modal) {
			window.jQuery(el).modal("show");
		} else if (window.bootstrap && window.bootstrap.Modal) {
			(
				window.bootstrap.Modal.getInstance(el) || new window.bootstrap.Modal(el)
			).show();
		}
	}

	function isiTeks(id, teks) {
		var el = document.getElementById(id);
		if (el) el.textContent = teks;
	}

	// Isi modal detail pemesanan (sama seperti eventClick di versi FullCalendar)
	function tampilDetail(ev) {
		isiTeks("modal-event-acara", ev.title);
		isiTeks("modal-event-date", ymd(tgl(ev.start)));
		var desk = document.getElementById("modal-event-desc");
		if (desk)
			desk.innerHTML = (ev.description || "Tidak ada deskripsi").replace(
				/\n/g,
				"<br>"
			);
		var status =
			ev.id_status == 1 ? "PROSES" : ev.id_status == 3 ? "DIPESAN" : "DITOLAK";
		isiTeks("modal-event-status", status);
		var idEl = document.getElementById("event-id");
		if (idEl) idEl.value = ev.id;
		bukaModal("#eventDetailModal");
	}

	/* ---------- Inisialisasi ---------- */
	function init(cfg) {
		var box = document.getElementById("calendar");
		if (!box || typeof flatpickr === "undefined" || !cfg.url) return;
		pasangGaya();

		var events = [];
		function padaHari(d) {
			return events.filter(function (r) {
				return d >= r.s && d <= r.f;
			});
		}
		function bentrok(a, b) {
			return events.some(function (r) {
				return a <= r.f && b >= r.s;
			});
		}
		function pilihDetail(hits) {
			if (hits.length === 1) return tampilDetail(hits[0].e);
			var opsi = {};
			hits.forEach(function (r) {
				opsi[r.e.id] = r.e.title;
			});
			Swal.fire({
				title: "Ada beberapa pemesanan",
				input: "select",
				inputOptions: opsi,
				showCancelButton: true,
				confirmButtonText: "Lihat",
				cancelButtonText: "Batal",
			}).then(function (hasil) {
				if (!hasil.isConfirmed) return;
				hits.forEach(function (r) {
					if (String(r.e.id) === String(hasil.value)) tampilDetail(r.e);
				});
			});
		}

		var input = document.createElement("input");
		input.type = "text";
		input.style.display = "none";
		input.setAttribute("aria-hidden", "true");
		box.appendChild(input);

		var lokal = "default";
		if (flatpickr.l10ns && flatpickr.l10ns.id) {
			lokal = Object.assign({}, flatpickr.l10ns.id, { firstDayOfWeek: 0 }); // minggu pertama = Minggu, seperti FullCalendar
		}

		var fp = flatpickr(input, {
			inline: true,
			mode: "range",
			locale: lokal,
			// minDate: "today", // aktifkan bila tanggal lampau tidak boleh dipilih
			// Tanggal yang sudah terbooking dinonaktifkan sehingga tidak bisa dipilih
			disable: [
				function (d) {
					return padaHari(d).length > 0;
				},
			],
			onDayCreate: function (a, b, inst, el) {
				if (el.dateObj.getDay() === 0) el.classList.add("minggu"); // Minggu = angka merah
				var hits = padaHari(el.dateObj);
				if (!hits.length) return;
				el.classList.add("booked");
				if (
					hits.every(function (r) {
						return r.lampau;
					})
				)
					el.classList.add("lampau");
				el.title = hits
					.map(function (r) {
						return r.e.title;
					})
					.join(", ");
				// Tampilkan angka tanggal dan jam pemesanan di dalam sel (maks. 2 jam, sisanya "+n")
				var jam = hits
					.slice(0, 2)
					.map(function (r) {
						return jamEvent(r.e);
					})
					.filter(Boolean);
				if (hits.length > 2) jam.push("+" + (hits.length - 2));
				el.textContent = "";
				var nomor = document.createElement("span");
				nomor.className = "nomor";
				nomor.textContent = el.dateObj.getDate();
				el.appendChild(nomor);
				jam.forEach(function (j) {
					var t = document.createElement("span");
					t.className = "jam";
					t.textContent = j;
					el.appendChild(t);
				});
				el.setAttribute("role", "button");
				el.tabIndex = 0;
				// Hari yang dinonaktifkan tetap bisa diklik untuk melihat detail
				el.addEventListener("click", function (e) {
					e.stopPropagation();
					pilihDetail(hits);
				});
				el.addEventListener("keydown", function (e) {
					if (e.key === "Enter" || e.key === " ") {
						e.preventDefault();
						pilihDetail(hits);
					}
				});
			},
			onChange: function (sel, str, inst) {
				if (cfg.hanyaLihat) return inst.clear(false);
				if (!sel.length) return;
				// Jalur papan ketik (Enter pada tanggal); mouse dan sentuh ditangani pointer di bawah
				pilihRentang(sel[0], sel[sel.length - 1]);
			},
		});

		/* ---------- Pilih tanggal: sekali klik = 1 hari, tahan lalu geser = rentang ---------- */
		function limpiar() {
			Array.prototype.forEach.call(
				fp.days ? fp.days.childNodes : [],
				function (el) {
					el.classList.remove("selected", "startRange", "endRange", "inRange");
				}
			);
		}
		function sorot(a, b) {
			Array.prototype.forEach.call(fp.days.childNodes, function (el) {
				var d = el.dateObj;
				if (!d) return;
				el.classList.toggle("inRange", d > a && d < b);
				el.classList.toggle("startRange", +d === +a);
				el.classList.toggle("endRange", +d === +b);
				el.classList.toggle("selected", +d === +a || +d === +b);
			});
		}
		function pilihRentang(awal, akhir) {
			if (bentrok(awal, akhir)) {
				Swal.fire({
					icon: "warning",
					title: "Tanggal sudah terbooking",
					text: "Silakan pilih tanggal lain yang masih tersedia.",
				});
				limpiar();
				fp.clear(false);
				return;
			}
			sorot(awal, akhir);
			var elAwal = document.getElementById("tanggal-awal");
			var elAkhir = document.getElementById("tanggal-akhir");
			if (elAwal) elAwal.value = ymd(awal);
			if (elAkhir)
				elAkhir.value = ymd(cfg.akhirEksklusif ? tambahHari(akhir, 1) : akhir);
			// ditunda sedikit agar klik yang sedang berjalan tidak menutup modal
			setTimeout(function () {
				bukaModal(cfg.modal);
			}, 0);
		}

		if (!cfg.hanyaLihat) {
			var cont = fp.daysContainer;
			cont.style.touchAction = "pan-y"; // geser mendatar = pilih rentang, geser menurun = gulir halaman
			// Cegah mode rentang bawaan Flatpickr; tanggal terbooking tetap bisa diklik untuk detail
			cont.addEventListener(
				"click",
				function (e) {
					if (!(e.target.closest && e.target.closest(".booked")))
						e.stopPropagation();
				},
				true
			);
			cont.addEventListener("pointerdown", function (e) {
				if (e.button > 0) return;
				var el = e.target.closest && e.target.closest(".flatpickr-day");
				if (!el || !el.dateObj || el.classList.contains("flatpickr-disabled"))
					return;
				var jangkar = el.dateObj;
				var ujung = jangkar;
				sorot(jangkar, jangkar);
				function urut() {
					return jangkar <= ujung ? [jangkar, ujung] : [ujung, jangkar];
				}
				function gerak(ev) {
					var t = document.elementFromPoint(ev.clientX, ev.clientY);
					var h = t && t.closest && t.closest(".flatpickr-day");
					if (!h || !h.dateObj) return;
					// berhenti sebelum tanggal yang sudah terbooking
					var arah = h.dateObj >= jangkar ? 1 : -1;
					var cur = jangkar;
					while (+cur !== +h.dateObj) {
						var nx = tambahHari(cur, arah);
						if (padaHari(nx).length) break;
						cur = nx;
					}
					if (+cur === +ujung) return;
					ujung = cur;
					var r = urut();
					sorot(r[0], r[1]);
				}
				function bersihkan() {
					document.removeEventListener("pointermove", gerak);
					document.removeEventListener("pointerup", lepas);
					document.removeEventListener("pointercancel", batal);
				}
				function lepas() {
					bersihkan();
					var r = urut();
					pilihRentang(r[0], r[1]);
				}
				function batal() {
					bersihkan();
					limpiar();
				}
				document.addEventListener("pointermove", gerak);
				document.addEventListener("pointerup", lepas);
				document.addEventListener("pointercancel", batal);
			});
		}

		// Tombol "Hari ini" (pengganti tombol today FullCalendar) dan keterangan warna
		var bawah = document.createElement("div");
		bawah.className = "kalender-legenda text-center mt-2";
		var tombol = document.createElement("button");
		tombol.type = "button";
		tombol.className = "btn btn-sm btn-outline-secondary";
		tombol.textContent = "Hari ini";
		tombol.addEventListener("click", function () {
			fp.jumpToDate(new Date());
		});
		bawah.appendChild(tombol);
		var ket = document.createElement("small");
		ket.innerHTML =
			'<span class="kotak" style="background:' +
			WARNA_AKTIF +
			'"></span>Terbooking' +
			'<span class="kotak" style="background:' +
			WARNA_LAMPAU +
			'"></span>Sudah lewat';
		bawah.appendChild(ket);
		box.appendChild(bawah);

		// Kosongkan pilihan setelah modal booking ditutup
		var modalEl = cfg.modal && document.querySelector(cfg.modal);
		if (modalEl)
			modalEl.addEventListener("hidden.bs.modal", function () {
				limpiar();
				fp.clear(false);
			});

		// Konfirmasi booking: dipasang sekali (kode lama menumpuk handler tiap pilih tanggal)
		var btnAjukan = document.getElementById("ajukan_booking");
		if (btnAjukan && !cfg.hanyaLihat) {
			btnAjukan.addEventListener("click", function (e) {
				e.preventDefault();
				Swal.fire({
					icon: "question",
					title: "Anda Yakin Booking?",
					showCancelButton: true,
					confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
					cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
					reverseButtons: false,
					cancelButtonColor: "#DD6B55",
				}).then(function (hasil) {
					if (hasil.isConfirmed) {
						var form = document.getElementById("form_pesan");
						if (window.jQuery) window.jQuery(form).trigger("submit");
						else form.submit();
						var load = document.querySelector(".btn-loading");
						var kirim = document.querySelector(".btn-kirim");
						if (load) load.classList.toggle("d-none");
						if (kirim) kirim.classList.toggle("d-none");
					} else {
						Swal.fire({
							title: "Dibatalkan!",
							text: "Data batal ditambahkan",
							icon: "error",
							showConfirmButton: false,
							timer: 1300,
						});
					}
				});
			});
		}

		// Ambil data event dari server, lalu gambar ulang kalender
		fetch(cfg.url, { credentials: "same-origin" })
			.then(function (r) {
				return r.json();
			})
			.then(function (daftar) {
				events = (daftar || []).map(normalisasi);
				fp.redraw();
			})
			.catch(function (err) {
				console.error("Gagal memuat jadwal:", err);
			});
	}

	window.KalenderAset = {
		init: init,
		_uji: {
			tgl: tgl,
			ymd: ymd,
			normalisasi: normalisasi,
			tambahHari: tambahHari,
			jamEvent: jamEvent,
		},
	};

	document.addEventListener("DOMContentLoaded", function () {
		if (typeof get_event_sewa === "undefined") return;
		init({
			url: get_event_sewa,
			modal: typeof modal_item !== "undefined" ? modal_item : null,
			hanyaLihat:
				typeof kalender_hanya_lihat !== "undefined" && kalender_hanya_lihat,
			akhirEksklusif:
				typeof kalender_akhir_eksklusif !== "undefined" &&
				kalender_akhir_eksklusif,
		});
	});
})();
