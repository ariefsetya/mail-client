<h1>Data Kelas</h1>

<table style="width:100%;">
	<tr>
		<th>Jurusan</th>
		<th>Kelas</th>
		<th>Jumlah Siswa</th>
		<th>Lokasi</th>
	</tr>
	@foreach($kelas as $key)
		<tr>
			<td>{{$key->jurusan->nama}}</td>
			<td>{{$key->kelas}}</td>
			<td>{{$key->jumlah_siswa}}</td>
			<td>{{$key->lokasi}}</td>
		</tr>
	@endforeach
</table>