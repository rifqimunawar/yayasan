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
                            <h4> {{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('siswa.store') }}" method="post">
                                @csrf
                                <div class="form-group col-lg-6">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="name" required class="form-control ">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>NISN</label>
                                    <input type="number" name="nisn" required class="form-control ">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Tahun Masuk</label>
                                    <select name="tahun_masuk_id" class="form-control select2">
                                        <option selected disabled>-- pilih --</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger pt-3 col-lg-6" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-center col-lg-6">
                                    <a href="{{ route('siswa.index') }}" class="btn btn-warning mr-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
