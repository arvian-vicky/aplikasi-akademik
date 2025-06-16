<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Jadwal Pelajaran</a></li>
        <li><a href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box box-success">
                    <form role="form" action="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran_save" method="post">


					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					      <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_jadwal_pelajaran" value="<?php echo $id_jadwal_pelajaran; ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Mata Pelajaran</label>
                                        <select class="form-control" name="id_mapel"  required>
                                            <?php echo $combo_mapel; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Guru</label>
                                        <select class="form-control select2" name="id_guru"  required>
                                            <?php echo $combo_guru; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" name="id_kelas"  required>
                                            <?php echo $combo_kelas; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <select class="form-control" name="id_tahun_ajaran"  required>
                                           <?php echo $combo_tahun_ajaran; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>