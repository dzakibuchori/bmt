<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-3">
	<a href="<?php echo base_url('Nasabah/tambah'); ?>">
          <button class="form-control btn btn-primary">
		  <i class="glyphicon glyphicon-plus-sign"></i> Tambah Anggota</button>
      </a>
    </div>
	<div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-nasabah">
		<i class="glyphicon glyphicon-plus-sign"></i> Anggota Kolektif</button>
    </div>
  
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nasabah ID</th>
          <th>Nama Nasabah</th>
          <th>Majelis</th>
          <th>Petugas</th>
		  <th>Sektor Usaha</th>
          <th>Kantor</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-nasabah">
        
      </tbody>
    </table>
  </div>
</div>
