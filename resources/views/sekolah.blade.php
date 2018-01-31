{{$nama}}<br>
{{$alamat}}<br>

Jurusan<ol type="1">
@foreach($jurusan as $key)
	<li>{{$key}}</li>
@endforeach
</ol>