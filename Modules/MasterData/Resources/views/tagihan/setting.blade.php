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
                        <div class="card-body row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Tagihan</label>
                                    <input type="text" name="name" readonly required class="form-control"
                                        inputmode="numeric" value="{{ $data->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="text" id="rupiah" readonly name="nominal" required
                                        class="form-control" value="{{ Fungsi::rupiah($data->nominal) }}"
                                        inputmode="numeric">
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Aktifkan tagihan untuk seluruh angkatan atau personal ?</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">Angkatan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                    role="tab" aria-controls="profile"
                                                    aria-selected="false">Personal</a>
                                            </li>
                                        </ul>
                                        <form action="/tagihan/{{ $data->id }}/target/" method="post">
                                            @csrf
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <select name="angkatan" class="form-control select2 ">
                                                        <option selected disabled>-- Pilih Angkatan --</option>
                                                        @foreach ($tahun as $item)
                                                            <option value="{{ $item->id }}">Siswa Tahun Masuk
                                                                {{ $item->tahun }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="tab-content fade" id="profile" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    <select class="form-control select2" name="siswa">
                                                        <option disabled selected>-- Pilih Siswa --</option>
                                                        @foreach ($siswa as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }} -
                                                                ({{ $item->nisn }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger pt-4 " role="alert">
                                                        <p><strong>Error</strong></p>
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-center mt-4">
                                                <a href="{{ route('tagihan.index') }}"
                                                    class="btn btn-warning mr-2">Kembali</a>
                                                <button type="submit" class="btn btn-primary ">Simpan</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
