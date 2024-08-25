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
                                    <tr>
                                        <td width="40%">No. Transaksi</td>
                                        <td width="1%">:</td>
                                        <td width="60%">nomor</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>nama</td>
                                    </tr>
                                    <tr>
                                        <td>Tgl lahir</td>
                                        <td>:</td>
                                        <td>tanggal lahir</td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Masuk</td>
                                        <td>:</td>
                                        <td>Tahun masuk</td>
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
                                        <td style="width: 33.33%; padding: 2px;">Nadi</td>
                                        <td style="width: 66.66%; padding: 2px;">
                                            5 &emsp;x/menit
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <!-- TTD -->
                    <table width="100%" style="margin-top: 5rem;">
                        <tr>
                            <td width="50%">
                                {{-- sisi kiri --}}
                            </td>
                            <td width="50%">
                                <table width="100%" <table width="100%" style="text-align: center;">
                                    <tbody
                                        style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <tr style="display: flex; justify-content: center; width: 100%;">
                                            <td style="display: flex; justify-content: center;">Kepala Sekolah</td>
                                        </tr>
                                        <tr style="display: flex; justify-content: center; width: 100%;">
                                            <td width="100px" style="display: flex; justify-content: center;">
                                                <img src="https://www.shutterstock.com/image-vector/fake-autograph-samples-handdrawn-signatures-260nw-2332469589.jpg"
                                                    alt="Signature" width="110px"
                                                    style="padding-top: 10px; padding-bottom: 10px;">
                                            </td>
                                        </tr>
                                        <tr style="display: flex; justify-content: center; width: 100%;">
                                            <td style="display: flex; justify-content: center; padding-top: 20px;">
                                                Nama Kepala Sekolah
                                            </td>
                                        </tr>
                                        <tr style="display: flex; justify-content: center; width: 100%;">
                                            <td style="display: flex; justify-content: center; padding-top: 20px;">
                                                (....................................)
                                            </td>
                                        </tr>
                                        <tr style="display: flex; justify-content: center; width: 100%;">
                                            <td style="display: flex; justify-content: center;"><i>Nama jelas dan tanda
                                                    tangan</i></td>
                                        </tr>
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
