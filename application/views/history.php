
	<style type="text/css">
		.layer1{
			margin-top: 0px;
			text-align: center;
			padding: 10px;
			font-family: arial;
		}
		.star{
			position: relative;
			color: #ccc;
			font-size: 22px;
		}
		.radio-rate{
			position: absolute;
			z-index: 1;
			cursor:pointer;
			margin: 5px;
			margin-left: -20px;
			opacity: 0;
		}
		#rate{
			font-size: 12px;
		}
	</style>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<br>
		<h4><i class="fa fa-history"></i> History Transaksi</h4>
		<hr>
			
		<?php 
		foreach ($inv as $invc) {

			$cart = $this->Mod_adm->get_cart_history($invc->id_invoice)->result();
			$brg = 0;
			$hrg = 0;
			?>
		<table class="table table-bordered table-striped">

			<tr>
				<td colspan="2">
					<i><?php echo $invc->id_invoice; ?>/<?php echo $invc->trx_date; ?></i>
					<?php 
						if ($invc->status == 'Transaksi Selesai') {
							?>
					<span style="float: right;"><a href="<?php echo base_url(); ?>cetak/<?php echo $invc->id_invoice ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a></span>
							<?php
						}else{
							?>
					<span style="float: right;"><b><?php echo $invc->status; ?></b></span>
							<?php
							
						}
					 ?>
				</td>
			</tr>
			<?php
			foreach ($cart as $key) {
			$brg += $key->jml;
			$hrg += $key->jml_harga;
			?>
			<tr>
				<td style="width: 100px;padding: 3px;">
					<a href="<?php echo base_url(); ?>detail-produk/<?php echo $key->id_barang; ?>">
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
                    </a>
				</td>
				<td>
					<div><a href="<?php echo base_url(); ?>detail-produk/<?php echo $key->id_barang; ?>" style="color: #111;"><?php echo $key->barang; ?></a> - (<?php echo number_format($key->jml); ?> barang)</div>
					<div>
						<span style="color: #aaa;font-size: 12px;">Ukuran : <?php echo $key->ukuran; ?></span>
						<h5><b class="f-color2">Rp. <?php echo number_format($key->jml_harga); ?></b></h5>
					</div>
				</td>
			</tr>
			<?php
			}
			?>
			<?php if ($invc->status == 'Pesanan Dikirim' OR $invc->status == 'Transaksi Selesai'): ?>
			<tr>
				<td colspan="2">No Resi: <b><?php echo $invc->no_resi; ?></b></td>
			</tr>
			<?php endif ?>
		</table>
		<div class="row">
			<div class="col-md-6">&nbsp;</div>
			<div class="col-md-6" style="text-align: right;">
				<i style="font-size: 14px">Total Harga (<?php echo $brg; ?> Barang)</i>
				<h5><span class="f-color2">Rp. <?php echo number_format($hrg); ?></span></h5>
				<i style="font-size: 14px">Ongkos Kirim</i>
				<h5><span class="f-color2">Rp. <?php echo number_format($invc->ongkir); ?></span></h5>
				<b style="font-size: 20px">Total Bayar</b>
				<h1><b class="f-color2"><i class="fa fa-credit-card"></i> Rp. <?php echo number_format($invc->total_bayar); ?></b></h1>
				<?php 
					if ($invc->status == 'Menunggu Pembayaran' OR $invc->status == 'Upload ulang pembayaran') {
						# code...
						?>
						<a href="#" class="btn btn-lg btn-success col-md-12"  data-toggle="modal" data-target="#bayar" onclick="bayar('<?php echo $invc->id_invoice ?>')"> <i class="fa fa-upload"></i> Upload Bukti Bayar</a>
						<?php
					}elseif($invc->status == 'Konfirmasi Pembayaran'){
						?>
						<a href="#" class="btn btn-lg btn-success col-md-12" disable><i class="fa fa-user"></i> Menunggu Konfirmasi..</a>
						<?php
					}elseif($invc->status == 'Pesanan Dikirim'){

						?>
						<a href="#" class="btn btn-lg btn-success col-md-12"  data-toggle="modal" data-target="#feedback" onclick="feedback('<?php echo $invc->id_invoice ?>')"> Sudah diterima ?</a>
						<?php
					}else{
						?>
						<a href="#" class="btn btn-lg btn-success col-md-12" disable><?php echo $invc->status; ?> <i class="fa fa-check"></i></a>
						<?php
					}
				 ?>
			</div>
		</div>
		<hr>
			<?php

		}
				 ?>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="bayar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-credit-card"></i> Bukti Pembayaran</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="<?php echo base_url(); ?>upload-bayar" enctype='multipart/form-data'>
      <div class="modal-body">
      	<input type="text" name="id_invoice" class="form-control" style="display: none;" id="invoice">
      	<input type="file" name="img" class="form-control">
      </div>
      <div class="modal-footer">      	
        <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Kirim</button>
      </div>
		</form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="feedback" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-dropbox"></i> Pastikan barang sudah anda terima</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="<?php echo base_url(); ?>selesai">
      <div class="modal-body">
      	<div class="layer1">
			<span><i class="fa fa-star star" id="star1"></i>
				<input type="radio" name="rate" value="1" class="radio-rate" onclick="rating(this.value)">
			</span>
			<span><i class="fa fa-star star" id="star2"></i>
				<input type="radio" name="rate" value="2" class="radio-rate" onclick="rating(this.value)">
			</span>
			<span><i class="fa fa-star star" id="star3"></i>
				<input type="radio" name="rate" value="3" class="radio-rate" onclick="rating(this.value)">
			</span>
			<span><i class="fa fa-star star" id="star4"></i>
				<input type="radio" name="rate" value="4" class="radio-rate" onclick="rating(this.value)">
			</span>
			<span><i class="fa fa-star star" id="star5"></i>
				<input type="radio" name="rate" value="5" class="radio-rate" onclick="rating(this.value)">
			</span>
			<p id="rate"></p>
		</div>
      	<input type="text" name="id_invoice" class="form-control" style="display: none;" id="invoice2">
      	<textarea class="form-control" placeholder="Berikan ulasan" name="feedback"></textarea>
      </div>
      <div class="modal-footer">      	
        <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Selesai</button>
      </div>
		</form>
    </div>
  </div>
