<html>

<head>
    <title>Faktur</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;'>
    <center>
        <table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
                    <b>APOTEK JECONIA</b></br>Jl. Raya Kendalsari No.41A, Penjaringan Sari, Kec. Rungkut, Kota SBY, Jawa Timur 60297</span></br>


                <span style='font-size:12pt'>Kode. : <?= $data['penjualan']['kode_penjualan'] ?>, Tanggal : <?= $data['penjualan']['tanggal_penjualan'] ?> </span></br>
                <span style='font-size:12pt'>(customer : <?= $data['penjualan']['customer'] ?>)</span>
            </td>
        </table>
        <style>
            hr {
                display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 1px;
            }
        </style>
        <table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>

            <tr align='center'>
                <td width='10%'>Item</td>
                <td width='13%'>Price</td>
                <td width='4%'>Qty</td>
                <td width='7%'>-</td>
                <td width='13%'>Total</td>
            <tr>
                <td colspan='5'>
                    <hr>
                </td>
            </tr>
            </tr>
            <?php $sum = 0; ?>
            <?php foreach ($data['detailpenjualan'] as $key => $value) { ?>
                <tr>
                    <td style='vertical-align:top;font-size:10pt'><?= $value['nama_obat'] ?></td>
                    <td style='vertical-align:top; text-align:right; padding-right:10px;font-size:10pt'><?= round($value['harga'] - ($value['harga'] * ($value['diskon'] / 100))) ?></td>
                    <td style='vertical-align:top; text-align:right; padding-right:10px;font-size:10pt'><?= $value['qty'] ?></td>
                    <td style='vertical-align:top; text-align:right; padding-right:10px;font-size:10pt'></td>
                    <td style='text-align:right; vertical-align:top;font-size:10pt'><?= round($value['harga'] - ($value['harga'] * ($value['diskon'] / 100))) * $value['qty'] ?></td>
                </tr>

            <?php $sum += round($value['harga'] - ($value['harga'] * ($value['diskon'] / 100))) * $value['qty'];
            } ?>

            <tr>
                <td colspan='5'>
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan='4'>
                    <div style='text-align:right; color:black'>Total : </div>
                </td>
                <td style='text-align:right; font-size:16pt; color:black'><?= round($sum) ?></td>
            </tr>
            <tr>
                <td colspan='4'>
                    <div style='text-align:right; color:black'>Cash : </div>
                </td>
                <td style='text-align:right; font-size:16pt; color:black'><?= $data['penjualan']['total_sisa'] > 0 ? round($sum) - $data['penjualan']['total_sisa'] : round($sum) + $data['penjualan']['grand_kembalian'];   ?></td>
            </tr>
            <tr>
                <td colspan='4'>
                    <div style='text-align:right; color:black'>Change : </div>
                </td>
                <td style='text-align:right; font-size:16pt; color:black'><?= $data['penjualan']['grand_kembalian'] > 0 ? $data['penjualan']['grand_kembalian'] : 0;  ?></td>
            </tr>

            <tr>
                <td colspan='4'>
                    <div style='text-align:right; color:black'>Sisa : </div>
                </td>
                <td style='text-align:right; font-size:16pt; color:black'><?= $data['penjualan']['total_sisa'] > 0 ? $data['penjualan']['total_sisa'] : 0; ?></td>
            </tr>
        </table>
        <table style='width:350; font-size:12pt;' cellspacing='2'>
            <tr></br>
                <td align='center'>****** TERIMAKASIH ******</br></td>
            </tr>
        </table>
    </center>
</body>

</html>