<div class="page-cetak">
    <table style="width:100%;">
        <tr>
            <td rowspan="3" style="text-align:center;">
                <img src="<?php echo base_url(); ?>assets/doc/logo/main_logo.png" alt="" style="width: 106px;height: 98px;">
            </td>
            <td rowspan="3">
                <b>Bukti Pembelian	</b><br>
                <b>DAKI STTM</b><br>
                Jakarta
            </td>
            <td style="text-align:right;">No Transaksi :</td>
            <td style="text-align:left;"><?php echo $data['kode']; ?></td>
            <td style="text-align:right;">Dept :</td>
            <td style="text-align:left;"><?php echo $data['masuk_ke']; ?></td>
        </tr>
        <tr>
            <td style="text-align:right;">Tanggal :</td>
            <td style="text-align:left;"><?php echo $data['tanggal']; ?></td>
            <td style="text-align:right;">User :</td>
            <td style="text-align:left;"><?php echo $data['user']; ?></td>
        </tr>
        <tr>
            <td style="text-align:right;">Supplier :</td>
            <td style="text-align:left;"><?php echo $data['supplier']." ".$data['supplier_name']; ?></td>
            <td style="text-align:right;">PPN :</td>
            <td style="text-align:left;"><?php echo $data['ppn']; ?></td>
        </tr>
    </table>
    <br><br><br>
    <table style="width:100%;">
        <tr style="border-top:1px solid #000;border-bottom:1px solid #000;">
            <th style="text-align:center;">No.</th>
            <th style="text-align:left;">Kode Item</th>
            <th style="text-align:left;">Nama Item</th>
            <th style="text-align:right;">Jml</th>
            <th style="text-align:left">&nbsp;&nbsp;Satuan</th>
            <th style="text-align:right;">Harga</th>
            <th style="text-align:left;">&nbsp;&nbsp;Pot.</th>
            <th style="text-align:right;">Total</th>
        </tr>
        <?php 
            $no = 1;
            foreach ($item as $key) {
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $no++; ?></td>
            <td style="text-align:left;"><?php echo $key->kode_item; ?></td>
            <td style="text-align:left;"><?php echo $key->name; ?></td>
            <td style="text-align:right;"><?php echo number_format($key->jumlah,2); ?></td>
            <td style="text-align:left;">&nbsp;&nbsp;<?php echo $key->satuan; ?></td>
            <td style="text-align:right;"><?php echo number_format($key->harga,2); ?></td>
            <td style="text-align:left;">&nbsp;&nbsp;<?php echo number_format($key->potongan,2); ?></td>
            <td style="text-align:right;"><?php echo number_format($key->total,2); ?></td>
        </tr>
        <?php
            }
        ?>
        <tr style="border-top:1px solid #000;">
            <td colspan="2">Keterangan</td>
            <td></td>
            <td style="text-align:right;">Jml Item : </td>
            <td style="text-align:right;"><?php echo number_format($data['sub_total_item'],2); ?></td>
            <td style="text-align:right;">Sub Total : </td>
            <td style="text-align:right;" colspan="2"><?php echo number_format($data['sub_total_harga'],2); ?></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="5" style="vertical-align:top;"><i><?php echo $data['description']?></i></td>
            <td style="text-align:right;">Potongan : </td>
            <td style="text-align:right;"><?php echo number_format($data['potongan'],2); ?></td>
            <td style="text-align:right;">Total Aktif : </td>
            <td style="text-align:right;" colspan="2"><?php echo number_format($data['sub_total_harga'],2); ?></td>
        </tr>
        <tr>
            <td style="text-align:right;">Pajak : </td>
            <td style="text-align:right;"><?php echo number_format($data['pajak_nilai'],2); ?></td>
            <td style="text-align:right;">DP PO : </td>
            <td style="text-align:right;" colspan="2"><?php echo number_format($data['dp'],2); ?></td>
        </tr>
        <tr>
            <td style="text-align:right;">Biaya Lain : </td>
            <td style="text-align:right;"><?php echo number_format($data['biaya_lain'],2); ?></td>
            <td style="text-align:right;">Tunai : </td>
            <td style="text-align:right;" colspan="2"><?php echo number_format($data['tunai'],2); ?></td>
        </tr>
        <tr>
            <td style="text-align:right;">Tanggal JT : </td>
            <td style="text-align:right;"><?php echo number_format($data['jatuh_tempo'],2); ?></td>
            <td style="text-align:right;">Kredit : </td>
            <td style="text-align:right;" colspan="2"><?php echo number_format($data['kredit'],2); ?></td>
        </tr>
        <tr>
            <td style="text-align:right;" colspan="2"></td>
            <td style="text-align:right;">Kembali : </td>
            <td style="text-align:right;" colspan="2"><?php echo number_format($data['kembali'],2); ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width:200px; text-align:center;">Hormat Kami<td>
            <td style="width:200px; text-align:center;">Penerima<td>
        </tr>
        <tr>
            <td><br><br></td>
            <td><br><br></td>
        </tr>
        <tr>
            <td style="width:200px; text-align:center;">(.........................)	<td>
            <td style="width:200px; text-align:center;">(.........................)	<td>
        </tr>
    </table>
</div>