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
              <li class="breadcrumb-item f-color1"><a href="<?php echo base_url(); ?>#" >Barang</a></li>
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
                  <i class="fa fa-dropbox mr-1 f-color1"></i>
                  Data Barang
                </h3>
              </div>
              <div class="card-body">
              	<a href="" class="btn btn-sm bg-color1" data-toggle="modal" data-target="#create" style="color: #fff;"><i class="fa fa-plus"></i> Tambah Data</a>
              	<hr>
              	<table class="table table-bordered table-striped">
              		<thead>
              			<tr class="f-color1">
              				<th style="width:10px;">No</th>
                      <th style="width:50px;text-align: center;">IMG</th>
              				<th>Nama Barang</th>
                      <th style="width: 110px;text-align: right;">Harga</th>
                      <th style="width: 50px;">Stok</th>
                      <th style="width: 50px;">Terjual</th>
              				<th style="width: 200px;">Tanggal Input</th>
              				<th style="width: 150px;text-align: center;">Action</th>
              			</tr>
              		</thead>
              		<tbody>
          			<?php 
          			$no = 1;
          			foreach ($doc as $key) {
          			?>
          				<tr>
          					<td><?php echo $no++; ?></td>
                    <td>
                      <?php 
                        if (!empty($key->cv_img)) {
                          ?>
                          <div style="height: 50px;width: 70px;background-image: url(<?php echo base_url(); ?>assets/doc/<?php echo $key->cv_img; ?>);background-size: cover;background-size: 120%;background-position: center;background-repeat: no-repeat;"></div>
                          <?php
                        }else{
                          ?>
                          <div style="width: 70px;height: 50px;background-color: #ccc;color:#aaa;text-align: center;padding: 10px;">none</div>
                          <?php
                        }
                       ?>
                    </td>
                    <td>
                      <?php echo $key->nama; ?><br>
                      <span style="color: #777;font-size: 12px;"><?php echo "ID: ".$key->id; ?></span>
                    </td>
                    <td style="text-align: right;"><span style="font-weight: bold;"><?php echo "Rp.".number_format($key->harga); ?></span></td>
                    <td style="text-align: center;"><?php echo number_format($key->stok); ?></td>
                    <td style="text-align: center;"><?php echo number_format($key->terjual); ?></td>
          					<td><?php echo $key->date_create; ?></td>
          					<td style="text-align: center;">
          						<a href="<?php echo base_url(); ?>edit-produk/<?php echo $key->id_related ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
          						<a href="<?php echo base_url(); ?>delete-barang/<?php echo $key->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-form">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>simpan-barang"  enctype='multipart/form-data'>
	      <div class="modal-body">
	       <div class="form-group">
	       	<label>Nama Barang</label>
	       	<input type="text" name="nama" class="form-control">
	       </div>
         <div class="form-group">
          <label>Harga Barang</label>
          <input type="number" name="harga" class="form-control">
         </div>
         <div class="form-group">
          <label>Jenis</label>
          <input type="text" name="jenis" class="form-control">
         </div>
         <div class="form-group">
          <label>Brand/Merek</label>
          <input type="text" name="merek" class="form-control">
         </div>
	       <div class="form-group">
	       	<label>Deskripsi</label>
	       	<textarea class="form-control" rows="5" name="desc" id="desc"></textarea>
	       </div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary bg-color1" id="btn-submit" name="submit" value="Simpan" style="color: #fff;border: none;">
	      </div>
      </form>
    </div>
  </div>
</div>
