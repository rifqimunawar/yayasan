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
                            <a href="{{ route('tahun_masuk.create') }}" class="ml-2 btn btn-primary"> Tambah <ion-icon
                                    name="add-circle-outline"></ion-icon><i class="ml-2 fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Tahun Masuk</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->id }}
                                                </td>
                                                <td>{{ $item->tahun }}</td>
                                                <td>
                                                    {{ $item->siswas->count() }} siswa
                                                </td>
                                                <td>
                                                    <a href="{{ route('tahun_masuk.edit', $item->id) }}">
                                                        <i class="fa fa-pencil-square-o ml-2"></i>
                                                    </a>
                                                    <a href="{{ route('tahun_masuk.destroy', $item->id) }}"
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
