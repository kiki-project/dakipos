<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-sitemap mr-1 f-color1"></i> <?php echo $title; ?></h1>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  <?php echo $this->session->flashdata('msg'); ?>
    <div class="row">
      <section class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">
              <a href="" class="btn btn-sm bg-color1" data-toggle="modal" onclick="edit_role('none')" data-target="#create" style="color: #fff;"><i class="fa fa-plus"></i> Tambah Data</a>
            </h3>
          </div>
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
              <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="f-color1">
                      <th style="width: 200px;">Roles</th>
                      <th>Deskripsi</th>
                      <th style="width: 150px;text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php 
                $no = 1;
                foreach ($roles as $key) {
                ?>
                  <tr>
                    <td style="text-align: left;"><a href="<?php echo base_url(); ?>role-module/<?php echo $key->id; ?>" class="f-color1"><b><i class="fa fa-sitemap"></i> <?php echo $key->name; ?></b></a></td>
                    <td><?php echo $key->description; ?></td>
                    <td style="text-align: center;">
                      <a href="" class="btn btn-sm bg-color1" data-toggle="modal" onclick="edit_role('<?php echo $key->id ?>')" data-target="#create" style="color: #fff;"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo base_url(); ?>delete-role/<?php echo $key->id; ?>" class="btn btn-sm btn-danger" title="hapus data" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
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
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-sitemap f-color1"></i> <span id="role-title-form"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>insert-role"  enctype='multipart/form-data'>
        <div class="modal-body">
        <input type="text" name="role_id" id="role-id" class="form-control" style="display: none;">
        <div class="form-group has-feedback" id="us-frm-name">
          <label>Nama Role</label>
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-sitemap"></i></div>
            </div>
            <input type="text" name="name" id="role-name" class="form-control" required="">
          </div>
        </div>
         <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="form-control" rows="5" name="desc" id="role-desc"></textarea>
         </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary bg-color1" id="role-btn-submit" name="submit" value="Simpan" style="color: #fff;border: none;">
        </div>
      </form>
    </div>
  </div>
</div>
