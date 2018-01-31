@extends('layouts.app')

@section('title') CRUD Ajax Laravel - Data Kelas @endsection

@section('content')

	<button id="tampil_data" class="btn waves-light waves-effect">
		Tampilkan Data Kelas
	</button>
	
	<button id="tambah_data" class="btn waves-light waves-effect">
		Tambah Data Kelas
	</button>

	<div id="area">
		
	</div>

@endsection

@section('footer')

	<script type="text/javascript">
		var html_add = '<div><input placeholder="Kelas" id="kelas"></div>'+
						'<div><select id="id_jurusan"></select></div>'+
						'<div><input id="lokasi" placeholder="Lokasi"></div>'+
						'<div><input id="jumlah_siswa" placeholder="Jumlah"></div>'+
						'<div><button id="simpan_data" class="btn waves-effect waves-light">Submit</button></div>';

		var csrf_token = '{{csrf_token()}}';

		$("#tambah_data").on('click',function () {
			$.ajax({
				url:'{{route("get_jurusan")}}',
				dataType:'json',
				success:function(result){
					var data = result.data;
					if(result.response_code==200){
						var jurusan = "";
						for(var i=0;i<data.jurusan.length;i++){
							jurusan += "<option value='"+data.jurusan[i].id+"'>";
							jurusan += data.jurusan[i].nama;
							jurusan += "</option>";
						}

						$("#area").html(html_add);
						$("#id_jurusan").html(jurusan);

						$("select").material_select();

						$("#simpan_data").on('click',function () {
							var kelas = $("#kelas").val();
							var id_jurusan = $("#id_jurusan").val();
							var lokasi = $("#lokasi").val();
							var jumlah_siswa = $("#jumlah_siswa").val();

							$.ajax({
								url:'{{route("save_kelas")}}',
								type:'POST',
								dataType:'json',
								data:{
										'kelas':kelas,
										'id_jurusan':id_jurusan,
										'lokasi':lokasi,
										'jumlah_siswa':jumlah_siswa,
										'_token':csrf_token
									},
								success:function (result) {
									if(result.response_code==200){
										$("#area").fadeOut();
										$("#area").html('<h1>Data Tersimpan</h1>');
										$("#area").fadeIn();
									}
								}
							});
						});

					}
				}
			});
		});


		$("#tampil_data").on('click',function () {
			
			$.ajax({
				url:'{{route("get_kelas")}}',
				dataType:'json',
				success:function (result) {
					if(result.response_code==200){
						var html_view = '<table>';
						var data = result.data;

						for(var i=0;i<data.kelas.length;i++){
							html_view += '<tr>';
							html_view += '<td>'+data.kelas[i].kelas+'</td>';
							html_view += '<td>'+data.kelas[i].lokasi+'</td>';
							html_view += '<td>'+data.kelas[i].jumlah_siswa+'</td>';
							html_view += '</tr>';
						}
						html_view += '</table>';

						$("#area").html(html_view);


					}					
				}
			});

		});







	</script>

@endsection