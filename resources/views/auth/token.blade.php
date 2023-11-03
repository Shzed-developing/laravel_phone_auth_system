@extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Auth Token') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('auth.phone.token') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="token" class="col-md-4 col-form-label text-md-end">{{ __('Active Code') }}</label>

                                    <div class="col-md-6">
                                        <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token" value="{{ old('token') }}" required autocomplete="token" autofocus>

                                        @error('token')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Check') }}
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

