<!-- Room Section Start -->
<div id="rooms">
    <div class="container">
        <div class="section-header">
            <h2>Our Rooms</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim
                at venenatis tincidunt.
            </p>
        </div>
        <div class="row">

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
                                <ul class="room-size">
                                    <li><i class="fa fa-arrow-right"></i>Capacity: {{ $item->kapasitas }} people </li>
                                    <li><i class="fa fa-arrow-right"></i>Beds: {{ $item->bed }}
                                        {{ $item->jenis_bed }} </li>
                                </ul>
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
                                    <a href="javascript:void(0)" data-room="{{ $item->id_jenis_kamar }}"
                                        onclick="modalBook(this)">Book Now</a>
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
                                                    <div><img src="{{ base_url('upload/room/' . $photo) }}"></div>
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
                                                <a href="javascript:void(0)" data-room="{{ $item->id_jenis_kamar }}"
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

        </div>
    </div>
</div>
<!-- Room Section End -->

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
                                <h2>Room Booking</h2>
                                {{-- <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque
                                    convallis, enim
                                    at venenatis tincidunt.
                                </p> --}}
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="booking-form">
                                        <div id="success"></div>
                                        {!! form_open(base_url('landing/booking'), 'name="sentMessage" class="form" id="bookingForm" novalidate="novalidate"') !!}
                                        <div class="form-row">
                                            <div class="control-group col-sm-6">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    placeholder="E.g. John" required="required"
                                                    data-validation-required-message="Please enter first name" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="control-group col-sm-6">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                    placeholder="E.g. Sina" required="required"
                                                    data-validation-required-message="Please enter last name" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="control-group col-sm-6">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" id="no_hp_user" name="no_hp_user"
                                                    placeholder="E.g. 081xxxxxx" required="required" maxlength="15"
                                                    onkeypress="return inputAngka(event);"
                                                    data-validation-required-message="Please enter your mobile number" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="control-group col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email_user" name="email_user"
                                                    placeholder="E.g. email@example.com" required="required"
                                                    data-validation-required-message="Please enter your email" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div id="search" style="padding: 0px; background: white;">
                                            <div class="input-daterange date-range form-row">
                                                <div class="control-group col-sm-6">
                                                    <label>Check-In</label>
                                                    <div class="form-group">
                                                        <div class="input-group w-100">
                                                            <input type="text" class="form-control" id="checkin"
                                                                name="checkin" placeholder="DD/MM/YYYY" autocomplete="off"
                                                                style="border-radius: 30px 0 0 30px;"
                                                                data-validation-required-message="Please enter date"
                                                                required />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                </div>

                                                <div class="control-group col-sm-6">
                                                    <label>Check-In</label>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="checkout"
                                                                name="checkout" placeholder="DD/MM/YYYY" autocomplete="off"
                                                                style="border-radius: 30px 0 0 30px;"
                                                                data-validation-required-message="Please enter date"
                                                                required />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
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

                                            <div class="control-group col-sm-6">
                                                <label>Rooms</label>
                                                <select class="custom-select" id="jenis_kamar" name="jenis_kamar"
                                                    required="required"
                                                    data-validation-required-message="Please select one">
                                                    {{-- <option value="" selected>0</option> --}}
                                                    @foreach ($jenis_kamar as $item)
                                                        <option value="{{ $item->id_jenis_kamar }}">
                                                            {{ $item->nama_jenis_kamar }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>

                                        <div class="button">
                                            <button type="submit" id="bookingButton">
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

@push('js_script')
    <script>
        function modalBook(data) {
            var room = $(data).data().room;
            $('#modal_booking #jenis_kamar').val(room).change();
            $('#modal_booking').modal('show');
        }
    </script>
@endpush
