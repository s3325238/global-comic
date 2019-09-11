@if(!empty($values))

    @foreach($values as $key => $name)

        <option value="{{ $key }}">{{ $name }}</option>

    @endforeach

@endif