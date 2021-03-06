<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Tabel Pasien</h2>
        <!-- /. ROW  -->
        <hr />
        <div class="panel panel-default">
          <div class="panel-heading"><b>Daftar Pasien</b></div>
          <div class="panel-body">
            <p><?php echo $this->session->flashdata('pesan')?> </p>
            <div class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('datapasien/cari');?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Cari Pasien" name="cari">
                </div>
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
              </form>
            </div>
            <a href="<?=base_url()?>datapasien/form/add" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NIK PASIEN</th>
                  <th>NAMA PASIEN</th>
                  <th>USERNAME</th>
                  <th>JENIS KELAMIN</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if(empty($qpasien)){ ?>
                <tr>
                  <td colspan="6">Data tidak ditemukan</td>
                </tr>
                <?php }else{
                  $no=0;
                  foreach($qpasien as $rowdata){ $no++;?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$rowdata->NIK_PASIEN?></td>
                  <td><?=$rowdata->NAMA_PASIEN?></td>
                  <td><?=$rowdata->USERNAME?></td>
                  <td><?=$rowdata->JENIS_KELAMIN_PASIEN?></td>
                  <td>
                  <a href="<?=base_url()?>datapasien/form/edit/<?=$rowdata->NIK_PASIEN?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> 
                  <a href="<?=base_url()?>datapasien/detail/<?=$rowdata->NIK_PASIEN?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a> 
                  <a href="<?=base_url()?>datapasien/hapus/<?=$rowdata->NIK_PASIEN?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                <?php }}?>
              </tbody>
            </table>
            <center><h4> <?php echo $this->pagination->create_links(); ?></h4></center>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
