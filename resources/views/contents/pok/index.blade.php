@extends('layouts.main')

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

    @include('contents.pok.data')

@endsection

@section('js')
    <script>
        $(function () {
            openData()
            checkStatusKabagkeu()
        });
    </script>
@endsection
