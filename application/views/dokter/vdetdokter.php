<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Detail Dokter</h2>
        <!-- /. ROW  -->
        <hr />
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Detail Admin</b></div>
          <div class="panel-body">
            <?php
				foreach($qdokter as $rowdata){
				$nip_dokter=$rowdata->NIP_DOKTER;
				$id_poli=$rowdata->ID_POLI;
				$nama_poli=$rowdata->NAMA_POLI;
				$nama_dokter=$rowdata->NAMA_DOKTER;
				$spesialis=$rowdata->SPESIALIS;
				$alamat_dokter=$rowdata->ALAMAT_DOKTER;
				$tgl_lahir_dokter=$rowdata->TGL_LAHIR_DOKTER;
				$jenis_kelamin_dokter=$rowdata->JENIS_KELAMIN_DOKTER;
				$no_telp_dokter=$rowdata->NO_TELP_DOKTER;
				}
            ?>
            <!-- Main component for a primary marketing message or call to action -->
            <p> <a href="<?=base_url()?>dokter" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a> </p>
            <table class="table table-striped">
              <tr>
                <td>NIP DOKTER</td>
                <td><?=$nip_dokter?></td>
              </tr>
              <tr>
                <td>POLI</td>
                <td><?=$nama_poli?></td>
              </tr>
              <tr>
                <td>NAMA DOKTER</td>
                <td><?=$nama_dokter?></td>
              </tr>
              <tr>
                <td>SPESIALIS</td>
                <td><?=$spesialis?></td>
              </tr>
              <tr>
                <td>ALAMAT</td>
                <td><?=$alamat_dokter?></td>
              </tr>
              <tr>
                <td>TANGGAL LAHIR</td>
                <td><?=$tgl_lahir_dokter?></td>
              </tr>
              <tr>
                <td>JENIS KELAMIN</td>
                <td><?=$jenis_kelamin_dokter?></td>
              </tr>
              <tr>
                <td>NO TELP</td>
                <td><?=$no_telp_dokter?></td>
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
