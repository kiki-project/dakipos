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
              <b class="f-color1"><i class="fa fa-sitemap"></i> <?php echo $role['name']; ?></b>
            </h3>
          </div>
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
              <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="f-color1">
                      <th style="width:10px;text-align: center;">Icon</th>
                      <th>Label</th>
                      <th style="width: 200px;text-align:center;">Parent Module</th>
                      <th style="width: 100px;text-align:center;">Access</th>
                      <th style="width: 100px;text-align:center;">List view</th>
                      <th style="width: 100px;text-align:center;">Edit</th>
                      <th style="width: 100px;text-align:center;">Delete</th>
                      <th style="width: 150px;text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php 
                $no = 1;
                foreach ($modules as $key) {

                  $rm = $this->Mod_adm->get_role_module_rel($role['id'],$key->id)->row_array();
                ?>
                  <tr>
                    <td style="text-align: center;"><i class="fa <?php echo $key->icon; ?>"></i></td>
                    <td style="text-align: left;"><?php echo $key->name; ?></td>
                    <td style="text-align: center;"><?php echo $key->parent_name; ?></td>
                    <td style="text-align: center;"><?php echo $rm['access']; ?></td>
                    <td style="text-align: center;"><?php echo $rm['list']; ?></td>
                    <td style="text-align: center;"><?php echo $rm['edit']; ?></td>
                    <td style="text-align: center;"><?php echo $rm['delete']; ?></td>
                    <td style="text-align: center;">
                      <a href="" class="btn btn-sm bg-color1" data-toggle="modal" onclick="edit_role_module('<?php echo $key->id ?>','<?php echo $role['id'] ?>')" data-target="#create" style="color: #fff;"><i class="fa fa-edit"></i></a>
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
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-sitemap f-color1"></i> <?php echo $role['name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>insert-role_module/<?php echo $role['id'] ?>">
        <div class="modal-body">
          <input type="text" name="module_id" id="rm-module_id" style="display: none;">
          <input type="text" name="role_id" id="rm-role_id" style="display: none;">
          <div class="form-group has-feedback" id="rm-frm-access">
            <label>Access</label>
            <div class="input-group ">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
              </div>
              <select class="form-control" name="access" id="rm-access">
                <option value="None">None</option>
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
              </select>
            </div>
          </div>
          <div class="form-group has-feedback" id="rm-frm-list">
            <label>List View</label>
            <div class="input-group ">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-list"></i></div>
              </div>
              <select class="form-control" name="list" id="rm-list">
                <option value="None">None</option>
                <option value="All">All</option>
                <option value="Group">Group</option>
                <option value="Owner">Owner</option>
              </select>
            </div>
          </div>
          <div class="form-group has-feedback" id="rm-frm-edit">
            <label>Edit</label>
            <div class="input-group ">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-edit"></i></div>
              </div>
              <select class="form-control" name="edit" id="rm-edit">
                <option value="None">None</option>
                <option value="All">All</option>
                <option value="Group">Group</option>
                <option value="Owner">Owner</option>
              </select>
            </div>
          </div>
          <div class="form-group has-feedback" id="rm-frm-delete">
            <label>Delete</label>
            <div class="input-group ">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-trash"></i></div>
              </div>
              <select class="form-control" name="delete" id="rm-delete">
                <option value="None">None</option>
                <option value="All">All</option>
                <option value="Group">Group</option>
                <option value="Owner">Owner</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary bg-color1" id="rm-btn-submit" name="submit" value="Simpan" style="color: #fff;border: none;">
        </div>
      </form>
    </div>
  </div>
</div>
