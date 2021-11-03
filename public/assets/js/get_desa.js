var protocol = window.location.protocol;
var host = window.location.hostname;

function getDesa(data) {
	var grup = $(data).parent().parent().parent().attr('id');
	var kode = $(data).val();
	
	if (kode != "") {
		$("#"+grup+" #loading-desa").fadeIn("slow");

		$.post(
			protocol + "//" + host + ":8080/admin/getDataDesa",
			{ kode_kecamatan: kode },
			function (result) {
				$("#"+grup+" #loading-desa").fadeIn("slow").delay(100).slideUp("slow");

				var dt = JSON.parse(result);
				// console.log(dt.data);

				if (dt.response) {
					var list = "";
					list += '<option value="" hidden>Pilih Desa</option>';
					for (var i = 0; i < dt.data.length; i++) {
						list +=
							'<option value="' +
							dt.data[i].kode_desa +
							'">' +
							dt.data[i].nama_desa +
							"</option>";
					}

					$("#"+grup+" #kode_desa").html(list);
				}
			}
		);
	}
}

// $("#kode_kecamatan_usaha").change(function () {
// 	var kode = $(this).val();
// 	if (kode != "") {
// 		$("#loading-desa-usaha").fadeIn("slow");

// 		$.post(
// 			protocol + "//" + host + "/jin/Admin/getDataDesa",
// 			{ kode_kecamatan: kode },
// 			function (result) {
// 				$("#loading-desa-usaha").fadeIn("slow").delay(100).slideUp("slow");

// 				var dt = JSON.parse(result);
// 				// console.log(dt.data);

// 				if (dt.response) {
// 					var list = "";
// 					list += '<option value="" hidden>Pilih Desa</option>';
// 					for (var i = 0; i < dt.data.length; i++) {
// 						list +=
// 							'<option value="'+ dt.data[i].kode_desa +'">' +
// 								dt.data[i].nama_desa +
// 							"</option>";
// 					}

// 					$("#kode_desa_usaha").html(list);
// 				}
// 			}
// 		);
// 	}
// });
