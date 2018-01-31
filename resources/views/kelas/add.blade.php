@extends('layouts.app')

@section('title') CRUD Laravel - Tambah Kelas @endsection

@section('content')

<h1>Tambah Data Kelas</h1>

<form method="POST" action="{{route('save_kelas')}}">
	@include('kelas.forms')
</form>

@endsection

@section('footer')
<script type="text/javascript">
	  $(document).ready(function() {
	    $('select').material_select();
	  });
        
</script>
@endsection