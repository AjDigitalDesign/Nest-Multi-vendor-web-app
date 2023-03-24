@props(['messages'])

@if ($messages)
    <div>
        @foreach ((array) $messages as $message)
           <span {{ $attributes->merge(['class' => 'alert']) }}>{{ $message }}</span>
        @endforeach
    </div>
@endif
