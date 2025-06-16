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
                        <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>nilai/nilai_uts"><i class="fa fa-arrow-left"> </i> Kembali</a>
                    </div>
                    <div class="col-xs-9 text-right">
                        <p style="color:red;">Klik Pada Kolom Nilai Untuk Melakukan Penginputan, kemudian tekan <b>"Enter" atau "Tab"</b> untuk menyimpan nilai</p>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data-edit" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>KKM</th>
                        <th>Nilai Pengetahuan</th>
                        <th>Nilai Keterampilan</th>
                        <th style="display:none;">ID</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($nilai_siswa->num_rows() > 0 ) { 
                    $no = 1;
					foreach($nilai_siswa->result_array() as $data) { ?>
					            <tr id="<?php echo $data['id_nilai_uts']; ?>">
                        <td><?php echo $no; ?></td>
						            <td><?php echo $data['nis']; ?></td>
						            <td><?php echo $data['nama_siswa']; ?></td>
                        <td><?php echo $data['kkm']; ?></td>
                        <td><?php echo $data['nilai_pengetahuan']; ?></td>
						            <td><?php echo $data['nilai_keterampilan']; ?></td>
                        <td style="display:none;"><?php echo $data['id_nilai_uts']; ?></td>
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




<script type="text/javascript">
$('#data-edit').Tabledit({
    deleteButton: false,
    editButton: false,      
    columns: {
      identifier: [6, 'id_nilai_uts'],                    
      editable: [[4, 'nilai_pengetahuan'],[5, 'nilai_keterampilan']]
    },
    hideIdentifier: true,
    url: '<?php echo base_url(); ?>nilai/nilai_uts_save',
	onSuccess: function(data) {   
        //window.location.reload();
	}
});
</script>