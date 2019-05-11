<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
            tampilNasabah();
		
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	
        //Nasabah
        function tampilNasabah(){
            $.get('<?php echo base_url('Nasabah/tampil');?>',function (data){
                    MyTable.fnDestroy();
                    $('#data-nasabah').html(data);
                    refresh();
            });
        }
	
	//button Hapus
	var nasabah_id;
	$(document).on("click", ".konfirmasiHapus-nasabah", function() {
		nasabah_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataNasabah", function() {
		var id = nasabah_id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('nasabah/deleteAnggota'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})
	
	
</script>