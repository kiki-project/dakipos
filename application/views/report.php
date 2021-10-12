  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item f-color1"><a href="<?php echo base_url(); ?>#" >Transaksi</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-credit-card mr-1 f-color1"></i>
                  Data Transaksi
                </h3>
              </div>
              <div class="card-body">
      <!--           <div style="text-align: right;">
                  <span>Total Uang Masuk : </span>
                  <h2><b class="f-color2"><?php echo "Rp. ".number_format($trx['tot_harga']).',-'; ?></b></h2>
                  <span>Total Barang Terjual : </span>
                  <h2><b class="f-color2"><?php echo number_format($trx['tot_qty']); ?></b></h2>
                </div> -->
              	<!-- <hr> -->
              	<table class="table table-bordered table-striped">
              		<thead>
              			<tr class="f-color1">
                      <th style="width:130px;text-align: center;">No Invoice</th>
              				<th style="width: 180px;">Tanggal Transaksi</th>
                      <th>Nama Penerima</th>
                      <th style="width: 100px;">No HP</th>
                      <th>Alamat</th>
                      <th style="width: 120px;text-align: center;">Status</th>
                      <th style="width: 50px;">Qty</th>
                      <th style="width: 110px;text-align: right;">Total Harga</th>
                      <th style="width: 110px;text-align: right;">Ongkir</th>
                      <th style="width: 110px;text-align: right;">Total Bayar</th>
                      <th style="width: 200px;text-align: center;">Action</th>
              			</tr>
              		</thead>
              		<tbody>
                    <?php 
                    foreach ($inv as $key) {
                      ?>
                      <tr>
                        <td style="text-align: center; ">
                          <?php echo $key->id_invoice; ?><br>
                          <?php 
                            for ($i=0; $i <  $key->rate; $i++) { 
                              ?>
                                <i class="fa fa-star f-color2"></i>
                              <?php
                            }
                           ?>
                              
                        </td>
                        <td><?php echo $key->trx_date; ?></td>
                        <td><?php echo $key->penerima; ?></td>
                        <td><?php echo $key->no_hp; ?></td>
                        <td><?php echo $key->alamat; ?></td>
                        <td style="text-align: center; "><b class="f-color2"><?php echo $key->status; ?></b></td>
                        <td style="text-align: center; "><?php echo $key->qty; ?></td>
                        <td style="text-align: right; "><b><?php echo "Rp. ".number_format($key->tot_harga); ?></b></td>
                        <td style="text-align: right; "><b><?php echo "Rp. ".number_format($key->ongkir); ?></b></td>
                        <td style="text-align: right; "><b><?php echo "Rp. ".number_format($key->total_bayar); ?></b></td>
                        <td style="text-align: center;">
                          <a href="<?php echo base_url() ?>cetak/<?php echo $key->id_invoice ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#status" onclick="bayar('<?php echo $key->id_invoice ?>','<?php echo $key->bukti_bayar; ?>')"><i class="fa fa-edit"></i> Update</a>
                          <a href="<?php echo base_url() ?>detail-trx/<?php echo $key->id_invoice ?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Detail</a>
                        </td>
                      </tr>
                      <?php
                    }
                     ?>
              		</tbody>
              	</table>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal -->
<div class="modal fade" id="status" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-shopping-cart"></i> Update Status</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="<?php echo base_url(); ?>update-status-trx" enctype='multipart/form-data'>
      <div class="modal-body">
        <label>ID Invoice</label>
        <input type="text" name="id_invoice" class="form-control" readonly="" id="invoice">
        <label>Status</label>
        <select class="form-control" name="status" id="txtstatus">
          <option value="Upload ulang pembayaran">Konfirmasi Pembayaran</option>
          <option value="Upload ulang pembayaran">Upload ulang pembayaran</option>
          <option value="Pesanan Diproses">Pesanan Diproses</option>
          <option value="Pesanan Dikirim">Pesanan Dikirim</option>
          <option value="Transaksi Selesai">Transaksi Selesai</option>
        </select>
        <label>No Resi</label>
        <input type="text" name="no_resi" class="form-control" id="no_resi">
        <label>Bukti Pembayaran</label>
        <div id="bukti-bayar"></div>
      </div>
      <div class="modal-footer">        
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  function bayar(a,b){

      $.ajax({ 
            type: 'GET', 
            url: '<?php echo base_url(); ?>json-trx/'+a,
            success: function (response) { 
              data = JSON.parse(response);
                document.getElementById('txtstatus').value = data['status'];
                document.getElementById('no_resi').value = data['no_resi'];
            }
        });

    document.getElementById('invoice').value = a;
    if (b != '') {
      var img = '<img src="<?php echo base_url(); ?>assets/doc/'+b+'" style="width:100%;">'
    }else{
      var img = '<small>Belum upload bukti pembayaran</small>'
    }
    $('#bukti-bayar').html(img);
  }
</script>