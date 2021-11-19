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
          <div class="card-header d-flex p-0" id="div-head">
            <h3 class="card-title p-3">
            	  <a href="<?php echo base_url(); ?>edit-item/new" class="btn btn-sm bg-color1" style="color: #fff;"><i class="fa fa-plus"></i> Tambah Data</a>
                <button onclick="bulk_action('del')" class="btn btn-danger" title="Hapus data"><i class="fa fa-copy"></i>&nbsp;<i class="fa fa-trash"></i>&nbsp;Hapus</button>
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
          <form method="post" action="<?php echo base_url(); ?>bulk-Action-items">
              <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="f-color1">
                      <th style="width:10px;">No</th>
                      <th style="width:10px;"><input type="checkbox" name="cb_1page" id="cb_1page" onclick="toggle_check(this)" title="select all this page"></th>
                      <th style="width:100px;">Kode Item</th>
                      <th style="width: 200px;text-align:center;">Barcode</th>
                      <th>Nama Item</th>
                      <th style="width: 50px;text-align:center;">Rak</th>
                      <th style="width: 50px;text-align:center;">Tipe</th>
                      <th style="width: 50px;text-align:center;">Jenis</th>
                      <th style="width: 50px;text-align:center;">Satuan</th>
                      <th style="width: 100px;text-align:center;">Merek</th>
                      <th style="width: 100px;text-align:center;">Status jual</th>
                      <th style="width: 200px;text-align:right;">Harga pokok</th>
                      <th style="width: 200px;text-align:right;">Harga jual</th>
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
                foreach ($data as $key) {
                ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $no++; ?></td>
                    <td><input type="checkbox" id="cb_id" name="cb_id[]" value="<?php echo $key->id; ?>"></td>
                    <td>
                      <?php 
                        if ($key->status == 'new') {
                          echo "<i class='fa fa-warning' style='color:red;'></i>";
                        }
                       ?>
                      <?php echo $key->kode; ?>
                    </td>
                    <td style="text-align: center;"><?php echo $key->barcode; ?></td>
                    <td><?php echo $key->name; ?></td>
                    <td style="text-align: center;"><?php echo $key->rak; ?></td>
                    <td style="text-align: center;"><?php echo $key->type; ?></td>
                    <td style="text-align: center;"><?php echo $key->jenis; ?></td>
                    <td style="text-align: center;"><?php echo $key->satuan_dasar; ?></td>
                    <td style="text-align: center;"><?php echo $key->merek; ?></td>
                    <td style="text-align: center;"><?php echo $key->status_jual; ?></td>
                    <td style="text-align: right;"><?php echo 'IDR '.number_format($key->harga_pokok, 2); ?></td>
                    <td style="text-align: right;"><?php echo 'IDR '.number_format($key->harga_jual, 2); ?></td>
                    <?php 
                      if ($rm['edit'] != 'None' OR $rm['delete'] != 'None') {
                         ?>
                    <td>
                      <?php 
                        if ($rm['edit'] != 'None') {
                          ?>
                          <a href="<?php echo base_url(); ?>edit-item/<?php echo $key->kode; ?>" class="btn btn-sm btn-primary" onclick="edit_user('<?php echo $key->id; ?>')"><i class="fa fa-edit" title="Edit"></i></a>
                          <?php
                        }
                        if ($rm['delete'] != 'None') {
                             
                            ?>
                            <a href="<?php echo base_url(); ?>delete-item/<?php echo $key->id; ?>" class="btn btn-sm btn-danger" title="hapus data" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
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
              </form>
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

<script>

    function toggle_check(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }

  function bulk_action(a){

     var selected = [];
    $('#cb_id:checked').each(function() {
        selected.push($(this).val());
    });
     id = selected
     long = id.length
     if (long != 0) {

          if (a == 'del') {
       for (var i = 0; i < long; i++) {
         console.log('a')
            $.ajax({
              url : "<?php echo base_url(); ?>json/delete-item/"+id[i],
              type : "GET",
              dataType : "JSON",
              success: function(result){
                var yourval = jQuery.parseJSON(JSON.stringify(result));
                window.location.href='<?php echo base_url().$module['path']; ?>'
              },
              error :function(e){
                window.location.href='<?php echo base_url().$module['path']; ?>'
              }
            });
       }
          }
     }else{
      alert('No item selected !')
     }
  }
</script>