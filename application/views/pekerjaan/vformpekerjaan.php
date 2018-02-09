<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Pekerjaan</h2>
        <!-- /. ROW  -->
        <hr />
        <?php
			if($aksi=='aksi_add'){
			   $id_pekerjaan="";
				$nama_pekerjaan="";
			}else{
			  foreach($qdata as $rowdata){
				$id_pekerjaan=$rowdata->ID_PEKERJAAN;
				$nama_pekerjaan=$rowdata->NAMA_PEKERJAAN;
			  }
			}
		?>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form Pekerjaan</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>pekerjaan/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <tr>
                      <input type="hidden" name="ID_PEKERJAAN" class="form-control"  readonly="readonly"  value="<?php echo $id_pekerjaan?>">
                </tr>
                <tr>
                  <td>NAMA PEKERJAAN</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NAMA_PEKERJAAN" class="form-control" required value="<?php echo $nama_pekerjaan?>">
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
