<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Jadwal</h2>
        <!-- /. ROW  -->
        <hr />
        <?php
			if($aksi=='aksi_add'){
			   $id_jadwal="";
			   $nip_dokter="";
			   $hari="";
			}else{
			  foreach($qdata as $rowdata){
				$id_jadwal=$rowdata->ID_JADWAL;
				$nip_dokter=$rowdata->NIP_DOKTER;
				$hari=$rowdata->HARI;
				}
			}
		?>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form Jadwal</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>jadwal/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <input type="hidden" name="ID_JADWAL" class="form-control" readonly="readonly" value="<?php echo $id_jadwal?>">
                <tr>
                  <td>NAMA DOKTER</td>
                  <td><div class="col-sm-4">
                      <select class="form-control" name="NIP_DOKTER" required>
                        <option></option>
                        <?php
                    foreach ($dokter as $rowdokter) {
                      echo '<option value="'.$rowdokter->NIP_DOKTER.'"';
                      if($aksi=="aksi_edit"){if($nip_dokter==$rowdokter->NIP_DOKTER) {echo"selected";}};
                      echo '>'.$rowdokter->NAMA_DOKTER.'--'.$rowdokter->NAMA_POLI.'</option>';
                    } 
                   ?>
                      </select>
                    </div></td>
                </tr>
                <tr>
                  <td>HARI</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="HARI" class="form-control" required value="<?php echo $hari?>">
                    </div></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" class="btn btn-success" value="Simpan">
                    <button type="reset" class="btn btn-default">Batal</button></td>
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
