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
          <form method="post" action="<?php echo base_url(); ?>insert-purchases" id="frm-purchases">
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-row">
                  <div class="form-group col-md-6" id="frm-kode">
                    <label>No Transaksi :</label>
                    <div class="input-group ">
                      <input type="text" name="id" id="id" class="form-control none" required="" readonly="" value="<?php echo $data['id']; ?>">
                      <input type="text" name="kode" id="kode" class="form-control" required="" readonly="" value="<?php echo $data['kode']; ?>">
                    </div>
                    <small class="form-text" style="color: red;" id="err_kode"></small>
                  </div>
                  <div class="form-group col-md-6" id="frm-tanggal">
                    <label>Tanggal : </label>
                    <div class="input-group ">
                      <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Masuk ke:</label>
                    <div class="input-group ">
                      <select class="form-control" name="masuk_ke" id="gudang">
                        <?php

                          foreach ($gudang as $key) {
                            ?>
                            <option value="<?php echo $key->kode; ?>" <?php if($data['masuk_ke'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode.'-'.$key->name; ?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>PPN:</label>
                    <div class="input-group ">
                      <select class="form-control" name="ppn" id="ppn">
                            <option value="Non" <?php if($data['ppn'] == 'Non'){ echo "selected='true'"; } ?> >Non</option>
                            <option value="Include" <?php if($data['ppn'] == 'Include'){ echo "selected='true'"; } ?> >Include</option>
                            <option value="Exclude" <?php if($data['ppn'] == 'Exclude'){ echo "selected='true'"; } ?> >Exclude</option>
                      </select>
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-6">
                <div class="form-row">
                  <div class="form-group col-md-6" id="frm-Kekurangan">
                    <label>Supplier:</label>
                    <div class="input-group ">
                      <select class="form-control" name="supplier" id="supplier">
                            <option value=""></option>
                        <?php

                          foreach ($supplier as $key) {
                            ?>
                            <option value="<?php echo $key->kode; ?>" <?php if($data['supplier'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode.'-'.$key->name; ?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="frm-provinsi">
                    <label>Pesanan:</label>
                    <div class="input-group ">
                      <input type="text" name="kode_order" style="text-align: right;"  class="form-control" value="<?php echo $data['kode_order']; ?>">
                      <div class="input-group-append">
                        <a href="#" class="btn btn-success"  ><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="form-row none">
                  <div class="form-group col-md-6" id="frm-harga">
                    <label>Harga :</label>
                      <div class="input-group ">
                        <input type="text" name="harga" class="form-control" id="harga" oninput="set_currency_value('harga', this.value)" style="text-align: right;" value="<?php echo number_format($data['harga'], 2); ?>">
                        <div class="input-group-append">
                          <div class="btn btn-default"><i class="fa fa-trash"></i></div>
                        </div>
                      </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                    <?php $this->load->view('purchase/table_purchase', $data); ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <div class="form-row">
                  <div class="form-group" id="frm-tanggal">
                    <label>Jatuh Tempo : </label>
                    <div class="input-group ">
                      <input type="date" name="jatuh_tempo" id="jatuh_tempo" class="form-control" value="<?php echo $data['jatuh_tempo']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Hari JT : </label>
                    <div class="input-group ">
                      <input type="number" name="hari_jt" id="hari_jt" class="form-control" value="<?php echo $data['hari_jt']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group" id="frm-desc">
                  <label>Keterangan :</label>
                  <div class="input-group ">
                    <textarea class="form-control" name="description" id="desc"><?php echo $data['description']; ?></textarea>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-6" id="frm-provinsi">
                    <label>Titip/DP:</label>
                    <div class="input-group ">
                      <input type="text" name="dp" style="text-align: right;"  oninput="hitung_currency('dp', this.value)" id="dp" class="form-control" value="<?php echo number_format($data['dp'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger"  onclick="input_clear_currency('dp')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="frm-Kekurangan">
                    <label>Kekurangan:</label>
                    <div class="input-group ">
                      <input type="text" name="kredit" style="text-align: right;" readonly="" id="kekurangan" class="form-control" value="<?php echo number_format($data['kredit'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-default" ><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Item :</label>
                    <div class="input-group ">
                      <input type="text" name="sub_total_item" style="text-align: right;" id="sub_total_item" readonly="true" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-md-4" id="frm-sub_total_item">
                    <label>Terima :</label>
                    <div class="input-group ">
                      <input type="text" name="sub_total_terima" style="text-align: right;" id="sub_total_terima" class="form-control" value="<?php echo number_format($data['sub_total_terima']); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency('sub_total_terima')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4" id="frm-provinsi">
                    <label>Sub Total:</label>
                    <div class="input-group ">
                      <input type="text" name="sub_total_harga" style="text-align: right;" id="sub_total_harga" readonly="" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4" id="frm-sub_total_item">
                    <label>Potongan (%) :</label>
                    <div class="input-group ">
                      <input type="text" name="potongan" style="text-align: right;"  oninput="hitung_currency('potongan', this.value)" id="potongan" class="form-control" value="<?php echo number_format($data['potongan'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger"  onclick="input_clear_currency('potongan')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4" id="frm-sub_total_item">
                    <label>Pot Nota (%) :</label>
                    <div class="input-group ">
                      <input type="text" name="pot_nota_percent" style="text-align: right;"  oninput="hitung_currency('pot_nota_percent', this.value)" id="pot_nota_percent" class="form-control" value="<?php echo number_format($data['pot_nota_percent'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger"  onclick="input_clear_currency('pot_nota_percent')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4" id="frm-sub_total_item">
                    <label>Pot Nota (<i>nilai</i>) :</label>
                    <div class="input-group ">
                      <input type="text" name="pot_nota_nilai" style="text-align: right;"  oninput="hitung_currency('pot_nota_nilai', this.value)" id="pot_nota_nilai" class="form-control" value="<?php echo number_format($data['pot_nota_nilai'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger"  onclick="input_clear_currency('pot_nota_nilai')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-row">
                    <div class="form-group col-md-4" id="frm-sub_total_item">
                        <label>Pajak (%) :</label>
                        <div class="input-group ">
                          <input type="text" name="pajak_percent" style="text-align: right;"  oninput="hitung_currency('pajak_percent', this.value)" id="pajak_percent" class="form-control" value="<?php echo number_format($data['pajak_percent'], 2); ?>">
                          <div class="input-group-append">
                            <div class="btn btn-danger"  onclick="input_clear_currency('pajak_percent')"><i class="fa fa-trash"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-8" id="frm-sub_total_item">
                        <label>Pajak (<i>nilai</i>) :</label>
                        <div class="input-group ">
                          <input type="text" name="pajak_nilai" style="text-align: right;"  oninput="hitung_currency('pajak_nilai', this.value)" id="pajak_nilai" class="form-control" value="<?php echo number_format($data['pajak_nilai'], 2); ?>">
                          <div class="input-group-append">
                            <div class="btn btn-danger"  onclick="input_clear_currency('pajak_nilai')"><i class="fa fa-trash"></i></div>
                          </div>
                        </div>
                      </div>
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="frm-biaya_lain">
                    <label>Biaya Lain :</label>
                    <div class="input-group ">
                      <input type="text" name="biaya_lain" style="text-align: right;" oninput="hitung_currency_purchases('biaya_lain', this.value)" id="biaya_lain" class="form-control" value="<?php echo number_format($data['biaya_lain'],2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency_purchases('biaya_lain')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                      <div>
                        <input type="checkbox" id="tambah_total" name="tambah_total" onchange="hitung_purchases('none')" value="1" <?php if($data['tambah_total'] == 1){ echo "checked='true'"; } ?>>
                        <label for="tambah_total">Tambah ke total</label>
                      </div>
                  </div>
                  <div class="form-group col-md-6" id="frm-provinsi">
                    <label>Total Akhir Harga:</label>
                    <div class="input-group ">
                      <input type="text" name="total_akhir_harga" style="text-align: right;" id="total_akhir_harga" readonly="" class="form-control">
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
            <div class="card-footer" style="text-align: right;">
              <a href="<?php echo base_url(); ?>cetak-purchase/<?php echo $data['id']; ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
              <button type="submit" class="btn btn-success" id="btn-submit" name="submit" value="<?php echo $submit ?>" onclick="btn_submit('<?php echo $submit ?>')" ><i class="fa fa-save"></i> <?php echo $submit ?></button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>

  <!-- Modal -->
<div class="modal fade" id="modal-items" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><i class="fa fa-dropbox f-color1"></i> <span>Items</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>json/insert-purchase_item" id="frm-items">
        <input type="text" name="id" value="<?php echo $data['id']; ?>" style="display:none;">
        <input type="text" name="type" value="purchase" style="display:none;">
        <div class="modal-body">          
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="src" class="form-control" placeholder="Search here..." oninput="get_item_list_radio(10,this.value)">
              <div class="input-group-append">
                <button type="submit" name="submit" value="src" class="btn btn-info pull-right" onclick="submit_item('src')"><i class="fa fa-search"></i>&nbsp;Cari</button>
              </div>
            </div>
          </div>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="width: 20px;"></th>
                <th>Kode Item</th>
                <th>Nama Item</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Stok Minimum</th>
                <th>Satuan</th>
                <th>Supplier</th>
              </tr>
            </thead>
            <tbody id="items-list-json"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" id="item-brand-submit" name="submit" value="simpan" onclick="submit_item('pilih')"><i class="fa fa-check"></i> Pilih</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
 $( document ).ready(function() {
   get_purchase_item('<?php echo $data['id']; ?>');
          if ($('#per-item').is(':checked')) {
              $('#type_komisi').prop('disabled', true);
              $('#nilai_komisi').prop('readonly', true);
          }else{

              $('#type_komisi').prop('disabled', false);
              $('#nilai_komisi').prop('readonly', false);
          }

      $('.sistem_komisi').change(
      function(){
          if ($('#per-item').is(':checked')) {
              $('#type_komisi').prop('disabled', true);
              $('#nilai_komisi').prop('readonly', true);
          }else{

              $('#type_komisi').prop('disabled', false);
              $('#nilai_komisi').prop('readonly', false);
          }
      });
  });

   function btn_submit(submit){
    $("#frm-purchases").submit(function(event){
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
              $("#err_kode").html('Kode Pesanan sudah dipakai');
              $("#kode").addClass('is-invalid');
            }else{
              window.location.href="<?php echo base_url().$module['path']; ?>";
            }

          }
        })
      });
   }
function submit_item(a){
    $("#frm-items").submit(function(event){
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action") //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
          url : post_url,
          type : request_method,
          data : form_data,
          success: function(response){
            data = JSON.parse(response);
            if (a == 'pilih') {
              $('#modal-items').modal('hide');
             get_purchase_item('<?php echo $data['id']; ?>');
            }

          }
        })
      });
}
</script>