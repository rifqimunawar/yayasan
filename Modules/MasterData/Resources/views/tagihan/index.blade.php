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

                            <form action="">
                                <div class="input-group mb-3">
                                    <a href="{{ route('tagihan.create') }}" class="ml-2 btn btn-primary"> Tambah <ion-icon
                                            name="add-circle-outline"></ion-icon><i class="ml-2 fa fa-plus"></i></a>
                                </div>
                            </form>

                            <form action="{{ route('tagihan.index') }}" class="ml-4" method="GET">
                                <div class="input-group mb-3">
                                    <!-- Tombol SD -->
                                    <input type="hidden" name="search" value="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-warning m-2" type="submit">SD</button>
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('tagihan.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <!-- Tombol SMP -->
                                    <input type="hidden" name="search" value="2">
                                    <div class="input-group-append">
                                        <button class="btn btn-info m-2" type="submit">SMP</button>
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('tagihan.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <!-- Tombol SMA -->
                                    <input type="hidden" name="search" value="3">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary m-2" type="submit">SMA</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Tagihan</th>
                                            <th>Nominal</th>
                                            <th>Kategori</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    {{ Fungsi::rupiah($item->nominal) }}
                                                </td>
                                                <td>
                                                    {{ $item->category->name }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="/tagihan/{{ $item->id }}/{{ $item->category->id }}"
                                                        class="btn btn-primary btn-sm">
                                                        Setting Pembayaran
                                                    </a>
                                                    <a href="{{ route('tagihan.edit', $item->id) }}">
                                                        <i class="fa fa-pencil-square-o ml-2"></i>
                                                    </a>
                                                    <a href="{{ route('tagihan.destroy', $item->id) }}"
                                                        data-confirm-delete="true">
                                                        <i class="fa fa-trash ml-2"></i>
                                                    </a>
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
