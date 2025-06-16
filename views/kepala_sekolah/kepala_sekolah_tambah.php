<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Pengguna</a></li>
        <li><a href="<?php echo base_url(); ?>pengguna/kepala_sekolah"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box">
                    <form role="form" action="<?php echo base_url(); ?>pengguna/kepala_sekolah_save" method="post" enctype="multipart/form-data">

                          <?php if($this->session->flashdata('success')) { ?>
					      <div class="alert alert-success" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <i class="icon icon-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
					      </div>
					      <?php } ?>

					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <i class="icon icon-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					      <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_kepala_sekolah" value="<?php echo $id_kepala_sekolah; ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="number" class="form-control" name="nip" value="<?php echo $nip; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="nik" value="<?php echo $nik; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_kepala_sekolah" value="<?php echo $nama_kepala_sekolah; ?>" required>
                                    </div>
                                </div>
                            </div>
                  
              

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="number" class="form-control" name="hp" value="<?php echo $hp; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>
                            </div>

                         
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto">
                                        <p class="help-block">Format File Harus .jpg atau .png</p>
                                        <?php if(!empty($foto)) { ?>
                                            <img src="<?php echo base_url().'upload/kepala_sekolah/'.$foto; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="aktif_kepala_sekolah"  required>
                                            <option value="1" <?php if($aktif_kepala_sekolah == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_kepala_sekolah == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>pengguna/kepala_sekolah"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>