@extends ('layouts.home', ['section' => 'login'])

@section ('content')
<div class="container" id="login-container">
  <h4>Iniciar sesión en SmarTACC</h4>
  @include ('errors.list')
  {!! Form::open(['url' => 'auth/login']) !!}
    <div class="input-field" id="login-email">
      {!! Form::text('email', null, ['class' => 'validate']) !!}
      {!! Form::label('email', 'Correo electrónico') !!}
    </div>
    <div class="input-field" id="login-password">
      {!! Form::password('password', null, ['class' => 'validate']) !!}
      {!! Form::label('password', 'Contraseña') !!}
    </div>
    <button type="submit" class="btn waves-effect waves-light" id="login-button">Entrar</button>
  {!! Form::close() !!}
</div>
@endsection