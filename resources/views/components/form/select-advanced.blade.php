<div class="mb-3">
    <label class="form-label">{{ $title }}</label>
    <select id="select-tags-advanced" class="form-select" name="{{ $name }}" multiple>
        {{ $slot }}
    </select>
</div>
