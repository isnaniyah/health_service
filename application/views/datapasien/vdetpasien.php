<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Detail Pasien</h2>
        <!-- /. ROW  -->
        <hr />
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Detail Pasien</b></div>
          <div class="panel-body">
            <?php
    				foreach($qpasien as $rowdata){
              $nik_pasien=$rowdata->NIK_PASIEN;
              $pekerjaan=$rowdata->NAMA_PEKERJAAN;
              $nama_pasien=$rowdata->NAMA_PASIEN;
              $username=$rowdata->USERNAME;
              $no_telp_pasien=$rowdata->NO_TELP_PASIEN;
              $jenis_kelamin_pasien=$rowdata->JENIS_KELAMIN_PASIEN;
              $gol_darah=$rowdata->GOL_DARAH;
              $alamat=$rowdata->ALAMAT;
              $tgl_lahir=$rowdata->TGL_LAHIR;
              $status=$rowdata->STATUS;
            }
            ?>
            <!-- Main component for a primary marketing message or call to action -->
            <p> <a href="<?=base_url()?>datapasien" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a> </p>
            <table class="table table-striped">
              <tr>
                <td>NIK Pasien</td>
                <td><?=$nik_pasien?></td>
              </tr>
              <tr>
                <td>Nama Pasien</td>
                <td><?=$nama_pasien?></td>
              </tr>
              <tr>
                <td>Username</td>
                <td><?=$username?></td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td><?=$pekerjaan?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?=$alamat?></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td><?=$tgl_lahir?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td><?=$jenis_kelamin_pasien?></td>
              </tr>
              <tr>
                <td>Golongan Darah</td>
                <td><?=$gol_darah?></td>
              </tr>
              <tr>
                <td>No. Telepon</td>
                <td><?=$no_telp_pasien?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><?=$status?></td>
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
