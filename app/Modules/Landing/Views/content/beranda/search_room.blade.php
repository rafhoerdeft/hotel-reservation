@extends('template.master')

@section('content')
    <!-- Search Section Start -->
    <div id="search" style="background: #f2f2f2; padding-top: 90px;">
        <div class="container">
            <div class="form-row">
                <div class="col-md-10 offset-md-1">
                    {!! form_open(base_url('landing/searchrm'), 'name="search_form" id="search_form" method="GET"') !!}
                    <div class="form-row">
                        <div class="col-md-8">
                            <div class="input-daterange date-range form-row">
                                <div class="control-group col-md-6">
                                    <label>Check-In</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control checkin" id="checkin" name="checkin"
                                                placeholder="DD/MM/YYYY" autocomplete="off"
                                                value="{{ date('d/m/Y', strtotime($checkin)) }}" onkeydown="return false"
                                                required />
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group col-md-6">
                                    <label>Check-Out</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control checkout" id="checkout" name="checkout"
                                                placeholder="DD/MM/YYYY" autocomplete="off"
                                                value="{{ date('d/m/Y', strtotime($checkout)) }}" onkeydown="return false"
                                                required />
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="control-group col-md-2">
                            <div class="form-row">
                                <div class="control-group col-md-12">
                                    <label>People</label>
                                    <input type="number" maxlength="2" min="1" max="32" class="form-control text-center"
                                        name="count" id="count" style="border-radius: 30px" value="{{ $count }}"
                                        required>
                                </div>
                                {{-- <div class="control-group col-md-6">
                                <label>Kid</label>
                                <input type="text" class="form-control" id="kid" name="kid" placeholder="0"
                                    autocomplete="off" style="border-radius: 30px" onkeypress="return inputAngka(event);"
                                    maxlength="2" />
                            </div> --}}
                            </div>
                        </div>
                        <div class="control-group col-md-2">
                            <button class="btn btn-block" type="submit">Search</button>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Search Section End -->

    <!-- Room Section Start -->
    <div id="rooms">
        <div class="container">
            <div class="section-header" style="z-index: 10">
                <h2>Search Homestay</h2>
                {{-- <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim
                    at venenatis tincidunt.
                </p> --}}
            </div>
            <div class="row">
                @if ($jenis_kamar != null)
                    @foreach ($jenis_kamar as $index => $item)
                        <div class="col-md-12 room">
                            <div class="row">
                                <div class="col-md-6 {{ $index % 2 == 1 ? 'd-block d-md-none' : '' }}">
                                    <div class="room-img">
                                        <img src="{{ base_url('upload/room/' . photo_exp($item->foto, 0)) }}"
                                            data-toggle="modal" data-target="#modal_detail_{{ $index }}"
                                            style="cursor: pointer">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="room-des">
                                        <h3>{{ $item->nama_jenis_kamar }}</h3>
                                        <h1>{{ uang($item->harga, true) }}<span>/ Night</span></h1>
                                        <ul class="room-size mb-2">
                                            <li>
                                                <i class="fa fa-arrow-right"></i>
                                                Capacity: <b class="text-danger">
                                                    {{ $item->kapasitas }} people</b>
                                            </li>
                                            <li>
                                                <i class="fa fa-arrow-right"></i>
                                                Beds: {{ $item->bed }} {{ $item->jenis_bed }}
                                            </li>
                                        </ul>
                                        <div class="mb-3" id="alert_check_rooms">
                                            <h6 class="text-warning">
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ $item->count }} Rooms Available
                                            </h6>
                                        </div>
                                        <ul class="room-icon">
                                            {{-- <li class="icon-1"></li> --}}
                                            <!-- AC -->
                                            {!! $item->ac == 1 ? '<li class="icon-2" title="AC"></li>' : '' !!}
                                            <!-- Bathtub -->
                                            {!! $item->bathtub == 1 ? '<li class="icon-3" title="Bathtub"></li>' : '' !!}
                                            <!-- Shower -->
                                            {!! $item->shower == 1 ? '<li class="icon-4" title="Shower"></li>' : '' !!}
                                            {{-- <li class="icon-5"></li> --}}
                                            <!-- TV -->
                                            {!! $item->tv == 1 ? '<li class="icon-6" title="TV"></li>' : '' !!}
                                            <!-- WIFI -->
                                            {!! $item->wifi == 1 ? '<li class="icon-7" title="Wifi"></li>' : '' !!}
                                            <!-- Telephone -->
                                            {!! $item->telephone == 1 ? '<li class="icon-8" title="Telephone"></li>' : '' !!}
                                            <!-- Drink -->
                                            {!! $item->drink == 1 ? '<li class="icon-9" title="Drink"></li>' : '' !!}
                                            <!-- Breakfast -->
                                            {!! $item->breakfast == 1 ? '<li class="icon-11" title="Breakfast"></li>' : '' !!}
                                        </ul>
                                        <div class="room-link">
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#modal_detail_{{ $index }}">Read More</a>
                                            <a href="javascript:void(0)" data-room="{{ $item->nama_jenis_kamar }}"
                                                data-capacity="{{ $item->kapasitas }}"
                                                data-select="{{ encode($item->id_jenis_kamar) }}"
                                                onclick="modalBook(this)">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($index % 2 == 1)
                                    <div class="col-md-6 d-none d-md-block">
                                        <div class="room-img">
                                            <img src="{{ base_url('upload/room/' . photo_exp($item->foto, 0)) }}"
                                                data-toggle="modal" data-target="#modal_detail_{{ $index }}"
                                                style="cursor: pointer">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @php
                            $photo_arr = explode(';', $item->foto);
                        @endphp

                        @push('modal')
                            <!-- Modal for Room Section Start -->
                            <div id="modal_detail_{{ $index }}" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="photo-slider-{{ $index }}">
                                                        @foreach ($photo_arr as $photo)
                                                            <div><img src="{{ base_url('upload/room/' . $photo) }}"></div>
                                                        @endforeach
                                                    </div>
                                                    <div class="photo-slider-nav-{{ $index }} photo-slide-nav">
                                                        @foreach ($photo_arr as $photo)
                                                            <div>
                                                                <img src="{{ base_url('upload/room/' . $photo) }}"
                                                                    style="height: 100px">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h2 id="title">{{ $item->nama_jenis_kamar }}</h2>
                                                    <h4 id="title">({{ uang($item->harga, true) }}<span> / Night</span>)</h4>
                                                    <div id="rooms" style="margin-bottom: -50px;">
                                                        <div class="room-des" style="text-align: left;">
                                                            <ul class="room-size" style="margin-block: 10px;">
                                                                <li><i class="fa fa-arrow-right"></i>Capacity:
                                                                    {{ $item->kapasitas }}
                                                                    people </li>
                                                                <li><i class="fa fa-arrow-right"></i>Beds: {{ $item->bed }}
                                                                    {{ $item->jenis_bed }} </li>
                                                            </ul>
                                                            <ul class="room-icon" style="margin-block: 10px;">
                                                                {{-- <li class="icon-1"></li> --}}
                                                                <!-- AC -->
                                                                {!! $item->ac == 1 ? '<li class="icon-2" title="AC"></li>' : '' !!}
                                                                <!-- Bathtub -->
                                                                {!! $item->bathtub == 1 ? '<li class="icon-3" title="Bathtub"></li>' : '' !!}
                                                                <!-- Shower -->
                                                                {!! $item->shower == 1 ? '<li class="icon-4" title="Shower"></li>' : '' !!}
                                                                {{-- <li class="icon-5"></li> --}}
                                                                <!-- TV -->
                                                                {!! $item->tv == 1 ? '<li class="icon-6" title="TV"></li>' : '' !!}
                                                                <!-- WIFI -->
                                                                {!! $item->wifi == 1 ? '<li class="icon-7" title="Wifi"></li>' : '' !!}
                                                                <!-- Telephone -->
                                                                {!! $item->telephone == 1 ? '<li class="icon-8" title="Telephone"></li>' : '' !!}
                                                                <!-- Drink -->
                                                                {!! $item->drink == 1 ? '<li class="icon-9" title="Drink"></li>' : '' !!}
                                                                <!-- Breakfast -->
                                                                {!! $item->breakfast == 1 ? '<li class="icon-11" title="Breakfast"></li>' : '' !!}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p id="info" style="text-align: justify">
                                                        {{ $item->keterangan }}
                                                    </p>
                                                    <div class="modal-link">
                                                        <a href="javascript:void(0)"
                                                            data-room="{{ $item->nama_jenis_kamar }}"
                                                            data-capacity="{{ $item->kapasitas }}"
                                                            data-select="{{ encode($item->id_jenis_kamar) }}"
                                                            data-dismiss="modal" onclick="modalBook(this)">Book Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal for Room Section End -->
                        @endpush

                        @push('js_script')
                            <script>
                                $(".photo-slider-{{ $index }}").not('.slick-initialized').slick({
                                    autoplay: true,
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                    lazyLoad: 'ondemand',
                                    fade: true,
                                    asNavFor: ".photo-slider-nav-{{ $index }}"
                                });
                                $(".photo-slider-nav-{{ $index }}").not('.slick-initialized').slick({
                                    autoplay: true,
                                    slidesToShow: 5,
                                    slidesToScroll: 1,
                                    asNavFor: ".photo-slider-{{ $index }}",
                                    arrows: false,
                                    dots: false,
                                    centerMode: true,
                                    focusOnSelect: true
                                });
                            </script>
                        @endpush
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {!! form_open(base_url('landing/booking/save'), 'name="result_form" class="form" id="result_form"') !!}
    <input type="hidden" name="result_type" id="result_type" value="">
    <input type="hidden" name="result_data" id="result_data" value="">
    <input type="hidden" name="input_data" id="input_data" value="">
    {!! form_close() !!}
