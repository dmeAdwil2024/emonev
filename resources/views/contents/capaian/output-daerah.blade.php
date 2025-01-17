@extends('layouts.main-easyui')
@extends('contents.capaian.template-parts.modal-input-target')
@extends('contents.capaian.template-parts.modal-upload-evidence')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$current}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{$modul}}</a></li>
                        <li class="breadcrumb-item active">{{$current}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
<section class="content" id="wrap-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="card card-outline card-primary">
                    <div class="overlay" id="loader-datatable" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 mt-3">
                                <select @if(is_numeric(Auth::user()->prov)) disabled @endif data-options="onChange: function(){
                                        loadSatker();
                                    }" style="height: 40px; width: 100%" name="provinsi" class="easyui-combobox" id="provinsi">
                                        <option value="" disabled selected>Pilih Provinsi</option>
                                    @foreach($data_provinsi as $provinsi)
                                        <option value="{{$provinsi->namaprov}}" @if($provinsi->id_prov == Auth::user()->prov) selected @endif>{{$provinsi->namaprov}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 col-sm-12 mt-3">
                                <select data-options="onChange: function(){loadData();}" name="satker" class="easyui-combobox" style="height: 40px; width: 100%" id="satker">
                                        <option value="" disabled selected>Pilih Satuan Kerja</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12 mt-3">
                                <select data-options="onChange: function(){loadData();}" name="triwulan" class="easyui-combobox" style="height: 40px; width: 100%" id="triwulan">
                                        <option value="1" selected>Triwulan 1</option>
                                        <option value="2">Triwulan 2</option>
                                        <option value="3">Triwulan 3</option>
                                        <option value="4">Triwulan 4</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="table-responsive" style="overflow-x: auto;white-space: nowrap;">
                                    <table class="table-responsive easyui-treegrid" id="data-capaian" style="width:100%;height:500px"
                                    data-options="
                                        data: '',
                                        rownumbers: false,
                                        idField: 'kode_treegrid',
                                        treeField: 'kode_treegrid',
                                        loadFilter: myLoadFilter,
                                        onContextMenu: onContextMenu,
                                        toolbar:'#toolbar'
                                    ">
                                        <thead frozen="true">
                                            <th data-options="halign:'center', align:'left', field:'kode_treegrid'"  width="200px">KODE</th>
                                        </thead>
                                        <thead>
                                            <th data-options="halign:'center', align:'left', field:'uraian_treegrid'"  width="400px">KEGIATAN/KLASIFIKASI RINCIAN OUTPUT/OUTPUT/KOMPONEN</th>
                                            <th data-options="halign:'center', align:'right', field:'kewenangan'"  width="150px">KEWENANGAN</th>
                                            <th data-options="halign:'center', align:'right', field:'pagu'"  width="150px">PAGU</th>
                                            <th data-options="halign:'center', align:'right', field:'realisasi'"  width="150px">REALISASI</th>
                                            <th data-options="halign:'center', align:'center', field:'bulan1'"  width="100px">BULAN 1</th>
                                            <th data-options="halign:'center', align:'center', field:'bulan2'"  width="100px">BULAN 2</th>
                                            <th data-options="halign:'center', align:'center', field:'bulan3'"  width="100px">BULAN 3</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="mm" class="easyui-menu" style="width:175px;">
    <div onclick="loadData()" data-options="iconCls:'icon-reload'">Reload Data</div>
    <div onclick="formTarget()" data-options="iconCls:'icon-add'">Input Capaian</div>
    <div class="menu-sep"></div>
    <div onclick="remove()" data-options="iconCls:'icon-cancel'">Remove</div>
</div>

<div id="toolbar" style="padding:10px; text-align:right">
    <!-- <a href="javascript:void(0)" onclick="remove()" class="easyui-linkbutton" iconCls="icon-cancel"></a>
    <a href="javascript:void(0)" onclick="loadData()" class="easyui-linkbutton" iconCls="icon-reload"></a>
    <a href="javascript:void(0)" onclick="formTarget()" class="easyui-linkbutton" iconCls="icon-add"> Target Capaian</a> -->
    Total Rincian Output (RO): <span class="font-weight-bolder" id="total_ro">0</span> <br>
    Total Komponen Input (KI): <span class="font-weight-bolder" id="total_ki">0</span>
</div>

@endsection

@section('js')
    <script>
        $(function () {
            // loadData()
            window.setTimeout( function() {
                loadSatker()
            }, 300);
        });

        function openModalInputCo()
        {
            $('#modal-capaian-output').modal('show')
        }

        function countRo()
        {
            var id_dir      = $('#direktorat').combobox('getValue')
            var id_subdir   = $('#subdit').combobox('getValue')
            var triwulan    = $('#triwulan').combobox('getValue')
            
            $.post('{{ route('capaian.count-ro') }}', {id_dir, id_subdir, triwulan, _token: '{{csrf_token()}}'}, function(e){

                $('#total_ro').empty().append(e.ro)
                $('#total_ki').empty().append(e.input)

            });
        }

        function formTarget()
        {
            var data    = $('#data-capaian').treegrid('getSelected');
            
            if(!data)
            {
                swal({
                    title: "Data Belum Dipilih",
                    text:  "Klik Pada Data yang Akan Diproses",
                    type:  "error"
                })
            }
            else
            {
                if(data.type == "kegiatan" || data.type == "output" || data.type == "suboutput")
                {
                    swal({
                        title: "Kategori yang Dipilih Salah",
                        text:  "Piih Hanya Pada Kategori Data Komponen/Subkomponen",
                        type:  "error"
                    })
                }
                else
                {
                    openModalTarget(data.type, data.kode_treegrid)
                }
            }
        }

        function openModalTarget(type, kode, bulan = null)
        {
            $("#modal-input-target").modal("show")
            $("#type_target").val(type)
            $("#kode_target").val(kode)
            loadDetailInput(kode, bulan)

            if(bulan != null)
            {
                if(parseInt(bulan) < 10)
                {
                    $('#bulan_target').val("0"+bulan)
                }
                else
                {
                    $('#bulan_target').val(bulan)
                }
            }
        }
        
        function loadDetailInput(kode, month)
        {
            var bulan   = 1

            if(month != null)
            {
                var bulan = month
            }

            $.post('{{ route('capaian.detail-input') }}', {kode, bulan, _token: '{{csrf_token()}}'}, function(e){

                if(e != "none")
                {
                    var table = document.getElementById("table-form-target");
                    (table).find("tr:gt(0)").remove();
                    
                    if(parseInt(e.bulan) < 10)
                    {
                        $('#bulan_target').val("0"+e.bulan)
                    }
                    else
                    {
                        $('#bulan_target').val(e.bulan)
                    }

                    $('#tahun_target').val(e.tahun)
                    $('#target_target').val(e.to_volume)
                    $('#realisasi_target').val(e.co_volume)
                    $('#keterangan_target').val(e.keterangan)
                    $('#kendala_target').val(e.kendala)
                    $('#tinjut_target').val(e.tinjut)

                    $('#wrap-table-form-target').show()

                    var i;
                    var table = document.getElementById("table-form-target");
                    
                    for (i = 0; i < e.data.length; ++i) {
                        
                        var row = table.insertRow(i+1);
                    
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);

                        cell1.innerHTML = e.data[i]['pertanyaan'];
                        cell2.innerHTML = e.data[i]['jawaban'];
                        cell3.innerHTML = e.data[i]['evidence'];
                        cell4.innerHTML = '<button class="btn btn-danger" onclick="removeFormTarget(this)"> <i class="font-weight-bolder fas fa-times-circle"></i> </button>';
                    }
                }

            });
        }

        function openModalUpload(bulan, kode, type)
        {
            // $("#modal-input-upload").modal("show")
            $("#bulan_upload").val(bulan)
            $("#type_upload").val(type)
            $("#kode_upload").val(kode)

            openModalTarget(type, kode, bulan)
        }

        function remove()
        {
            
            var data    = $('#data-capaian').treegrid('getSelected');
            
            if(!data)
            {
                swal({
                    title: "Data Belum Dipilih",
                    text:  "Klik Pada Data yang Akan Dihapus",
                    type:  "error"
                })
            }
            else
            {
                var type    = data.type;
                var kode    = data.kode_treegrid;

                swal({
                    title: "Hapus Data Ini?",
                    text: "Data yang Sudah Dihapus Tidak Dapat Dirollback. Lanjutkan?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#2b982b",
                    confirmButtonText: "Ya, Lanjutkan!",
                    closeOnConfirm: true
                }, function () {

                    $('#data-capaian').treegrid('loading');-

                    $.post('{{ route('capaian.hide-data') }}', {type, kode, _token: '{{csrf_token()}}'}, function(e){

                        if(e.status == "success")
                        {
                            Toast.fire({
                                icon: 'success',
                                title: e.title
                            })

                            loadData()
                        }
                        else
                        {
                            Toast.fire({
                                icon: 'error',
                                title: e.message
                            })
                        }

                    });

                });
            }
        }
        
        function loadSatker()
        {
            var id_prov  = $('#provinsi').combobox('getValue')

            $('#satker').combobox({
		        valueField: "kode",
		        textField: "nama_satker",
		        method: 'get',
		        url:'{{ route('tools.satker') }}?provinsi='+id_prov
		    })
        }

        function loadData()
        {
            var kdsatker    = $('#satker').combobox('getValue')
            var triwulan    = $('#triwulan').combobox('getValue')

            $('#data-capaian').treegrid('loading');
            // countRo()

            $.post('{{ route('capaian.data-treegrid-daerah') }}', {kdsatker, triwulan, _token: '{{csrf_token()}}'}, function(e){

                $('#data-capaian').treegrid('loaded');
				$('#data-capaian').treegrid('reload');
				$('#data-capaian').treegrid({
                    data:e,
                    nowrap:false,
                    animate: true,
                    autoHeight:true
                });
            });
        }

        function loadDataOld()
        {
            var id_dir      = $('#direktorat').combobox('getValue')
            var id_subdir   = $('#subdit').combobox('getValue')
            var triwulan    = $('#triwulan').combobox('getValue')

            $('#data-capaian').treegrid('loading');
            countRo()

            $.post('{{ route('capaian.data-treegrid') }}', {id_dir, id_subdir, triwulan, _token: '{{csrf_token()}}'}, function(e){

                $('#data-capaian').treegrid('loaded');
				$('#data-capaian').treegrid('reload');
				$('#data-capaian').treegrid({
                    data:e,
                    nowrap:false,
                    animate: true,
                    autoHeight:true
                });
            });
        }

        function addPadding(value,row,index)
        {
            return 'text-align: justify; padding: 8px';
        }

        function myLoadFilter(data,parentId){
            function setData(data){
                var todo = [];
                for(var i=0; i<data.length; i++){
                    todo.push(data[i]);
                }
                while(todo.length){
                    var node = todo.shift();
                    if (node.children && node.children.length){
                        node.state = 'closed';
                        node.children1 = node.children;
                        node.children = undefined;
                        todo = todo.concat(node.children1);
                    }
                }
            }
            
            setData(data);
            var tg = $(this);
            var opts = tg.treegrid('options');
            opts.onBeforeExpand = function(row){
                if (row.children1){
                    tg.treegrid('append',{
                        parent: row[opts.idField],
                        data: row.children1
                    });
                    row.children1 = undefined;
                    tg.treegrid('expand', row[opts.idField]);
                }
                return row.children1 == undefined;
            };
            return data;
        }

        function onContextMenu(e,row){
            if (row){
                e.preventDefault();
                $('#data-capaian').treegrid('select', row.kode_treegrid);
                $('#mm').menu('show',{
                    left: e.pageX,
                    top: e.pageY
                });                
            }
        }
    </script>
@endsection
