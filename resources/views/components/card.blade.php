<div class="card rounded-lg">
    <div class="card-status-top bg-info"></div>
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div {{ $attributes->merge(['class' => 'card-body']) }}>
        {{ $slot }}
    </div>
</div>
