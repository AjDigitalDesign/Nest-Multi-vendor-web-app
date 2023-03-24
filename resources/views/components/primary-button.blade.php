<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-heading btn-block hover-up']) }}>
    {{ $slot }}
</button>
