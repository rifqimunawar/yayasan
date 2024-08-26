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
                        <div class="card-body col-lg-6">
                            <form action="{{ route('user.update', $data->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" value="{{ $data->name }}" name="name" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" required class="form-control"
                                        value="{{ $data->username }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="{{ $data->email }}" name="email" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control select2 form-control">
                                        <option selected disabled>-- Pilih --</option>
                                        @foreach ($role as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $data->role_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('user.index') }}" class="btn btn-warning mr-2">Kembali</a>
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
<script>
    document.getElementById('username').addEventListener('input', function(e) {
        // Menghilangkan spasi dan mengubah menjadi huruf kecil
        this.value = this.value.replace(/\s+/g, '').toLowerCase();
    });
</script>
