@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <x-message/>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <x-input-field-label field="full_name" class="col-md-4 red-star">
                                    Full Name
                                </x-input-field-label>

                                <div class="col-md-6">
                                    <x-input-field type="text" field="full_name" required="true"/>

                                    <x-validation-error-message field="full_name"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <x-input-field-label field="email" class="col-md-4 red-star">
                                    E-Mail Address
                                </x-input-field-label>

                                <div class="col-md-6">
                                    <x-input-field type="email" field="email" required="true"/>

                                    <x-validation-error-message field="email"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <x-input-field-label field="dob" class="col-md-4 red-star">
                                    Date Of Birth
                                </x-input-field-label>
                                <div class="col-md-6">
                                    <x-input-field type="date" field="dob" required="true"/>

                                    <x-validation-error-message field="dob"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <x-input-field-label field="username" class="col-md-4 red-star">
                                    Username
                                </x-input-field-label>
                                <div class="col-md-6">
                                    <x-input-field type="text" field="username" required="true"/>

                                    <x-validation-error-message field="username"/>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <x-input-field-label field="password" class="col-md-4 red-star">
                                    Password
                                </x-input-field-label>
                                <div class="col-md-6">
                                    <x-input-field type="password" field="password" required="true"/>

                                    <x-validation-error-message field="password"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <x-input-field-label field="password_confirmation" class="col-md-4 red-star">
                                    Confirm Password
                                </x-input-field-label>
                                <div class="col-md-6">
                                    <x-input-field type="password" field="password_confirmation" required="true"/>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <x-button button-type="submit" class="btn-primary">Register</x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
