<div class="dropdown">
    <button class="btn btn-dark dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">
        <i class="fas fa-{{ $icon }} mr-2"></i> {{ $title }}
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        {{ $slot }}
    </div>
</div>
