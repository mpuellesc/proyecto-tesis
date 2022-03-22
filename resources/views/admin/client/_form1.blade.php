<div class="form-group">
    <label for="client_id">Tipo de documento</label>
    <select class="form-control" name="documento" id="documento1">
        <option value="0">Seleccione...</option>
        <option value="1">DNI</option>
        <option value="2">RUC</option>
    </select>
</div>

<div class="form-row">
    <div class="form-group col-md-4" id="dni1">
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
            
            value="{{old('dni', (isset($res)) ? $res['dni'] : '')}}">
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-4" id="ruc1">
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
            value="{{old('ruc', (isset($res2)) ? $res2['ruc'] : '')}}">
            @error('ruc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">{{ __($btnText) }}</button>