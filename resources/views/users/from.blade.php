<?php
$user_type = [
    '0' => 'Usuario',
    '1' => 'Administrador',
];
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">{{ $title }}</h5>
                    </button>
                </div>
                @csrf
                {!! Form::open(['url' => $url, 'method' => $method, 'id' => $id]) !!}
                <div class="modal-body">
                    @if ($id === 'addUser')
                        {{ Form::label('name', 'Nombre completo:') }}
                        <div class="input-group">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nombre complelto', 'required', 'id' => 'name']) }}
                        </div>
                        {{ Form::label('email', 'Correo:') }}
                        <div class="input-group">
                            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'correo', 'required', 'id' => 'name']) }}
                        </div>
                        {{ Form::label('phone', 'Telefono:') }}
                        <div class="input-group">
                            {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Telefono', 'required', 'id' => 'name']) }}
                            @error('phone')
                            <span class="invalid-feedback"
                                role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        {{ Form::label('userType', 'Tipo de usuario:') }}
                        <div class="input-group">
                            <div class="input-group">
                                {{ Form::select('userType', $user_type, 0, ['class' => 'form-control', 'id' => 'userType']) }}
                            </div>
                        </div>
                        {{ Form::label('password', 'Contraseña:') }}
                        <div class="input-group">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'required', 'id' => 'password']) }}
                        </div>
                        <div id="music_container">
                            {{ Form::label('music_preferences', 'Gustos musicales:') }}
                            <div class="input-group">
                                <input type="text"
                                    id="music_preferences"
                                    name="music_preferences"
                                    class="form-control"
                                    value="Rock,Jazz,Electrónica,Reggae,Salsa,Dubstep,Cumbia,Rock and Roll,Gospel"
                                    data-role="tagsinput" />
                            </div>
                        </div>
                </div>
                {{ Form::label('profile_pic', 'Foto de perfil:') }}
                <div class="input-group">
                    {{ Form::file('profile_pic', ['class' => 'form-control', 'required', 'id' => 'profile_pic']) }}
                </div>

            @else
                <div class="input-group">
                    {{ Form::hidden('idE', '', ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required', 'id' => 'idE']) }}
                </div>
                <div class="input-group">
                    {{ Form::text('nameE', '', ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required', 'id' => 'nameE']) }}
                </div>
                @endif
            
                <button type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                <button type="submit"
                    class="btn btn-primary">Guardar</button>
            
            {!! Form::close() !!}
        </div>
        </div>
    </div>
</div>
</div>
