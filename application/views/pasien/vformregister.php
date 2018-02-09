<?php $this->load->view('template');
if ($qpasien !='kosong') {
    $nik_pasien=$NIK_PASIEN;
    $id_pekerjaan=$ID_PEKERJAAN;
    $nama_pasien=$NAMA_PASIEN;
    $username=$USERNAME;
    $no_telp_pasien=$NO_TELP_PASIEN;
    $jenis_kelamin_pasien=$JENIS_KELAMIN_PASIEN;
    $gol_darah=$GOL_DARAH;
    $alamat=$ALAMAT;
    $tgl_lahir=$TGL_LAHIR;
    $status=$STATUS;
}else{
  $nik_pasien="";
  $id_pekerjaan="";
  $nama_pasien="";
  $username="";
  $no_telp_pasien="";
  $jenis_kelamin_pasien="";
  $gol_darah="";
  $alamat="";
  $tgl_lahir="";
  $status="";
}
?>
<!-- /. NAV SIDE  -->
    <div class="row">
      <div class="col-md-12">
        <center><h2>Form Register Pasien</h2></center>
        <!-- /. ROW  -->
        <hr />
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Form Register Pasien</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>register/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <tr>
                  <td>NIK PASIEN</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NIK_PASIEN" class="form-control" placeholder="Isikan No Identitas anda" required value="<?php echo $nik_pasien?>">
                    </div></td>
                </tr>
                <tr>
                  <td>NAMA PASIEN</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NAMA_PASIEN" class="form-control" required placeholder="Isikan nama lengkap anda" value="<?php echo $nama_pasien?>">
                    </div></td>
                </tr>
                <tr>
                  <td>USERNAME</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="USERNAME" class="form-control" required placeholder="Isikan Username yang akan digunakan untuk login" value="<?php echo $username?>">
                    </div><?php echo form_error('USERNAME', '<span class="error">', '</span>'); ?></td>
                </tr>
                <tr>
                  <td>PASSWORD</td>
                  <td><div class="col-sm-4">
                      <input type="password" name="PASSWORD" class="form-control" required placeholder="Isikan Password yang akan anda gunakan pada akun anda">
                    </div><?php echo form_error('CON_PASSWORD', '<span class="error">', '</span>'); ?></td>
                </tr>
                <tr>
                  <td>KONFRIMASI PASSWORD</td>
                  <td><div class="col-sm-4">
                      <input type="password" name="CON_PASSWORD" class="form-control" required placeholder="Isikan Password yang akan anda gunakan pada akun anda">
                    </div><?php echo form_error('CON_PASSWORD', '<span class="error">', '</span>'); ?></td>
                </tr>
                <tr>
                  <td>PEKERJAAN</td>
                  <td><div class="col-sm-4">
                      <select class="form-control" name="ID_PEKERJAAN" required >
                        <option></option>
                        <?php
                    foreach ($qpekerjaan as $row) {
                      echo '<option value="'.$row->ID_PEKERJAAN.'"';
                      if ($row->ID_PEKERJAAN == $id_pekerjaan) {
                        echo 'selected';
                      }
                      echo '>';
                      echo $row->NAMA_PEKERJAAN.'</option>';
                    }
                   ?>
                      </select>
                    </div></td>
                </tr>
                <tr>
                  <td>NO TELP</td>
                  <td><div class="col-sm-4">
                      <input type="text" name="NO_TELP_PASIEN" class="form-control" required placeholder="No telp yang dapat dihubungi" value="<?php echo $no_telp_pasien?>">
                    </div></td>
                </tr>
                <tr>
                  <td>JENIS KELAMIN</td>
                  <td><div class="col-sm-3">
                  <select class="form-control" name="JENIS_KELAMIN_PASIEN" required>
                    <option></option>
                    <option value="Laki-laki" <?php if($jenis_kelamin_pasien == "Laki-laki"){ echo 'selected';}?>>Laki-laki</option>
                    <option value="Perempuan"<?php if($jenis_kelamin_pasien == "Perempuan"){ echo 'selected';}?>>Perempuan</option>
                  </select>
                  </div></td>
                </tr>
                <tr>
                  <td>GOL DARAH</td>
                  <td><div class="col-sm-2">
                  <select class="form-control" name="GOL_DARAH" required>
                    <option></option>
                    <option value="A" <?php if($gol_darah == "A"){ echo 'selected';}?> >A</option>
                    <option value="B" <?php if($gol_darah == "B"){ echo 'selected';}?> >B</option>
                    <option value="O" <?php if($gol_darah == "O"){ echo 'selected';}?> >O</option>
                    <option value="AB" <?php if($gol_darah == "AB"){ echo 'selected';}?> >AB</option>
                  </select>
                  </div></td>
                </tr>
                <tr>
                  <td>ALAMAT</td>
                  <td><div class="col-sm-6">
                      <textarea name="ALAMAT" class="form-control" placeholder="Isikan alamat lengkap anda"><?php echo $alamat?></textarea>
                  </div></td>
                </tr>
                <tr>
                  <td>TANGGAL LAHIR</td>
                  <td><div class="col-sm-3">
                      <input type="date" name="TGL_LAHIR" class="form-control" required value="<?php echo $tgl_lahir?>">
                    </div></td>
                </tr>
                <tr>
                  <td>STATUS</td>
                  <td><div class="col-sm-3">
                    <select class="form-control" name="STATUS" required>
                      <option></option>
                      <option value="Belum Menikah" <?php if($status == "Belum Menikah"){ echo 'selected';}?> >Belum Menikah</option>
                      <option value="Menikah" <?php if($status == "Menikah"){ echo 'selected';}?> >Menikah</option>
                    </select>
                    </div></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" class="btn btn-success" value="Simpan">
                    <a href="<?=base_url()?>welcome_pasien" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  
