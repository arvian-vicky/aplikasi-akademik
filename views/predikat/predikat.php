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
                <p style="color:red;">Klik Pada Kolom Nilai Untuk Melakukan Penginputan, kemudian tekan <b>"Enter" atau "Tab"</b> untuk menyimpan nilai</p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data-edit" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Dari Nilai</th>
                  <th>Sampai Nilai</th>
                  <th>Grade</th>
                  <th>Keterangan</th>
                  <th style="display:none;">ID</th>
                </tr>
                </thead>
                <tbody>
					<?php
					foreach($mapel->result_array() as $data) { ?>
                    <tr id="<?php echo $data['id_predikat']; ?>">
                        <td><?php echo $data['dari_nilai']; ?></td>
                        <td><?php echo $data['sampai_nilai']; ?></td>
                        <td><?php echo $data['grade']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td style="display:none;"><?php echo $data['id_predikat']; ?></td>
                    </tr>
			    <?php  } ?>
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
      identifier: [4, 'id_predikat'],                    
      editable: [[0, 'dari_nilai'],[1, 'sampai_nilai']]
    },
    hideIdentifier: true,
    url: '<?php echo base_url(); ?>master/predikat_save',
	onSuccess: function(data) {   
        //window.location.reload();
	}
});
</script>