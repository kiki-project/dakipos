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
          <form method="post" action="<?php echo base_url(); ?>insert-customers" id="frm-customer">
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
            <div class="row">
              <div class="col-md-12 f-color1">
                <h5><b>Data Umum</b></h5>
                <hr>
              </div>
              <div class="col-md-6">
                <div class="form-group" id="cust-frm-kode">
                  <label>Kode Pelanggan :</label>
                  <div class="input-group ">
                    <input type="text" name="kode" id="cust-kode" class="form-control" required="" value="<?php echo $kode; ?>">
                  </div>
                  <small class="form-text" style="color: red;" id="err_kode"></small>

                </div>
                <div class="form-group" id="cust-frm-name">
                  <label>Nama Pelanggan :</label>
                  <div class="input-group ">
                    <input type="text" name="name" id="cust-name" class="form-control" required="" value="<?php echo $data['name']; ?>">
                  </div>
                </div>
                <div class="form-group" id="cust-frm-alamat">
                  <label>Alamat :</label>
                  <div class="input-group ">
                    <textarea class="form-control" name="alamat" id="cust-alamat"><?php echo $data['alamat']; ?></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="cust-frm-kota">
                    <label>Kota :</label>
                    <div class="input-group ">
                      <input type="text" name="kota" id="cust-kota" class="form-control" value="<?php echo $data['kota']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="cust-frm-provinsi">
                    <label>Provinsi :</label>
                    <div class="input-group ">
                      <input type="text" name="provinsi" id="cust-provinsi" class="form-control" value="<?php echo $data['provinsi']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="cust-frm-negara">
                    <label>Negara :</label>
                    <div class="input-group ">
                      <input type="text" name="negara" id="cust-negara" class="form-control" value="<?php echo $data['negara']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="cust-frm-kode_pos">
                    <label>Kode Pos :</label>
                    <div class="input-group ">
                      <input type="text" name="kode_pos" id="cust-kode_pos" class="form-control" value="<?php echo $data['kode_pos']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="cust-frm-telepon">
                    <label>Telepon :</label>
                    <div class="input-group ">
                      <input type="number" name="telepon" id="cust-telepon" class="form-control" value="<?php echo $data['telepon']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="cust-frm-fax">
                    <label>Fax :</label>
                    <div class="input-group ">
                      <input type="number" name="fax" id="cust-fax" class="form-control" value="<?php echo $data['fax']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="cust-frm-email">
                    <label>Email :</label>
                    <div class="input-group ">
                      <input type="email" name="email" id="cust-email" class="form-control" value="<?php echo $data['email']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="cust-frm-tanggal_lahir">
                    <label>Tanggal Lahir :</label>
                    <div class="input-group ">
                      <input type="date" name="tanggal_lahir" id="cust-tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12" id="cust-frm-kontak">
                    <label>Kontak :</label>
                    <div class="input-group ">
                      <input type="text" name="kontak" id="cust-kontak" class="form-control" value="<?php echo $data['kontak']; ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group" id="cust-frm-desc">
                  <label>Keterangan :</label>
                  <div class="input-group ">
                    <textarea class="form-control" name="description" id="cust-desc"><?php echo $data['description']; ?></textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group"  id="cust-frm-bank">
                    <label>Bank :</label>
                    <div class="input-group ">
                      <input type="text" name="bank" id="cust-bank" class="form-control" value="<?php echo $data['bank']; ?>">
                    </div>
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="cust-frm-no_rek">
                    <label>No Rek :</label>
                    <div class="input-group ">
                      <input type="text" name="no_rek" id="cust-no_rek" class="form-control" value="<?php echo $data['no_rek']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6"  id="cust-frm-rek_name">
                    <label>Rek. A/N :</label>
                    <div class="input-group ">
                      <input type="text" name="rek_name" id="cust-rek_name" class="form-control" value="<?php echo $data['rek_name']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-6">
                    <label>Limit Jumlah Piutang :</label>
                    <div class="input-group ">
                      <input type="text" name="limit_jumlah_piutang" class="form-control" id="cust-limit-piutang" oninput="set_currency_value('cust-limit-piutang', this.value)" style="text-align: right;" value="<?php echo number_format($data['limit_jumlah_piutang'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency('cust-limit-piutang')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                 </div>
                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label>Limit hari piutang</label>
                      <input type="number" name="limit_hari_piutang" class="form-control" style="text-align: right;" value="<?php echo number_format($data['limit_hari_piutang']); ?>">
                      <small class="form-text text-muted">0 = tanpa limit</small>
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Jatuh tempo</label>
                      <input type="number" name="jatuh_tempo" class="form-control" style="text-align: right;" value="<?php echo number_format($data['jatuh_tempo']); ?>">
                      <small class="form-text text-muted">0 = mengacu pada pengaturan</small>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 form-group">
                    <label>Maksimum jumlah (nominal kredit per nota)</label>
                    <div class="input-group ">
                      <input type="text" name="maksimum_jumlah" class="form-control" id="cust-maksimum-jumlah" oninput="set_currency_value('cust-maksimum-jumlah', this.value)" style="text-align: right;" value="<?php echo number_format($data['maksimum_jumlah'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency('cust-maksimum-jumlah')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                    <label>Menggunakan pajak :</label>
                    <div class="input-group ">
                      <select class="form-control" name="pajak">
                        <option value="Default" <?php if($data['pajak'] == 'Default'){ echo "selected='true'"; } ?> >Default</option>
                        <option value="Non" <?php if($data['pajak'] == 'Non'){ echo "selected='true'"; } ?> >Non</option>
                        <option value="Include" <?php if($data['pajak'] == 'Include'){ echo "selected='true'"; } ?> >Include</option>
                        <option value="Exclude" <?php if($data['pajak'] == 'Exclude'){ echo "selected='true'"; } ?> >Exclude</option>
                      </select>
                    </div>
                      <small class="form-text text-muted">Default = mengacu pada pengaturan</small>
                 </div>
                 <div class="form-group col-md-4">
                    <label>Nilai Pajak diset dari :</label>
                    <div class="input-group">
                      <select class="form-control" name="sumber_nilai_pajak">
                        <option value="Default" <?php if($data['sumber_nilai_pajak'] == 'Default'){ echo "selected='true'"; } ?> >Default</option>
                        <option value="Pelanggan" <?php if($data['sumber_nilai_pajak'] == 'Pelanggan'){ echo "selected='true'"; } ?> >Data Pelanggan</option>
                        <option value="Gudang" <?php if($data['sumber_nilai_pajak'] == 'Gudang'){ echo "selected='true'"; } ?> >Data Gudang</option>
                      </select>
                    </div>
                 </div>
                 <div class="form-group col-md-4">
                    <label>Nilai Pajak :</label>
                    <div class="input-group " name="nilai_pajak">
                      <input type="text" name="nilai_pajak" class="form-control" id="cust-nilai-pajak" oninput="set_currency_value('cust-nilai-pajak', this.value)" style="text-align: right;" value="<?php echo number_format($data['nilai_pajak'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency('cust-nilai-pajak')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                 </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-6">
                    <label>Grup Pelanggan :</label>
                    <div class="input-group ">
                      <select class="form-control" name="customer_group">
                        <option value=""></option>
                        <option value="General" <?php if($data['customer_group'] == 'General'){ echo "selected='true'"; } ?> >General</option>
                        <option value="Bronze" <?php if($data['customer_group'] == 'Bronze'){ echo "selected='true'"; } ?> >Bronze</option>
                        <option value="Silver" <?php if($data['customer_group'] == 'Silver'){ echo "selected='true'"; } ?> >Silver</option>
                        <option value="Gold" <?php if($data['customer_group'] == 'Gold'){ echo "selected='true'"; } ?> >Gold</option>
                      </select>
                    </div>
                 </div>
                 <div class="form-group col-md-6">
                    <label>Tipe Potongan :</label>
                    <div class="input-group ">
                      <select class="form-control" name="tipe_potongan">
                        <option value=""></option>
                        <option value="Pot. Grup Per Item" <?php if($data['tipe_potongan'] == 'Pot. Grup Per Item'){ echo "selected='true'"; } ?> >Pot. Grup Per Item</option>
                        <option value="Pot. Grup Per Faktur" <?php if($data['tipe_potongan'] == 'Pot. Grup Per Faktur'){ echo "selected='true'"; } ?> >Pot. Grup Per Faktur</option>
                        <option value="Pot. Daftar Item" <?php if($data['tipe_potongan'] == 'Pot. Daftar Item'){ echo "selected='true'"; } ?> >Pot. Daftar Item</option>
                      </select>
                    </div>
                 </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                    <label>Wilayah :</label>
                    <div class="input-group ">
                      <select class="form-control" name="wilayah">
                        <option value=""></option>
                        <?php 
                          foreach ($wilayah as $key) {
                            ?>
                        <option value="<?php echo $key->kode ?>" <?php if($data['wilayah'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode."-".$key->description; ?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                 </div>
                 <div class="form-group col-md-4">
                    <label>Sub Wilayah :</label>
                    <div class="input-group">
                      <select class="form-control" name="sub_wilayah">
                        <option value=""></option>
                      <?php 
                          foreach ($sub_wilayah as $key) {
                            ?>
                        <option value="<?php echo $key->kode ?>" <?php if($data['sub_wilayah'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode."-".$key->description; ?></option>
                            <?php
                          }
                         ?>
                       </select>
                    </div>
                 </div>
                 <div class="form-group col-md-4">
                    <label>Sales :</label>
                    <div class="input-group" >
                      <select class="form-control" name="sales">
                        <option value=""></option>
                      <?php 
                          foreach ($sales as $key) {
                            ?>
                        <option value="<?php echo $key->kode ?>" <?php if($data['sales'] == $key->kode){ echo "selected='true'"; } ?> ><?php echo $key->kode."-".$key->name; ?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
            <div class="card-footer" style="text-align: right;">
              <button type="submit" class="btn btn-success" id="cust-btn-submit" name="submit" value="<?php echo $submit ?>" onclick="btn_submit('<?php echo $submit ?>')" ><i class="fa fa-save"></i> <?php echo $submit ?></button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>

<script type="text/javascript">
   function btn_submit(submit){
    $("#frm-customer").submit(function(event){
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
              $("#err_kode").html('Kode Pelanggan sudah dipakai');
              $("#cust-kode").addClass('is-invalid');
            }else{
              window.location.href="<?php echo base_url().$module['path']; ?>";
            }

          }
        })
      });
   }
</script>