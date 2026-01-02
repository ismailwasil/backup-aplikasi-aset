function openModal() {
	// bersihkan localstorage
	localStorage.removeItem("data_PKM");
	// Cek apakah localstorage sudah ada, jika belum, buat localstorage
	let kumpulanPkm = [
		{
			namaPKM: "pkm_sreseh",
			passwordPKM: "pkmsresehhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1NgTEdtghw8jbTHGH9FhkKOpQCLLaTelH",
		},
		{
			namaPKM: "pkm_torjun",
			passwordPKM: "pkmtorjunhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1mjbbZZV6CUImL49Fn7F3Pt8vORldBei_",
		},
		{
			namaPKM: "pkm_pangarengan",
			passwordPKM: "pkmpangarenganhebat",
			linkURL:
				"https://drive.google.com/drive/folders/15wCjkKVMAS4-QsiqAaXWp1JCaNw1Bt7A",
		},
		{
			namaPKM: "pkm_kamoning",
			passwordPKM: "pkmkamoninghebat",
			linkURL:
				"https://drive.google.com/drive/folders/1a2a8z1-Oxv4RcUFPR50yeB2dgJL6Ft_J",
		},
		{
			namaPKM: "pkm_banyuanyar",
			passwordPKM: "pkmbanyuanyarhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1Ts3aRXx5ez4SzGbMiNJgc8JSPmYgUJz9",
		},
		{
			namaPKM: "pkm_camplong",
			passwordPKM: "pkmcamplonghebat",
			linkURL:
				"https://drive.google.com/drive/folders/18QZQ5VzbxZnH-D82LDCv_aaHDJV-NblA",
		},
		{
			namaPKM: "pkm_tanjung",
			passwordPKM: "pkmtanjunghebat",
			linkURL:
				"https://drive.google.com/drive/folders/1YTO08aRw7qa2tZBhRUC6auG9Q9WQxKHA",
		},
		{
			namaPKM: "pkm_omben",
			passwordPKM: "pkmombenhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1jWa4dQ1V3RseDs44CAAmqn7a0cwL06JY",
		},
		{
			namaPKM: "pkm_jrangoan",
			passwordPKM: "pkmjrangoanhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1zZ6gc2ubOkhW3bP4oUs8BhMEUF_rXWq1",
		},
		{
			namaPKM: "pkm_kedungdung",
			passwordPKM: "pkmkedungdunghebat",
			linkURL:
				"https://drive.google.com/drive/folders/16PdmHjKgN0fi0nQE9ug89pEuKQgYFQPY",
		},
		{
			namaPKM: "pkm_banjar",
			passwordPKM: "pkmbanjarhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1IoD-BupdQrSDfdH81NIPmIG8Mon0a2fY",
		},
		{
			namaPKM: "pkm_jrengik",
			passwordPKM: "pkmjrengikhebat",
			linkURL:
				"https://drive.google.com/drive/folders/18hBs9FztwRcuYyUw-tDA9_KMA9xxq5zJ",
		},
		{
			namaPKM: "pkm_tambelangan",
			passwordPKM: "pkmtambelanganhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1tzoyhpwwxpAJTDTC-GEumlQXEK_269g8",
		},
		{
			namaPKM: "pkm_banyuates",
			passwordPKM: "pkmbanyuateshebat",
			linkURL:
				"https://drive.google.com/drive/folders/1NBdfBmWxYLT4qKUvidq3WE3E_lX88Jyr",
		},
		{
			namaPKM: "pkm_bringkoning",
			passwordPKM: "pkmbringkoninghebat",
			linkURL:
				"https://drive.google.com/drive/folders/1Lzc7Me9rUSglCyZV4NStBP37zfh8okSw",
		},
		{
			namaPKM: "pkm_robatal",
			passwordPKM: "pkmrobatalhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1p9Ug6mUa7M3bzTMjzvBQpR97vQYB1dyM",
		},
		{
			namaPKM: "pkm_karang_penang",
			passwordPKM: "pkmkarangpenanghebat",
			linkURL:
				"https://drive.google.com/drive/folders/1vhkzLoqUlqCT5EuXYbOKcjVhoLorRJ1Z",
		},
		{
			namaPKM: "pkm_ketapang",
			passwordPKM: "pkmketapanghebat",
			linkURL:
				"https://drive.google.com/drive/folders/1qorp9l5d4SJ3wd_6dLj35cYFj-wBwbld",
		},
		{
			namaPKM: "pkm_bunten_barat",
			passwordPKM: "pkmbuntenbarathebat",
			linkURL:
				"https://drive.google.com/drive/folders/1u0pSuWrJgSVjgJFQQ6ybjALv4X_C7E6U",
		},
		{
			namaPKM: "pkm_batulenger",
			passwordPKM: "pkmbatulengerhebat",
			linkURL:
				"https://drive.google.com/drive/folders/17fugkFb-uUrwDfaea2lLVEpm0JrsQ2oU",
		},
		{
			namaPKM: "pkm_tamberu_barat",
			passwordPKM: "pkmtamberubarathebat",
			linkURL:
				"https://drive.google.com/drive/folders/1snmb5Au9g_TAwWHPD9Nl6gnbf2-omAE7",
		},
		{
			namaPKM: "pkm_mandangin",
			passwordPKM: "pkmmandanginhebat",
			linkURL:
				"https://drive.google.com/drive/folders/1eZPDNhlKnXrDYZWwyJr5bNl8ZFOZUKJ1",
		},
	];
	const pkm = kumpulanPkm.find((pkm) => pkm.namaPKM === this.value);
	if (pkm) {
		let data_PKM = {
			namaPKM: pkm.namaPKM,
			passwordPKM: pkm.passwordPKM,
			linkURL: pkm.linkURL,
		};
		localStorage.setItem("data_PKM", JSON.stringify(data_PKM));
	} else {
		document.getElementById("loginStatus").innerText = "Username tidak valid.";
	}
	// Cek apakah modal sudah ada, jika belum, buat modal
	if (!document.getElementById("loginModal")) {
		let modal = document.createElement("div");
		modal.id = "loginModal";
		modal.className = "modal";
		modal.innerHTML = `
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document" data-bs-backdrop="false">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-warning">
                                                                    <h4 class="modal-title" id="myModalLabel33">Password Konfirmasi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()">
                                                                        X
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label style="color: black; font-weight: bolder;">Puskesmas: </label>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="userPuskesmas" id="userPuskesmas" value="${this.value}" readonly>
                                                                    </div>
                                                                    <label style="color: black; font-weight: bolder;">Password: </label>
                                                                    <div class="form-group">
                                                                        <input type="password" placeholder="Masukkan Password ..." class="form-control" name="pwdPuskesmas" id="pwdPuskesmas" autofocus>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer bg-warning">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" onclick="closeModal()">
                                                                        <i class="fa fa-fw fa-times d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-success ml-1" onclick="submitLogin()">
                                                                        <i class="fa fa-fw fa-cloud-upload d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Confirm</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    `;
		document.body.appendChild(modal);
	}

	// Tampilkan modal
	document.getElementById("loginModal").style.display = "flex";
}

function closeModal() {
	localStorage.removeItem("data_PKM");
	location.reload();
	// document.getElementById("loginModal").style.display = "none";
}

function submitLogin() {
	let username = document.getElementById("userPuskesmas").value;
	let password = document.getElementById("pwdPuskesmas").value;
	let errorMessage = document.getElementById("errorMessage");

	// Data PKM yang valid
	const validUser = "pkm_robatal";
	const validPass = "1234";
	const data_tuju = JSON.parse(localStorage.getItem("data_PKM"));

	if (password === data_tuju.passwordPKM) {
		// alert("Login berhasil! Selamat datang, " + username);
		// window.location.href = data_tuju.linkURL;
		window.open(data_tuju.linkURL, "_blank");
		localStorage.removeItem("data_PKM");
		closeModal();
	} else {
		alert("Password salah!");
	}

	// alert(`Username: ${username} \nPassword: ${password}`);
	// closeModal();
}
