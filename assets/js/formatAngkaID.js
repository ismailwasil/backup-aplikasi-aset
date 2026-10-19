document.getElementById(idAngka).addEventListener("keyup", function () {
	let value = this.value;

	// Hanya izinkan angka dan koma
	value = value.replace(/[^0-9,]/g, "");

	// Hanya satu koma
	const parts = value.split(",");
	if (parts.length > 2) {
		value = parts[0] + "," + parts.slice(1).join("");
	}

	// Pisahkan bagian integer dan desimal
	if (value.includes(",")) {
		let [val1, val2] = value.split(",");
		// Format bagian ribuan
		let integerPart = val1.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

		this.value = integerPart + "," + val2;
	} else {
		this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}
});
