<div class="card rounded-lg">
    <div class="card-status-top bg-info"></div>
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-actions">
            <form action="{{ $url }}" method="GET">
                <x-form.input-group />
            </form>
        </div>
    </div>
    <div class="card-body p-0">
        {{ $slot }}
    </div>
</div>
