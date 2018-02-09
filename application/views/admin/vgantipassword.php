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
          <div class="panel-heading"><b>Kelola Data Admin</b></div>
          <div class="panel-body">
            <p><?php echo $this->session->flashdata('pesan')?> </p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID ADMIN</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>AKSI</th>
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
                  <td><?=$rowadmin->PASSWORD?></td>
                  <td>
                 <a href="<?=base_url()?>admin/form/ganti_password/<?=$rowadmin->ID_ADMIN?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> 
                </tr>
                <?php }}?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
  </div>
  <!-- /. PAGE INNER  -->
</div>
