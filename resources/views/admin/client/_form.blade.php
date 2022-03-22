<div class="form-group col-md-4">
    <div class="form-group">
        <input type="number" class="d-none" name="dni" id="dni" value="{{old('dni', (isset($res)) ? $res['dni'] : '')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label for="name">Nombre</label>
    <input 
    type="text" disabled
    class="form-control
    @error('name') 
        is-invalid
    @enderror
    "
    name="name"
    id="name"
    value="{{old('name', (isset($res['nombres'])) ? $res['nombres'] : '')}}"
    required>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    @if (isset($res['dni']))
    <label for="surnames">Razon</label>
    @endif
    <input 
    type="text" disabled
    class="form-control
    @error('surnames') 
        is-invalid
    @enderror
    "
    name="surnames"
    id="surnames"
    value="{{old('surnames', (isset($res['apellidoPaterno']) and $res['apellidoMaterno']) ? $res['apellidoPaterno'].' '.$res['apellidoMaterno'] : '')}}"
    required>
    @error('surnames')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="email">Correo electrónico</label>
    <input 
    type="email"
    class="form-control
    @error('email') 
        is-invalid
    @enderror
    "
    name="email"
    id="email"
    value="{{--old('email', $client->email)--}}"
    required>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div> 
{{--
 <div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input 
            type="text"
            class="form-control
            @error('name') 
                is-invalid
            @enderror
            "
            name="name"
            id="name"
            value="{{old('name', $client->name)}}"
            required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="surnames">Apellidos</label>
            <input 
            type="text"
            class="form-control
            @error('surnames') 
                is-invalid
            @enderror
            "
            name="surnames"
            id="surnames"
            value="{{old('surnames', $client->surnames)}}"
            required>
            @error('surnames')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input 
            type="email"
            class="form-control
            @error('email') 
                is-invalid
            @enderror
            "
            name="email"
            id="email"
            value="{{old('email', $client->email)}}"
            required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div> 
--}}




<div class="form-group">
    <label for="address">Dirección</label>
    <input type="text" 
    class="form-control
    @error('address') 
        is-invalid
    @enderror
    " 
    name="address" 
    id="address"
    value="{{--old('address', $client->profile->address)--}}"
    required
    >
    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div> 

<div class="form-group col-md-4">
    <div class="form-group">
        <label for="phone">Teléfono \ Celular</label>
        <input type="number" 
        class="form-control
        @error('phone') 
            is-invalid
        @enderror
        "
        name="phone" 
        id="phone"
        value="{{--old('phone', $client->profile->phone)--}}"
        required
        >
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="file">Foto de perfil</label><br>
        <div class="kv-avatar">
            <div class="file-loading">
                <input id="file" name="file" type="file">
            </div>
        </div>
        @error('file')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div id="kv-avatar-errors-1" class="center-block" ></div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">{{ __($btnText) }}</button>
<a href="{{ URL::previous() }}" class="btn btn-light">
    Cancelar
</a>
