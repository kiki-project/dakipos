<!-- <script src="<?php echo base_url(); ?>assets/stackpath_bootstrap.min.js"></script> -->
<div class="container">  
  <br><br>
</div>
<div class="container">
      <div class="row">
        <div class="col-md-5">
          <?php
      if (!empty($brg['cv_img'])) {
        ?>
          <div id="main_img" style="height: 400px;width: 100%;background-image: url(<?php echo base_url(); ?>assets/doc/<?php echo $brg['cv_img']; ?>);background-size: cover;background-size: 120%;background-position: center;background-repeat: no-repeat;border: 1px solid #ccc;">
          </div>
        <?php
      }else{
        ?>
        <div style="width: 100%;height:400px;background-color: #ccc;color:#aaa;text-align: center;padding: 10px;padding-top: 25%;font-size: 30px;">none</div>
        <?php
      }
      ?>
      <div class="row">
        <?php 
          foreach ($img as $key) {
          ?>
        <a onclick="set_img('<?php echo $key->img; ?>')">
        <div style="height: 100px;width: 100px;margin: 10px;background-image: url(<?php echo base_url().'assets/doc/'.$key->img; ?>);background-size: cover;background-size: 130%;background-position: center;background-repeat: no-repeat;border:1px solid #ccc;cursor: pointer;text-align: center;opacity: 0.8;">
        </div>
        </a>
          <?php
          }
         ?>
      </div>
        </div>
        <div class="col-md-7">
          <h2><b><?php echo $brg['nama']; ?></b></h2>
          <div><h6>stok: <span id="stok"><?php echo number_format($brg['stok']); ?></span> | Terjual : 0</h6></div>
          <h1 class="f-color2"><b>Rp. <?php echo number_format($brg['harga']); ?></b></h1>
          <form method="post" action="<?php echo base_url(); ?>add-cart/<?php echo $brg['id']; ?>">
            
          <h6>ukuran:</h6>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <?php 
            foreach ($stok as $key) {
            ?>
              <label class="btn btn-outline-success">
                <input type="radio" name="ukuran" id="option<?php echo $key->id ?>" autocomplete="off" onclick="set_stok('<?php echo $key->stok ?>', 'uk<?php echo $key->id ?>')" value='<?php echo $key->ukuran; ?>' required=""> <?php echo $key->ukuran; ?>
              </label>
             <!--  <button class="btn btn-default" id="uk<?php echo $key->id ?>" onclick="set_stok('<?php echo $key->stok ?>', 'uk<?php echo $key->id ?>')"><?php echo $key->ukuran; ?></button> -->
            <?php
            }
           ?>
            </div>
           <h6>Jenis:</h6>
           <h5><b><?php echo $brg['jenis']; ?></b></h5>
           <h6>Merek:</h6>
           <h5><b><?php echo $brg['merek']; ?></b></h5>
          <hr>
          <div class="col-md-12">
            <div class="row">
              <input type="number" name="stok" id="inp_stok" style="display: none;" value="<?php echo number_format($brg['stok']); ?>">
              <a class="btn btn-default" onclick="min_jml(1)"><i class="fa fa-minus"></i></a>
              <input type="number" class="form-control" name="jml" id="jml" value="1" style="width: 50px;text-align: center;">
              <a class="btn btn-default" onclick="plus_jml(1)"><i class="fa fa-plus"></i></a>
            </div>
          </div>
          <div>
            <br>
            <button type="submit" class="btn btn-lg btn-success col-md-5"><i class="fa fa-shopping-cart"></i> Tambah</button>
          </form>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <hr>
        <h4><b>Deskripsi</b></h4>
        <p><?php echo $brg['deskripsi']; ?></p>
      </div>
</div>

<script type="text/javascript">
  function set_img(a){
    document.getElementById('main_img').style.backgroundImage = "url(<?php echo base_url(); ?>/assets/doc/"+a+")";
  }
  function set_stok(a,b){
    $('#stok').html(a)
    var stok = document.getElementById('inp_stok').value = a;

  }
  function plus_jml(a){
    var jml = document.getElementById('jml').value;
    var stok = document.getElementById('inp_stok').value;
    var val = (parseInt(jml) + parseInt(a));
    if (val > stok) {
      var jm = stok
    }else{
      var jm = val
    }
    console.log(stok)
    document.getElementById('jml').value = jm;

  }
  function min_jml(a){
    var jml = document.getElementById('jml').value;
    var val = (parseInt(jml) - parseInt(a));

    if (val < 1) {
      var jm = 1
    }else{
      var jm = val
    }
    document.getElementById('jml').value = jm;

  }
</script>