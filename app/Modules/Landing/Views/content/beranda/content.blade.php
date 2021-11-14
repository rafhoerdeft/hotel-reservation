@extends('template/master')

@section('content')
    <!-- Slider Content-->
    @include('content/beranda/slider')

    <!-- Wellcome Content-->
    {{-- @include('content/beranda/wellcome') --}}

    <!-- Facility Content-->
    @include('content/beranda/facility')

    <!-- Rooms Content-->
    @include('content/beranda/room')

    <!-- Booking Content-->
    {{-- @include('content/beranda/booking') --}}

    <!-- Call Us Content -->
    @include('content/beranda/call')

@endsection

@push('js_plugin')
    <script src="{{ base_url('assets/js/scrl_link.js') }}"></script>
@endpush
