<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<br>
		<h4><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h4>
		<hr>
		<table class="table table-bordered table-striped">
			
		<?php 
			$brg = 0;
			$hrg = 0;
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
				<td style="width: 10px;">
					<a href="<?php echo base_url(); ?>hapus-cart/<?php echo $key->id; ?>" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
			}
		 ?>
		</table>
		<div class="row">
			<div class="col-md-6">&nbsp;</div>
			<div class="col-md-6" style="text-align: right;">
				Total Harga (<?php echo $brg; ?> Barang)
				<h1><b class="f-color2">Rp. <?php echo number_format($hrg); ?></b></h1>
				<a href="#" class="btn btn-lg btn-success col-md-12" data-toggle="modal" data-target="#checkout"><i class="fa fa-check"></i> Check Out</a>
				<!-- <a href="<?php echo base_url(); ?>bayar-sekarang/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-lg btn-success col-md-12">Bayar Sekarang</a> -->
			</div>
		</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="checkout" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-check"></i> Checkout</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="<?php echo base_url(); ?>bayar-sekarang">
      <div class="modal-body">
		  <div class="form-group">
		    <label for="name">Nama Penerima</label>
		    <input type="text" class="form-control" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" style="display: none;">
		    <input type="text" class="form-control" id="name" name="penerima" value="<?php echo $this->session->userdata('name'); ?>" required="">
		    <small id="emailHelp" class="form-text text-muted">Sesuaikan nama penerima</small>
		  </div>
		  <div class="form-group">
		    <label for="nohp">No Handphone</label>
		    <input type="number" class="form-control" id="nohp" name="no_hp" required="">
		  </div>
		  <div class="form-group">
		    <label for="nohp">Wilayah Pengiriman/Ongir</label>
		    <select class="form-control" name="ongkir" required="" onchange="set_ongkir(this.value,'<?php echo $hrg; ?>')">
		    	<option value="">-Pilih data-</option>
		    	<?php 
		    		foreach ($ongkir as $key) {
		    		?>
		    		<option value="<?php echo $key->id; ?>"><?php echo $key->wilayah." (Rp".number_format($key->ongkir).")"; ?></option>
		    		<?php
		    		}
		    	 ?>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="alamat">Alamat Lengkap</label>
		    <textarea id="alamat" class="form-control" name="alamat" required=""></textarea>	
		  </div>
		  <div style="text-align: right;">
			<i style="font-size: 14px">Total Harga (<?php echo $brg; ?> Barang)</i>
			<h5><span class="f-color2">Rp. <?php echo number_format($hrg); ?></span></h5>
			
			<i style="font-size: 14px">Ongkos Kirim</i>
			<h5><span class="f-color2">Rp. <span id="txt-ongkir">0</span></span></h5>
			<b style="font-size: 20px">Total Bayar</b>
			<h1><b class="f-color2">Rp. <span id="txt-bayar"><?php echo number_format($hrg); ?></span></b></h1>
		  </div>
      </div>
      <div class="modal-footer">      	
        <button type="submit" class="btn btn-success">Bayar Sekarang</button>
      </div>
		</form>
    </div>
  </div>
</div>

<script type="text/javascript">
	function set_ongkir(a,b){
		if (a != 0) {
			a = a
		}else{
			a = 0;
		}
		  $.ajax({ 
		        type: 'GET', 
		        url: '<?php echo base_url(); ?>json-ongkir/'+a,
		        success: function (response) { 
		        	data = JSON.parse(response);
		        	if (a != '') {
		        	var ongkir = data['ongkir']
		        	}else{
		        	var ongkir = 0
		        	}
		        	$('#txt-ongkir').html(currency(ongkir).format().replace("$", "").replace(".00", ""))
		        	$('#txt-bayar').html(currency(parseInt(ongkir)+parseInt(b)).format().replace("$", "").replace(".00", ""))
		        }
		    });
	}
</script>