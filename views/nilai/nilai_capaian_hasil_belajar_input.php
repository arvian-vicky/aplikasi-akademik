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
                        <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>nilai/nilai_capaian_hasil_belajar"><i class="fa fa-arrow-left"> </i> Kembali</a>
                    </div>
                    <div class="col-xs-9 text-right">
                    <p style="color:red;">Klik pada kolom Kegiatan & Keterangan untuk melakukan penginputan, kemudian tekan <b>"Enter" atau "Tab"</b> untuk menyimpan data</p>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data-edit" class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="3"></th>
                        <th style="text-align:center;" colspan="2">Sikap Spiritual</th>
                        <th style="text-align:center;" colspan="2">Sikap Sosial</th>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th style="text-align:center;">Predikat</th>
                        <th style="text-align:center;">Deskripsi</th>
                        <th style="text-align:center;">Predikat</th>
                        <th style="text-align:center;">Deskripsi</th>
                        <th style="display:none;">ID</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($nilai_siswa->num_rows() > 0 ) { 
                    $no = 1;
					foreach($nilai_siswa->result_array() as $data) { ?>
					<tr id="<?php echo $data['id_nilai_capaian_hasil_belajar']; ?>">
                        <td><?php echo $no; ?></td>
						<td><?php echo $data['nis']; ?></td>
						<td><?php echo $data['nama_siswa']; ?></td>
						<td style="text-align:center;"><?php echo $data['spiritual_predikat']; ?></td>
                        <td><?php echo $data['spiritual_deskripsi']; ?></td>
                        <td style="text-align:center;"><?php echo $data['sosial_predikat']; ?></td>
                        <td><?php echo $data['sosial_deskripsi']; ?></td>
                        <td style="display:none;"><?php echo $data['id_nilai_capaian_hasil_belajar']; ?></td>
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



        <div class="modal fade" id="modalAdd">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kategori Nilai</h4>
              </div>
              <form role="form" action="<?php echo base_url(); ?>nilai/kategori_save" method="post">
                <input type="hidden" name="tipe" value="add" readonly>
                <input type="hidden" name="id_jadwal_pelajaran" value="<?php echo $id_jadwal_pelajaran; ?>" readonly>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori Nilai</label>
                        <input type="text" class="form-control" name="kategori" required>
                   </div>
                   <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button  class="btn btn-primary">Simpan Data</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<script type="text/javascript">
$('#data-edit').Tabledit({
    deleteButton: false,
    editButton: false,      
    columns: {
      identifier: [7, 'id_nilai_capaian_hasil_belajar'],                    
      editable: [[3, 'spiritual_predikat'],[4, 'spiritual_deskripsi'],[5, 'sosial_predikat'],[6, 'sosial_deskripsi']]
    },
    hideIdentifier: true,
    url: '<?php echo base_url(); ?>nilai/nilai_capaian_hasil_belajar_save',
	onSuccess: function(data) {   
        //window.location.reload();
	}
});
</script>