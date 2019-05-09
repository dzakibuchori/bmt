<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">HALAMAN NASABAH</h5>
            </div>
			
				<div class="panel-body">
					<div class="col-md-2">
						<a href="<?php echo base_url('Nasabah/tambah'); ?>">
						<button class="form-control btn btn-success">
						<i class="glyphicon glyphicon-plus-sign"></i> Tambah Nasabah</button>
						</a>
					</div>
					
					<div class="col-md-2">
						<button class="form-control btn btn-success" data-toggle="modal" data-target="#import-nasabah">
						<i class="glyphicon glyphicon-plus-sign"></i> Nasabah Kolektif</button>
					</div>
					
					<form class="form-horizontal" action="#">
                    
					</form>
					<br/>
					<br/>
					<br/>
					
					<div class="col-md-12">
					<div class="form-inline">
					<form method="get" action="<?php echo base_url("nasabah/filter")?>">
						<div class="form-group">
						<select name="majelis" id="majelis" class="form-control">
							<option selected="selected" disabled="disabled">Pilih Majelis</option>
							<?php
							foreach ($majelis as $row)
							{
								 echo "<option value='".$row->kode_group1."'>".$row->DESKRIPSI_GROUP1."</option>";
							}
							?>
						</select>
						</div>
					
						<div class="form-group">
						<select name="petugas" id="petugas" class="form-control">
							<option selected="selected" disabled="disabled">Pilih Petugas</option>
							<?php
							foreach ($petugas as $row)
							{
								 echo "<option value='".$row->kode_group2."'>".$row->DESKRIPSI_GROUP2."</option>";
							}
							?>
						</select>
						</div>
					
						<div class="form-group">
						<select name="sektor_usaha" id="sektor_usaha" class="form-control">
							<option selected="selected" disabled="disabled">Pilih Sektor Usaha</option>
							<?php
							foreach ($sektor_usaha as $row)
							{
								 echo "<option value='".$row->kode_group3."'>".$row->DESKRIPSI_GROUP3."</option>";
							}
							?>
						</select>
						</div>
					
						<div class="form-group">
						<select name="kantor" id="kantor" class="form-control">
							<option selected="selected" disabled="disabled">Pilih kantor</option>
							<?php
							foreach ($kantor as $row)
							{
								 echo "<option value='".$row->kode_kantor."'>".$row->nama_kantor."</option>";
							}
							?>
						</select>
						</div>
						
							<button class="btn bg-teal" type="submit" id="search"> Cari</button>
							
							<button type="button" class="btn btn-danger legitRipple" id="btnClear">Clear</button>
					</form>	
						</div>
					</div>
					</div>
				</div>
        </div>
    </div>
</div>




<div id="modal_search" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Data Nasabah</h6>
            </div>

            <div class="modal-body">
                <table id="tNasabah" class="table" width="100%">

                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
  $data['judul'] = 'Nasabah';
  $data['url'] = 'Nasabah/import';
  echo show_my_modal('nasabah/import_nasabah', 'import-nasabah', $data);
?>

