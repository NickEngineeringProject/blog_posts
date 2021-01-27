<form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="file" name="image">
    <button type="submit">Отправить</button>
</form>

@isset ($path)
    <img src="{{'/storage/' . $path}}">
@endisset

{{--{{'/storage/' . $path}}--}}
