@props(['options'=>[],'selected'=>null, 'placeholder'=>'Select an option'])
<select {{$attributes}}>
    <option value="">{{ $placeholder }}</option>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>