<?php
$id_guru = $this->session->userdata("id");
$cek = $this->db->query("SELECT nama_kelas FROM mst_walikelas INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE id_guru = $id_guru");
if($cek->num_rows() > 0) {
  $d = $cek->row();
  $walikelas = 'Wali Kelas : '.$d->nama_kelas;
} else {
  $walikelas = '';
}
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("nama"); ?></p>
          <p style="font-size:10px;margin-bottom:3px;"><?php echo $this->session->userdata("jabatan"); ?></p>
          <p style="font-size:10px;"><?php echo $walikelas; ?></p>
        </div>
      </div>
      <br>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVIGASI</li>
        <li>
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>

        <li class="<?php if($this->uri->segment(1) == 'nilai') echo 'active'; ?> treeview <?php if($this->uri->segment(1) == 'nilai') echo 'menu-open'; ?>">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Input Nilai Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>nilai/nilai_harian"><i class="fa fa-angle-double-right"></i> Nilai Harian</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_uts"><i class="fa fa-angle-double-right"></i> Nilai UTS</a></li>
            <?php if($cek->num_rows() > 0) { ?>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_prestasi"><i class="fa fa-angle-double-right"></i> Nilai Prestasi</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_ekstrakulikuler"><i class="fa fa-angle-double-right"></i> Nilai Ekstrakulikuler</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_capaian_hasil_belajar"><i class="fa fa-angle-double-right"></i> Nilai Capaian Hasil Belajar</a></li>
            <?php } ?>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_raport"><i class="fa fa-angle-double-right"></i> Nilai Raport</a></li>
          </ul>
        </li>


      <?php if($cek->num_rows() > 0) { ?>
        <li class="<?php if($this->uri->segment(1) == 'cetak') echo 'active'; ?> treeview <?php if($this->uri->segment(1) == 'cetak') echo 'menu-open'; ?>">
          <a href="#">
            <i class="fa fa-print"></i> <span>Cetak</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>cetak/raport"><i class="fa fa-angle-double-right"></i> Cetak Raport</a></li>
          </ul>
        </li>
      <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>