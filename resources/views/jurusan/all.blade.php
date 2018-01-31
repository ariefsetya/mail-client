@extends('layouts.app')

@section('title') CRUD Laravel - Data Jurusan @endsection

@section('content')

	<h1>Data Jurusan</h1>

	<a class="btn waves-effect waves-light" href="{{route('tambah_jurusan')}}">Tambah Jurusan</a>

	<table>
		<thead>
			<th>Jurusan</th>
			<th>Kajur</th>
			<th>Keterangan</th>
			<th>Akreditasi</th>
			<th>PDF</th>
			<th>Download PDF</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		@foreach($jurusan as $key)
		<tbody>
			<tr>
				<td>{{$key->nama}}</td>
				<td>{{$key->kajur}}</td>
				<td>{{$key->keterangan}}</td>
				<td>{{$key->akreditasi}}</td>
				<td><a href="{{route('view_pdf_jurusan',[$key->id])}}">View PDF</a></td>
				<td><a href="{{route('download_pdf_jurusan',[$key->id])}}">Download PDF</a></td>
				<td><a href="{{route('edit_jurusan',[$key->id])}}">Edit</a></td>
				<td><a onclick="return confirm('Hapus data {{$key->nama}}?')" href="{{route('delete_jurusan',[$key->id])}}">Delete</a></td>
			</tr>
		</tbody>
		@endforeach
	</table>

	{!!$jurusan->render()!!}

@endsection