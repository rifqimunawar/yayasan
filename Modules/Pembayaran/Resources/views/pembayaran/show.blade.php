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
                        <div class="card-body d-flex justify-content-center">
                            <div class="col-lg-6 mt-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-9">
                                        <label>: {{ $siswa->name }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NISN</label>
                                    <div class="col-sm-9">
                                        <label>: {{ $siswa->nisn }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <label>: Alamat</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                {{-- <img src="https://d220hvstrn183r.cloudfront.net/attachment/42780229052115364390.large"
                                    alt=""
                                    style="width: 200px; height:230px; object-fit:cover; border-radius:20px; box-shadow: 5px 5px;"> --}}
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4> {{ $title }}</h4>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nominal</th>
                                                <th>Tagihan</th>
                                                <th>Terbayar</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa->tagihans as $item)
                                                {{-- @dd($siswa->tagihans); --}}
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Fungsi::rupiah($item->nominal) }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ Fungsi::rupiah($item->pivot->nominal_tagihan_terbayar) }}</td>
                                                    <td>
                                                        @if ($item->pivot->status == 1)
                                                            <span class="badge badge-success">Lunas</span>
                                                            <a href="{{ route('pembayaran.invoice', $item->pivot->id) }}"
                                                                id="btnPrint" class="badge badge-info">Invoice</a>
                                                        @else
                                                            <span class="badge badge-danger">Belum Lunas</span>
                                                        @endif
                                                    </td>

                                                    <td class="text-center">
                                                        @if ($item->pivot->status == 1)
                                                            <button class="btn btn-success" disabled>Sudah Lunas</button>
                                                        @else
                                                            <a href="{{ route('pembayaran.make', ['id' => $item->pivot->id, 'siswa_id' => $siswa->id]) }}"
                                                                class="btn btn-danger">
                                                                Bayar Sekarang
                                                            </a>
                                                        @endif

                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                    <a href="{{ route('pembayaran.index') }}" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- script -->
<script>
    $(document).ready(function() {
        // Inisialisasi tombol cetak
        $('#btnPrint').printPage();

        // Inisialisasi DatePicker dengan auto close
        $("#datepicker-autoClose").datepicker({
            todayHighlight: true,
            autoclose: true
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var rupiah = document.getElementById('rupiah');

        // Menambahkan event listener untuk memformat input menjadi format rupiah
        if (rupiah) { // Memastikan elemen dengan ID 'rupiah' ada
            rupiah.addEventListener('keyup', function(e) {
                // Format nilai dengan prefix 'Rp.' atau tanpa prefix sesuai kebutuhan
                rupiah.value = formatRupiah(this.value, '');
            });
        }

        /**
         * Fungsi untuk format angka menjadi format ribuan dengan prefix
         * @param {string} angka - Nilai input yang akan diformat
         * @param {string} prefix - Prefix yang akan ditambahkan
         * @return {string} - Nilai yang telah diformat
         */
        function formatRupiah(angka, prefix) {
            // Menghapus semua karakter non-numeric kecuali koma
            var number_string = angka.replace(/[^,\d]/g, '').toString();
            var split = number_string.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // Tambahkan titik setiap 3 digit ribuan
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            // Tambahkan koma jika ada bagian desimal
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            // Tambahkan prefix jika disediakan
            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
    });
</script>
