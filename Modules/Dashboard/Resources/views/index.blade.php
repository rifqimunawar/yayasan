@extends('dashboard::layouts.master')

@section('content-module')
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
        </div>
    </section>
@endsection
