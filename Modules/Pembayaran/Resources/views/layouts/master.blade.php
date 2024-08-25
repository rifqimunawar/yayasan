@extends('layouts.master')
@section('title', 'Role')
@section('content')
    @push('css')
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    @endpush
    @yield('content-module')
    @push('scripts')
        <!-- JS Libraies -->
        <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

        <!-- Page Specific JS File -->
        <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    @endpush
@endsection
