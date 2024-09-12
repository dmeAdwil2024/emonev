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

    @switch($type)
        @case('request_user')
            @include('contents.master.users.request-users')
            @break
        @case('data_users')
            @include('contents.master.users.data-users')
            @break

        @default
            <span>Something went wrong, please try again</span>
    @endswitch
    

@endsection

@section('js')
    <script>
        $(function () {
            openData()
        });
    </script>
@endsection
