<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Nilai::where(function ($query) use ($keyword) {
            $query->where('nilai', 'LIKE', '%' . $keyword . '%')
                ->orWhere('semester', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('siswa', function ($query) use ($keyword) {
                    $query->where('nama_siswa', 'LIKE', '%' . $keyword . '%');
                })->orWhereHas('mapel', function ($query) use ($keyword) {
                    $query->where('nama_mapel', 'LIKE', '%' . $keyword . '%');
                })->orWhereHas('kelas', function ($query) use ($keyword) {
                    $query->where('nama_kelas', 'LIKE', '%' . $keyword . '%');
                });
        })
            ->latest()
            ->orderBy('nilai', 'asc')
            ->paginate(15);
        return view('nilai.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataKelas = Kelas::all();
        $dataMapel = Mapel::all();
        $selectedKelas = request('nama_kelas');
        $dataSiswa = [];

        if ($selectedKelas) {
            $dataSiswa = Nilai::getSiswaByKelas($selectedKelas);
        }

        return view('nilai.create')
            ->with('dataKelas', $dataKelas)
            ->with('dataMapel', $dataMapel)
            ->with('dataSiswa', $dataSiswa)
            ->with('selectedKelas', $selectedKelas);
    }

    public function getSiswaByKelas($kelas_id)
    {
        $siswaList = Siswa::where('kelas_id', $kelas_id)->pluck('nama_siswa', 'id');
        return response()->json($siswaList);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('siswa_id', $request->siswa_id);
        Session::flash('kelas_id', $request->kelas_id);
        Session::flash('mapel_id', $request->mapel_id);
        Session::flash('nilai', $request->nilai);
        Session::flash('semester', $request->semester);

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'required|exists:mapel,id',
            'nilai' => 'required',
            'semester' => 'required|in:Ganjil,Genap',
        ], [
            'siswa_id.required' => 'Siswa Harus dipilih!!',
            'siswa_id.exists' => 'Siswa yang dipilih tidak valid!!',
            'kelas_id.required' => 'Kelas Harus dipilih!!',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid!!',
            'mapel_id.required' => 'Mapel Harus dipilih!!',
            'mapel_id.exists' => 'Mapel yang dipilih tidak valid!!',
            'nilai.required' => 'Nilai Harus diisi!!',
            'semester.required' => 'Semester Harus diisi!!',
        ]);
        $data = [
            'siswa_id' => $request->input('siswa_id'),
            'kelas_id' => $request->input('kelas_id'),
            'mapel_id' => $request->input('mapel_id'),
            'nilai' => $request->input('nilai'),
            'semester' => $request->input('semester'),
        ];

        Nilai::create($data);
        return redirect('nilai')->with('success', 'Nilai Berhasil ditambahkan!!');
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
        $dataKelas = Kelas::all();
        $dataMapel = Mapel::all();
        $selectedKelas = request('nama_kelas');
        $dataSiswa = [];

        if ($selectedKelas) {
            $dataSiswa = Nilai::getSiswaByKelas($selectedKelas);
        }

        $data = Nilai::where('id', $id)->first();
        return view('nilai.edit')->with('data', $data)
            ->with('dataKelas', $dataKelas)
            ->with('dataMapel', $dataMapel)
            ->with('dataSiswa', $dataSiswa)
            ->with('selectedKelas', $selectedKelas);
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
            'siswa_id' => 'required|exists:siswa,id',
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'required|exists:mapel,id',
            'nilai' => 'required',
            'semester' => 'required|in:Ganjil,Genap',
        ], [
            'siswa_id.required' => 'Siswa Harus dipilih!!',
            'siswa_id.exists' => 'Siswa yang dipilih tidak valid!!',
            'kelas_id.required' => 'Kelas Harus dipilih!!',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid!!',
            'mapel_id.required' => 'Mapel Harus dipilih!!',
            'mapel_id.exists' => 'Mapel yang dipilih tidak valid!!',
            'nilai.required' => 'Nilai Harus diisi!!',
            'semester.required' => 'Semester Harus diisi!!',
        ]);
        $data = [
            'siswa_id' => $request->input('siswa_id'),
            'kelas_id' => $request->input('kelas_id'),
            'mapel_id' => $request->input('mapel_id'),
            'nilai' => $request->input('nilai'),
            'semester' => $request->input('semester'),
        ];

        Nilai::where('id', $id)->update($data);
        return redirect('/nilai')->with('success', 'Anda Berhasil Edit Nilai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nilai::where('id', $id)->delete();

        return redirect('nilai')->with('success', "Berhasil Hapus Nilai!!");
    }
}
