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
                                <a href="#" class="btn btn-primary">Week</a>
                                <a href="#" class="btn">Month</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="80"></canvas>
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
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August"],
                    datasets: [{
                            label: 'Sales',
                            data: [3200, 1800, 4305, 3022, 6310, 5120, 5880, 6154],
                            borderWidth: 2,
                            backgroundColor: 'rgba(63,82,227,.8)',
                            borderWidth: 0,
                            borderColor: 'transparent',
                            pointBorderWidth: 0,
                            pointRadius: 3.5,
                            pointBackgroundColor: 'transparent',
                            pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                        },
                        {
                            label: 'Budget',
                            data: [2207, 3403, 2200, 5025, 2302, 4208, 3880, 4880],
                            borderWidth: 2,
                            backgroundColor: 'rgba(254,86,83,.7)',
                            borderWidth: 0,
                            borderColor: 'transparent',
                            pointBorderWidth: 0,
                            pointRadius: 3.5,
                            pointBackgroundColor: 'transparent',
                            pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                // display: false,
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1500,
                                callback: function(value, index, values) {
                                    return '$' + value;
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
        </script>
    @endpush
@endsection
