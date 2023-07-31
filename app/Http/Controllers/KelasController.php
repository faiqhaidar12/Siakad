<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $data = Kelas::where('nama_kelas', 'LIKE', '%' . $keyword . '%')
            ->latest()
            ->orderBy('nama_kelas', 'asc')
            ->paginate(6);
        return view('kelas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_kelas', $request->nama_kelas);

        $request->validate([
            'nama_kelas' => 'required'
        ], [
            'nama_kelas.required' => 'Nama Kelas Harus diisi!!',
        ]);

        $data = [
            'nama_kelas' => $request->input('nama_kelas')
        ];

        Kelas::create($data);

        return redirect('kelas')->with('success', 'Kelas Berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kelas::where('id', $id)->first();
        return view('kelas.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ], [
            'nama_kelas.required' => 'Nama Kelas Harus diisi!!',
        ]);

        $data = [
            'nama_kelas' => $request->input('nama_kelas')
        ];

        Kelas::where('id', $id)->update($data);
        return redirect('/kelas')->with('success', 'Anda Berhasil Edit Kelas!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        return redirect('/kelas')->with('success', 'Anda Berhasil Hapus Kelas!!');
    }
}
