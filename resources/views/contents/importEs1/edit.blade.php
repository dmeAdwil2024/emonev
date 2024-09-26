@extends('layouts.caput')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Realisasi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('importes1.update', $realisasi->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="bukti_ref" class="col-md-4 col-form-label text-md-right">{{ __('Bukti Referensi') }}</label>

                            <div class="col-md-6">
                                <input id="bukti_ref" type="file" class="form-control @error('bukti_ref') is-invalid @enderror" name="bukti_ref" value="{{ old('bukti_ref') }}" required autocomplete="bukti_ref" autofocus>

                                @error('bukti_ref')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
