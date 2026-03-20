<div style="margin-bottom:15px">
    <label>{{ $label }}</label>
    <br>
    <select name="{{ $name }}">
        <option value="">-- Selecciona {{ $label }} --</option>
        @foreach($options as $option)
            <option value="{{ $option->$valueField }}">
                {{ $option->$textField }}
            </option>
        @endforeach
    </select>
</div>
