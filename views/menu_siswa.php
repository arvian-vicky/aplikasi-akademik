<?php
$id = $this->session->userdata("id");
$data_siswa = $this->db->query("SELECT foto FROM mst_siswa WHERE id_siswa = '$id'")->row();
if(!empty($data_siswa->foto)) {
  $foto = base_url().'upload/siswa/'.$data_siswa->foto;
} else {
  $foto = base_url().'upload/logoasis.png';
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
      <br>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVIGASI</li>
        <li>
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>siswa/cek_pembayaran">
            <i class="fa fa-money"></i> <span>Cek Pembayaran</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>siswa/cek_poin_pelanggaran">
            <i class="fa fa-balance-scale"></i> <span>Cek Poin Pelanggaran</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>siswa/biodata">
            <i class="fa fa-user"></i> <span>Biodata</span>
          </a>
        </li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>