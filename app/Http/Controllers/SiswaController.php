<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Siswa::where(function ($query) use ($keyword) {
            $query->where('nama_siswa', 'LIKE', '%' . $keyword . '%')
                ->orWhere('jenis_kelamin', 'LIKE', '%' . $keyword . '%')
                ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
                ->orWhere('no_telepon_orang_tua', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tanggal_lahir', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('kelas', function ($query) use ($keyword) {
                    $query->where('nama_kelas', 'LIKE', '%' . $keyword . '%');
                });
        })
            ->latest()
            ->orderBy('nama_siswa', 'asc')
            ->paginate(6);
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Kelas::all();
        return view('siswa.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_siswa', $request->nama_siswa);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('alamat', $request->alamat);
        Session::flash('no_telepon_orang_tua', $request->no_telepon_orang_tua);
        Session::flash('kelas_id', $request->kelas_id);

        $request->validate([
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon_orang_tua' => 'required',
            'kelas_id' => 'required',
        ], [
            'nama_siswa.required' => 'Nama Siswa Harus diisi!!',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus dipilih!!',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus diisi!!',
            'alamat.required' => 'Alamat Harus diisi!!',
            'no_telepon_orang_tua.required' => 'No Orang Tua Siswa Harus diisi!!',
            'kelas_id.required' => 'Kelas Harus dipilih!!',
        ]);

        $data = [
            'nama_siswa' => $request->input('nama_siswa'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'no_telepon_orang_tua' => $request->input('no_telepon_orang_tua'),
            'kelas_id' => $request->input('kelas_id'),
        ];

        Siswa::create($data);

        return redirect('siswa')->with('success', 'Siswa Berhasil ditambahkan!!');
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
        return view('siswa.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
