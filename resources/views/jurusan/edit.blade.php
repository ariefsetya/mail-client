@extends('layouts.app')

@section('title') CRUD Laravel - Edit Kelas @endsection

@section('content')

<h1>Edit Data Kelas</h1>

<form method="POST" action="{{route('update_jurusan')}}">
	<input type="hidden" name="id" value="{{$jurusan->id}}">
	@include('jurusan.forms')
</form>

@endsection