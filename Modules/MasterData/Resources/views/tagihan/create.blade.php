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
                            <form action="{{ route('tagihan.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Tagihan</label>
                                    <input type="text" name="name" required class="form-control col-lg-6"
                                        inputmode="numeric">
                                </div>
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="text" id="rupiah" name="nominal" required
                                        class="form-control col-lg-6" inputmode="numeric">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" id="category_id" required class="form-control col-lg-6">
                                        <option selected disabled>Pilih Kategori</option>
                                        <option value="1">SD</option>
                                        <option value="2">SMP</option>
                                        <option value="3">SMA</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-center col-lg-6">
                                    <a href="{{ route('tagihan.index') }}" class="btn btn-warning mr-2">Kembali</a>
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
<!-- script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var rupiah = document.getElementById('rupiah');

        rupiah.addEventListener('keyup', function(e) {
            // Format nilai dengan prefix 'Rp. '
            // rupiah.value = formatRupiah(this.value, 'Rp. ');
            rupiah.value = formatRupiah(this.value, '');
        });

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
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            // Tambahkan koma jika ada bagian desimal
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            // Tambahkan prefix jika disediakan
            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
    });


    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true
    });
</script>
