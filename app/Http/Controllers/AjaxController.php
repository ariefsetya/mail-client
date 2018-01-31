<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function get_jurusan()
    {
    	$data['jurusan'] = \App\Jurusan::all();
    	$result['data'] = $data;
    	$result['response_code'] = 200;
    	echo json_encode($result);
    }
    public function save_kelas(Request $r)
    {
    	$new = new \App\Kelas;
    	$new->kelas = $r->input('kelas');
    	$new->id_jurusan = $r->input('id_jurusan');
    	$new->lokasi = $r->input('lokasi');
    	$new->jumlah_siswa = $r->input('jumlah_siswa');
    	$new->save();

    	$result['data'] = [];
    	$result['response_code'] = 200;
    	echo json_encode($result);
    }
    public function get_kelas()
    {
    	$data['kelas'] = \App\Kelas::all();
    	$result['data'] = $data;
    	$result['response_code'] = 200;

    	echo json_encode($result);
    }
}
