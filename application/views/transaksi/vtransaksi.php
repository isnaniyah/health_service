<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Tabel Jadwal Transaksi</h2>
        <!-- /. ROW  -->
        <hr />
        <div class="panel panel-default">
          <div class="panel-heading"><b>Daftar Jadwal Transaksi</b></div>
          <div class="panel-body">
            <p><?php echo $this->session->flashdata('pesan')?> </p>
            <div class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-right" role="search" action="<?=base_url()?>index.php/transaksi/transaksi_filter" method="get">
              <div class="form-group">
              Filter berdasarkan Poli : 
                <select class="form-control" name="ID_POLI">
                <option value="">--Pilih Poli--</option>
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
                  <th>Tanggal Pemeriksaan</th>
                  <th>Nama Poli</th>
                  <th>NIK Pasien</th>
                  <th>Nama Pasien</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if(empty($qtransaksi)){ ?>
                <tr>
                  <td colspan="5">Data tidak ditemukan</td>
                </tr>
                <?php }else{
          foreach($qtransaksi as $rowdata){ ?>
                <tr>
                  <td><?=$rowdata->TGL_PERIKSA?></td>
                  <td><?=$rowdata->NAMA_POLI;?></td>
                  <td><?=$rowdata->NIK_PASIEN;?></td>
                  <td><?=$rowdata->NAMA_PASIEN?></td>
                  <td><a href="<?=base_url()?>transaksi/detail/<?=$rowdata->ID_TRANSAKSI?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
                      <a href="<?=base_url()?>transaksi/form/edit/<?=$rowdata->ID_TRANSAKSI?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> 
                  </td>
                </tr>
                <?php } }?>
              </tbody>
            </table>
            <a href="<?=base_url()?>transaksi/cetak" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-download-alt"></i></a>  
            <center><h4> <?php echo $this->pagination->create_links(); ?></h4></center>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
