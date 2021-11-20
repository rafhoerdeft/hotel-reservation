<div id="homes">
    <!-- Header Bottom Start -->
    <div id="header-bottom">
        <!-- Search Section Start -->
        <div id="search" class="search-slider">
            <div class="container">
                <h1>Feel at Home When You're Away</h1>
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
                                                <input type="text" class="form-control checkin" id="checkin"
                                                    name="checkin" placeholder="DD/MM/YYYY" autocomplete="off"
                                                    value="{{ date('d/m/Y') }}" onkeydown="return false" required />
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
                                                <input type="text" class="form-control checkout" id="checkout"
                                                    name="checkout" placeholder="DD/MM/YYYY" autocomplete="off"
                                                    value="{{ date('d/m/Y', strtotime('+1 day')) }}"
                                                    onkeydown="return false" required />
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
                                        <input type="number" maxlength="2" min="1" max="32"
                                            class="form-control text-center" name="count" id="count"
                                            style="border-radius: 30px" value="1" onkeydown="return false" required>
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

        <!-- Slider Section Start -->
        <div id="headerSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($carousel as $index => $item)
                    <li data-target="#headerSlider" data-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($carousel as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ base_url('upload/slider/' . $item->file_carousel) }}" alt="Royal Hotel">
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Slider Section End -->
    </div>
    <!-- Header Bottom End -->

    <!-- Search Mobile View -->
    <div id="search" class="search-home">
        <div class="container">
            {!! form_open(base_url('landing/searchrm'), 'name="search_form" id="search_form" method="GET"') !!}
            <div class="form-row">
                <div class="col-md-6">
                    <div class="input-daterange date-range form-row">
                        <div class="control-group col-md-6">
                            <label>Check-In</label>
                            <div class="form-group">
                                <div class="input-group w-100">
                                    <input type="text" class="form-control checkin" id="checkin" name="checkin"
                                        placeholder="DD/MM/YYYY" value="{{ date('d/m/Y') }}" autocomplete="off"
                                        onkeydown="return false" required />
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
                                        placeholder="DD/MM/YYYY" value="{{ date('d/m/Y', strtotime('+1 day')) }}"
                                        autocomplete="off" onkeydown="return false" required />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="control-group col-md-3">
                    <div class="form-row">
                        <div class="control-group col-md-6">
                            <label>People</label>
                            <input type="number" maxlength="2" min="1" max="32" class="form-control text-center"
                                name="count" id="count" style="border-radius: 30px" value="1" required>
                        </div>
                        {{-- <div class="control-group col-md-6">
                        <label>Kid</label>
                        <input type="text" class="form-control" id="kid" name="kid" placeholder="0" autocomplete="off"
                            style="border-radius: 30px" onkeypress="return inputAngka(event);" maxlength="2" />
                    </div> --}}
                    </div>
                </div>
                <div class="control-group col-md-3">
                    <button class="btn btn-block">Search</button>
                </div>
            </div>
            {!! form_close() !!}
        </div>
    </div>
    <!-- Search Mobile View End -->

    @include('content/beranda/wellcome')
</div>


@push('css_plugin')
    <link rel="stylesheet" href="{{ cdn . 'vendor/bootstrap-datepicker/bootstrap-datepicker.min.css' }}">
    <link rel="stylesheet" href="{{ cdn . 'vendor/bootstrap-datepicker/style-datepicker.css' }}">
@endpush

@push('js_plugin')
    <script src="{{ cdn . 'vendor/bootstrap-datepicker/bootstrap-datepicker.min.js' }}"></script>
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
            // beforeShowDay: function(date) {
            //     if (date_checkout !== undefined) {
            //         if (date.getDate() === date_checkout.getDate() &&
            //             date.getMonth() === date_checkout.getMonth() &&
            //             date.getFullYear() === date_checkout.getFullYear()) {
            //             return {
            //                 classes: 'active selected range-end'
            //             };
            //         }
            //     }
            //     return true;
            // }
        });

        // date_range.on('changeDate', (e) => {
        //     var id = e.target.attributes.id['value'];
        //     if (id == 'checkin') {
        //         date_checkout = new Date(new Date().setDate(e.date.getDate() + 1));
        //         var date_checkout_show = date_checkout.getDate() + '/' + (date_checkout.getMonth() +
        //             1) + '/' + date_checkout.getFullYear();
        //         $('.checkout').val(date_checkout_show);
        //     }

        //     if (id == 'checkout') {
        //         date_checkin = new Date(new Date().setDate(e.date.getDate() - 1));
        //         var date_checkin_show = date_checkin.getDate() + '/' + (date_checkin.getMonth() +
        //             1) + '/' + date_checkin.getFullYear();
        //         $('.checkin').val(date_checkin_show);
        //     }
        // });
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
