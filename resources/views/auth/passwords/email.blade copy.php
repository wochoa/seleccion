@extends('plantillas.plantillasini')
@section('clasebody')
login-page
@endsection

@section('content')
<div class="login-box">
          <div class="login-logo">
            <a href="#"><img src="{{asset('/dist/img/logo2.png')}}" alt="" width="250"></a>
          </div>
            <div class="card">
                <div class="card-header">{{ __('Restablecer la contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="input-group mb-3">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div> --}}
                        <div class="row">
                          <div class="col-12">
                            <button type="submit" class="btn btn-dark float-right">{{ __('Enviar para restablecer su contraseña') }}</button>
                          </div>
                          <!-- /.col -->
                        </div>
                    </form>
                    <div class="social-auth-links text-center mb-3">
                      <div class="dropdown-divider"></div>
                          <p class="mb-1">
                            <a  class="btn btn-block btn-primary btn-sm" href="{{ route('login') }}">Ingresar</a>
                          </p>
                          <p class="mb-0">
                            <a href="{{ route('register') }}" class="btn btn-block btn-danger btn-sm">Registrarse</a>
                          </p>
                    </div>
                </div>
            </div>
</div>
@endsection
