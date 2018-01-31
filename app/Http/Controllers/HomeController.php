<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Jurusan;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function all_kelas()
    {
    	$data['kelas'] = Kelas::paginate(2);
    	return view('kelas.all')->with($data);
    }
    public function tambah_kelas()
    {
    	$data['jurusan'] = \App\Jurusan::all();
    	return view('kelas.add')->with($data);
    }
    public function save_kelas(Request $r)
    {
    	$new = new Kelas;
    	$new->kelas = $r->input('kelas');
    	$new->id_jurusan = $r->input('id_jurusan');
    	$new->lokasi = $r->input('lokasi');
    	$new->jumlah_siswa = $r->input('jumlah_siswa');
    	$new->save();

    	return redirect()->route('all_kelas');
    }
    public function edit_kelas($id)
    {
    	$data['jurusan'] = \App\Jurusan::all();
    	$data['kelas'] = Kelas::find($id);
    	return view('kelas.edit')->with($data);
    }
    public function update_kelas(Request $r)
    {
    	$edit = Kelas::find($r->input('id'));
    	$edit->kelas = $r->input('kelas');
    	$edit->id_jurusan = $r->input('id_jurusan');
    	$edit->lokasi = $r->input('lokasi');
    	$edit->jumlah_siswa = $r->input('jumlah_siswa');
    	$edit->save();

    	return redirect()->route('all_kelas');
    }

    public function delete_kelas($id)
    {
    	Kelas::find($id)->delete();

    	return redirect()->route('all_kelas');

    }

    public function all_jurusan()
    {
        $data['jurusan'] = Jurusan::paginate(2);
        return view('jurusan.all')->with($data);
    }
    public function tambah_jurusan()
    {
        return view('jurusan.add');
    }
    public function save_jurusan(Request $r)
    {
        $new = new Jurusan;
        $new->nama = $r->input('nama');
        $new->kajur = $r->input('kajur');
        $new->keterangan = $r->input('keterangan');
        $new->akreditasi = $r->input('akreditasi');
        $new->save();

        return redirect()->route('all_jurusan');
    }
    public function edit_jurusan($id)
    {
        $data['jurusan'] = Jurusan::find($id);
        return view('jurusan.edit')->with($data);
    }
    public function update_jurusan(Request $r)
    {
        $edit = Jurusan::find($r->input('id'));
        $edit->nama = $r->input('nama');
        $edit->kajur = $r->input('kajur');
        $edit->keterangan = $r->input('keterangan');
        $edit->akreditasi = $r->input('akreditasi');
        $edit->save();

        return redirect()->route('all_jurusan');
    }

    public function delete_jurusan($id)
    {
        Jurusan::find($id)->delete();

        return redirect()->route('all_jurusan');

    }

    public function kelas_ajax()
    {
        return view('kelas.kelas_ajax');
    }

    public function view_pdf_jurusan($id)
    {
        $data['jurusan'] = Jurusan::find($id);
        $pdf = PDF::loadView('jurusan.pdf',$data);
        return $pdf->stream();
    }
    public function download_pdf_jurusan($id)
    {
        $data['jurusan'] = Jurusan::find($id);
        $pdf = PDF::loadView('jurusan.pdf',$data);
        return $pdf->download($id.".pdf");
    }

    public function view_pdf_kelas($id)
    {
        $data['kelas'] = Kelas::find($id);
        $pdf = PDF::loadView('kelas.pdf',$data);
        return $pdf->stream();
    }
    public function download_pdf_kelas($id)
    {
        $data['kelas'] = Kelas::find($id);
        $pdf = PDF::loadView('kelas.pdf',$data);
        return $pdf->download($id.".pdf");
    }

    public function pdf_kelas()
    {
        $data['kelas'] = Kelas::get();
        $pdf = PDF::loadView('kelas.pdf-all',$data);
        return $pdf->stream();
    }
}
