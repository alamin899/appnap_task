@if($errors->has("$field"))
    <div>
        <span class="text-danger message {{$class}}">{{ $errors->first("$field") }}</span>
    </div>
@endif
