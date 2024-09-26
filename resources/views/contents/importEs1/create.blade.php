@extends('layouts.caput')

@section('contents')
<div class="main">
    <div class="topbar">
        <div class="toggle col-md-1" id="menuNav">
            <a href="#menuNav">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="col-md-8 d-flex logo-admin">
            <img src="{{asset('newdashboard/images/logo-emonev.png')}}" alt="logo emonev" class="img-fluid margin-auto logo-smaller">
            <div class="text-center">
                <h1 class="title">E-MONEV</h1>
                <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
            </div>
        </div>
        <div class="avatar col-md-3 p-2 d-flex">
            <img src="{{asset('newdashboard/images/user-avatar.png')}}" alt="" class="img-fluid avatar-img me-2">
            <div class="avatar-name small fw-bold">
                Selamat Datang Admin,<br>
                Bagian Perencanaan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="font-tebala col-sm-6" style="background-color:#ebebeb;">
            Create Realisasi
        </div>
        <div class="col-md-6 font-tebala" style="background-color:#ebebeb; text-align: right">
            <a href="{{ route('realisasi.index') }}">Realisasi</a> / Create
        </div>
    </div>
    <div style="height:10px"></div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create New Realisasi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('importes1.store') }}" method="POST" enctype="multipart/form-data" id="realisasiForm">
                        @csrf
                        <div class="mb-3">
                            <label for="bukti_ref" class="form-label">Bukti Revisi (Excel File)</label>
                            <input type="file" class="form-control" id="bukti_ref" name="bukti_ref" accept=".xlsx,.xls" required>
                            <small class="form-text text-muted">Upload Excel file (.xlsx or .xls) as bukti_ref</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#realisasiForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Realisasi created successfully.',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('realisasi.index') }}";
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! ' + xhr.responseJSON.message,
                    });
                }
            });
        });
    });
</script>
@endpush
