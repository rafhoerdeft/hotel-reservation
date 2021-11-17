<!-- Result Section Start -->
@extends('template/master')

@section('content')
    <div id="history">
        <div class="container">
            <div class="section-header">
                <h2>Booking History</h2>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="list_tbl" style="font-size: 10pt">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>No. Order</th>
                                <th>Waktu Booking</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Pembayaran</th>
                                <th>Total</th>
                                <th>Panduan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resv as $key => $val)
                                <tr>
                                    <td align="center">{{ $key + 1 }}</td>
                                    <td><span>#{{ $val->no_order }}</span></td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($val->waktu_booking)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($val->tgl_awal)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($val->tgl_akhir)) }}</td>
                                    <td align="left">
                                        {{ ($val->jenis_bayar == 'echannel' ? 'Mandiri ' . '(' . $val->via_bayar . ')' : strtoupper($val->via_bayar)) . ' - ' . $val->via_nomor }}
                                    </td>
                                    <td align="right">{{ uang($val->total_bayar, true) }}</td>
                                    <td>
                                        <h3>
                                            <a href="{{ $val->pdf_url }}"> <i class="fa fa-file-pdf-o text-danger"></i>
                                            </a>
                                        </h3>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-sm badge-{{ $val->status_b == 1 ? 'warning' : 'success' }} w-100">{{ strtoupper($status_b[$val->status_b]) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
<!-- Result Section Start -->

@push('css_plugin')
    <link rel="stylesheet" type="text/css" href="{{ assets . 'external/DataTables/datatables.min.css' }}" />
@endpush

@push('css_style')
    <style>
        #history .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #00ced1;
            border-color: #00ced1;
        }

    </style>
@endpush

@push('js_plugin')
    <script type="text/javascript" src="{{ assets . 'external/DataTables/datatables.min.js' }}"></script>
    <script type="text/javascript" src="{{ assets . 'js/datatable_option.js' }}"></script>
@endpush

@push('js_script')
    <script>
        createDataTable('list_tbl', true);
    </script>
@endpush
