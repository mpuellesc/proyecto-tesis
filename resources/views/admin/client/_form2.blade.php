
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


<div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="dni">DNI</label>
            <input 
            type="number"
            class="form-control
            @error('dni') 
                is-invalid
            @enderror
            "
            name="dni"
            id="dni"
            value="{{old('dni', (isset($client->profile->dni)) ? $client->profile->dni : '')}}"
            required>
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="number" 
            class="form-control
            @error('ruc') 
                is-invalid
            @enderror
            "
            name="ruc" 
            id="ruc"
            value="{{old('ruc', (isset($client->profile->ruc)) ? $client->profile->ruc : '')}}"
            >
            @error('ruc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
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
            value="{{old('phone', (isset($client->profile->phone)) ? $client->profile->phone : '')}}"
            required
            >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>


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
    value="{{old('address', (isset($client->profile->address)) ? $client->profile->address : '')}}"
    required
    >
    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
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