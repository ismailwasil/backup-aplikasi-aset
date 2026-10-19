function angkaKeTerbilang(nominal) {
	nominal = nominal.toString();

	if (!/^\d+(\.\d+)?$/.test(nominal)) return "";

	const satuan = [
		"",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan",
	];
	const tingkat = [
		"",
		"ribu",
		"juta",
		"miliar",
		"triliun",
		"kuadriliun",
		"kuintiliun",
	];

	function konversi3Digit(angka) {
		let ratus = Math.floor(angka / 100);
		let puluh = Math.floor((angka % 100) / 10);
		let satu = angka % 10;
		let hasil = "";

		if (ratus > 0) {
			hasil += ratus === 1 ? "seratus " : satuan[ratus] + " ratus ";
		}

		if (puluh > 0) {
			if (puluh === 1) {
				if (satu === 0) hasil += "sepuluh ";
				else if (satu === 1) hasil += "sebelas ";
				else hasil += satuan[satu] + " belas ";
				satu = 0;
			} else {
				hasil += satuan[puluh] + " puluh ";
			}
		}

		if (satu > 0) {
			hasil += satuan[satu] + " ";
		}

		return hasil;
	}

	const [bilangan, desimal] = nominal.split(".");
	let angka = bilangan
		.split("")
		.reverse()
		.join("")
		.match(/\d{1,3}/g);
	let hasil = "";

	if (angka) {
		for (let i = 0; i < angka.length; i++) {
			let group = parseInt(angka[i].split("").reverse().join(""));
			if (group === 0) continue;

			let grupTerbilang = konversi3Digit(group);
			if (i === 1 && group === 1) {
				hasil = "seribu " + hasil;
			} else {
				hasil = grupTerbilang + tingkat[i] + " " + hasil;
			}
		}
	}

	hasil = hasil.trim();

	// Tambah desimal jika ada
	if (desimal && parseInt(desimal) > 0) {
		let desimalTerbilang = "";
		for (let i = 0; i < desimal.length; i++) {
			desimalTerbilang += satuan[parseInt(desimal[i])] + " ";
		}
		hasil += " koma " + desimalTerbilang.trim();
	}
	hasil = hasil.trim();
	hasil = hasil.charAt(0).toUpperCase() + hasil.slice(1);
	return hasil + " rupiah";
}

document.getElementById("nominal").addEventListener("keyup", function () {
	let value = this.value;

	// Hanya izinkan angka dan titik
	value = value.replace(/[^0-9.]/g, "");

	// Hanya satu titik
	const parts = value.split(".");
	if (parts.length > 2) {
		value = parts[0] + "." + parts.slice(1).join("");
	}

	this.value = value;

	// Update terbilang
	const hasil = angkaKeTerbilang(value);
	document.getElementById("terbilang").value = value.trim() === "" ? "" : hasil;
});
