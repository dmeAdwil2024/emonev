<!-- Main content -->
<section class="content" style="display:none" id="wrap-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="overlay" id="loader-datatable" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <select name="filter" id="filter" class="form-control" onchange="reload()">
                                    <option value="all">Semua Pengajuan</option>
                                    <option value="pending">Belum Diproses</option>
                                    <option value="reject">Pengajuan Ditolak</option>
                                    <option value="accept">Pengajuan Disetujui</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="filter_satker" id="filter_satker" class="form-control" onchange="reload()">
                                    <option value="all">Semua Satuan Kerja</option>
                                    <option value="sekda">Sekretariat Daerah</option>
                                    <option value="bappeda">Badan Perencanaan dan Pembangunan Daerah</option>
                                    <option value="inspektorat">INSPEKTORAT</option>
                                    <option value="dpmptsp">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
                                    <option value="dpuprpkp">Dinas Pekerjaan Umum, Penataan Ruang, Perumahan dan Kawasan Permukiman</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <table id="data" style="width:100%" class="table table-bordered table-striped text-xs">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center text-uppercase">#</th>
                                            <th class="align-middle text-center text-uppercase">NIP</th>
                                            <th class="align-middle text-center text-uppercase">Nama</th>
                                            <th class="align-middle text-center text-uppercase">Nomor WA</th>
                                            <th class="align-middle text-center text-uppercase">Email</th>
                                            <th class="align-middle text-center text-uppercase">Pangkat & Golongan</th>
                                            <th class="align-middle text-center text-uppercase">Jabatan</th>
                                            <th class="align-middle text-center text-uppercase">Jabatan dalam Satker</th>
                                            <th class="align-middle text-center text-uppercase">Satker</th>
                                            <th class="align-middle text-center text-uppercase">Kode Satker</th>
                                            <th class="align-middle text-center text-uppercase">Bidang</th>
                                            <th class="align-middle text-center text-uppercase">Provinsi/Kabupaten</th>
                                            <th class="align-middle text-center text-uppercase">SK</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form-reject">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="overlay" id="loader-pendaftaran" style="display: none">
                    <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                </div>
                <div class="modal-header">
                    <h4 class="modal-title text-white">Form Proses Pendaftaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label text-white">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama" id="nama" class="form-control" disabled/>
                                    <input type="text" name="id_request" id="id_request" class="form-control" style="display:none"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nip" class="col-sm-4 col-form-label text-white">NIP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nip" id="nip" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_hp" class="col-sm-4 col-form-label text-white">No. WA</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_hp" id="no_hp" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-4 col-form-label text-white">Status</label>
                                <div class="col-sm-8">
                                    <select name="status" id="status" class="form-control" onchange="checkStatus()">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="reject">Ditolak</option>
                                        <option value="accept">Diterima</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" id="wrap-reason" style="display:none">
                                <label for="reason" class="col-sm-4 col-form-label text-white">Alasan Tolak</label>
                                <div class="col-sm-8">
                                    <textarea name="reason" id="reason" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> CANCEL</button>
                    <button type="button" onclick="updateForm()" class="btn btn-success">SIMPAN</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>

<script>
    function reload()
    {
        var status = $('#filter').val()
        var satker = $('#filter_satker').val()

        $('#loader-datatable').show()
        $("#data").DataTable().destroy();

        $.post('{{ route('master.data-request-user') }}', {status, satker, _token: '{{csrf_token()}}'}, function(e){

            $("#data").DataTable({
                data: e,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: false,
                columns: [
                        { data: 'no', className:"text-center align-middle"},
                        { data: 'nip', className:"text-center align-middle"},
                        { data: 'nama_format', className:"align-middle"},
                        { data: 'no_hp', className:"text-center align-middle"},
                        { data: 'email', className:"align-middle"},
                        { data: 'pangkat', className:"text-center align-middle"},
                        { data: 'jabatan', className:"align-middle"},
                        { data: 'level', className:"align-middle"},
                        { data: 'satker', className:"text-uppercase align-middle"},
                        { data: 'kode_satker', className:"text-center text-uppercase align-middle"},
                        { data: 'bidang', className:"text-uppercase align-middle"},
                        { data: 'nama_provinsi', className:"align-middle"},
                        { data: 'download_sk', className:"align-middle text-center"},
                ],
                buttons: ["csv", "excel", "pdf", "print"],
            })
            .buttons()
            .container()
            .appendTo("#data_wrapper .col-md-6:eq(0)");

            $('#loader-datatable').hide()

        });
    }

    function checkStatus()
    {
        $('#wrap-reason').hide()
        var status  = $('#status').val()

        if(status == "reject")
        {
            $('#wrap-reason').show()
        }
    }

    function openData()
    {
        $('#wrap-data').show(700)
        $('#wrap-form').hide(700)
        $('#wrap-form-proses').hide(700)

        reload()
    }

    function updateForm()
    {
        $('#loader-pendaftaran').show()

        var status      = $('#status').val()
        var phone_no    = $('#no_hp').val()
        var reason      = $('#reason').val()
        var id          = $('#id_request').val()

        var message     = 'Mohon maaf, permintaan user E-Monev Anda ditolak dengan alasan: '+reason;

        $.post('{{ route('master.proses-user') }}', {id, status, _token: '{{csrf_token()}}'}, function(e){

            $('#loader-pendaftaran').hide()
            $('#modal-form-reject').modal('hide')

            if(status == "reject")
            {
                if(e.status == "success")
                {
                    sendWa(message, phone_no)
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    reload() 
                }
                else
                {
                    Toast.fire({
                        icon: 'error',
                        title: e.message
                    })
                }
            }
            else
            {
                $('#loader-datatable').hide()

                if(e.status == "success")
                {
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    reload()
                }
                else
                {
                    Toast.fire({
                        icon: 'error',
                        title: e.message
                    })
                }
            }

        });
    }

    function sendWa(message, phone_no)
    {
        $.post('{{ route('tools.sending-wa') }}', {message, phone_no, _token: '{{csrf_token()}}'}, function(e){

            console.log(e)

        });   
    }

    function updateStatus(id, status)
    {
        swal({
            title: "Proses User Ini?",
            text: "Data yang Sudah Diproses Tidak Dapat Dirollback. Lanjutkan?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2b982b",
            confirmButtonText: "Ya, Lanjutkan!",
            closeOnConfirm: true
        }, function () {

            $('#loader-datatable').show()

            $.post('{{ route('master.proses-user') }}', {id, status, _token: '{{csrf_token()}}'}, function(e){

                $('#loader-datatable').hide()

                if(e.status == "success")
                {
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    reload()
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

    function rejectForm(id)
    {
        $('#modal-form-reject').modal('show')
        $('#loader-pendaftaran').show()
        $('#status').val("")
        $('#reason').val("")
        checkStatus()
        
        $.post('{{ route('tools.detail-request') }}', {id, _token: '{{csrf_token()}}'}, function(e){

            $('#nip').val(e.nip)
            $('#nama').val(e.nama)
            $('#no_hp').val(e.no_hp)
            $('#id_request').val(e.id)
            $('#loader-pendaftaran').hide()

        });
    }
</script>
