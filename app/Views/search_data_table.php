<style>
    .dataTables_filter {
        display: none;
    }

    .hapus-input {
        opacity: 50%;
    }

    .active-hapus-input {
        opacity: 100%;
    }

    .input-group-btn .btn {
        border-radius: 2px !important;
        border-top-left-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
        border-top-right-radius: 2px;
        border-bottom-right-radius: 2px;
    }
</style>

<div class="pull-right col-md-4" style="bottom: 5px;">
    <div class="input-group">
        <input name="caridata" id="caridata" class="form-control" placeholder="Cari..." type="search" value="" onkeypress="if (event.keyCode == 13){cariDataTable('<?= $table_name ?>');}" onkeyup="showHapusInput(this)">
        <div class="input-group-append">
            <button type="button" id="hapusInputBtn" class="btn btn-danger hapus-input">
                <i class="la la-close"></i>
            </button>
        </div>
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary" onclick="cariDataTable('<?= $table_name ?>')">
                <i class="la la-search"></i>
            </button>
        </div>
    </div>

    <script>
        function showHapusInput(data) {
            var val = $(data).val();
            if (val != '') {
                $('#hapusInputBtn').addClass("active-hapus-input");
            } else {
                $('#hapusInputBtn').removeClass("active-hapus-input");
            }
        }

        function cariDataTable(tbl = '') {
            var cari = $('#caridata').val();
            $("#" + tbl).DataTable().search(cari).draw();
        }

        $('#hapusInputBtn').on('click', function() {
            var style = $(this)[0]['className'];
            var n = style.search("active-hapus-input");
            if (n > 0) {
                $('#caridata').val('');
                $('#hapusInputBtn').removeClass("active-hapus-input");
                cariDataTable('<?= $table_name ?>');
            }
        });
    </script>
</div>