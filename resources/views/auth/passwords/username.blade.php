@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">

                    <x-message/>

                    <form method="POST" action="{{ route('password.username') }}">
                        @csrf

                        <div class="row mb-3">
                            <x-input-field-label field="username" class="col-md-4 red-star">
                                Username
                            </x-input-field-label>

                            <div class="col-md-6">
                                <x-input-field type="text" field="username" required="true"/>

                                <x-validation-error-message field="username"/>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <x-button button-type="submit" class="btn-primary">Send Password Reset Link</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
