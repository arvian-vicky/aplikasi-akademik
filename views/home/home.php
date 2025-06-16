<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">No.</th>
              <th>Kelas</th>
              <th>LK</th>
              <th>PR</th>
              <th>Wali Kelas</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data_kelas->result_array() as $data) {
              $get_walikelas = $this->db->query("SELECT nama_guru FROM mst_walikelas 
                                    INNER JOIN mst_guru ON mst_walikelas.id_guru = mst_guru.id_guru 
                                    INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE mst_walikelas.id_kelas = $data[id_kelas] AND mst_walikelas.tahun_ajaran = '$tahun_ajaran'");
              $hitung_pria = $this->db->query("SELECT COUNT(*) as hitung FROM mst_siswa WHERE id_kelas = '$data[id_kelas]' AND jenis_kelamin = 'Laki-Laki'")->row();
              $hitung_wanita = $this->db->query("SELECT COUNT(*) as hitung FROM mst_siswa WHERE id_kelas = '$data[id_kelas]' AND jenis_kelamin = 'Perempuan'")->row();
              if ($get_walikelas->num_rows() > 0) {
                $d_walikelas = $get_walikelas->row();
                $nama_walikelas = $d_walikelas->nama_guru;
              } else {
                $nama_walikelas = "";
              }

            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_kelas']; ?></td>
                <td><?php echo $hitung_pria->hitung; ?></td>
                <td><?php echo $hitung_wanita->hitung; ?></td>
                <td><?php echo $nama_walikelas; ?></td>
              </tr>
            <?php $no++;
            } ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
      <div class="col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text dash-text">Total Guru</span>
              <span class="info-box-number" style="font-size:28px;"><?php echo $hitung_guru; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text dash-text">Alpa</span>
              <span class="info-box-number" style="font-size:28px;"><?php echo $hitung_alpa; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text dash-text">Izin</span>
              <span class="info-box-number" style="font-size:28px;"><?php echo $hitung_izin; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-medkit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text dash-text">Sakit</span>
              <span class="info-box-number" style="font-size:28px;"><?php echo $hitung_sakit; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>


    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Persentase Absensi Siswa</h3>
          </div>
          <div class="box-body">
            <div id="pie-absen" style="background:none;height: 400px; width:100%; margin: 0 auto"></div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Agenda / Catatan</h3>

          </div>
          <div class="box-body">
            <div id="calendar"></div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

      <!-- /.col -->
    </div>
  </section>
</div>

<div class="modal fade in" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo base_url(); ?>app/agenda_save" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addModalLabel">Tambah Catatan / Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="add" value="1">
          <label>Tanggal*</label>
          <p id="labelDate"></p>
          <input type="hidden" name="date" class="form-control" id="inputDate">
          <label>Keterangan*</label>
          <textarea name="info" id="inputDesc" class="form-control"></textarea><br />
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSimpan" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo base_url(); ?>app/agenda_hapus" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Hapus Catatan / Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="idDel">
          <label>Tahun</label>
          <p id="showYear"></p>
          <label>Tanggal</label>
          <p id="showDate"></p>
          <label>Keterangan*</label>
          <p id="showDesc"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'prevYear,nextYear',
    },

    events: "<?php echo base_url(); ?>home/get_calendar",

    dayClick: function(date, jsEvent, view) {

      var tanggal = date.getDate();
      var bulan = date.getMonth() + 1;
      var tahun = date.getFullYear();
      var fullDate = tahun + '-' + bulan + '-' + tanggal;

      $('#addModal').modal('toggle');
      $('#addModal').modal('show');

      $("#inputDate").val(fullDate);
      $("#labelDate").text(fullDate);
      $("#inputYear").val(date.getFullYear());
      $("#labelYear").text(date.getFullYear());
    },

    eventClick: function(calEvent, jsEvent, view) {
      $("#delModal").modal('toggle');
      $("#delModal").modal('show');
      $("#idDel").val(calEvent.id);
      $("#showYear").text(calEvent.year);

      var tgl = calEvent.start.getDate();
      var bln = calEvent.start.getMonth() + 1;
      var thn = calEvent.start.getFullYear();

      $("#showDate").text(tgl + '-' + bln + '-' + thn);
      $("#showDesc").text(calEvent.title);
    }


  });
</script>


<script>
  Highcharts.chart('pie-absen', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      backgroundColor: 'transparent',
      type: 'pie'
    },
    title: {
      text: ''
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: [{
      name: 'Kategori',
      colorByPoint: true,
      data: [{
        name: 'Sakit',
        y: <?php echo $hitung_sakit; ?>
      }, {
        name: 'Izin',
        y: <?php echo $hitung_izin; ?>
      }, {
        name: 'Alpa',
        y: <?php echo $hitung_alpa; ?>
      }]
    }]
  });
</script>