@foreach (['success', 'warning', 'danger'] as $status)
  @if (session()->has($status))
    <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
      <strong>{{ session($status) }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
@endforeach
