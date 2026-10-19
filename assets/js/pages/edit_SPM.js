const pencil = document.querySelector("#pencil");
const check = document.querySelector("#check");
const cancel = document.querySelector("#cancel");
const spinner = document.querySelector("#spinner");
const span_spm = document.querySelector("#span_no_spm");
const input_username = document.querySelector("#input_username");
document.getElementById("pencil").addEventListener("click", function (event) {
	pencil.classList.toggle("d-none");
	check.classList.toggle("d-none");
	cancel.classList.toggle("d-none");
	span_spm.classList.toggle("d-none");
	input_username.classList.toggle("d-none");
});
document.getElementById("check").addEventListener("click", function (event) {
	check.classList.toggle("d-none");
	spinner.classList.toggle("d-none");
	cancel.classList.toggle("d-none");
	document.getElementById("ubah_username_profile").submit();
});
document.getElementById("cancel").addEventListener("click", function (event) {
	pencil.classList.toggle("d-none");
	check.classList.toggle("d-none");
	cancel.classList.toggle("d-none");
	input_username.classList.toggle("d-none");
	span_username.classList.toggle("d-none");
});
