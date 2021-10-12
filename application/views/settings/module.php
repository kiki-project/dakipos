<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-book mr-1 f-color1"></i> <?php echo $title; ?></h1>
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
            </h3>
          </div>
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
              <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="f-color1">
                      <th style="width:10px;text-align: center;">Icon</th>
                      <th style="width: 200px;">Label</th>
                      <th style="width: 100px;text-align:center;">Type</th>
                      <th >Path</th>
                      <th style="width: 200px;text-align:center;">Parent Module</th>
                      <th style="width: 50px;text-align:center;">Code</th>
                      <th style="width: 50px;text-align:center;">Num Length</th>
                      <th style="width: 150px;text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php 
                $no = 1;
                foreach ($module as $key) {
                ?>
                  <tr>
                    <td style="text-align: center;"><i class="fa <?php echo $key->icon; ?>"></i></td>
                    <td style="text-align: left;"><?php echo $key->name; ?></td>
                    <td style="text-align: center;"><?php echo $key->type; ?></td>
                    <td style="text-align: left;"><a href="<?php echo base_url().$key->path; ?>" target="_blank"><?php echo base_url().$key->path; ?></a></td>
                    <td style="text-align: center;"><?php echo $key->parent_name; ?></td>
                    <td style="text-align: center;"><?php echo $key->code; ?></td>
                    <td style="text-align: center;"><?php echo $key->code_length; ?></td>
                    <td style="text-align: center;">
                      
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

  <!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-form"><i class="fa fa-plus"></i> Tambah Data</h5>
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
          <label>Role</label>
          <select name="role_id" class="form-control"> 
          <?php 
            foreach ($role as $key) {
              ?>
              <option><?php echo $key->name; ?></option>
              <?php
            }
           ?>
          </select>
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
