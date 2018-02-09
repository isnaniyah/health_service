<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Detail Transaksi</h2>
        <!-- /. ROW  -->
        <hr />
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Detail Transaksi</b></div>
          <div class="panel-body">
            <?php
				foreach($qtransaksi as $datanya){
            $TGL_PERIKSA =$datanya->TGL_PERIKSA;
            $NAMA_POLI = $datanya->NAMA_POLI;
            $NAMA_PASIEN = $datanya->NAMA_PASIEN;
            $NAMA_DOKTER = $datanya->NAMA_DOKTER;
            $DIAGNOSA_DOKTER = $datanya->DIAGNOSA_DOKTER;
            $TINDAKAN = $datanya->TINDAKAN;
            $BIAYA_ADMIN = $datanya->BIAYA_ADMIN;
            $BIAYA_PERIKSA = $datanya->BIAYA_PERIKSA;
				}
            ?>
            <!-- Main component for a primary marketing message or call to action -->
            <p> <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a> </p>
            <table class="table table-striped">
              <tr>
                <td>Tanggal Pemeriksaan</td>
                <td><?=$TGL_PERIKSA?></td>
              </tr>
              <tr>
                <td>Poli</td>
                <td><?=$NAMA_POLI?></td>
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
                <td>Diagnosa</td>
                <td><?=$DIAGNOSA_DOKTER?></td>
              </tr>
              <tr>
                <td>Tindakan</td>
                <td><?=$TINDAKAN?></td>
              </tr>
              <tr>
                <td>Biaya Admin</td>
                <td><?=$BIAYA_ADMIN?></td>
              </tr>
              <tr>
                <td>Biaya Pemeriksaan</td>
                <td><?=$BIAYA_PERIKSA?></td>
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
