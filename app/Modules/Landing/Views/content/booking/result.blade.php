<!-- Result Section Start -->
@extends('template/master')

@section('content')
    <div id="result">
        <div class="container">
            <div class="section-header">
                <h2>Thank You for Booking in Sadewa Homestay</h2>
            </div>
            <label style="font-size: 14pt;">Batas Akhir Pembayaran </label>
            <h4 class="mb-3">
                {{ formatTanggal(date('Y-m-d H:i:s', strtotime('+1 day', strtotime($resv->waktu_booking))), true, true) }}
            </h4>
            <h6 id="no_order" class="mb-4">#{{ $resv->no_order }}</h6>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <div class="modal-content">
                        <div class="modal-header row">
                            <div class="col-md-6 text-left">
                                <h4>{{ $resv->jenis_bayar == 'bank_transfer' ? strtoupper($resv->via_bayar) : 'Mandiri' }}
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <img src="{{ $resv->jenis_bayar == 'bank_transfer' ? base_url('assets/img/logo/bank/' . $resv->via_bayar . '.png') : base_url('assets/img/logo/bank/mandiri.png') }}"
                                    width="100" alt="">
                            </div>
                        </div>
                        <div class="modal-body">
                            @if ($resv->jenis_bayar == 'echannel')
                                <div class="text-left">Kode Perusahaan</div>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <div>
                                            <h4 id="kode_perusahaan">{{ $resv->via_bayar }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <h3 class="link">
                                                <a href="javascript:void(0)" onclick="copyToClipboard('kode_perusahaan')"
                                                    title="Copy">
                                                    Salin <i class="fa fa-copy"></i>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4"></div>
                            @endif

                            <div class="text-left">Nomor Rekening/Pembayaran</div>
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <div>
                                        <h4 id="no_bayar">{{ $resv->via_nomor }}</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div>
                                        <h3 class="link">
                                            <a href="javascript:void(0)" onclick="copyToClipboard('no_bayar')" title="Copy">
                                                Salin <i class="fa fa-copy"></i>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4"></div>

                            <div class="text-left">Total Pembayaran</div>
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <div>
                                        <h4 id="tot_bayar">
                                            {{ uang($resv->total_bayar, true) }}
                                            <a href="javascript:void(0)"
                                                onclick="copyToClipboard({{ $resv->total_bayar }}, false)"
                                                style="font-size: 12pt; color: #00CED1" title="Copy">
                                                <i class="fa fa-copy"></i>
                                            </a>
                                        </h4>

                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div>
                                        <h3 class="link">
                                            <a href="javascript:void(0)" onclick="modalDetail(this)"
                                                title="Booking Detail">Lihat Detail</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-white"
                            style="font-style: italic; font-weight: bold; background: #00CED1">
                            Detail pemesanan dapat dilihat di pesan masuk email Anda beserta petunjuk cara pembayaran.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="result-link-border">
                                <a href="{{ base_url() }}" style="width: 100%">Booking Other Rooms</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-link">
                                <a href="{{ $resv->pdf_url }}" target="_blank" style="width: 100%">Download
                                    Payment Guide</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<!-- Result Section Start -->

<!-- Modal for Detail Start -->
@push('modal')
    <div id="modal_detail" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="booking" style="padding: 0px;">
                        <div class="container">
                            <div class="section-header">
                                <h4 class="mb-2">Detail Booking</h4>
                                <h6 id="no_order">#{{ $resv->no_order }}</h6>
                                {{-- <h2 id="room_book">Standard Single</h2> --}}
                                {{-- <p>Capacity: <span id="kapasitas"></span> people </p> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h6>Date Booking</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h6 class="text-danger" id="date_book">
                                        {{ formatRangeTgl($resv->tgl_awal, $resv->tgl_akhir) }}
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-md-6 text-left">
                                    <h6>Rooms Order</h6>
                                </div>
                            </div>
                            <div id="rooms_book">
                                @foreach ($detail as $item)
                                    <h6>{{ text_uc($item->nama_jenis_kamar) }} (Capacity: {{ $item->kapasitas }}
                                        people)
                                    </h6>
                                    <div class="row mb-4">
                                        <div class="col-md-6 text-left">
                                            <div style="font-size: 12pt">{{ $item->jml_hari }} night x
                                                {{ uang($item->harga, true) }}</div>
                                        </div>
                                        <div class="col-md-6 text-right align-middle">
                                            <div style="font-size: 12pt">
                                                {{ uang($item->jml_hari * $item->harga, true) }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h6>Total Payment</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h6 style="color: #00CED1" id="tot_pay">{{ uang($resv->total_bayar, true) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
<!-- Modal for Detail End -->

@push('js_script')
    <script>
        function copyToClipboard(copy, element = true) {
            var $temp = $("<input>");
            $("body").append($temp);
            if (element) {
                $temp.val($('#' + copy).text()).select();
            } else {
                $temp.val(copy).select();
            }
            document.execCommand("copy");
            $temp.remove();
        }
    </script>

    <script>
        function modalDetail(data) {
            $('#modal_detail').modal('show');
        }
    </script>
@endpush
