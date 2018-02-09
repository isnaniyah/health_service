<?php $this->load->view('pasien/home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Jadwal</h2>
        <!-- /. ROW  -->
        <hr />  <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
        <?php if ($daftar == 'terdaftar') {
          foreach ($qjadwal as $row) {
            $poli = $row->NAMA_POLI;
            $dokter = $row->NAMA_DOKTER;
          }
          foreach ($qantrian as $row) {
            $no_antrian = $row->NO_ANTRIAN;
            $tgl = $row->TGL_DAFTAR;
          }
          $tanggal = date("d-M-Y", strtotime($tgl));?>
          <div class="panel-heading"><b>Anda sudah Terdaftar</b></div>
          <div class="panel-body">
          <?=$this->session->flashdata('pesan')?>
          <p> Anda sudah terdaftar pada <?php echo $poli?> </p>
          <p> Dengan dokter yang bertanggung jawab adalah dokter <?php echo $dokter?></p>
          <p> Pada tanggal <?php echo $tanggal ?> dengan Nomor Antrian <?php echo $no_antrian?></p>
          </div>
        <?php } else {?>
          <div class="panel-heading"><b>Form Pendaftaran</b></div>
          <div class="panel-body">
            <?=$this->session->flashdata('pesan')?>
            <form action="<?=base_url()?>antrian/form/<?php echo $aksi?>" method="post">
              <table class="table table-striped">
                <tr>
                  <td>Poli</td>
                  <td><div class="col-sm-4">
                      <select class="form-control" name="ID_POLI" required>
                        <option></option>
                        <?php
                    foreach ($qpoli as $row) {
                      echo '<option value="'.$row->ID_POLI.'"';
                      if($aksi=="aksi_edit"){if($nip_dokter==$row->ID_POLI) {echo"selected";}};
                      echo '>'.$row->NAMA_POLI.'</option>';
                    } 
                   ?>
                      </select>
                    </div></td>
                </tr>
                <tr>
                  <td>Tanggal Daftar</td>
                  <td><div class="col-sm-4">
                      <input type="date" name="TGL_DAFTAR" class="form-control" required>
                    </div></td>
                </tr>                
                <tr>
                  <td>Keluhan</td>
                  <td><div class="col-sm-6">
                      <textarea name="KELUHAN" class="form-control" required></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" class="btn btn-success" value="Simpan">
                    <button type="reset" class="btn btn-default">Reset</button></td>
                </tr>
              </table>
            </form>
          </div>
        <?php }
        ?>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
