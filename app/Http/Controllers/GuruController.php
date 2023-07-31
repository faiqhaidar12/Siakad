<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Guru::where('nama_guru', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jenis_kelamin', 'LIKE', '%' . $keyword . '%')
            ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
            ->orWhere('no_telepon', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tgl_lahir', 'LIKE', '%' . $keyword . '%')
            ->latest()
            ->orderBy('nama_guru', 'asc')
            ->paginate(6);
        return view('guru.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_guru', $request->nama_guru);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('tgl_lahir', $request->tgl_lahir);
        Session::flash('alamat', $request->alamat);
        Session::flash('no_telepon', $request->no_telepon);

        $request->validate([
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ], [
            'nama_guru.requireq' => 'Nama Guru Harus diisi!!',
            'jenis_kelamin.requireq' => 'Jenis Kelamin Harus Pilih!!',
            'tgl_lahir.requireq' => 'Tanggal Lahir Harus diisi!!',
            'alamat.requireq' => 'Alamat Harus diisi!!',
            'no_telepon.requireq' => 'No Telepon Harus diisi!!',
        ]);

        $data = [
            'nama_guru' => $request->input('nama_guru'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ];

        Guru::create($data);

        return redirect('guru')->with('success', 'Guru Berhasil ditambahkan!!');
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
        $data = Guru::where('id', $id)->first();
        return view('guru.edit')->with('data', $data);
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
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ], [
            'nama_guru.requireq' => 'Nama Guru Harus diisi!!',
            'jenis_kelamin.requireq' => 'Jenis Kelamin Harus Pilih!!',
            'tgl_lahir.requireq' => 'Tanggal Lahir Harus diisi!!',
            'alamat.requireq' => 'Alamat Harus diisi!!',
            'no_telepon.requireq' => 'No Telepon Harus diisi!!',
        ]);

        $data = [
            'nama_guru' => $request->input('nama_guru'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ];

        Guru::where('id', $id)->update($data);

        return redirect('guru')->with('success', 'Guru Berhasil di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Guru::findOrFail($id);
        //periksa apakah guru memiliki mapel terkait
        if ($data->mapel->count() > 0) {
            return redirect()->back()->withErrors('Tidak dapat menghapus guru karena masih memiliki mata pelajaran terkait.');
        }
        //jika tidak ada mapel terkait
        $data->delete();
        return redirect('/guru')->with('success', 'Anda Berhasil Menghapus Guru!!');
    }
}
