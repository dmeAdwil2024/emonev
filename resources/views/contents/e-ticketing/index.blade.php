@extends('layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $current }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ $modul }}</a></li>
                        <li class="breadcrumb-item active">{{ $current }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @if ($type == 'pusat')
        @include('contents.e-ticketing.form')
        @include('contents.e-ticketing.data')
        @include('contents.e-ticketing.form-proses')
    @else
        @include('contents.e-ticketing.data-daerah')
        @include('contents.e-ticketing.form-daerah')
        @include('contents.e-ticketing.form-proses-daerah')
    @endif
@endsection

@section('js')
    <script>
        $(function() {
            openData()
        });
    </script>
@endsection
