<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa <?php echo $module['icon']; ?> mr-1 f-color1"></i> <?php echo $module['name']; ?></h1>
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
              <?php 
                if ($rm['edit'] != 'None') {
                  ?>
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">
            	   <a href="" class="btn btn-sm bg-color1" data-toggle="modal" onclick="add_user()" data-target="#create" style="color: #fff;"><i class="fa fa-plus"></i> Tambah Data</a>
            </h3>
          </div>
                  <?php
                }
               ?>
          <?php 
            if ($rm['list'] != 'None') {
              ?>
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
              <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="f-color1">
                      <th style="width:10px;">No</th>
                      <th style="width:100px;">Username</th>
                      <th>Nama</th>
                      <th style="width: 200px;text-align:center;">Role</th>
                      <th style="width: 200px;text-align:center;">Tanggal Input</th>
                      <th style="width: 200px;text-align:center;">Tanggal Update</th>
                      <?php 
                        if ($rm['edit'] != 'None' OR $rm['delete'] != 'None') {
                          ?>
                          <th style="width: 150px;text-align: center;">Action</th>
                          <?php
                        }
                       ?>
                    </tr>
                  </thead>
                  <tbody>
                <?php 
                $no = 1;
                foreach ($users as $key) {
                ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $no++; ?></td>
                    <td>
                      <?php 
                        if ($key->id == 1) {
                          ?>
                          <i class="fa fa-lock" style="color: green;"></i>
                          <?php
                        }
                       ?>
                      <?php echo $key->user_name; ?>
                    </td>
                    <td><?php echo $key->name; ?></td>
                    <td style="text-align: center;"><?php echo $key->role_name; ?></td>
                    <td><?php echo $key->created_at; ?></td>
                    <td><?php echo $key->updated_at; ?></td>
                    <?php 
                      if ($rm['edit'] != 'None' OR $rm['delete'] != 'None') {
                         ?>
                    <td>
                      <?php 
                        if ($rm['edit'] != 'None') {
                          ?>
                          <a href="" data-toggle="modal" data-target="#create" class="btn btn-sm btn-primary" onclick="edit_user('<?php echo $key->id; ?>')"><i class="fa fa-edit" title="Edit"></i></a>
                          <a href="" data-toggle="modal" data-target="#create" class="btn btn-sm btn-success" onclick="reset_password('<?php echo $key->id; ?>')"><i class="fa fa-key" title="Reset Password"></i></a>
                          <?php
                        }
                        if ($rm['delete'] != 'None') {
                             
                          if ($key->id != 1) {
                            ?>
                            <a href="<?php echo base_url(); ?>delete-user/<?php echo $key->id; ?>" class="btn btn-sm btn-danger" title="hapus data" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
                            <?php
                          }
                         } 
                       ?>
                    </td>
                    <?php } ?>
                  </tr>
                <?php
                }
                 ?>
                  </tbody>
                </table>
          </div>
              <?php
            }
           ?>
        </div>
      </section>
    </div>
  </div>
</section>

  <!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa <?php echo $module['icon']; ?> f-color1"></i> <span id="us-title-form"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>insert-user">
        <input type="text" name="user_id" id="us-id" class="form-control" style="display: none;">
        <div class="modal-body">
         <div class="form-group" id="us-frm-role_id">
          <label>Role</label>
          <select name="role_id" class="form-control" id="us-role_id" required=""> 
              <option value="">- Pilih role -</option>
          <?php 
            foreach ($role as $key) {
              ?>
              <option value="<?php echo $key->id; ?>"><?php echo $key->name; ?></option>
              <?php
            }
           ?>
          </select>
         </div>

        <div class="form-group has-feedback" id="us-frm-name">
          <label>Nama Lengkap</label>
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-id-card"></i></div>
            </div>
            <input type="text" name="name" id="us-name" class="form-control" required="">
          </div>
        </div>
        <div class="form-group has-feedback" id="us-frm-user_name">
          <label>Username</label>
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input type="text" name="user_name" id="us-user_name" class="form-control" required="" oninput="cek_user(this.value)">
          </div>
            <small id="err_user" class="red" style="color: red;"></small>
        </div>
        <div class="form-group has-feedback" id="us-frm-password">
          <label>Password</label>
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="password" name="password" id="us-password" class="form-control" required="">
          </div>
        </div>
        <div class="form-group has-feedback" id="us-frm-re_password">
          <label>Masukan ulang Password</label>
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="password" name="confirm_password" id="us-re_password" class="form-control" required="" oninput="cek_user_repas(this.value)">
          </div>
            <small id="err_user_repass" class="red" style="color: red;"></small>
        </div>
         <div class="form-group" id="us-frm-report_to">
          <label>Report to</label>
          <select name="report_to" class="form-control" id="us-report_to"> 
              <option value="">- Pilih report to -</option>
          <?php 
            foreach ($users as $key) {
              ?>
              <option value="<?php echo $key->id; ?>"><?php echo $key->name; ?></option>
              <?php
            }
           ?>
          </select>
         </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary bg-color1" id="us-btn-submit" name="submit" style="color: #fff;border: none;">
        </div>
      </form>
    </div>
  </div>
</div>