<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Jadwal Pelajaran</a></li>
        <li class="active"><?php echo $judul; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box box-success">
			<div class="box-header">
                <div class="row">
                    <div class="col-xs-8">
                        <form role="form" action="<?php echo base_url(); ?>jadwal_pelajaran/proses_tampil_jadwal_pelajaran" method="post">
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control" name="tahun_ajaran" required>
                                        <?php echo $combo_tahun_ajaran; ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <button class="btn btn-primary" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-4 text-right">
                        <a class="btn btn-success" href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatb" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if(!empty($jadwal_pelajaran)) { 
                    $no = 1;
                      foreach($jadwal_pelajaran->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_mapel']; ?></td>
                        <td><?php echo $data['nama_guru']; ?></td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                        <td><?php echo $data['tahun_ajaran']; ?></td>
                        <td><?php echo $data['semester']; ?></td>
                        <td style="text-align:center;">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'jadwal_pelajaran/jadwal_pelajaran_edit/'.$data['id_jadwal_pelajaran']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                      </td>
                    </tr>
				    <?php $no++; } ?>

                    <?php } else { echo '<tr><td colspan="9">Silahkan Pilih Tahun Ajaran & Semester Terlebih Dahulu</td></tr>'; } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
</div>