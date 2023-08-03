@extends('layout.app')
@section('title', 'Siswa')
@section('content')
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ '/siswa/' . $data->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa"
                            placeholder="Masukan Nama Siswa" value="{{ $data->nama_siswa }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="{{ $data->jenis_kelamin }}" selected="selected">{{ $data->jenis_kelamin }}
                            </option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group" style="width: 150px">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->tanggal_lahir }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10">{{ $data->alamat }}</textarea>
                    </div>
                    <div class="form-group" style="width: 150px;">
                        <label for="nama_kelas">Pilih Kelas</label>
                        <select class="form-control" name="kelas_id" id="nama_kelas">
                            <option value="" selected disabled>-- Pilih Kelas --</option>
                            @foreach ($dataKelas as $item)
                                <option value="{{ $item->id }}" @if ($item->id === $data->kelas_id) selected @endif>
                                    {{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon_orang_tua">Nomor Orang Tua / Wali</label>
                        <input type="number" name="no_telepon_orang_tua" id="no_telepon_orang_tua"
                            value="{{ $data->no_telepon_orang_tua }}" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/siswa" class="btn btn-warning float-right">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection
