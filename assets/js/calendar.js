// Mendapatkan referensi elemen-elemen yang dibutuhkan
var calendar = document.getElementById("calendar");
var eventModal = document.getElementById("eventLasada");
var eventTitle = document.getElementById("eventTitle");
var saveEventBtn = document.getElementById("saveEvent");
var closeBtn = document.getElementsByClassName("close")[0];
var prevMonthBtn = document.getElementById("prevMonth");
var nextMonthBtn = document.getElementById("nextMonth");
var monthYear = document.getElementById("monthYear");
var selectMonth = document.getElementById("selectMonth");
var selectYear = document.getElementById("selectYear");
var eventDetails = document.getElementById("eventDetails");

// Membuat objek Date untuk tanggal saat ini
var currentDate = new Date();

// Memanggil fungsi untuk menampilkan kalender
showCalendar(currentDate.getMonth(), currentDate.getFullYear());

// Fungsi untuk menampilkan kalender
function showCalendar(month, year) {
	// Daftar bulan dan hari
	var monthNames = [
		"Januari",
		"Februari",
		"Maret",
		"April",
		"Mei",
		"Juni",
		"Juli",
		"Agustus",
		"September",
		"Oktober",
		"November",
		"Desember",
	];
	var dayNames = [
		"Minggu",
		"Senin",
		"Selasa",
		"Rabu",
		"Kamis",
		"Jumat",
		"Sabtu",
	];

	// Mengatur tanggal menjadi 1 pada bulan yang diberikan
	var firstDay = new Date(year, month, 1);

	// Mendapatkan hari dari tanggal tersebut
	var startingDay = firstDay.getDay();

	// Menghitung jumlah hari dalam bulan yang diberikan
	var monthLength = new Date(year, month + 1, 0).getDate();

	// Membuat tabel untuk menampilkan kalender
	var calendarHTML = '<table class="tbl">';
	calendarHTML +=
		'<caption><h4><span class="badge rounded-pill bg-light-primary" onclick="prevMonth()" style="cursor: pointer;"><i class="fa fa-fw fa-lg fa-angle-left"></i></span>' +
		" " +
		monthNames[month] +
		" " +
		year +
		" " +
		'<span class="badge rounded-pill bg-light-primary" onclick="nextMonth()" style="cursor: pointer;"><i class="fa fa-fw fa-lg fa-angle-right"></i></span></h4></caption>';
	calendarHTML += '<tr class="trCal th">';

	// Menampilkan nama-nama hari
	for (var i = 0; i < 7; i++) {
		calendarHTML += '<th class="thCal">' + dayNames[i] + "</th>";
	}
	calendarHTML += '</tr><tr class="trCal">';

	var day = 1;
	// Mengisi sel-sel dalam tabel dengan tanggal
	for (var i = 0; i < 9; i++) {
		for (var j = 0; j < 7; j++) {
			if (day <= monthLength && (i > 0 || j >= startingDay)) {
				calendarHTML +=
					'<td class="tdCal" style="background:#9694ff46;"><span style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#eventLasada' +
					year +
					"-" +
					month +
					"-" +
					day +
					'">' +
					day +
					"</span></td>";
				day++;
			} else {
				calendarHTML += '<td class="tdCal" style="background:#aaaaaa31;"></td>';
			}
		}
		// Mengakhiri baris setiap minggu
		if (day > monthLength) {
			break;
		} else {
			calendarHTML += '</tr><tr class="trCal">';
		}
	}
	calendarHTML += "</tr></table>";

	// Menampilkan tabel kalender
	calendar.innerHTML = calendarHTML;

	// Menampilkan bulan dan tahun saat ini
	monthYear.innerHTML = monthNames[month] + " " + year;
}

// Coba sendiri

// Fungsi untuk menampilkan modal acara
function showEventModal(day, month, year) {
	var idbaru = "eventLasada" + year + "-" + month + "-" + day;
	eventModal.id = idbaru;
}

// Fungsi untuk menyimpan data acara ke database
function saveEvent(title, day, month, year) {
	// Lakukan operasi penyimpanan ke database di sini
	// ...

	console.log("Acara disimpan: " + title);
}

// Fungsi untuk menampilkan detail acara pada hari yang dipilih
function showEventDetails(day, month, year) {
	// Ambil data acara dari database berdasarkan tanggal yang dipilih
	var eventData = getEventData(day, month, year);

	// Menampilkan detail acara pada elemen eventDetails
	if (eventData) {
		eventDetails.innerHTML =
			"<h3>" +
			day +
			" " +
			monthNames[month] +
			" " +
			year +
			"</h3>" +
			"<p>" +
			eventData.title +
			"</p>";
	} else {
		eventDetails.innerHTML =
			"<h3>" +
			day +
			" " +
			monthNames[month] +
			" " +
			year +
			"</h3>" +
			"<p>Tidak ada acara pada tanggal ini.</p>";
	}
}

// Fungsi untuk mendapatkan data acara dari database
function getEventData(day, month, year) {
	// Lakukan pengambilan data acara dari database di sini
	// ...

	// Contoh data acara sementara
	var eventData = {
		title: "Acara Penting",
		date: day + " " + monthNames[month] + " " + year,
	};

	return eventData;
}

// Fungsi untuk menampilkan bulan sebelumnya
// prevMonthBtn.onclick = function () {
function prevMonth() {
	currentDate.setMonth(currentDate.getMonth() - 1);
	var month = currentDate.getMonth();
	var year = currentDate.getFullYear();
	showCalendar(month, year);
}

// Fungsi untuk menampilkan bulan berikutnya
// nextMonthBtn.onclick = function () {
function nextMonth() {
	currentDate.setMonth(currentDate.getMonth() + 1);
	var month = currentDate.getMonth();
	var year = currentDate.getFullYear();
	showCalendar(month, year);
}

// Fungsi untuk menampilkan kalender berdasarkan bulan dan tahun yang dipilih
function showSelectedMonthYear() {
	var selectedMonth = parseInt(selectMonth.value);
	var selectedYear = parseInt(selectYear.value);
	currentDate.setMonth(selectedMonth);
	currentDate.setFullYear(selectedYear);
	showCalendar(selectedMonth, selectedYear);
}

// Menambahkan event listener untuk perubahan bulan dan tahun yang dipilih
selectMonth.addEventListener("change", showSelectedMonthYear);
selectYear.addEventListener("change", showSelectedMonthYear);
