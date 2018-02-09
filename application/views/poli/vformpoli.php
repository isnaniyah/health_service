<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Poli</h2>
        <!-- /. ROW  -->
        <hr />
        <?php
			if($aksi=='aksi_add'){
			   $id_poli="";
				$nama_poli="";
			}else{
			  foreach($qdata as $rowdata){
				$id_poli=$rowdata->ID_POLI;
				$nama_poli=$rowdata->NAMA_POLI;
			  }
			}
		?>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form Poli</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>poli/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <tr>
                      <input type="hidden" name="ID_POLI" class="form-control"  readonly="readonly"  value="<?php echo $id_poli?>">
                </tr>
                <tr>
                  <td>NAMA POLI</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NAMA_POLI" class="form-control" required value="<?php echo $nama_poli?>">
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
