{{csrf_field()}}
<div class="row">
	<div class="col s12">
		<div class="row">
			<div class="input-field col s12">
				<input type="text" name="nama" value="{{$jurusan->nama or ''}}">
				<label>Nama Jurusan</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="kajur" value="{{$jurusan->kajur or ''}}">
				<label>Kajur</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="keterangan" value="{{$jurusan->keterangan or ''}}">
				<label>Keterangan</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="akreditasi" value="{{$jurusan->akreditasi or ''}}">
				<label>Akreditasi</label>
			</div>
			<div>
				<button type="submit" name="simpan" class="btn waves-light waves-effect right">Simpan</button>
			</div>
		</div>
	</div>
</div>