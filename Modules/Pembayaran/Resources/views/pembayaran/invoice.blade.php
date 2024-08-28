<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <style type="text/css">
        fieldset {
            border: 0px solid #ddd !important;
            margin: 0;
            xmin-width: 0;
            padding: 10px;
            position: relative;
            border-radius: 4px;
            background-color: #f5f5f5;
            padding-left: 10px !important;
        }

        legend {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0px;
            width: 35%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            background-color: #ffffff;
        }

            {
            box-sizing: border-box;
        }

        .header {
            border: 1px solid gray;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        tr,
        td:not(.header_text) {
            text-align: justify;
            vertical-align: top;
        }

        .table_td {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            border-left: 1px solid gray;
            border-right: 1px solid gray;
        }

        input[type="checkbox"][readonly] {
            pointer-events: none;
        }

        tr,
        td {
            padding-left: 5px;
            padding-right: 5px;
        }

        td,
        tr,
        div {
            font-family: calibri;
        }

        /* } */
    </style>
</head>

<body>
    <div class="card-body">
        <div class="box-border">
            <fieldset>
                <div class="row">
                    <!-- HEADER -->
                    <table border="0" class="header" width="100%">
                        <tr>
                            <td class="table_td header_text" width="20%" align="center">
                                <img alt="logo"
                                    src="https://storage.nu.or.id/storage/post/1_1/mid/logo-baru-uninus-news18112023_1700288683.webp"
                                    height="70" width="70">
                                <p>nama lembaga<br />alamat</p>
                            </td>
                            <td class="table_td header_text" width="28%" align="center" colspan="2"
                                style="font-weight: bold;vertical-align:middle">
                                <label>
                                    <h2>BUKTI PEMBAYARAN</h2>
                                </label>
                            </td>
                            <td class="table_td header_text" width="20%">
                                <table border="0" class="table2" width="100%">
                                    <tr style="padding-top: 10px">
                                        <td style="color: transparent;">|||</td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">No. Transaksi</td>
                                        <td width="1%">:</td>
                                        <td width="60%">
                                            {{ $data->id }}/{{ $data->siswa->id }}/{{ $data->siswa->tagihans->pluck('id')->implode(', ') }}/{{ \Carbon\Carbon::parse($data->tanggal_transaksi)->format('Y/m/d') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $data->siswa->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td>{{ $data->siswa->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Masuk</td>
                                        <td>:</td>
                                        <td>{{ $data->siswa->tahunMasuk->tahun }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <!-- ISI KONTEN -->
                    <table style="width: 100%; border-collapse: collapse; margin-top:3rem">
                        <tr>
                            <td style="width: 50%; text-align: center; vertical-align: top; padding: 2px;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tr>
                                        <td style="width: 15%; padding: 10px;">Nama</td>
                                        <td style="width: 3%; padding: 10px;">:</td>
                                        <td style="width: 80%; padding: 10px;">
                                            {{ $data->siswa->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%; padding: 10px;">Kategori</td>
                                        <td style="width: 3%; padding: 10px;">:</td>
                                        <td style="width: 80%; padding: 10px;">
                                            {{ $data->siswa->category->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%; padding: 10px;">Tahun masuk</td>
                                        <td style="width: 3%; padding: 10px;">:</td>
                                        <td style="width: 80%; padding: 10px;">
                                            {{ $data->siswa->tahunMasuk->tahun }}
                                        </td>
                                    </tr>
                                    <td style="width: 15%; padding: 10px;">
                                        <hr>
                                    </td>
                                    <td style="width: 3%; padding: 10px;">
                                        <hr>
                                    </td>
                                    <td style="width: 80%; padding: 10px;">
                                        <hr>
                                    </td>
                                    <tr>
                                        <td style="width: 15%; padding: 10px;">Pembayaran</td>
                                        <td style="width: 3%; padding: 10px;">:</td>
                                        <td style="width: 80%; padding: 10px;">
                                            {{ $data->siswa->tagihans->pluck('name')->implode(', ') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%; padding: 10px;">Nominal Tagihan</td>
                                        <td style="width: 3%; padding: 10px;">:</td>
                                        <td style="width: 80%; padding: 10px;">
                                            {{ Fungsi::rupiah($data->siswa->tagihans->pluck('nominal')->implode(', ')) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%; padding: 10px;">Nominal Dibayar</td>
                                        <td style="width: 3%; padding: 10px;">:</td>
                                        <td style="width: 80%; padding: 10px;">
                                            {{ Fungsi::rupiah($data->nominal) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%; padding: 10px;">Tanggal</td>
                                        <td style="width: 3%; padding: 10px;">:</td>
                                        <td style="width: 80%; padding: 10px;">
                                            {{ \Carbon\Carbon::parse($data->tanggal_transaksi)->format('Y/m/d') }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <!-- TTD -->
                    <table width="100%" style="margin-top: 1rem;">
                        <tr>
                            <td width="50%">
                                {{-- sisi kiri --}}
                            </td>
                            <td width="50%">
                                <table width="100%" <table width="100%" style="text-align: center;">
                                    <tbody
                                        style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <tr style="display: flex; justify-content: center; width: 100%;">
                                            <td style="display: flex; justify-content: center;">TU Keuangan</td>
                                        </tr>
                                        <tr
                                            style="display: flex; justify-content: center; width: 100%; margin-bottom:80px">
                                        </tr>

                                        @if (isset($data->users) && !empty($data->users))
                                            <tr style="display: flex; justify-content: center; width: 100%;">
                                                <td style="display: flex; justify-content: center; padding-top: 20px;">
                                                    ({{ $data->users->name }} )
                                                </td>
                                            </tr>
                                        @else
                                            <tr style="display: flex; justify-content: center; width: 100%;">
                                                <td style="display: flex; justify-content: center; padding-top: 20px;">
                                                    Nama pengguna tidak tersedia
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>

                </div>
            </fieldset>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.print();
        });
    </script>
</body>

</html>
