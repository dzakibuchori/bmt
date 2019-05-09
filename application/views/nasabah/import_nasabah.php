<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Pendaftaran Kolektif <?php echo @$judul; ?></h3>

 
  <?php echo form_open_multipart('nasabah/do_upload');?>
    <div class="input-group form-group">
      <span class="input-group-addon" id="inputGroup-sizing-default">
        Upload File
      </span>
      <input type="file"  id="fileUpload" class="form-control" name="userfile" aria-describedby="inputGroup-sizing-default">
    </div>
	
	
    <div class="form-group">
      <div class="col-md-6">
          <button type="submit" value='upload' class="form-control btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Import Data</button>
	  </div>
	  
	  <div class="col-md-6">
          <button type="reset" class="form-control btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Hapus</button>
      </div>
	  <!-- <div class="col-md-12">
          <button type="button" id="preview" value="preview" onclick="preview()" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Preview</button>
      </div>
    </div> -->
<?php echo "</form>"?>
</div>

<script type="text/javascript">
function preview() {
            //Reference the FileUpload element.
            var fileUpload = document.getElementById("fileUpload");

            //Validate whether File is valid Excel file.
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
            if (regex.test(fileUpload.value.toLowerCase())) {
                if (typeof (FileReader) != "undefined") {
                    var reader = new FileReader();

                    //For Browsers other than IE.
                    if (reader.readAsBinaryString) {
                        reader.onload = function (e) {
                            ProcessExcel(e.target.result);
                        };
                        reader.readAsBinaryString(fileUpload.files[0]);
                    } else {
                        //For IE Browser.
                        reader.onload = function (e) {
                            var data = "";
                            var bytes = new Uint8Array(e.target.result);
                            for (var i = 0; i < bytes.byteLength; i++) {
                                data += String.fromCharCode(bytes[i]);
                            }
                            ProcessExcel(data);
                        };
                        reader.readAsArrayBuffer(fileUpload.files[0]);
                    }
                } else {
                    alert("This browser does not support HTML5.");
                }
            } else {
                alert("Please upload a valid Excel file.");
            }
        };
        function ProcessExcel(data) {
            //Read the Excel File data.
            var workbook = XLSX.read(data, {
                type: 'binary'
            });

            //Fetch the name of First Sheet.
            var firstSheet = workbook.SheetNames[0];

            //Read all rows from First Sheet into an JSON array.
            var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);

            //Create a HTML Table element.
            var table = document.createElement("table");
            table.border = "1";

            //Add the header row.
            var row = table.insertRow(-1);

            //Add the header cells.
            var headerCell = document.createElement("TH");
            headerCell.innerHTML = "NASABAH_ID";
            row.appendChild(headerCell);

            headerCell = document.createElement("TH");
            headerCell.innerHTML = "NAMA_NASABAH";
            row.appendChild(headerCell);

            headerCell = document.createElement("TH");
            headerCell.innerHTML = "ALAMAT";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "TELPON";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "jenis_kelamin";
            row.appendChild(headerCell);

			headerCell = document.createElement("TH");
            headerCell.innerHTML = "TEMPATLAHIR";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "TGLLAHIR";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "JENIS_ID";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "NO_ID";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "KETERANGAN";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "kode_group1";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "kode_group2";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "kode_group3";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "KODE_AGAMA";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "DESA";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "KECAMATAN";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "kota_kab";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "propinsi";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "WARIS_NAMA";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "WARIS_ALAMAT";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "WARIS_TELP";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "VERIFIKASI";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "HP";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "TGL_REGISTER";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "NAMA_IBU_KANDUNG";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "kodepos";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "KODE_KANTOR";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "MASA_BERLAKU_KTP";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "nasabah_alternatif";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "lokasi_usaha";
            row.appendChild(headerCell);
			
			headerCell = document.createElement("TH");
            headerCell.innerHTML = "STATUS_NIKAH";
            row.appendChild(headerCell);
			
            //Add the data rows from Excel file.
            for (var i = 0; i < excelRows.length; i++) {
                //Add the data row.
                var row = table.insertRow(-1);

                //Add the data cells.
                var cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].NASABAH_ID;

                cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].NAMA_NASABAH;

                cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].ALAMAT;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].TELPON;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].jenis_kelamin;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].TEMPATLAHIR;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].TGLLAHIR;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].JENIS_ID;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].NO_ID;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].KETERANGAN;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].kode_group1;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].kode_group2;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].kode_group3;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].KODE_AGAMA;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].DESA;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].KECAMATAN;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].kota_kab;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].propinsi;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].WARIS_NAMA;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].WARIS_ALAMAT;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].WARIS_TELP;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].VERIFIKASI;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].HP;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].TGL_REGISTER;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].NAMA_IBU_KANDUNG;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].kodepos;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].KODE_KANTOR;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].MASA_BERLAKU_KTP;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].nasabah_alternatif;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].lokasi_usaha;
				
				cell = row.insertCell(-1);
                cell.innerHTML = excelRows[i].STATUS_NIKAH;
				
            }

            var dvExcel = document.getElementById("dvExcel");
            dvExcel.innerHTML = "";
            dvExcel.appendChild(table);
        };
		
</script>