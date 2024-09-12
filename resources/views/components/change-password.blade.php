<div class="modal fade" id="modal-change-password">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-secondary">
            <div class="overlay" id="loader-change-password" style="display: none">
                <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
            </div>
            <div class="modal-header">
                <h4 class="modal-title">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" id="username" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                            <div class="col-sm-8">
                                <input type="password" id="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_konfirmasi" class="col-sm-4 col-form-label">Password Baru (Konfirmasi)</label>
                            <div class="col-sm-8">
                                <input type="password" id="password_konfirmasi" class="form-control" onkeyup="checkPassword()">
                                <span id="alert-password" class="text-warning" style="display:none">
                                    <small>Password Tidak Cocok</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times-circle"></i> Cancel</button>
                <button type="button" id="btn-update-password" class="btn btn-success" onclick="updatePassword()"> <i class="fas fa-check-circle"></i> Ubah Password</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    function changePassword(username)
    {
        $('#username').val(username)
        $('#loader-change-password').show()
        $('#password').val("")
        $('#password_lama').val("")
        $('#password_konfirmasi').val("")
        $('#modal-change-password').modal('show');
        $('#loader-change-password').hide()
        $('#btn-update-password').prop('disabled', true);
    }

    function updatePassword()
    {
        $('#loader-change-password').show()
        var username        = $('#username').val()
        var password        = $('#password_konfirmasi').val()

        $.post('{{ route('users.change-password') }}', {username, password, _token: '{{csrf_token()}}'}, function(e){

            $('#loader-change-password').hide()

            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.message
                })

                $('#modal-change-password').modal('hide');
            }
            else
            {
                Toast.fire({
                    icon: 'error',
                    title: e.message
                })
            }
            
        });
    }

    function checkPassword()
    {
        $('#btn-update-password').prop('disabled', true);

        var password            = $('#password').val()
        var password_konfirmasi = $('#password_konfirmasi').val()

        if(password == password_konfirmasi)
        {
            $('#alert-password').hide()
            $('#btn-update-password').prop('disabled', false);
        }
        else
        {
            $('#alert-password').show()
        }
    }
    
</script>