</div>

<script type="text/javascript">
	function bayar(a){
		document.getElementById('invoice').value = a;
	}
	function feedback(a){
		document.getElementById('invoice2').value = a;
	}
</script>

<script type="text/javascript">
	function rating(a) {
		if (a == 1) {
			document.getElementById('star1').style.color = '#ffa500'; 	//kuning
			document.getElementById('star2').style.color = '#ccc';		//abu-abu
			document.getElementById('star3').style.color = '#ccc';		//abu-abu
			document.getElementById('star4').style.color = '#ccc';		//abu-abu
			document.getElementById('star5').style.color = '#ccc';		//abu-abu
			document.getElementById('rate').innerHTML = 'Buruk!';
		}else if (a == 2) {
			document.getElementById('star1').style.color = '#ffa500'; 	//kuning
			document.getElementById('star2').style.color = '#ffa500'; 	//kuning
			document.getElementById('star3').style.color = '#ccc';		//abu-abu
			document.getElementById('star4').style.color = '#ccc';		//abu-abu
			document.getElementById('star5').style.color = '#ccc';		//abu-abu
			document.getElementById('rate').innerHTML = 'Kurang!';
		}else if (a == 3) {
			document.getElementById('star1').style.color = '#ffa500'; 	//kuning
			document.getElementById('star2').style.color = '#ffa500'; 	//kuning
			document.getElementById('star3').style.color = '#ffa500'; 	//kuning
			document.getElementById('star4').style.color = '#ccc';		//abu-abu
			document.getElementById('star5').style.color = '#ccc';		//abu-abu
			document.getElementById('rate').innerHTML = 'Cukup!';
		}else if (a == 4) {
			document.getElementById('star1').style.color = '#ffa500'; 	//kuning
			document.getElementById('star2').style.color = '#ffa500'; 	//kuning
			document.getElementById('star3').style.color = '#ffa500'; 	//kuning
			document.getElementById('star4').style.color = '#ffa500'; 	//kuning
			document.getElementById('star5').style.color = '#ccc';		//abu-abu
			document.getElementById('rate').innerHTML = 'Puas!';
		}else if (a == 5) {
			document.getElementById('star1').style.color = '#ffa500'; 	//kuning
			document.getElementById('star2').style.color = '#ffa500'; 	//kuning
			document.getElementById('star3').style.color = '#ffa500'; 	//kuning
			document.getElementById('star4').style.color = '#ffa500'; 	//kuning
			document.getElementById('star5').style.color = '#ffa500'; 	//kuning
			document.getElementById('rate').innerHTML = 'Sangat Puas!';
		}
	}//example.css
</script>