@extends('roles::layouts.master')
@section('content-module')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">{{ $title }}</h2> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Table {{ $title }}</h4>

                            <div class="d-flex ">
                                <form action="{{ route('history.index') }}" class="ml-4" method="GET">
                                    <div class="input-group mb-3">
                                        <!-- Tombol SD -->
                                        <input type="hidden" name="search" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-warning m-2" type="submit">SD</button>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{ route('history.index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <!-- Tombol SMP -->
                                        <input type="hidden" name="search" value="2">
                                        <div class="input-group-append">
                                            <button class="btn btn-info m-2" type="submit">SMP</button>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{ route('history.index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <!-- Tombol SMA -->
                                        <input type="hidden" name="search" value="3">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary m-2" type="submit">SMA</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>Kategori</th>
                                            <th>Tahun Masuk</th>
                                            <th>Tagihan</th>
                                            <th>Nominal Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $item->siswa->name }}</td>
                                                <td>{{ $item->siswa->nisn }}</td>
                                                <td>{{ $item->siswa->category->name }}</td>
                                                <td>{{ $item->siswa->tahunMasuk->tahun }}</td>
                                                <td>{{ $item->siswa->tagihans->pluck('name')->implode(', ') }}</td>
                                                <td>{{ Fungsi::rupiah($item->nominal) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->translatedFormat('d F Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('pembayaran.invoice', $item->id) }}"
                                                        class="btn btn-primary"
                                                        style="font-size: 10px; padding: 10px 20px;">
                                                        <i class="fa fa-money" style="font-size: 10px;"></i>
                                                        Invoice</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
