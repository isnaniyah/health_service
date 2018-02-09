<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Tabel Jadwal Antrian</h2>
        <!-- /. ROW  -->
        <hr />
        <div class="panel panel-default">
          <div class="panel-heading"><b>Daftar Jadwal Antrian</b></div>
          <div class="panel-body">
            <p><?php echo $this->session->flashdata('pesan');
            echo $poli;?> </p>

            <div class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-right" role="search" action="<?=base_url()?>index.php/antrian/antrian_filter/<?=$filter?>" method="get">
              <div class="form-group">
              Filter berdasarkan tanggal :
                      <input type="date" name="TGL_DAFTAR" class="form-control" <?php if (!empty($tanggal)) {?>
                        value = "<?=$tanggal?>"
                      <?php } ?> >
              </div>
              <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-filter"></i>Filter</button>
            </form>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No Antrian</th>
                  <th>Nama Pasien</th>
                  <th>Poli</th>
                  <th>Tanggal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if(empty($qantrian)){ ?>
                <tr>
                  <td colspan="5">Data tidak ditemukan</td>
                </tr>
                <?php }else{
                foreach($qantrian as $rowdata){ ?>
                <tr>
                  <td><?=$rowdata->NO_ANTRIAN?></td>
                  <td><?=$rowdata->NAMA_PASIEN;?></td>
                  <td><?=$rowdata->NAMA_POLI;?></td>
                  <td><?=$rowdata->TGL_DAFTAR?></td>
                  <td><a href="<?=base_url()?>antrian/detail/<?=$rowdata->ID_ANTRIAN?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
                  <?php $cek=0;
                  foreach ($qtransaksi as $key) {
                      if ($key->ID_ANTRIAN == $rowdata->ID_ANTRIAN) { $cek++; }
                    }
                    if ($cek == 0) {?>
                      <a href="<?=base_url()?>transaksi/form/add/<?=$rowdata->ID_ANTRIAN?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Transaksi Poli</a>
                    <?php }?>
                    </td>
                </tr>
                <?php }}?>
              </tbody>
            </table>
            <?php if (!empty($tanggal)) {?>
              <a href="<?=base_url()?>antrian/cetak/<?=$filter?>/<?=$tanggal?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-download-alt"></i></a>  
            <?php }else{ ?>
              <a href="<?=base_url()?>antrian/cetak/<?=$filter?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-download-alt"></i></a>  
              <?php } ?>
            <center><h4> <?php echo $this->pagination->create_links(); ?></h4></center>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
