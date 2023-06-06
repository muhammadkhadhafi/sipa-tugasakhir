<form action="{{ $url . '/' . $id }}" method="post" class="form-inline"
  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
  @csrf
  @method('delete')
  <button type="submit" class="btn btn-sm btn-danger" style="width: 36px; border-radius: 0 3px 3px 0"><i
      class="far fa-trash-alt"></i></button>
</form>
