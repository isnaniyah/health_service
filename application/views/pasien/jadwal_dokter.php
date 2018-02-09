<?php $this->load->view('pasien/home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Tabel Jadwal Dokter</h2>
        <!-- /. ROW  -->
        <hr />
        <div class="panel panel-default">
          <div class="panel-heading"><b>Daftar Jadwal Dokter</b></div>
          <div class="panel-body">
            <p><?php echo $this->session->flashdata('pesan')?> </p>
            <div class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-right" role="search" action="<?=base_url()?>index.php/pasien/jadwal_filter" method="get">
              <div class="form-group">
              Filter berdasarkan Poli : 
                <select class="form-control" name="ID_POLI">
                <option value="">--Pilih Poli--</option>
              <?php foreach ($filter as $rowdata) {
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
                  <th>NO</th>
                  <th>NAMA DOKTER</th>
                  <th>POLI</th>
                  <th>HARI</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if(empty($qjadwal)){ ?>
                <tr>
                  <td colspan="3">Data tidak ditemukan</td>
                </tr>
                <?php }else{
          $no=0;
          foreach($qjadwal as $rowjadwal){ $no++;?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$rowjadwal->NAMA_DOKTER?></td>
                  <td><?php foreach ($filter as $row) {
                    if ($rowjadwal->ID_POLI == $row->ID_POLI) {
                      echo $row->NAMA_POLI;
                    }
                  }?></td>
                  <td><?=$rowjadwal->HARI?></td>
                </tr>
                <?php }}?>
              </tbody>
            </table>
            <center><h4> <?php echo $this->pagination->create_links(); ?></h4></center>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
