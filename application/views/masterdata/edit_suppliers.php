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
          <form method="post" action="<?php echo base_url(); ?>insert-suppliers" id="frm-suppliers">
          <div class="card-body" style="overflow:auto;white-space: nowrap;">
            <div class="row">
              <div class="col-md-12 f-color1">
                <h5><b>Data Umum</b></h5>
                <hr>
              </div>
              <div class="col-md-6">
                <div class="form-group" id="sup-frm-kode">
                  <label>Kode Supplier :</label>
                  <div class="input-group ">
                    <input type="text" name="kode" id="sup-kode" class="form-control" required="" value="<?php echo $kode; ?>">
                  </div>
                  <small class="form-text" style="color: red;" id="err_kode"></small>

                </div>
                <div class="form-group" id="sup-frm-name">
                  <label>Nama Supplier :</label>
                  <div class="input-group ">
                    <input type="text" name="name" id="sup-name" class="form-control" required="" value="<?php echo $data['name']; ?>">
                  </div>
                </div>
                <div class="form-group" id="sup-frm-alamat">
                  <label>Alamat :</label>
                  <div class="input-group ">
                    <textarea class="form-control" name="alamat" id="sup-alamat"><?php echo $data['alamat']; ?></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sup-frm-kota">
                    <label>Kota :</label>
                    <div class="input-group ">
                      <input type="text" name="kota" id="sup-kota" class="form-control" value="<?php echo $data['kota']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sup-frm-provinsi">
                    <label>Provinsi :</label>
                    <div class="input-group ">
                      <input type="text" name="provinsi" id="sup-provinsi" class="form-control" value="<?php echo $data['provinsi']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sup-frm-negara">
                    <label>Negara :</label>
                    <div class="input-group ">
                      <input type="text" name="negara" id="sup-negara" class="form-control" value="<?php echo $data['negara']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sup-frm-kode_pos">
                    <label>Kode Pos :</label>
                    <div class="input-group ">
                      <input type="text" name="kode_pos" id="sup-kode_pos" class="form-control" value="<?php echo $data['kode_pos']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sup-frm-telepon">
                    <label>Telepon :</label>
                    <div class="input-group ">
                      <input type="number" name="telepon" id="sup-telepon" class="form-control" value="<?php echo $data['telepon']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sup-frm-fax">
                    <label>Fax :</label>
                    <div class="input-group ">
                      <input type="number" name="fax" id="sup-fax" class="form-control" value="<?php echo $data['fax']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sup-frm-email">
                    <label>Email :</label>
                    <div class="input-group ">
                      <input type="email" name="email" id="sup-email" class="form-control" value="<?php echo $data['email']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="sup-frm-tanggal_lahir">
                    <label>Tanggal Lahir :</label>
                    <div class="input-group ">
                      <input type="date" name="tanggal_lahir" id="sup-tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12" id="sup-frm-kontak">
                    <label>Kontak :</label>
                    <div class="input-group ">
                      <input type="text" name="kontak" id="sup-kontak" class="form-control" value="<?php echo $data['kontak']; ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group" id="sup-frm-desc">
                  <label>Keterangan :</label>
                  <div class="input-group ">
                    <textarea class="form-control" name="description" id="sup-desc"><?php echo $data['description']; ?></textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-row">
                  <div class="form-group col-md-6"  id="sup-frm-bank">
                    <label>Bank :</label>
                    <div class="input-group ">
                      <input type="text" name="bank" id="sup-bank" class="form-control" value="<?php echo $data['bank']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6"  id="sup-frm-npwp">
                    <label>NPWP :</label>
                    <div class="input-group ">
                      <input type="text" name="npwp" id="sup-npwp" class="form-control" value="<?php echo $data['npwp']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="sup-frm-no_rek">
                    <label>No Rek :</label>
                    <div class="input-group ">
                      <input type="text" name="no_rek" id="sup-no_rek" class="form-control" value="<?php echo $data['no_rek']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6"  id="sup-frm-rek_name">
                    <label>Rek. A/N :</label>
                    <div class="input-group ">
                      <input type="text" name="rek_name" id="sup-rek_name" class="form-control" value="<?php echo $data['rek_name']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 form-group">
                      <label>Jatuh tempo</label>
                      <input type="number" name="jatuh_tempo" class="form-control" style="text-align: right;" value="<?php echo number_format($data['jatuh_tempo']); ?>">
                      <small class="form-text text-muted">0 = mengacu pada pengaturan</small>
                  </div>
                 <div class="form-group col-md-6">
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
                </div>
                <div class="form-row">
                 <div class="form-group col-md-6">
                    <label>Nilai Pajak diset dari :</label>
                    <div class="input-group">
                      <select class="form-control" name="sumber_nilai_pajak">
                        <option value="Default" <?php if($data['sumber_nilai_pajak'] == 'Default'){ echo "selected='true'"; } ?> >Default</option>
                        <option value="Pelanggan" <?php if($data['sumber_nilai_pajak'] == 'Pelanggan'){ echo "selected='true'"; } ?> >Data Pelanggan</option>
                        <option value="Gudang" <?php if($data['sumber_nilai_pajak'] == 'Gudang'){ echo "selected='true'"; } ?> >Data Gudang</option>
                      </select>
                    </div>
                 </div>
                 <div class="form-group col-md-6">
                    <label>Nilai Pajak :</label>
                    <div class="input-group " name="nilai_pajak">
                      <input type="text" name="nilai_pajak" class="form-control" id="sup-nilai-pajak" oninput="set_currency_value('sup-nilai-pajak', this.value)" style="text-align: right;" value="<?php echo number_format($data['nilai_pajak'], 2); ?>">
                      <div class="input-group-append">
                        <div class="btn btn-danger" onclick="input_clear_currency('sup-nilai-pajak')"><i class="fa fa-trash"></i></div>
                      </div>
                    </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
            <div class="card-footer" style="text-align: right;">
              <button type="submit" class="btn btn-success" id="sup-btn-submit" name="submit" value="<?php echo $submit ?>" onclick="btn_submit('<?php echo $submit ?>')" ><i class="fa fa-save"></i> <?php echo $submit ?></button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>

<script type="text/javascript">
   function btn_submit(submit){
    $("#frm-suppliers").submit(function(event){
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
              $("#err_kode").html('Kode Supplier sudah dipakai');
              $("#sup-kode").addClass('is-invalid');
            }else{
              window.location.href="<?php echo base_url().$module['path']; ?>";
            }

          }
        })
      });
   }
</script>