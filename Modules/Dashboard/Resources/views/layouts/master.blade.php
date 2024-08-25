@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

    @push('css')
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
    @endpush

    @yield('content-module')

    @push('scripts')
        <!-- JS Libraries -->
        <script src="{{ asset('assets/modules/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
        <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
        <!-- Page Specific JS File -->
        <script src="{{ asset('assets/js/page/index.js') }}"></script>
    @endpush
@endsection
