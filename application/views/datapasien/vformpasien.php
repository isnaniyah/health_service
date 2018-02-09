<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Pasien</h2>
        <!-- /. ROW  -->
        <hr />
        <?php
			if($aksi=='aksi_add'){
			   	$nik_pasien="";
				$id_pekerjaan="";
				$nama_pasien="";
				$username="";
			   	$password="";
				$no_telp_pasien="";
			   	$jenis_kelamin_pasien="";
				$gol_darah="";
			   	$alamat="";
				$tgl_lahir="";
			   	$status="";
			}else{
			  foreach($qdata as $rowdata){
				$nik_pasien=$rowdata->NIK_PASIEN;
				$id_pekerjaan=$rowdata->ID_PEKERJAAN;
				$nama_pasien=$rowdata->NAMA_PASIEN;
				$username=$rowdata->USERNAME;
				$no_telp_pasien=$rowdata->NO_TELP_PASIEN;
				$jenis_kelamin_pasien=$rowdata->JENIS_KELAMIN_PASIEN;
				$gol_darah=$rowdata->GOL_DARAH;
				$alamat=$rowdata->ALAMAT;
				$tgl_lahir=$rowdata->TGL_LAHIR;
				$status=$rowdata->STATUS;
			  }
			}
		?>
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form Register Pasien</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>datapasien/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <tr>
                  <td>NIK PASIEN</td>
                  <td><div class="col-sm-4">
                      <input <?php if($aksi=="aksi_edit"){echo 'readonly="readonly"';}?> type="text" name="NIK_PASIEN" class="form-control"  value="<?php echo $nik_pasien?>">
                    </div></td>
                </tr>
                <tr>
                  <td>NAMA PASIEN</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NAMA_PASIEN" class="form-control" required value="<?php echo $nama_pasien?>">
                    </div></td>
                </tr>
                <tr>
                  <td>USERNAME</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="USERNAME" class="form-control" required value="<?php echo $username?>">
                    </div></td>
                </tr>
                <?php if($aksi == 'aksi_add'){?>
                <tr>
                  <td>PASSWORD</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="PASSWORD" class="form-control"  value="<?php echo $password?>">
                    </div></td>
                </tr>
                  <?php }?>
                <tr>
                  <td>PEKERJAAN</td>
                  <td><div class="col-sm-4">
                      <select class="form-control" name="ID_PEKERJAAN" required >
                        <option></option>
                        <?php
                    foreach ($qpekerjaan as $row) {
                      echo '<option value="'.$row->ID_PEKERJAAN.'"';
                      if($aksi == "aksi_edit"){ if ($id_pekerjaan == $row->ID_PEKERJAAN) {
                        echo "selected";
                      }}
                      echo '>'.$row->NAMA_PEKERJAAN.'</option>';
                    }
                   ?>
                      </select>
                    </div></td>
                </tr>
                <tr>
                  <td>NO TELP</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NO_TELP_PASIEN" class="form-control" required value="<?php echo $no_telp_pasien?>">
                    </div></td>
                </tr>
                <tr>
                  <td>JENIS KELAMIN</td>
                  <td><div class="col-sm-4">
                    <select class="form-control" name="JENIS_KELAMIN_PASIEN" required>
                      <option></option>
                      <option value="Laki-laki" <?php if($aksi == "aksi_edit"){if($jenis_kelamin_pasien == "Laki-laki"){echo"selected";}}?>>Laki-laki</option>
                      <option value="Perempuan"<?php if($aksi == "aksi_edit"){if($jenis_kelamin_pasien == "Perempuan"){echo"selected";}}?>>Perempuan</option>
                    </select>
                    </div></td>
                </tr>
                <tr>
                  <td>GOL DARAH</td>
                  <td><div class="col-sm-4">
                  <select class="form-control" name="GOL_DARAH" required>
                    <option></option>
                    <option value="A" <?php if($aksi == "aksi_edit"){if($gol_darah == "A"){echo"selected";}}?>>A</option>
                    <option value="B"<?php if($aksi == "aksi_edit"){if($gol_darah == "B"){echo"selected";}}?>>B</option>
                    <option value="O"<?php if($aksi == "aksi_edit"){if($gol_darah == "O"){echo"selected";}}?>>O</option>
                    <option value="AB"<?php if($aksi == "aksi_edit"){if($gol_darah == "AB"){echo"selected";}}?>>AB</option>
                  </select>
                    </div></td>
                </tr>
                <tr>
                  <td>ALAMAT</td>
                  <td><div class="col-sm-5">
                  <textarea name="ALAMAT" class="form-control"><?php echo $alamat?></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td>TANGGAL LAHIR</td>
                  <td><div class="col-sm-4">
                      <input type="date" name="TGL_LAHIR" class="form-control" required value="<?php echo $tgl_lahir?>">
                    </div></td>
                </tr>
                <tr>
                  <td>STATUS</td>
                  <td><div class="col-sm-4">
                  <select class="form-control" name="STATUS" required>
                      <option></option>
                      <option value="Belum Menikah" <?php if($aksi == "aksi_edit"){if($status == "Belum Menikah"){echo"selected";}}?>>Belum Menikah</option>
                      <option value="Menikah"<?php if($aksi == "aksi_edit"){if($status == "Menikah"){echo"selected";}}?>>Menikah</option>
                    </select>
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
  
