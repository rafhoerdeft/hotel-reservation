function hapusData(data, reload = false) {
	var link = $(data).data().link;
	if (!reload) {
		var table = $(data).data().table;
	}
	
	swal({
		title: "Hapus Data",
		text: "Apakah data ingin dihapus?",
		icon: "warning",
		showCancelButton: true,
		buttons: {
			cancel: {
				text: "Batal",
				value: null,
				visible: true,
				className: "btn-warning",
				closeModal: true,
			},
			confirm: {
				text: "Ya, Hapus",
				value: true,
				visible: true,
				className: "btn-danger",
				closeModal: false,
			},
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			$.get(link, function (dt) {
					var data = JSON.parse(dt);
					if (data.respons) {
						swal({
                            title: "Sukses!",
                            text: data.alert,
                            icon: 'success',
                            timer: 2000
                        }).then(function() {
							if (reload) {
								location.reload();
							} else {
								$('#' + table).DataTable().ajax.reload(null, false); //posisi paginantion tetap sesuai yang dibuka
							}
                        });
					} else {
						swal({
                            title: "Gagal!",
                            text: data.alert,
                            icon: "error",
                            timer: 2000
                        }).then(function() {
                            if (reload) {
								location.reload();
							} else {
								$('#' + table).DataTable().ajax.reload(null, false); //posisi paginantion tetap sesuai yang dibuka
							}
                        });
					}
				}
			);
		}
	});
}
