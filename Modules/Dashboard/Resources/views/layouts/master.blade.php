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

    {{-- ==================================================================================== --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Siswa</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalSiswa }} Siswa
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Tagihan</h4>
                        </div>
                        <div class="card-body">
                            {{ Fungsi::rupiah($totalNominal) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Sudah Masuk</h4>
                        </div>
                        <div class="card-body">
                            {{ Fungsi::rupiah($totalNominalMasuk) }}
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                                <button id="btn-seminggu" class="btn btn-primary">Seminggu</button>
                                <button id="btn-sebulan" class="btn btn-primary">Sebulan</button>
                                <button id="btn-3sebulan" class="btn btn-primary">3 Bulan</button>
                                <button id="btn-6sebulan" class="btn btn-primary">6 Bulan</button>
                                <button id="btn-setahun" class="btn btn-primary">Setahun</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ==================================================================================== --}}

    @push('scripts')
        <!-- JS Libraries -->
        <script src="{{ asset('assets/modules/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
        <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
        <!-- Page Specific JS File -->
        <script src="{{ asset('assets/js/page/index.js') }}"></script>


        {{-- ==================================================================================== --}}
        <script>
            $(document).ready(function() {
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [],
                        datasets: [{
                            label: 'Nominal',
                            data: [],
                            borderWidth: 2,
                            backgroundColor: 'rgba(63,82,227,.8)',
                            borderColor: 'rgba(63,82,227,1)',
                            pointBorderWidth: 0,
                            pointRadius: 3.5,
                            pointBackgroundColor: 'transparent',
                            pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    drawBorder: true,
                                    color: '#f2f2f2',
                                },
                                ticks: {
                                    beginAtZero: true,
                                    callback: function(value) {
                                        return value + 'k';
                                    }
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                    tickMarkLength: 15,
                                }
                            }]
                        },
                    }
                });

                function updateChart(route) {
                    $.ajax({
                        url: route,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);

                            var nominalData = [];
                            var tanggalLabels = [];

                            data.forEach(function(item) {
                                nominalData.push(parseInt(item.nominal));
                                tanggalLabels.push(item.tanggal_transaksi);
                            });

                            // Update chart data
                            myChart.data.labels = tanggalLabels;
                            myChart.data.datasets[0].data = nominalData;
                            myChart.update(); // Refresh chart
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + status + " " + error);
                        }
                    });
                }

                // Event listener untuk tombol
                $('#btn-seminggu').on('click', function() {
                    updateChart('{{ route('dashboard.get_ajax_statistik_seminggu') }}');
                });

                $('#btn-sebulan').on('click', function() {
                    updateChart('{{ route('dashboard.get_ajax_statistik_sebulan') }}');
                });

                $('#btn-3sebulan').on('click', function() {
                    updateChart('{{ route('dashboard.get_ajax_statistik_3sebulan') }}');
                });

                $('#btn-6sebulan').on('click', function() {
                    updateChart('{{ route('dashboard.get_ajax_statistik_6sebulan') }}');
                });

                $('#btn-setahun').on('click', function() {
                    updateChart('{{ route('dashboard.get_ajax_statistik_setahun') }}');
                });

                // Load data awal
                updateChart('{{ route('dashboard.get_ajax_statistik') }}');
            });
        </script>
    @endpush
@endsection
