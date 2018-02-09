<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Tabel Admin</h2>
        <!-- /. ROW  -->
        <hr />
        <div class="panel panel-default">
          <div class="panel-heading"><b>Daftar Admin</b></div>
          <div class="panel-body">
            <p><?php echo $this->session->flashdata('pesan')?> </p>
            <div class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('admin/cari');?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Cari Admin" name="cari">
                </div>
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
              </form>
            </div>
            <a href="<?=base_url()?>admin/form/add" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID ADMIN</th>
                  <th>USERNAME</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if(empty($qadmin)){ ?>
                <tr>
                  <td colspan="3">Data tidak ditemukan</td>
                </tr>
                <?php }else{
          $no=0;
          foreach($qadmin as $rowadmin){ $no++;?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$rowadmin->ID_ADMIN?></td>
                  <td><?=$rowadmin->USERNAME?></td>
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
