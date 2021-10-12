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
          <form method="post" action="<?php echo base_url(); ?>insert-sales" id="frm-sales">
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
            <div class="row">
              <div class="col-md-12 f-color1">
                <h5><b>Data Umum</b></h5>
                <hr>
              </div>
              <div class="col-md-6">
                <div class="form-group" id="sales-frm-kode">
                  <label>Kode Sales :</label>
                  <div class="input-group ">
                    <input type="text" name="kode" id="sales-kode" class="form-control" required="" value="<?php echo $kode; ?>">
                  </div>
                  <small class="form-text" style="color: red;" id="err_kode"></small>

                </div>
                <div class="form-group" id="sales-frm-name">
                  <label>Nama Sales :</label>
                  <div class="input-group ">
                    <input type="text" name="name" id="sales-name" class="form-control" required="" value="<?php echo $data['name']; ?>">
                  </div>
                </div>
                <div class="form-group" id="sales-frm-alamat">
                  <label>Alamat :</label>
                  <div class="input-group ">
                    <textarea class="form-control" name="alamat" id="sales-alamat"><?php echo $data['alamat']; ?></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sales-frm-kota">
                    <label>Kota :</label>
                    <div class="input-group ">
                      <input type="text" name="kota" id="sales-kota" class="form-control" value="<?php echo $data['kota']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sales-frm-provinsi">
                    <label>Provinsi :</label>
                    <div class="input-group ">
                      <input type="text" name="provinsi" id="sales-provinsi" class="form-control" value="<?php echo $data['provinsi']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sales-frm-negara">
                    <label>Negara :</label>
                    <div class="input-group ">
                      <input type="text" name="negara" id="sales-negara" class="form-control" value="<?php echo $data['negara']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sales-frm-kode_pos">
                    <label>Kode Pos :</label>
                    <div class="input-group ">
                      <input type="text" name="kode_pos" id="sales-kode_pos" class="form-control" value="<?php echo $data['kode_pos']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sales-frm-telepon">
                    <label>Telepon :</label>
                    <div class="input-group ">
                      <input type="number" name="telepon" id="sales-telepon" class="form-control" value="<?php echo $data['telepon']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sales-frm-fax">
                    <label>Fax :</label>
                    <div class="input-group ">
                      <input type="number" name="fax" id="sales-fax" class="form-control" value="<?php echo $data['fax']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sales-frm-email">
                    <label>Email :</label>
                    <div class="input-group ">
                      <input type="email" name="email" id="sales-email" class="form-control" value="<?php echo $data['email']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sales-frm-tanggal_lahir">
                    <label>Tanggal Lahir :</label>
                    <div class="input-group ">
                      <input type="date" name="tanggal_lahir" id="sales-tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12" id="sales-frm-kontak">
                    <label>Kontak :</label>
                    <div class="input-group ">
                      <input type="text" name="kontak" id="sales-kontak" class="form-control" value="<?php echo $data['kontak']; ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group" id="sales-frm-desc">
                  <label>Keterangan :</label>
                  <div class="input-group ">
                    <textarea class="form-control" name="description" id="sales-desc"><?php echo $data['description']; ?></textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group"  id="sales-frm-bank">
                    <label>Bank :</label>
                    <div class="input-group ">
                      <input type="text" name="bank" id="sales-bank" class="form-control" value="<?php echo $data['bank']; ?>">
                    </div>
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sales-frm-no_rek">
                    <label>No Rek :</label>
                    <div class="input-group ">
                      <input type="text" name="no_rek" id="sales-no_rek" class="form-control" value="<?php echo $data['no_rek']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6"  id="sales-frm-rek_name">
                    <label>Rek. A/N :</label>
                    <div class="input-group ">
                      <input type="text" name="rek_name" id="sales-rek_name" class="form-control" value="<?php echo $data['rek_name']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                    <label>Sistem Komisi :</label>
                    <div class="form-group ">
                      <input type="radio" name="sistem_komisi" class="sistem_komisi" id="sales-tidak-aktif" value="Tidak Aktif" <?php if($data['sistem_komisi'] == 'Tidak Aktif'){ echo "checked"; } ?> > <label for="sales-tidak-aktif">Tidak Aktif</label> <br>
                      <input type="radio" name="sistem_komisi" class="sistem_komisi" id="sales-per-barang" value="Perbarang Harga Jual" <?php if($data['sistem_komisi'] == 'Perbarang Harga Jual'){ echo "checked"; } ?> > <label for="sales-per-barang">Perbarang Harga Jual</label> <br>
                      <input type="radio" name="sistem_komisi" class="sistem_komisi" id="sales-total-faktur" value="Total Faktur" <?php if($data['sistem_komisi'] == 'Total Faktur'){ echo "checked"; } ?> > <label for="sales-total-faktur">Total Faktur</label> <br>
                      <input type="radio" name="sistem_komisi" class="sistem_komisi" id="sales-per-item" value="Per Item" <?php if($data['sistem_komisi'] == 'Per Item'){ echo "checked"; } ?> > <label for="sales-per-item">Per Item</label> <br>
                      <input type="radio" name="sistem_komisi" class="sistem_komisi" id="sales-penjualan-netto" value="Penjualan Netto" <?php if($data['sistem_komisi'] == 'Penjualan Netto'){ echo "checked"; } ?> > <label for="sales-penjualan-netto">Penjualan Netto</label> <br>
                      <input type="radio" name="sistem_komisi" class="sistem_komisi" id="sales-dari-laba" value="Dari Laba" <?php if($data['sistem_komisi'] == 'Dari Laba'){ echo "checked"; } ?> > <label for="sales-dari-laba">Dari Laba</label> <br>
                    </div>
                 </div>
                 <div class="form-group col-md-4">
                    <label>Type :</label>
                    <div class="input-group">
                      <select class="form-control" name="type_komisi" id="sales-type_komisi">
                        <option value=""></option>
                        <option value="Persentase" <?php if($data['type_komisi'] == 'Persentase'){ echo "selected='true'"; } ?> >Persentase</option>
                        <option value="Nominal" <?php if($data['type_komisi'] == 'Nominal'){ echo "selected='true'"; } ?> >Nominal</option>
                      </select>
                    </div>
                 </div>
                 <div class="form-group col-md-4">
                    <label>Nilai :</label>
                    <div class="input-group ">
                      <input type="text" name="nilai_komisi" class="form-control" id="sales-nilai_komisi" oninput="set_currency_value('sales-nilai_komisi', this.value)" style="text-align: right;" value="<?php echo number_format($data['nilai_komisi'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency('sales-nilai_komisi')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
            <div class="card-footer" style="text-align: right;">
              <button type="submit" class="btn btn-success" id="sales-btn-submit" name="submit" value="<?php echo $submit ?>" onclick="btn_submit('<?php echo $submit ?>')" ><i class="fa fa-save"></i> <?php echo $submit ?></button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>

<script type="text/javascript">
 $( document ).ready(function() {
          if ($('#sales-per-item').is(':checked')) {
              $('#sales-type_komisi').prop('disabled', true);
              $('#sales-nilai_komisi').prop('readonly', true);
          }else{

              $('#sales-type_komisi').prop('disabled', false);
              $('#sales-nilai_komisi').prop('readonly', false);
          }

      $('.sistem_komisi').change(
      function(){
          if ($('#sales-per-item').is(':checked')) {
              $('#sales-type_komisi').prop('disabled', true);
              $('#sales-nilai_komisi').prop('readonly', true);
          }else{

              $('#sales-type_komisi').prop('disabled', false);
              $('#sales-nilai_komisi').prop('readonly', false);
          }
      });
  });

   function btn_submit(submit){
    $("#frm-sales").submit(function(event){
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
              $("#sales-kode").addClass('is-invalid');
            }else{
              window.location.href="<?php echo base_url().$module['path']; ?>";
            }

          }
        })
      });
   }
</script>