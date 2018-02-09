<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Transaksi</h2>
        <!-- /. ROW  -->
        <hr />
        <?php
			if($aksi=='aksi_add'){
			   $ID_TRANSAKSI="";
			   $ID_ANTRIAN=$ID_ANTRIAN;
			   $DIAGNOSA_DOKTER="";
			   $TINDAKAN="";
			   $BIAYA_PERIKSA="";
			   $BIAYA_ADMIN="";
			}else{
			  foreach($qdata as $rowdata){
				$ID_TRANSAKSI=$rowdata->ID_TRANSAKSI;
				$ID_ANTRIAN=$rowdata->ID_ANTRIAN;
				$TGL_PERIKSA=$rowdata->TGL_PERIKSA;
				$DIAGNOSA_DOKTER=$rowdata->DIAGNOSA_DOKTER;
				$TINDAKAN=$rowdata->TINDAKAN;
				$BIAYA_PERIKSA=$rowdata->BIAYA_PERIKSA;
				$BIAYA_ADMIN=$rowdata->BIAYA_ADMIN;
				}
			}
		?>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form transaksi</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>transaksi/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
              <input type="hidden" name="ID_TRANSAKSI" class="form-control" required value="<?php echo $ID_TRANSAKSI?>">
              <input type="hidden" name="ID_ANTRIAN" class="form-control" required value="<?php echo $ID_ANTRIAN?>">
                <?php if ($aksi=='aksi_edit') {?>
                  <tr>
                  <td>Tanggal periksa</td>
                  <td><div class="col-sm-4">
                      <input type="date" name="TGL_PERIKSA" class="form-control" required value="<?php echo $TGL_PERIKSA?>">
                    </div></td>
                </tr>
                <?php }
                ?>
                
                <tr>
                  <td>Diagnosa Dokter</td>
                  <td><div class="col-sm-6">
                    <textarea name="DIAGNOSA_DOKTER" class="form-control" required><?php echo $DIAGNOSA_DOKTER?></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td>Tindakan</td>
                  <td><div class="col-sm-6">
                      <textarea name="TINDAKAN" class="form-control" required><?php echo $TINDAKAN?></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td>Biaya Admin</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="BIAYA_ADMIN" class="form-control" required value="<?php echo $BIAYA_ADMIN?>">
                    </div></td>
                </tr>
                <tr>
                  <td>Biaya Periksa</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="BIAYA_PERIKSA" class="form-control" required value="<?php echo $BIAYA_PERIKSA?>">
                    </div></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" class="btn btn-success" value="Simpan">
                    <button><a href="javascript:window.history.go(-1);" class="btn btn-sm"><i class="glyphicon glyphicon-repeat"></i> Kembali</a> </button></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
