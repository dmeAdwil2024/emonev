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
                        <div class="row">
                            <select name="tipe" id="tipe" class="col-md-3 form-control">
                                <option value="pusat">Pusat</option>
                                <option value="daerah">Daerah</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped text-xs">
                                <thead>
                                    <tr>
                                        <th style="width:5%" class="align-middle text-center text-uppercase">Actions</th>
                                        <th style="width:7%" class="align-middle text-center text-uppercase">Username</th>
                                        <th style="width:23%" class="align-middle text-center text-uppercase">Nama</th>
                                        <th style="width:5%" class="align-middle text-center text-uppercase">Email</th>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">No. WA</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Jabatan dalam Satker</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Provinsi/Kabupaten</th>
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
</section>

<div class="modal fade" id="modal-form-update">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
            <div class="overlay" id="loader-update" style="display: none">
                <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
            </div>
            <div class="modal-header">
                <h4 class="modal-title text-white">Form Ubah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label text-white">Nama (Lama)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama" id="nama" class="form-control" disabled/>
                                        <input type="text" name="id" id="id" class="form-control" style="display:none"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nip" class="col-sm-4 col-form-label text-white">NIP (Lama)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nip" id="nip" class="form-control" disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="no_hp" class="col-sm-4 col-form-label text-white">No. WA (Lama)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_hp" id="no_hp" class="form-control" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-white">Email (Lama)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="email" id="email" class="form-control" disabled/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="nama_baru" class="col-sm-4 col-form-label text-white">Nama (Baru)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_baru" id="nama_baru" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nip_baru" class="col-sm-4 col-form-label text-white">NIP (Baru)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nip_baru" id="nip_baru" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="no_hp_baru" class="col-sm-4 col-form-label text-white">No. WA (Baru)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_hp_baru" id="no_hp_baru" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_baru" class="col-sm-4 col-form-label text-white">Email (Baru)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="email_baru" id="email_baru" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> CANCEL</button>
                <button type="button" onclick="updateDataUser()" class="btn btn-success">SIMPAN</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function reload()
    {
        var status = $('#filter').val()

        $('#loader-datatable').show()

        $.post('{{ route('master.data-users') }}', {status, _token: '{{csrf_token()}}'}, function(e){

            $("#data").DataTable().destroy();

            $("#data").DataTable({
                data: e,
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: false,
                columns: [
                    { data: 'button', className:"text-center align-middle"},
                    { data: 'username', className:"text-center align-middle"},
                    { data: 'nama', className:"align-middle"},
                    { data: 'email', className:"align-middle"},
                    { data: 'no_hp', className:"text-center align-middle"},
                    { data: 'level', className:"align-middle"},
                    { data: 'nama_provinsi', className:"align-middle"},
                ],
                buttons: ["csv", "excel", "pdf", "print"],
            })
            .buttons()
            .container()
            .appendTo("#data_wrapper .col-md-6:eq(0)");

            $('#loader-datatable').hide()

        });
    }

    function openData()
    {
        $('#wrap-data').show(700)
        $('#wrap-form').hide(700)
        $('#wrap-form-proses').hide(700)

        var status = $('#filter').val()

        $('#loader-datatable').show()

        $.post('{{ route('master.data-users') }}', {status, _token: '{{csrf_token()}}'}, function(e){

            $("#data").DataTable().destroy();

            $("#data").DataTable({
                data: e,
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: false,
                columns: [
                        { data: 'button', className:"text-center align-middle"},
                        { data: 'username', className:"text-center align-middle"},
                        { data: 'nama', className:"align-middle"},
                        { data: 'email', className:"align-middle"},
                        { data: 'no_hp', className:"text-center align-middle"},
                        { data: 'level', className:"align-middle"},
                        { data: 'nama_provinsi', className:"align-middle"},
                ],
                buttons: ["csv", "excel", "pdf", "print"],
            })
            .buttons()
            .container()
            .appendTo("#data_wrapper .col-md-6:eq(0)");

            $('#loader-datatable').hide()

        });
    }

    function openFormUpdateUser(id)
    {
        loadDetailUser(id)
        $('#modal-form-update').modal('show')
    }

    function loadDetailUser(id)
    {
        $.post('{{ route('master.detail-user') }}', {id, _token: '{{csrf_token()}}'}, function(e){

            $('#id').val(e.id_akses)
            $('#nama').val(e.nama)
            $('#nip').val(e.username)
            $('#no_hp').val(e.no_hp)
            $('#email').val(e.email)

        });
    }

    function updateDataUser()
    {
        var id_akses    = $('#id').val()
        var nama        = $('#nama_baru').val()
        var username    = $('#nip_baru').val()
        var no_hp       = $('#no_hp_baru').val()
        var email       = $('#email_baru').val()

        swal({
            title: "Ubah User Ini?",
            text: "Data yang Sudah Diubah Tidak Dapat Dipulihkan. Lanjutkan?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2b982b",
            confirmButtonText: "Ya, Lanjutkan!",
            closeOnConfirm: true
        }, function () {

            $('#loader-datatable').show()
            $('#modal-form-update').modal('hide')

            $.post('{{ route('users.update') }}', {id_akses, nama, username, no_hp, email, _token: '{{csrf_token()}}'}, function(e){

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

    function resetPassword(id_akses) 
    {
        swal({
            title: "Ubah Password?",
            text: "Password Default adalah admin123. Lanjutkan?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2b982b",
            confirmButtonText: "Ya, Lanjutkan!",
            closeOnConfirm: true
        }, function () {

            $('#loader-datatable').show()

            var password    = "admin123";

            $.post('{{ route('users.change-password') }}', {id_akses, password, _token: '{{csrf_token()}}'}, function(e){

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
    
    function hideUser(id)
    {
        swal({
            title: "Hapus User Ini?",
            text: "Data yang Sudah Dihapus Tidak Dapat Dirollback. Lanjutkan?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2b982b",
            confirmButtonText: "Ya, Lanjutkan!",
            closeOnConfirm: true
        }, function () {

            $('#loader-datatable').show()

            $.post('{{ route('master.hide-user') }}', {id, _token: '{{csrf_token()}}'}, function(e){

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
</script>
