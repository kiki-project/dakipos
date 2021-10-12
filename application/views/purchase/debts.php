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
                      <?php 
                        if ($rm['edit'] != 'None' OR $rm['delete'] != 'None') {
                          ?>
                          <th style="width: 150px;text-align: center;">Action</th>
                          <?php
                        }
                       ?>
                      <th style="width:100px;">No Transaksi</th>
                      <th style="width:100px;">Kode Item</th>
                      <th>Nama Item</th>
                      <th style="width: 50px;text-align:center;">Jenis Item</th>
                      <th style="width: 50px;text-align:center;">Status</th>
                      <th style="width: 50px;text-align:center;">Jml</th>
                      <th style="width: 50px;text-align:center;">Jml diterima</th>
                      <th style="width: 100px;text-align:center;">satuan</th>
                      <th style="width: 100px;text-align:center;">Harga</th>
                      <th style="width: 200px;text-align:center;">Pot(%)</th>
                      <th style="width: 200px;text-align:center;">Biaya Lain</th>
                      <th style="width: 200px;text-align:center;">Total</th>
                      <th style="width: 200px;text-align:center;">Total Akhir</th>
                      <th style="width: 200px;text-align:center;">Tax(%)</th>
                      <th style="width: 200px;text-align:center;">Kredit</th>
                      <th style="width: 200px;text-align:center;">Diperbarui</th>
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
                    <?php 
                      if ($rm['edit'] != 'None' OR $rm['delete'] != 'None') {
                         ?>
                    <td>
                      <?php 
                        if ($rm['edit'] != 'None') {
                          ?>
                          <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create"><i class="fa fa-edit" title="Edit"></i></a>
                          <?php
                        }
                        if ($rm['delete'] != 'None') {
                             
                            ?>
                            <a href="<?php echo base_url(); ?>delete-debts/<?php echo $key->id; ?>" class="btn btn-sm btn-danger" title="hapus data" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
                            <?php
                          
                         } 
                       ?>
                    </td>
                    <?php } ?>
                    <td><?php echo $key->kode; ?></td>
                    <td><?php echo $key->kode_item; ?></td>
                    <td><?php echo $key->item; ?></td>
                    <td style="text-align: center;"><?php echo $key->jenis_item; ?></td>
                    <td <?php if($key->status == 'Pesanan'){ echo "style='text-align: center;color:orange'"; }elseif($key->status == 'Pembelian'){ echo "style='text-align: center;color:green'"; } ?>>
                      <b><?php echo $key->status; ?></b>
                    </td>
                    <td style="text-align: right;"><?php echo $key->sub_total_item; ?></td>
                    <td style="text-align: right;"><?php echo $key->sub_total_terima; ?></td>
                    <td style="text-align: center;"><?php echo $key->satuan; ?></td>
                    <td style="text-align: right;"><?php echo number_format($key->harga,2); ?></td>
                    <td style="text-align: right;"><?php echo $key->potongan; ?></td>
                    <td style="text-align: right;">
                      <?php if ($key->tambah_total == 1) {
                        echo "(+)";
                      } ?>
                      <?php echo number_format($key->biaya_lain,2); ?>
                    </td>
                    <td style="text-align: right;"><?php echo number_format($key->sub_total_harga,2); ?></td>
                    <td style="text-align: right;"><?php echo number_format($key->total_akhir_harga,2); ?></td>
                    <td style="text-align: right;"><?php echo number_format($key->pajak_percent,2); ?></td>
                    <td style="text-align: right;color: red;"><?php echo number_format($key->kredit,2); ?></td>
                    <td style="text-align: center;"><?php echo $key->updated_at; ?></td>
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


  <!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa <?php echo $module['icon']; ?> f-color1"></i> <?php echo $module['name']; ?></h5>
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