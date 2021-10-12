  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item f-color1"><a href="<?php echo base_url(); ?>">Barang</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-dropbox mr-1 f-color1"></i>
                  Data Barang
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-6">
                  <form method="post" action="<?php echo base_url(); ?>simpan-barang" enctype='multipart/form-data'>
                     <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="rel_id" class="form-control" value="<?php echo $brg['id_related'] ?>" style="display: none;">
                      <input type="text" name="id" class="form-control" value="<?php echo $brg['id'] ?>" style="display: none;">
                      <input type="text" name="nama" class="form-control" value="<?php echo $brg['nama'] ?>">
                     </div>
                     <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="number" name="harga" class="form-control" value="<?php echo $brg['harga'] ?>">
                     </div>
                     <div class="form-group">
                      <label>Jenis</label>
                      <input type="text" name="jenis" class="form-control" value="<?php echo $brg['jenis'] ?>">
                     </div>
                     <div class="form-group">
                      <label>Brand/Merek</label>
                      <input type="text" name="merek" class="form-control" value="<?php echo $brg['merek'] ?>">
                     </div>
                     <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" rows="5" name="desc" id="desc"><?php echo $brg['deskripsi'] ?></textarea>
                     </div>
                       
                    <div class="col-md-12" style="text-align: right;">
                      <input type="submit" class="btn btn-primary bg-color1" id="btn-submit" name="submit" value="Update" style="color: #fff;border: none;">
                    </div>
                  </form>
                  </div>
                  <div class="col-xl-6">
                   <!--  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Gambar Utama</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>assets/doc/<?php echo $brg['img']; ?>" style="width: 100%;">
                      </div>
                      <div class="col-md-4">
                        <input type="file" name="img" class="form-control" id="file">
                      </div>
                    </div> -->
                    <div>
                        <div class="col-md-12">
                          <label>Gambar Produk</label>
                        </div>
                        <div class="row">
                          <?php 
                            foreach ($img as $key) {
                            ?>
                          <a href="<?php echo base_url(); ?>delete-image/<?php echo $key->id; ?>/<?php echo $brg['id_related'] ?>" onclick="return confirm('Hapus image?')">
                          <div style="height: 150px;width: 150px;margin: 10px;background-image: url(<?php echo base_url().'assets/doc/'.$key->img; ?>);background-size: cover;background-size: 130%;background-position: center;background-repeat: no-repeat;border:1px solid #ccc;cursor: pointer;text-align: center;opacity: 0.8;">
                            <i class="fa fa-trash f-color1" style="font-size: 30px;margin: 60px;"></i>
                          </div>
                          </a>
                            <?php
                            }
                           ?>
                          <div class="b-color1" style="background-color: #ccc;height: 150px;width: 150px;margin: 10px;text-align: center;border:1px solid;cursor: pointer;" data-toggle="modal" data-target="#img">
                            <i class="fa fa-plus" style="font-size: 30px;margin: 60px;color: #fff;"></i>
                          </div>
                        </div>
  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <section class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  Stok dan Ukuran
                </h3>
              </div>
              <div class="card-body">
                <a href="" class="btn btn-sm bg-color1" data-toggle="modal" data-target="#stok" style="color: #fff;"><i class="fa fa-plus"></i> Tambah Data</a>
                <hr>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="f-color1">
                      <th>Nama Barang</th>
                      <th style="width: 50px;">Ukuran</th>
                      <th style="width: 50px;">Stok</th>
                      <th style="width: 50px;">Terjual</th>
                      <th style="width: 200px;">Tanggal Input</th>
                      <th style="width: 150px;text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($stok as $key) {
                        ?>
                    <tr>
                      <td><?php echo $brg['nama']; ?></td>
                      <td style="text-align: center;"><?php echo $key->ukuran; ?></td>
                      <td style="text-align: center;"><?php echo number_format($key->stok); ?></td>
                      <td style="text-align: center;"><?php echo number_format($key->terjual); ?></td>
                      <td style="text-align: center;"><?php echo $key->date_create; ?></td>
                      <td style="text-align: center;">
                        <a href="<?php echo base_url(); ?>delete-stok/<?php echo $key->id; ?>/<?php echo $brg['id_related'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('hapus data?')"><i class="fa fa-trash"></i></a>
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
  </div>


  <!-- Modal -->
<div class="modal fade" id="img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-form">Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>simpan-image"  enctype='multipart/form-data'>
        <div class="modal-body">
         <div class="form-group">
          <input type="text" name="id" class="form-control" value="<?php echo $brg['id'] ?>" style="display: none;">
          <input type="text" name="rel_id" class="form-control" value="<?php echo $brg['id_related'] ?>" style="display: none;">
          <input type="file" name="img" class="form-control" id="file">
         </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" id="btn-submit" name="submit" value="Simpan" style="background-color: #ee4d2d;color: #fff;border: none;">
        </div>
      </form>
    </div>
  </div>
</div>


  <!-- Modal -->
<div class="modal fade" id="stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-form">Tambah Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>simpan-stok">
        <div class="modal-body">
         <div class="form-group">
          <input type="text" name="id" class="form-control" value="<?php echo $brg['id'] ?>" style="display: none;">
          <input type="text" name="rel_id" class="form-control" value="<?php echo $brg['id_related'] ?>" style="display: none;">
         </div>
         <div class="form-group">
          <label>Ukuran</label>
          <input type="number" name="ukuran" class="form-control">
         </div>
         <div class="form-group">
          <label>Stok</label>
          <input type="number" name="stok" class="form-control">
         </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" id="btn-submit" name="submit" value="Simpan" style="background-color: #ee4d2d;color: #fff;border: none;">
        </div>
      </form>
    </div>
  </div>
</div>
