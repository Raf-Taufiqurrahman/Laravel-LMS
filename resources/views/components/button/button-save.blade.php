<button {{ $attributes->merge(['class' => 'btn']) }}>
    <i class="fas fa-{{ $icon }} mr-2"></i>
    {{ $title }}
</button>
