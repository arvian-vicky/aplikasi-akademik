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
                <div class="box box-success">

                    <div class="box-body box-profile">

                        <div class="row">
                            <div class="col-xs-3">
                                <?php if (!empty($foto)) { ?>
                                    <img class="img-responsive" src="<?php echo base_url() . 'upload/siswa/' . $foto; ?>" alt="<?php echo $nama_siswa; ?>">
                                <?php } else { ?>
                                    <img class="img-responsive" src="<?php echo base_url() . 'asset/img/noimage.jpg'; ?>" alt="<?php echo $nama_siswa; ?>">
                                <?php } ?>
                            </div>
                            <div class="col-xs-9">

                                <table id="datatb" class="table table-bordered table-hover">
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">Nama Siswa</td>
                                        <td style="width:10px;">:</td>
                                        <td><?php echo $nama_siswa; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelas</td>
                                        <td>:</td>
                                        <td><?php echo $nama_kelas; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $alamat_jalan . ' ' . $kelurahan . ' ' . $kecamatan . ' ' . $kode_pos; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No.Telp Siswa</td>
                                        <td>:</td>
                                        <td><?php echo $hp; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No.Telp Ayah</td>
                                        <td>:</td>
                                        <td><?php echo $no_hp_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No.Telp Ibu</td>
                                        <td>:</td>
                                        <td><?php echo $no_hp_ibu; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="page-header">Daftar Pelanggaran Siswa</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Pelanggaran</th>
                                            <th class="text-center">Poin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $total_poin = 0;
                                        foreach ($pelanggaran_siswa->result_array() as $data) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['tanggal']; ?></td>
                                                <td><?php echo $data['nama_poin_pelanggaran']; ?></td>
                                                <td class="text-right"><?php echo $data['poin_minus']; ?></td>
                                            </tr>
                                            <?php $no++;
                                            $total_poin += $data['poin_minus'];
                                        } ?>
                                        <tr>
                                            <td colspan="3" class="text-center"><b>Total Poin</b></td>
                                            <td class="text-right"><b><?php echo $total_poin; ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>