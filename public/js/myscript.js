console.time()



const swal = $('.swal').data('swal');
const errorswal = $('.errorswal').data('errorswal');
if (swal) {
    Swal.fire({
        text: swal,
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    })
}
if (errorswal) {
    Swal.fire({
        text: errorswal,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-danger"
        }
    })
}





var checkboxHandlerObj = {
    init: function()
    {
        $( '#permissionmenu input:checkbox[class*="parent"]' ).click( checkboxHandlerObj.parentClicked );
        $( '#permissionmenu1 input:checkbox[class*="parent1"]' ).click( checkboxHandlerObj.editparentClicked );
        $( '#permissionmenu input:checkbox[class^="parent_"]' ).click( checkboxHandlerObj.childClicked );
        $( '#permissionmenu1 input:checkbox[class^="parent1_"]' ).click( checkboxHandlerObj.editchildClicked );
    },
    
    parentClicked: function()
    {
        var input = $(this);
        console.log(input);
        if ( input.prop('checked'))
        {
            $( '#permissionmenu input:checkbox[class^="parent_' + $( this ).attr( 'id' ) + '"]' ).prop( 'checked', true );
        }
        else
        {
            $( '#permissionmenu input:checkbox[class^="parent_' + $( this ).attr( 'id' ) + '"]' ).prop( 'checked', false );
        }
    },
    
    childClicked: function()
    {
        var temp = $( this ).attr( 'class' );
        var temp1 = $( this ).attr( 'class' ).split(/[\s_]+|(?=[A-Z])/);
        var parentId = temp1[1];
        if ( $( this ).prop('checked') )
        {
            $( '#' + parentId ).prop( 'checked', true );
        }
        else
        {
            var atLeastOneEnabled = false;
            $( '#permissionmenu input:checkbox[class^="' + temp[0] + '"]' ).each( function() {
                if ( $( this ).prop( 'checked' ) )
                {
                    atLeastOneEnabled = true;
                }
            } );
            if ( !atLeastOneEnabled )
            {
                $( '#' + parentId ).prop('checked', false); ;
            }
        }
    },

    editparentClicked: function()
    {
        var input = $(this);
        console.log(input);
        if ( input.prop('checked'))
        {
            $( '#permissionmenu1 input:checkbox[class^="parent1_' + $( this ).attr( 'id' ) + '"]' ).prop( 'checked', true );
        }
        else
        {
            $( '#permissionmenu1 input:checkbox[class^="parent1_' + $( this ).attr( 'id' ) + '"]' ).prop( 'checked', false );
        }
    },

    editchildClicked: function()
    {
        var temp = $( this ).attr( 'class' );
        var temp1 = $( this ).attr( 'class' ).split(/[\s_]+|(?=[A-Z])/);
        var parentId = temp1[1];
        if ( $( this ).prop('checked') )
        {
            $( '#' + parentId ).prop( 'checked', true );
        }
        else
        {
            var atLeastOneEnabled = false;
            $( '#permissionmenu1 input:checkbox[class^="' + temp[0] + '"]' ).each( function() {
                if ( $( this ).prop( 'checked' ) )
                {
                    atLeastOneEnabled = true;
                }
            } );
            if ( !atLeastOneEnabled )
            {
                $( '#' + parentId ).prop('checked', false); ;
            }
        }
    },
    
};


checkboxHandlerObj.init();

    
if (document.getElementById('table_kategori_obat')) {
        var i=1;
        $("#table_kategori_obat").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '' + document.location.origin + '/Master/listdata_masterkategori/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible" : false,
            }, {
                "targets": [2],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditkategori\" onclick=\"modaleditkategoriobat('" + row[0] + "','" + row[1] + "','" + row[2] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                                  <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletekategoriobat\" onclick=\"modaldeletekategoriobat('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
        });
}
if (document.getElementById('table_jenis_obat')) {
        var i=1;
        $("#table_jenis_obat").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '' + document.location.origin + '/Master/listdata_masterjenis/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible" : false
            }, {
                "targets": [2],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditjenis\" onclick=\"modaleditjenisobat('" + row[0] + "','" + row[1] + "','" + row[2] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                                  <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletejenisobat\" onclick=\"modaldeletejenisobat('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
        });
}
if (document.getElementById('table_satuan')) {
        var i=1;
        $("#table_satuan").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '' + document.location.origin + '/Master/listdata_mastersatuan/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible" : false,
            }, {
                "targets": [2],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditsatuan\" onclick=\"modaleditsatuan('" + row[0] + "','" + row[1] + "','" + row[2] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                                  <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletesatuan\" onclick=\"modaldeletesatuan('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
        });
}

if (document.getElementById('table_obat')) {
        var i=1;
        $('#table_obat tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
        } );
        $("#table_obat").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": '' + document.location.origin + '/Obat/listdata_masterobat/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0,13,14,15],
                "searchable": false,
                "orderable": false,
                "visible": false,
            }, {
                "targets": [7,8,9],
                
                "render": function(data, type, row) {
                    return formatRupiah(data, 'Rp. ');
                },
            }, {
                "targets": [12],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditobat\" onclick=\"modaleditobat('" + row[0] + "','" + row[1] + "','" + row[13] + "','" + row[14] + "','" + row[4] + "','" + row[15] + "','" + row[7] + "','" + row[8] + "','" + row[9] + "','" + row[10] + "','" + row[11] + "','" + row[12] + "');\"   ><i class=\"fas fa-pen-nib\"></i></a>\
                                  <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modalhistoryobat\" onclick=\"modalhistoryobat('" + row[0] + "');\"   ><i class=\"fas fa-history\"></i></a>\
                                "
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
}



if (document.getElementById('table_supplier')) {
        var i=1;
        $('#table_supplier tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
        } );
        $("#table_supplier").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": '' + document.location.origin + '/Master/listdata_mastersupplier/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible" : false,
            },{
                "targets": [6],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditsupplier\" onclick=\"modaleditsupplier('" + row[0] + "','" + row[1] + "','" + row[2] + "','" + row[3] + "','" + row[4] + "','" + row[5] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                                  <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletesupplier\" onclick=\"modaldeletesupplier('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
}

if (document.getElementById('table_customer')) {
        var i=1;
        $('#table_customer tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
        } );
        $("#table_customer").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": '' + document.location.origin + '/Master/listdata_mastercustomer/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible" : false,
            },{
                "targets": [6],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditcustomer\" onclick=\"modaleditcustomer('" + row[0] + "','" + row[1] + "','" + row[2] + "','" + row[3] + "','" + row[4] + "','" + row[5] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                                  <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletecustomer\" onclick=\"modaldeletecustomer('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
}

if (document.getElementById('table_user')) {
        var i=1;
        $('#table_user tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
        } );
        $("#table_user").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": '' + document.location.origin + '/Account/listdata_user/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible" : false,
            }, {
                "targets": [3],
                
                "render": function(data, type, row) {
                    return data['name'];
                },
            }, {
                "targets": [4],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaledituser\" onclick=\"modaledituser('" + row[0] + "','" + row[1] + "','" + row[2] + "','" + row[3]['id'] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                                  <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deleteuser\" onclick=\"modaldeleteuser('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
}

if (document.getElementById('table_roles')) {
    var i=1;
    $("#table_roles").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": '' + document.location.origin + '/Account/listdata_roles/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible" : false,
        }, {
            "targets": [2],
            
            "render": function(data, type, row) {
                var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditroles\" onclick=\"modaleditroles('" + row[0] + "','" + row[1] + "','" + data['description'] + "','" + data['permission_id'] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                              <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deleteroles\" onclick=\"modaldeleteroles('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                return button;
            },
        }, ],
    });
}


if (document.getElementById('table_permissions')) {
    var i=1;
    $("#table_permissions").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": '' + document.location.origin + '/Account/listdata_permissions/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible" : false
        }, {
            "targets": [3],
            
            "render": function(data, type, row) {
                var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditpermissions\" onclick=\"modaleditpermissions('" + row[0] + "','" + row[1] + "','" + row[2] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                              <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletepermissions\" onclick=\"modaldeletepermissions('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                return button;
            },
        }, ],
    });
}

if (document.getElementById('table_pembelian')) {
    $('#table_pembelian tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
    } );
    $("#table_pembelian").DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "order": [[1, 'desc'],['2', 'desc']],
        "ajax": '' + document.location.origin + '/Stok/listdata_pembelian/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible": false,
        }, {
            "targets": [2],
            "render": function(data, type, row) {
                var btn = "<a type=\"button\" class=\"btn-view-detail-pembelian\" id=\"btn-view-detail-pembelian\" data-toggle =\"modal\" data-id =\""+row[0]+"\"  data-target=\"#modaldetailpembelian\" onclick=\"modalviewdetailpembelian('" + row[0] + "');\"  style=\"text-decoration: none;\"  href=\"#\">" + data + "</a>"
                return btn;
            },
        },{
            "targets": [7],
            
            "render": function(data, type, row) {
                if (data == 0) {
                    return "<span class=\"badge badge-success\">Lunas</span>"
                } else {    
                    return "<span class=\"badge badge-danger\">Belum Lunas</span>"
                }
            },
        }, ],
        initComplete: function () {
            // Apply the search

            
            this.api().columns().every( function () {
                var that = this;
                
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
}

if (document.getElementById('table_penjualan')) {



    $('#table_penjualan tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
    } );
   var table =  $("#table_penjualan").DataTable({

        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "order": [[1, 'desc'],[2, 'desc']],
        "ajax": '' + document.location.origin + '/Stok/listdata_penjualan/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible": false,
        }, {
            "targets": [2],
            "render": function(data, type, row) {
                var btn = "<a type=\"button\" class=\"btn-view-detail-penjualan\" data-toggle =\"modal\"  data-target=\"#modaldetailpenjualan\" onclick=\"modalviewdetailpenjualan('" + row[0] + "');\"  style=\"text-decoration: none;\"  href=\"#\">" + data + "</a>"
                return btn;
            },
        }, {
            "targets": [6],
            "render": function(data, type, row) {
                if (data == 0) {
                    return "<span class=\"badge badge-success\">Lunas</span>"
                } else {    
                    return "<span class=\"badge badge-danger\">Belum Lunas</span>"
                }
            },
        }, ],
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
                
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

        }
    });

}

if (document.getElementById('table_pembayarantoko')) {
    $('#table_pembayarantoko tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
    } );
    $("#table_pembayarantoko").DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "order": [[1, 'desc'],['2', 'desc']],
        "ajax": '' + document.location.origin + '/Pembayaran/listdata_pembayarantoko/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible": false,
        },],
        initComplete: function () {
            // Apply the search

            
            this.api().columns().every( function () {
                var that = this;
                
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
}

if (document.getElementById('table_pembayarancustomer')) {
    $('#table_pembayarancustomer tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
    } );
    $("#table_pembayarancustomer").DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "order": [[1, 'desc'], ['0', 'desc']],
        "ajax": '' + document.location.origin + '/Pembayaran/listdata_pembayarancustomer/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "visible": false,
        },],
        initComplete: function () {
            // Apply the search

            
            this.api().columns().every( function () {
                var that = this;
                
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
}

if (document.getElementById('table_cashflow')) {

    $("#table_cashflow").DataTable({
        "scrollX": false,
        "processing": true,
        "serverSide": true,
        "order": [[1, 'desc']],
        "ajax": '' + document.location.origin + '/Kas/listdata_cash/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible": false,
        },{
            "targets": [7],
            
            "render": function(data, type, row) {
                var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditcashflow\" onclick=\"modaleditcashflow('" + row[0] + "','" + row[2] + "','" + row[3] + "','" + row[4] + "','" + row[5] + "','" + row[6] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletecashflow\" onclick=\"modaldeletecashflow('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                return button;
                
            },
        }, ],
        
    });
}

if (document.getElementById('table_bank')) {

    $("#table_bank").DataTable({
        "scrollX": false,
        "processing": true,
        "serverSide": true,
        "order": [[1, 'desc']],
        "ajax": '' + document.location.origin + '/Kas/listdata_bank/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible": false,
        },{
            "targets": [7],
            
            "render": function(data, type, row) {
                var button = "<a role=\"button\"   data-toggle =\"modal\"  data-target=\"#modaleditbankflow\" onclick=\"modaleditbankflow('" + row[0] + "','" + row[2] + "','" + row[3] + "','" + row[4] + "','" + row[5] + "','" + row[6] + "');\"   ><span class=\"badge badge-warning\">Edit</span></a>\
                <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletebankflow\" onclick=\"modaldeletebankflow('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                return button;
                
            },
        }, ],
        
    });
}

if (document.getElementById('table_pembelianlainnya')) {

    $("#table_pembelianlainnya").DataTable({
        "scrollX": false,
        "processing": true,
        "serverSide": false,
        "order": [[1, 'desc']],
        "ajax": '' + document.location.origin + '/Stok/listdata_pembelianlainnya/',
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: "copy",
                exportOptions: {
                    columns: []
                }
            },
            {
                extend: "excel",
                title: "client_side_data"
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ":visible"
                }
            },
            'print'
        ],
        "columnDefs": [{
            "targets": [0],
            "searchable": false,
            "orderable": false,
            "visible": false,
        },{
            "targets": [6],
            
            "render": function(data, type, row) {
                var button = "";
                return button;
                
            },
        }, ],
        
    });
}


$('#btn-lihat-modal-sampah-kategori').on('click', function() {
    
    if ($('#table_sampah_kategori_obat').length) {
        var i=1;
        $("#table_sampah_kategori_obat").DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": '' + document.location.origin + '/Master/listdata_mastersampahkategori/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row) {
                    return i++;
                },
            }, {
                "targets": [2],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/kategoriobat/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletekategoriobat\" onclick=\"modaldeletekategoriobat('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
        });
    }
});

$('#btn-lihat-modal-sampah-jenis').on('click', function() {
    
    if ($('#table_sampah_jenis_obat').length) {
        var i=1;
        $("#table_sampah_jenis_obat").DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": '' + document.location.origin + '/Master/listdata_mastersampahjenis/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row) {
                    return i++;
                },
            }, {
                "targets": [2],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/jenisobat/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletejenisobat\" onclick=\"modaldeletejenisobat('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
        });
    }
});

$('#btn-lihat-modal-sampah-satuan').on('click', function() {
    
    if ($('#table_sampah_satuan').length) {
        var i=1;
        $("#table_sampah_satuan").DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": '' + document.location.origin + '/Master/listdata_mastersampahsatuan/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row) {
                    return i++;
                },
            }, {
                "targets": [2],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/satuan/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletesatuan\" onclick=\"modaldeletesatuan('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
        });
    }
});

// $('#btn-lihat-modal-sampah-obat').on('click', function() {
    
//     if ($('#table_sampah_obat').length) {
//         var i=1;
//         $('#table_sampah_obat tfoot th').each( function () {
//             var title = $(this).text();
//             $(this).html( '<input  class="form-control form-control-solid"  type="text" placeholder="'+title+'" />' );
//         } );
//         $("#table_sampah_obat").DataTable({
//             "scrollX": true,
//             "processing": true,
//             "serverSide": true,
//             "ajax": '' + document.location.origin + '/Obat/listdata_mastersampahobat/',
//             dom: 'Bfrtip',
//             lengthMenu: [
//                 [ 5, 10, 25, 50, -1 ],
//                 [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
//             ],
//             buttons: [
//                 'pageLength',
//                 {
//                     extend: "copy",
//                     exportOptions: {
//                         columns: []
//                     }
//                 },
//                 {
//                     extend: "excel",
//                     title: "client_side_data"
//                 },
//                 {
//                     extend: "pdf",
//                     exportOptions: {
//                         columns: ":visible"
//                     }
//                 },
//                 'print'
//             ],
//             "columnDefs": [{
//                 "targets": [0],
//                 "searchable": false,
//                 "orderable": false,
//                 "render": function(data, type, row) {
//                     return i++;
//                 },
//             }, {
//                 "targets": [2],
                
//                 "render": function(data, type, row) {
//                     return data['kategori_obat'];
//                 },
//             }, {
//                 "targets": [3],
                
//                 "render": function(data, type, row) {
//                     return data['jenis_obat'];
//                 },
//             }, {
//                 "targets": [6],
                
//                 "render": function(data, type, row) {
//                     return data['satuan'];
//                 },
//             }, {
//                 "targets": [12],
                
//                 "render": function(data, type, row) {
//                     var button = "<a role=\"button\" href=\"/restore/obat/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
//                     <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deleteobat\" onclick=\"modaldeleteobat('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
//                     return button;
//                 },
//             }, ],
//             initComplete: function () {
//                 // Apply the search
//                 this.api().columns().every( function () {
//                     var that = this;
     
//                     $( 'input', this.footer() ).on( 'keyup change clear', function () {
//                         if ( that.search() !== this.value ) {
//                             that
//                                 .search( this.value )
//                                 .draw();
//                         }
//                     } );
//                 } );
//             }
//         });
//     }
// });


$('#btn-lihat-modal-sampah-supplier').on('click', function() {
    
    if ($('#table_sampah_supplier').length) {
        var i=1;
        $('#table_sampah_supplier tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input  class="form-control form-control-solid"  type="text" placeholder="'+title+'" />' );
        } );
        $("#table_sampah_supplier").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "ajax": '' + document.location.origin + '/Master/listdata_mastersampahsupplier/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row) {
                    return i++;
                },
            }, {
                "targets": [6],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/supplier/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletesupplier\" onclick=\"modaldeletesupplier('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
    }
});

$('#btn-lihat-modal-sampah-customer').on('click', function() {
    
    if ($('#table_sampah_customer').length) {
        var i=1;
        $('#table_sampah_customer tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input  class="form-control form-control-solid"  type="text" placeholder="'+title+'" />' );
        } );
        $("#table_sampah_customer").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "ajax": '' + document.location.origin + '/Master/listdata_mastersampahcustomer/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row) {
                    return i++;
                },
            }, {
                "targets": [6],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/customer/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletecustomer\" onclick=\"modaldeletecustomer('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
    }
});

$('#btn-lihat-modal-sampah-user').on('click', function() {
    
    if ($('#table_sampah_user').length) {
        var i=1;
        $("#table_sampah_user").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "ajax": '' + document.location.origin + '/Account/listdata_sampahuser/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row) {
                    return i++;
                },
            }, {
                "targets": [3],
                
                "render": function(data, type, row) {
                    return data['name'];
                },
            }, {
                "targets": [4],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/user/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deleteuser\" onclick=\"modaldeleteuser('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
        });
    }
});

$('#btn-lihat-modal-sampah-pembelian').on('click', function() {
    if ($('#table_sampah_pembelian').length) {
        $("#table_sampah_pembelian").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "order": [[1, 'desc'],['2', 'desc']],
            "ajax": '' + document.location.origin + '/Stok/listdata_sampah_pembelian/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible": false,
            }, {
                "targets": [2],
                "render": function(data, type, row) {
                    var btn = "<a type=\"button\" class=\"btn-view-detail-pembelian\" data-toggle =\"modal\"  data-target=\"#modaldetailpembelian\" onclick=\"modalviewdetailpembelian('" + row[0] + "');\"  style=\"text-decoration: none;\"  href=\"#\">" + data + "</a>"
                    return btn;
                },
            },{
                "targets": [7],
                
                "render": function(data, type, row) {
                    if (data == 0) {
                        return "<span class=\"badge badge-success\">Lunas</span>"
                        
                    } else {    
                        return "<span class=\"badge badge-danger\">Belum Lunas</span>"
                    }
                },
            }, {
                "targets": [9],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/pembelian/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>"
                    return button;
                },
            },],

        });
    }
})

