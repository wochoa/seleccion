@extends('plantillas.plantillasini')

@section('clasebody')
login-page
@endsection

@section('content')
<div class="login-box">
            <div class="card">
                <div class="card-header">{{ __('Restablecer contraseña') }}</div>

                <div class="card-body">
                  @if($identificador==1)

                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ $mensage }}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> --}}
                  </div>

                    <form method="POST" action="{{route('nuevaclave')}}">

                        @csrf

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
                        <input type="hidden" name="id" value="{{$idUer}}">

                        <div class="input-group mb-3">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $correo ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
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

                        

                        <div class="input-group mb-3">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingresar nueva clave">
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

                        

                        {{-- <div class="input-group mb-3">
                          <input tid="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div> --}}

                       
                        <div class="row">
                          <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">{{ __('Restablecer contraseña') }}</button>
                          </div>
                          <!-- /.col -->
                        </div>
                    </form>
                     
                         
                     @else
                         
                     
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Alerta!</strong> {{ $mensage }}
                      {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> --}}
                    </div>

                    @endif
                    <div class="social-auth-links text-center mb-3">
                          <p class="mb-1">
                            <a  class="btn btn-block btn-outline-primary btn-xs" href="{{ route('login') }}">Ingresar</a>
                          </p>
                          {{-- <p class="mb-0">
                            <a href="{{ route('register') }}" class="btn btn-block btn-outline-danger btn-xs">Registrarse</a>
                          </p> --}}
                    </div>
                </div>
            </div>
</div>
@endsection
