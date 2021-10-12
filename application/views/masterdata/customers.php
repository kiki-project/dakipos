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
            	   <a href="<?php echo base_url(); ?>edit-customers/new" class="btn btn-sm bg-color1" style="color: #fff;"><i class="fa fa-plus"></i> Tambah Data</a>
            </h3>
          </div>
                  <?php
                }
               ?>
          <?php 
            if ($rm['list'] != 'None') {
              ?>
          <div class="card-body">
            <div class="row">
            <div class="col-md-6">
              <form method="post" action="<?php echo base_url().'set-rows/'.$module['path']; ?>">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="btn btn-default">Set</div>
                  </div>
                  <select name="row" class="" onchange="this.form.submit()" style="width: 50px !important;outline: none;border: 1px #aaa;background-color: #ccc;">
                    <?php 
                      foreach ($pg['page_rows'] as $key) {
                      ?>
                    <option value="<?php echo $key->row ?>" <?php if($pg['row'] == $key->row){ echo "selected='true'"; } ?> ><?php echo $key->row ?></option>
                      <?php
                      }
                     ?>
                  </select>
                  <div class="input-group-append">
                    <div class="btn btn-default"><?php echo "Total: ".$total['row']; ?></div>
                  </div>
                </div><br>
              </form>
            </div>
            <div class="col-md-6">
              <form method="post" action="<?php echo base_url().$module['path']; ?>">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="src" class="form-control" placeholder="Search here..." value="<?php echo $src; ?>">
                        <div class="input-group-append">
                          <button type="submit" name="submit" value="search" class="btn btn-info pull-right"><i class="fa fa-search"></i>&nbsp;Search</button>
                        </div>
                      </div>
                    </div>
              </form>
            </div>
            </div>
          </div>
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
            
              <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="f-color1">
                      <th style="width:10px;">No</th>
                      <th style="width:100px;">Kode Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>alamat</th>
                      <th style="width: 50px;text-align:center;">Telepon</th>
                      <th style="width: 50px;text-align:center;">Email</th>
                      <th style="width: 50px;text-align:center;">Kontak</th>
                      <th style="width: 100px;text-align:center;">kota</th>
                      <th style="width: 100px;text-align:center;">Wilayah</th>
                      <th style="width: 200px;text-align:center;">Sub Wilayah</th>
                      <th style="width: 200px;text-align:center;">Diperbarui</th>
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
                $seg = $this->uri->segment(2);
                if (!empty($seg)) {
                  $no = $seg + 1;
                }else{
                  $no = 1;

                }
                foreach ($data as $key) {
                ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $no++; ?></td>
                    <td>
                      <?php echo $key->kode; ?>
                    </td>
                    <td><?php echo $key->name; ?></td>
                    <td style="text-align: center;"><?php echo $key->alamat; ?></td>
                    <td style="text-align: center;"><?php echo $key->telepon; ?></td>
                    <td style="text-align: center;"><?php echo $key->email; ?></td>
                    <td style="text-align: center;"><?php echo $key->kontak; ?></td>
                    <td style="text-align: center;"><?php echo $key->kota; ?></td>
                    <td style="text-align: center;"><?php echo $key->wilayah; ?></td>
                    <td style="text-align: center;"><?php echo $key->sub_wilayah; ?></td>
                    <td style="text-align: center;"><?php echo $key->updated_at; ?></td>
                    <?php 
                      if ($rm['edit'] != 'None' OR $rm['delete'] != 'None') {
                         ?>
                    <td>
                      <?php 
                        if ($rm['edit'] != 'None') {
                          ?>
                          <a href="<?php echo base_url(); ?>edit-customers/<?php echo $key->kode; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Edit"></i></a>
                          <?php
                        }
                        if ($rm['delete'] != 'None') {
                             
                            ?>
                            <a href="<?php echo base_url(); ?>delete-customers/<?php echo $key->id; ?>" class="btn btn-sm btn-danger" title="hapus data" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
                            <?php
                          
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
          <div class="card-footer" style="text-align: right;">
            <?php echo $pg['pg_link']; ?>
          </div>
              <?php
            }
           ?>
        </div>
      </section>
    </div>
  </div>
</section>