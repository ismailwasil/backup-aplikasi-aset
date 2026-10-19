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
		url: pathDocNotif,
		type: "GET",
		dataType: "json",
		success: function (data) {
			// Lakukan sesuatu dengan data yang diterima dari server
			if (data.jmlproses === 0) {
				$("#bell").addClass("d-none");
			} else {
				$("#bell").removeClass("d-none");
				if ($("#notif").html() < data.jmlproses) {
					notify(
						'<i class="fa fa-fw fa-cloud-download"></i> Terdapat SPM masuk'
					);
					playNotificationSound();
				}
			}
			$("#notif").html(data.jmlproses);
			$("#notif-list").html(data.jmlproses);
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
