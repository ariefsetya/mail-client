@extends('layouts.app')

@section('title') CRUD Laravel - Tambah Jurusan @endsection

@section('content')

<h1>Tambah Data Jurusan</h1>

<form method="POST" action="{{route('save_jurusan')}}">
	@include('jurusan.forms')
</form>

@endsection