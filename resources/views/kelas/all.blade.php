@extends('layouts.app')

@section('title') CRUD Laravel - Data Kelas @endsection

@section('content')

	<h1>Data Kelas</h1>

	<a class="btn waves-effect waves-light" href="{{route('tambah_kelas')}}">Tambah Kelas</a>
	<a class="btn waves-effect waves-light right" href="{{route('pdf_kelas')}}">View PDF</a>

	<table>
		<thead>
			<th>Jurusan</th>
			<th>Kelas</th>
			<th>Jumlah Siswa</th>
			<th>Lokasi</th>
			<th>PDF</th>
			<th>Download PDF</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		@foreach($kelas as $key)
		<tbody>
			<tr>
				<td>{{$key->jurusan->nama}}</td>
				<td>{{$key->kelas}}</td>
				<td>{{$key->jumlah_siswa}}</td>
				<td>{{$key->lokasi}}</td>
				<td><a href="{{route('view_pdf_kelas',[$key->id])}}">View PDF</a></td>
				<td><a href="{{route('download_pdf_kelas',[$key->id])}}">Download PDF</a></td>
				<td><a href="{{route('edit_kelas',[$key->id])}}">Edit</a></td>
				<td><a onclick="return confirm('Hapus data {{$key->kelas}}?')" href="{{route('delete_kelas',[$key->id])}}">Delete</a></td>
			</tr>
		</tbody>
		@endforeach
	</table>

	{!!$kelas->render()!!}

@endsection

