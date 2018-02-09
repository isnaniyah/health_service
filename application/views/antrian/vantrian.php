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
            <p><?php echo $this->session->flashdata('pesan')?> </p>
            <div class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-right" role="search" action="<?=base_url()?>index.php/antrian/antrian_filter" method="get">
              <div class="form-group">
              Filter berdasarkan Poli : 
                <select class="form-control" name="ID_POLI" required>
                <option></option>
              <?php foreach ($qpoli as $rowdata) {
                echo '<option value="'.$rowdata->ID_POLI.'"';
                echo '>'.$rowdata->NAMA_POLI.'</option>';
                }
                echo '</select>';?>
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
            <a href="<?=base_url()?>antrian/cetak" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-download-alt"></i></a>  
            <center><h4> <?php echo $this->pagination->create_links(); ?></h4></center>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
