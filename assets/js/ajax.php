<script type="text/javascript">
	$(function () {
    $('#btnClear,#btnClearBottom').on('click', function () {
        $('#sDetailNasabah').hide();
        $('#search').val('');
});

function cariNasabah() {
    if ($("#search").val() == "") {
        swal({
            title             : "REQUEST GAGAL",
            text              : 'PENCARIAN BELUM DIISI',
            confirmButtonColor: "#EF5350",
            type              : "error"
        });
        return
    }
    $.ajax({
        type      : "POST",
        url       : "<?php echo base_url();?>Nasabah/searchNasabah",
        data      : {search: $('#search').val()},
        dataType  : "JSON",
        beforeSend: function () {
            $.Loader.Show();
        },
        complete  : function () {
            $.Loader.Dismiss();
        },
        success   : function (data) {
            if (data.response_code == "00") {
                $('#modal_search').modal({show: true});
                DtNasabah(data.response_data);
                var oTable = $('#tNasabah').dataTable();
                oTable.$('td').attr('title', 'Klik Untuk Memilih');
                oTable.$('td').css('cursor', 'pointer');
                oTable.$('td').on("click", function () {
                    var aPos = $('#tNasabah').dataTable().fnGetPosition(this);
                    var aData = $('#tNasabah').dataTable().fnGetData(aPos[0]);
                    $('#search').val(aData.nasabah_id);
                });
            } else {
                $('#sDetailNasabah').hide();
                ShowMessage(data.response_message, 'REQUEST GAGAL', 'danger');
            }
        }, error  : function (x, t, m) {
            if (t === "timeout") {
                ShowMessage('Tidak Bisa Melakukan Transaksi, Koneksi Jaringan Timeout', 'REQUEST GAGAL', 'danger');
            } else {
                ShowMessage('Tidak Bisa Melakukan Transaksi, Koneksi Jaringan Timeout', 'REQUEST GAGAL', 'danger');
            }
        }
    });
}

function DtNasabah(data) {
    $('#tNasabah').DataTable({
        aaData   : data,
        autoWidth: false,
        dom      : '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language : {
            search           : '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu       : '<span>Show:</span> _MENU_',
            paginate         : {'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;'}
        },
        aoColumns: [
            {
                "sTitle"   : "Nasabah ID",
                "mDataProp": "nasabah_id"
            },
            {
                "sTitle"   : "Nama",
                "mDataProp": "nama_nasabah"
            },
            {
                "sTitle"   : "Keterangan",
                "mDataProp": "keterangan"
            },
			{
                "sTitle"   : "Majelis",
                "mDataProp": "kode_group1"
            },
			{
                "sTitle"   : "Petugas",
                "mDataProp": "kode_group2"
            },
			{
                "sTitle"   : "Sektor Usaha",
                "mDataProp": "kode_group3"
            },
            {
                "sTitle"   : "Tanggal Register",
                "mDataProp": "tgl_register"
            },
			{
                "sTitle"   : "Kantor",
                "mDataProp": "kode_kantor"
            },
			{
                "sTitle"   : "Aksi",
                "mDataProp": "nasabah_id",
                "mRender"  : function (data) {
                    return '' +
                        '<button type="button" class="btn btn-warning  btn-icon legitRipple editor_edit">' +
                        '<i class="icon-pencil"></i></button>&nbsp;' +
                        '<button type="button" class="btn btn-danger  btn-icon legitRipple" id="' + data + '" onclick="BtnDelete(this.id)">' +
                        '<i class="icon-trash"></i></button>';
                }
            }
        ],
        bDestroy : true
    });
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width                  : 'auto'
    });
}

function updateAnggota() {
    var nasabah_id = $('nasabah_id').text();
    if (nama_nasabah == '') {
        ShowMessage('DATA BELUM DIISI', 'PERHATIAN', 'danger');
    } else {
        $.ajax({
            type      : "POST",
            url       : "<?php echo base_url();?>client/updateAnggota",
            data      : {nasabah_id: nasabah_id, ..},
            dataType  : "JSON",
            beforeSend: function () {
                $.Loader.Show();
            },
            complete  : function () {
                $.Loader.Dismiss();
            },
            success   : function (data) {
                if (data.response_code == "00") {
                    ShowMessage(data.response_message, 'REQUEST SUKSES', 'success');
                } else {
                    ShowMessage(data.response_message, 'REQUEST GAGAL', 'danger');
                }
            }, error  : function (x, t, m) {
                if (t === "timeout") {
                    ShowMessage('Tidak Bisa Melakukan Transaksi, Koneksi Jaringan Timeout', 'REQUEST GAGAL', 'danger');
                } else {
                    ShowMessage('Tidak Bisa Melakukan Transaksi, Koneksi Jaringan Timeout', 'REQUEST GAGAL', 'danger');
                }
            }
        });

    }


}

function BtnDelete(id) {
    bootbox.confirm("APAKAH ANDA AKAN MENGHAPUS SALAH SATU DATA ?", function (result) {
        if (result == true) {
            $.ajax({
                type      : "POST",
                url       : "<?php echo base_url();?>client/deleteAnggota,
                data      : {id: id},
                dataType  : "JSON",
                beforeSend: function () {
                    $.Loader.Show();
                },
                complete  : function () {
                    $.Loader.Dismiss();
                },
                success   : function (data) {
                    if (data.response_code == '01') {
                        swal({
                            title             : "REQUEST GAGAL",
                            text              : data.response_message,
                            confirmButtonColor: "#EF5350",
                            type              : "error"
                        });
                    } else {
                        loadKomunitas();
                        swal({
                            title             : "REQUEST SUKSES",
                            text              : data.response_message,
                            confirmButtonColor: "#66BB6A",
                            type              : "success"
                        });
                        $('#dlgForm').modal('hide');
                    }
                }, error  : function (x, t, m) {
                    if (t === "timeout") {
                        swal({
                            title             : "REQUEST GAGAL",
                            text              : 'Tidak Bisa Melakukan Transaksi',
                            confirmButtonColor: "#EF5350",
                            type              : "error"
                        });
                    } else {
                        swal({
                            title             : "REQUEST GAGAL",
                            text              : 'Tidak Bisa Melakukan Transaksi',
                            confirmButtonColor: "#EF5350",
                            type              : "error"
                        });
                    }
                }
            });
        }
    });
}
	
</script>