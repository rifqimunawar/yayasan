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
                            <form action="{{ route('siswa.update', $data->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" value="{{ $data->name }}" name="name" required
                                        class="form-control col-lg-6">
                                </div>
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="number" value="{{ $data->nisn }}" name="nisn" required
                                        class="form-control col-lg-6">
                                </div>
                                <div class="form-group ">
                                    <label>Tahun Masuk</label>
                                    <select name="tahun_masuk_id" class="form-control select2 col-lg-6">
                                        <option selected disabled>-- pilih --</option>
                                        @foreach ($tahun_masuk as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $data->tahun_masuk_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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
