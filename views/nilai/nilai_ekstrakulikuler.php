<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list-alt"></i> Nilai</a></li>
        <li class="active"><?php echo $judul; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box">
			<div class="box-header">
              <p>Silahkan Pilih Kelas </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatb" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($walikelas->num_rows() > 0) { 
                    $no = 1;
					foreach($walikelas->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['tahun_ajaran']; ?></td>
                        
                      <td style="text-align:center;">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'nilai/input_nilai_ekstrakulikuler/'.$data['id_kelas']; ?>"><i class="fa fa-edit"> </i> Kelola Nilai</a>
                      </td>
                    </tr>
				    <?php $no++; } ?>

            <?php } else { echo '<tr><td colspan="9">Silahkan Input Walikelas Terlebih Dahulu</td></tr>'; } ?> 
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