$('#btn-lihat-modal-sampah-penjualan').on('click', function() {
    if ($('#table_sampah_penjualan').length) {
        $('#table_sampah_penjualan tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
        } );
        $("#table_sampah_penjualan").DataTable({
    
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "order": [[1, 'desc'],[2, 'desc']],
            "ajax": '' + document.location.origin + '/Stok/listdata_sampah_penjualan/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible": false,
            }, {
                "targets": [2],
                "render": function(data, type, row) {
                    var btn = "<a type=\"button\" class=\"btn-view-detail-penjualan\" data-toggle =\"modal\"  data-target=\"#modaldetailpenjualan\" onclick=\"modalviewdetailpenjualan('" + row[0] + "');\"  style=\"text-decoration: none;\"  href=\"#\">" + data + "</a>"
                    return btn;
                },
            }, {
                "targets": [6],
                "render": function(data, type, row) {
                    if (data == 0) {
                        return "<span class=\"badge badge-success\">Lunas</span>"
                    } else {    
                        return "<span class=\"badge badge-danger\">Belum Lunas</span>"
                    }
                },
            },  {
                "targets": [8],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/penjualan/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>"
                    return button;
                },
            },],
            initComplete: function () {
                // Apply the search
    
                
                this.api().columns().every( function () {
                    var that = this;
                    
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
    }
})


$('#btn-lihat-modal-sampah-pembayaran-toko').on('click', function() {
    if ($('#table_sampah_pembayarantoko').length) {
        $('#table_sampah_pembayarantoko tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
        } );
        $("#table_sampah_pembayarantoko").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "order": [[1, 'desc'],['2', 'desc']],
            "ajax": '' + document.location.origin + '/Pembayaran/listdata_sampah_pembayarantoko/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible": false,
            },{
                "targets": [6],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/pembayarantoko/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletepembayarantoko\" onclick=\"modaldeletepembayarantoko('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
    
                
                this.api().columns().every( function () {
                    var that = this;
                    
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
    }
})

$('#btn-lihat-modal-sampah-pembayaran-customer').on('click', function() {
    if ($('#table_sampah_pembayarancustomer').length) {
        $('#table_sampah_pembayarancustomer tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input class="form-control form-control-solid" type="text" placeholder="'+title+'" />' );
        } );
        $("#table_sampah_pembayarancustomer").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "order": [[1, 'desc'], ['2', 'desc']],
            "ajax": '' + document.location.origin + '/Pembayaran/listdata_sampah_pembayarancustomer/',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible": false,
            },{
                "targets": [6],
                
                "render": function(data, type, row) {
                    var button = "<a role=\"button\" href=\"/restore/pembayarancustomer/"+row[0]+"\" ><span class=\"badge badge-warning\">Restore</span></a>\
                    <a role=\"button\"   data-toggle =\"modal\"  data-target=\"#deletepembayarancustomer\" onclick=\"modaldeletepembayarancustomer('" + row[0] + "');\"   ><span class=\"badge badge-danger\">Delete</span></a>"
                    return button;
                },
            }, ],
            initComplete: function () {
                // Apply the search
    
                
                this.api().columns().every( function () {
                    var that = this;
                    
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
    }
})



$('#modalrekapstok').one('shown.bs.modal', function () {
    $('#obatrekapstok').select2({
        ajax : {
            url : '' + document.location.origin + '/Obat/list_obat/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        },
    })

    document.getElementById('lihat_rekap_stok').addEventListener('click',function(e){
        const tanggal_awal = document.getElementById('tanggal_mulai_stok');
        const tanggal_akhir = document.getElementById('tanggal_akhir_stok');

        data1 = {}
        $.ajax({
            type: 'POST',
            data: {'tanggal_awal' : tanggal_awal.value, 'tanggal_akhir' : tanggal_akhir.value, 'obat_id' :$('#obatrekapstok').val()},
            url: ''+document.location.origin+'/Stok/get_rekap_stok/',
            dataType : 'json',
            success: function(data){
                console.log(data);
                var html = '';
                var j = 1;
                var netto = 0;
                var sub_total = 0;
                var total = 0;
                var stok_awal = parseInt(data.stokawal.stokawal);
                document.getElementById('stok_header').innerHTML = 'Rekap Kartu Stok  '+tanggal_awal.value+' sampai '+tanggal_akhir.value+'';
                document.getElementById('namastokheader').innerHTML = data.stokawal.nama;
                    html += `<div class="row mb-10">
                                <div class="table-responsive card card-flush shadow-sm">
                                    <div class="card-body">
                                        <table class="table table-bordered table-row-bordered gx-7">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-muted">
                                                    <th>Stok Awal</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th >${data.stokawal.stokawal}</th>
                                                </tr>
                                            </thead>
                                        <table>
                                        <table class="table table-bordered table-row-bordered gx-7">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-muted">
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Qty</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                                <tbody ">`;
                    for (let j = 0; j < data.datastok.length; j++) {
                            stok_awal += parseInt(data.datastok[j].qty);             
                            html += '<tr>' +
                                        '<td>' + data.datastok[j].tanggal + '</td>' +
                                        '<td>' + data.datastok[j].kode + '</td>' +
                                        '<td>' + data.datastok[j].qty  + '</td>' +
                                        '<td>' +  stok_awal + '</td>' +
                                    '</tr>';
                    }                                
                    html +=                     `</tbody></table>
                                        <table width="100%" class="">
                                            <tbody>
                                                <tr class="fw-bolder fs-6">
                                                    <td colspan="3" class="text-nowrap align-end">Total Sisa:</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td align="right" colspan="2" class="text-danger fs-3">${stok_awal}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>`;
                
                // document.getElementById('total_periode_kas').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                $('#viewrekapstok').html(html);
                $('#modal_lihat_stok').modal('show');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
            }  
        });
    })
})


$('#modaltambahpembelian').one('shown.bs.modal', function () {
    const tanggalpembelian = document.getElementById('tanggalpembelian');
    const no_notapembelian = document.getElementById('no_notapembelian');
    const supplier = document.getElementById('supplierpembelian');
    const simpan_pembelian = document.getElementById('simpan_pembelian');
    const metodepembayaran = document.getElementById('metodepembayaranpembelian');
    const totalbayar = document.getElementById('totalbayarpembelian');
    const totalkembalian = document.getElementById('totalkembalianpembelian');
    const total = document.getElementById('totalpembelian');
    const moneyinput = document.getElementById('hargapembelian');
    // const qty = document.getElementById('qtypembelian');
    // const diskon = document.getElementById('diskonpembelian');
    const tambah_table = document.getElementById('tambah_pembelian_table');
    const kodepembelian = document.getElementById('buat_kode_pembelian');



    var count = 0;
	
	function add_input_field(count)
	{

		var html = '';

		html += '<tr>';
        
		html += '<td style="width:275px"><select  data-dropdown-parent="#modaltambahpembelian > .modal-dialog > .modal-content" name="item_unit[]" class="form-control form-control-select selectpicker"  data-control="select2" data-placeholder="Pilih Obat" data-allow-clear="true"><option class="empty"></option></select></td>';
		html += '<td style="width:85px"><input min="0" type="number" name="qtypembelian[]" class="form-control qtypembelian" /></td>';
		html += '<td style="width:100px"><input readonly type="text" name="satuanpembelian[]" class="form-control satuanpembelian" /></td>';
		html += '<td><input type="text" name="hargapembelian[]" class="form-control hargapembelian"  /></td>';
		html += '<td style="width:100px"><input min="0" type="number" name="diskonpembelian[]" class="form-control diskonpembelian" step="any" /></td>';
		html += '<td><input readonly  type="text" name="nettopembelian[]" class="form-control nettopembelian" /></td>';
		html += '<td><input readonly  type="text" name="subtotalpembelian[]" class="form-control subtotalpembelian" /></td>';



		var remove_button = '';

		if(count > 0)
		{
			remove_button = '<button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button>';
		}

		html += '<td>'+remove_button+'</td></tr>';

		return html;

	}

	$('#item_table').append(add_input_field(0));

	$('.selectpicker').select2({
        ajax : {
            url : '' + document.location.origin + '/Obat/list_obat/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        },
    });

    $(document).on('change', '.selectpicker', function(){
        var id = $(this).closest('tr').find('td:eq(0)').find('select').val();
        var hna = 0;
        var namasatuan ;
        var rowIdCnt = {};
        $('.selectpicker').each(function(){
            var rowId = $(this).val();
            if (rowId != '') {
                if (rowId in rowIdCnt) {` `
                    rowIdCnt[rowId]++;
                    same = true
                } else {
                    rowIdCnt[rowId] = 1;
                    same = false;
                }
            }
		});
        if (same == true) {
            Swal.fire({
                text: 'Obat Sudah terinput, Ingin Mengganti Kuantitas ?',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }) 
            $(this).closest('tr').find('td:eq(0)').find('select').val('').trigger('change');       
        }else{
            if (id != '') {
                $.ajax({
                    type: 'POST',
                    async: false,
                    data: {id_obat:id},
                    url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                    dataType : 'json',
                    success: function(data){
                        hna = data.hna;
                        namasatuan = data.namasatuan;
                    }
                });
                $(this).closest('tr').find('td:eq(3)').find('input').val(formatRupiah(hna.toString(), 'Rp. '));
                $(this).closest('tr').find('td:eq(2)').find('input').val(namasatuan);
                $(this).closest('tr').find('td:eq(4)').find('input').val(parseFloat(0));
                $(this).closest('tr').find('td:eq(1)').find('input').val(parseFloat(0));                  
                $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(hna.toString(), 'Rp. '));         
                $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah('0', 'Rp. '));         
            }else{
                $(this).closest('tr').find('td:eq(3)').find('input').val(null);
                $(this).closest('tr').find('td:eq(2)').find('input').val(null);
                $(this).closest('tr').find('td:eq(4)').find('input').val(null);
                $(this).closest('tr').find('td:eq(1)').find('input').val(null);         
                $(this).closest('tr').find('td:eq(5)').find('input').val(null);         
                $(this).closest('tr').find('td:eq(6)').find('input').val(null);         
            }
        }

        totalPrice('pembelian');
    })

    $(document).on('keyup change clear', '.qtypembelian, .diskonpembelian, .hargapembelian', function(){
        harga = parseFloat(($(this).closest('tr').find('td:eq(3)').find('input').val()).replace(/\D/g, ''));
        diskon = parseFloat(($(this).closest('tr').find('td:eq(4)').find('input').val()));
        qty = parseFloat(($(this).closest('tr').find('td:eq(1)').find('input').val()));
        netto = Math.round((harga)-(harga*(diskon/100)));
        sub_total = Math.round((parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)))*parseFloat(qty));
        if ($(this).hasClass('qtypembelian') || $(this).hasClass('diskonpembelian')) {
            $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(netto.toString(), 'Rp. '));
            $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah(sub_total.toString(), 'Rp. '));
        }
        else if ($(this).hasClass('hargapembelian')){      
            $(this).closest('tr').find('td:eq(3)').find('input').val(formatRupiah($(this).val(), 'Rp. '));
            $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(netto.toString(), 'Rp. '));
            $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah(sub_total.toString(), 'Rp. '));
        }
        totalPrice('pembelian');

    })

	$(document).on('click', '.add', function(){
        
        var same;
		count++;

        
        $('#item_table').append(add_input_field(count));

        $('.selectpicker').select2({
            ajax : {
                url : '' + document.location.origin + '/Obat/list_obat/',
                type: 'POST',
                dataType : 'json',
                data: function(params)
                {
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data
                    };
                }
            },
        });
        



		

	});

	$(document).on('click', '.remove', function(){

		$(this).closest('tr').remove();
        totalPrice('pembelian');
	});

    simpan_pembelian.addEventListener('click', function (event) {
        metode_pembayaran = metodepembayaran.value;
        isvalidnota = no_notapembelian.checkValidity();
        isvalidtanggal = tanggalpembelian.checkValidity();
        suplier = supplier.value;
        var text;
        var error = false;
        count = 1;

		$("select[name='item_unit[]']").each(function(){
            console.log($(this).html());
                if($(this).val() == '' )
                {
                    text += '<li>Pilih Item pada Kolom '+count+'</li>';   
                    error = true;
                }                

            
			count = count + 1;
            
		});
        
		count = 1;
        
		$('.qtypembelian').each(function(){
            
            if($(this).val() == '' || $(this).val() == 0)
			{
                console.log('qty'+$(this).val());
                text += '<li>Masukkan Qty Item pada Kolom '+count+'</li>';  
                error = true;
			}

			count = count + 1;
		});
        count = 1;
		$('.hargapembelian').each(function(){

            if($(this).val() == '' || $(this).val().replace(/\D/g, '') == 0)
			{
                console.log('harga'+$(this).val());
                text += '<li>Masukkan Harga Item pada Kolom '+count+'</li>';  
                error = true;
			}

			count = count + 1;
		});
        
        

        if ( isvalidtanggal && isvalidnota && suplier != "" && totalbayar.value != '' && metode_pembayaran != "" && error == false ) {
        console.log(error);
            Swal.fire({
                html: `Yakin Untuk Menyimpan data Pembelian dengan Kode ${kodepembelian.value} ini ??`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
                
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    simpandatapembelian()
                    Swal.fire('Saved!', '', 'success')
                } else {
                    Swal.fire('Changes are not saved', '', 'info')
                }
                });  
  
       
        }
        else if(metode_pembayaran == "")
        {
            Swal.fire({
                text: "Pilih Metode Pembayaran !! ",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        } 
        else if(parseFloat(totalbayar.value.replace(/\D/g, '')) < 0 || totalbayar.value == '')
        {
            Swal.fire({
                text: "Total Yang dibayarkan Tidak Valid !! ",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
        else if(!isvalidtanggal || !isvalidnota || suplier == '' )
        {
            Swal.fire({
                text: "Semua data mandatory tidak boleh kosong",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
        else if(error == true)
        {
            Swal.fire({
                title: '<strong>Error</strong>',
                html: text,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }

        
    });

	// $('#insert_form').on('submit', function(event){

	// 	event.preventDefault();

	// 	var error = false;

        

	// 	count = 1;

	// 	$('.selectpicker').each(function(){

	// 		if($(this).val() == '')
	// 		{

	// 			Swal.fire({
    //                 text: 'Pilih Item pada Kolom '+count+'',
    //                 icon: "error",
    //                 buttonsStyling: false,
    //                 confirmButtonText: "Ok, got it!",
    //                 customClass: {
    //                     confirmButton: "btn btn-primary"
    //                 }
    //             })    

	// 		}

	// 		count = count + 1;
    //         error = true;

	// 	});



	// 	count = 1;

	// 	$('.item_quantity').each(function(){

	// 		if($(this).val() == '')
	// 		{

    //             Swal.fire({
    //                 text: 'Masukkan Qty Item pada Kolom '+count+'',
    //                 icon: "error",
    //                 buttonsStyling: false,
    //                 confirmButtonText: "Ok, got it!",
    //                 customClass: {
    //                     confirmButton: "btn btn-primary"
    //                 }
    //             })    

	// 		}

	// 		count = count + 1;
    //         error = true;
	// 	});

	// 	count = 1;

	// 	// $("select[name='item_unit[]']").each(function(){

	// 	// 	if($(this).val() == '')
	// 	// 	{

	// 	// 		error += "<li>Select Unit at "+count+" Row</li>";

	// 	// 	}

	// 	// 	count = count + 1;

	// 	// });

	// 	var form_data = $(this).serialize();

	// 	if(error == '')
	// 	{

	// 		$.ajax({

	// 			url:"insert.php",

	// 			method:"POST",

	// 			data:form_data,

	// 			beforeSend:function()
	//     		{

	//     			$('#submit_button').attr('disabled', 'disabled');

	//     		},

	// 			success:function(data)
	// 			{

	// 				if(data == 'ok')
	// 				{

	// 					$('#item_table').find('tr:gt(0)').remove();

	// 					$('#error').html('<div class="alert alert-success">Item Details Saved</div>');

	// 					$('#item_table').append(add_input_field(0));

	// 					$('.selectpicker').selectpicker('refresh');

	// 					$('#submit_button').attr('disabled', false);
	// 				}

	// 			}
	// 		})

	// 	}
	// 	else
	// 	{
	// 		$('#error').html('<div class="alert alert-danger"><ul>'+error+'</ul></div>');
	// 	}

	// });





    const optionFormat = (item) => {
        if (!item.id) {
            return item.text;
        }
    
        var span = document.createElement('table');
        span.classList.add('table','table-sm', 'table-bordered', 'table-row-bordered', 'gx-7');
        var template = '';
    
        template += '<thead><tr class="fw-bold fs-6 text-muted">';
        template += '<th>Nama</th><th>Stok</th><th>HNA</th><th>HPP</th><th>HJ</th><th>Min Stok</th><th>Max Disc</th></tr></thead>';
        template += '<tbody><tr ><td>'+item.text+'</td><td>'+item.stok+'</td><td>'+formatRupiah(item.hna.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hpp.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hj.toString(), 'Rp. ')+'</td><td>'+item.minimum_stok+'</td><td>'+item.max_diskon+'%</td></tr></tbody>';    
        span.innerHTML = template;
    
        return $(span);
    }
 
    $('#namaobatpembelian').select2({
        ajax : {
            url : '' + document.location.origin + '/Obat/list_obat/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        },
        templateResult: optionFormat,
    })

    $('#namaobatpembelian').change(function(){
        var id = $(this).val();
        if (id != '') {
            $.ajax({
                type: 'POST',
                async: false,
                data: {id_obat:id},
                url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                dataType : 'json',
                success: function(data){
                    moneyinput.value = formatRupiah(data.hna.toString(), 'Rp. ');
                    diskon.value = parseFloat(0);
                    qty.value = parseFloat(0);                  
                }
            });
        }else{
            moneyinput.value = null;
            diskon.value = null;
            qty.value = null;
        }
 
    });

    // tambah_table.addEventListener('click',function(e){
    //     if ($('#namaobatpembelian').val() != '' && qty.value != '' && diskon.value != '' && moneyinput.value != '') {
    //         tambah_data_pembelian($('#namaobatpembelian').val());
    //         totalPrice('pembelian');
            
    //     }else if(qty.value == '' || diskon.value == '' || moneyinput.value == ''){
    //         Swal.fire({
    //             text: 'Qty,harga atau diskon yang diinputkan Tidak Valid',
    //             icon: "error",
    //             buttonsStyling: false,
    //             confirmButtonText: "Ok, got it!",
    //             customClass: {
    //                 confirmButton: "btn btn-primary"
    //             }
    //         })
    //     } 
    //     else {
    //         Swal.fire({
    //             text: 'Pilih obat terlebih dahulu',
    //             icon: "error",
    //             buttonsStyling: false,
    //             confirmButtonText: "Ok, got it!",
    //             customClass: {
    //                 confirmButton: "btn btn-primary"
    //             }
    //         })
    //     }
    // });


    
    $('#metodepembayaranpembelian').change(function(event){
        metode_pembayaran = metodepembayaran.value;
        totalbayar.removeAttribute('readonly');
        totalPrice('pembelian');
    });
    totalbayar.addEventListener('keyup', function(event){
        totalbayar.value = formatRupiah(this.value, 'Rp. ');
        totalkembalian.value = parseInt(this.value.replace(/\D/g, '')) -  parseInt(total.innerHTML.replace(/\D/g, ''));
    });
    // moneyinput.addEventListener('keyup', function(event){
    //     moneyinput.value = formatRupiah(this.value, 'Rp. ');
    // });
    $("#table_pembelian_stok_obat").on('click','.btn-delete-selectedrowpembelian',function(){
        var table = document.getElementById('table_pembelian_stok_obat');
        var rowCount = table.rows.length;
        
            var row = table.rows[this.parentNode.parentNode.rowIndex];
            var chkbox = row.cells[8].childNodes[0];
                // console.log(row);
                table.deleteRow(chkbox.parentNode.parentNode.rowIndex);
                rowCount--;
                i--;         


        totalPrice('pembelian');
     });   

})
    

$('#modaldetailpembelian').one('shown.bs.modal', function (e) {
    console.log(document.getElementById('modaldetailpembelian'));
    const simpan_edit_pembelian = document.getElementById('simpan_edit_pembelian');
    const tambah_table = document.getElementById('tambah_detailpembelian_table');
    const tanggalpembelian = document.getElementById('detailtanggalpembelian');
    const no_notapembelian = document.getElementById('detailno_notapembelian');
    const supplier = document.getElementById('detailsupplierpembelian');
    const moneyinput = document.getElementById('hargadetailpembelian');
    const qty = document.getElementById('qtydetailpembelian');
    const diskon = document.getElementById('diskondetailpembelian');
    const optionFormat = (item) => {
        if (!item.id) {
            return item.text;
        }
    
        var span = document.createElement('table');
        span.classList.add('table', 'table-bordered', 'table-row-bordered', 'gx-7');
        var template = '';
    
        template += '<thead><tr class="fw-bold fs-6 text-muted">';
        template += '<th>Nama</th><th>Stok</th><th>HNA</th><th>HPP</th><th>HJ</th><th>Min Stok</th><th>Max Disc</th></tr></thead>';
        template += '<tbody><tr><td>'+item.text+'</td><td>'+item.stok+'</td><td>'+formatRupiah(item.hna.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hpp.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hj.toString(), 'Rp. ')+'</td><td>'+item.minimum_stok+'</td><td>'+item.max_diskon+'%</td></tr></tbody>';    
        span.innerHTML = template;
    
        return $(span);
    }




    $("#table_detailpembelian_stok_obat").on('click','.btn-edit-deleted-selectedrow-detailpembelian',function(){
        var table = document.getElementById('table_detailpembelian_stok_obat');
        var rowCount = table.rows.length;
        
            var row = table.rows[this.parentNode.parentNode.rowIndex];
            var chkbox = row.cells[8].childNodes[0];
                // console.log(row);
                table.deleteRow(chkbox.parentNode.parentNode.rowIndex);
                rowCount--;
                i--;         


        totalPrice('detailpembelian');
    });


    // tambah_table.addEventListener('click',function(e){
    //     if ($('#namadetailobatpembelian').val() != ''  && qty.value != '' && diskon.value != '' && moneyinput.value != '') {
    //         tambah_data_detailpembelian($('#namadetailobatpembelian').val());
    //         totalPrice('detailpembelian');        
    //     }
    //     else if(qty.value == '' || diskon.value == '' || moneyinput.value == ''){
    //         Swal.fire({
    //             text: 'Qty,harga atau diskon yang diinputkan Tidak Valid',
    //             icon: "error",
    //             buttonsStyling: false,
    //             confirmButtonText: "Ok, got it!",
    //             customClass: {
    //                 confirmButton: "btn btn-primary"
    //             }
    //         })
    //     } 
    //     else {
    //         Swal.fire({
    //             text: 'Pilih obat terlebih dahulu',
    //             icon: "success",
    //             buttonsStyling: false,
    //             confirmButtonText: "Ok, got it!",
    //             customClass: {
    //                 confirmButton: "btn btn-primary"
    //             }
    //         })
    //     }
    // })

    $('#namadetailobatpembelian').select2({

        ajax : {
            url : '' + document.location.origin + '/Obat/list_obat/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                  results: data
                };
            }
        },
        templateResult: optionFormat,
    })

    $('#namadetailobatpembelian').change(function(){
        var id = $(this).val();
        if (id != '') {
            $.ajax({
                type: 'POST',
                async: false,
                data: {id_obat:id},
                url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                dataType : 'json',
                success: function(data){
                    document.getElementById('hargadetailpembelian').value = formatRupiah(data.hna.toString(), 'Rp. ');
                    document.getElementById('diskondetailpembelian').value = parseFloat(0);
                    document.getElementById('qtydetailpembelian').value = parseFloat(0);
    
                }
            });
        }else{
            document.getElementById('hargadetailpembelian').value = null;
            document.getElementById('diskondetailpembelian').value = null;
            document.getElementById('qtydetailpembelian').value = null;
        }

    });

    simpan_edit_pembelian.addEventListener('click', function (event) {
        isvalidnota = no_notapembelian.checkValidity();
        isvalidtanggal = tanggalpembelian.checkValidity();
        isvalidsupplier = supplier.checkValidity();
        if ( isvalidtanggal && isvalidnota && isvalidsupplier && $('#table_detailpembelian_stok_obat >  tbody >  tr').length > 0  ) {
            Swal.fire({
                html: `Yakin Untuk Menyimpan data Pembelian ini ??`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
                
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  simpandatadetailpembelian()
                  Swal.fire('Saved!', '', 'success')
                } else {
                  Swal.fire('Changes are not saved', '', 'info')
                }
              });
        }
        else if($('#table_detailpembelian_stok_obat >  tbody >  tr').length == 0)
        {
            Swal.fire({
                text: "Data Table masih Kosong !! ",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }

        else 
        {
            Swal.fire({
                text: "Semua data mandatory tidak boleh kosong",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
    });

    // moneyinput.addEventListener('keyup', function(event){
    //     moneyinput.value = formatRupiah(this.value, 'Rp. ');
    // });
})


$('#modaldetailpenjualan').one('shown.bs.modal', function () {
    const simpan_edit_penjualan = document.getElementById('simpan_edit_penjualan');
    const tanggalpenjualan = document.getElementById('detailtanggalpenjualan');
    const customer = document.getElementById('detailcustomerpenjualan');
    const tambah_table = document.getElementById('tambah_detailpenjualan_table');
    const moneyinput = document.getElementById('hargadetailpenjualan');
    const qty = document.getElementById('qtydetailpenjualan');
    const diskon = document.getElementById('diskondetailpenjualan');
    const sisastok = document.getElementById('sisastokdetailpenjualan');
    const minstok = document.getElementById('minstokdetailpenjualan');
    const id_penjualan = document.getElementById('detail_id_penjualan');
    const totalbayar = document.getElementById('totalbayarpenjualan');
    const optionFormat = (item) => {
        if (!item.id) {
            return item.text;
        }
    
        var span = document.createElement('table');
        span.classList.add('table', 'table-bordered', 'table-row-bordered', 'gx-7');
        var template = '';
    
        template += '<thead><tr class="fw-bold fs-6 text-muted">';
        template += '<th>Nama</th><th>Stok</th><th>HNA</th><th>HPP</th><th>HJ</th><th>Min Stok</th><th>Max Disc</th></tr></thead>';
        template += '<tbody><tr><td>'+item.text+'</td><td>'+item.stok+'</td><td>'+formatRupiah(item.hna.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hpp.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hj.toString(), 'Rp. ')+'</td><td>'+item.minimum_stok+'</td><td>'+item.max_diskon+'%</td></tr></tbody>';    
        span.innerHTML = template;
    
        return $(span);
    }
    document.getElementById('btn-print-struk').addEventListener('click',function(e){
        window.open(
            ''+document.location.origin+'/Stok/printstruk/'+id_penjualan.value+'',
            '_blank' // <- This is what makes it open in a new window.
          );
    })

    $("#table_detailpenjualan_stok_obat").on('click','.btn-edit-deleted-selectedrow-detailpenjualan',function(){
        var table = document.getElementById('table_detailpenjualan_stok_obat');
        var rowCount = table.rows.length;
        
            var row = table.rows[this.parentNode.parentNode.rowIndex];
            var chkbox = row.cells[8].childNodes[0];
                // console.log(row);
                table.deleteRow(chkbox.parentNode.parentNode.rowIndex);
                rowCount--;
                i--;         
        
        totalPrice('detailpenjualan');
     });
     

     $('#namadetailobatpenjualan').select2({
        ajax : {
            url : '' + document.location.origin + '/Obat/list_obat/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                  results: data
                };
            }
        },
        templateResult: optionFormat,
    })
    

    tambah_table.addEventListener('click',function(e){
        if ($('#namadetailobatpenjualan').val() != ''  && qty.value != '' && diskon.value != '' && moneyinput.value != '' && (sisastok.value - qty.value) > minstok.value) {
            tambah_data_detailpenjualan($('#namadetailobatpenjualan').val());
            totalPrice('detailpenjualan');
            
        }
        else if(qty.value == '' || diskon.value == '' || moneyinput.value == ''){
            Swal.fire({
                text: 'Qty,harga atau diskon yang diinputkan Tidak Valid',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }
        else if((sisastok.value - qty.value) < minstok.value){
            Swal.fire({
                text: 'Sisa Stok Tidak Mencukupi, Stok = '+sisastok.value+'sedangkan minimum stok = '+minstok.value+'',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }  
        else {
            Swal.fire({
                text: 'Pilih obat terlebih dahulu',
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }

        
    });

    $('#namadetailobatpenjualan').change(function(){
        var id = $(this).val();
        if (id != '') {
            $.ajax({
                type: 'POST',
                async: false,
                data: {id_obat:id},
                url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                dataType : 'json',
                success: function(data){
                    moneyinput.value = formatRupiah(data.hj.toString(), 'Rp. ');
                    diskon.value = parseFloat(0);
                    qty.value = parseFloat(0);
                    sisastok.value = data.stok;
                    minstok.value = data.minimum_stok;  
                }
            });
        }else{
            moneyinput.value = null;
            diskon.value = null;
            qty.value = null;
            sisastok.value = null;
            minstok.value = null;
        }

    });

    simpan_edit_penjualan.addEventListener('click', function (event) {
        isvalidtanggal = tanggalpenjualan.checkValidity();
        isvalidcustomer = customer.checkValidity();
        if ( isvalidtanggal &&  isvalidcustomer  && $('#table_detailpenjualan_stok_obat >  tbody >  tr').length > 0  ) {
            Swal.fire({
                html: `Yakin Untuk Menyimpan data penjualan ini ??`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
                
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  simpandatadetailpenjualan()
                  Swal.fire('Saved!', '', 'success')
                } else {
                  Swal.fire('Changes are not saved', '', 'info')
                }
              });
        }
        else if($('#table_detailpenjualan_stok_obat >  tbody >  tr').length == 0)
        {
            Swal.fire({
                text: "Data Table masih Kosong !! ",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
        
        else 
        {
            Swal.fire({
                text: "Semua data mandatory tidak boleh kosong",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
    });

    moneyinput.addEventListener('keyup', function(event){
        moneyinput.value = formatRupiah(this.value, 'Rp. ');
    });
})

$('#modaltambahpenjualan').one('shown.bs.modal', function () {
    const tanggalpenjualan = document.getElementById('tanggalpenjualan');
    const customer = document.getElementById('customerpenjualan');
    const tambah_penjualan = document.getElementById('tambah_penjualan_table');
    const obat = document.getElementById('namaobatpenjualan');
    const moneyinput = document.getElementById('hargapenjualan');
    const metodepembayaran = document.getElementById('metodepembayaranpenjualan');
    const totalbayar = document.getElementById('totalbayarpenjualan');
    const totalkembalian = document.getElementById('totalkembalianpenjualan');
    const total = document.getElementById('totalpenjualan');
    const simpan_penjualan = document.getElementById('simpan_penjualan');
    const kodepenjualan = document.getElementById('buat_kode_penjualan');

    // const qty = document.getElementById('qtypenjualan');
    // const diskon = document.getElementById('diskonpenjualan');
    const sisastok = document.getElementById('sisastokpenjualan');
    const stok = document.getElementById('stoksisaapenjualan');
    const minstok = document.getElementById('minstokpenjualan');

    const optionFormat = (item) => {
        if (!item.id) {
            return item.text;
        }
    
        var span = document.createElement('table');
        span.classList.add('table', 'table-bordered', 'table-row-bordered', 'gx-7');
        var template = '';
    
        template += '<thead><tr class="fw-bold fs-6 text-muted">';
        template += '<th>Nama</th><th>Stok</th><th>HNA</th><th>HPP</th><th>HJ</th><th>Min Stok</th><th>Max Disc</th></tr></thead>';
        template += '<tbody><tr><td>'+item.text+'</td><td>'+item.stok+'</td><td>'+formatRupiah(item.hna.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hpp.toString(), 'Rp. ')+'</td><td>'+formatRupiah(item.hj.toString(), 'Rp. ')+'</td><td>'+item.minimum_stok+'</td><td>'+item.max_diskon+'%</td></tr></tbody>';    
        span.innerHTML = template;
    
        return $(span);
    }

    var count = 0;
	
	function add_input_field(count)
	{

		var html = '';

		html += '<tr>';
        
		html += '<td style="width:275px"><select  data-dropdown-parent="#modaltambahpenjualan > .modal-dialog > .modal-content" name="item_unit[]" class="form-control form-control-select selectpickerpenjualan"  data-control="select2" data-placeholder="Pilih Obat" data-allow-clear="true"><option class="empty"></option></select></td>';
		html += '<td style="width:85px"><input min="0" type="number" name="qtypenjualan[]" class="form-control qtypenjualan" />  <span class="position-relative top-0 start-100 translate-middle badge rounded-pill bg-danger qtysisa"></span></td>';
		html += '<td style="width:100px"><input readonly type="text" name="satuanpenjualan[]" class="form-control satuanpenjualan" /></td>';
		html += '<td><input readonly type="text" name="hargapenjualan[]" class="form-control hargapenjualan"  /></td>';
		html += '<td style="width:100px"><input min="0" type="number" name="diskonpenjualan[]" class="form-control diskonpenjualan" step="any" /></td>';
		html += '<td><input readonly  type="text" name="nettopenjualan[]" class="form-control nettopenjualan" /></td>';
		html += '<td><input readonly  type="text" name="subtotalpenjualan[]" class="form-control subtotalpenjualan" /></td>';
		html += '<td style="display: none;"><input type="text" name="hpp[]" class="form-control hpp"  /></td>';



		var remove_button = '';

		if(count > 0)
		{
			remove_button = '<button type="button" name="removepenjualan" class="btn btn-danger btn-sm removepenjualan"><i class="fas fa-minus"></i></button>';
		}

		html += '<td>'+remove_button+'</td></tr>';

		return html;

	}

	$('#item_table_penjualan').append(add_input_field(0));

	$('.selectpickerpenjualan').select2({
        ajax : {
            url : '' + document.location.origin + '/Obat/list_obat/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        },
    });

    $(document).on('change', '.selectpickerpenjualan', function(){
        var id = $(this).closest('tr').find('td:eq(0)').find('select').val();
        var hna = 0;
        var hpp = 0;
        var stoksisa = 0;
        var namasatuan ;
        var rowIdCnt = {};
        $('.selectpickerpenjualan').each(function(){
            var rowId = $(this).val();
            if (rowId != '') {
                if (rowId in rowIdCnt) {` `
                    rowIdCnt[rowId]++;
                    same = true
                } else {
                    rowIdCnt[rowId] = 1;
                    same = false;
                }
            }
		});
        if (same == true) {
            Swal.fire({
                text: 'Item Sudah terinput, Ingin Mengganti Kuantitas ?',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }) 
            $(this).closest('tr').find('td:eq(0)').find('select').val('').trigger('change');       
        }else{
            if (id != '') {
                $.ajax({
                    type: 'POST',
                    async: false,
                    data: {id_obat:id},
                    url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                    dataType : 'json',
                    success: function(data){
                        hna = data.hna;
                        namasatuan = data.namasatuan;
                        hpp = data.hpp_avg;
                        stoksisa = data.stok;
                    }
                });
                $(this).closest('tr').find('td:eq(3)').find('input').val(formatRupiah(hna.toString(), 'Rp. '));
                $(this).closest('tr').find('td:eq(2)').find('input').val(namasatuan);
                $(this).closest('tr').find('td:eq(4)').find('input').val(parseFloat(0));
                $(this).closest('tr').find('td:eq(1)').find('input').val(parseFloat(0));                  
                $(this).closest('tr').find('td:eq(1)').find('span').html(parseFloat(stoksisa));                  
                $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(hna.toString(), 'Rp. '));         
                $(this).closest('tr').find('td:eq(7)').find('input').val(formatRupiah(hpp.toString(), 'Rp. '));         
                $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah('0', 'Rp. '));         
            }else{
                $(this).closest('tr').find('td:eq(3)').find('input').val(null);
                $(this).closest('tr').find('td:eq(2)').find('input').val(null);
                $(this).closest('tr').find('td:eq(4)').find('input').val(null);
                $(this).closest('tr').find('td:eq(1)').find('input').val(null);         
                $(this).closest('tr').find('td:eq(5)').find('input').val(null);         
                $(this).closest('tr').find('td:eq(6)').find('input').val(null);         
                $(this).closest('tr').find('td:eq(7)').find('input').val(null);         
            }
        }

        totalPrice('penjualan');
    })

    $(document).on('keyup change clear', '.qtypenjualan, .diskonpenjualan, .hargapenjualan', function(){
        harga = parseFloat(($(this).closest('tr').find('td:eq(3)').find('input').val()).replace(/\D/g, ''));
        diskon = parseFloat(($(this).closest('tr').find('td:eq(4)').find('input').val()));
        qty = parseFloat(($(this).closest('tr').find('td:eq(1)').find('input').val()));
        netto = Math.round((harga)-(harga*(diskon/100)));
        sub_total = Math.round((parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)))*parseFloat(qty));
        if ($(this).hasClass('qtypenjualan') || $(this).hasClass('diskonpenjualan')) {
            $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(netto.toString(), 'Rp. '));
            $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah(sub_total.toString(), 'Rp. '));
        }
        else if ($(this).hasClass('hargapenjualan')){      
            $(this).closest('tr').find('td:eq(3)').find('input').val(formatRupiah($(this).val(), 'Rp. '));
            $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(netto.toString(), 'Rp. '));
            $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah(sub_total.toString(), 'Rp. '));
        }
        totalPrice('penjualan');

    })

	$(document).on('click', '.addpenjualan', function(){
        
        var same;
		count++;

        
        $('#item_table_penjualan').append(add_input_field(count));

        $('.selectpickerpenjualan').select2({
            ajax : {
                url : '' + document.location.origin + '/Obat/list_obat/',
                type: 'POST',
                dataType : 'json',
                data: function(params)
                {
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data
                    };
                }
            },
        });
        



		

	});

	$(document).on('click', '.removepenjualan', function(){

		$(this).closest('tr').remove();
        totalPrice('penjualan');
	});
    


   

    

    simpan_penjualan.addEventListener('click', function (event) {
        metode_pembayaran = metodepembayaran.value;
        isvalidtanggal = tanggalpenjualan.checkValidity();
        isvalidcustomer = customer.checkValidity();
        isvalidtotalbayar = totalbayar.checkValidity();

        var text;
        var error = false;
        count = 1;

		$("select[name='item_unit[]']").each(function(){
            console.log($(this).html());
                if($(this).val() == '' )
                {
                    text += '<li>Pilih Item pada Kolom '+count+'</li>';   
                    error = true;
                }                

            
			count = count + 1;
            
		});
        
		count = 1;
        
		$('.qtypenjualan').each(function(){
            
            if($(this).val() == '' || $(this).val() == 0)
			{
                console.log('qty'+$(this).val());
                text += '<li>Masukkan Qty Item pada Kolom '+count+'</li>';  
                error = true;
			}

			count = count + 1;
		});
        count = 1;
		$('.hargapenjualan').each(function(){

            if($(this).val() == '' || $(this).val().replace(/\D/g, '') == 0)
			{
                console.log('harga'+$(this).val());
                text += '<li>Masukkan Harga Item pada Kolom '+count+'</li>';  
                error = true;
			}

			count = count + 1;
		});

        if ( isvalidtanggal && isvalidcustomer && isvalidtotalbayar && metode_pembayaran != "" && error == false ) {
                Swal.fire({
                    html:  `Yakin Untuk Menyimpan data Pembelian dengan Kode ${kodepenjualan.value} ini ??`,
                    icon: "info",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Ok, got it!",
                    cancelButtonText: 'Nope, cancel it',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                    
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                      simpandatapenjualan();
                    //   Swal.fire('Saved!', '', 'success')
                    } else {
                      Swal.fire('Changes are not saved', '', 'info')
                    }
                  });
        }
        else if(metode_pembayaran == "")
        {
            Swal.fire({
                text: "Pilih Metode Pembayaran !! ",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
        else if(error == true)
        {
            Swal.fire({
                title: '<strong>Error</strong>',
                html: text,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
        else if(!isvalidtanggal  || !isvalidcustomer == '' ) 
        {
            Swal.fire({
                text: "Semua data mandatory tidak boleh kosong",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        }
    });

    $('#metodepembayaranpenjualan').change(function(event){
        metode_pembayaran = metodepembayaran.value;
        totalbayar.removeAttribute('readonly');

    });

    totalbayar.addEventListener('keyup', function(event){
        totalbayar.value = formatRupiah(this.value, 'Rp. ');
        totalkembalian.value = parseFloat(this.value.replace(/\D/g, '')) -  parseInt(total.innerHTML.replace(/\D/g, ''));
    });



    $("#table_penjualan_stok_obat").on('click','.btn-delete-selectedrowpenjualan',function(){
        var table = document.getElementById('table_penjualan_stok_obat');
        var rowCount = table.rows.length;
        
            var row = table.rows[this.parentNode.parentNode.rowIndex];
            var chkbox = row.cells[8].childNodes[0];
                // console.log(row);
                table.deleteRow(chkbox.parentNode.parentNode.rowIndex);
                rowCount--;
                i--;         
        totalPrice('penjualan');
     });   


});

$('#modaltambahpembayarantoko').on('shown.bs.modal', function () {
    const metodepembayaran = document.getElementById('metodepembayaranpembayarantoko');
    const totalbayar = document.getElementById('totalbayarpembayarantoko');
    const total_sisa = document.getElementById('sisahutangpembayarantoko');
    const totalkembalian = document.getElementById('totalkembalianpembayarantoko');
    const simpan_pembayarantoko = document.getElementById('simpan_pembayarantoko');
    const pilihkodepembelian = document.getElementById('pembelian_id');
    const tanggalpembayarantoko = document.getElementById('tanggalpembayarantoko');
    const deskripsipembayarantoko = document.getElementById('deskripsipembayarantoko');
    const kodepembelian = document.getElementById('kode_pembelian_pembayarantoko');

    

    $('#pembelian_id').select2({
        ajax : {
            url : '' + document.location.origin + '/Pembayaran/list_pembelian/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                  results: data
                };
            }
        }
    })

    simpan_pembayarantoko.addEventListener('click', function(event) {
        isvalidkodepembelian = pilihkodepembelian.checkValidity();
        isvalidtanggal = tanggalpembayarantoko.checkValidity();
        isvalidmetodepembayaran = metodepembayaran.checkValidity();
        if (isvalidkodepembelian && parseFloat(totalbayar.value.replace(/\D/g, '')) > 0 && isvalidtanggal && isvalidmetodepembayaran) {
            Swal.fire({
                html: `Yakin Untuk Menyimpan data Pembayaran Toko ini ??`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
                
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  Swal.fire('Saved!', '', 'success')
                  simpanpembayarantoko(pilihkodepembelian.value,totalbayar.value,metodepembayaran.value,tanggalpembayarantoko.value,deskripsipembayarantoko.value,kodepembelian.value,total_sisa.value);
                } else {
                  Swal.fire('Changes are not saved', '', 'info')
                }
              });
        }
        else if(parseFloat(totalbayar.value.replace(/\D/g, '')) <= 0){
            Swal.fire({
                text: 'Total yang dibayarkan tidak valid !!',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        } 
        else {
            Swal.fire({
                text: 'Semua Data Mandatory Harus Terisi !!',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }
    });

    totalbayar.addEventListener('keyup', function(event){
        totalbayar.value = formatRupiah(this.value, 'Rp. ');
        totalkembalian.value = parseFloat(this.value.replace(/\D/g, '')) -  parseInt(total_sisa.value.replace(/\D/g, ''));
    });

    $('#metodepembayaranpembayarantoko').change(function(event){
        metode_pembayaran = metodepembayaran.value;
        if (metode_pembayaran == "" || metode_pembayaran == "DEBIT" ) {
            totalbayar.removeAttribute('readonly');
            totalPrice('pembayarantoko');
        } else {
            totalbayar.removeAttribute('readonly');
            totalPrice('pembayarantoko');
        }
    });

    $('#pembelian_id').change(function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            async: false,
            data: {id_pembelian:id},
            url: ''+document.location.origin+'/Pembayaran/get_datapembelian_by_id/' + id + '',
            dataType : 'json',
            success: function(data){
                var html = '';
                var html1 = '';
                var j = 1;
                var netto = 0;
                var sub_total = 0;
                var total = 0;
                document.getElementById('sisahutangpembayarantoko').value = formatRupiah(data.pembelian.total_sisa.toString(), 'Rp. ');
                document.getElementById('supplierpembelianpembayarantoko').value = data.pembelian.supplier;
                document.getElementById('kode_pembelian_pembayarantoko').value = data.pembelian.kode_pembelian;
                for (i = 0; i < data.detailpembelian.length; i++) {
                    netto = Math.round(parseFloat(data.detailpembelian[i].harga) -(parseFloat(data.detailpembelian[i].harga)*(parseFloat(data.detailpembelian[i].diskon)/100)));
                    sub_total = Math.round(netto*parseFloat(data.detailpembelian[i].qty));
                    html += '<tr>' +
                                '<td>' + j + '</td>' +
                                '<td>' + data.detailpembelian[i].nama_obat + '</td>' +
                                '<td>' + data.detailpembelian[i].qty + '</td>' +
                                '<td>' + data.detailpembelian[i].satuan  + '</td>' +
                                '<td>' + formatRupiah(data.detailpembelian[i].harga, 'Rp. ')  + '</td>' +
                                '<td>' + ''+data.detailpembelian[i].diskon+'%' + '</td>' +
                                '<td>' + formatRupiah(netto.toString(), 'Rp. ') + '</td>' +
                                '<td>' + formatRupiah(sub_total.toString(), 'Rp. ') + '</td>' +
                            '</tr>';
                    j++;
                    total = total+parseFloat(sub_total);
                }
                console.log(total);
                document.getElementById('viewtotalpembayarantoko').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                $('#table_pembayarantoko_view tbody').html(html);
                totalPrice('pembayarantoko');
            }
        });
    })
});

$('#modaltambahpembayarancustomer').on('shown.bs.modal', function () {
    const metodepembayaran = document.getElementById('metodepembayaranpembayarancustomer');
    const totalbayar = document.getElementById('totalbayarpembayarancustomer');
    const total_sisa = document.getElementById('sisahutangpembayarancustomer');
    const totalkembalian = document.getElementById('totalkembalianpembayarancustomer');
    const simpan_pembayarancustomer = document.getElementById('simpan_pembayarancustomer');
    const pilihkodepenjualan = document.getElementById('penjualan_id');
    const tanggalpembayarancustomer = document.getElementById('tanggalpembayarancustomer');
    const deskripsipembayarancustomer = document.getElementById('deskripsipembayarancustomer');
    const kodepenjualan = document.getElementById('kode_pembelian_pembayarancustomer');;
    $('#penjualan_id').select2({
        ajax : {
            url : '' + document.location.origin + '/Pembayaran/list_penjualan/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                  results: data
                };
            }
        }
    })

    simpan_pembayarancustomer.addEventListener('click', function(event) {
        isvalidkodepenjualan = pilihkodepenjualan.checkValidity();
        isvalidtanggal = tanggalpembayarancustomer.checkValidity();
        isvalidmetodepembayaran = metodepembayaran.checkValidity();
        if (isvalidkodepenjualan && parseFloat(totalbayar.value.replace(/\D/g, '')) > 0 && isvalidtanggal && isvalidmetodepembayaran) {
            Swal.fire({
                html: `Yakin Untuk Menyimpan data Pembayaran Customer ini ??`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
                
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  Swal.fire('Saved!', '', '')
                  simpanpembayarancustomer(pilihkodepenjualan.value,totalbayar.value,metodepembayaran.value,tanggalpembayarancustomer.value,deskripsipembayarancustomer.value,total_sisa.value,kodepenjualan.value);
                } else {
                  Swal.fire('Changes are not saved', '', 'info')
                }
              });
        }
        else if( isvalidmetodepembayaran == false ){
            Swal.fire({
                text: 'Pilih Metode Pembayaran Dahulu !!',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        } 
        else {
            Swal.fire({
                text: 'Semua Data Mandatory Harus Terisi !!',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }
    });

    totalbayar.addEventListener('keyup', function(event){
        totalbayar.value = formatRupiah(this.value, 'Rp. ');
        totalkembalian.value = parseFloat(this.value.replace(/\D/g, '')) -  parseInt(total_sisa.value.replace(/\D/g, ''));
    });

    $('#metodepembayaranpembayarancustomer').change(function(event){
        metode_pembayaran = metodepembayaran.value;
        if (metode_pembayaran == "" || metode_pembayaran == "DEBIT" ) {
            totalbayar.removeAttribute('readonly');
            totalPrice('pembayarancustomer');
        } else {
            totalbayar.removeAttribute('readonly');
            totalPrice('pembayarancustomer');
        }
    });

    $('#penjualan_id').change(function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            async: false,
            data: {id_pembelian:id},
            url: ''+document.location.origin+'/Pembayaran/get_datapenjualan_by_id/' + id + '',
            dataType : 'json',
            success: function(data){
                var html = '';
                var j = 1;
                var netto = 0;
                var sub_total = 0;
                var total = 0;
                document.getElementById('sisahutangpembayarancustomer').value = formatRupiah(data.penjualan.total_sisa.toString(), 'Rp. ');
                document.getElementById('customerpembayaran').value = data.penjualan.customer;
                document.getElementById('kode_pembelian_pembayarancustomer').value = data.penjualan.kode_penjualan;
                for (i = 0; i < data.detailpenjualan.length; i++) {
                    netto = Math.round(parseFloat(data.detailpenjualan[i].harga) -(parseFloat(data.detailpenjualan[i].harga)*(parseFloat(data.detailpenjualan[i].diskon)/100)));
                    sub_total = Math.round(netto*parseFloat(data.detailpenjualan[i].qty));
                    html += '<tr>' +
                                '<td>' + j + '</td>' +
                                '<td>' + data.detailpenjualan[i].nama_obat + '</td>' +
                                '<td>' + data.detailpenjualan[i].qty + '</td>' +
                                '<td>' + data.detailpenjualan[i].satuan  + '</td>' +
                                '<td>' + formatRupiah(data.detailpenjualan[i].harga, 'Rp. ')  + '</td>' +
                                '<td>' + ''+data.detailpenjualan[i].diskon+'%' + '</td>' +
                                '<td>' + formatRupiah(netto.toString(), 'Rp. ') + '</td>' +
                                '<td>' + formatRupiah(sub_total.toString(), 'Rp. ') + '</td>' +
                            '</tr>';
                    j++;
                    total = total+parseFloat(sub_total);
                }
                document.getElementById('viewtotalpembayarancustomer').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                $('#table_pembayarancustomer_view tbody').html(html);
            }
        });
    })
})

$('#modalsampahkategori').on('hidden.bs.modal', function () {
    $("#table_sampah_kategori_obat").DataTable().destroy();
})
$('#modalsampahjenis').on('hidden.bs.modal', function () {
    $("#table_sampah_jenis_obat").DataTable().destroy();
})
$('#modalsampahsatuan').on('hidden.bs.modal', function () {
    $("#table_sampah_satuan").DataTable().destroy();
})
$('#modalsampahobat').on('hidden.bs.modal', function () {
    $("#table_sampah_obat").DataTable().destroy();
})
$('#modalsampahsupplier').on('hidden.bs.modal', function () {
    $("#table_sampah_supplier").DataTable().destroy();
})
$('#modalsampahcustomer').on('hidden.bs.modal', function () {
    $("#table_sampah_customer").DataTable().destroy();
})
$('#modalsampahuser').on('hidden.bs.modal', function () {
    $("#table_sampah_user").DataTable().destroy();
})
$('#modalsampahpembelian').on('hidden.bs.modal', function () {
    $('#table_sampah_pembelian').DataTable().destroy();
})
$('#modalsampahpenjualan').on('hidden.bs.modal', function () {
    $('#table_sampah_penjualan').DataTable().destroy();
})
$('#modalsampahpembayarantoko').on('hidden.bs.modal', function () {
    $('#table_sampah_pembayarantoko').DataTable().destroy();
})
$('#modalhistoryobat').on('hidden.bs.modal', function () {
    $('#table_history_obat').DataTable().destroy();
})

$('#modaleditpermissions').on('hidden.bs.modal', function () {
    $(".edit-permissionsmenu").prop('checked', false);
})
$('#modaltambahpermissions').on('hidden.bs.modal', function () {
    $(".tambah-permissionsmenu").prop('checked', false);
})









function formatRupiah(angka, prefix)
{
    var sign = angka.charAt(0);
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    if (sign == '-') {
        return prefix == undefined ? '-'+rupiah : (rupiah ? 'Rp. ' + '-'+rupiah : '');
    } else {
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
}

function tambah_data_pembelian(id_obat)
{

            var id_obat = id_obat;
            var kode_obat = '';
            var qty = document.getElementById('qtypembelian').value;
            var harga = document.getElementById('hargapembelian').value.replace(/\D/g, '');
            var textharga = document.getElementById('hargapembelian').value;
            var satuan = '';
            var namasatuan = '';
            // var stok = $('#hargapembelian').val();
            var nama_obat = $('#namaobatpembelian option:selected').text();
            var diskon = $('#diskonpembelian').val();
            var hna = 0;
            var netto = Math.round(parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)));
            // var textnetto = formatRupiah(netto,  'Rp. ');
            var sub_total = Math.round((parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)))*parseFloat(qty));
            // var textsub_total = formatRupiah(sub_total, 'Rp. ');
            $.ajax({
                type: 'POST',
                async: false,
                data: {id_obat:id_obat},
                url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                dataType : 'json',
                success: function(data){
                    kode_obat = 'OBT00'+data.id_obat+'';
                    satuan = data.satuan;
                    namasatuan = data.namasatuan;
                    hna = data.hna;
                }
            });
            var rowIdCnt = {};
        
            // loop through check tds
            $("#table_pembelian_stok_obat tr td[col=id_obat]").each(function() {
        
                // grab row identifer to check against other rows        
                var rowId = $(this).attr("rowid");
                if (rowId in rowIdCnt) {
                    rowIdCnt[rowId]++;
                } else {
                    rowIdCnt[rowId] = 1;
                }
        
            });

        
            if (rowIdCnt[id_obat] > 0) {
                Swal.fire({
                    text: 'Obat Sudah terinput, Ingin Mengganti Kuantitas ?',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
            else if(harga < hna){
                Swal.fire({
                    text: 'Harga Yang di inputkan kurang dari HNA = '+formatRupiah(hna, 'Rp. ')+' ',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
            else{
                $('#table_pembelian_stok_obat tbody:last-child').append(     
                    '<tr id="'+$('#table_pembelian_stok_obat >  tbody >  tr').length+'">'+
                        '<td>'+nama_obat+'</td>'+
                        '<td>'+parseInt(qty)+'</td>'+
                        '<td>'+namasatuan+'</td>'+
                        '<td>'+textharga+'</td>'+
                        '<td>'+parseFloat(diskon)+'</td>'+
                        '<td>'+formatRupiah(netto.toString(), 'Rp. ')+'</td>'+
                        '<td class="subtotalpembelian">'+formatRupiah(sub_total.toString(), 'Rp. ')+'</td>'+
                        '<td><a role="button" class="btn-delete-selectedrowpembelian" ><span class="badge badge-danger">Hapus</span></a></td>' +
                        '<td col="harga" rowid="'+harga+'" style="display: none;">'+harga+'</td>'+
                        '<td col="netto" rowid="'+netto+'" style="display: none;">'+netto+'</td>'+
                        '<td col="id_obat" rowid="'+id_obat+'" style="display: none;">'+id_obat+'</td>'+
                        '<td col="satuan" rowid="'+satuan+'" style="display: none;">'+satuan+'</td>'+
                    '</tr>'
                );
                
            }
}


function tambah_data_detailpembelian(id_obat)
{

            var id_obat = id_obat;
            var html = '';
            var kode_obat = '';
            var qty = document.getElementById('qtydetailpembelian').value;
            var harga = document.getElementById('hargadetailpembelian').value.replace(/\D/g, '');
            var textharga = document.getElementById('hargadetailpembelian').value;
            var satuan = '';
            var namasatuan = '';
            // var stok = $('#hargapembelian').val();
            var nama_obat = $('#namadetailobatpembelian option:selected').text();
            var diskon = $('#diskondetailpembelian').val();
            var hna = 0;
            var netto = Math.round(parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)));
            // var textnetto = formatRupiah(netto,  'Rp. ');
            var sub_total = Math.round((parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)))*parseFloat(qty));
            // var textsub_total = formatRupiah(sub_total, 'Rp. ');
            $.ajax({
                type: 'POST',
                async: false,
                data: {id_obat:id_obat},
                url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                dataType : 'json',
                success: function(data){
                    kode_obat = 'OBT00'+data.id_obat+'';
                    satuan = data.satuan;
                    namasatuan = data.namasatuan;
                    hna = data.hna;

                }
            });
            var rowIdCnt = {};
        
            // loop through check tds
            $("#table_detailpembelian_stok_obat tr td[col=id_obat]").each(function() {
        
                // grab row identifer to check against other rows        
                var rowId = $(this).attr("rowid");
                if (rowId in rowIdCnt) {
                    rowIdCnt[rowId]++;
                } else {
                    rowIdCnt[rowId] = 1;
                }
        
            });

        
            if (rowIdCnt[id_obat] > 0) {
                Swal.fire({
                    text: 'Obat Sudah terinput, Ingin Mengganti Kuantitas ?',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }

            else if(harga < hna){
                Swal.fire({
                    text: 'Harga Yang di inputkan kurang dari HNA = '+formatRupiah(hna, 'Rp. ')+' ',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
            else{
                // var table = document.getElementById('table_detailpembelian_stok_obat');
                // var rowCount = table.rows.length;
                // var row = table.insertRow(rowCount);
                // var colCount = table.rows[0].cells.length;
                // var newcell = [];
                // for(var i=0; i<13; i++) {
                //      newcell[i]	= row.insertCell(i);
                // }
                // newcell[0].innerHTML = rowCount;
                // newcell[1].innerHTML = nama_obat;
                // newcell[2].innerHTML = qty;
                // newcell[3].innerHTML = namasatuan;
                // newcell[4].innerHTML = textharga;
                // newcell[5].innerHTML = diskon;
                // newcell[6].innerHTML = formatRupiah(netto.toString(), 'Rp. ');
                // newcell[7].innerHTML = formatRupiah(sub_total.toString(), 'Rp. ');newcell[7].classList.add('subtotaldetailpembelian');
                // newcell[8].innerHTML = '<a role="button" class="btn-edit-deleted-selectedrow-detailpembelian" ><span class="badge badge-danger">Hapus</span></a>';
                // newcell[9].innerHTML = harga; newcell[9].classList.add('d-none');
                // newcell[10].innerHTML = netto; newcell[10].classList.add('d-none');
                // newcell[11].innerHTML = id_obat; newcell[11].setAttribute('rowid', id_obat);newcell[11].setAttribute('col', 'id_obat'); newcell[11].classList.add('d-none');
                // newcell[12].innerHTML = satuan; newcell[12].classList.add('d-none');

             $('#table_detailpembelian_stok_obat tbody:last-child').append(     
                    '<tr id="'+document.getElementById('table_detailpembelian_stok_obat').rows.length+'">'+
                        '<td>'+nama_obat+'</td>'+
                        '<td>'+parseInt(qty)+'</td>'+
                        '<td>'+namasatuan+'</td>'+
                        '<td>'+textharga+'</td>'+
                        '<td>'+parseFloat(diskon)+'</td>'+
                        '<td>'+formatRupiah(netto.toString(), 'Rp. ')+'</td>'+
                        '<td class="subtotaldetailpembelian">'+formatRupiah(sub_total.toString(), 'Rp. ')+'</td>'+
                        '<td><a role="button" class="btn-edit-deleted-selectedrow-detailpembelian" ><span class="badge badge-danger">Hapus</span></a></td>' +
                        '<td col="harga" rowid="'+harga+'" style="display: none;">'+harga+'</td>'+
                        '<td col="netto" rowid="'+netto+'" style="display: none;">'+netto+'</td>'+
                        '<td col="id_obat" rowid="'+id_obat+'" style="display: none;">'+id_obat+'</td>'+
                        '<td col="satuan" rowid="'+satuan+'" style="display: none;">'+satuan+'</td>'+
                    '</tr>'
                );

            }
}

function tambah_data_detailpenjualan(id_obat)
{

            var id_obat = id_obat;
            var html = '';
            var kode_obat = '';
            var qty = document.getElementById('qtydetailpenjualan').value;
            var harga = document.getElementById('hargadetailpenjualan').value.replace(/\D/g, '');
            var textharga = document.getElementById('hargadetailpenjualan').value;
            var satuan = '';
            var namasatuan = '';
            // var stok = $('#hargapenjualan').val();
            var nama_obat = $('#namadetailobatpenjualan option:selected').text();
            var diskon = $('#diskondetailpenjualan').val();
            var max_diskon = 0;
            var min_hj = 0;
            var netto = Math.round(parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)));
            // var textnetto = formatRupiah(netto,  'Rp. ');
            var sub_total = Math.round((parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)))*parseFloat(qty));
            // var textsub_total = formatRupiah(sub_total, 'Rp. ');
            $.ajax({
                type: 'POST',
                async: false,
                data: {id_obat:id_obat},
                url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                dataType : 'json',
                success: function(data){
                    kode_obat = 'OBT00'+data.id_obat+'';
                    satuan = data.satuan;
                    namasatuan = data.namasatuan;
                    max_diskon = data.max_diskon;
                    min_hj = data.hj;
                }
            });
            var rowIdCnt = {};
        
            // loop through check tds
            $("#table_detailpenjualan_stok_obat tr td[col=id_obat]").each(function() {
        
                // grab row identifer to check against other rows        
                var rowId = $(this).attr("rowid");
                if (rowId in rowIdCnt) {
                    rowIdCnt[rowId]++;
                } else {
                    rowIdCnt[rowId] = 1;
                }
        
            });

        
            if (rowIdCnt[id_obat] > 0) {
                Swal.fire({
                    text: 'Obat Sudah terinput, Ingin Mengganti Kuantitas ?',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
            else if(max_diskon < parseFloat(diskon)){
                Swal.fire({
                    text: 'Diskon Melebihi Maksimum Diskon yang ditentukan = '+max_diskon+'%',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
            else if(min_hj > parseFloat(harga)){
                Swal.fire({
                    text: 'Harga Jual Kurang dari Harga Jual yang ditentukan = '+formatRupiah(min_hj, 'Rp. ')+'%',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
            else{
             $('#table_detailpenjualan_stok_obat tbody:last-child').append(     
                    '<tr id="'+document.getElementById('table_detailpenjualan_stok_obat').rows.length+'">'+
                        '<td>'+nama_obat+'</td>'+
                        '<td>'+parseInt(qty)+'</td>'+
                        '<td>'+namasatuan+'</td>'+
                        '<td>'+textharga+'</td>'+
                        '<td>'+parseFloat(diskon)+'</td>'+
                        '<td>'+formatRupiah(netto.toString(), 'Rp. ')+'</td>'+
                        '<td class="subtotaldetailpenjualan">'+formatRupiah(sub_total.toString(), 'Rp. ')+'</td>'+
                        '<td><a role="button" class="btn-edit-deleted-selectedrow-detailpenjualan" ><span class="badge badge-danger">Hapus</span></a></td>' +
                        '<td col="harga" rowid="'+harga+'" style="display: none;">'+harga+'</td>'+
                        '<td col="netto" rowid="'+netto+'" style="display: none;">'+netto+'</td>'+
                        '<td col="id_obat" rowid="'+id_obat+'" style="display: none;">'+id_obat+'</td>'+
                        '<td col="satuan" rowid="'+satuan+'" style="display: none;">'+satuan+'</td>'+
                    '</tr>'
                );
            }
}

function tambah_data_penjualan(id_obat)
{

            var id_obat = id_obat;
            var kode_obat = '';
            var qty = document.getElementById('qtypenjualan').value;
            var harga = document.getElementById('hargapenjualan').value.replace(/\D/g, '');
            var textharga = document.getElementById('hargapenjualan').value;
            var satuan = '';
            var namasatuan = '';
            // var stok = $('#hargapembelian').val();
            var nama_obat = $('#namaobatpenjualan option:selected').text();
            var diskon = $('#diskonpenjualan').val();
            var max_diskon = 0;
            var hj = 0;
            var hpp = 0;
            var netto =  Math.round(parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)));
            var sub_total = Math.round(netto*parseFloat(qty));
            $.ajax({
                type: 'POST',
                async: false,
                data: {id_obat:id_obat},
                url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                dataType : 'json',
                success: function(data){
                    kode_obat = 'OBT00'+data.id_obat+'';
                    satuan = data.satuan;
                    namasatuan = data.namasatuan;
                    max_diskon = data.max_diskon;
                    hj = data.hj;
                    hpp = data.hpp_avg;
                    
                }
            });
            var rowIdCnt = {};
        
            // loop through check tds
            $("#table_penjualan_stok_obat tr td[col=id_obat]").each(function() {
        
                // grab row identifer to check against other rows        
                var rowId = $(this).attr("rowid");
                if (rowId in rowIdCnt) {
                    rowIdCnt[rowId]++;
                } else {
                    rowIdCnt[rowId] = 1;
                }
        
            });

        
            if (rowIdCnt[id_obat] > 0) {
                Swal.fire({
                    text: 'Obat Sudah terinput, Ingin Mengganti Kuantitas ?',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
            else{
                $('#table_penjualan_stok_obat tbody:last-child').append(     
                    '<tr id="'+$('#table_penjualan_stok_obat >  tbody >  tr').length+'">'+
                        '<td>'+nama_obat+'</td>'+
                        '<td>'+parseInt(qty)+'</td>'+
                        '<td>'+namasatuan+'</td>'+
                        '<td>'+textharga+'</td>'+
                        '<td>'+parseFloat(diskon)+'</td>'+
                        '<td>'+formatRupiah(netto.toString(), 'Rp. ')+'</td>'+
                        '<td class="subtotalpenjualan">'+formatRupiah(sub_total.toString(), 'Rp. ')+'</td>'+
                        '<td><a role="button" class="btn-delete-selectedrowpenjualan" ><span class="badge badge-danger">Hapus</span></a></td>' +
                        '<td col="harga" rowid="'+harga+'" style="display: none;">'+harga+'</td>'+
                        '<td col="netto" rowid="'+netto+'" style="display: none;">'+netto+'</td>'+
                        '<td col="id_obat" rowid="'+id_obat+'" style="display: none;">'+id_obat+'</td>'+
                        '<td col="satuan" rowid="'+satuan+'" style="display: none;">'+satuan+'</td>'+
                        '<td col="hpp" rowid="'+hpp+'" style="display: none;">'+hpp+'</td>'+
                    '</tr>'
                );
                
            }
}

function totalPrice(transaksi){
    var sum = 0;
    var sum1 = 0;
    if (transaksi == 'pembelian' ) {
        $(".subtotalpembelian").each(function(){
            if ($(this).val() == '') {
                sum += 0;
            } else {      
                sum += parseFloat($(this).val().replace(/\D/g, ''));
            }
        });
        document.getElementById('totalpembelian').innerHTML = formatRupiah(sum.toString(), 'Rp. ');
        document.getElementById('totalbayarpembelian').value = formatRupiah(sum.toString(), 'Rp. ');
        let totalkembalian = parseInt(document.getElementById('totalbayarpembelian').value.replace(/\D/g, ''))- parseInt(sum);
        document.getElementById('totalkembalianpembelian').value = totalkembalian ;
    }else if(transaksi == 'pembayarantoko'){
        document.getElementById('totalbayarpembayarantoko').value = document.getElementById('sisahutangpembayarantoko').value;
        let totalkembalian = parseInt(document.getElementById('totalbayarpembayarantoko').value.replace(/\D/g, ''))- parseInt(document.getElementById('sisahutangpembayarantoko').value.replace(/\D/g, ''));
        document.getElementById('totalkembalianpembayarantoko').value = totalkembalian ;
    }else if(transaksi == 'pembayarancustomer'){
        document.getElementById('totalbayarpembayarancustomer').value = document.getElementById('sisahutangpembayarancustomer').value;
        let totalkembalian = parseInt(document.getElementById('totalbayarpembayarancustomer').value.replace(/\D/g, ''))- parseInt(document.getElementById('sisahutangpembayarancustomer').value.replace(/\D/g, ''));
        document.getElementById('totalkembalianpembayarancustomer').value = totalkembalian ;
    }else if(transaksi == 'detailpembelian'){
        $(".subtotaldetailpembelian").each(function(){
            sum += parseFloat($(this).html().replace(/\D/g, ''));
        });
        document.getElementById('detailtotalpembelian').innerHTML = formatRupiah(sum.toString(), 'Rp. ');
        document.getElementById('detailtotalkembalianpembelian').value = formatRupiah(sum.toString(), 'Rp. ') ;
    }else if(transaksi == 'detailpenjualan'){
        $(".subtotaldetailpenjualan").each(function(){
            sum += parseFloat($(this).html().replace(/\D/g, ''));
        });
        document.getElementById('detailtotalpenjualan').innerHTML = formatRupiah(sum.toString(), 'Rp. ');
        document.getElementById('detailtotalkembalianpenjualan').value = formatRupiah(sum.toString(), 'Rp. ') ;
        document.getElementById('detailtotalhutangpenjualan').value = formatRupiah(sum.toString(), 'Rp. ') ;
    }
    else {
        $(".subtotalpenjualan").each(function(){
            if ($(this).val() == '') {
                sum1 += 0;
            } else {      
                sum1 += parseFloat($(this).val().replace(/\D/g, ''));
            }
        });
        document.getElementById('totalpenjualan').innerHTML = formatRupiah(sum1.toString(), 'Rp. ');
        document.getElementById('totalbayarpenjualan').value = formatRupiah(sum1.toString(), 'Rp. ');
        let totalkembalian = parseInt(document.getElementById('totalbayarpenjualan').value.replace(/\D/g, ''))- parseInt(sum1);
        document.getElementById('totalkembalianpenjualan').value = totalkembalian ;
    }

}


function simpanpembayarantoko(kodepembelian, totalbayar, metodepembayaran, tanggal_pembayaran, deskripsipembayarantoko,kode,sisa)
{
    var datapembayarantoko = [];
    var kembalian = 0;
    if (parseInt(totalbayar.replace(/\D/g, '')) >= parseInt(sisa.replace(/\D/g, ''))) {
        kembalian = parseFloat(totalbayar.replace(/\D/g, '')) - parseFloat(sisa.replace(/\D/g, ''));
    } else {
        kembalian = 0;
    }
    var data2 = {
        'pembelian_id' : kodepembelian,
        'kode_pembelian' : kode,
        'tanggal_pembayaran' : tanggal_pembayaran,
        'metode_pembayaran' : metodepembayaran,
        'total_pembayaran' : parseInt(totalbayar.replace(/\D/g, '')) - kembalian,
        'grand_kembalian' : kembalian,
        'deskripsi': deskripsipembayarantoko,
        'created_by': document.getElementById('id').value,
    }
    datapembayarantoko.push(data2);
    var data1 = {  'datapembayaran' : datapembayarantoko};
    $.ajax({
        type: 'POST',
        data: data1,
        url: ''+document.location.origin+'/pembayaran/addpembayarantoko/',
        dataType : 'json',
        success: function(status){
            console.log(status);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
        } 
    });
    window.location.href=''+document.location.origin+'/pembayaran/pembayarantoko';

}

function simpanpembayarancustomer(kodepenjualan, totalbayar, metodepembayaran, tanggal_pembayaran, deskripsipembayarancustomer,sisa , kode)
{
    var datapembayarancustomer = [];
    var kembalian = 0;
    if (parseInt(totalbayar.replace(/\D/g, '')) >= parseInt(sisa.replace(/\D/g, ''))) {
        kembalian = parseFloat(totalbayar.replace(/\D/g, '')) - parseFloat(sisa.replace(/\D/g, ''));
    } else {
        kembalian = 0;
    }
    var data2 = {
        'penjualan_id' : kodepenjualan,
        'kode_penjualan' : kode,
        'tanggal_pembayaran' : tanggal_pembayaran,
        'metode_pembayaran' : metodepembayaran,
        'total_pembayaran' : parseInt(totalbayar.replace(/\D/g, '')) - kembalian,
        'grand_kembalian' : kembalian,
        'deskripsi': deskripsipembayarancustomer,
        'created_by': document.getElementById('id').value,
    }
    datapembayarancustomer.push(data2);
    var data1 = {  'datapembayaran' : datapembayarancustomer};
    $.ajax({
        type: 'POST',
        data: data1,
        url: ''+document.location.origin+'/pembayaran/addpembayarancustomer/',
        dataType : 'json',
        success: function(status){
        }
    });
    window.location.href=''+document.location.origin+'/pembayaran/pembayarancustomer';

}


function simpandatadetailpembelian()
{
        var deskripsi = document.getElementById('deskripsipembelian').value;
        var status_pembelian = 0;
        var datapembelian = [];
        var datadetailpembelian = [];
        var sub = {
            'id_pembelian' : document.getElementById('detail_id_pembelian').value,
            'kode_pembelian' : document.getElementById('detail_kode_pembelian').value,
            'supplier_id' : document.getElementById('detailsupplierpembelian').value, 
            'no_nota' : document.getElementById('detailno_notapembelian').value, 
            'grand_total' : document.getElementById('detailtotalpembelian').innerHTML.replace(/\D/g, ''), 
            'grand_kembalian' : 0, 
            'total_sisa' : document.getElementById('detailtotalpembelian').innerHTML.replace(/\D/g, ''),
            'status_pembelian' : 1, 
            'tanggal_pembelian' : document.getElementById('detailtanggalpembelian').value, 
            'created_by' : document.getElementById('id').value,
            'keterangan_pembelian' : document.getElementById('detaildeskripsipembelian').value,
        };

        datapembelian.push(sub);
        $('#table_detailpembelian_stok_obat tbody tr').each(function(row,tr){

            var sub1 = {
                'pembelian_id' : '', 
                'obat_id' : $(tr).find('td:eq(10)').text(), 
                'qty' : $(tr).find('td:eq(1)').text(), 
                'harga' : $(tr).find('td:eq(8)').text(),
                'diskon' : $(tr).find('td:eq(4)').text(),  
            }
            datadetailpembelian.push(sub1);
            console.log(datadetailpembelian);
            console.log(datapembelian);
        });
        var data1 = {  'datapembelian' : datapembelian ,'datadetailpembelian' : datadetailpembelian};
        console.log(data1);
        $.ajax({
            type: 'POST',
            data: data1,
            url: ''+document.location.origin+'/stok/editpembelian/',
            dataType : 'json',
            success: function(status){
                console.log(status.tambahpembelian);
                console.log(status.tambahdetailpembelian);
            }
        });
        window.location.href=''+document.location.origin+'/stok/stok_in';
}

function simpandatadetailpenjualan()
{

        var datapenjualan = [];
        var datadetailpenjualan = [];
        var sub = {
            'id_penjualan' : document.getElementById('detail_id_penjualan').value,
            'kode_penjualan' : document.getElementById('detail_kode_penjualan').value,
            'customer_id' : document.getElementById('detailcustomerpenjualan').value, 
            'grand_total' : document.getElementById('detailtotalpenjualan').innerHTML.replace(/\D/g, ''), 
            'grand_kembalian' : 0, 
            'total_sisa' : document.getElementById('detailtotalpenjualan').innerHTML.replace(/\D/g, ''),
            'status_penjualan' : 1, 
            'tanggal_penjualan' : document.getElementById('detailtanggalpenjualan').value, 
            'created_by' : document.getElementById('id').value,
            'keterangan_penjualan' : document.getElementById('detaildeskripsipenjualan').value,
        };

        datapenjualan.push(sub);
        $('#table_detailpenjualan_stok_obat tbody tr').each(function(row,tr){

            var sub1 = {
                'penjualan_id' : '', 
                'obat_id' : $(tr).find('td:eq(10)').text(), 
                'qty' : $(tr).find('td:eq(1)').text(), 
                'harga' : $(tr).find('td:eq(8)').text(),
                'diskon' : $(tr).find('td:eq(4)').text(),  
            }
            datadetailpenjualan.push(sub1);
            console.log(datadetailpenjualan);
            console.log(datapenjualan);
        });
        var data1 = {  'datapenjualan' : datapenjualan ,'datadetailpenjualan' : datadetailpenjualan};
        console.log(data1);
        $.ajax({
            type: 'POST',
            data: data1,
            url: ''+document.location.origin+'/stok/editpenjualan/',
            dataType : 'json',
            success: function(status){
                console.log(status.tambahpenjualan);
                console.log(status.tambahdetailpenjualan);
            }
        });
        window.location.href=''+document.location.origin+'/stok/stok_out';
}

function simpandatapembelian()
{
        const total = document.getElementById('totalpembelian');
        const totalbayar = document.getElementById('totalbayarpembelian');
        var deskripsi = document.getElementById('deskripsipembelian').value;
        var sisa = 0;
        var kembalian = 0;
        var status_pembelian = 0;
        var datapembelian = [];
        var datadetailpembelian = [];
        var datapembayaran = [];
        var datahistory = [];
        if (parseInt(totalbayar.value.replace(/\D/g, '')) >= parseInt(total.innerHTML.replace(/\D/g, ''))) {
            status_pembelian = 0;
            sisa = 0;
            kembalian = parseFloat(totalbayar.value.replace(/\D/g, '')) - parseFloat(total.innerHTML.replace(/\D/g, ''));
        } else {
            status_pembelian = 1;
            sisa = Math.abs(parseFloat(document.getElementById('totalkembalianpembelian').value.replace(/\D/g, '')));
            kembalian = 0;
        }
        var sub = {
            'supplier_id' : document.getElementById('supplierpembelian').value, 
            'no_nota' : document.getElementById('no_notapembelian').value, 
            'grand_total' : document.getElementById('totalpembelian').innerHTML.replace(/\D/g, ''), 
            'grand_kembalian' : kembalian, 
            'total_sisa' :sisa,
            'status_pembelian' : status_pembelian, 
            'tanggal_pembelian' : document.getElementById('tanggalpembelian').value, 
            'created_by' : document.getElementById('id').value,
            'keterangan_pembelian' : document.getElementById('deskripsipembelian').value,
        };
        var sub2 = {
            'pembelian_id' : '',
            'tanggal_pembayaran' : document.getElementById('tanggalpembelian').value,
            'metode_pembayaran' : document.getElementById('metodepembayaranpembelian').value,
            'total_pembayaran' : parseInt(document.getElementById('totalbayarpembelian').value.replace(/\D/g, ''))- kembalian,
            'deskripsi' : ''+document.getElementById('id').value+' melakukan input pembelian dan melakukan pembayaran = lunas',
            'created_by' : document.getElementById('id').value,
        };
        var sub3 = {
            'pembelian_id' : 1,
        }
        datapembelian.push(sub);
        if (status_pembelian == 0 || parseInt(totalbayar.value.replace(/\D/g, '')) != 0 ) {           
            datapembayaran.push(sub2);
        }else{
            datapembayaran.push(sub3);
        }
        $('#item_table tr').not(':first').each(function(row,tr){
            var sub4 = {
                'obat_id' : $(tr).find('td:eq(0)').find('select').val(), 
                'keterangan' : ''+document.getElementById('id').value+' M', 
            };
            var sub1 = {
                'pembelian_id' : '', 
                'obat_id' : $(tr).find('td:eq(0)').find('select').val(), 
                'qty' : $(tr).find('td:eq(1)').find('input').val(), 
                'harga' : $(tr).find('td:eq(3)').find('input').val().replace(/\D/g, ''),
                'diskon' : $(tr).find('td:eq(4)').find('input').val(),  
            }
            datadetailpembelian.push(sub1);
            datahistory.push(sub4);
            console.log(datadetailpembelian);
            console.log(datapembelian);
        });
        var data1 = {  'datapembelian' : datapembelian ,'datadetailpembelian' : datadetailpembelian, 'datapembayaran' : datapembayaran};
        console.log(data1);
        $.ajax({
            type: 'POST',
            data: data1,
            url: ''+document.location.origin+'/stok/addpembelian/',
            dataType : 'json',
            success: function(status){
            }
        });
        window.location.href=''+document.location.origin+'/stok/stok_in';
}

function simpandatapenjualan()
{
        const total = document.getElementById('totalpenjualan');
        const totalbayar = document.getElementById('totalbayarpenjualan');
        var sisa = 0;
        var kembalian = 0;
        var status_penjualan = 0;
        var datapenjualan = [];
        var datadetailpenjualan = [];
        var datapembayaran = [];

        if (parseFloat(totalbayar.value.replace(/\D/g, '')) >= parseFloat(total.innerHTML.replace(/\D/g, ''))) {
            status_penjualan = 0;
            sisa = 0;
            kembalian = parseFloat(totalbayar.value.replace(/\D/g, '')) - parseFloat(total.innerHTML.replace(/\D/g, ''));
        } else {
            status_penjualan = 1;
            sisa = Math.abs(parseFloat(document.getElementById('totalkembalianpenjualan').value.replace(/\D/g, '')));
            kembalian = 0;
        }

        var sub = {
            'customer_id' : document.getElementById('customerpenjualan').value, 
            'grand_total' : document.getElementById('totalpenjualan').innerHTML.replace(/\D/g, ''), 
            'grand_kembalian' : kembalian, 
            'total_sisa' : sisa, 
            'status_penjualan' : status_penjualan, 
            'tanggal_penjualan' : document.getElementById('tanggalpenjualan').value, 
            'created_by' : document.getElementById('id').value, 
        };

        var sub2 = {
            'penjualan_id' : '',
            'tanggal_pembayaran' : document.getElementById('tanggalpenjualan').value,
            'metode_pembayaran' : document.getElementById('metodepembayaranpenjualan').value,
            'total_pembayaran' : parseInt(document.getElementById('totalbayarpenjualan').value.replace(/\D/g, '')) - kembalian,
            'deskripsi' : ''+document.getElementById('id').value+' melakukan input penjualan dan melakukan pembayaran = '+formatRupiah(totalbayar.value.toString(), 'Rp. ')+'',
            'created_by' : document.getElementById('id').value,
        };
        var sub3 = {
            'penjualan_id' : 1,
        };
        datapenjualan.push(sub);
        if (status_penjualan == 0 || parseInt(totalbayar.value.replace(/\D/g, '')) != 0) {           
            datapembayaran.push(sub2);
        }else{
            datapembayaran.push(sub3);
        }
        $('#item_table_penjualan tr').not(':first').each(function(row,tr){
            var sub1 = {
                'penjualan_id' : '', 
                'obat_id' : $(tr).find('td:eq(0)').find('select').val(), 
                'qty' : $(tr).find('td:eq(1)').find('input').val(), 
                'harga' : $(tr).find('td:eq(3)').find('input').val().replace(/\D/g, ''),
                'diskon' : $(tr).find('td:eq(4)').find('input').val(),
                'hpp' : $(tr).find('td:eq(7)').find('input').val().replace(/\D/g, ''),
            }
            datadetailpenjualan.push(sub1);
            console.log(datadetailpenjualan);
            console.log(datapenjualan);
        });
        var data1 = {  'datapenjualan' : datapenjualan ,'datadetailpenjualan' : datadetailpenjualan, 'datapembayaran' : datapembayaran};
        console.log(data1);
        $.ajax({
            type: 'POST',
            data: data1,
            url: ''+document.location.origin+'/stok/addpenjualan/',
            dataType : 'json',
            success: function(data){
                console.log(data);;
                // console.log(data);
                Swal.fire({
                    html: `Print Struk ??`,
                    icon: "info",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Ok, got it!",
                    cancelButtonText: 'Nope, cancel it',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                    
                }).then((result1) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result1.isConfirmed) {
                        let w =  window.open(
                            ''+document.location.origin+'/Stok/printstruk/'+data+''
                          );
                        w.print();
                        window.location.href=''+document.location.origin+'/stok/stok_out';
                    } else {
                        window.location.href=''+document.location.origin+'/stok/stok_out';
                    }
                  });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
            }  
        });
}

function modalviewdetailpembelian(id_pembelian)
{
    var datadetailpembelian = [];
    $.ajax({
        type: 'POST',
        data: {id_pembelian:id_pembelian},
        url: ''+document.location.origin+'/Stok/fetch_data_detailpembelian/',
        dataType : 'json',
        success: function(data){
            var html = '';
            var tempD = data.pembelian.tanggal_pembelian.split("-");
            var j = 1;
            var netto = 0;
            var sub_total = 0;
            var total = 0;
            myDate = tempD[0] + "-" + tempD[1] + "-" + tempD[2]; 
            document.getElementById('detailtanggalpembelian').value = myDate;
            document.getElementById('detail_kode_pembelian').value = data.pembelian.kode_pembelian;
            document.getElementById('detail_id_pembelian').value = data.pembelian.id_pembelian;
            document.getElementById('detailno_notapembelian').value = data.pembelian.no_nota;
            $("#detailsupplierpembelian").val(data.pembelian.supplier_id).trigger('change');
            document.getElementById('detaildeskripsipembelian').innerHTML = data.pembelian.keterangan_pembelian;
            // document.getElementById('detailtotalpembelian').innerHTML = data.pembelian.grand_total;

            
            if (data.pembelian.total_sisa - data.pembelian.grand_total == 0) {
                document.getElementById('content-detail-2').classList.add('d-none');
                document.getElementById('content-detail-1').classList.remove('d-none');
                for (i = 0; i < data.detailpembelian.length; i++) {
                    var tempdata = {
                        'id_obat' : data.detailpembelian[i].obat_id,
                        'qty' : data.detailpembelian[i].qty,
                        'harga' : formatRupiah(data.detailpembelian[i].harga, 'Rp. '),
                        'diskon' : data.detailpembelian[i].diskon,
                        'satuan' : data.detailpembelian[i].satuan,
                    }
                    datadetailpembelian.push(tempdata);
                    console.log(datadetailpembelian[0].id_obat);
                    $('#item_detail_table tbody').html(add_input_field(i));
                    $('.selectdetailpickerpembelian').select2({
                        ajax : {
                            url : '' + document.location.origin + '/Obat/list_obat/',
                            type: 'POST',
                            dataType : 'json',
                            data: function(params)
                            {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                // Transforms the top-level key of the response object from 'items' to 'results'
                                return {
                                    results: data
                                };
                            }
                        },
                    });
                    $('#item_detail_table tbody tr').each(function(row, tr){
                        netto = Math.round(parseFloat(data.detailpembelian[i].harga.replace(/\D/g, '')) -(parseFloat(data.detailpembelian[i].harga.replace(/\D/g, ''))*(parseFloat(data.detailpembelian[i].diskon)/100)));
                        sub_total = Math.round(netto*parseInt(data.detailpembelian[i].qty));
                        $(tr).find('td:eq(0)').find('select').val(data.detailpembelian[i].obat_id).trigger('change');
                        $(tr).find('td:eq(3)').find('input').val(formatRupiah(data.detailpembelian[i].harga, 'Rp. '));
                        $(tr).find('td:eq(2)').find('input').val(data.detailpembelian[i].satuan);
                        $(tr).find('td:eq(4)').find('input').val(parseFloat(data.detailpembelian[i].diskon));
                        $(tr).find('td:eq(1)').find('input').val(parseFloat(data.detailpembelian[i].qty));                  
                        $(tr).find('td:eq(5)').find('input').val(formatRupiah(netto.toString(), 'Rp. '));         
                        $(tr).find('td:eq(6)').find('input').val(formatRupiah(sub_total.toString(), 'Rp. '));
                        console.log($(tr).find('td:eq(0)').find('select option').val());
                    })
                }
                document.getElementById('detailtotalpembelian').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                document.getElementById('detailtanggalpembelian').removeAttribute('readonly');
                document.getElementById('detailno_notapembelian').removeAttribute('readonly');
                document.getElementById('detailsupplierpembelian').removeAttribute('disabled');
                document.getElementById('detailtotalbayarpembelian').value = formatRupiah((data.pembelian.grand_total - data.pembelian.total_sisa).toString(), 'Rp. ');
                document.getElementById('detailtotalhutangpembelian').value = formatRupiah((data.pembelian.total_sisa).toString(), 'Rp. ');
                document.getElementById('detailtotalkembalianpembelian').value = formatRupiah((data.pembelian.grand_kembalian).toString(), 'Rp. ');
                document.getElementById('close_edit_pembelian').classList.remove('d-none');
                document.getElementById('simpan_edit_pembelian').classList.remove('d-none');
            } else {
                document.getElementById('content-detail-1').classList.add('d-none');
                document.getElementById('content-detail-2').classList.remove('d-none');
                for (i = 0; i < data.detailpembelian.length; i++) {
                    netto = Math.round(parseFloat(data.detailpembelian[i].harga) -(parseFloat(data.detailpembelian[i].harga)*(parseFloat(data.detailpembelian[i].diskon)/100)));
                    sub_total = Math.round(netto*parseInt(data.detailpembelian[i].qty));
                    html += '<tr>' +
                                '<td>' + data.detailpembelian[i].nama_obat + '</td>' +
                                '<td>' + data.detailpembelian[i].qty + '</td>' +
                                '<td>' + data.detailpembelian[i].satuan  + '</td>' +
                                '<td>' + formatRupiah(data.detailpembelian[i].harga, 'Rp. ')  + '</td>' +
                                '<td>' + ''+data.detailpembelian[i].diskon+'%' + '</td>' +
                                '<td>' + formatRupiah(netto.toString(), 'Rp. ') + '</td>' +
                                '<td>' + formatRupiah(sub_total.toString(), 'Rp. ') + '</td>' +
                            '</tr>';
                    j++;
                    total += parseFloat(sub_total);
                }
                document.getElementById('simpan_edit_pembelian').classList.add('d-none');
                document.getElementById('close_edit_pembelian').classList.remove('d-none');
                document.getElementById('detailtotalpembelian1').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                document.getElementById('detailtotalbayarpembelian').value = formatRupiah((data.pembelian.grand_total - data.pembelian.total_sisa).toString(), 'Rp. ');
                document.getElementById('detailtotalkembalianpembelian').value = formatRupiah((data.pembelian.grand_kembalian).toString(), 'Rp. ');
                document.getElementById('detailtotalhutangpembelian').value = formatRupiah((data.pembelian.total_sisa).toString(), 'Rp. ');
                $('#table_detailpembelian_stok_obat1 tbody').html(html);
            }

            

            
        }
    });
        
    var same;
    function add_input_field(count)
    {

        var html = '';

        html += '<tr>';
        
        html += '<td style="width:275px"><select  data-dropdown-parent="#modaldetailpembelian > .modal-dialog > .modal-content" name="item_unit[]" class="form-control form-control-select selectdetailpickerpembelian"  data-control="select2" data-placeholder="Pilih Obat" data-allow-clear="true"><option></option></select></td>';
        html += '<td style="width:85px"><input min="0" type="number" name="qtypembelian[]" class="form-control qtydetailpembelian" /></td>';
        html += '<td style="width:100px"><input readonly type="text" name="satuanpembelian[]" class="form-control satuandetailpembelian" /></td>';
        html += '<td><input type="text" name="hargapembelian[]" class="form-control hargapembelian"  /></td>';
        html += '<td style="width:100px"><input min="0" type="number" name="diskonpembelian[]" class="form-control diskondetailpembelian" step="any" /></td>';
        html += '<td><input readonly  type="text" name="nettopembelian[]" class="form-control nettodetailpembelian" /></td>';
        html += '<td><input readonly  type="text" name="subtotalpembelian[]" class="form-control subtotaldetailpembelian" /></td>';



        var remove_button = '';

        if(count > 0)
        {
            remove_button = '<button type="button" name="remove" class="btn btn-danger btn-sm removedetail"><i class="fas fa-minus"></i></button>';
        }

        html += '<td>'+remove_button+'</td></tr>';

        return html;

    }
    
    $('#item_detail_table tbody tr').each(function(row, tr){
        console.log( $(tr).find('td:eq(0)').find('select option').val());
    })



    $(document).on('change', '.selectdetailpickerpembelian', function(){
        var id = $(this).closest('tr').find('td:eq(0)').find('select').val();
        var hna = 0;
        var namasatuan ;
        var rowIdCnt = {};
        $('.selectpicker').each(function(){
            var rowId = $(this).val();
            if (rowId != '') {
                if (rowId in rowIdCnt) {` `
                    rowIdCnt[rowId]++;
                    same = true
                } else {
                    rowIdCnt[rowId] = 1;
                    same = false;
                }
            }
		});
        if (same == true) {
            Swal.fire({
                text: 'Obat Sudah terinput, Ingin Mengganti Kuantitas ?',
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }) 
            $(this).closest('tr').find('td:eq(0)').find('select').val('').trigger('change');       
        }else{
            if (id != '') {
                $.ajax({
                    type: 'POST',
                    async: false,
                    data: {id_obat:id},
                    url: ''+document.location.origin+'/Stok/get_obat_by_id/',
                    dataType : 'json',
                    success: function(data){
                        hna = data.hna;
                        namasatuan = data.namasatuan;
                    }
                });
                $(this).closest('tr').find('td:eq(3)').find('input').val(formatRupiah(hna.toString(), 'Rp. '));
                $(this).closest('tr').find('td:eq(2)').find('input').val(namasatuan);
                $(this).closest('tr').find('td:eq(4)').find('input').val(parseFloat(0));
                $(this).closest('tr').find('td:eq(1)').find('input').val(parseFloat(0));                  
                $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(hna.toString(), 'Rp. '));         
                $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah('0', 'Rp. '));         
            }else{
                $(this).closest('tr').find('td:eq(3)').find('input').val(null);
                $(this).closest('tr').find('td:eq(2)').find('input').val(null);
                $(this).closest('tr').find('td:eq(4)').find('input').val(null);
                $(this).closest('tr').find('td:eq(1)').find('input').val(null);         
                $(this).closest('tr').find('td:eq(5)').find('input').val(null);         
                $(this).closest('tr').find('td:eq(6)').find('input').val(null);         
            }
        }

        // totalPrice('pembelian');
    })

    $(document).on('keyup change clear', '.qtydetailpembelian, .diskondetailpembelian, .hargadetailpembelian', function(){
        harga = parseFloat(($(this).closest('tr').find('td:eq(3)').find('input').val()).replace(/\D/g, ''));
        diskon = parseFloat(($(this).closest('tr').find('td:eq(4)').find('input').val()));
        qty = parseFloat(($(this).closest('tr').find('td:eq(1)').find('input').val()));
        netto = Math.round((harga)-(harga*(diskon/100)));
        sub_total = Math.round((parseFloat(harga)-(parseFloat(harga)*(parseFloat(diskon)/100)))*parseFloat(qty));
        if ($(this).hasClass('qtydetailpembelian') || $(this).hasClass('diskondetailpembelian')) {
            $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(netto.toString(), 'Rp. '));
            $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah(sub_total.toString(), 'Rp. '));
        }
        else if ($(this).hasClass('hargadetailpembelian')){      
            $(this).closest('tr').find('td:eq(3)').find('input').val(formatRupiah($(this).val(), 'Rp. '));
            $(this).closest('tr').find('td:eq(5)').find('input').val(formatRupiah(netto.toString(), 'Rp. '));
            $(this).closest('tr').find('td:eq(6)').find('input').val(formatRupiah(sub_total.toString(), 'Rp. '));
        }
        // totalPrice('pembelian');

    })


    $('#modaldetailpembelian').modal('show');
}

function modalviewdetailpenjualan(id_penjualan)
{
    $('#modalsampahpenjualan').modal('hide');
    $.ajax({
        type: 'POST',
        data: {id_penjualan:id_penjualan},
        url: ''+document.location.origin+'/Stok/fetch_data_detailpenjualan/',
        dataType : 'json',
        success: function(data){
            var html = '';
            var tempD = data.penjualan.tanggal_penjualan.split("-");
            var j = 1;
            var netto = 0;
            var sub_total = 0;
            var total = 0;
            myDate = tempD[0] + "-" + tempD[1] + "-" + tempD[2]; 
            document.getElementById('detailtanggalpenjualan').value = myDate;
            document.getElementById('detail_kode_penjualan').value = data.penjualan.kode_penjualan;
            document.getElementById('detail_id_penjualan').value = data.penjualan.id_penjualan;
            $("#detailcustomerpenjualan").val(data.penjualan.customer_id).trigger('change');
            document.getElementById('detaildeskripsipenjualan').innerHTML = data.penjualan.keterangan_penjualan;
            // document.getElementById('detailtotalpenjualan').innerHTML = data.penjualan.grand_total;
            if (data.penjualan.total_sisa - data.penjualan.grand_total == 0) {
                document.getElementById('edit_barang_out').classList.remove('d-none');
                for (i = 0; i < data.detailpenjualan.length; i++) {
                    netto = Math.round(parseFloat(data.detailpenjualan[i].harga) -(parseFloat(data.detailpenjualan[i].harga)*(parseFloat(data.detailpenjualan[i].diskon)/100)));
                    sub_total = Math.round(netto*parseInt(data.detailpenjualan[i].qty));
                    html += '<tr>' +
                                '<td>' + data.detailpenjualan[i].nama_obat + '</td>' +
                                '<td>' + data.detailpenjualan[i].qty + '</td>' +
                                '<td>' + data.detailpenjualan[i].satuan  + '</td>' +
                                '<td>' + formatRupiah(data.detailpenjualan[i].harga, 'Rp. ')  + '</td>' +
                                '<td>' + ''+data.detailpenjualan[i].diskon+'' + '</td>' +
                                '<td>' + formatRupiah(netto.toString(), 'Rp. ') + '</td>' +
                                '<td class="subtotaldetailpenjualan"> ' + formatRupiah(sub_total.toString(), 'Rp. ') + '</td>' +
                                '<td><a role="button" class="btn-edit-deleted-selectedrow-detailpenjualan" ><span class="badge badge-danger">Hapus</span></a></td>' +
                                '<td col="harga" rowid="'+data.detailpenjualan[i].harga+'" style="display: none;">'+data.detailpenjualan[i].harga+'</td>'+
                                '<td col="netto" rowid="'+netto+'" style="display: none;">'+netto+'</td>'+
                                '<td col="id_obat" rowid="'+data.detailpenjualan[i].obat_id+'" style="display: none;">'+data.detailpenjualan[i].obat_id+'</td>'+
                                '<td col="satuan" rowid="'+data.detailpenjualan[i].satuan+'" style="display: none;">'+data.detailpenjualan[i].satuan+'</td>'+
                            '</tr>';
                    j++;
                    total += parseFloat(sub_total);
                }
                document.getElementById('detailtotalpenjualan').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                document.getElementById('detailtanggalpenjualan').removeAttribute('readonly');
                document.getElementById('detailcustomerpenjualan').removeAttribute('disabled');
                document.getElementById('detailtotalbayarpenjualan').value = formatRupiah((data.penjualan.grand_total - data.penjualan.total_sisa).toString(), 'Rp. ');
                document.getElementById('detailtotalkembalianpenjualan').value = formatRupiah((data.penjualan.grand_kembalian).toString(), 'Rp. ');
                document.getElementById('detailtotalhutangpenjualan').value = formatRupiah((data.penjualan.total_sisa).toString(), 'Rp. ');
                document.getElementById('close_edit_penjualan').classList.remove('d-none');
                document.getElementById('simpan_edit_penjualan').classList.remove('d-none');
                $('#table_detailpenjualan_stok_obat tbody').html(html);

            } else {
                document.getElementById('edit_barang_out').classList.add('d-none');
                for (i = 0; i < data.detailpenjualan.length; i++) {
                    netto = Math.round(parseFloat(data.detailpenjualan[i].harga) -(parseFloat(data.detailpenjualan[i].harga)*(parseFloat(data.detailpenjualan[i].diskon)/100)));
                    sub_total = Math.round(netto*parseInt(data.detailpenjualan[i].qty));
                    html += '<tr>' +
                                '<td>' + data.detailpenjualan[i].nama_obat + '</td>' +
                                '<td>' + data.detailpenjualan[i].qty + '</td>' +
                                '<td>' + data.detailpenjualan[i].satuan  + '</td>' +
                                '<td>' + formatRupiah(data.detailpenjualan[i].harga, 'Rp. ')  + '</td>' +
                                '<td>' + ''+data.detailpenjualan[i].diskon+'%' + '</td>' +
                                '<td>' + formatRupiah(netto.toString(), 'Rp. ') + '</td>' +
                                '<td>' + formatRupiah(sub_total.toString(), 'Rp. ') + '</td>' +
                            '</tr>';
                    j++;
                    total += parseFloat(sub_total);
                }
                document.getElementById('simpan_edit_penjualan').classList.add('d-none');
                document.getElementById('close_edit_penjualan').classList.remove('d-none');
                document.getElementById('detailtotalpenjualan').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                document.getElementById('detailtotalbayarpenjualan').value = formatRupiah((data.penjualan.grand_total - data.penjualan.total_sisa).toString(), 'Rp. ');
                document.getElementById('detailtotalkembalianpenjualan').value = formatRupiah((data.penjualan.grand_kembalian).toString(), 'Rp. ');
                document.getElementById('detailtotalhutangpenjualan').value = formatRupiah((data.penjualan.total_sisa).toString(), 'Rp. ');
                $('#table_detailpenjualan_stok_obat tbody').html(html);
            }
            
        }
    });
    $('#modaldetailpenjualan').modal('show');
}

function modaleditkategoriobat(id_kategori,nama_kategori,deskripsi)
{
    $('#id_kategoriobat').val(id_kategori);
    $('#namakategoriobat').val(nama_kategori);
    $('#deskripsikategoriobat').val(deskripsi);
    $('#modaleditkategori').modal('show');
}

function modaleditjenisobat(id_jenis,nama_jenis,deskripsi)
{
    $('#id_jenisobat').val(id_jenis);
    $('#namajenisobat').val(nama_jenis);
    $('#deskripsijenisobat').val(deskripsi);
    $('#modaleditjenis').modal('show');
}

function modaleditsatuan(id_satuan,satuan,deskripsi)
{
    $('#id_satuan').val(id_satuan);
    $('#namasatuan').val(satuan);
    $('#deskripsisatuan').val(deskripsi);
    $('#modaleditsatuan').modal('show');
}

function modaleditsupplier(id_supplier,supplier,email_supplier,contact1,contact2,alamat)
{
    $('#id_supplier').val(id_supplier);
    $('#edit_nama_supplier').val(supplier);
    $('#edit_email_supplier').val(email_supplier);
    $('#edit_contact1_supplier').val(contact1);
    $('#edit_contact2_supplier').val(contact2);
    $('#edit_alamat_supplier').val(alamat);
    $('#modaleditsupplier').modal('show');
}

function modaleditcustomer(id_customer,customer,email_customer,contact1_customer,contact2_customer,alamat_customer)
{
    $('#id_customer').val(id_customer);
    $('#edit_nama_customer').val(customer);
    $('#edit_email_customer').val(email_customer);
    $('#edit_contact1_customer').val(contact1_customer);
    $('#edit_contact2_customer').val(contact2_customer);
    $('#edit_alamat_customer').val(alamat_customer);
    $('#modaleditcustomer').modal('show');
}

function modaleditobat(id_obat,kode_obat,kategori_obat,jenis_obat,nama_obat,satuan,hna,hpp,hj,max_diskon,minimum_stok,deskripsiobat)
{
    $('#edit_id_obat').val(id_obat);
    $('#edit_kode_obat').val(kode_obat);
    $("#edit_kategori_obat").val(kategori_obat).trigger('change');
    $("#edit_jenis_obat").val(jenis_obat).trigger('change');
    $('#edit_nama_obat').val(nama_obat);
    $("#edit_satuan_obat").val(satuan).trigger('change');
    $('#edit_hna').val(hna);
    $('#edit_hpp').val(hpp);
    $('#edit_hj').val(hj);
    $('#edit_min_stok').val(minimum_stok);
    $('#edit_max_disc').val(max_diskon);
    $('#edit_deskripsiobat').val(deskripsiobat);
    $('#modaleditobat').modal('show');
}

function modalhistoryobat(id_obat)
{
    if ($('#table_history_obat').length) {
        var i=1;
        $('#table_history_obat tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input  class="form-control form-control-solid"  type="text" placeholder="'+title+'" />' );
        } );
        $("#table_history_obat").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": false,
            "order": [[1, 'desc']],
            "ajax": '' + document.location.origin + '/Obat/listdata_historyobat/'+id_obat+'',
            dom: 'Bfrtip',
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5 rows', '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: "copy",
                    exportOptions: {
                        columns: []
                    }
                },
                {
                    extend: "excel",
                    title: "client_side_data"
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'print'
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": false,
                "orderable": false,
                "visible" : false,
            },],
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
    }
    $('#modalhistoryobat').modal('show');
}

function modaledituser(id_user,username,email_user,roles)
{
    $('#id_user').val(id_user);
    $('#edit_username_user').val(username);
    $('#edit_email_user').val(email_user);
    $("#edit_roles_user").val(roles).trigger('change');
    $('#modaledituser').modal('show');
}
function modaleditroles(id_roles,rolename,description,permission_id)
{
    $('#id_roles').val(id_roles);
    $('#edit_nama_roles').val(rolename);
    $('#edit_deskripsi_roles').val(description);
    $("#edit_permission_roles").val(permission_id).trigger('change');
    $('#modaleditroles').modal('show');
}

function modaleditpermissions(id_permissions,permissionsname,description)
{
    $('#id_permissions').val(id_permissions);
    $('#edit_nama_permissions').val(permissionsname);
    $('#edit_deskripsi_permissions').val(description);
    $.ajax({
        type: 'POST',
        data: {id_permissions:id_permissions},
        url: ''+document.location.origin+'/Account/fetch_data_menu/',
        dataType : 'json',
        success: function(data){
            for(var i in data) {
                if (data[i].level == 0) {
                    $('#'+data[i].id_menu+'').prop('checked',true);
                } else if(data[i].level == 1) {
                    $('#child'+data[i].id_menu+'').prop('checked',true);
                }else{
                    
                }

            }
        }
    });
    $('#modaleditpermissions').modal('show');
}

function modaleditpembayarantoko(id_pembayarantoko,tanggal_pembayaran,pembelian_id,metode_pembayaran,total_pembayaran,deskripsi)
{
    $('#editpembelian_id').select2({
        ajax : {
            url : '' + document.location.origin + '/Pembayaran/list_pembelian/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                  results: data
                };
            }
        }
    });
    document.getElementById('edittanggalpembayarantoko').value = tanggal_pembayaran;
    $.ajax({
        type: 'POST',
        async: false,
        data: {id_pembelian:pembelian_id},
        url: ''+document.location.origin+'/Pembayaran/get_datapembelian_by_id/' + pembelian_id + '',
        dataType : 'json',
        success: function(data){
            var html = '';
            var html1 = '';
            var j = 1;
            var netto = 0;
            var sub_total = 0;
            var total = 0;
            document.getElementById('editsisahutangpembayarantoko').value = formatRupiah(data.pembelian.total_sisa.toString(), 'Rp. ');
            document.getElementById('editsupplierpembelianpembayarantoko').value = data.pembelian.supplier;
            for (i = 0; i < data.detailpembelian.length; i++) {
                netto = Math.round(parseFloat(data.detailpembelian[i].harga) -(parseFloat(data.detailpembelian[i].harga)*(parseFloat(data.detailpembelian[i].diskon)/100)));
                sub_total = Math.round(netto*parseFloat(data.detailpembelian[i].qty));
                html += '<tr>' +
                            '<td>' + j + '</td>' +
                            '<td>' + data.detailpembelian[i].nama_obat + '</td>' +
                            '<td>' + data.detailpembelian[i].qty + '</td>' +
                            '<td>' + data.detailpembelian[i].satuan  + '</td>' +
                            '<td>' + formatRupiah(data.detailpembelian[i].harga, 'Rp. ')  + '</td>' +
                            '<td>' + ''+data.detailpembelian[i].diskon+'%' + '</td>' +
                            '<td>' + formatRupiah(netto.toString(), 'Rp. ') + '</td>' +
                            '<td>' + formatRupiah(sub_total.toString(), 'Rp. ') + '</td>' +
                        '</tr>';
                j++;
                total = total+parseFloat(sub_total);
            }
            console.log(total);
            document.getElementById('editviewtotalpembayarantoko').innerHTML = formatRupiah(total.toString(), 'Rp. ');
            $('#table_editpembayarantoko_view tbody').html(html);
        }
    });
    $('#editpembelian_id').change(function(){
        var id = this.value;
        var edit_pembelian_id = '';
        if (id == '') {
            edit_pembelian_id = pembelian_id;
        } else {
            edit_pembelian_id = id;
        }
        $.ajax({
            type: 'POST',
            async: false,
            data: {id_pembelian:edit_pembelian_id},
            url: ''+document.location.origin+'/Pembayaran/get_datapembelian_by_id/' + edit_pembelian_id + '',
            dataType : 'json',
            success: function(data){
                var html = '';
                var html1 = '';
                var j = 1;
                var netto = 0;
                var sub_total = 0;
                var total = 0;
                document.getElementById('editsisahutangpembayarantoko').value = formatRupiah(data.pembelian.total_sisa.toString(), 'Rp. ');
                document.getElementById('editsupplierpembelianpembayarantoko').value = data.pembelian.supplier;
                for (i = 0; i < data.detailpembelian.length; i++) {
                    netto = Math.round(parseFloat(data.detailpembelian[i].harga) -(parseFloat(data.detailpembelian[i].harga)*(parseFloat(data.detailpembelian[i].diskon)/100)));
                    sub_total = Math.round(netto*parseFloat(data.detailpembelian[i].qty));
                    html += '<tr>' +
                                '<td>' + j + '</td>' +
                                '<td>' + data.detailpembelian[i].nama_obat + '</td>' +
                                '<td>' + data.detailpembelian[i].qty + '</td>' +
                                '<td>' + data.detailpembelian[i].satuan  + '</td>' +
                                '<td>' + formatRupiah(data.detailpembelian[i].harga, 'Rp. ')  + '</td>' +
                                '<td>' + ''+data.detailpembelian[i].diskon+'%' + '</td>' +
                                '<td>' + formatRupiah(netto.toString(), 'Rp. ') + '</td>' +
                                '<td>' + formatRupiah(sub_total.toString(), 'Rp. ') + '</td>' +
                            '</tr>';
                    j++;
                    total = total+parseFloat(sub_total);
                }
                console.log(total);
                document.getElementById('editviewtotalpembayarantoko').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                $('#table_editpembayarantoko_view tbody').html(html);
            }
        });
    });
    $("#editkodepembelian").val(pembelian_id);
    $("#editid_pembayarantoko").val(id_pembayarantoko);
    $("#editmetodepembayaranpembayarantoko").val(metode_pembayaran).trigger('change');
    $("#edittotalbayarpembayarantoko").val(total_pembayaran);
    $("#editdeskripsipembayarantoko").val(deskripsi);
    document.getElementById('edit_pembayarantoko').addEventListener('click',function(event){
        Swal.fire({
            text: 'Edit Pembayaran Toko belum siap !!,Hapus data Lalu Buat ulang dengan Data yang benar',
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        })
    })
    $('#modaleditpembayarantoko').modal('show');
}

function modaleditpembelianlainnya(id_pembelianlainnya,tanggal_pembelian,grand_total,keterangan)
{
    document.getElementById('edit_id_pembelianlainnya').value = id_pembelianlainnya;
    document.getElementById('edittanggalpembelianlainnya').value = tanggal_pembelian;
    document.getElementById('edittotalpembelianlainnya').value = grand_total;
    document.getElementById('editdeskripsipembelianlainnya').value = keterangan
    $('#modaleditpembelianlainnya').modal('show');
}

function modaleditcashflow(id_cashflow,tanggal,jenis,total,keterangan,created)
{
    document.getElementById('edit_id_cashflow').value = id_cashflow;
    document.getElementById('edit_tanggalcashflow').value = tanggal;
    $("#edit_jeniscashflow").val(jenis).trigger('change');
    document.getElementById('edit_totalcashflow').value = total;
    document.getElementById('edit_keterangancashflow').value = keterangan
    $('#modaleditcashflow').modal('show');
}

function modaldeletekategoriobat(id_kategori)
{
    $('#id_hapuskategori').val(id_kategori);
    $('#modaldeletekategori').modal('show');
}

function modaldeletejenisobat(id_jenis)
{
    $('#id_hapusjenis').val(id_jenis);
    $('#modaldeletejenis').modal('show');
}
function modaldeletesatuan(id_satuan)
{
    $('#id_hapussatuan').val(id_satuan);
    $('#modaldeletesatuan').modal('show');
}
function modaldeletesupplier(id_supplier)
{
    $('#id_hapussupplier').val(id_supplier);
    $('#modaldeletesupplier').modal('show');
}
function modaldeletecustomer(id_customer)
{
    $('#id_hapuscustomer').val(id_customer);
    $('#modaldeletecustomer').modal('show');
}
function modaldeleteobat(id_obat)
{
    $('#id_hapusobat').val(id_obat);
    $('#modaldeleteobat').modal('show');
}
function modaldeleteuser(id_user)
{
    $('#id_hapususer').val(id_user);
    $('#modaldeleteuser').modal('show');
    
}
function modaldeleteroles(id_roles)
{
    $('#id_hapusroles').val(id_roles);
    $('#modaldeleteroles').modal('show');
}
function modaldeletepermissions(id_permissions)
{
    $('#id_hapuspermissions').val(id_permissions);
    $('#modaldeletepermissions').modal('show');
}
function modaldeletepembelian(id_pembelian)
{
    Swal.fire({
        html: `Yakin Untuk Menghapus data Pembelian Toko ini ??`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Ok, got it!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href=''+document.location.origin+'/stok/deletepembelian/'+ id_pembelian +'';
          Swal.fire('Deleted!', '', 'success')
        } else {
          Swal.fire('Changes are not saved', '', 'info')
        }
      });
    // $('#id_hapuspembelian').val(id_pembelian);
}

function modaldeletepenjualan(id_penjualan)
{
    Swal.fire({
        html: `Yakin Untuk Menghapus data penjualan Toko ini ??`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Ok, got it!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href=''+document.location.origin+'/stok/deletepenjualan/'+ id_penjualan +'';
          Swal.fire('Deleted!', '', 'success')
        } else {
          Swal.fire('Changes are not saved', '', 'info')
        }
      });
    // $('#id_hapuspenjualan').val(id_penjualan);
}

function modaldeletepembayarantoko(id_pembayarantoko)
{
    Swal.fire({
        html: `Yakin Untuk Menghapus data Pembayaran Toko ini ??`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Ok, got it!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href=''+document.location.origin+'/pembayaran/deletepembayarantoko/'+ id_pembayarantoko +'';
          Swal.fire('Deleted!', '', 'success')
        } else {
          Swal.fire('Changes are not saved', '', 'info')
        }
      });
}

function modaldeletepembayarancustomer(id_pembayarancustomer)
{
    Swal.fire({
        html: `Yakin Untuk Menghapus data Pembayaran customer ini ??`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Ok, got it!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href=''+document.location.origin+'/pembayaran/deletepembayarancustomer/'+ id_pembayarancustomer +'';
          Swal.fire('Deleted!', '', 'success')
        } else {
          Swal.fire('Changes are not saved', '', 'info')
        }
      });
}
function modaldeletepembelianlainnya(id_pembelianlainnya)
{
    Swal.fire({
        html: `Yakin Untuk Menghapus data Pembelian Lainnya ini ??`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Ok, got it!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href=''+document.location.origin+'/stok/deletepembelianlainnya/'+ id_pembelianlainnya +'';
          Swal.fire('Deleted!', '', 'success')
        } else {
          Swal.fire('Changes are not saved', '', 'info')
        }
      });
}
function modaldeletecashflow(id_cashflow)
{
    Swal.fire({
        html: `Yakin Untuk Menghapus data Cashflow ini ??`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Ok, got it!",
        cancelButtonText: 'Nope, cancel it',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
        
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href=''+document.location.origin+'/kas/deletecashflow/'+ id_cashflow +'';
          Swal.fire('Deleted!', '', 'success')
        } else {
          Swal.fire('Changes are not saved', '', 'info')
        }
      });
}

$(function(){

    if (document.getElementById('lihat_laporan')) {
        document.getElementById('lihat_laporan').addEventListener('click', function(event){
            
            const laporan_penjualan = document.getElementById('inlineRadio1');
            const laporan_pembelian = document.getElementById('inlineRadio2');
            const laporan_aruskas = document.getElementById('inlineRadio5');
            const laporan_labarugi = document.getElementById('inlineRadio4');
            const neraca = document.getElementById('inlineRadio3');
            
                if (laporan_penjualan.checked == true) {
                    getlaporanpembelian(document.querySelector('input[name="laporan_tipe"]:checked').value);
                }else if(laporan_pembelian.checked == true)
                {   
                    getlaporanpembelian(document.querySelector('input[name="laporan_tipe"]:checked').value);
                }else if(laporan_aruskas.checked == true)
                {   
                    getlaporanpembelian(document.querySelector('input[name="laporan_tipe"]:checked').value);
                }else if(laporan_labarugi.checked == true)
                {   
                    getlaporanpembelian(document.querySelector('input[name="laporan_tipe"]:checked').value);
                }else if(neraca.checked == true)
                {
                    Swal.fire({
                        text: 'Laporan Neraca Masih Belum siap',
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    })
                }else
                {
                    Swal.fire({
                        text: 'Pilih Jenis Laporan',
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    })
                }
              
        }) 
    
        const element = document.querySelector("#kt_apexcharts_31");               
        const height = parseInt(KTUtil.css(element, 'height'));
        const labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        const borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
        const baseColor = KTUtil.getCssVariableValue('--bs-info');
        const lightColor = KTUtil.getCssVariableValue('--bs-light-info');
        if (!element) {
            return;
        }
        var options = {
            series: [],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
    
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor]
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return '' + formatRupiah(val.toString(), 'Rp. ') + ''
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3
            },
            noData: {
                text: 'Loading...'
            }
        };
            
        var chart = new ApexCharts(
        element,
        options
        );       
        chart.render();


        function fetch_data(start_date = '', end_date = '', laporantipe)
        {
            const card_laporan = document.getElementById('card_laporan');
            const card_laporan1 = document.getElementById('card_laporan1');
            const card_laporan2 = document.getElementById('card_laporan2');
            if (laporantipe == "Penjualan" || laporantipe == "Pembelian") {
                card_laporan.classList.remove('d-none');
                card_laporan1.classList.add('d-none');
                card_laporan2.classList.add('d-none');
                $.ajax({
                    type: 'POST',
                    async: false,
                    data:{action:'fetch', start_date:start_date, end_date:end_date, laporantipe:laporantipe},
                    url: ''+document.location.origin+'/Laporan/fetchdata_laporan/',
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var datalaporan = [];
                        var total = 0;
                        var kembalian= 0;
                        var totalbersih = 0;
                        var totalsisa = 0;
                        var totalhpp = 0;
                        var labarugi = 0;
                        var j = 1;
                        if (data.data.length > 0) {
                            for(var count = 0; count < data.data.length; count++)
                            {
                                // date.push(data.data[count].tanggal);
                                datalaporan.push({'y' : parseFloat(data.data[count].total),'x': data.data[count].tanggal});
                                total += parseInt(data.data[count].total);
                                // totalhpp += parseInt(data.data[count].total);
                                if (parseInt(data.data[count].kembalian) > 0) {
                                    kembalian += parseInt(data.data[count].kembalian);
                                }
                                if (parseInt(data.data[count].sisa) > 0) {
                                    totalsisa += parseInt(data.data[count].sisa);
                                }
                                html += '<tr>' +
                                            '<td>' + j + '</td>' +
                                            '<td>' + data.data[count].tanggal + '</td>' +
                                            '<td>' + formatRupiah(data.data[count].total.toString(), 'Rp. ') + '</td>' +
                                            '<td>' + formatRupiah(data.data[count].sisa.toString(), 'Rp. ') + '</td>' +
                                        '</tr>';
                                j++;
                            }
                            totalbersih = total - totalsisa ;                                  
                            
                           
                        } else {
                            chart.updateSeries([{
                                name: 'Total '+laporantipe+'',
                                data: [0,0],
                            }])
    
                            chart.updateOptions({
                                title: {
                                    text: 'Data \n'+laporantipe+' '+start_date+' - '+end_date+'',
                                    align: 'Center'
                                  },
                                name: 'Data '+laporantipe+'',
                            })
    
                            if (laporantipe == "Pembelian") {
                                document.getElementById('tagkotor').innerHTML = 'Total '+laporantipe+'  ';
                                document.getElementById('valuekotor').innerHTML = formatRupiah(total.toString());
                                document.getElementById('tagbersih').innerHTML = 'Total '+laporantipe+' Terbayarkan';
                                document.getElementById('valuebersih').innerHTML = formatRupiah(totalbersih.toString());
                                document.getElementById('tagpiutang').innerHTML = 'Total Hutang '+laporantipe+'';
                                document.getElementById('valuepiutang').innerHTML = formatRupiah(totalsisa.toString());
                            }else{
                                document.getElementById('tagkotor').innerHTML = 'Total '+laporantipe+'';
                                document.getElementById('valuekotor').innerHTML = formatRupiah(total.toString());
                                document.getElementById('tagbersih').innerHTML = 'Total '+laporantipe+' Terbayarkan';
                                document.getElementById('valuebersih').innerHTML = formatRupiah(totalbersih.toString());
                                document.getElementById('tagpiutang').innerHTML = 'Total Piutang '+laporantipe+'';
                                document.getElementById('valuepiutang').innerHTML = formatRupiah(totalsisa.toString());
                            }
                            document.getElementById('body_table_laporan').innerHTML = html;
                        }
                        if (laporantipe == "Pembelian") {
                            document.getElementById('tagkotor').innerHTML = 'Total '+laporantipe+'  ';
                            document.getElementById('valuekotor').innerHTML = formatRupiah(total.toString());
                            document.getElementById('tagbersih').innerHTML = 'Total '+laporantipe+' Terbayarkan';
                            document.getElementById('valuebersih').innerHTML = formatRupiah(totalbersih.toString());
                            document.getElementById('tagpiutang').innerHTML = 'Total Hutang '+laporantipe+'';
                            document.getElementById('valuepiutang').innerHTML = formatRupiah(totalsisa.toString());
                        }else{
                            document.getElementById('tagkotor').innerHTML = 'Total '+laporantipe+' ';
                            document.getElementById('valuekotor').innerHTML = formatRupiah(total.toString());
                            document.getElementById('tagbersih').innerHTML = 'Total '+laporantipe+' Terbayarkan';
                            document.getElementById('valuebersih').innerHTML = formatRupiah(totalbersih.toString());
                            document.getElementById('tagpiutang').innerHTML = 'Total Piutang '+laporantipe+'';
                            document.getElementById('valuepiutang').innerHTML = formatRupiah(totalsisa.toString());
                        }
                            document.getElementById('body_table_laporan').innerHTML = html;
    
                            chart.updateSeries([{
                                name: 'Total '+laporantipe+'',
                                data: datalaporan
                            }])
                            chart.updateOptions({
                                title: {
                                    text: 'Data \n'+laporantipe+' '+start_date+' - '+end_date+'',
                                    align: 'Center'
                                  },
                                name: 'Data '+laporantipe+'',
                            })
                    }
                })
            } else if(laporantipe == "Aruskas"){
                card_laporan1.classList.remove('d-none');
                card_laporan.classList.add('d-none');
                card_laporan2.classList.add('d-none');
                console.log(start_date);
                console.log(end_date);
                $.ajax({
                    type: 'POST',
                    async: false,
                    data:{action:'fetch', start_date:start_date, end_date:end_date, laporantipe:laporantipe},
                    url: ''+document.location.origin+'/Laporan/fetchdata_laporan1/',
                    dataType : 'json',
                    success: function(data){
                        console.log(data);
                        var html1 = '';
                        var total = 0;
                        var totalpenjualan = 0;
                        var totalpembelian = 0;
                        var totalpiutangbelumterbayar = 0;
                        var totalhutangbelumterbayar = 0;
                        var totalbersihpenjualan = 0 ;
                        var totalbersihpembelian = 0 ;
                        var totalpembelianlainnya = 0;
                        var totalpiutangterbayar = 0;
                        var totalhutangterbayar = 0;
                        var totalkasawal = 0;
                        var totalkasakhir = 0;
                        var totalhpp = 0;
                        var labarugi = 0;
                        var grandtotal = 0;
                        var j = 1;
                        if (j== 1) {

                            if (data.datapenjualan.total == null) {
                                totalpenjualan = 0;
                            } else {
                                totalpenjualan = data.datapenjualan.total;
                            }
                            if (data.datapenjualan.sisa == null) {
                                totalpiutangbelumterbayar = 0;
                            } else {
                                totalpiutangbelumterbayar = data.datapenjualan.sisa;
                            }

                            if (data.datapembelian.total == null) {
                                totalpembelian = 0;
                            } else {
                                totalpembelian = data.datapembelian.total;
                            }

                            if (data.piutangcustomer.total == null) {
                                totalpiutangterbayar = 0;
                            } else {
                                totalpiutangterbayar = data.piutangcustomer.total;
                            }

                            if (data.dataoperasional.total == null) {
                                totalpembelianlainnya = 0;
                            } else {
                                totalpembelianlainnya = data.dataoperasional.total;
                            }

                            if (data.datapembelian.total == null) {
                                totalhutangbelumterbayar = 0;
                            } else {
                                totalhutangbelumterbayar = data.datapembelian.sisa;
                            }
                            if (data.hutangtoko.total == null) {
                                totalhutangterbayar = 0;
                            } else {
                                totalhutangterbayar = data.hutangtoko.total;
                            }
                            if (data.kasawal.total == null) {
                                totalkasawal = 0;
                            } else {
                                totalkasawal = data.kasawal.total;
                            }

                            totalbersihpenjualan = parseInt(totalpenjualan) - parseInt(totalpiutangbelumterbayar) + parseInt(totalpiutangterbayar);                                  
                            totalbersihpembelian = parseInt(totalpembelian) - parseInt(totalhutangbelumterbayar) + parseInt(totalhutangterbayar) + parseInt(totalpembelianlainnya);                                   
                            grandtotal = parseInt(totalbersihpenjualan) - parseInt(totalbersihpembelian);
                            totalkasakhir = parseInt(totalkasawal) + parseInt(grandtotal);

                            
                            html1 += '<tr>' +
                                        '<td>1</td>' +
                                        '<td>Informasi Penjualan</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Penjualan</td>' +
                                        '<td>'+formatRupiah(totalpenjualan.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Total Piutang (Belum Terbayarkan)</td>' +
                                        '<td>'+formatRupiah(totalpiutangbelumterbayar.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Total Pelunasan</td>' +
                                        '<td>'+ formatRupiah(totalpiutangterbayar.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td>Total</td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah(totalbersihpenjualan.toString(), 'Rp. ')+'</td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center"></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td>2</td>' +
                                        '<td >Informasi Pembelian</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Pembelian</td>' +
                                        '<td>'+formatRupiah(totalpembelian.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Transaksi Operasional</td>' +
                                        '<td>'+formatRupiah(totalpembelianlainnya.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Total Hutang (Belum Terbayarkan) </td>' +
                                        '<td>'+formatRupiah(totalhutangbelumterbayar.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Total Pelunasan</td>' +
                                        '<td>'+formatRupiah(totalhutangterbayar.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td>Total</td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah(totalbersihpembelian.toString(), 'Rp. ')+'</td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td>4</td>' +
                                        '<td >Informasi Kas</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Kas Awal</td>' +
                                        '<td>'+formatRupiah(totalkasawal.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center">Kas Akhir</td>' +
                                        '<td>'+formatRupiah(totalkasakhir.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td><strong>Total Perubahan Kas</strong></td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah(grandtotal.toString(), 'Rp.')+'</td>' +
                                    '</tr>';
                                    
                             
                            document.getElementById('periode1').innerHTML =  ''+start_date+'-'+end_date+'';
                            document.getElementById('body_table_laporan1').innerHTML = html1;
                        } else {
                            
                        }
                        
                    }
                })
            }
            else if(laporantipe == "Labarugi")
            {
                card_laporan1.classList.add('d-none');
                card_laporan.classList.add('d-none');
                card_laporan2.classList.remove('d-none');
                console.log(start_date);
                console.log(end_date);
                $.ajax({
                    type: 'POST',
                    async: false,
                    data:{action:'fetch', start_date:start_date, end_date:end_date, laporantipe:laporantipe},
                    url: ''+document.location.origin+'/Laporan/fetchdata_laporan1/',
                    dataType : 'json',
                    success: function(data){
                        console.log(data);
                        var html2 = '';
                        var total = 0;
                        var totalpenjualan = 0;
                        var totalpembelian = 0;
                        var totalpiutangbelumterbayar = 0;
                        var totalhutangbelumterbayar = 0;
                        var totalbersihpenjualan = 0 ;
                        var totalbersihpembelian = 0 ;
                        var totalpembelianlainnya = 0;
                        var totalpiutangterbayar = 0;
                        var totalhutangterbayar = 0;
                        var totalhpp = 0;
                        var labarugi = 0;
                        var grandtotal = 0;
                        var j = 1;
                        if (j== 1) {

                            if (data.datahpp.hpp == null) {
                                totalhpp = 0;
                            } else {
                                totalhpp = data.datahpp.hpp;
                            }

                            if (data.datapenjualan.total == null) {
                                totalpenjualan = 0;
                            } else {
                                totalpenjualan = data.datapenjualan.total;
                            }
                            if (data.datapenjualan.sisa == null) {
                                totalpiutangbelumterbayar = 0;
                            } else {
                                totalpiutangbelumterbayar = data.datapenjualan.sisa;
                            }

                            if (data.datapembelian.total == null) {
                                totalpembelian = 0;
                            } else {
                                totalpembelian = data.datapembelian.total;
                            }

                            if (data.piutangcustomer.total == null) {
                                totalpiutangterbayar = 0;
                            } else {
                                totalpiutangterbayar = data.piutangcustomer.total;
                            }

                            if (data.dataoperasional.total == null) {
                                totalpembelianlainnya = 0;
                            } else {
                                totalpembelianlainnya = data.dataoperasional.total;
                            }

                            if (data.datapembelian.total == null) {
                                totalhutangbelumterbayar = 0;
                            } else {
                                totalhutangbelumterbayar = data.datapembelian.sisa;
                            }
                            if (data.hutangtoko.total == null) {
                                totalhutangterbayar = 0;
                            } else {
                                totalhutangterbayar = data.hutangtoko.total;
                            }

                            totalbersihpenjualan = parseInt(totalpenjualan) - parseInt(totalpiutangbelumterbayar) ;                                  
                            totalbersihpembelian = parseInt(totalpembelian) - parseInt(totalhutangbelumterbayar) + parseInt(totalhutangterbayar) + parseInt(totalpembelianlainnya);                                   
                            grandtotal = parseInt(totalbersihpenjualan) - parseInt(totalbersihpembelian);

                            
                            html2 += '<tr>' +
                                        '<td>1</td>' +
                                        '<td>Pendapatan</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td >Penjualan</td>' +
                                        '<td>'+formatRupiah(totalpenjualan.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td>Total Penjualan Bersih</td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah(totalpenjualan.toString(), 'Rp. ')+'</td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center"></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td>2</td>' +
                                        '<td >Harga Pokok Penjualan</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td>HPP</td>' +
                                        '<td>'+formatRupiah(totalhpp.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td>Total HPP</td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah(totalhpp.toString(), 'Rp. ')+'<hr></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td>Total Laba Kotor</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah((parseInt(totalpenjualan)- parseInt(totalhpp)).toString(), 'Rp. ')+'</td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td align="center"></td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td>3</td>' +
                                        '<td >Beban</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td>Operasional</td>' +
                                        '<td>'+formatRupiah(totalpembelianlainnya.toString(), 'Rp. ')+'</td>' +
                                        '<td></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td></td>' +
                                        '<td >Total Operasional</td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah(totalpembelianlainnya.toString(), 'Rp. ')+'<hr></td>' +
                                    '</tr>'+
                                    '<tr>' +
                                        '<td>Total Laba Bersih</td>' +
                                        '<td></td>' +
                                        '<td></td>' +
                                        '<td>'+formatRupiah(((parseInt(totalpenjualan)- parseInt(totalhpp))-parseInt(totalpembelianlainnya)).toString(), 'Rp. ')+'</td>' +
                                    '</tr>';
                                    
                             
                            document.getElementById('periode2').innerHTML =  ''+start_date+'-'+end_date+'';
                            document.getElementById('body_table_laporan2').innerHTML = html2;
                        } else {
                            
                        }
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
                    }  
                })
            }
    
            // var dataTable = $('#table_laporan').DataTable({
            //     "processing" : true,
            //     "serverSide" : true,
            //     "order" : [],
            //     "ajax" : {
            //         url:''+document.location.origin+'/Laporan/fetchdata_laporan/',
            //         type:"POST",
            //         data:{action:'fetch', start_date:start_date, end_date:end_date, laporantipe:laporantipe},
            //         success: function(data){
                       
            //         }
            //     },
            //     "columns": [
            //         { "data": "no" },
            //         { "data": "nama" },
            //         { "data": "no_hp" },
            //         { "data": "aksi" },
            //     ],
            // });
        }
    
        function getlaporanpembelian(laporantipe)
        {
            console.log(laporantipe);
            var start = moment().subtract(29, "days");
            var end = moment();
        
              cb(start, end);
        
        
    
            function cb(start, end) {
                console.log(start.format("YYYY-MM-DD") + " - " + end.format("YYYY-MM-DD"));
        
                fetch_data(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'),laporantipe);
            }
    
            if (laporantipe == "Aruskas") {
                $("#tanggal_laporan1").daterangepicker({
                    showDropdowns : true,
                    startDate: start,
                    endDate: end,
                    ranges: {
                    "Today": [moment(), moment()],
                    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                    },
                    // format : 'YYYY-MM-DD',
                }, cb);
            }else if(laporantipe == "Labarugi")
            {
                $("#tanggal_laporan2").daterangepicker({
                    showDropdowns : true,
                    startDate: start,
                    endDate: end,
                    ranges: {
                    "Today": [moment(), moment()],
                    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                    },
                    // format : 'YYYY-MM-DD',
                }, cb);
            } 
            else {
                $("#tanggal_laporan").daterangepicker({
                    showDropdowns : true,
                    startDate: start,
                    endDate: end,
                    ranges: {
                    "Today": [moment(), moment()],
                    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                    },
                    // format : 'YYYY-MM-DD',
                }, cb);
            }

    
             
        }
    
    }



        
})

$(document).ready(function(){

	
	 
});


document.getElementById('lihat_rekap_kas').addEventListener('click',function(e){
    const tanggal_awal = document.getElementById('tanggal_mulai_kas');
    const tanggal_akhir = document.getElementById('tanggal_akhir_kas');
    data1 = {}
    console.log(data1);
    $.ajax({
        type: 'POST',
        data: {'tanggal_awal' : tanggal_awal.value, 'tanggal_akhir' : tanggal_akhir.value},
        url: ''+document.location.origin+'/Kas/get_rekap_kas/',
        dataType : 'json',
        success: function(data){
            console.log(data);
            var html = '';
            var j = 1;
            var netto = 0;
            var sub_total = 0;
            var total = 0;
            var kasakhir = 0;
            document.getElementById('kas_header').innerHTML = 'Rekap Kas '+tanggal_awal.value+' sampai '+tanggal_akhir.value+'';
            document.getElementById('kasawal').innerHTML = formatRupiah(data.kaswal.total.toString(), 'Rp. ');
            for (i = 0; i < data.datakas.length; i++) {
                // netto = Math.round(parseFloat(data.detailpembelian[i].harga) -(parseFloat(data.detailpembelian[i].harga)*(parseFloat(data.detailpembelian[i].diskon)/100)));
                // sub_total = Math.round(netto*parseFloat(data.detailpembelian[i].qty));
                html += '<tr>' +
                            '<td>' + data.datakas[i].tanggal + '</td>' +
                            '<td>' + data.datakas[i].jenis_cashflow + '</td>' +
                            '<td>' + data.datakas[i].keterangan  + '</td>' +
                            '<td>' + formatRupiah(data.datakas[i].grand_total.toString(), 'Rp. ')  + '</td>' +
                        '</tr>';
                j++;
                if (data.datakas[i].jenis_cashflow == 'MASUK') {
                    total = total+parseFloat(data.datakas[i].grand_total);
                } else {
                    total = total-parseFloat(data.datakas[i].grand_total);
                }
            }
            kasakhir = parseInt(data.kaswal.total) + parseInt(total);
            document.getElementById('total_periode_kas').innerHTML = formatRupiah(total.toString(), 'Rp. ');
            document.getElementById('kasakhir').innerHTML = formatRupiah(kasakhir.toString(), 'Rp. ');
            $('#table_modal_body_modal_lihat_kas tbody').html(html);
            $('#modal_lihat_kas').modal('show');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
        }  
    });
})


$('#modalrekappenjualan').one('shown.bs.modal', function () {
    $('#customerrekappenjualan').select2({
        ajax : {
            url : '' + document.location.origin + '/Master/get_customer/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        },
    })

    document.getElementById('lihat_rekap_penjualan').addEventListener('click',function(e){
        const tanggal_awal = document.getElementById('tanggal_mulai_penjualan');
        const tanggal_akhir = document.getElementById('tanggal_akhir_penjualan');

        data1 = {}
        console.log(data1);
        $.ajax({
            type: 'POST',
            data: {'tanggal_awal' : tanggal_awal.value, 'tanggal_akhir' : tanggal_akhir.value, 'customer_id' :$('#customerrekappenjualan').val()},
            url: ''+document.location.origin+'/Stok/get_rekap_penjualan/',
            dataType : 'json',
            success: function(data){
                console.log(data);
                var html = '';
                var j = 1;
                var netto = 0;
                var sub_total = 0;
                var total = 0;
                document.getElementById('penjualan_header').innerHTML = 'Rekap Penjualan '+tanggal_awal.value+' sampai '+tanggal_akhir.value+''
                for (i = 0; i < data.penjualan.length; i++) {
                    // netto = Math.round(parseFloat(data.detailpembelian[i].harga) -(parseFloat(data.detailpembelian[i].harga)*(parseFloat(data.detailpembelian[i].diskon)/100)));
                    // sub_total = Math.round(netto*parseFloat(data.detailpembelian[i].qty));
                    html += `<div class="row">
                                <div class="col">
                                    <div class="mb-10">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="detail_kodepembelian" class="required form-label">Kode Penjualan</label>
                                                <input readonly required type="text" class="form-control form-control-white" value="${data.penjualan[i].kode_penjualan}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="detailtanggalpembelian" class="required form-label">Tanggal Penjualan</label>
                                                <input readonly required type="date" class="form-control form-control-white"  value="${data.penjualan[i].tanggal_penjualan}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <label for="detail_kodepembelian" class="required form-label">Customer</label>
                                        <input readonly required type="text" class="form-control form-control-white" value="${data.penjualan[i].customer}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <label for="detaildeskripsipembelian" class=" form-label">Deskripsi Penjualan</label>
                                        <textarea readonly class="form-control form-control-white" cols="30" rows="5">${data.penjualan[i].keterangan_penjualan}</textarea>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="row mb-10">
                                <div class="table-responsive card card-flush shadow-sm">
                                    <div class="card-body">
                                        <table class="table table-bordered table-row-bordered gx-7">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-muted">
                                                    <th>Nama Obat</th>
                                                    <th>Kuantitas</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Diskon</th>
                                                    <th>Netto</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                                </thead>
                                                <tbody ">`;
                    for (let j = 0; j < data.detailpenjualan.length; j++) {
                        if(data.detailpenjualan[j].penjualan_id == data.penjualan[i].id_penjualan){
                            var netto =0;
                            netto = parseInt(data.detailpenjualan[j].harga) - (parseInt(data.detailpenjualan[j].harga)*(parseFloat(data.detailpenjualan[j].diskon/100) ) )
                            html += '<tr>' +
                                        '<td>' + data.detailpenjualan[j].nama_obat + '</td>' +
                                        '<td>' + data.detailpenjualan[j].qty + '</td>' +
                                        '<td>' + data.detailpenjualan[j].satuan  + '</td>' +
                                        '<td>' + formatRupiah(data.detailpenjualan[j].harga.toString(), 'Rp. ')  + '</td>' +
                                        '<td>' + data.detailpenjualan[j].diskon  + '%</td>' +
                                        '<td>' + formatRupiah((Math.round(netto)).toString(),'Rp. ')+ '</td>' +
                                        '<td>' + formatRupiah((Math.round(netto) * parseInt(data.detailpenjualan[j].qty)).toString(), 'Rp. ') + '</td>' +
                                    '</tr>';
                        }                       
                    }                                
                    html +=            `</tbody></table>
                                        <table width="100%" class="">
                                            <tbody>
                                                <tr class="fw-bolder fs-6">
                                                    <td colspan="3" class="text-nowrap align-end">Total:</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td align="right" colspan="2" class="text-danger fs-3">${formatRupiah(data.penjualan[i].grand_total.toString(),'Rp. ')}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>`;
                total += parseInt(data.penjualan[i].grand_total)
                }
                html += `<table width="100%" class="">
                            <tbody>
                                <tr class="fw-bolder fs-6">
                                    <td colspan="3" class="text-nowrap align-end">Grand Total:</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="right" colspan="2" class="text-danger fs-3">${formatRupiah(total.toString(), 'Rp. ')}</td>
                                </tr>

                            </tbody>
                        </table>`;
                // document.getElementById('total_periode_kas').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                $('#viewrekappenjualan').html(html);
                $('#modal_lihat_penjualan').modal('show');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
            }  
        });
    })
});

$('#modalrekappembelian').one('shown.bs.modal', function () {
    $('#supplierrekappembelian').select2({
        ajax : {
            url : '' + document.location.origin + '/Master/get_supplier/',
            type: 'POST',
            dataType : 'json',
            data: function(params)
            {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        },
    })

    document.getElementById('lihat_rekap_pembelian').addEventListener('click',function(e){
        const tanggal_awal = document.getElementById('tanggal_mulai_pembelian');
        const tanggal_akhir = document.getElementById('tanggal_akhir_pembelian');

        data1 = {}
        console.log(data1);
        $.ajax({
            type: 'POST',
            data: {'tanggal_awal' : tanggal_awal.value, 'tanggal_akhir' : tanggal_akhir.value, 'supplier_id' :$('#supplierrekappembelian').val()},
            url: ''+document.location.origin+'/Stok/get_rekap_pembelian/',
            dataType : 'json',
            success: function(data){
                console.log(data);
                var html = '';
                var j = 1;
                var netto = 0;
                var sub_total = 0;
                var total = 0;
                document.getElementById('pembelian_header').innerHTML = 'Rekap Pembelian '+tanggal_awal.value+' sampai '+tanggal_akhir.value+''
                for (i = 0; i < data.pembelian.length; i++) {
                    // netto = Math.round(parseFloat(data.detailpembelian[i].harga) -(parseFloat(data.detailpembelian[i].harga)*(parseFloat(data.detailpembelian[i].diskon)/100)));
                    // sub_total = Math.round(netto*parseFloat(data.detailpembelian[i].qty));
                    html += `<div class="row">
                                <div class="col">
                                    <div class="mb-10">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="detail_kodepembelian" class="required form-label">Kode Pembelian</label>
                                                <input readonly required type="text" class="form-control form-control-white" value="${data.pembelian[i].kode_pembelian}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="detailtanggalpembelian" class="required form-label">Tanggal Pembelian</label>
                                                <input readonly required type="date" class="form-control form-control-white"  value="${data.pembelian[i].tanggal_pembelian}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <label for="detail_kodepembelian" class="required form-label">Supplier</label>
                                        <input readonly required type="text" class="form-control form-control-white" value="${data.pembelian[i].supplier}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <label for="detaildeskripsipembelian" class=" form-label">Deskripsi Pembelian</label>
                                        <textarea readonly class="form-control form-control-white" cols="30" rows="5">${data.pembelian[i].keterangan_pembelian}</textarea>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="row mb-10">
                                <div class="table-responsive card card-flush shadow-sm">
                                    <div class="card-body">
                                        <table class="table table-bordered table-row-bordered gx-7">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-muted">
                                                    <th>Nama Obat</th>
                                                    <th>Kuantitas</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Diskon</th>
                                                    <th>Netto</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                                </thead>
                                                <tbody ">`;
                    for (let j = 0; j < data.detailpembelian.length; j++) {
                        if(data.detailpembelian[j].pembelian_id == data.pembelian[i].id_pembelian){
                            var netto =0;
                            netto = parseInt(data.detailpembelian[j].harga) - (parseInt(data.detailpembelian[j].harga)*(parseFloat(data.detailpembelian[j].diskon/100) ) )
                            html += '<tr>' +
                                        '<td>' + data.detailpembelian[j].nama_obat + '</td>' +
                                        '<td>' + data.detailpembelian[j].qty + '</td>' +
                                        '<td>' + data.detailpembelian[j].satuan  + '</td>' +
                                        '<td>' + formatRupiah(data.detailpembelian[j].harga.toString(), 'Rp. ')  + '</td>' +
                                        '<td>' + data.detailpembelian[j].diskon  + '%</td>' +
                                        '<td>' + formatRupiah((Math.round(netto)).toString(),'Rp. ') + '</td>' +
                                        '<td>' + formatRupiah((Math.round(netto) * parseInt(data.detailpembelian[j].qty)).toString(), 'Rp. ') + '</td>' +
                                    '</tr>';
                        }                       
                    }                                
                    html +=            `</tbody></table>
                                        <table width="100%" class="">
                                            <tbody>
                                                <tr class="fw-bolder fs-6">
                                                    <td colspan="3" class="text-nowrap align-end">Total:</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td align="right" colspan="2" class="text-danger fs-3">${formatRupiah(data.pembelian[i].grand_total.toString(), 'Rp. ')}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>`;
                total += parseInt(data.pembelian[i].grand_total)
                }
                html += `<table width="100%" class="">
                            <tbody>
                                <tr class="fw-bolder fs-6">
                                    <td colspan="3" class="text-nowrap align-end">Grand Total:</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="right" colspan="2" class="text-danger fs-3">${formatRupiah(total.toString(), 'Rp. ')}</td>
                                </tr>

                            </tbody>
                        </table>`;
                // document.getElementById('total_periode_kas').innerHTML = formatRupiah(total.toString(), 'Rp. ');
                $('#viewerekappembelian1').html(html);
                $('#modal_lihat_pembelian').modal('show');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
            }  
        });
    })
});
    
console.timeEnd();


