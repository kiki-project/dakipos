<!DOCTYPE html>
<html>
<head>
	<title>Print Data Arsip</title>
	<style type="text/css">
		body{
			font-family: arial;
		}
	</style>
</head>
<body>
<center>
  <br><br>
	<h1><u>INVOICE</u></h1>
  <h4><?php echo $inv['id_invoice']; ?></h4>
	<hr>  
</center>
<div class="container">
	<?php 


      $cart = $this->Mod_adm->get_cart_history($inv['id_invoice'])->result();
      $brg = 0;
      $hrg = 0;
      ?>
    <table class="table table-bordered table-striped">

      <tr>
        <td colspan="2" style="background-color: #fff;padding: 0px;">
          <table style="width: 100%;margin: 0px;">
            <tr>
              <td>Nama Penerima </td>
              <td>: <b><?php echo $inv['penerima']; ?></b></td>
            </tr>
            <tr>
              <td>No HP </td>
              <td>: <b><?php echo $inv['no_hp']; ?></b></td>
            </tr>
            <tr>
              <td>alamat </td>
              <td>: <?php echo $inv['alamat']; ?></td>
            </tr>
            <tr>
              <td>No resi </td>
              <td>: <?php echo $inv['no_resi']; ?></td>
            </tr>
            <tr>
              <td>Tanggal Transaksi </td>
              <td>: <?php echo $inv['trx_date']; ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <?php
      foreach ($cart as $key) {
      $brg += $key->jml;
      $hrg += $key->jml_harga;
      ?>
      <tr>
        <td style="width: 100px;padding: 3px;">
                      <?php 
                        if (!empty($key->img)) {
                          ?>
                          <div style="height: 100px;width: 100px;background-image: url(<?php echo base_url(); ?>assets/doc/<?php echo $key->img; ?>);background-size: cover;background-size: 120%;background-position: center;background-repeat: no-repeat;"></div>
                          <?php
                        }else{
                          ?>
                          <div style="width: 70px;height: 50px;background-color: #ccc;color:#aaa;text-align: center;padding: 10px;">none</div>
                          <?php
                        }
                       ?>
        </td>
        <td>
          <div><?php echo $key->barang; ?> - (<?php echo number_format($key->jml); ?> barang)</div>
          <div>
            <span style="color: #aaa;font-size: 12px;">ID:<?php echo $key->id_barang; ?></span>
            <span style="color: #aaa;font-size: 12px;">Ukuran : <?php echo $key->ukuran; ?></span>
            <h5><b class="f-color2">Rp. <?php echo number_format($key->jml_harga); ?></b></h5>
          </div>
        </td>
      </tr>
      <?php
      }
      ?>

    </table>
    <div class="row">
      <div class="col-md-6">&nbsp;</div>
      <div class="col-md-6" style="text-align: right;">
        <i style="font-size: 14px">Total Harga (<?php echo $brg; ?> Barang)</i>
        <h5><span class="f-color2">Rp. <?php echo number_format($hrg); ?></span></h5>
        <i style="font-size: 14px">Ongkos Kirim</i>
        <h5><span class="f-color2">Rp. <?php echo number_format($inv['ongkir']); ?></span></h5>
        <b style="font-size: 20px">Total Bayar</b>
        <h1><b class="f-color2"><i class="fa fa-credit-card"></i> Rp. <?php echo number_format($inv['total_bayar']); ?></b></h1>
      </div>
      <div>
        <h4>Ulasan:</h4>
          <?php 
            for ($i=0; $i <  $inv['rate']; $i++) { 
              ?>
                <i class="fa fa-star f-color2"></i>
              <?php
            }
           ?>
        <p><?php echo $inv['feedback']; ?></p>
      </div>
    </div>
</div>
</body>
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	// window.print();
});
</script>
</html>