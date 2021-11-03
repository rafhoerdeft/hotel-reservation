function createDataTable(name_id, search = true) {
    $('#' + name_id).dataTable({
        "dom": '<"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t><"row"<"col-md-6"i><"col-md-6"p>>',
        "searching": search,
        "language": {
            "emptyTable": "Tidak ada data yang tersedia",
            "lengthMenu": "Tampilkan _MENU_ entri",
            "zeroRecords": "Data yang dicari tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari:",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            // "paginate": {
            //     "first": "First",
            //     "last": "Last",
            //     "next": "Next",
            //     "previous": "Previous"
            // },
        }
    });
}