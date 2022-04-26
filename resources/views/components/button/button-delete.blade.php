<a href="#" onclick="deleteData({{ $id }})" class="text-danger">
    <i class="fas fa-eraser mr-1"></i>
    {{ $title }}
</a>
<form id="delete-form-{{ $id }}" action="{{ $url }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
