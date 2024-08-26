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
                                        <label>: {{ $data->name }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NISN</label>
                                    <div class="col-sm-9">
                                        <label>: {{ $data->nisn }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <label>: Alamat</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-12">
                                    {{-- @dd($data); --}}
                                    <label class="col-sm-6">Tagihan:</label>
                                    {{ $data->tagihans->first()->name ?? 'Tidak ada tagihan' }} <br>
                                    <label class="col-sm-6">Nominal:</label>
                                    {{ Fungsi::rupiah($data->tagihans->first()->nominal) ?? '0' }}
                                    <br>
                                    <label class="col-sm-6">Nominal Tagihan Terbayar</label>
                                    {{ Fungsi::rupiah($data->tagihans->first()->pivot->nominal_tagihan_terbayar) }}
                                    <label class="col-sm-6">Status</label>
                                    {{ $data->tagihans->first()->pivot->status == 0 ? 'Belum Lunas' : 'Lunas' }}
                                </div>


                            </div>
                            <div class="col-lg-6">
                                <form action="{{ route('pembayaran.save', $data->tagihans->first()->pivot->id) }}"
                                    method="post">
                                    @csrf
                                    <span id="nominalTagihan" style="display: none;">{{ $sisa_nominal ?? 0 }}</span>
                                    <div class="form-group-row mb-3">
                                        <label for="">Tanggal</label>
                                        <input readonly type="datetime-local" class="form-control"
                                            value="{{ $tanggal }}">
                                    </div>
                                    <div class="form-group-row mb-3">
                                        <label for="">Nominal Pembayaran</label>
                                        <input type="text" name="nominal" id="rupiah" class="form-control"
                                            value="" onkeyup="calculateChange()">
                                    </div>
                                    <div class="form-group-row mt-3">
                                        <label for="">TU Keuangan</label>
                                        <p>{{ Auth::user()->name }}</p>
                                    </div>

                                    <div class="d-flex justify-content-center mt-3">

                                        <input type="hidden" name="siswa_tagihan_id"
                                            value="{{ $data->tagihans->first()->pivot->id }}">
                                        <input type="hidden" name="siswa_id" value="{{ $data->id }}">
                                        <input type="hidden" name="tagihan_id" value="{{ $data->tagihans->first()->id }}">

                                    </div>


                                    <div>
                                        <a href="{{ route('pembayaran.show', $data->id) }}"
                                            class="btn btn-warning mr-3">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

            <div class="card">
                <div class="card-header">
                    <h4> History Pembayaran {{ $data->name }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                                <th>Penerima</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history_pembayaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal_transaksi }}</td>
                                    <td>{{ Fungsi::rupiah($item->nominal) }}</td>
                                    {{-- <td>
                                        @foreach ($item->siswa->tagihans as $tagihan)
                                            {{ Fungsi::rupiah($tagihan->nominal) }} @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td> --}}
                                    <td>{{ $item->users->name }}</td>
                                    <td>
                                        <a href="{{ route('pembayaran.invoice', $item->id) }}" id="btnPrint"
                                            class="badge badge-info">Invoice</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="text-center">
                        <a href="{{ route('pembayaran.show', $data->id) }}" class="btn btn-warning mr-3">Kembali</a>
                    </div> --}}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
<!-- script -->
<script>
    function calculateChange() {
        const payment = parseFloat(document.getElementById('rupiah').value.replace(/[^0-9]/g, "")) || 0;
        const nominalTagihan = parseFloat(document.getElementById('nominalTagihan').innerText) || 0;
        const change = payment - nominalTagihan;
        document.getElementById('kembalian').value = change >= 0 ? formatRupiah(change) : '';
    }

    function formatRupiah(angka) {
        return 'Rp. ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    document.addEventListener('DOMContentLoaded', function() {
        const rupiah = document.getElementById('rupiah');
        if (rupiah) {
            rupiah.addEventListener('keyup', function() {
                const rawValue = this.value.replace(/[^0-9]/g, '');
                this.value = formatRupiah(rawValue);
                calculateChange();
            });
        }
    });
</script>
