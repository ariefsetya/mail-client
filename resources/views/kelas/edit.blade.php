@extends('layouts.app')

@section('title') CRUD Laravel - Edit Kelas @endsection

@section('content')

<h1>Edit Data Kelas</h1>

<form method="POST" action="{{route('update_kelas')}}">
	<input type="hidden" name="id" value="{{$kelas->id}}">
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