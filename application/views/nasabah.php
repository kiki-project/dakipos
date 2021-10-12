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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>assets/adminlte3/#">Home</a></li>
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
                  <i class="fa fa-user mr-1"></i>
                  Data Nasabah
                </h3>
              </div>
              <div class="card-body">
              	<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Tambah Data</a>
              	<hr>
              	<table class="table table-bordered table-striped">
              		<thead>
              			<tr>
              				<th style="width:10px;">No</th>
              				<th>No Rekening</th>
              				<th>Nama Nasabah</th>
              				<th>No Telepon</th>
              				<th>Alamat</th>
              				<th style="width: 100px;text-align: center;">Action</th>
              			</tr>
              		</thead>
              		<tbody>
          			<?php 
          			$no = 1;
          			foreach ($nasabah as $key) {
          			?>
          				<tr>
          					<td><?php echo $no++; ?></td>
          					<td><?php echo $key->norek; ?></td>
          					<td><?php echo $key->nama; ?></td>
          					<td><?php echo $key->no_telepon; ?></td>
          					<td><?php echo $key->alamat; ?></td>
          					<td style="text-align: center;">
          						<a href="" class="btn btn-sm btn-primary" onclick="get_nasabah(<?php echo $key->norek; ?>)" data-toggle="modal" data-target="#create"><i class="fa fa-edit"></i></a>
          						<a href="<?php echo base_url(); ?>delete-nasabah/<?php echo $key->norek; ?>" class="btn btn-sm btn-danger" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
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
      <form method="post" action="<?php echo base_url(); ?>update-nasabah">
	      <div class="modal-body">
	       <div class="form-group">
	       	<label>No Rekening</label>
	       	<input type="number" name="norek" class="form-control" id="norek">
	       </div>
	       <div class="form-group">
	       	<label>Nama nasabah</label>
	       	<input type="text" name="nama" class="form-control" id="nama_nasabah">
	       </div>
	       <div class="form-group">
	       	<label>Email</label>
	       	<input type="email" name="email" class="form-control" id="email">
	       </div>
	       <div class="form-group">
	       	<label>No Telepon</label>
	       	<input type="number" name="no_telepon" class="form-control" id="no_telepon">
	       </div>
		     <div class="form-group">
		      <label>Cabang</label>
		      <select class="form-control" name="id_cabang" id="cabang" required="">
		        <option value="">-Pilih Cabang-</option>
		        <?php 
		          foreach ($cabang as $key) {
		            ?>
		          <option value="<?php echo $key->id; ?>"><?php echo $key->cabang; ?></option>
		            <?php
		          }
		         ?>
		      </select>
		     </div>
	       <div class="form-group">
	       	<label>Alamat</label>
	       	<textarea class="form-control" rows="5" name="alamat" id="alamat_nasabah"></textarea>
	       </div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" id="btn-submit">Simpan</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	function get_nasabah(a){
		$.ajax({
          url : "<?php echo base_url(); ?>json/get-nasabah/"+a,
          type : "GET",
          dataType : "JSON",
          success: function(result){
            $('#title-form').html('Edit Data');
            document.getElementById('norek').value = result['norek']; 
            document.getElementById('nama_nasabah').value = result['nama']; 
            document.getElementById('email').value = result['email']; 
            document.getElementById('no_telepon').value = result['no_telepon']; 
            document.getElementById('cabang').value = result['id_cabang']; 
            document.getElementById('alamat_nasabah').value = result['alamat']; 
            document.getElementById('btn-submit').value = 'Update';
            // $('#img_icon').html('<img src="<?php echo base_url(); ?>assets/main/image/icon/'+result['img']+'" style="width:100px;">'); 
          },
          error :function(e){
            console.log('eror' +e);
          }
        });
	}
</script>