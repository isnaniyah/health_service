<?php $this->load->view('home');?>
<!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Form Admin</h2>
        <!-- /. ROW  -->
        <hr />
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-default">
          <div class="panel-heading"><b>Detail Admin</b></div>
          <div class="panel-body">
            <?php
				foreach($qadmin as $rowdata){
				$id_admin=$rowdata->ID_ADMIN;
				$nama_admin=$rowdata->NAMA_ADMIN;
				$username=$rowdata->USERNAME;
				$password=$rowdata->PASSWORD;
				}
            ?>
            <!-- Main component for a primary marketing message or call to action -->
            <p> <a href="<?=base_url()?>admin" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a> </p>
            <table class="table table-striped">
              <tr>
                <td>ID ADMIN</td>
                <td><?=$id_admin?></td>
              </tr>
              <tr>
                <td>NAMA ADMIN</td>
                <td><?=$nama_admin?></td>
              </tr>
              <tr>
                <td>USERNAME</td>
                <td><?=$username?></td>
              </tr>
              <tr>
                <td>PASSWORD</td>
                <td><?=$password?></td>
              </tr>
              </tr>
            </table>
          </div>
        </div>
        <!-- /panel -->
      </div>
    </div>
    <!-- /. PAGE INNER  -->
  </div>
</div>
