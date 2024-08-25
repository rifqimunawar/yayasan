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
                        <div class="card-header col-lg-6">
                            <h4> {{ $title }}</h4>
                        </div>
                        <div class="card-body col-lg-6">
                            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input id="file-upload" type="file" name="file" required
                                        style="position: relative; z-index: 1; padding: 10px 20px; background-color: #007bff; color: #fff; border: 2px solid #007bff; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, border-color 0.3s;"
                                        onmouseover="this.style.backgroundColor='#0056b3'; this.style.borderColor='#0056b3';"
                                        onmouseout="this.style.backgroundColor='#007bff'; this.style.borderColor='#007bff';" />

                                </div>

                                <p>Pastikan format file excel anda seperti contoh file
                                    <a href="{{ asset('assets/format-import-data-siswa.xlsx') }}" download>
                                        <strong>disini!</strong>
                                    </a>
                                </p>
                                @if ($errors->any())
                                    <div class="alert alert-danger pt-4 col-lg-6" role="alert">
                                        <p><strong>Error</strong></p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <a href="{{ route('siswa.index') }}" class="btn btn-warning mr-2">Kembali</a>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