@endsection

@push('modal')
    <!-- Modal for Booking Start -->
    <div id="modal_booking" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="booking" style="padding: 0px;">
                        <div class="container">
                            <div class="section-header">
                                <h4>Room Booking</h4>
                                <h2 id="room_book">Standard Single</h2>
                                <p>Capacity: <span id="kapasitas"></span> people </p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="booking-form">
                                        <div id="success"></div>
                                        {!! form_open(base_url('landing/booking/token'), 'name="booking_form" class="form" id="booking_form" novalidate="novalidate"') !!}
                                        @if (session('logs') == user_log)
                                            <input type="hidden" name="user" value="{{ encode(session('user')) }}">
                                        @endif

                                        <div class="form-row">
                                            <div class="control-group col-sm-6">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    placeholder="E.g. John" required="required"
                                                    value="{{ session('first_name') ? session('first_name') : '' }}"
                                                    {{ session('first_name') ? 'readonly' : '' }}
                                                    data-validation-required-message="Please enter first name" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="control-group col-sm-6">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                    placeholder="E.g. Sina"
                                                    value="{{ session('last_name') ? session('last_name') : '' }}"
                                                    {{ session('first_name') ? 'readonly' : '' }} />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="control-group col-sm-6">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" id="no_hp_user" name="no_hp_user"
                                                    placeholder="E.g. 081xxxxxx" required="required" maxlength="15"
                                                    onkeypress="return inputAngka(event);"
                                                    value="{{ session('no_hp_user') ? session('no_hp_user') : '' }}"
                                                    {{ session('no_hp_user') ? 'readonly' : '' }}
                                                    data-validation-required-message="Please enter your mobile number" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="control-group col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email_user" name="email_user"
                                                    placeholder="E.g. email@example.com" required="required"
                                                    value="{{ session('email_user') ? session('email_user') : '' }}"
                                                    {{ session('email_user') ? 'readonly' : '' }}
                                                    data-validation-required-message="Please enter your email" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>

                                        <div id="search" style="padding: 0px; background: white;">
                                            <div class="form-row">
                                                <div class="control-group col-sm-6">
                                                    <label>Check-In</label>
                                                    <div class="form-group">
                                                        <div class="input-group w-100">
                                                            <input type="text" class="form-control" id="checkin"
                                                                name="checkin" placeholder="DD/MM/YYYY" autocomplete="off"
                                                                style="border-radius: 30px 0 0 30px;"
                                                                value="{{ date('d/m/Y', strtotime($checkin)) }}"
                                                                data-validation-required-message="Please enter date"
                                                                readonly required />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                </div>

                                                <div class="control-group col-sm-6">
                                                    <label>Check-Out</label>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="checkout"
                                                                name="checkout" placeholder="DD/MM/YYYY" autocomplete="off"
                                                                style="border-radius: 30px 0 0 30px;"
                                                                value="{{ date('d/m/Y', strtotime($checkout)) }}"
                                                                data-validation-required-message="Please enter date"
                                                                readonly required />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="control-group col-sm-6">
                                                <label>Number of Rooms</label>
                                                <select class="custom-select" id="jml_kamar" name="jml_kamar"
                                                    required="required"
                                                    data-validation-required-message="Please select one">
                                                    {{-- <option value="" selected>0</option> --}}
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <p class="help-block text-danger"></p>
                                            </div>

                                            <input type="hidden" name="jenis_kamar" id="jenis_kamar">
                                            <input type="hidden" name="kamar" id="kamar">

                                            <div class="control-group col-sm-6">
                                                <label>Check Available Rooms</label>
                                                <div class="form-row">
                                                    <div class="button col-sm-6">
                                                        <button type="button" style="padding:5px; width:100%;"
                                                            onclick="checkRooms()">Check</button>
                                                    </div>
                                                    <div class="col-sm-6 my-auto" id="alert_check_rooms"> </div>
                                                </div>
                                            </div>

                                            {{-- <div class="control-group col-sm-6">
                                                <label>Rooms</label>
                                                <select class="custom-select" id="jenis_kamar" name="jenis_kamar"
                                                    required="required"
                                                    data-validation-required-message="Please select one">
                                                    @foreach ($jenis_kamar as $item)
                                                        <option value="{{ $item->id_jenis_kamar }}">
                                                            {{ $item->nama_jenis_kamar }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="help-block text-danger"></p>
                                            </div> --}}
                                        </div>

                                        <hr>
                                        <div class="button text-right">
                                            <button type="button" id="book_submit" disabled>
                                                Book Now
                                            </button>
                                        </div>
                                        {!! form_close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Booking End -->
@endpush

@push('css_plugin')
    <link rel="stylesheet" href="{{ assets . 'vendors/bootstrap-datepicker/bootstrap-datepicker.min.css' }}">
    <link rel="stylesheet" href="{{ assets . 'vendors/bootstrap-datepicker/style-datepicker.css' }}">
@endpush

@push('js_plugin')
    <script src="{{ assets . 'vendors/bootstrap-datepicker/bootstrap-datepicker.min.js' }}"></script>
@endpush

@push('js_script')
    <script>
        var date_now = new Date(new Date().setDate(new Date().getDate() - 1));
        var date_checkin, date_checkout;
        var date_range = $('.date-range').datepicker({
            language: 'id',
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            toggleActive: true,
            startDate: '0d',
            endDate: '+15d', // maksimal 2 minggu
        });
    </script>

    <script type="text/javascript">
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 46 || charCode > 57))
                return false;
            return true;
        }
    </script>
