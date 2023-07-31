<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Mapel::where(function ($query) use ($keyword) {
            $query->where('nama_mapel', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('guru', function ($query) use ($keyword) {
                    $query->where('nama_guru', 'LIKE', '%' . $keyword . '%');
                });
        })
            ->latest()
            ->orderBy('nama_mapel', 'asc')
            ->paginate(6);
        return view('mapel.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Guru::all();
        return view('mapel.create')->with('dataGuru', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_mapel', $request->nama_mapel);
        Session::flash('guru_id', $request->guru_id);

        $request->validate([
            'nama_mapel' => 'required|unique:mapel,nama_mapel',
            'guru_id' => 'required|exists:guru,id'
        ], [
            'nama_mapel.required' => 'Mapel Harus diisi!!',
            'nama_mapel.unique' => 'Mapel Sudah Ada!!',
            'guru_id.required' => 'Guru Harus Pilih!!',
            'guru_id.exists' => 'Guru yang dipilih tidak valid!!',
        ]);


        $data = [
            'nama_mapel' => $request->input('nama_mapel'),
            'guru_id' => $request->input('guru_id'),
        ];
        Mapel::create($data);
        return redirect('mapel')->with('success', 'Mata Pelajaran Berhasil ditambahkan!!');
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
        $guruList = Guru::all();
        $data = Mapel::where('id', $id)->first();
        return view('mapel.edit')->with('data', $data)->with('guruList', $guruList);
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
            'nama_mapel' => 'required|unique:mapel,nama_mapel,' . $id, ',id',
            'guru_id' => 'required|exists:guru,id'
        ], [
            'nama_mapel.required' => 'Mapel Harus diisi!!',
            'nama_mapel.unique' => 'Mapel Sudah Ada!!',
            'guru_id.required' => 'Guru Harus Pilih!!',
            'guru_id.exists' => 'Guru yang dipilih tidak valid!!',
        ]);

        $data = [
            'nama_mapel' => $request->input('nama_mapel'),
            'guru_id' => $request->input('guru_id'),
        ];

        Mapel::where('id', $id)->update($data);
        return redirect('/mapel')->with('success', 'Anda Berhasil Edit Mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mapel::where('id', $id)->delete();
        return redirect('/mapel')->with('success', 'Anda Berhasil Menghapus Mapel!!');
    }
}
