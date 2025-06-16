<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Pengguna</a></li>
        <li class="active"><?php echo $judul; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box">
						<div class="box-header">
              <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>pengguna/kepala_sekolah_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatb" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nip</th>
									<th>Nik</th>
                  <th>Nama </th>
									<th>No Handphone</th>
									<th>Status</th>
									<th></th>
                </tr>
                </thead>
                <tbody>
									<?php
									$no = 1;
									foreach($kepala_sekolah->result_array() as $data) { ?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $data['nip']; ?></td>
											<td><?php echo $data['nik']; ?></td>
											<td><?php echo $data['nama_kepala_sekolah']; ?></td>
											<td><?php echo $data['hp']; ?></td>
                      <td style="text-align:center;"><?php
                            if($data['aktif_kepala_sekolah'] == '1') {
                              echo '<label class="label label-success">AKTIF</label>';
                            }  else {
                              echo '<label class="label label-default">TIDAK AKTIF</label>';
                            }
                          ?>
                      </td>
                      <td style="text-align:center;">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url().'pengguna/kepala_sekolah_detail/'.$data['nip']; ?>"><i class="fa fa-search"> </i> Detail</a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'pengguna/kepala_sekolah_edit/'.$data['id_kepala_sekolah']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
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