@endpush

@push('css_style')
    <style>
        .btn-disabled {
            background: grey !important;
            color: white !important;
        }

    </style>
@endpush

@push('js_plugin')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ clientKeyMt() }}">
    </script>
@endpush

@push('js_script')
    <script>
        function clearBook() {
            $('#modal_booking #booking_form #kamar').val('');
            $('#modal_booking #booking_form #book_submit').attr('disabled', true);
            $('#modal_booking #booking_form #book_submit').addClass('btn-disabled');
        }

        function modalBook(data) {
            var room = $(data).data().room;
            var capacity = $(data).data().capacity;
            var select = $(data).data().select;
            $('#modal_booking #booking_form')[0].reset();
            // $('#modal_booking #jenis_kamar').val(room).change();
            $('#modal_booking #jenis_kamar').val(select);
            $('#modal_booking #room_book').html(room);
            $('#modal_booking #kapasitas').html(capacity);
            $('#modal_booking #alert_check_rooms').html('');
            clearBook();
            $('#modal_booking').modal('show');
        }
    </script>

    <script>
        function checkRooms() {
            var room = $('#modal_booking #jenis_kamar').val();
            var checkin = $('#modal_booking #checkin').val();
            var checkout = $('#modal_booking #checkout').val();
            var count = $('#modal_booking #jml_kamar').val();
            if (checkin != '' && checkout != '') {
                $.post("{{ base_url('landing/checkrm') }}", {
                    room: room,
                    checkin: checkin,
                    checkout: checkout,
                    count: count,
                }, function(result) {
                    var res = JSON.parse(result);
                    if (res.response) {
                        var data = res.data;
                        if (data.count >= count) {
                            $('#modal_booking #alert_check_rooms').html(
                                '<h6 class="text-success">' +
                                '<i class="fa fa-check-circle"></i>' +
                                ' Rooms Available' +
                                '</h6>'
                            );
                            $('#modal_booking #booking_form #kamar').val(data.rooms);
                            $('#modal_booking #booking_form #book_submit').removeAttr('disabled');
                            $('#modal_booking #booking_form #book_submit').removeClass('btn-disabled');
                        } else {
                            if (data.count > 0) {
                                $('#modal_booking #alert_check_rooms').html(
                                    '<h6 class="text-warning">' +
                                    '<i class="fa fa-exclamation-circle"></i> ' +
                                    data.count + ' Rooms Available' +
                                    '</h6>'
                                );
                                clearBook();
                            } else {
                                $('#modal_booking #alert_check_rooms').html(
                                    '<h6 class="text-danger">' +
                                    '<i class="fa fa-times-circle"></i>' +
                                    ' Rooms Not Available' +
                                    '</h6>'
                                );
                                clearBook();
                            }
                        }
                    } else {
                        $('#modal_booking #alert_check_rooms').html(
                            '<h6 class="text-danger">' +
                            '<i class="fa fa-times-circle"></i>' +
                            ' Rooms Not Available' +
                            '</h6>'
                        );
                        clearBook();
                    }
                });
            } else {
                alert('Tentukan tanggal checkin & checkout dahulu!');
            }

        }
    </script>

    <script type="text/javascript">
        $('#book_submit').click(function(e) {
            e.preventDefault();
            var check_valid = $('#modal_booking #booking_form')[0].checkValidity();
            var url = $('#modal_booking #booking_form')[0].action;
            if (check_valid) {
                // $('#modal_booking').modal('hide');
                $("#loading-show").fadeIn("slow");

                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: "json",
                    data: $('#modal_booking #booking_form').serialize(),
                    cache: false,
                    success: function(res) {
                        $("#loading-show").fadeIn("slow").delay(20).fadeOut('slow');

                        if (res.response) {
                            function changeResult(type, data) {
                                $("#result_form #result_type").val(type);
                                $("#result_form #result_data").val(JSON.stringify(data));
                                $("#result_form #input_data").val(JSON.stringify(res.data));
                            }

                            snap.pay(res.token, {
                                onSuccess: function(result) {
                                    changeResult('success', result);
                                    $("#result_form").submit();
                                },
                                onPending: function(result) {
                                    changeResult('pending', result);
                                    $("#result_form").submit();
                                },
                                onError: function(result) {
                                    changeResult('error', result);
                                    $("#result_form").submit();
                                }
                            });
                        } else {
                            alert(res.alert);
                        }
                    }
                });
            } else {
                alert('Isi semua form!');
            }
        });
    </script>

    <script>
        // matikan button submit saat ganti tanggal
        date_range.on('changeDate', (e) => {
            clearBook();
        });

        $('#jml_kamar').change(function() {
            clearBook();
        });
    </script>

    <script>
        $("#booking_form input, #booking_form select").jqBootstrapValidation({
            preventSubmit: true,
            submitError: function($form, event, errors) {},
            // submitSuccess: function($form, event) {
            //     event.preventDefault();

            // },
            // filter: function() {
            //     return $(this).is(":visible");
            // },
        });
    </script>
@endpush
