<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Dokter</h2>
        <!-- /. ROW  -->
        <hr />
        <?php
			if($aksi=='aksi_add'){
			   $nip_dokter="";
			   $id_poli="";
			   $nama_dokter="";
			   $spesialis="";
			   $alamat_dokter="";
			   $tgl_lahir_dokter="";
			   $jenis_kelamin_dokter="";
			   $no_telp_dokter="";
			}else{
			  foreach($qdata as $rowdata){
				$nip_dokter=$rowdata->NIP_DOKTER;
				$id_poli=$rowdata->ID_POLI;
				$nama_dokter=$rowdata->NAMA_DOKTER;
				$spesialis=$rowdata->SPESIALIS;
				$alamat_dokter=$rowdata->ALAMAT_DOKTER;
				$tgl_lahir_dokter=$rowdata->TGL_LAHIR_DOKTER;
				$jenis_kelamin_dokter=$rowdata->JENIS_KELAMIN_DOKTER;
				$no_telp_dokter=$rowdata->NO_TELP_DOKTER;
				}
			}
		?>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form Dokter</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>dokter/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <tr>
                  <td>NIP DOKTER</td>
                  <td><div class="col-sm-4">
                      <input <?php if($aksi == "aksi_edit"){echo 'readonly="readonly"';}?>type="text" name="NIP_DOKTER" class="form-control" required value="<?php echo $nip_dokter?>">
                    </div></td>
                </tr>
                <tr>
                  <td>POLI</td>
                  <td><div class="col-sm-4">
                      <select class="form-control" name="ID_POLI" required>
                        <option></option>
                        <?php
                    foreach ($poli as $rowpoli) {
                      echo '<option value="'.$rowpoli->ID_POLI.'"';
                      if($aksi=="aksi_edit"){if($id_poli==$rowpoli->ID_POLI) {echo"selected";}};
                      echo '>'.$rowpoli->NAMA_POLI.'</option>';
                    } 
                   ?>
                      </select>
                    </div></td>
                </tr>
                <tr>
                  <td>NAMA DOKTER</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NAMA_DOKTER" class="form-control" required value="<?php echo $nama_dokter?>">
                    </div></td>
                </tr>
                <tr>
                  <td>SPESIALIS DOKTER</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="SPESIALIS" class="form-control" value="<?php echo $spesialis?>">
                    </div></td>
                </tr>
                <tr>
                  <td>ALAMAT</td>
                  <td><div class="col-sm-6">
                  <textarea name="ALAMAT_DOKTER" class="form-control" required><?php echo $alamat_dokter?></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td>TGL LAHIR</td>
                  <td><div class="col-sm-4">
                      <input type="date" name="TGL_LAHIR_DOKTER" class="form-control" required value="<?php echo $tgl_lahir_dokter?>">
                    </div></td>
                </tr>
                <tr>
                  <td>JENIS KELAMIN</td>
                  <td><div class="col-sm-4">
                    <select class="form-control" name="JENIS_KELAMIN_DOKTER" required>
                      <option></option>
                      <option value="Laki-laki" <?php if($aksi == "aksi_edit"){if($jenis_kelamin_dokter == "Laki-laki"){echo"selected";}}?>>Laki-laki</option>
                      <option value="Perempuan"<?php if($aksi == "aksi_edit"){if($jenis_kelamin_dokter == "Perempuan"){echo"selected";}}?>>Perempuan</option>
                    </select>
                    </div></td>
                </tr>
                <tr>
                  <td>NO TELP</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NO_TELP_DOKTER" class="form-control" required value="<?php echo $no_telp_dokter?>">
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
