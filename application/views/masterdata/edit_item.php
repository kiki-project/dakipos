<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa <?php echo $module['icon']; ?> mr-1 f-color1"></i> <?php echo $module['name']; ?> / <?php echo $action; ?></h1>
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
          <form method="post" action="<?php echo base_url(); ?>insert-item" id="frm-item">
          <div class="card-body" style="overflow:auto;white-space: nowrap;">  
            <div class="row">   
              <div class="col-md-12"> 
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active"  data-toggle="tab" href="#data-umum">Data Umum</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#satuan-harga">Satuan & Harga</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#gambar">Gambar</a>
                    </li>
                  </ul>
                <br>
                </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane active" id="data-umum">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Type :</label><br>
                      <input type="radio" name="type" id="item-inv" value="INV" <?php if($item['type'] == 'INV'){ echo "checked"; } ?> > <label for="item-inv">Barang (INV)</label>&nbsp;&nbsp;
                      <input type="radio" name="type" id="item-srv" value="SRV" <?php if($item['type'] == 'SRV'){ echo "checked"; } ?> > <label for="item-srv">Jasa (SRV)</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="item-frm-kode">
                      <label>Kode Item :</label>
                      <div class="input-group ">
                        <input type="text" name="id" id="item-id" class="form-control none" required="" value="<?php echo $item['id']; ?>">
                        <input type="text" name="kode_default" id="item-kode_default" class="form-control none" required="" value="<?php echo $item['kode']; ?>">
                        <input type="text" name="kode" id="item-kode" class="form-control" required="" oninput="set_custom_code(this.value)" value="<?php echo $item['kode']; ?>">
                        <input type="text" name="custom_code" id="item-custom_code" class="form-control none" required="" value="<?php echo $item['custom_code']; ?>">
                      </div>
                      <small class="form-text" style="color: red;" id="err_kode"></small>
                    </div>
                          
                    <div class="form-group" id="item-frm-name">
                      <label>Nama Item :</label>
                      <div class="input-group ">
                        <input type="text" name="name" id="item-name" class="form-control" required="" value="<?php echo $item['name']; ?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6" id="item-frm-jenis">
                        <label>Jenis :</label>
                        <div class="input-group ">
                          <select class="form-control" name="jenis" id="item-jenis">
                                <option value=""></option>
                            <?php

                              foreach ($item_types as $key) {
                                ?>
                                <option value="<?php echo $key->kode; ?>" <?php if($item['jenis'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                          <div class="input-group-append">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-jenis" onclick="frm_jenis_item()"><i class="fa fa-plus"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-6" id="item-frm-merek">
                        <label>Merek :</label>
                        <div class="input-group ">
                          <select class="form-control" name="merek" id="item-brand">
                            
                                <option value=""></option>
                            <?php

                              foreach ($item_brands as $key) {
                                ?>
                                <option value="<?php echo $key->kode; ?>" <?php if($item['merek'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                          <div class="input-group-append">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-brand" onclick="frm_brands_item()"><i class="fa fa-plus"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6" id="item-frm-rak">
                        <label>Rak :</label>
                        <div class="input-group ">
                          <input type="text" name="rak" id="item-rak" class="form-control" value="<?php echo $item['rak']; ?>">
                        </div>
                      </div>
                      <div class="form-group col-md-6" id="item-frm-name">
                        <label>HPP System :</label>
                        <div class="input-group ">
                          <select class="form-control" name="hpp" id="item-hpp">
                            <option value="FIFO" <?php if($item['hpp'] == 'FIFO'){ echo "selected='true'"; } ?> >FIFO</option>
                            <option value="LIFO" <?php if($item['hpp'] == 'LIFO'){ echo "selected='true'"; } ?>>LIFO</option>
                          </select>
                        </div>
                      </div>
                    </div>      
                    <div class="form-row">
                      <div class="form-group col-md-6" id="item-frm-pajak">
                        <label>Pajak Include (%):</label>
                        <div class="input-group ">
                          <input type="text" name="pajak" class="form-control" id="item-pajak" oninput="set_currency_value('item-pajak', this.value)" style="text-align: right;" value="<?php echo number_format($item['pajak'], 2); ?>">
                          <div class="input-group-append">
                            <div class="btn btn-danger" onclick="input_clear_currency('item-pajak')"><i class="fa fa-trash"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6" id="item-frm-rak">
                        <label>Status Jual :</label>
                        <div>
                          <input type="radio" name="status_jual" id="item-dijual" value="Masih dijual" <?php if($item['status_jual'] == 'Masih dijual'){ echo "checked"; } ?>>
                          <label for="item-dijual">Masih dijual</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6" id="item-frm-name">
                        <label>&nbsp;</label>
                        <div>
                          <input type="radio" name="status_jual" id="item-discontinue" value="Tidak dijual / discontinue" <?php if($item['status_jual'] == 'Tidak dijual / discontinue'){ echo "checked"; } ?> >
                          <label for="item-discontinue">Tidak dijual / discontinue</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6" id="item-frm-serial">
                        <label>Pilihan :</label>
                        <div>
                          <input type="checkbox" name="serial" id="item-serial" value="Yes" <?php if($item['serial'] == 'Yes'){ echo "checked"; } ?> >
                          <label for="item-serial">Serial</label>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                  <div class="col-md-6">

                <div class="form-row">
                 <div class="form-group col-md-6">
                    <label>Stok Minimum :</label>
                    <div class="input-group ">
                      <input type="text" name="stok_minimum" class="form-control" id="item-stok-minimum" oninput="set_currency_value('item-stok-minimum', this.value)" style="text-align: right;" value="<?php echo number_format($item['stok_minimum'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency('item-stok-minimum')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                 </div>
                 <div class="form-group col-md-6">
                    <label>Supplier :</label>
                    <div class="input-group ">
                      <select class="form-control" name="supplier" id="item-supplier">
                            <option value=""></option>
                        <?php

                          foreach ($supplier as $key) {
                            ?>
                            <option value="<?php echo $key->kode; ?>" <?php if($item['supplier'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode.'-'.$key->name; ?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                 </div>
                </div>
                <div class="form-group">
                  <label>Keterangan :</label>
                  <textarea class="form-control" name="desc"><?php echo $item['description']; ?></textarea>
                </div>
                  </div>

                </div>
              </div>
              <!-- satuan harga -->
              <div class="tab-pane" id="satuan-harga">  
                <div class="row">
                  <div class="alert alert-warning" role="alert">
                  PENTING : Mengubah satuan dan konversi setelah ada transaksi akan mengakibatkan kesalahan pada perhitungan. <br>
                  WAJIB : Persiapkan master data item yang benar sebelum pemakaian awal program. Data item yang berantakan mengakibatkan kesalahan perhitungan.
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tipe Harga Jual :</label><br>
                        <input type="radio" name="type_harga" id="item-satu_harga" value="Satu Harga" <?php if($item['type_harga'] == 'Satu Harga'){ echo "checked"; } ?> > <label for="item-satu_harga">Satu Harga</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="type_harga" id="item-satuan" value="Satuan" <?php if($item['type_harga'] == 'Satuan'){ echo "checked"; } ?> > <label for="item-satuan">Satuan</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="type_harga" id="item-level" value="Level" <?php if($item['type_harga'] == 'Level'){ echo "checked"; } ?> > <label for="item-level">Level</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="type_harga" id="item-jumlah" value="Jumlah" <?php if($item['type_harga'] == 'Jumlah'){ echo "checked"; } ?> > <label for="item-jumlah">Jumlah</label>&nbsp;&nbsp;&nbsp;
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6" id="content-satuharga">
                  <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Satuan Dasar :</label>
                      <div class="input-group ">
                        <select class="form-control" name="satuan_dasar" id="item-unit">
                              <option value=""></option>
                          <?php

                            foreach ($item_units as $key) {
                              ?>
                              <option value="<?php echo $key->kode; ?>" <?php if($item['satuan_dasar'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                          <div class="input-group-append">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-unit" onclick="frm_units_item()"><i class="fa fa-plus"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label>Poin Dasar :</label>
                      <div class="input-group ">
                        <input type="text" name="poin_dasar" class="form-control" id="item-poin-dasar" oninput="set_currency_value('item-poin-dasar', this.value)" style="text-align: right;" value="<?php echo number_format($item['poin_dasar'], 2); ?>">
                        <div class="input-group-append">
                          <div class="btn btn-danger" onclick="input_clear_currency('item-poin-dasar')"><i class="fa fa-trash"></i></div>
                        </div>
                      </div>
                  </div>
                  </div>
                      
                  <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Barcode :</label>
                      <div class="input-group ">
                        <input type="text" name="barcode" class="form-control" value="<?php echo $item['barcode']; ?>">
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label>Komisi Sales :</label>
                      <div class="input-group ">
                        <input type="text" name="komisi_sales" class="form-control" id="item-komisi-sales" oninput="set_currency_value('item-komisi-sales', this.value)" style="text-align: right;" value="<?php echo number_format($item['komisi_sales'], 2); ?>">
                        <div class="input-group-append">
                          <div class="btn btn-danger" onclick="input_clear_currency('item-komisi-sales')"><i class="fa fa-trash"></i></div>
                        </div>
                      </div>
                  </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>Harga pokok :</label>
                      <div class="input-group ">
                        <input type="text" name="harga_pokok" class="form-control" id="item-harga-pokok" oninput="set_currency_value('item-harga-pokok', this.value)" style="text-align: right;" value="<?php echo number_format($item['harga_pokok'], 2); ?>">
                        <div class="input-group-append">
                          <div class="btn btn-danger" onclick="input_clear_currency('item-harga-pokok')"><i class="fa fa-trash"></i></div>
                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-4">
                      <label>Persentase Harga jual (%):</label>
                      <div class="input-group ">
                        <input type="text" name="persentase" class="form-control" id="item-persentase" oninput="set_currency_value('item-persentase', this.value)" style="text-align: right;" value="<?php echo number_format($item['persentase'], 2); ?>">
                        <div class="input-group-append">
                          <div class="btn btn-danger" onclick="input_clear_currency('item-persentase')"><i class="fa fa-trash"></i></div>
                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-4">
                      <label>Harga jual :</label>
                      <div class="input-group ">
                        <input type="text" name="harga_jual" class="form-control" id="item-harga-jual" oninput="set_currency_value('item-harga-jual', this.value)" style="text-align: right;" value="<?php echo number_format($item['harga_jual'], 2); ?>" >
                        <div class="input-group-append">
                          <div class="btn btn-danger" onclick="input_clear_currency('item-harga-jual')"><i class="fa fa-trash"></i></div>
                        </div>
                      </div>
                  </div>
                  </div>
                </div>
                
                  <!-- satu harga -->
                <div class="col-md-12 none" id="content-satuan" >
                    <?php $this->load->view('masterdata/type_harga_satuan', $item); ?>
                </div>
                
                  <!-- level -->
                <div class="col-md-12 none" id="content-level" >
                    <?php $this->load->view('masterdata/type_harga_level', $item); ?>
                </div>
                <!-- end -->

                </div>
              </div>
              <!-- gambar -->
              <div class="tab-pane" id="gambar">
              <div class="col-md-6">
                <?php 
                  // if ($action == 'Edit') {
                    ?>
                <div class="form-group">
                  <?php 
                    if (!empty($item['img'])) {
                      ?>
                      <div id="item-img" style="background-image: url(<?php echo base_url().'assets/doc/'.$item['img']; ?>);">
                      </div>
                      <a href="<?php echo base_url(); ?>delete-item-img/<?php echo $item['kode']; ?>" class="btn btn-danger" onclick="return confirm('Hapus gambar?')">
                        <i class="fa fa-trash"></i> Hapus
                      </a>
                      <?php
                    }else{
                      ?>
                      <div id="item-img" class="b-color1"  data-toggle="modal" data-target="#modal-item-img">
                        <i class="fa fa-plus" style="font-size: 30px;margin: 100px;color: #fff;"></i>
                      </div>
                      <?php
                    }
                   ?>
                </div>
                    <?php
                  // }
                 ?>
              </div>
              </div>
              <!-- other -->
              <div class="tab-pane" id="other">
                <h3>other</h3>
              </div>
            </div>
            
          </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success" id="btn-submit" name="submit" value="<?php echo $submit ?>" onclick="btn_submit('<?php echo $submit ?>')" ><i class="fa fa-save"></i> <?php echo $submit ?></button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>


  <!-- Modal -->
<div class="modal fade" id="modal-jenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><i class="fa <?php echo $module['icon']; ?> f-color1"></i> <span>Jenis Item</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>insert-item-types" id="frm-item-types">
        <div class="modal-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" name="cb_item_types_all" id="cb_item_types_all" onclick="toggle_item_types(this)" title="pilih semua"></th>
                <th>Kode</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody id="item-tbl-jenis"></tbody>
            <thead>
              <tr>
                <td></td>
                <td><input type="text" name="kode" class="form-control" id="item-jenis-kode" placeholder="tambah kode disini.."></td>
                <td><input type="text" name="desc" class="form-control" id="item-jenis-desc" placeholder="tambah ket disini.."></td>
              </tr>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" id="item-jenis-hapus" name="submit" value="hapus" onclick="btn_submit_item_types('hapus')"><i class="fa fa-trash"></i> Hapus</button>
          <button type="submit" class="btn btn-info" id="item-jenis-submit" name="submit" value="simpan" onclick="btn_submit_item_types('simpan')"><i class="fa fa-plus"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>


  <!-- Modal -->
<div class="modal fade" id="modal-brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><i class="fa <?php echo $module['icon']; ?> f-color1"></i> <span>Merek</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>insert-item-brands" id="frm-item-brands">
        <div class="modal-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" name="cb_item_brands_all" id="cb_item_brands_all" onclick="toggle_item_brands(this)" title="pilih semua"></th>
                <th>Kode</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody id="item-tbl-brands"></tbody>
            <thead>
              <tr>
                <td></td>
                <td><input type="text" name="kode" class="form-control" id="item-brands-kode" placeholder="tambah kode disini.."></td>
                <td><input type="text" name="desc" class="form-control" id="item-brands-desc" placeholder="tambah ket disini.."></td>
              </tr>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" id="item-brand-hapus" name="submit" value="hapus" onclick="btn_submit_item_brands('hapus')"><i class="fa fa-trash"></i> Hapus</button>
          <button type="submit" class="btn btn-info" id="item-brand-submit" name="submit" value="simpan" onclick="btn_submit_item_brands('simpan')"><i class="fa fa-plus"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
  <!-- Modal -->
<div class="modal fade" id="modal-unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><i class="fa <?php echo $module['icon']; ?> f-color1"></i> <span>Satuan</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>insert-item-units" id="frm-item-units">
        <div class="modal-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" name="cb_item_units_all" id="cb_item_units_all" onclick="toggle_item_units(this)" title="pilih semua"></th>
                <th>Kode</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody id="item-tbl-units"></tbody>
            <thead>
              <tr>
                <td></td>
                <td><input type="text" name="kode" class="form-control" id="item-units-kode" placeholder="tambah kode disini.."></td>
                <td><input type="text" name="desc" class="form-control" id="item-units-desc" placeholder="tambah ket disini.."></td>
              </tr>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" id="item-brand-hapus" name="submit" value="hapus" onclick="btn_submit_item_units('hapus')"><i class="fa fa-trash"></i> Hapus</button>
          <button type="submit" class="btn btn-info" id="item-brand-submit" name="submit" value="simpan" onclick="btn_submit_item_units('simpan')"><i class="fa fa-plus"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="modal-item-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-form">Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>update-item-img/<?php echo $item['kode']; ?>"  enctype='multipart/form-data' id="fra-item-img">
        <div class="modal-body">
         <div class="form-group">
          <input type="file" name="img" class="form-control" id="file">
         </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" id="btn-submit" name="submit" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
 $( document ).ready(function() {

          if ($('#item-inv').is(':checked')) {
              $('#item-hpp').prop('disabled', false);
              $('#item-pajak').prop('readonly', false);
              $('#item-serial').prop('disabled', false);
              $('#item-harga-pokok').prop('readonly', false);
              $('#item-persentase').prop('readonly', false);
          }
          if ($('#item-srv').is(':checked')) {
              $('#item-hpp').prop('disabled', true);
              $('#item-pajak').prop('readonly', true);
              $('#item-serial').prop('disabled', true);
              $('#item-harga-pokok').prop('readonly', true);
              $('#item-persentase').prop('readonly', true);
          }

      $('#item-inv').change(
      function(){
          if ($(this).is(':checked')) {
              $('#item-hpp').prop('disabled', false);
              $('#item-pajak').prop('readonly', false);
              $('#item-serial').prop('disabled', false);
              $('#item-harga-pokok').prop('readonly', false);
              $('#item-persentase').prop('readonly', false);
          }
      });
      $('#item-srv').change(
      function(){
          if ($(this).is(':checked')) {
              $('#item-hpp').prop('disabled', true);
              $('#item-pajak').prop('readonly', true);
              $('#item-serial').prop('disabled', true);
              $('#item-harga-pokok').prop('readonly', true);
              $('#item-persentase').prop('readonly', true);
          }
      });
      change_type_harga()
      get_price_units('<?php echo $item['id'] ?>');
      get_price_level('<?php echo $item['id'] ?>');
      get_units_select()
      read_type_harga()
  });
  function read_type_harga(){
    
          if ($('#item-satu_harga').is(':checked')) {
              $('#content-satuharga').css('display', 'block');
              $('#content-satuan').css('display', 'none');
              $('#content-level').css('display', 'none');
              $('#content-jumlah').css('display', 'none');
          }
          
          if ($('#item-satuan').is(':checked')) {
              $('#content-satuharga').css('display', 'none');
              $('#content-satuan').css('display', 'block');
              $('#content-level').css('display', 'none');
              $('#content-jumlah').css('display', 'none');
          }
          if ($('#item-level').is(':checked')) {
              $('#content-satuharga').css('display', 'none');
              $('#content-satuan').css('display', 'none');
              $('#content-level').css('display', 'block');
              $('#content-jumlah').css('display', 'none');
          }
          if ($('#item-jumlah').is(':checked')) {
              $('#content-satuharga').css('display', 'none');
              $('#content-satuan').css('display', 'none');
              $('#content-level').css('display', 'jumlah');
              $('#content-jumlah').css('display', 'none');
          }

  }
  function change_type_harga(){
      $('#item-satu_harga').change(
      function(){
          if ($(this).is(':checked')) {
              $('#content-satuharga').css('display', 'block');
              $('#content-satuan').css('display', 'none');
              $('#content-level').css('display', 'none');
              $('#content-jumlah').css('display', 'none');
          }
      });

      $('#item-satuan').change(
      function(){
          if ($(this).is(':checked')) {
              $('#content-satuharga').css('display', 'none');
              $('#content-satuan').css('display', 'block');
              $('#content-level').css('display', 'none');
              $('#content-jumlah').css('display', 'none');
          }
      });
      
      $('#item-level').change(
      function(){
          if ($(this).is(':checked')) {
              $('#content-satuharga').css('display', 'none');
              $('#content-satuan').css('display', 'none');
              $('#content-level').css('display', 'block');
              $('#content-jumlah').css('display', 'none');
          }
      });
      
      $('#item-jumlah').change(
      function(){
          if ($(this).is(':checked')) {
              $('#content-satuharga').css('display', 'none');
              $('#content-satuan').css('display', 'none');
              $('#content-level').css('display', 'jumlah');
              $('#content-jumlah').css('display', 'none');
          }
      });

  }
  function set_custom_code(a){
    defcode = document.getElementById('item-kode_default').value;

    if (defcode == a) {
        $('#item-custom_code').val(0);
    }else{
        $('#item-custom_code').val(1);
    }

  }
   function btn_submit(submit){
    $("#frm-item").submit(function(event){
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action")+'/'+submit; //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
          url : post_url,
          type : request_method,
          data : form_data,
          success: function(response){
            if (response == 1) {
              $("#err_kode").html('Kode Sales sudah dipakai');
              $("#item-kode").addClass('is-invalid');
            }else{
              window.location.href="<?php echo base_url().$module['path']; ?>";
            }

          }
        })
      });
   }

   function btn_submit_item_types(submit){
    $("#frm-item-types").submit(function(event){
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action")+'/'+submit; //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
          url : post_url,
          type : request_method,
          data : form_data,
          success: function(response){

            frm_jenis_item()
            get_types_select()
            $('#item-jenis-kode').val('');
            $('#item-jenis-desc').val('');
          }
        })
      });
   }
   function btn_submit_item_brands(submit){
    $("#frm-item-brands").submit(function(event){
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action")+'/'+submit; //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
          url : post_url,
          type : request_method,
          data : form_data,
          success: function(response){

            frm_brands_item()
            get_brands_select()
            $('#item-brands-kode').val('');
            $('#item-brands-desc').val('');
          }
        })
      });
   }
   function btn_submit_item_units(submit){
    $("#frm-item-units").submit(function(event){
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action")+'/'+submit; //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
          url : post_url,
          type : request_method,
          data : form_data,
          success: function(response){

            frm_units_item()
            get_units_select()
            $('#item-units-kode').val('');
            $('#item-units-desc').val('');
          }
        })
      });
   }
    $("#frm-item-img").submit(function(event){
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var content_type = $(this).attr("enctype"); //multipart/form-data
        var form_data = $(this).attr('files'); //Encode form elements for submission

        $.ajax({
          url : post_url,
          type : request_method,
          data : form_data,
          // async: true,
          cache: false,
          contentType: false ,
          processData: false,
          // timeout: 60000,

          success: function(response){
            console.log(response)

          }
        })
            // $('#imodal-item-img').css('display', 'none');
      });
</script>