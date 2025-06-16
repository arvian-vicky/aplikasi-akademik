<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
            <li><a href="<?php echo base_url(); ?>absen/index"><?php echo $judul; ?></a></li>
            <li class="active"><?php echo $judul2; ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form role="form" action="<?php echo base_url(); ?>absen/absen_save" method="post">


                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                            </div>
                        <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_absen" value="<?php echo $id_absen; ?>">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <div class="input-group">
                                            <input id="cari-siswa" type="text" class="form-control" autofocus="" name="id_siswa" value="<?php echo $siswa; ?>" placeholder="Cari Siswa" required>
                                            <span class="input-group-btn">
                                                <a class="btn btn-success" href="#">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <select class="form-control" name="keterangan" required>
                                            <option value>Pilih</option>
                                            <option value="SAKIT" <?php if ($keterangan == 'SAKIT') echo 'selected'; ?>>SAKIT</option>
                                            <option value="IZIN" <?php if ($keterangan == 'IZIN') echo 'selected'; ?>>IZIN</option>
                                            <option value="ALPA" <?php if ($keterangan == 'ALPA') echo 'selected'; ?>>ALPA</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Alasan</label>
                                        <input type="text" class="form-control" name="alasan" value="<?php echo $alasan; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Absen</label>
                                        <input type="text" class="form-control tglcalendar" name="tanggal_absen" value="<?php echo $tanggal_absen; ?>" placeholder="Pilih Tanggal" required>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>master/absen"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>

<script>
  $(document).ready(function() {
    $('#cari-siswa').typeahead({
      source: function(query, result) {
        $.ajax({
          url: "<?php echo base_url(); ?>pelanggaran_siswa/ajax_siswa",
          data: 'query=' + query,
          dataType: "json",
          type: "POST",
          success: function(data) {
            result($.map(data, function(item) {
              return item;
            }));
          }
        });
      }
    });
  });
</script>