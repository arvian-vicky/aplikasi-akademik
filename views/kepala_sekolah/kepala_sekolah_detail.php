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
                <div class="box-body box-profile">
                          <?php if($this->session->flashdata('success')) { ?>
					      <div class="alert alert-info" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
					      </div>
					      <?php } ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'upload/kepala_sekolah/'.$foto; ?>" alt="<?php echo $nama_kepala_sekolah; ?>">
                    <table id="datatb" class="table table-bordered table-hover">
                        <tr>
                            <td style="width:200px;font-weight:bold;">NIP</td>
                            <td style="width:10px;">:</td>
                            <td><?php echo $nip; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">NIK</td>
                            <td>:</td>
                            <td><?php echo $nik; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Nama Kepala Sekolah</td>
                            <td>:</td>
                            <td><?php echo $nama_kepala_sekolah; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">No Handphone</td>
                            <td>:</td>
                            <td><?php echo $hp; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Email</td>
                            <td>:</td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Status</td>
                            <td>:</td>
                            <td><?php if($aktif_kepala_sekolah == '1') echo 'AKTIF'; else echo 'TIDAK AKTIF'; ?></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url().'pengguna/kepala_sekolah_edit/'.$id_kepala_sekolah; ?>" class="btn btn-primary btn-block"><b><i class="fa fa-edit"> </i> Ubah Data</b></a>

                    <a href="<?php echo base_url().'pengguna/kepala_sekolah/'; ?>" class="btn btn-success btn-block"><b><i class="fa fa-arrow-left"> </i> Kembali</b></a>
                </div>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>