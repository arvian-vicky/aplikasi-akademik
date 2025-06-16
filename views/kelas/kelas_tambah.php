<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
        <li><a href="<?php echo base_url(); ?>master/kelas"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box">
                    <form role="form" action="<?php echo base_url(); ?>master/kelas_save" method="post">


					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					      <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Kode kelas</label>
                                        <input type="text" class="form-control" name="kode_kelas" value="<?php echo $kode_kelas; ?>" required>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Nama kelas</label>
                                        <input type="text" class="form-control" name="nama_kelas" value="<?php echo $nama_kelas; ?>" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="aktif_kelas"  required>
                                            <option value="1" <?php if($aktif_kelas == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_kelas == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>master/kelas"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>