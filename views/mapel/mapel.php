<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
        <li class="active"><?php echo $judul; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box">
			<div class="box-header">
              <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>master/mapel_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatb" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Mapel</th>
                  <th>Nama Mapel</th>
                  <th>Kelompok Mapel</th>
                  <th>KKM</th>
                  <th>Status</th>
					        <th></th>
                </tr>
                </thead>
                <tbody>
					<?php
					$no = 1;
					foreach($mapel->result_array() as $data) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['kode_mapel']; ?></td>
                <td><?php echo $data['nama_mapel']; ?></td>
						    <td><?php echo $data['nama_kelompok_pelajaran']; ?></td>
                <td><?php echo $data['kkm']; ?></td>
                        <td><?php
                            if($data['aktif_mapel'] == '1') {
                              echo '<label class="label label-success">AKTIF</label>';
                            }  else {
                              echo '<label class="label label-default">TIDAK AKTIF</label>';
                            }
                          ?>
                        </td>
                        <td style="text-align:center;">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url().'master/mapel_edit/'.$data['id_mapel']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                        </td>
                    </tr>
			    <?php $no++; } ?>
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