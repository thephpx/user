@extends('Tablerui::layouts.signin')
@section('content')
<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('assets/tablerui/static/logo.svg') }}" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image">
            </a>
        </div>
        <form class="card card-md" action="" method="post" autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create new account</h2>
                <div class="mb-3">
                    <label class="form-label">First name</label>
                    <input type="text" name="first_name"
                        class="form-control @if($errors->has('first_name')) is-invalid @endif"
                        placeholder="Enter first name" />
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">{{$errors->first('first_name')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Last name</label>
                    <input type="text" name="last_name" class="form-control @if($errors->has('last_name')) is-invalid @endif" placeholder="Enter last name">
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">{{$errors->first('last_name')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter email">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Password"
                            autocomplete="off">
                        <span class="input-group-text">
                            <a href="javascript:togglePassword('password')" class="link-secondary" title="Show password"
                                data-bs-toggle="tooltip" tabindex="-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </span>
                        @if($errors->has('password'))
                            <div class="invalid-feedback">{{$errors->first('password')}}</div>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" placeholder="Password"
                            autocomplete="off">
                        <span class="input-group-text">
                            <a href="javascript:togglePassword('password_confirmation')" class="link-secondary"
                                title="Show password" data-bs-toggle="tooltip" tabindex="-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </span>
                        @if($errors->has('password_confirmation'))
                            <div class="invalid-feedback">{{$errors->first('password_confirmation')}}</div>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    @if($errors->has('terms'))
                    <div class="text-danger mb-2">{{$errors->first('terms')}}</div>
                    @endif
                    <label class="form-check">
                        <input type="checkbox" name="terms" value="1" class="form-check-input" />
                        <span class="form-check-label">I agree to abide by the <a href="" tabindex="-1">terms of services</a>.</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Create new account</button>
                </div>
            </div>
        </form>
        <div class="text-center text-secondary mt-3">
            Already have account? <a href="{{route('login')}}" tabindex="-1">Sign in</a>
        </div>
    </div>
</div>
@endsection