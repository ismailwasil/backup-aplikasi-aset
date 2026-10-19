// Persiapan JQuery
$(document).ready(function () {
	var calendar = $("#calendar").fullCalendar({
		// Pengaturan lainnya
		eventRender: function (event, element) {
			// Cek apakah event sudah lewat hari ini
			var today = moment().startOf("day");
			var eventEnd = event.end
				? moment(event.end)
				: moment(event.start).clone().add(1, "days");

			if (eventEnd.isBefore(today)) {
				// Set warna abu-abu untuk event lampau
				element.css({
					border: "none",
					"background-color": "#cf3a69",
					color: "#ffffff", // teks tetap terbaca
				});
			} else {
				// Event aktif (masa depan atau hari ini)
				// none
			}
			// Pastikan elemen event memenuhi kotak
			element.css({
				width: "100%", // Lebar penuh
				height: "100%", // Tinggi penuh
				"font-size": "12px", // Set ukuran font
				"text-align": "center", // Menyusun teks di tengah
				padding: "5px", // Menambahkan padding
				"box-sizing": "border-box", // Pastikan padding dan border masuk dalam perhitungan ukuran
				display: "flex", // Memastikan konten berada di tengah
				"align-items": "center",
				"justify-content": "center",
				"border-radius": "4px",
			});

			// Jika menggunakan icon atau elemen tambahan di dalam event
			element.find(".fc-title").css({
				"word-wrap": "break-word", // Supaya teks panjang bisa wrap
				"white-space": "normal", // Allow multiline text
			});
		},
		// editable table, event bisa digeser2
		// editable: true,
		// atur header calendar
		header: {
			left: "prev, next today",
			right: "title",
			// right: 'month, agendaWeek, agendaDay '
		},
		// tampilkan data dari database
		events: get_event_sewa, //path dari halaman (bpu, sewa bus, dll)
		// izinkan tanggal bisa dipilih
		selectable: true,
		selectHelper: true,
		select: function (start, end, allDay) {
			// Cek bentrok dengan event
			var events = $("#calendar").fullCalendar("clientEvents");
			var overlap = false;

			for (var i = 0; i < events.length; i++) {
				var eventStart = moment(events[i].start);
				var eventEnd = moment(
					events[i].end || events[i].start.clone().add(1, "days")
				);

				// Cek jika range bertabrakan
				if (start.isBefore(eventEnd) && end.isAfter(eventStart)) {
					overlap = true;
					break;
				}
			}

			if (overlap) {
				Swal.fire({
					icon: "warning",
					title: "Tanggal sudah terbooking",
					text: "Silakan pilih tanggal lain yang masih tersedia.",
				});
				return false;
			}

			// Jika tidak bentrok, lanjut buka modal
			$(modal_item).modal("show");
			// Tampung tgl yg dipilih ke dalam varible start dan end
			var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
			var selectedEndDate = moment(end);
			var endDay = selectedEndDate.subtract(1, "days").format("Y-MM-DD");

			// Isi nilai input tanggal acara dengan variabel JavaScript
			$("#tanggal-awal").val(start);
			$("#tanggal-akhir").val(endDay);

			const btnSubmit = document.querySelector(".btn-kirim");
			const btnLoading = document.querySelector(".btn-loading");
			// Tangkap form saat submit
			$("#ajukan_booking").on("click", function (event) {
				event.preventDefault();

				Swal.fire({
					icon: "question",
					title: "Anda Yakin Booking?",
					showCancelButton: true,
					confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
					cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
					reverseButtons: false,
					cancelButtonColor: "#DD6B55",
				}).then((result) => {
					if (result.isConfirmed) {
						$("#form_pesan").submit();
						btnLoading.classList.toggle("d-none");
						btnSubmit.classList.toggle("d-none");
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
		},
		// Saat event diklik
		eventClick: function (event, jsEvent, view) {
			// Isi modal dengan data dari event
			$("#modal-event-acara").text(event.title);
			$("#modal-event-date").text(moment(event.start).format("YYYY-MM-DD"));
			$("#modal-event-desc").html(
				(event.description || "Tidak ada deskripsi").replace(/\n/g, "<br>")
			);
			let status_pesan = "";
			event.id_status == 1
				? (status_pesan = "PROSES")
				: event.id_status == 3
				? (status_pesan = "DIPESAN")
				: (status_pesan = "DITOLAK");
			$("#modal-event-status").text(status_pesan);

			// Simpan ID event ke dalam modal
			$("#event-id").val(event.id); // menyimpan ID event

			// Tampilkan modal
			$("#eventDetailModal").modal("show");
		},
	});
});
