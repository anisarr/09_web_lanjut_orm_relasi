<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Kelas;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        

        // if($request->has('search')){
        //     $mahasiswas = Mahasiswa::where('Nama','Like','%'.$request->search.'%')->paginate(5);
        // }else{
        //     $mahasiswas = Mahasiswa::all(); 
        //     $mahasiswas = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);
        // }
        
        
        // $mahasiswas = Mahasiswa::paginate(5);
        // $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);
        // return view('mahasiswa.index', compact('mahasiswas'));
        // with('i', (request()->input('page',1)-1)*5);

        $mahasiswas = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('id', 'asc')->paginate(3);
        return view('mahasiswa.index', ['mahasiswas'=>$mahasiswas, 'paginate'=>$paginate] );
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create',['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nim'=>'required',
            'Nama'=>'required',
            'kelas_id'=>'required',
            'Jurusan'=>'required',
            'No_Handphone'=>'required',
            'Email'=>'required',
            'Tanggal_Lahir'=>'required',
        ]);

       Mahasiswa::create($request->all());

       return redirect()->route('mahasiswa.index')
       ->with('success','Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        
        return view('mahasiswa.detail',compact('mahasiswa'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
       
       $kelas=Kelas::all();
       return view('mahasiswa.edit',compact('mahasiswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Mahasiswa $mahasiswa)
    {
        $request->validate([
            'Nim'=>'required',
            'Nama'=>'required',
            'kelas_id'=>'required',
            'Jurusan'=>'required',
            'No_Handphone'=>'required',
            'Email'=>'required',
            'Tanggal_Lahir'=>'required',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // dd(Mahasiswa::where('Nim', '=', $id)->first());
        Mahasiswa::where('id','=',$id)->delete();
        return redirect()
        ->route('mahasiswa.index')
        ->with ('deleted', 'Mahasiswa Berhasil Dihapus');
    }

    public function krs(int $Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas', 'matakuliah')->where('id', $Nim)->first();

        return view('mahasiswa.krs', compact('Mahasiswa'));
    }

}
