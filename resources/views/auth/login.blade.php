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
        <div class="card-header" align="center">{{ __('Iniciar sesión') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
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

                {{-- <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                <div class="input-group mb-3">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                {{-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        
                    </div>
                </div> --}}
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="remember">
                        Recordarme
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-dark btn-block"> {{ __('Ingresar') }} <i class="fas fa-arrow-circle-right" ></i></button>
                    
                  </div>
                  <!-- /.col -->
                </div>
            </form>
            <div class="social-auth-links text-center mb-3">
              <div class="dropdown-divider"></div>
                          <p class="mb-1">
                            @if (Route::has('password.request'))
                                                <a  class="btn btn-block btn-primary" href="{{ route('password.request') }}">
                                                    {{ __('Se olvidó su contraseña?') }}
                                                </a>
                                            @endif
                          </p>
                          <p class="mb-0">
                            <a href="{{ route('register') }}" class="btn btn-block btn-danger ">Registrarse</a>
                          </p>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
  // tiempo para mostrar alertas
  function mostraralerta(tipomensaje,mensaje)
  {
    const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 6000// 6 segundos se demora para desaparecer
            });
      Toast.fire({
          icon: tipomensaje,
          title: mensaje
        });
  }

@foreach (['danger', 'warning', 'success', 'info'] as $msg) 
     @if(Session::has('alert-' . $msg))      
        mostraralerta('{{ $msg }}','{{ Session::get('alert-' . $msg) }}');
     @endif 
@endforeach
</script>
@endsection