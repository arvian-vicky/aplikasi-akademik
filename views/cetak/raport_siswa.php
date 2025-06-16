<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box">
			<div class="box-header">
                <div class="row">
                     <div class="col-xs-3">
                        <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>cetak/raport"><i class="fa fa-arrow-left"> </i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($raport_siswa->num_rows() > 0 ) { 
                    $no = 1;
					foreach($raport_siswa->result_array() as $data) { ?>
					          <tr>
                        <td><?php echo $no; ?></td>
						            <td><?php echo $data['nis']; ?></td>
						            <td><?php echo $data['nama_siswa']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td style="text-align:center;">
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/cover'; ?>"><i class="fa fa-print"> </i> Cetak Cover</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal1'; ?>"><i class="fa fa-print"> </i> Cetak Hal 1</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal2'; ?>"><i class="fa fa-print"> </i> Cetak Hal 2</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal3'; ?>"><i class="fa fa-print"> </i> Cetak Hal 3</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal4'; ?>"><i class="fa fa-print"> </i> Cetak Hal 4</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal5'; ?>"><i class="fa fa-print"> </i> Cetak Hal 5</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal6'; ?>"><i class="fa fa-print"> </i> Cetak Hal 6</a>
                        </td>
                    </tr>
				    <?php  $no++; } ?>

                    <?php } else { echo '<tr><td colspan="9">Data Tidak Ditemukan</td></tr>'; } ?> 
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

