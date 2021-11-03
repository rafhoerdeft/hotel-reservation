var protocol = window.location.protocol;
var host = window.location.hostname;

function teruskanPermohonan() {
	var id = $("#proses_permohonan #id_pemohon").val();
	if (id != "") {
		$.post(
			protocol + "//" + host + ":8080/admin/prosesPemohon",
			{ id_pemohon: id },
			function (result) {
				console.log(result);
				var idn = result;
				window.location.href =
					protocol + "//" + host + ":8080/admin/cetakSuratDinkes/" + idn;
				location.reload();
			}
		);
	}
}
