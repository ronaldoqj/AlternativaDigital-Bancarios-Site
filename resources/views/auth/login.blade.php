@extends('layouts.layout-auth-adm')

@section('content')

            <!-- <div class="card"> -->
                <div class="row justify-content-center">
                    <div class="col text-center">
                        <img src="/_adm/assets/SVGs/logo-auth.svg" class="img-fluid" onload="SVGInject(this)" />
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-7">
                            <v-text-field
                                name="email"
                                label="Prepend"
                                prepend-icon="email"
                            ></v-text-field>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-7">
                            <v-text-field
                                name="password"
                                label="Prepend"
                                prepend-icon="lock"
                            ></v-text-field>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row justify-content-center">

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-7 ">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row justify-content-center">
                            <!-- <label for="password" class="col-md-4 col-form-label"></label> -->

                            <div class="col-md-7 box__btn--forgot-password ">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueci Minha Senha') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-7">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            <!-- </div> -->
    
@endsection
