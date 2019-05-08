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
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-lg-4 text-bold">Cari ID Nasabah/Nama
                                Nasabah</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" id="search">
                                    <span class="input-group-btn">
                                        <button class="btn bg-teal" type="button" onclick="cariNasabah()">
											<i class="icon-zoomin3"></i> Cari</button>
                                        <button type="button" class="btn btn-danger legitRipple" id="btnClear">
                                            <i class="icon-close2"></i> Clear</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
					</form>
					<br/>
					
					<div class="form-inline">
						<div class="form-group">
						<select name="majelis" id="majelis" class="form-control">
							<option value="">Pilih Majelis</option>
							<?php
							foreach ($majelis as $row)
							{
								 echo "<option value='".$row->kode_group1."'>".$row->DESKRIPSI_GROUP1."</option>";
							}
							?>
							<option value="0">KEBON KOPI / HEGARMANAH</option>
							<option value="1">Sudah Terdistribusi</option>
						</select>
						</div>
					
						<div class="form-group">
						<select name="petugas" id="petugas" class="form-control">
							<option value="">Pilih Petugas</option>
							<option value="0">MUHAMMAD FAQIH RIJALULHAQ</option>
							<option value="1">Sudah Terdistribusi</option>
						</select>
						</div>
					
						<div class="form-group">
						<select name="sektor_usaha" id="sektor_usaha" class="form-control">
							<option value="">Pilih Sektor Usaha</option>
							<option value="0">HOME INDUSTRI DAN KERAJINAN</option>
							<option value="1">Sudah Terdistribusi</option>
						</select>
						</div>
					
						<div class="form-group">
						<select name="kantor" id="kantor" class="form-control">
							<option value="">Pilih kantor</option>
							<option value="0">Kantor Cabang Kadungora</option>
							<option value="1">Sudah Terdistribusi</option>
						</select>
						</div>
						
						<div class="input-group">
							<span>
								<button class="btn bg-teal" type="button"">
								<i class="icon-zoomin3"></i> Cari</button>
							</span>
							 <span>
								<button type="button" class="btn btn-danger legitRipple" id="btnClear">
								<i class="icon-close2"></i> Clear</button>
							</span>
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

