// Menggunakan JQuery
function notify(nilai) {
	Toastify({
		text: nilai,
		duration: 5000,
		close: true,
		gravity: "center",
		position: "center",
		backgroundColor: "linear-gradient(to right, #B611CF, #CF1D23)",
	}).showToast();
}

function UpdateNotif() {
	$.ajax({
		url: pathDocNotifUser,
		type: "GET",
		dataType: "json",
		success: function (data) {
			var tot = data.proses + data.tolak;
			// Lakukan sesuatu dengan data yang diterima dari server
			if (data.proses < $("#notif-proses").html()) {
				if (data.tolak > $("#notif-tolak").html()) {
					notify('<i class="fa fa-fw fa-ban"></i> Ada SPM ditolak');
					playNotificationSound();
				} else {
					notify('<i class="fa fa-fw fa-angellist"></i> Ada SPM diverifikasi');
					playNotificationSound();
				}
			} else {
				// nothing
			}
			if (tot == 0) {
				$("#bell-user").addClass("d-none");
			} else {
				$("#bell-user").removeClass("d-none");
			}
			$("#notif-user").html(tot);
			$("#notif-proses").html(data.proses);
			$("#notif-tolak").html(data.tolak);
		},
		error: function (xhr, status, error) {
			console.error(xhr.responseText);
		},
	});
}

// Panggil fungsi updateNotif() untuk pertama kali saat halaman dimuat
// UpdateNotif();
// Panggil fungsi setiap beberapa waktu
setInterval(UpdateNotif, 2000); // Contoh: perbarui setiap 2 detik
