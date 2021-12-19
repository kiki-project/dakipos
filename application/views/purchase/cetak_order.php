<div class="page-cetak">
    <table style="width:100%;" border="1">
        <tr>
            <td rowspan="3">
                <img src="<?php echo base_url(); ?>assets/doc/logo/main_logo.png" alt="" style="width: 106px;height: 98px;">
            </td>
            <td rowspan="3">
                <b>Pesanan Pembelian (PO)</b><br>
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
</div>