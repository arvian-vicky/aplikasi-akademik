<?php
$id = $this->session->userdata("id");
$data_siswa = $this->db->query("SELECT foto FROM mst_siswa WHERE id_siswa = '$id'")->row();
if (!empty($data_siswa->foto)) {
  $foto = base_url() . 'upload/siswa/' . $data_siswa->foto;
} else {
  $foto = base_url() . 'upload/logoasis.png';
}
?>


<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $foto; ?>" class="img-responsive" style="width:50px;height:50px;" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata("nama"); ?></p>
        <p><?php echo ucfirst($this->session->userdata("hak_akses")); ?></p>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU NAVIGASI</li>
      <li>
        <a href="<?php echo base_url(); ?>">
          <i class="fa fa-dashboard"></i> <span>Home</span>
        </a>
      </li>

      <?php if ($this->session->userdata("hak_akses") == 'admin') { ?>

        <li class="<?php if ($this->uri->segment(1) == 'pengguna') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'pengguna') echo 'menu-open'; ?>">
          <a href="#">
            <i class="fa fa-user"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>pengguna/guru"><i class="fa fa-angle-double-right"></i> Guru</a></li>
            <li><a href="<?php echo base_url(); ?>pengguna/kepala_sekolah"><i class="fa fa-angle-double-right"></i> Kepala Sekolah</a></li>
            <li><a href="<?php echo base_url(); ?>pengguna/staff"><i class="fa fa-angle-double-right"></i> Staff</a></li>
          </ul>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'master') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'master') echo 'menu-open'; ?>">
          <a href="#">
            <i class="fa fa-hdd-o"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>master/tahun_ajaran"><i class="fa fa-angle-double-right"></i> Tahun Ajaran</a></li>
            <li><a href="<?php echo base_url(); ?>master/jurusan"><i class="fa fa-angle-double-right"></i> Jurusan</a></li>
            <li><a href="<?php echo base_url(); ?>master/kelas"><i class="fa fa-angle-double-right"></i> Kelas</a></li>
            <li><a href="<?php echo base_url(); ?>master/kelompok_pelajaran"><i class="fa fa-angle-double-right"></i> Kelompok Pelajaran</a></li>
            <li><a href="<?php echo base_url(); ?>master/mapel"><i class="fa fa-angle-double-right"></i> Mata Pelajaran</a></li>
            <li><a href="<?php echo base_url(); ?>master/predikat"><i class="fa fa-angle-double-right"></i> Rentang Nilai / Predikat</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>siswa/siswa">
            <i class="fa fa-users"></i> <span> Siswa</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>master/walikelas">
            <i class="fa fa-users"></i> <span> Wali Kelas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>siswa/pindah_kelas">
            <i class="fa fa-book"></i> <span> Pindah/Kenaikan Kelas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>absen">
            <i class="fa fa-calendar"></i> <span> Absen Siswa</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran">
            <i class="fa fa-calendar"></i> <span>Jadwal Pelajaran</span>
          </a>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'nilai') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'nilai') echo 'menu-open'; ?>">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Input Nilai Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>nilai/nilai_harian"><i class="fa fa-angle-double-right"></i> Nilai Harian</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_uts"><i class="fa fa-angle-double-right"></i> Nilai UTS</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_prestasi"><i class="fa fa-angle-double-right"></i> Nilai Prestasi</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_ekstrakulikuler"><i class="fa fa-angle-double-right"></i> Nilai Ekstrakulikuler</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_capaian_hasil_belajar"><i class="fa fa-angle-double-right"></i> Nilai Capaian Hasil Belajar</a></li>
            <li><a href="<?php echo base_url(); ?>nilai/nilai_raport"><i class="fa fa-angle-double-right"></i> Nilai Raport</a></li>
          </ul>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'cetak') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'cetak') echo 'menu-open'; ?>">
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
      <?php } else { ?>
        <li>
          <a href="<?php echo base_url(); ?>siswa/siswa">
            <i class="fa fa-users"></i> <span> Siswa</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>master/walikelas">
            <i class="fa fa-users"></i> <span> Wali Kelas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>siswa/pindah_kelas">
            <i class="fa fa-book"></i> <span> Pindah/Kenaikan Kelas</span>
          </a>
        </li>
      <?php } ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>