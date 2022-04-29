<div class="card rounded-lg">
    <div class="card-status-top bg-info"></div>
    <div {{ $attributes->merge(['class' => 'card-body']) }}>
        {{ $slot }}
    </div>
</div>
