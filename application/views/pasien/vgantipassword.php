<?php $this->load->view('pasien/home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form PASIEN</h2>
        <!-- /. ROW  -->
        <hr />
        <?php
			if($aksi=='aksi_add'){
			   $NIK_PASIEN="";
			   $username="";
			   $password="";
			}else{
			  foreach($qdata as $rowdata){
				$NIK_PASIEN=$rowdata->NIK_PASIEN;
				$username=$rowdata->USERNAME;
				$password=$rowdata->PASSWORD;
				}
			}
		?>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form PASIEN</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>pasien/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <tr>
                  <td>ID PASIEN</td>
                  <td><div class="col-sm-6">
                      <input type="text" name="NIK_PASIEN" class="form-control" readonly="readonly" value="<?php echo $NIK_PASIEN?>">
                    </div></td>
                </tr>
                <tr>
                  <td>USERNAME</td>
                  <td><div class="col-sm-6">
                      <input type="text" name="USERNAME" class="form-control" readonly="readonly" value="<?php echo $username?>">
                    </div></td>
                </tr>
                <?php if($aksi=='aksi_edit'){?>
                <tr>
                  <td>Kata Sandi Sebelumnya<br></td>
                  <td><div class="col-sm-5">
                      <input type="password" name="PASSWORD_LAMA" class="form-control" required>
                      <input type="hidden" name="PASSWORD_ACC" class="form-control" value="<?php echo $password ?>">
                    </div></td>
                </tr>
                <?php } ?>
                <tr>
                  <td>Kata Sandi Baru
                    <?php if($aksi=='aksi_edit'){ echo 'Baru'; }?></td>
                  <td><div class="col-sm-4">
                      <input type="password" name="pass" class="form-control" required>
                    </div></td>
                </tr>
                <tr>
                  <td>Konfirmasi Kata Sandi Baru</td>
                  <td><div class="col-sm-4">
                      <input type="password" name="KONFIRMASI_PASSWORD" class="form-control" required>
                    </div></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" class="btn btn-success" value="Simpan">
                    <button type="reset" class="btn btn-default">Reset</button></td>
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
