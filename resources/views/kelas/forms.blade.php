{{csrf_field()}}
<div class="row">
	<div class="col s12">
		<div class="row">
			<div class="input-field col s12">
				<input type="text" name="kelas" value="{{$kelas->kelas or ''}}">
				<label>Kelas</label>
			</div>
			<div class="input-field col s12">
				<select name="id_jurusan">
					@foreach($jurusan as $key)
						@if(isset($kelas->id_jurusan))
							@if($kelas->id_jurusan==$key->id)
								<option selected value="{{$key->id}}">{{$key->nama}}</option>
							@else
								<option value="{{$key->id}}">{{$key->nama}}</option>
							@endif
						@else
							<option value="{{$key->id}}">{{$key->nama}}</option>
						@endif
					@endforeach
				</select>
				<label>Jurusan</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="lokasi" value="{{$kelas->lokasi or ''}}">
				<label>Lokasi</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="jumlah_siswa" value="{{$kelas->jumlah_siswa or ''}}">
				<label>Jumlah Siswa</label>
			</div>
			<div>
				<button type="submit" name="simpan" class="btn waves-light waves-effect right">Simpan</button>
			</div>
		</div>
	</div>
</div>
