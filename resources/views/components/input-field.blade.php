<input id="{{$field}}"
       type="{{$type}}"
       class="form-control {{$class}} @error("$field") is-invalid @enderror"
       name="{{$field}}"
       value="{{ old("$field") }}"
       @if($required)required @endif
       autocomplete="{{$field}}"
       autofocus>
