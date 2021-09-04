@extends('layouts.app')
@section('title','Manage Slider Image')
@section('content')
        
        <section class="shop checkout section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="ca">            
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-height form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-height form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">
            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
            
                                            
                                                <a href="/register">
                                                   | {{ __('Belum Punya Akun') }}
                                                </a>
                                            
                                        </div>
                                    </div>
                                </form>
                                <br>
                                {{-- <div class="form-group row">
                                    <div class="col-md-6 offset-md-4" align="right">
                                        <div class="form-check">
                                          
                                            @if (Route::has('password.request'))
                                            <label class="form-check-label" for="remember">
                                                <a href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
                                            </label>
                                            @endif
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		@endsection