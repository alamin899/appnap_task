@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <x-message/>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <x-input-field-label field="username" class="col-md-4">
                                Username
                            </x-input-field-label>
                            <div class="col-md-6">
                                <x-input-field type="text" field="username" required="true"/>

                                <x-validation-error-message field="username"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <x-input-field-label field="password" class="col-md-4">
                                Password
                            </x-input-field-label>
                            <div class="col-md-6">
                                <x-input-field type="password" field="password" required="true"/>

                                <x-validation-error-message field="password"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <x-button button-type="submit" class="btn-primary">Login</x-button>

                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
