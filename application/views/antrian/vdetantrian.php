<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Detail Antrian</h2>
        <!-- /. ROW  -->
        <hr />
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Detail Antrian</b></div>
          <div class="panel-body">
            <?php
				foreach($qantrian as $rowdata){
    				$NO_ANTRIAN=$rowdata->NO_ANTRIAN;
    				$TGL_DAFTAR=$rowdata->TGL_DAFTAR;
    				$TGL_MASUK=$rowdata->TGL_MASUK;
    				$NIK_PASIEN=$rowdata->NIK_PASIEN;
    				$NAMA_PASIEN=$rowdata->NAMA_PASIEN;
    				$NAMA_POLI=$rowdata->NAMA_POLI;
    				$NAMA_DOKTER=$rowdata->NAMA_DOKTER;
    				$KELUHAN=$rowdata->KELUHAN;
				}
            ?>
            <!-- Main component for a primary marketing message or call to action -->
            <p> <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a> </p>
            <table class="table table-striped">
              <tr>
                <td>No Antrian</td>
                <td><?=$NO_ANTRIAN?></td>
              </tr>
              <tr>
                <td>Poli</td>
                <td><?=$NAMA_POLI?></td>
              </tr>
              <tr>
                <td>Pada tanggal</td>
                <td><?=$TGL_DAFTAR?></td>
              </tr>
              <tr>
                <td>Tanggal mendaftar online</td>
                <td><?=$TGL_MASUK?></td>
              </tr>
              <tr>
                <td>NIK Pasien</td>
                <td><?=$NIK_PASIEN?></td>
              </tr>
              <tr>
                <td>Nama Pasien</td>
                <td><?=$NAMA_PASIEN?></td>
              </tr>
              <tr>
                <td>Nama Dokter</td>
                <td><?=$NAMA_DOKTER?></td>
              </tr>
              <tr>
                <td>Keluhan</td>
                <td><?=$KELUHAN?></td>
              </tr>
              </tr>
            </table>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
    <!-- /. PAGE INNER  -->
  </div>
</div>
