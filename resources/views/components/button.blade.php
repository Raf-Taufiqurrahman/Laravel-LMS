<button {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    <i class="fas fa-{{ $icon }} mr-2"></i>
    {{ $title }}
</button>
